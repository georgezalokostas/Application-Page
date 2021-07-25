<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db= "posts";

$con = mysqli_connect($host,$user,$password,$db);
if (!$con){
  die(mysql_error($con));
}
