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

$sql = "SELECT location_id, location_name FROM locations";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{
  // output data of each row
  while($row = mysqli_fetch_assoc($result))
  {
    echo "<div class=\"card\">";
    echo "<h1>ID: " . $row["location_id"]. "<br>Name: " . $row["location_name"]. "</h1>";
    echo "</div>";
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
