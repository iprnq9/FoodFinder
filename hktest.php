
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



if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

else {
        //get the number of objects in database
        $resource = $con->query("SELECT * FROM location_id");
        $count = $resource->num_rows; 
        //echo $count; testing

        //create objects in array
        for($x=0; $x <= $count; $x++){
            $objArray[$x] = new joeMinr;
        }

        //assign names to objects || set ids
        $nameC = $count+1;
    for ($x = 1; $x < $nameC; $x++  ){
        $location_name = $con->query("SELECT location_name FROM location_id WHERE id=$x")->fetch_object()->location_name;
        $y = $x-1;
        $objArray[$y]->setName($location_name);
        $objArray[$y]->setId($x);
}

    //get brkfst times
    for($x=0; $x <= $count; $x++){
        $curid = $objArray[$x]->getId();
        for ($y = 1; $y < 7; $y++  ){
            $opentime = $con->query("SELECT opentime FROM breakfast WHERE id=$curid AND day =$y");
            $row_cnt = $opentime->num_rows;
                if($row_cnt > 0){
                    $opentime = $con->query("SELECT opentime FROM breakfast WHERE id=$curid AND day =$y")->fetch_object()->opentime;
                    $objArray[$x]->setopnTime($y,"brkfst",$opentime);
                }
        }
    }





//$test1 = $objArray[0]->getName();
//$test2 = $objArray[0]->getId();
//echo $test1 ."<br>";
//echo $test2 ."<br>";

//check info by pulling info out of object
for ($x = 1; $x < 7; $x++  ){
$this20 = $objArray[5]->getopnTime($x,"brkfst");
if( $this20 != Null){
echo $x . $objArray[5]->getopnTime($x,"brkfst") ."<br>";
}}






}
?>
</body>
</html>