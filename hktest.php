
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
//$obj1 = new joeMinr;
//$obj2 = new joeMinr;
//$obj3 = new joeMinr;
//$obj4 = new joeMinr;
//$obj5 = new joeMinr;
//$obj6 = new joeMinr;
//$obj7 = new joeMinr;
$objArray = array();

for($x=0; $x <= 7; $x++){
            $objArray[$x] = new joeMinr;
        }

if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

else {
    for ($x = 1; $x < 8; $x++  ){
        $location_name = $con->query("SELECT location_name FROM location_id WHERE id=$x")->fetch_object()->location_name;
        $y = $x+1;
//        $objArray[$y]->setName($location_name);
}









}
?>
</body>
</html>