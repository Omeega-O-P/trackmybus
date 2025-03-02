<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = 3; // Enable verbose debug output
    $mail->Debugoutput = 'html'; // Output debug logs in HTML format
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to use
    $mail->SMTPAuth = true;
    $mail->Username = 'trackmybus15@gmail.com'; // Your Gmail address
    $mail->Password = 'rqwo wvib bzfd wgws'; // Your Gmail password or app-specific password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
    $mail->Port = 587; // TCP port for TLS connection

    // Recipients
    $mail->setFrom('trackmybus15@gmail.com', 'Track my bus');
    $mail->addAddress('anilshahu999@gmail.com', 'Harsh'); // Add a recipient

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Test Email';
    $mail->Body = '<p>Thanks for contacting us We will contact you soon.</p>';
    $mail->AltBody ='Thanks for contacting us We will contact you soon.';

    // Attempt to send the email
    $mail->send();
    echo 'Message has been sent successfully!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
