<!DOCTYPE html>
<html>
<body>

<?php
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
