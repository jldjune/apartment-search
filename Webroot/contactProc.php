<?php
error_reporting(-1);
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$message = $_POST['message'];

$contact_email = 'jose.diaz23@gmail.com';
$subject = 'PHP Course Contact Form';
$headers = "From: $email\r\nReply-To: $email\r\n";

// Build the email body containing the user information and the message
$msg = "Email from Contact Form\n";
$msg .= "First Name: $firstName\n";
$msg .= "Last Name: $lastName\n";
$msg .= "Email: $email\n";
$msg .= "Comments: \n$message\n";

// Tell php to try to send email
$mailSent = mail($contact_email, $subject, $msg, $headers);

?><!doctype html>
<body>
    
    <h1><?php echo "Hi $firstName $lastName!"; ?></h1>
    
    <h2><?php
        if ($mailSent){
            echo "Your message was sent. Thank you.";
        }
        else {
            echo "Could not send the message. Please try again";
        }
    ?></h2>

</body>