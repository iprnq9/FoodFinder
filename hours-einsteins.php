<?php

include 'food-finderprj2.php';
include 'header.php';
include 'db-connect.php';

//get location id from URL variable
$locationId = htmlspecialchars($_GET["id"]);
$k = $locationId - 1;
$imageClass = "imageClass-" . $locationId;

$con = new mysqli($host, $user, $password, $dbname);

$objArray = array();

$dayArray = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

$dayNumber = date("w")+1;

if ($con->connect_errno) {
  echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

else {
  include 'pullData2.php';

  echo "<table class=\"responsive-table centered bordered white\">\n";
  echo "  <thead><tr>\n";
  echo "    <th>Day</th>\n";

  for ($i = 0; $i < max($objArray[$k]->numOpenCloseTimes); $i++) {
    echo "    <th>Open</th>\n";
    echo "    <th>Closed</th>\n";
  }

  echo "  </tr></thead>\n";

  for($day = 0; $day < 7; $day++)  {
    echo "  <tr class=\"day-" . ($day+1) . "\">\n";
    echo "    <td>" . $dayArray[$day] . "</td>\n";
    for($meal = 0; $meal < 3; $meal++){
      echo "    <td>" . $objArray[$locationId]->getOpenTime($day,$meal) . "</td>\n";
      echo "    <td>" . $objArray[$locationId]->getCloseTime($day, $meal) . "</td>\n";
    }

    echo "  </tr>\n";
  }

  echo "</table>\n";
}

?>