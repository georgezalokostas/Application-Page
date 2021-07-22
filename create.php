<?php
include("dbconnect.php");

if(!isset($_SESSION['email'])){
  header("location:index.php");
}



if(isset($_POST['submit'])){

  $firstname  = $_POST['firstname'];
  $lastname   = $_POST['lastname'];
  $email      = $_POST['email'];
  $password   = $_POST['password'];
  $password2  = $_POST['password2'];
  $usertype   = $_POST['usertype'];

  if ($_POST['password']!= $_POST['password2'])
   {
       echo("Oops! Password did not match! Try again. ");

   }else{
     $sql="INSERT INTO users  (firstname,lastname,email,password,usertype) VALUES ('$firstname','$lastname','$email','$password','$usertype')";

     $result = mysqli_query($data,$sql);
     if($result){
       header("location:admin.php");

     }else{
         die(mysqli_error($data));
     }
   }

}

?>

<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" >
	<title>Create new user</title>
</head>

<body>
      <div class="container my-5">
          <h3> Create new user</h3>
          <form method="POST" action="create.php">
            <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" class="form-control" placeholder="Enter first name" name="firstname" autocomplete="off">
            </div><br>

            <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="text" class="form-control" placeholder="Enter last name" name="lastname" autocomplete="off">
            </div><br>

            <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="text" class="form-control" placeholder="Enter email" name="email" autocomplete="off">
            </div><br>

            <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="text" class="form-control" placeholder="Enter password" name="password" autocomplete="off">
            </div><br>

            <div class="form-group">
            <label for="exampleInputEmail1">Re-enter Password</label>
            <input type="text" class="form-control" placeholder="Re-enter password" name="password2" autocomplete="off">
            </div><br>

            <div class="form-group">
              <h6>Type of User</h6>
              <select name="usertype">
                <option value="user">User</option>
                <option value="admin">Admin</option>
             </select>
            </div><br>
          <button type="submit" class="btn btn-outline-success" name="submit">Submit</button>
          <a class="btn btn-outline-danger" href="admin.php" role="button">Return</a>
      </form>

      </div>


</body>

</html>
