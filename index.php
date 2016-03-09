<!--Thanks to Russell Bell for his help-->
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

<title>S&T Dining | FoodFinder</title>

<!-- CSS  -->
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<script type="text/javascript" src="js/moment.js"></script>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700,500' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oswald:700,300,400' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
<link href="custom.css" rel="stylesheet">
<body>
<?php
include 'food-finderprj.php';

include 'header.php';

include 'db-connect.php';

$con = new mysqli($host, $user, $password, $dbname);

$objArray = array();

//echo $currentMeal . "<br>";
//echo $nowTime->format('Y-m-d H:i:s') . "<br>";
//echo $lunchStart->format('Y-m-d H:i:s') . "<br>";
//echo $dinnerStart->format('Y-m-d H:i:s') . "<br>";

//echo 'Current day #' . $dayNumber . '<br>';

if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

else {
    include 'pullData.php';

    echo '<div class="container"><div style="text-align: center;">';
    include 'currently.php';
    echo '</div><div class="section"><ul class="flex-container">';
    $max = sizeof($objArray);
    for($i = 0; $i < ($max); $i++){
        $imageClass = "imageClass-" . $objArray[$i]->getId();
        echo "      <li class=\"flex-item card\">\n";
        echo "        <div class=\"card-status " . $objArray[$i]->status() . "\">" . $objArray[$i]->status() . "</div>\n";
        echo "        <div class=\"card-image " . $imageClass . "\"></div>\n";
        echo "        <div class=\"card-info\">\n";
        echo "          <p class=\"card-title\">" . $objArray[$i]->getName() . "</p>\n";
        echo "          <p class=\"card-subtitle\">Description here...</p>\n";
        echo "          <br>\n";
        //include 'today-hours.php';
        $dayNumber = date("w")+1;
        $sinceEpoch = strtotime("today");
        $mealArray = array("brkfst", "lnch", "dnnr");
        $numOfMeals = sizeof($mealArray);
        $openTimes = array();
        $closeTimes = array();
        for ($k = 0; $k < ($numOfMeals); $k++) {
            $openTime0 = $objArray[$i]->getopnTime($dayNumber, $mealArray[$k]);
            if ($openTime0 !== NULL) {
                $openTime0 = $openTime0 * 60 + $sinceEpoch;
                $openTime0 = date('g:ia', $openTime0);
                $openTimes[$k] = $openTime0;
            }

            $closeTime0 = $objArray[$i]->getclsTime($dayNumber, $mealArray[$k]);
            if ($closeTime0 !== NULL) {
                $closeTime0 = $closeTime0 * 60 + $sinceEpoch;
                $closeTime0 = date('g:ia', $closeTime0);
                $closeTimes[$k] = $closeTime0;
            }
        }
        $numOpenCloseTimes = sizeof($openTimes);
        echo "<p class=\"card-hours center-align\"><span class=\"todays-hours-text\">Today's Hours <i class=\"material-icons\">schedule</i></span>";
        echo "            <table class=\"table centered bordered white\" style=\"width: 50%;margin: 0 auto;\">";
        echo "            <thead><tr>";
        echo "              <th>Open</th>";
        echo "              <th>-</th>";
        echo "              <th>Closed</th>";
        echo "            </tr></thead>";
        for ($j = 0; $j < ($numOpenCloseTimes); $j++) {
            echo '<tr><td>' . $openTimes[$j] . '</td><td>-</td><td>' . $closeTimes[$j] . '</td></tr>';
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
