<?php

function dateDiffInDays($date1, $date2)
{
    // Calculating the difference in timestamps
    $diff = strtotime($date2) - strtotime($date1);

    // 1 day = 24 hours
    // 24 * 60 * 60 = 86400 seconds
    return abs(round($diff / 86400));
}

function sendEmail($email,$datefrom,$dateto,$reason){

$to      = 'gzalos6@gmail.com';
$subject = 'Pending verification for user\'s vacation dates';
$headers = 'From: ' . $email;
$body =
'Dear supervisor, employee '.$email.' requested for some time off, starting on '. $datefrom .' and ending on '.$dateto.', stating the reason:
'.$reason.'. \nClick on one of the below links to approve or reject the application:
{approve_link} - {reject_link} ';


if (mail($to, $subject, $body, $headers)){
  echo "Email sent successfully to $to";
}else{
  echo "There was a problem sending the email";
}

}
