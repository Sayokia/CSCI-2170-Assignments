<?php
    // Initialize the session
    session_start();

    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php?error=1");
        exit;
    }

    if(!isset($_GET["id"])){
        header("location: dashboard.php");
        exit;
    }else {
      $id = trim($_GET["id"]);
    }


    require "db/db.php";
    require "includes/function.php";



    require "includes/processform.php";
    require "includes/header.php";
    require "includes/nav.php";


  if(isset($_POST["name"])){
    $name = purgeCharacter($_POST["name"]);
    if (empty($name)) {
      $name = "Default TODO Item";
    }
    if (addTODOitem($name,$id)) {
      header("Location: viewList.php?id=$id");
    }
  }


?>

<main>
    <h1 class="text-center"><?php echo getListName($id); ?></h1>
    <div class="text-center">
      <form method="post">
      <input type="text" class="form-control" placeholder="Please type the TODO item name" name="name" aria-label="Name" aria-describedby="Please type the TODO List name" required>
<button class="btn btn-outline-primary">Add New TODO</button> </div>
</form>
    <br>

    <table class="table table-sm text-center">
        <thead>
        <tr>
            <th style="width: 40%" scope="col">Item Name</th>
            <th style="width: 20%" scope="col">Item Status</th>
            <th style="width: 30%" colspan="2">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $sql = "SELECT * FROM mylist WHERE l_list_id  = $id";

        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td style='width: 50%'>{$row['l_item']}</td>";

                if ($row['l_done'] == 0){
                    echo "<td style='width: 20%'>Done</td>";
                    $doneText = "Mark as Not done";
                }
                else{
                    echo "<td style='width: 20%'>Not Done</td>";
                    $doneText = "Mark as done";
                }

                if ($row['l_done'] == 1){
                    echo "<td style='width: 15%;'><a href='viewList.php?id={$row['l_list_id']}&complete={$row['l_id']}'>Mark as done</a></td>";
                }
                else{
                    echo "<td style='width: 15%;'><a href='viewList.php?id={$row['l_list_id']}&complete={$row['l_id']}&notdone=1'>Mark as not done</a></td>";
                }

                echo "<td style='width: 15%;'><a href='viewList.php?id={$row['l_list_id']}&delete={$row['l_id']}'>Delete</a></td>";

                echo "</tr>";
            }
        }
        else{
            echo "<h4 class='text-center' style='color: red'> You do not have any TODO Items. You can start manage your items by create a new one!</h4>";
        }
        ?>
        </tbody>
    </table>

</main>

<?php
require "includes/footer.php"
?>
