<?php
/*
 *	index.php
 *	Homepage file for Assignment 2 in CSCI 2170, Winter 2020.
 *	File created by Raghav Sampangi (raghav@cs.dal.ca) using Bootstrap example template.
 *
 * 	File updated by Yanlin Zhu (yn842496@dal.ca).
 */
?>
<?php include "includes/header.php"; ?>
<?php include "includes/functions.php"; ?>

    <main class="container">
        <h2>Academic Timetable</h2>
        <!-- This sub heading represents the current term, it will be changed as the button clicked -->
        <h4 id="term" style="color: red; font-weight: bold; font-style: italic;">2019/20 Winter</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dapibus ut nisi a auctor. Nunc magna neque,
            vulputate auctor lacinia eget, venenatis sed arcu. Sed pulvinar, mi id mollis ullamcorper, purus dolor
            vulputate enim, id laoreet metus lorem eu enim. Etiam mauris velit, hendrerit nec bibendum sollicitudin,
            ullamcorper ac nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
            himenaeos. Vestibulum facilisis mi at arcu rutrum, et pellentesque nibh fermentum. Quisque purus ligula,
            suscipit eget magna ac, pulvinar ultrices ligula. Integer ut iaculis libero. Nunc interdum vestibulum arcu,
            quis lacinia urna dapibus dictum.</p>
        <!-- two button to switch course list between 2 terms -->
        <p>
            <button id="current" type="button" class="btn "
                    style="color: #fff; background-color: #007bff;border-color: #007bff;">Current Term
            </button>
            <button id="next" type="button" class="btn "
                    style="float: right; color: #fff; background-color: #6c757d; border-color: #6c757d">Next Academic
                Term
            </button>
        </p>

        <!-- JS script to control the display of course list, the other term's course information
        will be hided while one term's is displaying. It also changes the button color and subheading to remind
        user which term's course is displaying -->
        <script type="text/javascript">
            var current = document.getElementById("current");
            var next = document.getElementById("next");
            current.onclick = function () {
                document.getElementById("term").innerHTML = "2019/20 Winter";
                document.getElementById("winterCourse").style.display = "";
                document.getElementById("summerCourse").style.display = "none";
                current.style.backgroundColor = "#007bff";
                current.style.borderColor = "#007bff";
                next.style.backgroundColor = "#6c757d";
                next.style.borderColor = "#6c757d";
            }

            next.onclick = function () {
                document.getElementById("term").innerHTML = "2019/20 Summer";
                document.getElementById("summerCourse").style.display = "";
                document.getElementById("winterCourse").style.display = "none";
                next.style.backgroundColor = "#007bff";
                next.style.borderColor = "#007bff";
                current.style.backgroundColor = "#6c757d";
                current.style.borderColor = "#6c757d";
            }

        </script>

        <!-- Course list -->
        <div class="container">
        <table id="winterCourse" class="table table-hover table-expandable table-sticky-header "><?php
            readCourse("db/course_list.csv","Winter 2020");
            ?>
        </table>
        <table id="summerCourse" class="table table-hover table-expandable table-sticky-header" style="display: none;">
            <?php
            readCourse("db/course_list.csv","Summer 2020");
            ?>
        </table>


        </div>

    </main>


<?php include "includes/footer.php"; ?>

