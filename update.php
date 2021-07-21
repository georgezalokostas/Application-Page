<?php
include ("dbconnect.php");

if (!isset($_SESSION['email']))
{
    header("location:index.php");
}

$id = $_GET['updateid'];

if (isset($_post['submit']))
{
    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $email     = $_POST['email'];
    $password  = $_POST['password'];
    $usertype  = $_POST['usertype'];

    $sql = " UPDATE users SET
    id = $id,
    firstname='$firstname',
    lastname='$lastname',
    email='$email',
    password='$password',
    usertype='$usertype'
    WHERE id=$id ";

    $result = mysqli_query($data, $sql);
    if ($result)
    {
        echo("data success");
        #header("location:admin.php");
    }
    else
    {
        die(mysqli_error($data));
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
          <h3> Update user</h3>
          <form method="POST" action="update.php">
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
              <h6>Type of User</h6>
              <select name="usertype">
                <option value="user">user</option>
                <option value="admin">admin</option>
             </select>
            </div><br>
          <button type="submit" class="btn btn-outline-success" name="submit">Update</button>
          <a class="btn btn-outline-danger" href="admin.php" role="button">Return</a>
      </form>

      </div>


</body>

</html>
