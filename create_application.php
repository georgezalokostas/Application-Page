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
          <h3> Choose your desired dates!</h3>
          <form method="POST" action="create_application.php">
            <div class="form-group">
            <label for="exampleInputEmail1">Date from</label>
            <input type="date" class="form-control" placeholder="Enter first name" name="firstname" autocomplete="off">
            </div><br>

            <div class="form-group">
            <label for="exampleInputEmail1">Date to</label>
            <input type="date" class="form-control" placeholder="Enter last name" name="lastname" autocomplete="off">
            </div><br>

            <div class="form-group">
            <label for="exampleInputEmail1">Reason</label>
            <input type="text" class="form-control" placeholder="Tell us a bit about your request" name="reason" autocomplete="off">
            </div><br>

             <button type="submit" class="btn btn-outline-success" name="submit">Submit</button>
             <a class="btn btn-outline-danger" href="user.php" role="button">Return</a>
            </div><br>

      </form>

      </div>


</body>

</html>
