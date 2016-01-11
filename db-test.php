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

echo "after conn";

// Check connection
if (!$conn)
{
  die("Connection failed: " . mysqli_connect_error());
}

echo "after first if";

$sql = "SELECT location_id, location_name FROM locations";
$result = mysqli_query($conn, $sql);

echo mysqli_error($conn);
echo "after echo error";

if (mysqli_num_rows($result) > 0)
{
  echo "inside second if";
  // output data of each row
  while($row = mysqli_fetch_assoc($result))
  {
    echo "inside while";
    echo "id: " . $row["location_id"]. " - Name: " . $row["location_name"]. "<br>";
  }
  echo "outside while";
}

echo "after second if";

else
{
  echo "0 results";
}

echo "before close";

mysqli_close($conn);

echo "after close";
?>

</body>
</html>
