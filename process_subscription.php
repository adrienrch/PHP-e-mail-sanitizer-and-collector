<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $emailValid = filter_var($email, FILTER_VALIDATE_EMAIL);

    if ($emailValid) {
        // Save email address to log file
        $logFilePath = "customer_emails.log";
        $logMessage = date('Y-m-d H:i:s') . " - $email\n";
        file_put_contents($logFilePath, $logMessage, FILE_APPEND);

        // Redirect to confirmation page
        header("Location: https://example.com/confirmation");
        exit();
    }

    // Redirect to error page for invalid email
    header("Location: https://example.com/erreur-de-validation");
    exit();
}
?>
