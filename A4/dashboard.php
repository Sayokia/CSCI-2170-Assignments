<?php
    // Initialize the session
    session_start();

    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php?error=1");
        exit;
    }

    require_once "db/db.php";
    require  "includes/function.php";




    require "includes/header.php";
    require "includes/nav.php";

    if (isset($_GET["complete"]) && isset($_GET["status"])) {
      $cptID = trim($_GET["complete"]);
      $status = trim($_GET["status"]);
      if (markDoneTODOlist($cptID,$status)) {
        header("Location: dashboard.php");
      }
    }

    if (isset($_GET["delete"])) {
      $delID = trim($_GET["delete"]);
      if (deleteTODOList($delID)) {
        header("Location: dashboard.php");
      }
    }


if (isset($_GET['newListName']) && isset($_GET['changeID'])){
    $name = $_GET['newListName'];
    $id = $_GET['changeID'];
    $sql = "UPDATE alllists SET `list_name` = '$name' WHERE list_id = '$id'";
    if (!$conn->query($sql)) {
        die ("Nooooooooo!" . $conn->error);
    }
}


?>

<main>
    <h1 class="text-center">Your TODO Lists</h1>
    <div class="text-center"> <a class="btn btn-outline-primary" href="newList.php">Create a new TODO list</a> </div>
    <br>

    <table class="table table-sm text-center">
        <thead>
        <tr>
            <th style="width: 40%" scope="col">List Name</th>
            <th style="width: 20%" scope="col">List Status</th>
            <th style="width: 30%" colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT list_id, list_name, list_archived FROM alllists WHERE list_user_id = {$_SESSION['user_id']}";

        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td style='width: 50%'>{$row['list_name']}</td>";

                if ($row['list_archived'] == 0){
                    echo "<td style='width: 20%'>Done</td>";
                    $doneText = "Mark as Not done";

                }
                else{
                    echo "<td style='width: 20%'>Not Done</td>";
                    $doneText = "Mark as done";


                }
                echo "<td style='width: 10%;'><a href='viewList.php?id={$row['list_id']}'>Edit</a></td>";
                echo "<td style='width: 10%;'><a href='dashboard.php?complete={$row['list_id']}&status={$row['list_archived']}'>$doneText</a></td>";
                echo "<td style='width: 10%;'><a href='dashboard.php?delete={$row['list_id']}'>Delete</a></td>";

                echo "</tr>";
                if (isset($_GET['edit'])){
                    echo "<tr>";
                    echo "<td style='width: 10%'></td>";
                    echo "<td colspan='5'><form action='dashboard.php' method='get'><input style='width: 40%;display: inline-block'  type='text' name='newListName' placeholder='Please enter your new list name'>
                                <input type='text' value='{$row['list_id']}' name='changeID' style='display: none'>
                                <input style='min-width: 128.64px; display: inline-block; margin-left: 10%; height: 38px;' class='btn btn-primary' type='submit' value='Submit'>
                                <a style='width: 10%;' class='btn btn-secondary' href='dashboard.php'>Cancel</a> 
                                </form>";
                    echo "</tr>";
                }
            }
        }

        else{
            echo "<h4 class='text-center' style='color: red'> You do not have any TODO Lists. You can start manage your lists by create a new one!</h4>";
        }

        ?>
        </tbody>
    </table>
    <?php
    echo "<div class='text-center'> <a class=' btn btn-primary' href='dashboard.php?edit=1'>Quick Edit</a></div><br>";
    ?>

</main>

<?php
require "includes/footer.php"
?>
