<?php
// NOTE: connect to database
include("db.php");

// NOTE: initialize variables
$name    = "";
$email   = "";
$subject = "";
$message = "";

// NOTE: read values from POST (because form method="post")
if (isset($_POST["name"])) {
    $name = $_POST["name"];
}

if (isset($_POST["email"])) {
    $email = $_POST["email"];
}

if (isset($_POST["subject"])) {
    $subject = $_POST["subject"];
}

if (isset($_POST["message"])) {
    $message = $_POST["message"];
}

// NOTE: simple protection (from slides)
$name    = $conn->real_escape_string($name);
$email   = $conn->real_escape_string($email);
$subject = $conn->real_escape_string($subject);
$message = $conn->real_escape_string($message);

// NOTE: insert into table
$sql = "INSERT INTO contact_messages (name, email, subject, message)
        VALUES ('$name', '$email', '$subject', '$message')";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Message Submitted</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="card p-4 text-center">

        <?php
        if ($result) {
            echo "<h4 class='text-success'>Message sent successfully!</h4>";
            echo "<p>Thank you for contacting DealerOman.</p>";
        } else {
            echo "<h4 class='text-danger'>Error!</h4>";
            echo "<p>" . $conn->error . "</p>";
        }
        ?>

        <a href="../contact.html" class="btn btn-dark mt-3">Back to Contact Page</a>

    </div>
</div>

</body>
</html>