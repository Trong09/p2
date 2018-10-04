<?php

# Initiate session
session_start();

# Determine if variable is set and is not NULL for submit form
if (isset($_SESSION['drug'])) {
    $drug = $_SESSION['drug'];
}

if (isset($_SESSION['quantity'])) {
    $quantity = $_SESSION['quantity'];
}

if (isset($_SESSION['unit'])) {
    $unit = $_SESSION['unit'];
}

if (isset($_SESSION['miscellaneous'])) {
    $miscellaneous = $_SESSION['miscellaneous'];
}

if (isset($_SESSION['location'])) {
    $location = $_SESSION['location'];
}

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}

# send email from PHPMailer Class
if(isset($_GET['submit']) and !$hasErrors) {

    # Insert content of PHPMailer class
    require 'phpmailer/PHPMailerAutoload.php';

    # Initiate PHPMailer Object
    $mail = new PHPMailer;

    # PHPMailer Settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'Trongnguyen10990@gmail.com';
    $mail->Password = 'Shower31';

    # Default Mail From.
    $mail->From = "Trongnguyen10990@gmail.com";
    $mail->FromName = "Trong Nguyen";

   # Mail address of user's input
    $mail->addAddress($email, " ");

    # Reply to email
    $mail->addReplyTo("Trongnguyen10990@gmail.com", "Reply");


    # Send email in HTML format
    $mail->isHTML(true);
    $mail->Subject = "$location Pharmacy Stock Order";
    $mail->Body =
    "<body>
        <h1>$location Stock Order</h1>
        <p>I would like to order the following drug:<br>
        $drug $quantity $unit<br>
        $miscellaneous<br>
        Thank You,<br>
        Trong</p>
     </body>";

    # Send email, if not successful print not sent else reset session
    if(!$mail->send()) {
        echo 'Message was not sent.';

    } else {
        session_destroy();
    }
}

# Redirect back to the form index.php
header('Location: index.php');
