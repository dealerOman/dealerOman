<?php
// connect to DB 
require("db.php");

//Class to represent ONE record from cars table
class Car {
    public $car_id;
    public $brand;
    public $model;
    public $year;
    public $price;

    public function __construct($id, $b, $m, $y, $p) {
        $this->car_id = $id;
        $this->brand  = $b;
        $this->model  = $m;
        $this->year   = $y;
        $this->price  = $p;
    }
}

//Function to display array of objects in an XHTML table
function showCarsTable($carsArr) {

    echo "<table border='1' cellpadding='6' cellspacing='0'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Brand</th>";
    echo "<th>Model</th>";
    echo "<th>Year</th>";
    echo "<th>Price</th>";
    echo "</tr>";

    //if no cars, show a row
    if (count($carsArr) == 0) {
        echo "<tr><td colspan='5'>No cars found.</td></tr>";
    }

    //loop through array of objects
    for ($i = 0; $i < count($carsArr); $i++) {
        echo "<tr>";
        echo "<td>" . $carsArr[$i]->car_id . "</td>";
        echo "<td>" . $carsArr[$i]->brand  . "</td>";
        echo "<td>" . $carsArr[$i]->model  . "</td>";
        echo "<td>" . $carsArr[$i]->year   . "</td>";
        echo "<td>" . $carsArr[$i]->price  . " OMR</td>";
        echo "</tr>";
    }

    echo "</table>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cars List</title>
</head>
<body>

<h2>All Cars (From Database)</h2>

<?php
//SELECT all cars from DB
$sql = "SELECT car_id, brand, model, year, price FROM cars";
$result = $conn->query($sql);

//create array of objects
$cars = array();

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        //build object from each row
        $obj = new Car(
            $row["car_id"],
            $row["brand"],
            $row["model"],
            $row["year"],
            $row["price"]
        );

        $cars[] = $obj; // add object to array
    }
}

//display using function
showCarsTable($cars);

//close connection
$conn->close();
?>

</body>
</html>