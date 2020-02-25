<?php
include "includes/header.php"; ?>
<?php include "includes/functions.php"; ?>

<main>
    <br>
    <!-- The left half showing the content of course infomation -->
    <div class="row">
        <div class="col-1"></div>
        <div class="col-5">
            <h5 class="text-center">Course Information</h5>
            <?php
            // get the selected course's code
            $courseCode = $_GET['cCode'];
            // get all other information by the course code
            $courseName = checkByCode($courseCode,"name");
            $term = $_GET['term'];
            $description = checkByCode($courseCode,"description");
            $instructor = checkByCode($courseCode,"instructor");
            $schedule = checkByCode($courseCode,"schedule");

            // print course information in unordered list
            echo <<<courseList


<ul class="list-group list-group-horizontal text-center" >
<li class="list-group-item col-3">Course Code</li>
<li class="list-group-item col-3">Course Name</li>
<li class="list-group-item col-3">Instructor</li>
<li class="list-group-item col-3">Schedule</li>
</ul>
<ul class="list-group list-group-horizontal text-center" >
<li class="list-group-item col-3">$courseCode</li>
<li class="list-group-item col-3">$courseName</li>
<li class="list-group-item col-3">$instructor </li>
<li class="list-group-item col-3">$schedule</li>
</ul>
<ul class="list-group ">
<li class="list-group-item">Course Description</li>
<li class="list-group-item">$description</li>
</ul>
<br>
courseList;

            // show different content by checking whether it is add
            if (isset($_GET['add'])){
                $add = $_GET['add'];
                if ($add == 1){
                    // show add course button
                    echo <<<addCourse
<p>
            <button id="current" type="button" class="btn "
                    style="color: #fff; background-color: #007bff;border-color: #007bff;" onclick="location.href='add&drop_request_processor.php?cCode=$courseCode&cName=$courseName&cTerm=$term&add=$add'">Yes, add the course
            </button>
            <button id="next" type="button" class="btn "
                    style="float: right; color: #fff; background-color: #6c757d; border-color: #6c757d" onclick="location.href='index.php'"> No, take me back
            </button>
        </p>

addCourse;
            }
                }

            else{
                // show drop course information

                    echo <<<dropCourse
        <p>
            <button id="current" type="button" class="btn "
                    style="color: #fff; background-color: #007bff;border-color: #007bff;" onclick="location.href='add&drop_request_processor.php?cCode=$courseCode&cName=$courseName&cTerm=$term&drop=1'" >Yes, drop the course
            </button>
            <button id="next" type="button" class="btn "
                    style="float: right; color: #fff; background-color: #6c757d; border-color: #6c757d" onclick="location.href='student_profile.php'"> No, take me back
            </button>
        </p>

dropCourse;


            }





            ?>
        </div>
        
        <!-- The right half showing the schedule-->
        <div class="col-5">
            <h5 class="text-center">Your Schedule</h5>
            <?php
            //get all registered information
            $file = fopen("db/c_registration.csv", "r");
            $data = fgetcsv($file);
            // print the header of the list
            echo "<ul class=\"list-group list-group-horizontal col-12\">";
            foreach ($data as $value) {
                if ($value != "StudentUserName") {
                    echo "<li class = 'list-group-item col-4'>" . $value . "</li>";
                }
            }
            echo "</ul><br>";
            while (($data = fgetcsv($file)) !== FALSE) {
                // select all this user's information
            if (in_array($_SESSION['studentName'],$data)) {
                $i = 0;
                echo "<ul class=\"list-group list-group-horizontal col-12\">";
                foreach ($data as $value){
            if ($i==0){
                $rcourseCode = $value;
                echo "<li class = 'list-group-item col-4'>" . $value . "</li>";
            }
            else if ($i ==1){
                echo "<li class = 'list-group-item col-4'>" . $value . "</li>";
            }
            else if ($i==3){
                echo "<li class = 'list-group-item col-4'>" . $value . "</li>";
            }
            $i +=1;
        }
                echo "</ul>";
                // check schedule by code name
            $rSchedule = checkByCode($rcourseCode,"schedule");
            
            // print the schedule time
            echo <<<schedule
            <ul class="list-group list-group-horizontal col-12">
            <li class = 'list-group-item col-6'>Schedule Meeting Time:</li>
            <li class = 'list-group-item col-6'>$rSchedule</li>
            </ul>
            <br>
           
schedule;
            }

            

            }

            ?>
        </div>
        <div class="col-1"></div>
    </div>
</main>






<?php include "includes/footer.php"; ?>