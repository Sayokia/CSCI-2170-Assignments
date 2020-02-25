<?php
session_start();
    // get the all information of the course selected
    $courseCode = $_GET['cCode'];
    $courseName = $_GET['cName'];
    $term = $_GET['cTerm'];
    // get student information
    $studentName = $_SESSION['studentName'];


    // determine whether the rquest is add or drop
    if (isset($_GET['add'])){
        $file = fopen("db/c_registration.csv", "a+");
        // write the course information into registered list
        fputcsv($file,array($courseCode,$courseName,$studentName,$term));

        fclose($file);
        // add the course code to the taken code session
        array_push($_SESSION['codeTaken'],$courseCode);
        header("location:index.php");
    }
    else{
        // solution for delete lines in csv file is inspired by Boris https://stackoverflow.com/questions/4072015/remove-line-from-csv-file
        $rFile = fopen("db/c_registration.csv", "r");
        $temp = fopen('db/temp.csv','w');
        while (($data = fgetcsv($rFile)) !== FALSE){
            if (!in_array($courseCode,$data)){
            fputcsv($temp,$data);
            }
        }
        fclose($rFile);
        fclose($temp);
        rename('db/temp.csv','db/c_registration.csv');
        // remove dropped course from the codeTaken session
        // solution for remove a item from the array is inspired by Peter Mortensen https://stackoverflow.com/questions/369602/deleting-an-element-from-an-array-in-php
        if (in_array($courseCode,$_SESSION['codeTaken'])){
            $key = array_search($courseCode,$_SESSION['codeTaken']);
            if ($key!==false){
                unset($_SESSION['codeTaken'][$key]);
            }
        }
        header("location:student_profile.php");
    }


?>
