<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Cars</title>
</head>
<body>

<h2>Search Cars (SELECT)</h2>

<?php
/*Read keyword from GET */
$keyword = "";
if (isset($_GET["keyword"])) {
    $keyword = $_GET["keyword"];
}
?>

<form method="get" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    Brand or Model:
    <input type="text" name="keyword" value="<?php echo $keyword; ?>">
    <input type="submit" value="Search">
</form>

<br>

<?php
/* Connect to DB using Procedural MySQLi  */
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "carsdb";   // change to your DB name

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/* If keyword is not empty, do SELECT  */
if ($keyword != "") {

    /* cleaning using trim */
    $keyword = trim($keyword);

    /* Create SQL statement  */
    $sql = "SELECT * FROM cars
            WHERE brand LIKE '%$keyword%' OR model LIKE '%$keyword%'";

    /* Execute SQL */
    $result = mysqli_query($conn, $sql);

    echo "<h3>Results:</h3>";

    /* Display results as a table  */
    if (mysqli_num_rows($result) > 0) {

        echo "<table border='1' cellpadding='6' cellspacing='0'>";
        echo "<tr>
                <th>ID</th><th>Brand</th><th>Model</th><th>Year</th><th>Price</th>
              </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["car_id"] . "</td>";
            echo "<td>" . $row["brand"] . "</td>";
            echo "<td>" . $row["model"] . "</td>";
            echo "<td>" . $row["year"] . "</td>";
            echo "<td>" . $row["price"] . " OMR</td>";
            echo "</tr>";
        }

        echo "</table>";

    } else {
        echo "No matching cars found.";
    }
}


mysqli_close($conn);
?>

</body>
</html>