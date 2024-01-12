<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone_number']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    $to = 'zineedine@virta-calls.com';
    $subject = 'New message from website contact form';

    $body = "Name: $name\n";
    $body .= "Phone Number: $phone\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message";

    $headers = "From: $email\r\nReply-To: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Your message has been sent successfully!";
    } else {
        echo "There was an error sending your message. Please try again later.";
    }
} else {
    echo "Something went wrong. Please try again.";
}

?>
