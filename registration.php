<?php

$myemail  = "ericka.calvo@pcc.edu";

$yourname = check_input($_POST['fname'], "Enter your name");
$email    = check_input($_POST['email']);
$phone  = check_input($_POST['phone']);
$emergency   = check_input($_POST['emergency']);
$emergencyphone = check_input($_POST['emergency phone']);
$event = check_input($_POST['event']);


if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}

{
    $website = '';
}

$subject = "Ace In the Hole New Registration";
$message = "Hello!

A new registration has come in for:

Name: $yourname
E-mail: $email
Phone: $phone
Emergency Contact: $emergency
Emergency Contact Phone: $emergencyphone
Event: $event

End of message
";

mail($myemail, $subject, $message);

header('Location: registrationThanks.html');
exit();

function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>
