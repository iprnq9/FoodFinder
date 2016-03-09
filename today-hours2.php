<!--Thanks to Russell Bell for his help-->
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

<title>S&T Dining | FoodFinder</title>

<!-- CSS  -->
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="custom.css" rel="stylesheet">
<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<script type="text/javascript" src="js/moment.js"></script>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700,500' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oswald:700,300,400' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
<body>
<?php
include 'food-finderprj.php';

include 'header.php';

include 'db-connect.php';

$con = new mysqli($host, $user, $password, $dbname);

$objArray = array();

$dayNumber = date("w")+1;

if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

else {
    include 'pullData.php';

    $sinceEpoch = strtotime("today");

    $mealArray = array("brkfst", "lnch", "dnnr");
    $numOfMeals = sizeof($mealArray);

    echo '<div class="container"><div style="text-align: center;">';
    include 'currently.php';
    echo '</div><div class="section"><ul class="flex-container">';

    $max = sizeof($objArray);
    for ($k = 0; $k < ($max); $k++){
        $openTimes = array();
        $closeTimes = array();

        $imageClass = "imageClass-" . $objArray[$k]->getId();
        echo "      <li class=\"flex-item card\">\n";
        echo "        <div class=\"card-status " . $objArray[$k]->status() . "\">" . $objArray[$k]->status() . "</div>\n";
        echo "        <div class=\"card-image " . $imageClass . "\"></div>\n";
        echo "        <div class=\"card-info\">\n";
        echo "          <p class=\"card-title\">" . $objArray[$k]->getName() . "</p>\n";
        echo "          <p class=\"card-subtitle\">Description here...</p>\n";
        //echo "          <br>\n";
        $counter = 0;
        for ($i = 0; $i < ($numOfMeals); $i++) {
            $openTime0 = $objArray[$k]->getopnTime($dayNumber, $mealArray[$i]);
            if ($openTime0 != NULL) {
                $openTime0 = $openTime0 * 60 + $sinceEpoch;
                $openTime0 = date('g:ia', $openTime0);
                $openTimes[$counter] = $openTime0;
                $counter++;
            }
        }

        $counter2 = 0;
        for ($i = 0; $i < ($numOfMeals); $i++) {
            $closeTime0 = $objArray[$k]->getclsTime($dayNumber, $mealArray[$i]);
            if ($closeTime0 != NULL) {
                $closeTime0 = $closeTime0 * 60 + $sinceEpoch;
                $closeTime0 = date('g:ia', $closeTime0);
                $closeTimes[$counter2] = $closeTime0;
                $counter2++;
            }
        }

        //echo $openTimes[0] . ':' . $openTimes[1] . ":" . $openTimes[2] . "<br><br>";
        //echo $closeTimes[0] . ':' . $closeTimes[1] . ":" . $closeTimes[2] . "<br><br>";

        $numOpenCloseTimes = sizeof($openTimes);

        echo "<p class=\"card-hours center-align\"><span class=\"todays-hours-text\">Today's Hours <i class=\"material-icons\">schedule</i></span>";
        echo "            <table class=\"table centered bordered white\" style=\"width: 50%;margin: 0 auto;\">";
        echo "            <thead><tr>";
        echo "              <th>Open</th>";
        echo "              <th>-</th>";
        echo "              <th>Closed</th>";
        echo "            </tr></thead>";

        for ($i = 0; $i < ($numOpenCloseTimes); $i++) {
            echo '<tr><td>' . $openTimes[$i] . '</td><td>-</td><td>' . $closeTimes[$i] . '</td></tr>';
        }
        echo "            </table>";
        echo "          </p>";
        echo "          <div class=\"profile-button\"><a href=\"material-profile.php\" class=\"waves-effect waves-light btn green center-align z-depth-2\"><i class=\"material-icons left\">person_pin</i>View Profile</a></div>\n";
        echo "        </div>\n";
        echo "      </li>";
    }
    echo "</ul></div></div>";
}

include 'footer.php';

?>

<script>
    $("li.dining").addClass("active");
</script>

</body>
</html>