<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Profile | FoodFinder</title>

    <!-- CSS  -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <script type="text/javascript" src="js/moment.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Oswald:700,300,400' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</head>
<body style="background-color: #eeeeee;">

<?php

include 'header.php';

include 'food-finderprj2.php';

include 'db-connect.php';

//get location id from URL variable
$locationId = htmlspecialchars($_GET["id"]);
$k = $locationId;
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

    $status = $objArray[$k]->status();
    $name = $objArray[$k]->getName();

    echo "<main>\n";
    echo "  <div class=\"container\">\n";
    echo "    <div class=\"section\">\n";
    echo "      <div class=\"row\" style=\"text-align: center;\">\n";
    echo "        <div class=\"profile-image imageClass-" . ($locationId+1) . "\"></div>\n";
    echo "        <div class=\"profile-name green z-depth-2\">" . $name . "</div>\n";
    echo "        <ul class=\"flex-container\">\n";
    echo "          <li class=\"flex-item-wide z-depth-2\">\n";
    echo "            <div class=\"quick-info green\">\n";
    echo "              <div class=\"card-status " . $status . "\">" . $status . "</div>\n";
    echo "              <div class=\"card-content\">\n";
    echo "                <h4 class=\"center-align\" style=\"margin-top: -5px;\">Hours of Operation</h4>\n";
    echo "                <h6 class=\"center-align week-of\"></h6>\n";

    echo "<table class=\"responsive-table centered bordered white\">\n";
    echo "  <thead><tr>\n";
    echo "    <th>Day</th>\n";
    for ($i = 0; $i < ($objArray[$k]->getNumOpenCloseTimes(3)); $i++) {
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
        if ($objArray[$locationId]->getNumOpenCloseTimes($day) == 0)
        {
            echo "<td>-</td><td>-</td>";
        }
        echo "  </tr>\n";
    }
    echo "</table>\n";

    echo "              </div>\n";
    echo "            </div>\n";
    echo "          </li>\n";
    echo "\n";
    echo "          <li class=\"flex-item\">\n";
    echo "            <div class=\"quick-info green z-depth-2\">\n";
    echo "              <div class=\"card-image einsteins1\"></div>\n";
    echo "              <div class=\"quick-info-text\">\n";
    echo "                <h3>Our Mission</h3>\n";
    echo "                Einstein Bros. Bagels is your neighborhood bagel shop. We’re proud to provide our guests with freshly baked bagels, breakfast sandwiches, lunch sandwiches, coffee, catering and so much more. Stop on in. We’ll have a fresh bagel and cup of coffee ready for you.\n";
    echo "              </div>\n";
    echo "            </div>\n";
    echo "          </li>\n";
    echo "\n";
    echo "          <li class=\"flex-item\">\n";
    echo "            <div class=\"quick-info green z-depth-2\">\n";
    echo "              <div class=\"card-image einsteins3\"></div>\n";
    echo "              <div class=\"quick-info-text\">\n";
    echo "                <h3>Darn Good Coffee</h3>\n";
    echo "                We serve up your soon-to-be favorite drinks. Whether they be hot, cold, or iced, a cup of happiness awaits your hectic workday, relaxing day at home, or fun day out with friends.\n";
    echo "              </div>\n";
    echo "            </div>\n";
    echo "          </li>\n";
    echo "\n";
    echo "          <li class=\"flex-item\">\n";
    echo "            <div class=\"quick-info green z-depth-2\">\n";
    echo "              <div class=\"card-image einsteins2\"></div>\n";
    echo "              <div class=\"quick-info-text\">\n";
    echo "                <h3>More Than A Snack</h3>\n";
    echo "                 In addition to serving up delicious bagels and coffee, we cook gourmet breakfast and lunch sandwiches. High-five your tastebuds!\n";
    echo "              </div>\n";
    echo "            </div>\n";
    echo "          </li>\n";
    echo "\n";
    echo "          <li class=\"flex-item\">\n";
    echo "            <div class=\"quick-info green z-depth-2\">\n";
    echo "              <div class=\"card-image einsteins1\"></div>\n";
    echo "              <div class=\"quick-info-text\">\n";
    echo "                <h3>Download Menu</h3>\n";
    echo "                <a href=\"images/einstieins-menu.pdf\" target=\"_blank\"><img src=\"images/foodMenu.png\" class=\"menu-download\" alt=\"Download image\"/></a>\n";
    echo "              </div>\n";
    echo "            </div>\n";
    echo "          </li>\n";
    echo "        </ul>\n";
    echo "      </div>\n";
    echo "    </div>\n";
    echo "  </div>\n";
    echo "</main>";

}

include "footer.php";

?>

<!--  Scripts-->
<script>
    $(document).ready(function(){
        var n = moment().startOf('week').format("MMMM Do");
        $(".week-of").append("Week of " + n);

    });
</script>

<script>
    $(document).ready(function(){

        var dateVar = new Date();
        var n = dateVar.getDay();

        $('tr.day-1').addClass('current-day');

    });
</script>


