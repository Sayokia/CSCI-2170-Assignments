<!-- import the PHP functions -->
<?php
include "includes/functions.php";
?>
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
    </nav>

</header>
<main>
    <!-- This div is used to be covered by the fixed nav bar -->
    <div style="padding-top: 60px;"></div>
    <div>
        <img src="img/homepage.jpeg"
             alt="Homepage"
             width="100%">
    </div>
    <div class="container">
        <!-- The main section containing contents -->
        <section>
            <!-- use BootStrap to create a login form -->
            <div class="card float-right " id="login">
                <div class="card-body">
                    <!-- set method to post and action to index.php in the form -->
                    <form action="index.php" method=post>
                        <h5>User Login</h5>
                        <div class="form-group">
                            <label for="username">Email address</label>
                            <input type="text" class="form-control" id="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary ">Login</button>

                        </div>
                    </form>
                </div>
            </div>
            <p>
                Etiam neque enim, dignissim sit amet fermentum et, aliquet vel quam. Vivamus non pulvinar turpis, vel
                blandit tellus. Sed ac turpis nec nibh sagittis aliquam lobortis eget turpis. Aliquam volutpat lacus sed
                lacinia mollis. Aenean ultricies ut sem ut scelerisque. Class aptent taciti sociosqu ad litora torquent
                per conubia nostra, per inceptos himenaeos. Morbi id consectetur lectus. Morbi ut sem et risus
                condimentum pharetra vestibulum ut est. Fusce eu lacinia dui, eu condimentum tellus. Curabitur dapibus,
                odio at tincidunt viverra, odio nisl venenatis nisl, eget scelerisque dui mauris eget tellus. Nunc
                dictum quam a erat ullamcorper, in malesuada libero vehicula. Suspendisse interdum orci hendrerit lacus
                facilisis vestibulum. Nullam in est sit amet ipsum condimentum ullamcorper.
            </p>
            <p>
            </p>
            <a href="info.php">
                http://localhost/A1/info.php
            </a>
            <p></p>
            <p>
                Suspendisse malesuada, ipsum eget vulputate cursus, ligula nulla fringilla leo, eget ultricies est felis
                quis ligula. Donec id felis interdum, vulputate lectus lacinia, tincidunt est. Aliquam in arcu vitae est
                fermentum euismod vel ac metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                cubilia Curae; Vestibulum risus metus, bibendum molestie mauris nec, ultricies feugiat sapien.
                Pellentesque eu lobortis magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur
                ridiculus mus. Vestibulum sed tristique risus. Cras ultricies convallis magna sit amet hendrerit. Etiam
                a neque sagittis, sodales nisl non, fermentum mauris. Suspendisse potenti. Interdum et malesuada fames
                ac ante ipsum primis in faucibus. Praesent at lacinia lorem, eget ultricies orci. Aliquam sapien nulla,
                consequat ac convallis accumsan, rutrum quis metus. Vivamus dignissim sem eget ex aliquet, vel
                consectetur velit dignissim. Phasellus id urna semper, commodo ipsum sit amet, feugiat nisi.
            </p>

            <!-- File read task 1, read text from integrity.txt which is the definition of plagiarism quoted from Dalhousie University -->
            <h3>Academic Integrity</h3>
            <div class="row">
                <!-- Use card to contain the text and separate it from the img -->
                <div class="card col-6">
                    <div class="card-body">
                        <!-- This part is a block quote that is quoted directly from Dalhousie University -->
                        <blockquote class="blockquote">
                            <p>
                                <?php readText("files/integrity.txt");
                                ?>
                            </p>
                            <footer class="blockquote-footer text-right">Dalhousie University</footer>
                            <blockquote>
                    </div>
                </div>
                <img src="img/integrity.png" class="col-6" alt="integrity">
            </div>

            <!-- File read task 2, read text from pledge.txt which is the pledge I made -->
            <h3>Pledge</h3>
            <div class="row">
                <div class="card col-6">
                    <div class="card-body">
                        <p>
                            <?php readText("files/pledge.txt");
                            ?>
                        </p>

                    </div>
                </div>
                <img src="img/pledge.jpg" class="col-6" alt="integrity">
            </div>


        </section>

    </div>

</main>

<!-- the footer of the page, use Id to distinguish it from the quote footer above -->
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