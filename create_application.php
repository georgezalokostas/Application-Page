<?php
include ("dbconnect.php");
include ("functions.php");

if (!isset($_SESSION['email']))
{
    header("location:index.php");
}

if (isset($_POST['submit']))
{ #Format to Y-m-d, that's the format in the database!
    $uniqid = uniqid();
    $datefrom = date('Y-m-d', strtotime($_POST['datefrom']));
    $dateto = date('Y-m-d', strtotime($_POST['dateto']));
    $datesubmitted = date('Y-m-d');
    $reason = $_POST['reason'];
    $email = $_SESSION['email'];

    #empty textbox
    if (empty($reason))
    {
        echo ("Please state your reason");
    }
    # date from is not equal to past days or today
    elseif (dateDiffInDays($datesubmitted, $datefrom) <= 0)
    {
        echo ("Please enter valid dates. You can't start from past days or today.");
    }
    # date to is greater than date from
    elseif (dateDiffInDays($datefrom, $dateto) <= 0)
    {
        echo ("Date to can't start earlier than Date from.");
    }
    else
    {
        $sql = "INSERT INTO applications  (email,datesubmitted,vacationstart,vacationend,reason,uniqid) VALUES ('$email','$datesubmitted','$datefrom','$dateto','$reason','$uniqid')";
        $result = mysqli_query($data, $sql);
        if ($result)
        {
            sendEmailToSupervisor($email, $datefrom, $dateto, $reason, $uniqid);
            #header("location:user.php");

        }
        else
        {
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
          <h5> Date from field can't start from today. </h5><br>
          <form method="POST" action="create_application.php">
            <div class="form-group">
            <label>Date from</label>
            <input type="date" class="form-control" placeholder="Enter first name" name="datefrom" autocomplete="off">
            </div><br>

            <div class="form-group">
            <label>Date to</label>
            <input type="date" class="form-control" placeholder="Enter last name" name="dateto" autocomplete="off">
            </div><br>

            <div class="form-group">
            <label>Reason</label><br>
            <textarea id="reason" name="reason" rows="4" cols="50" placeholder="Tell us a bit about the reason of applying"></textarea>
            </div><br>

             <button type="submit" class="btn btn-outline-success" name="submit">Submit</button>
             <a class="btn btn-outline-danger" href="user.php" role="button">Return</a>
            </div><br>



      </form>

      </div>


</body>

</html>
