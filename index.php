<?php

$host = "localhost";
$user = "root";
$password = "";
$db= "posts";

session_start();

$data = mysqli_connect($host,$user,$password,$db);
if ($data==false){
  die("connection error");
}

if ($_SERVER["REQUEST_METHOD"]=="POST"){
  $email=$_POST["email"];
  $password=$_POST["password"];

  $sql="SELECT * FROM users WHERE
  email= '" .$email. "' AND password = '" .$password. "' ";

  $result = mysqli_query($data,$sql);
  $row = mysqli_fetch_array($result);

  if ($row["usertype"]=="admin"){
    $_SESSION["email"]=$email;
    header("location:admin.php");
  }
  elseif ($row["usertype"]=="user"){
    $_SESSION["email"]=$email;
    header("location:loggedin.php");
  }
  else {
    echo "username or password incorrect";
  }
}


?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<body>
<center>
	<h1>Login Form</h1>
	<br><br><br><br>
	<div style="background-color: grey; width: 500px;">
  	<br><br>
  	<form action="#" method="POST">
  	<div>
    	<label>Email</label>
    	<input type="text" name="email" required>
    	</div>
      	<br><br>
      	<div>
        	<label>Password</label>
        	<input type="password" name="password" required>
      	</div>
      	<br><br>
    	<div>
    		<input type="submit" value="Login">
  	</div>
  	</form>
  	<br><br>
  </div>
</center>

</body>

</html>
