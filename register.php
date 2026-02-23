<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Collect form data
    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $email      = $_POST['email'];

    // Email variables
    $to = "yourrealemail@gmail.com";  // CHANGE THIS to your real email
    $subject = "Registration Confirmation";

    // Build message
    $message = "A new registration has been submitted.\n";
    $message .= "First Name: $first_name\n";
    $message .= "Last Name: $last_name\n";
    $message .= "Email: $email\n";

    // Fix Windows issue with periods
    $message = str_replace("\n.", "\n..", $message);

    // Additional headers
    $headers = "From: webmaster@localhost\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "<h2>Thank you for registering!</h2>";
        echo "<p>A confirmation email has been sent.</p>";
    } else {
        echo "<h2>Email Failed</h2>";
        echo "<p>The email could not be sent. Please check configuration.</p>";
    }

} else {
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<h2>User Registration</h2>

<form action="register.php" method="post">
    First Name: <input type="text" name="first_name"><br><br>
    Last Name: <input type="text" name="last_name"><br><br>
    Email: <input type="text" name="email"><br><br>

    <input type="submit" value="Register">
</form>

</body>
</html>

<?php
}
?>