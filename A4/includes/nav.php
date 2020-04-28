<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                if (isset($_SESSION["username"])){
                    echo $_SESSION["username"];
                }
                ?>
            </a>
            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 10px;">
                <a class="btn btn-outline-info"  href="profile.php" style="width: 100%;margin-bottom: 5px;">User Profile</a>
                <a class="btn btn-outline-primary" href='includes/logout.php' style="width: 100%"> Logout</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">List Dashboard</a>
        </li>
        <?php
        if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 0){
            echo "<li class=\"nav-item\">
            <a class=\"nav-link\" href=\"view_users.php\">View Users</a>
        </li>";
        }
        ?>
    </ul>
</nav>