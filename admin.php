<?php
include('dbconnect.php');
include('functions.php');

#if someone logs-in through the URL, he is redirected to the index page.
if(!isset($_SESSION['email']) ||!isset($_SESSION['logintype']) )
    {
       header("Location:index.php");
       echo "1";
    }
    if ( $_SESSION['logintype'] != 'ADMIN' ) {
       header("Location:index.php");
        echo "2";
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
         <li><a href="create_user.php">Create user</a></li>
         <li><a href="logout.php">Logout</a></li>
          <li><?php echo "Admin: ", $_SESSION["email"] ?></li>
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

          <?php
$sql = "SELECT * FROM users";
$result = mysqli_query($data, $sql);
if ($result)
{

    while ($row = mysqli_fetch_assoc($result))
    {
        $id = $row['id'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $usertype = $row['usertype'];
        echo '<tr>
                 <th scope="row">' . $id . '</th>
                 <td>' . $firstname . '</td>
                 <td>' . $lastname . '</td>
                 <td>' . $email . '</td>
                 <td>' . $usertype . '</td>
                 <td>
                 <div class="actionbuttons">
                 <button type="submit" class="btn btn-success" name="update"><a href="update.php?updateid='.$id.'" class="text-light">Update</a></button>
                 <button type="button" class="btn btn-danger" name="delete"><a href="delete.php?deleteid='.$id.'" class="text-light" >Delete</a></button>
                </div>
                 </td>
                </tr>';

    }

}
?>
        </tbody>

</table>




  </body>

</html>
