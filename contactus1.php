<?php
//Import PHPMailer and Twilio classes into the global namespace
use \PHPMailermaster\src\PHPMailer;
use \PHPMailermaster\src\SMTP;
use \PHPMailermaster\src\Exception;
use \twiliophpmain\src\Twilio\Rest\Client;

//Load Composer's autoloader
require 'autoload.php';

$servername = "dwellspot";
$username = "root";
$password = "root";
$dbname = "dwellspot";

// Create an instance of PHPMailer
$mail = new PHPMailer(true);

try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Save the submitted data to the database
    // (Ensure you have code to retrieve $name, $email, $phone, $message from your form)
    $sql = "INSERT INTO contactus (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
    $conn->query($sql);

    // Close the database connection
    $conn->close();

    // ... (SMTP settings and recipient details remain unchanged)

    // Send response email to the user
    $userMail = new PHPMailer(true);
    // ... (User email configuration remains unchanged)

    // Send SMS response to the user's phone number using Twilio
    $twilio = new Client('ACXXXXXX', 'YYYYYY');
    $twilioPhoneNumber = '+15017250604';
    $userPhoneNumber = $phone; // Assuming $phone contains the user's phone number

    $smsResponse = "Thank you for contacting us. We have received your message and will get back to you soon.";

    $twilio->messages->create(
        $userPhoneNumber,
        [
            'from' => $twilioPhoneNumber,
            'body' => $smsResponse
        ]
    );

    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
} catch (\Twilio\Exceptions\TwilioException $e) {
    echo "SMS could not be sent. Twilio Error: {$e->getMessage()}";
}
?>
