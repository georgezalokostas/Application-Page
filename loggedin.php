<?php
session_start();
if(!isset($_SESSION["email"])){
  header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title></title>
  </head>
  <body>

    <ul>
      <li><a href="logout.php">Logout</a></li>
      <li><?php echo "User: " ,$_SESSION["email"] ?></li>
    </ul>

  </body>
</html>
