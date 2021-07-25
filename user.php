<?php
include('dbconnect.php');
include('functions.php');

if(!isset($_SESSION['email']) ||!isset($_SESSION['logintype']) )
    {
       header("Location:index.php");
    }
    if ( $_SESSION['logintype'] != 'USER' ) {
       header("Location:index.php");
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
       <li><?php echo "User: ", $_SESSION["email"] ?></li>
        </ul>


        <table class="table">
        <thead>
          <tr>
            <th scope="col">Date submitted</th>
            <th scope="col">Dates requested</th>
            <th scope="col">Days requested</th>
            <th scope="col">Status</th>

          </tr>
        </thead>
        <tbody>

          <?php
          $email = $_SESSION["email"];
          $sql = "SELECT * FROM applications WHERE email='$email' ORDER BY datesubmitted DESC ";
          $result = mysqli_query($con, $sql);
          if ($result)
          {
              while ($row = mysqli_fetch_assoc($result))
              {
                  $datesubmitted = $row['datesubmitted'];
                  $datefrom = $row['vacationstart'];
                  $dateto = $row['vacationend'];
                  $status = $row['status'];
                  $datediff = dateDiffInDays($datefrom,$dateto);
                  echo '<tr>
                             <th scope="row">' . date('d-m-Y', strtotime($datesubmitted)) . '</th>
                             <td>From: ' . date('d-m-Y', strtotime($datefrom)) . ' <br>To: ' . date('d-m-Y', strtotime($dateto)) . '</td>
                             <td>' . $datediff . '</td>
                             <td>' . $status . '</td>
                            </tr>';
              }

          }
?>
          </tbody>

</table>




  </body>

</html>
