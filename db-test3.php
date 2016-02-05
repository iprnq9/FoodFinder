<!DOCTYPE html>
<html>
<body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('html_errors', 'On');

$servername = "localhost";
$username = "root";
$password = "FoodFinder";
$dbname = "foodfinders";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn)
{
  die("Connection failed: " . mysqli_connect_error());
}

$name = $mysqli->query("SELECT location_name FROM locations WHERE location_id = 1")->fetch_object()->location_name;

echo $name;

mysqli_close($conn);

?>


</body>
</html>
