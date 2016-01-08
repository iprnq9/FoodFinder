<!DOCTYPE html>
<html>
<body>

<?php
  $servername = "localhost";
  $username = "root";
  $password = "FoodFinder";
  $dbname = "foodfinders";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  // Check connection
  if ($conn->connect_error)
  {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT location_id, location_name FROM locations";
  $result = $conn->query($sql);

  if ($result->num_rows > 0)
  {
      echo "<table><tr><th>ID</th><th>Name</th></tr>";
      // output data of each row
      while($row = $result->fetch_assoc())
      {
          echo "<tr><td>".$row["location_id"]."</td><td>".$row["location_name"]."</td></tr>";
      }
      echo "</table>";
  }

  else {
      echo "0 results";
  }

  $conn->close();
?>

</body>
</html>
