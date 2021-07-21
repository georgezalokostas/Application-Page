<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db= "posts";

$data = mysqli_connect($host,$user,$password,$db);
if (!$data){
  die(mysql_error($data));
}
