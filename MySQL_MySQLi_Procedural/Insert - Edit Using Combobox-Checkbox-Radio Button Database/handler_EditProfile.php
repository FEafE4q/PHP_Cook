<?php
  include('config.php');

  if (isset($_POST['save'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $hobby = implode(', ', $_POST['hobby']);

    mysqli_query($con, "UPDATE `regUser` SET name = '$name', hobby = '$hobby' WHERE id = '$id'");
    header('location:index.php?editdatasuccesses');
    }
 ?>