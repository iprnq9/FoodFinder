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

include 'db-connect.php';

$con = new mysqli($host, $user, $password, $dbname);

$objArray = array();

$dayNumber = date("w")+1;
$lunchStart = new DateTime("10:45:00");
$dinnerStart = new DateTime("4:45:00");
$nowTime = new DateTime("now");
$currentMeal = "Lunch";

if($dayNumber < 7 && $dayNumber > 1){
    if ($nowTime->diff($dinnerStart) > 0){
        $currentMeal = "Dinner";
    }
    else if ($lunchStart->diff($nowTime) > 0){
        $currentMeal = "Breakfast";
    }
}

else {
    if ($nowTime->diff($dinnerStart) > 0){
        $currentMeal = "Dinner";
    }
    else {
        $currentMeal = "Brunch";
    }
}
$currently = date("l, g:sa") . ': ' . $currentMeal;
//echo 'Current day #' . $dayNumber . '<br>';

if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

else {
    include 'pullData.php';

    echo '<div class="container"><div style="text-align: center;"><div class="currently z-depth-1 green">' . $currently . '</div></div><div class="section"><ul class="flex-container">';

    for($i = 0; $i < 3; $i++){

    }
}

?>
</body>
</html>
