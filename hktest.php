
<!DOCTYPE html>
<html>
<body>
<?php


include 'food-finderprj.php';
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('html_errors', 'On');

$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="FoodFinder";
$dbname="goldgreen";



$con = new mysqli($host, $user, $password, $dbname);
$obj1 = new joeMinr;
$obj2 = new joeMinr;
$obj3 = new joeMinr;
$obj4 = new joeMinr;
$obj5 = new joeMinr;
$obj6 = new joeMinr;
$obj7 = new joeMinr;
$objArray = array($obj1, $obj2, $obj3, $obj4, $obj5, $obj6, $obj7 );
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

else {











}
?>
</body>
</html>