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

<body>
<?php
include 'food-finderprj.php';

include 'header.php';

include 'db-connect.php';

$con = new mysqli($host, $user, $password, $dbname);

$objArray = array();

$dayNumber = date("w")+1;
$lunchStart = new DateTime("today");
$lunchStart->setTime(10,45);
$dinnerStart = new DateTime("today");
$dinnerStart->setTime(16,45);
$nowTime = new DateTime("now");
$currentMeal = "Lunch";

if($dayNumber < 7 && $dayNumber > 1){
    if ($nowTime > $dinnerStart){
        $currentMeal = "Dinner";
    }
    else if ($lunchStart > $nowTime){
        $currentMeal = "Breakfast";
    }
}

else {
    if ($nowTime > $dinnerStart){
        $currentMeal = "Dinner";
    }
    else {
        $currentMeal = "Brunch";
    }
}
$currently = date("l, g:sa") . ': ' . $currentMeal;

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

    echo '<div class="container"><div style="text-align: center;"><div class="currently z-depth-1 green">' . $currently . '</div></div><div class="section"><ul class="flex-container">';
    $max = sizeof($objArray);
    for($i = 0; $i < ($max-1); $i++){
        $imageClass = "imageClass-" . $objArray[$i]->getId();
        echo "      <li class=\"flex-item card\">\n";
        echo "        <div class=\"card-status " . $objArray[$i]->status() . "\">". $objArray[$i]->status() ."</div>\n";
        echo "        <div class=\"card-image ". $imageClass . "\"></div>\n";
        echo "        <div class=\"card-info\">\n";
        echo "          <p class=\"card-title\">" . $objArray[$i]->getName() . "</p>\n";
        echo "          <p class=\"card-subtitle\">A coffee shop serving delicious bagels and more.</p>\n";
        echo "          <br>\n";
        echo "          <p class=\"card-hours center-align\"><span class=\"todays-hours-text\">Today's Hours <i class=\"material-icons\">schedule</i></span>\n";
        echo "            <table class=\"table centered bordered white\" style=\"width: 50%;margin: 0 auto;\">\n";
        echo "            <thead><tr>\n";
        echo "              <th>Open</th>\n";
        echo "              <th>-</th>\n";
        echo "              <th>Closed</th>\n";
        echo "            </tr></thead>\n";
        echo "            <tr>\n";
        echo "              <td>7:00am</td>\n";
        echo "              <td>-</td>\n";
        echo "              <td>12:00pm</td>\n";
        echo "            </tr>\n";
        echo "            <tr>\n";
        echo "              <td>1:00pm</td>\n";
        echo "              <td>-</td>\n";
        echo "              <td>7:00pm</td>\n";
        echo "            </tr>\n";
        echo "            </table>\n";
        echo "          </p>\n";
        echo "          <div class=\"profile-button\"><a href=\"material-profile.php\" class=\"waves-effect waves-light btn green center-align z-depth-2\"><i class=\"material-icons left\">person_pin</i>View Profile</a></div>\n";
        echo "        </div>\n";
        echo "      </li>";
    }
}

include 'footer.php';
?>
</body>
</html>
