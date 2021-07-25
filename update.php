<?php
include ("dbconnect.php");

#Get id from url, and prepopulate the cells
$id = $_GET['updateid'];
$query = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($data, $query);
$row = mysqli_fetch_assoc($result);
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$email = $row['email'];
$password = $row['password'];
$usertype = $row['usertype'];

#After the update button, we query the new values
if (isset($_POST['update']))
{

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2  = $_POST['password2'];
    $usertype = $_POST['usertype'];

    if ($password!= $password2){
         echo("Oops! Password did not match! Try again. ");

     }
     #blank fields
     elseif(empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($password2))
     {
        echo ("Oops! Some fields were left blank.");
     }
     #email doesn't have @something.com
     elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       echo ("Wrong email type");
     }


     else{

    $sql = " UPDATE users SET
    firstname='$firstname',
    lastname='$lastname',
    email='$email',
    password='$password',
    usertype='$usertype'
    WHERE id= $id ";

    $result = mysqli_query($con, $sql);
    if ($result)
    {
        header("location:admin.php");
    }
    else
    {
        die(mysqli_error($con));
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
          <h3> Update user</h3>
          <form method="POST" action="update.php?updateid=<?php echo $id ?>">
            <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" placeholder="Enter first name" name="firstname" autocomplete="off" value=<?php echo $firstname ?>>
            </div><br>

            <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" placeholder="Enter last name" name="lastname" autocomplete="off" value=<?php echo $lastname ?>>
            </div><br>

            <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" placeholder="Enter email" name="email" autocomplete="off" value=<?php echo $email ?>>
            </div><br>

            <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" placeholder="Enter password" name="password" autocomplete="off">
            </div><br>

            <div class="form-group">
            <label>Re-enter Password</label>
            <input type="text" class="form-control" placeholder="Re-enter password" name="password2" autocomplete="off">
            </div><br>

            <div class="form-group">
              <h6>Type of User</h6>
              <select name="usertype">
                <option value="user">user</option>
                <option value="admin">admin</option>
             </select>
            </div><br>
          <button type="submit" class="btn btn-outline-success" name="update" value="submit">Update</button>
          <a class="btn btn-outline-danger" href="admin.php" role="button">Return</a>


      </form>

      </div>


</body>

</html>
