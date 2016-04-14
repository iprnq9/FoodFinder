<!DOCTYPE html>
<html>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('html_errors', 'On');

include 'food-fundraiser-obj.php';

include 'db-connect.php';

$con = new mysqli($host, $user, $password, $dbname);

if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

else {
    $fundArray = array();
    include 'pullFundraisers.php';
    $count = sizeof($fundArray);

    for ($x = 0; $x < $count; $x++){
        echo $fundArray[$x]->getName();
        echo "<br>";
        echo $fundArray[$x]->getOrganization();
        echo "<br>";
        echo $fundArray[$x]->getDescription();
        echo "<br>";
        echo $fundArray[$x]->getId();
        echo "<br>";
        echo $fundArray[$x]->getStartDate();
        echo "<br>";
        echo $fundArray[$x]->getStartTime();
        echo "<br>";
        echo $fundArray[$x]->getEndDate();
        echo "<br>";
        echo $fundArray[$x]->getEndTime();
        echo "<br>";
        echo $fundArray[$x]->getCoverPhoto();
        echo "<br>";
        echo $fundArray[$x]->status();
    }


}

?>
</body>
</html>
