<?php
session_start();
if(!isset($_SESSION['email'])){
  header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/stylesheet.css">
  </head>

  <body>
        <ul>
        <div class="create">
         <li><a href="create.php">Create user</a></li></div>
         <li><a href="logout.php">Logout</a></li>
          <li><?php echo "Admin: " ,$_SESSION["email"] ?></li>
        </ul>

  </body>

</html>
