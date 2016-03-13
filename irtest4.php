<!--Thanks to Russell Bell for his help-->
<!DOCTYPE html>
<html>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('html_errors', 'On');

include 'food-finderprj2.php';

include 'db-connect.php';

$con = new mysqli($host, $user, $password, $dbname);

$objArray = array();

if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

else {
    include 'pullData2.php';

    for($location = 0; $location < (sizeof($objArray)); $location++)
    {
        echo "Name: " . $objArray[$location]->getName();
        echo "<br><br>";
        echo "getopnTime(): " . $objArray[$location]->getopnTime(1, "brkfst");
        echo "<br><br>";
        echo "Id: " . $objArray[$location]->getId();
        echo "<br><br>";
        echo "Status: " . $objArray[$location]->status();
        echo "<br><br>";
        print_r($objArray[$location]->openTimes);
        echo "<br><br>";
        print_r($objArray[$location]->numOpenCloseTimes);
        for($day = 0; $day < 7; $day++)
        {
            echo "<strong>Day #: " . $day . "</strong>";
            echo "<br><br>";
            echo "Num Open/Close Times: " . $objArray[$location]->getNumOpenCloseTimes($day);
            echo "<br><br>";
            for($meal = 0; $meal < ($objArray[$location]->getNumOpenCloseTimes($day)); $meal++)
            {
                echo "Open Time " . $meal . ": " . $objArray[$location]->getOpenTime($day, $meal);
                echo "<br><br>";
                echo "Close Time " . $meal . ": " . $objArray[$location]->getCloseTime($day, $meal);
                echo "<br><br>";
                echo " - - -";
            }


        }
        echo "<br><br>";
        echo "<hr />";
        echo "<br><br>";

    }

}

?>

</body>
</html>