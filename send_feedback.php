<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Load environment variables
function loadEnv($filePath) {
    if (!file_exists($filePath)) {
        die(".env file not found.");
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue; // Skip comments
        list($key, $value) = explode('=', $line, 2);
        putenv(trim($key) . '=' . trim($value));
    }
}

// Call the function to load .env
loadEnv(__DIR__ . '/.env');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST["message"]);

    // Validate Email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address.");
    }

    // Admin Email (Loaded from .env)
    $adminEmail = getenv('ADMIN_EMAIL');

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host       = getenv('SMTP_HOST');
        $mail->SMTPAuth   = true;
        $mail->Username   = getenv('SMTP_USER');
        $mail->Password   = getenv('SMTP_PASS');
        $mail->SMTPSecure = getenv('SMTP_SECURE');
        $mail->Port       = getenv('SMTP_PORT');

        // Enable Debugging (Remove in production)
        $mail->SMTPDebug = 2; // Debug Level
        $mail->Debugoutput = 'html';

        // Email Content
        $mail->setFrom(getenv('SMTP_FROM_EMAIL'), getenv('SMTP_FROM_NAME'));
        $mail->addReplyTo($email, $name);
        $mail->addAddress($adminEmail);
        $mail->Subject = "New Feedback from $name";

        // Enable HTML
        $mail->isHTML(true);
        $mail->Body    = "<strong>Full Name:</strong> $name<br>
                          <strong>Email:</strong> $email<br><br>
                          <strong>Message:</strong><br>" . nl2br($message);
        $mail->AltBody = "Full Name: $name\nEmail: $email\n\nMessage:\n$message"; // Plain text fallback

        // Send Email
        if ($mail->send()) {
            echo "<script>
                        alert('Feedback sent successfully!');
                        window.history.back();
                    </script>";
        } else {
            echo "Error: " . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        echo "Error: " . $mail->ErrorInfo;
    }
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
