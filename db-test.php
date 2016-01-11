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

echo "1";
echo $servername;
echo $username;
echo $password;
echo $dbname;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

echo "2";

// Check connection
if (!$conn)
{
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT location_id, location_name FROM locations";
$result = mysqli_query($conn, $sql);

echo mysqli_error($conn);

if (mysqli_num_rows($result) > 0)
{
  // output data of each row
  while($row = mysqli_fetch_assoc($result))
  {
    echo "id: " . $row["location_id"]. " - Name: " . $row["location_name"]. "<br>";
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
