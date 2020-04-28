<?php

//https://blog.csdn.net/Jeanphorn/java/article/details/51352053
/***
Validate the user input and purge the special characters
***/
function purgeCharacter($input){
  $regex = "/\/|\~|\!|\@|\#|\\$|\%|\^|\&|\*|\(|\)|\_|\+|\{|\}|\:|\<|\>|\?|\[|\]|\,|\.|\/|\;|\'|\`|\-|\=|\\\|\|/";
  return preg_replace($regex,"",$input);
}


/***
Validate the user input
1 for phone 2 for email
***/
function validateData($tag, $input){
  if ($tag == 1) {
    $regex = "/^[1-9]\d{2}-\d{3}-\d{4}$/";
  }else if($tag == 2) {
    $regex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
  }
  return preg_match($regex, $input);
}

function getTODOid($userid){
  require "db/db.php";
  $sql = "select count(*) from alllists where `list_user_id` = '$userid'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt->bind_result($id);
  while($stmt->fetch()){
    return $id+1;
    }

  //$result->close();
  $conn->close();
}

function addTODOList($name,$uid){
  $list_archived = 1;
  require "db/db.php";
  $name = $conn->real_escape_string($name);
  $uid = $conn->real_escape_string($uid);
  $sql = "INSERT INTO alllists (list_name, list_archived, list_user_id) VALUES (?,?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sii", $name, $list_archived, $uid);
  $stmt->execute();
  if ($stmt->affected_rows >0) {
    return true;
  }else{
    return false;
  }
  $conn->close();
}

function getListName($id){
  require "db/db.php";
  $id = $conn->real_escape_string($id);
  $sql = "SELECT list_name from alllists WHERE list_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $stmt->bind_result($name);
  while($stmt->fetch()){
    return $name;
    }
  //$result->close();
  $conn->close();
}

function addTODOitem($name,$lid){
  $list_archived = 1;
  require "db/db.php";
  $name = $conn->real_escape_string($name);
  $lid = $conn->real_escape_string($lid);
  $sql = "INSERT INTO mylist (l_item, l_done, l_list_id) VALUES (?,?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sii", $name, $list_archived, $lid);
  $stmt->execute();
  if ($stmt->affected_rows >0) {
    return true;
  }else{
    return false;
  }
  $conn->close();
}

function markDoneTODOlist($lid,$status){
  require "db/db.php";
  $lid = $conn->real_escape_string($lid);
  $status = $conn->real_escape_string($status);
  if ($status == 0) {
    $uStatus = "1";
  }else {
    $uStatus = "0";
  }

  $sql = "UPDATE alllists SET list_archived=? WHERE list_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $uStatus,$lid);
  $stmt->execute();
  if ($stmt->affected_rows >0) {
    return true;
  }else{
    return false;
  }
  $conn->close();
}

function deleteTODOList($lid){
  require "db/db.php";
  $lid = $conn->real_escape_string($lid);
  $sql_arr = array(
    "DELETE FROM mylist WHERE l_list_id='$lid' ",
    "DELETE FROM alllists WHERE list_id='$lid' ",
);
    $sql = implode(';', $sql_arr);
    $result = $conn->multi_query($sql);
    if($result === false){
        //echo $mysqli->error;
        return false;
    }else {
      return true;
    }
  $conn->close();
}



 ?>
