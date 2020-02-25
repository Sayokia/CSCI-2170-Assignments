<?php
// this function read in the course information from the csv file provided and print out selected
// term's information as table.

function readCourse($filename, $term)
{
    // initialize the description to store the course description in order to save it into hided table
    $description = "";
    // read the csv file line by line
    $file = fopen($filename, "r");
    $data = fgetcsv($file);
    // the first line of the csv file is printed as table head
    echo "<thead><tr>";
    //use foreach to go through every value in a line
    foreach ($data as $value) {
        // print all information in the table head except course description
        if ($value != "CourseDescription") {
            echo "<th>" . $value . "</th>";
        }
    }
    echo "<th>More</th>";
    //close the table head
    echo "</tr>";
    echo "</thead>";
    // read every line until the end of the file
    while (($data = fgetcsv($file)) !== FALSE) {
        // for every line of course information,print it into two rows of tables
        // the first row contains course name, code, instructor, term and schedule
        // the second row as hided to contain additional information
        // only prints out the selected term's course.
        if (in_array($term, $data)) {
            echo "<tr>";
            //use i as count to find the description information and save for later use
            $i = 0;
            // go through every value in the line and store in into vars and send it to add&drop page by
            //get method when click on add
            foreach ($data as $value) {
                if ($i == 0){
                    $courseCode = $value;
                    echo "<td>" . $value . "</td>";
                }
                else if ($i == 2) {
                    $description = $value;
                }
                else if ($i == 3){
                    $term = $value;
                    echo "<td>" . $value . "</td>";
                }
                else {
                    echo "<td>" . $value . "</td>";
                }

                $i += 1;
            }
            // close the first line
            echo "</tr>";
            echo "<tr><td colspan='2'>
                <h4> Additional Information </h4>
                <ul>
                    <li>
                        $description
                    </li>
                    <li>
                        <a href='syllabus.pdf'>Course Outline</a>
                    </li>";
            // create a second line of table and make it default as hided to save additional information
            if (isset($_SESSION['codeTaken'])){
                $code_array = $_SESSION['codeTaken'];
                if (in_array($courseCode,$code_array)){
                    echo "<li><a href='student_profile.php'>You have added this course, click here to view your schedule</a> </li>" ;
                }
                else {
                    echo "
                    <li>
                        <button class='btn btn-primary' onclick='window.location.href=\"add&drop_course.php?cCode=$courseCode&add=1&term=$term\"'>Add Course</button> 
                    </li>
                   ";
                }
            }
            else{
            if (isset($_SESSION['loginStatus'])){
                    echo "
                    <li>
                        <button class='btn btn-primary' onclick='window.location.href=\"add&drop_course.php?cCode=$courseCode&add=1&term=$term\"'>Add Course</button> 
                    </li>
                   ";
                }
                else{
                    echo "
                    <li>
                        <!-- Set disabled button as default since student can not add course before logged in -->
                        <button class='btn' onclick='' disabled>Add Course</button> 
                    </li>
                ";
                }
            }

            echo "</ul>               
                    </td></tr>";

        }
    }
    // close the table
    echo "</tbody>";
    fclose($file);
}

// This function takes in username, password and the filepath of the database to validate the username and password entered
function validation($username, $password, $filename)
{
    // read the file
    $file = fopen($filename, "r");
    $data = fgetcsv($file);
    // read line by line until the end
    while (($data = fgetcsv($file)) !== FALSE) {
        // $data is an array containing all login information about a person
        // if both username and password matches return true
        //else return false
        $correct_name = $data[0];
        $correct_password = $data[1];
        if ($username == $correct_name && $password == $correct_password) {
            return true;
            break;
        }
    }
    fclose($file);
    return false;
}

// This function takes in username and find the matched student name by searching the database
function studentName($username, $filename)
{
    $file = fopen($filename, "r");
    $data = fgetcsv($file);
    while (($data = fgetcsv($file)) !== FALSE) {
        if (in_array($username, $data)) {
            return $data[2];
        }
    }
    fclose($file);
    return "Name Not Found";

}

// This function read registration information and print it out as group-list
function readRegistration($username,$filename)
{
    $courseCode ="";
    $file = fopen($filename, "r");
    $data = fgetcsv($file);
    // print the header of the list
    echo "<ul class=\"list-group list-group-horizontal col-12\">";

    foreach ($data as $value) {
        if ($value != "StudentUserName") {
            echo "<li class = 'list-group-item col-3'>" . $value . "</li>";
        }
    }
    echo "<li class = 'list-group-item col-3'> Action</li>";
    echo "</ul>";
    // read every line until the end of the file
    while (($data = fgetcsv($file)) !== FALSE) {
        // slected the specific usesr's information
    if (in_array($username,$data)){
        echo "<ul class=\"list-group list-group-horizontal col-12\">";
        $i = 0;

        foreach ($data as $value){
            if ($i==0){
                $courseCode = $value;
                echo "<li class = 'list-group-item col-3'>" . $value . "</li>";
            }
            else if ($i ==1){
                $courseName = $value;
                echo "<li class = 'list-group-item col-3'>" . $value . "</li>";
            }
            else if ($i==3){
                $term = $value;
                echo "<li class = 'list-group-item col-3'>" . $value . "</li>";
            }
            $i +=1;
        }
        // add all course registered into codetaken
        if (!in_array($courseCode,$_SESSION['codeTaken'])){
            array_push($_SESSION['codeTaken'],$courseCode);
        }
        echo "<li class = 'list-group-item col-3'><button class='btn btn-primary' onclick='location.href=\"add&drop_course.php?cCode=$courseCode&drop=1&term=$term\"'>Drop the course</button> </li>";
        echo "</ul>";
    }
    }
    fclose($file);
}

