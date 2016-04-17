<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Dashboard | FoodFinder</title>

    <!-- CSS  -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="custom.css" rel="stylesheet">
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <script type="text/javascript" src="js/moment.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700,500' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald:700,300,400' rel='stylesheet' type='text/css'>

</head>
<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
//ini_set('html_errors', 'On');

include 'food-finderprj2.php';
include 'food-fundraiser-obj.php';


include 'db-connect.php';

$con = new mysqli($host, $user, $password, $dbname);

$objArray = array();
$fundArray = array();

$dayNumber = date("w")+1;

if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

else {
    include 'pullData2.php';
    include 'pullFundraisers.php';

    $sinceEpoch = strtotime("today");

    $mealArray = array("brkfst", "lnch", "dnnr");
    $numOfMeals = sizeof($mealArray);

?>

<body style="background-color: #eeeeee;zoom: 75%;">

<div style="text-align: center;">
    <?php include 'currently.php';?>
</div>

<div class="row">
    <div class="s12">
        <ul class="flex-container">
            <?php
            $max = sizeof($objArray);
            for($k=0; $k < $max; $k++) {
                $status = $objArray[$k]->status();
                if($status == "closing-soon")
                    $statusText = "Closing in " . $objArray[$k]->getMinToClose() . " min";

                else
                    $statusText = $status;

                echo "            <li class=\"flex-item-dash card grey darken-4 white-text\">\n";
                echo "        <div class=\"card-status " . $objArray[$k]->status() . "\">" . $statusText . "</div>\n";
                echo "              <div class=\"card-image-dash\" style=\"background-image: url(images/" . ($k+1) . "/" .
                    $objArray[$k]->getCoverPhoto() . "); background-size: cover; background-repeat: no-repeat;\"></div>\n";
                echo "                <div class=\"card-info\">\n";
                echo "                    <div class=\"card-title-subtitle\">\n";
                echo "          <p class=\"card-title\">" . $objArray[$k]->getName() . "</p>\n";
                echo "          <p class=\"card-subtitle\">" . $objArray[$k]->getDescription() . "</p>\n";
                echo "          <p class=\"card-location\" style='margin-top: 20px; vertical-align: middle;'><i class=\"material-icons\">place</i>&nbsp;" . $objArray[$k]->getLocation() . "</p>\n";
                echo "                    </div>\n";
                echo "                </div>\n";
                echo "            </li>";
            }

            $max = sizeof($fundArray);
            for($k=0; $k < $max; $k++) {

                $status = $fundArray[$k]->status();
                if ($status == "Not Available")
                    $statusClass = "closed";
                else
                    $statusClass = "open";

                if($status !== "Not Within Dates") {
                    $startTime = new DateTime($fundArray[$k]->getStartTime());
                    $endTime = new DateTime($fundArray[$k]->getEndTime());
                    $startDate = new DateTime($fundArray[$k]->getStartDate());
                    $endDate = new DateTime($fundArray[$k]->getEndDate());

                    echo "            <li class=\"flex-item-dash card grey darken-4 white-text\">\n";
                    echo "                <div class=\"card-status " . $statusClass . "\">" . $fundArray[$k]->status() . "</div>\n";
                    echo "              <div class=\"card-image-dash\" style=\"background-image: url(images/fundraisers/" .
                        $fundArray[$k]->getCoverPhoto() . "); background-size: cover; background-repeat: no-repeat;\"></div>\n";
                    echo "                <div class=\"card-info\">\n";
                    echo "                    <div class=\"card-title-subtitle\">\n";
                    echo "          <p class=\"card-title\">" . $fundArray[$k]->getOrganization() . ": " . $fundArray[$k]->getName() . "</p>\n";
                    echo "          <p class=\"card-subtitle\">" . $fundArray[$k]->getDescription() . "</p>\n";
                    echo "          <p class=\"card-location\" style='margin-top: 20px; vertical-align: middle;'><i class=\"material-icons\">place</i>&nbsp;" . $fundArray[$k]->getLocation() . "</p>\n";
                    echo "                    </div>\n";
                    echo "                </div>\n";
                    echo "            </li>";
                }
            }

            ?>
        </ul>
    </div>
</div>


<!--  Scripts-->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>


<?php
//close else
} ?>

<script>
    //$(".currently").text("Monday" + ", " + "10:05am" + ": " + "Breakfast");
    $(".currently").append("  <img src=\"images/logo-icon.png\" alt=\"FoodFinder logo image\" style=\"vertical-align: middle;\"/>&nbsp;FoodFinder");
</script>



</body>
</html>
