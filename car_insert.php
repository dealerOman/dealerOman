<?php
require("db.php");

$msg = "";

if (isset($_POST["brand"])) {
    $brand = $conn->real_escape_string($_POST["brand"]);
    $model = $conn->real_escape_string($_POST["model"]);
    $year  = (int)$_POST["year"];
    $price = (float)$_POST["price"];

    $sql = "INSERT INTO cars (brand, model, year, price)
            VALUES ('$brand', '$model', $year, $price)";

    if ($conn->query($sql) === TRUE) {
        $msg = "Car inserted successfully!";
    } else {
        $msg = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert Car</title>
</head>
<body>

<h2>Insert New Car (INSERT)</h2>

<form method="post" action="car_insert.php">
    Brand: <input type="text" name="brand"><br><br>
    Model: <input type="text" name="model"><br><br>
    Year: <input type="text" name="year"><br><br>
    Price: <input type="text" name="price"><br><br>
    <input type="submit" value="Insert">
</form>

<p><?php echo $msg; ?></p>

</body>
</html>