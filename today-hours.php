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

    $openTimes = array();
    $closeTimes = array();

    $max = sizeof($objArray);
    for ($k = 0; $k < ($max - 1); $k++){
        for ($i = 0; $i < ($numOfMeals); $i++) {
            $openTime0 = $objArray[$k]->getopnTime($dayNumber, $mealArray[$i]);
            if ($openTime0 !== NULL) {
                $openTime0 = $openTime0 * 60 + $sinceEpoch;
                $openTime0 = date('g:ia', $openTime0);
                $openTimes[$i] = $openTime0;
            }

            $closeTime0 = $objArray[$k]->getclsTime($dayNumber, $mealArray[$i]);
            if ($closeTime0 !== NULL) {
                $closeTime0 = $closeTime0 * 60 + $sinceEpoch;
                $closeTime0 = date('H:ia', $closeTime0);
                $closeTimes[$i] = $closeTime0;
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

        for ($i = 0; $i < ($numOpenCloseTimes); $i++) {
            echo '<tr><td>' . $openTimes[$i] . '</td><td>-</td><td>' . $closeTimes[$i] . '</td></tr>';
        }

        echo "            </table>";
        echo "          </p>";
    }

}

?>
</body>
</html>
