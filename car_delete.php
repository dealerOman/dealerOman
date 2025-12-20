<?php
require("db.php");

$msg = "";

if (isset($_POST["car_id"])) {
    $id = (int)$_POST["car_id"];

    $sql = "DELETE FROM cars WHERE car_id = $id";

    if ($conn->query($sql) === TRUE) {
        $msg = "Car deleted successfully!";
    } else {
        $msg = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Car</title>
</head>
<body>

<h2>Delete Car (DELETE)</h2>

<form method="post" action="car_delete.php">
    Car ID: <input type="text" name="car_id">
    <input type="submit" value="Delete">
</form>

<p><?php echo $msg; ?></p>

</body>
</html>