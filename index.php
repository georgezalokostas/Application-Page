<?php
include("dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE
  email= '" . $email . "' AND password = '" . $password . "' ";

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    if($row){
    if ($row["usertype"] == "admin")
    {
        $_SESSION["email"] = $email;
        $_SESSION["id"] = $id;
        $_SESSION["logintype"] = 'ADMIN';
        header("location:admin.php");
    }
    elseif ($row["usertype"] == "user")
    {
        $_SESSION["email"] = $email;
        $_SESSION["logintype"] = 'USER';
        header("location:user.php");
    }

  }else
  {
      echo "Email or password incorrect";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" >
	<title>Login</title>
</head>

<body>
      <div class="container my-5">
          <h3> Log-in page</h3>
          <form method="POST">
            <label>Email address</label>
            <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off"><br>

          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Enter your password" name="password" autocomplete="off">
          </div><br>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>


</body>

</html>
