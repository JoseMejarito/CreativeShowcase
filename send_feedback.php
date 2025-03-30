<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST["message"]);

    // Validate Email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address.");
    }

    // Admin Email (Replace with your Gmail address)
    $adminEmail = "c19-1072-812@uphsl.edu.ph";

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mejaritog@gmail.com'; // Replace with your Gmail
        $mail->Password   = 'tmzu hvws zpyf eigk';    // Use Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Email Content
        $mail->setFrom('mejaritog@gmail.com', 'Creative Showcase Feedback'); // Use your Gmail
        $mail->addReplyTo($email, $name); // Allows admin to reply directly
        $mail->addAddress($adminEmail);
        $mail->Subject = "New Feedback from $name";

        // Enable HTML
        $mail->isHTML(true);
        $mail->Body    = "<strong>Full Name:</strong> $name<br>
                          <strong>Email:</strong> $email<br><br>
                          <strong>Message:</strong><br>" . nl2br($message);
        $mail->AltBody = "Full Name: $name\nEmail: $email\n\nMessage:\n$message"; // Plain text fallback

        // Send Email
        $mail->send();
        echo "Feedback sent successfully!";
    } catch (Exception $e) {
        echo "Error: " . $mail->ErrorInfo;
    }
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
