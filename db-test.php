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

$location_id = 1;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn)
{
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT location_id, location_name FROM locations WHERE location_id = $location_id LEFT JOIN SELECT ";
$result = mysqli_query($conn, $sql);
$numRows = mysqli_num_rows($result);

if ($numRows > 0)
{
  // output data of each row
  for ($i=0; $i<$numRows; $i++)
  {
    echo "<div class=\"card\">\n";
    echo "<h1>ID: " . $row["location_id"]. "<br>Name: " . $row["location_name"]. "</h1>\n";
    echo "</div>\n\n";
  }
}

else
{
  echo "0 results";
}

mysqli_close($conn);

?>


</body>
</html>
