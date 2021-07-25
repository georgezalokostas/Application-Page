<?php

#difference between dates
function dateDiffInDays($date1, $date2)
{
    // Calculating the difference in timestamps
    $diff = strtotime($date2) - strtotime($date1);

    // 1 day = 24 hours
    // 24 * 60 * 60 = 86400 seconds

    //return abs(round($diff / 86400));
    return round($diff / 86400);
}

#random id number for each user's submit
function createguid()
{
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid() , '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535) , mt_rand(0, 65535) , mt_rand(0, 65535) , mt_rand(16384, 20479) , mt_rand(32768, 49151) , mt_rand(0, 65535) , mt_rand(0, 65535) , mt_rand(0, 65535));
}

#send email to the supervisor
function sendEmailToSupervisor($email, $datefrom, $dateto, $reason, $uniqid)
{
    $accept = 'http://localhost:8080/project/validation.php?action=accept&uniqid=' . $uniqid . '';
    $decline = 'http://localhost:8080/project/validation.php?action=decline&uniqid=' . $uniqid . '';

    $to = 'gzalos6@gmail.com';
    $subject = 'Pending verification for user\'s vacation dates';
    $headers = 'From: ' . $email;
    $body = "Dear supervisor, employee $email requested for some time off, starting on $datefrom and ending on $dateto, stating the reason:\n $reason . \nClick on one of the below links to approve or reject the application:\nAccept: $accept\nDecline: $decline ";

    if (mail($to, $subject, $body, $headers))
    {
        echo "Email sent successfully to $to";

    }
    else
    {
        echo "There was a problem sending the email";
    }

}

#send email to the user
function sendEmailToUser($email, $dateSubmitted,$option)
{
    $to = $email;
    $subject = 'Update on your recent vacation application';
    $headers = 'From: admin@gmail.com';
    $body = " Dear employee, your supervisor has $option your application submitted on $dateSubmitted. ";

    if (mail($to, $subject, $body, $headers))
    {
        echo "You have successfully $option the application.\nAn email has been sent.";
    }
    else
    {
        echo "There was a problem sending the email";
    }
}
