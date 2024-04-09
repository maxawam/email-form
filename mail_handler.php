<?php
// if method POST
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $to = "info@test.grotest.xyz";
    // form data
    $name = trim($_POST["name"]);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]); var_dump($_POST);

    $subject = "New contact form";
    $subject = '=?UTF-8?B?'.base64_encode($subject).'?=';

    $email_content  = "Name: $name <br>";
    $email_content .= "Email: $email <br><br>";
    $email_content .= "Message:<br>$message<br>";

    $email_headers  = "MIME-Version: 1.0" . "\r\n";
    $email_headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $email_headers .= "From: <$email>";

    // sending email
    if (mail($to, $subject, $email_content, $email_headers)) {
        // success
        echo "Thank You! Your message has been sent.";
    } else {
        // error
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    // not POST, show Form
    header("Location: /"); // redirect to index.html
    exit;
}

?>
