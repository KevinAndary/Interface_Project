<?php
require 'C:/xampp/htdocs/UpConstruction/assets/vendor/PHPMailer-master/src/Exception.php';
require 'C:/xampp/htdocs/UpConstruction/assets/vendor/PHPMailer-master/src/PHPMailer.php';
require 'C:/xampp/htdocs/UpConstruction/assets/vendor/PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                      // Send using SMTP
    $mail->Host       = 'smtp.office365.com';               // Set the SMTP server to send through (Replace with your SMTP server)
    $mail->SMTPAuth   = true;                             // Enable SMTP authentication
    $mail->Username   = 'no-reply1234567@hotmail.com';         // SMTP username
    $mail->Password   = 'myTe$t01';                  // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Enable TLS encryption; PHPMailer::ENCRYPTION_SMTPS for SSL
    $mail->Port       = 587;                              // TCP port to connect to

    // Recipients
    $mail->setFrom('no-reply1234567@hotmail.com', 'No Reply');
    $mail->addAddress($_POST['email']);                   // Add a recipient (User's email)

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST['subject'];
    $mail->Body    = $_POST['message'];
    $mail->AltBody = strip_tags($_POST['message']);       // Plain text version for non-HTML email clients

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
