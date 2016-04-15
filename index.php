<!--Thanks to Russell Bell for his help-->
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
<meta name="theme-color" content="#66BB6A" />

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
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
//ini_set('html_errors', 'On');

include 'food-finderprj2.php';

include 'header.php';

include 'db-connect.php';

$con = new mysqli($host, $user, $password, $dbname);

$objArray = array();

$dayNumber = date("w")+1;

if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

else {
    include 'pullData2.php';

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

        $status = $objArray[$k]->status();
        if($status == "closing-soon")
            $statusText = "Closing in " . $objArray[$k]->getMinToClose() . " min";

        else
            $statusText = $status;

        $imageClass = "imageClass-" . $objArray[$k]->getId();
        echo "      <li class=\"flex-item grey darken-4 white-text card\">\n";
        echo "        <div class=\"card-status " . $objArray[$k]->status() . "\">" . $statusText . "</div>\n";
        echo "              <div class=\"card-image\" style=\"background-image: url(images/" . ($k+1) . "/" .
            $objArray[$k]->getCoverPhoto() . "); background-size: cover; background-repeat: no-repeat;\"></div>\n";
        //echo "        <div class=\"card-image " . $imageClass . "\"></div>\n";
        echo "        <div class=\"card-info\">\n";
        echo "          <p class=\"card-title\">" . $objArray[$k]->getName() . "</p>\n";
        echo "          <p class=\"card-subtitle\">" . $objArray[$k]->getDescription() . "</p>\n";
        echo "<p class=\"card-hours center-align\"><span class=\"todays-hours-text\"><i class=\"material-icons\">schedule</i>&nbsp;Today's Hours</span>";
        echo "            <table class=\"table centered bordered grey darken-4 white-text\" style=\"width: 50%;margin: 0 auto;\">";
        echo "            <thead><tr>";
        echo "              <th>Open</th>";
        echo "              <th>-</th>";
        echo "              <th>Closed</th>";
        echo "            </tr></thead>";

        for ($i = 0; $i < ($objArray[$k]->getNumOpenCloseTimes($dayNumber-1)); $i++) {
            echo '<tr><td>' . $objArray[$k]->getOpenTime($dayNumber-1,$i) . '</td><td>-</td><td>' . $objArray[$k]->getCloseTime($dayNumber-1, $i) . '</td></tr>';
        }

        if($objArray[$k]->getNumOpenCloseTimes($dayNumber-1) == 0){
            echo '<tr><td>Closed</td><td>-</td><td>Today</td></tr>';
        }
        echo "            </table>";
        echo "          </p>";
        echo "          <div class=\"profile-button\"><a href=\"profile.php?id=". $k . "\" class=\"waves-effect waves-light btn green center-align z-depth-2\"><i class=\"material-icons left\">person_pin</i>View Profile</a></div>\n";
        echo "        </div>\n";
        echo "      </li>";
    }
    echo "</ul></div></div>";

    //echo $objArray[0]->getHeading(0);
}

include 'footer.php';

?>

<script>
    $("li.dining").addClass("active");
</script>

</body>
</html>