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

if (mysqli_num_rows($result) >= 0)
{
  echo "<table><tr><th>ID</th><th>Name</th></tr>";
  //output data of each row
  while($row = $result->fetch_assoc())
  {
      echo "<tr><td>".$row["location_id"]."</td><td>".$row["location_name"]."</td></tr>";
  }
  echo "</table>";
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
