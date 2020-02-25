<?php
include "includes/header.php"; ?>
<?php include "includes/functions.php"; ?>
<main>
    <br>
    <?php
    echo "<h4 class='d-flex justify-content-center'>Hello $studentName! Here is the course you registered! </h4>";
    ?>
    <br>
    <br>
    <!-- List of Course information for all registered course -->
    <div class="container mx-auto row">
        <?php
        // read this student's registration information
        //(The innitilize of the codeTaken session is put inside the readRegistrtion function since user will first be lead to profile page after they login
        // Therefore, we do not need to innitilize the codeTaken session in Index again)
         readRegistration($studentName,"db/c_registration.csv");
         ?>
    </div>
    <br>
    <!-- section for time conflict -->
    <div class="container mx-auto">
        <h6 class="text-center" style="color: red;">Course With Time Conflict</h6>
        <ul class="list-group list-group-horizontal row">
            <?php
            timeConflict("Winter 2020",$studentName);
            timeConflict("Summer 2020",$studentName);
            ?>
        </ul>
    </div>


</main>







<?php include "includes/footer.php"; ?>