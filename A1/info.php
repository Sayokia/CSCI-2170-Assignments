<!-- import the PHP functions -->
<?php
include "includes/functions.php";
?>
<!-- Some code reused from index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="author" content="Yanlin Zhu"/>
    <meta name="description" content="The first assignment for CSCI 2170"/>
    <title>Index</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- The CSS defined by myself for some customized styles -->
    <link href="css/myStyle.css" rel="stylesheet">
</head>
<body>
<header>
    <!-- Create a fixed, responsive by using BootStrap defined CSS styles -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <a class="navbar-brand" href=" "><img src="img/logo.jpg" alt="Logo" height="40"> Dalhousie Univeristy</a>
        <!-- Change the nav bar style for mobile device by using drop down button -->
        <button aria-label="drop down menu" class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="nav">
            <ul class="navbar-nav bg-dark">
                <li class="nav-item"><a class="nav-link" href="index.php" style="color: white"> Index </a></li>
                <li class="nav-item"><a class="nav-link" href="info.php" style="color: white"> Info </a></li>
                <li class="nav-item"><a class="nav-link" href="mailto:yn842496@dal.ca" style="color: white"> Email
                        ME </a></li>

            </ul>
        </div>
</header>
<main>
    <!-- This div is used to be covered by the fixed nav bar -->
    <div style="padding-top: 60px;"></div>
    <div>
        <img src="img/homepage.jpeg"
             alt="Img retrieved from https://images.pexels.com/photos/3244513/pexels-photo-3244513.jpeg?auto=compress&crop=focalpoint&cs=tinysrgb&fit=crop&h=750.0&sharp=10&w=3000 "
             width="100%">
    </div>
    <div class="container">
        <section>
            <p>Etiam neque enim, dignissim sit amet fermentum et, aliquet vel quam. Vivamus non pulvinar turpis, vel
                blandit tellus. Sed ac turpis nec nibh sagittis aliquam lobortis eget turpis. Aliquam volutpat lacus sed
                lacinia mollis. Aenean ultricies ut sem ut scelerisque. Class aptent taciti sociosqu ad litora torquent
                per conubia nostra, per inceptos himenaeos. Morbi id consectetur lectus. Morbi ut sem et risus
                condimentum pharetra vestibulum ut est. Fusce eu lacinia dui, eu condimentum tellus. Curabitur dapibus,
                odio at tincidunt viverra, odio nisl venenatis nisl, eget scelerisque dui mauris eget tellus. Nunc
                dictum quam a erat ullamcorper, in malesuada libero vehicula. Suspendisse interdum orci hendrerit lacus
                facilisis vestibulum. Nullam in est sit amet ipsum condimentum ullamcorper.</p>
            <!-- File read task 3, which containing all the external resources I used or referred to in this two web pages -->
            <h2>References</h2>
            <p>
                <?php readText("files/citations.txt");
                ?>
            </p>
        </section>
    </div>
</main>
<footer id="endFooter">
    <div class="container">
        <div id="copyRight">&copy;Dalhousie University CSCI 2170
        </div>
    </div>
</footer>
<!-- jQuery first, then Bootstrap JS, then Popper.js -->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
</body>
</html>
