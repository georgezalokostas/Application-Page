<?php
include('dbconnect.php');
include('functions.php');

$action = $_GET['action'];
$uniqid = $_GET['uniqid'];

$sql = "SELECT * FROM applications WHERE uniqid='$uniqid'";
$result = mysqli_query($con, $sql);
if ($result && $action=="accept")
{
  $row = mysqli_fetch_assoc($result);
  $email = $row['email'];
  $dateSubmitted = $row['datesubmitted'];
  $option = 'accepted';
  $query = "UPDATE applications SET status='approve' WHERE uniqid='$uniqid'";
  $result = mysqli_query($con, $query);
  sendEmailToUser($email,$dateSubmitted,$option);


} elseif ($result && $action=="decline"){
  $row = mysqli_fetch_assoc($result);
  $email = $row['email'];
  $dateSubmitted = $row['datesubmitted'];
  $option = 'rejected';
  $query = "UPDATE applications SET status='decline' WHERE uniqid='$uniqid'";
  $result = mysqli_query($con, $query);
  sendEmailToUser($email,$dateSubmitted,$option);
}
