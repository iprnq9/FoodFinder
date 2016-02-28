<!DOCTYPE html>
<html>
<body>
<?php
include 'food-finderprj.php';

include 'db-connect.php';

$con = new mysqli($host, $user, $password, $dbname);

$objArray = array();

$dayNumber = date("w")+1;

echo 'Current day #' . $dayNumber . '<br>';

if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

else {
    include 'pullData.php';

    for($i = 0; $i < 3; $i++){
        echo "Location Name: " . $objArray[$i]->getName() ."<br>";
        echo "Location ID: " . $objArray[$i]->getId() ."<br>";
        echo "Current status: " . $objArray[$i]->status() ."<br>";
    }
}

?>
</body>
</html>
