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
$tj = new joeMinr;
$tj->setName("Thomas Jefferson");
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

else {
  
  for ($x = 0; $x < 7; $x++  ){
        $opentime = $con->query("SELECT opentime FROM breakfast WHERE id=6 AND day =$x");
        $row_cnt = $opentime->num_rows;
        if($row_cnt > 0){
            $opentime = $con->query("SELECT opentime FROM breakfast WHERE id=6 AND day =$x")->fetch_object()->opentime;
            $tj->setopnTime($x,"brkfst",$opentime);
        }

     
}
}
 echo $tj->getopnTime(1,"brkfst");

?>
</body>
</html>