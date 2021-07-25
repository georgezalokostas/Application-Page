<?php
if (!isset($_SESSION['email']))
{
    header("location:index.php");
}

include 'dbconnect.php';
if(isset($_GET['deleteid'])){
  $id = $_GET['deleteid'];

  $sql = "DELETE FROM users WHERE id=$id";
  $result = mysqli_query($con, $sql);
  if ($result){
    header('location:admin.php');
  }else{
    die(mysqli_error($con));
  }

}
