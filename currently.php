<?php

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

echo '<div class="currently z-depth-1 green">' . $currently . '</div>';

?>
