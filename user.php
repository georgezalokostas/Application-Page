<?php
include_once('dbconnect.php');

if(!isset($_SESSION["email"])){
  header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css\mycss.css">
  </head>

  <body>
        <ul>
         <li><a href="create_application.php">Submit request</a></li>
         <li><a href="logout.php">Logout</a></li>
       <li><?php echo "User: " ,$_SESSION["email"] ?></li>
        </ul>


        <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Email</th>
            <th scope="col">Type</th>
            <th scope="col">Actions</th>

          </tr>
        </thead>
        <tbody>


        </tbody>

</table>




  </body>

</html>
