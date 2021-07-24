<?php
include('dbconnect.php');

$action = $_GET['action'];
$uniqid = $_GET['uniqid'];

$sql = "SELECT * FROM applications WHERE uniqid='$uniqid'";
$result = mysqli_query($data, $sql);
if ($result && $action=="accept")
{
  $row = mysqli_fetch_assoc($result);
  $query = "UPDATE applications SET status='approve' WHERE uniqid='$uniqid'";
  $result = mysqli_query($data, $query);

} elseif ($result && $action=="decline"){
  $row = mysqli_fetch_assoc($result);
  $query = "UPDATE applications SET status='decline' WHERE uniqid='$uniqid'";
  $result = mysqli_query($data, $query);
}
