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


//this loads info from database into object|| breakfast times for tj
  for ($x = 1; $x < 7; $x++  ){
        $opentime = $con->query("SELECT opentime FROM breakfast WHERE id=6 AND day =$x");
        $row_cnt = $opentime->num_rows;
        //echo "row". $row_cnt  ."<br>";
        if($row_cnt > 0){
            $opentime = $con->query("SELECT opentime FROM breakfast WHERE id=6 AND day =$x")->fetch_object()->opentime;
            //echo "x". $x ."<br>";
            $tj->setopnTime($x,"brkfst",$opentime);
        }

     
}
}

//check info by pulling info out of object
for ($x = 1; $x < 7; $x++  ){
$this20 = $tj->getopnTime($x,"brkfst");
if( $this20 != Null){
echo $x . $tj->getopnTime($x,"brkfst") ."<br>";
}}


?>
</body>
</html>