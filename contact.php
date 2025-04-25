<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  // Composer autoloader for PHPMailer

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate form fields
    if (empty($name) || empty($email) || empty($message)) {
        echo "<script>alert('Please fill out all fields.');</script>";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Please enter a valid email address.');</script>";
    } else {
        // Create a PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            // Set mailer to use SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // SMTP server (for Gmail)
            $mail->SMTPAuth = true;
            $mail->Username = 'your-email@gmail.com';  // Your Gmail email address
            $mail->Password = 'your-email-password';  // Your Gmail password (use app password if 2FA enabled)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Sender and recipient
            $mail->setFrom('your-email@gmail.com', 'Cyber Fraud Awareness');
            $mail->addAddress('admin@example.com');  // Recipient email address
            $mail->addReplyTo($email, $name);  // Reply-to email

            // Content
            $mail->isHTML(false);  // Set email format to plain text
            $mail->Subject = "Contact Us Message from $name";
            $mail->Body = "Name: $name\nEmail: $email\nMessage: $message";

            // Send the email
            $mail->send();
            echo "<script>alert('Your message has been sent successfully!');</script>";
        } catch (Exception $e) {
            echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
        }
    }
}
?>
