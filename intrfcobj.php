<?php


$host="127.0.0.1";
$port=3306;
$socket="";
$user="joemnr";
$password="engineer";
$dbname="goldgreen";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket);
$tj = new joeMinr;
$tj->setName("Thomas Jefferson");
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

else {
    for ($x = 0; $x < 7; $x++  ){
        $opntime = $con->query("SELECT opentime FROM breakfast WHERE id=6 AND day =$x ")->fetch_object()->$opntime;
        $tj->setopnTime($x,"brkfst",$con);
        }


}
echo $tj->getopnTime(2,"brkfst");