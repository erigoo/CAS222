<?php

$myemail  = "ericka.calvo@pcc.edu";

$yourname = check_input($_POST['fname'], "Enter your name");
$email    = check_input($_POST['email']);
$comments  = check_input($_POST['comments']);

/*$emergency   = check_input($_POST['emergency']);
$emergencyphone = check_input($_POST['emergency phone']);
$event = check_input($_POST['event']);*/

if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
    
{
    show_error("E-mail address not valid");
}

{
    $website = '';
}

$subject = "Thank you for contacting us!";
$message = "Hello!

A new contact information has come in for:

Name: $yourname
E-mail: $email
Comments: $comments

End of message
";

mail($myemail, $subject, $message);

header('Location: contactThanks.html');
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