// check course schedule by code
function checkByCode($code,$search){
    // read the csv file line by line
    $file = fopen("db/course_list.csv", "r");
    $data = fgetcsv($file);
    while (($data = fgetcsv($file)) !== FALSE) {
        if(in_array($code,$data)){
            $i =0;
            // go through the array and get each element of the course
            foreach ($data as $value){
                if ($i == 1){
                    $courseName = $value;
                }
                else if ($i == 2) {
                    $description = $value;
                }
                else if ($i == 3){
                    $term = $value;
                }
                else if ($i == 4){
                    $instructor = $value;
                }
                else if($i==5){
                    $schedule = $value;
                }
                $i +=1;
        }
        }
    }
    fclose($file);

    // return the required element
    if ($search == "schedule"){
        return $schedule;
    }
    else if ($search == "name"){
        return $courseName;
    }
    elseif ($search == "description"){
        return $description;
    }
    else if ($search == "term"){
        return $term;
    }
    else if ($search == "instructor"){
        return $instructor;
    }
    else{
        return "Search item not found!";
    }
}

// check time conflict by 3 time file reading
//[1] first-step
// The function firstly go through the registration file to get all registered course code of assigned term and student
// then call checkByCode function to get the schedule of each course
// push all schedule into normal schedule array, if any schedule is repeated in the array, push the schedule into conflict schedule
// [2] second-step
// read the course list file, and find all courses that have the scedule contained in the conflict schedule array
// push all the courses' code into conflict code
//[3] third-step
// read the registration file for the second the time to find the course contained in the conflict code array 
// print the conflict course information
function timeConflict($term,$studentName){
    $NormalSchdules = array();
    $ConflictSchdule = array();
    $ConflictCodes = array();
    // use file1 and data1 for the first time read of registration file
    // first-step
    $file1 = fopen("db/c_registration.csv", "r");
    $data1 = fgetcsv($file1);

    while(($data1 = fgetcsv($file1)) !== false){
        if(in_array($term,$data1) && (in_array($studentName,$data1))){
            $i = 0;
            foreach ($data1 as $value){
                if ($i ==0){
                    $schCode = $value;
                }
                $i +=1;
                
            }
            $sch = checkByCode($schCode,"schedule");
            if (in_array($sch,$NormalSchdules)){
                array_push($ConflictSchdule,$sch);
            }
            else{
                array_push($NormalSchdules,$sch);
            }
        }
        
        


    }
    fclose($file1);

    // second-step(see explaination above)
    $CourseFile = fopen("db/course_list.csv","r");
    $cData = fgetcsv($CourseFile);
    while(($cData = fgetcsv($CourseFile)) !== false ){
        if(in_array($term,$cData)){
            foreach ($ConflictSchdule as $item){
                if (in_array($item, $cData)){
                    $n=0;
                    foreach ($cData as $value_code){
                        if ($n==0){
                            array_push($ConflictCodes,$value_code);
                        }
                        $n +=1;
                    }
                }
            }
        }
    
    }
    fclose($CourseFile);
    
    array_unique($ConflictCodes);
    // Third-step(see explaination above)
    // use  file2 and rData for the second time read of registration
    $file2 = fopen("db/c_registration.csv", "r");
    $rData = fgetcsv($file2);
    while(($rData=fgetcsv($file2))!==false){
        if(in_array($term,$rData) && (in_array($studentName,$rData))){
            foreach ($ConflictCodes as $item_code){
                if (in_array($item_code,$rData)){
                    $x=0;
                    foreach ($rData as $value_sch){
                        if ($x==0){
                            $badCode = $value_sch;
                        }
                        if ($x!=2){
                            echo "<li class = 'list-group-item col-4'>" . $value_sch . "</li>";
                        }
    
    
                        $x +=1;
                    }
                    $rSchedule = checkByCode($badCode,"schedule");
                    echo <<<schedule
        <br>
        <ul class="list-group list-group-horizontal col-12">
        <li class = 'list-group-item col-6'>Schedule Meeting Time:</li>
        <li class = 'list-group-item col-6'>$rSchedule</li>
        </ul>
        <br>
       
    schedule;
                }
            }
        }
        
    }

}
            
            


?>
