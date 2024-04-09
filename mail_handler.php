<?php
// if method POST
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $to = "info@test.grotest.xyz";
    // form data
    $name = trim($_POST["name"]);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]); var_dump($_POST);

    $subject = "New contact form";

    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    $email_headers = "From: <$email>";

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
