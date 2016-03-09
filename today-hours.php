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
$currently = date("l, g:ia") . ': ' . $currentMeal;

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

    $max = sizeof($objArray);
    $sinceEpoch = strtotime("today");
    $openTime0 = $objArray[0]->getopnTime(2, brkfst);
    $openTime0 = $openTime0*60+$sinceEpoch;
    $openTime0 = date('H:i', $openTime0);

    $closeTime0 = $objArray[0]->getclsTime(2, brkfst);
    $closeTime0 = $closeTime0*60+$sinceEpoch;
    $closeTime0 = date('H:i', $closeTime0);

    $mealArray = array("brkfst", "lnch", "dnnr");
    $numOfMeals = sizeof($mealArray);

    for($i = 0; $i < $numOfMeals - 1; $i++){
        $openTime0 = $objArray[0]->getopnTime(2, $mealArray[$i]);
        $openTime0 = $openTime0*60+$sinceEpoch;
        $openTime0 = date('H:i', $openTime0);
        if ($openTime0 !== NULL)
            echo $openTime0 . '<br><br>';
    }

    //echo 'Open: '  . $openTime0  . '<br><br>';
    // 'Close: ' . $closeTime0 . '<br><br>';

    echo $objArray[0]->getopnTime(2, brkfst) . '<br><br>';
    echo $objArray[0]->getopnTime(2, lnch) . '<br><br>';
    echo $objArray[0]->getopnTime(2, dnnr) . '<br><br>';

    //echo $objArray[0]->getopnTime(2, brkfst) . '<br><br>';
    //echo $objArray[0]->getclsTime(2, brkfst) . '<br><br>';
    //echo $objArray[0]->getopnTime(2, lnch) . '<br><br>';
    //echo $objArray[0]->getclsTime(2, lnch) . '<br><br>';
    //echo $objArray[0]->getopnTime(2, dnnr) . '<br><br>';
    //echo $objArray[0]->getclsTime(2, dnnr) . '<br><br>';

}

include 'footer.php';
?>
</body>
</html>
