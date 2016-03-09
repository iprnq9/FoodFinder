<?php
//include 'food-finderprj.php';
//
//include 'db-connect.php';
//
//$con = new mysqli($host, $user, $password, $dbname);
//
//$objArray = array();
//
//$dayNumber = date("w")+1;
//
//if ($con->connect_errno) {
//    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
//}
//
//else {
//    include 'pullData.php';

    $sinceEpoch = strtotime("today");

    $mealArray = array("brkfst", "lnch", "dnnr");
    $numOfMeals = sizeof($mealArray);

    $openTimes = array();
    $closeTimes = array();

    $max = sizeof($objArray);
    //for ($k = 0; $k < ($max - 1); $k++){
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
                $closeTime0 = date('H:ia', $closeTime0);
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

        for ($k = 0; $k < ($numOpenCloseTimes); $k++) {
            echo '<tr><td>' . $openTimes[$k] . '</td><td>-</td><td>' . $closeTimes[$k] . '</td></tr>';
        }

        echo "            </table>";
        echo "          </p>";
//    //}
//
//}

?>
