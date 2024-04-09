<?php
$name = $message = "";
$name_err = $message_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $message = $_POST["message"];

    if (empty($name)) {
        $name_err = "Please enter your name.";
    }

    if (empty($message)) {
        $message_err = "Please enter your message.";
    }

    if (empty($name_err) && empty($message_err)) {
        echo "Thank you for contacting us, $name. We will get back to you soon!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    <h2>Contact Us</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
            <span><?php echo $name_err; ?></span>
        </div>
        <div>
            <label for="message">Message:</label>
            <textarea id="message" name="message"></textarea>
            <span><?php echo $message_err; ?></span>
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>
</body>
</html>