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
    echo "  <thead class=\"\"><tr>\n";
    echo "    <th>Day</th>\n";
    for ($i = 0; $i < ($objArray[$k]->getNumOpenCloseTimes(3)); $i++) {
        echo "    <th>Open</th>\n";
        echo "<th>-</th>";
        echo "    <th>Closed</th>\n";
    }
    echo "  </tr></thead>\n";
    for($day = 0; $day < 7; $day++)  {
        echo "  <tr class=\"day-" . ($day+1) . "\">\n";
        echo "    <td>" . $dayArray[$day] . "</td>\n";
        for($meal = 0; $meal < ($objArray[$k]->getNumOpenCloseTimes(3)); $meal++){
            $open = $objArray[$locationId]->getOpenTime($day,$meal);
            $close = $objArray[$locationId]->getCloseTime($day, $meal);
            if($open == NULL) {
                $open = "-";
                $close = "-";
            }
            echo "    <td>" . $open . "</td>\n";
            echo "<td>-</td>\n";
            echo "    <td>" . $close . "</td>\n";
        }

        echo "  </tr>\n";
    }
    echo "</table>\n";

    echo "              </div>\n";
    echo "            </div>\n";
    echo "          </li>\n";
    echo "\n";

    for($card = 1; $card <= 4; $card++){
        echo "          <li class=\"flex-item\">\n";
        echo "            <div class=\"quick-info green z-depth-2\">\n";
        echo "              <div class=\"card-image einsteins1\"></div>\n";
        echo "              <div class=\"quick-info-text\">\n";
        echo "                <h3>" . $objArray[$k]->getHeading($card-1) . "</h3>\n";
        echo $objArray[$k]->getParagraph($card-1);
        echo "              </div>\n";
        echo "            </div>\n";
        echo "          </li>\n";
        echo "\n";
    }


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

        $('tr.day-' + (n+1)).addClass('current-day');

    });
</script>


