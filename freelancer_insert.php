<?php
// NOTE: connect to DB
include("db.php");

// NOTE: read values from POST (because form method="post")
$full_name = "";
$email = "";
$mobile = "";
$skill = "";
$rate = "";
$city = "";

// NOTE: if values exist, take them
if (isset($_POST["full_name"])) { $full_name = $_POST["full_name"]; }
if (isset($_POST["email"]))     { $email = $_POST["email"]; }
if (isset($_POST["mobile"]))    { $mobile = $_POST["mobile"]; }
if (isset($_POST["skill"]))     { $skill = $_POST["skill"]; }
if (isset($_POST["rate"]))      { $rate = $_POST["rate"]; }
if (isset($_POST["city"]))      { $city = $_POST["city"]; }

// NOTE: simple protection (from slides style): escape strings
$full_name = $conn->real_escape_string($full_name);
$email     = $conn->real_escape_string($email);
$mobile    = $conn->real_escape_string($mobile);
$skill     = $conn->real_escape_string($skill);
$rate      = (int)$rate;
$city      = $conn->real_escape_string($city);

// NOTE: insert into table
$sql = "INSERT INTO freelancers (full_name, email, mobile, skill, rate, city)
        VALUES ('$full_name', '$email', '$mobile', '$skill', $rate, '$city')";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Freelancer Submitted</title>
</head>
<body>

<h2>Freelancer Submitted Data</h2>

<?php
if ($result == true) {
    echo "<p><b>Inserted successfully into MySQL table: freelancers</b></p>";
} else {
    echo "<p><b>Error inserting:</b> " . $conn->error . "</p>";
}
?>

<table border="1" cellpadding="6" cellspacing="0">
    <tr><th>Field</th><th>Value</th></tr>
    <tr><td>Full Name</td><td><?php echo $full_name; ?></td></tr>
    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
    <tr><td>Mobile</td><td><?php echo $mobile; ?></td></tr>
    <tr><td>Skill</td><td><?php echo $skill; ?></td></tr>
    <tr><td>Rate</td><td><?php echo $rate; ?></td></tr>
    <tr><td>City</td><td><?php echo $city; ?></td></tr>
</table>

<p><a href="freelancers.html">Go back to Freelancers page</a></p>

</body>
</html>
<?php
$conn->close();
?>