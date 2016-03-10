
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
    for ($x = 0; $x < $count; $x++) {
        $objArray[$x] = new joeMinr;
    }

    //assign names to objects || set ids
    $nameC = $count + 1;
    for ($x = 1; $x < $nameC; $x++) {
        $location_name = $con->query("SELECT location_name FROM location_id WHERE id=$x")->fetch_object()->location_name;
        $y = $x - 1;
        $objArray[$y]->setName($location_name);
        $objArray[$y]->setId($x);
    }

//OPEN TIMES
    //get brkfst times
    for ($x = 0; $x < $count; $x++) {
        $curid = $objArray[$x]->getId();
        for ($y = 1; $y <= 7; $y++) {
            $opentime = $con->query("SELECT opentime FROM breakfast WHERE id=$curid AND day =$y");
            $row_cnt = $opentime->num_rows;
            if ($row_cnt > 0) {
                $opentime = $con->query("SELECT opentime FROM breakfast WHERE id=$curid AND day =$y")->fetch_object()->opentime;
                $objArray[$x]->setopnTime($y, "brkfst", $opentime);
            }
        }
    }

    //lunch times
    for ($x = 0; $x < $count; $x++) {
        $curid = $objArray[$x]->getId();
        for ($y = 1; $y <= 7; $y++) {
            $opentime = $con->query("SELECT opentime FROM lunch WHERE id=$curid AND day =$y");
            $row_cnt = $opentime->num_rows;
            if ($row_cnt > 0) {
                $opentime = $con->query("SELECT opentime FROM lunch WHERE id=$curid AND day =$y")->fetch_object()->opentime;
                $objArray[$x]->setopnTime($y, "lnch", $opentime);
            }
        }
    }

    //dinner times
    for ($x = 0; $x < $count; $x++) {
        $curid = $objArray[$x]->getId();
        for ($y = 1; $y <= 7; $y++) {
            $opentime = $con->query("SELECT opentime FROM dinner WHERE id=$curid AND day =$y");
            $row_cnt = $opentime->num_rows;
            if ($row_cnt > 0) {
                $opentime = $con->query("SELECT opentime FROM dinner WHERE id=$curid AND day =$y")->fetch_object()->opentime;
                $objArray[$x]->setopnTime($y, "dnnr", $opentime);
            }
        }
    }

//CLOSETIMES
    //get brkfst close times
    for ($x = 0; $x < $count; $x++) {
        $curid = $objArray[$x]->getId();
        for ($y = 1; $y <= 7; $y++) {
            $closetime = $con->query("SELECT closetime FROM breakfast WHERE id=$curid AND day =$y");
            $row_cnt = $closetime->num_rows;
            if ($row_cnt > 0) {
                $closetime = $con->query("SELECT closetime FROM breakfast WHERE id=$curid AND day =$y")->fetch_object()->closetime;
                $objArray[$x]->setclsTime($y, "brkfst", $closetime);
            }
        }
    }

    //get lunch close times
    for ($x = 0; $x < $count; $x++) {
        $curid = $objArray[$x]->getId();
        for ($y = 1; $y <= 7; $y++) {
            $closetime = $con->query("SELECT closetime FROM lunch WHERE id=$curid AND day =$y");
            $row_cnt = $closetime->num_rows;
            if ($row_cnt > 0) {
                $closetime = $con->query("SELECT closetime FROM lunch WHERE id=$curid AND day =$y")->fetch_object()->closetime;
                $objArray[$x]->setclsTime($y, "lnch", $closetime);
            }
        }
    }


    //get dinner close times
    for ($x = 0; $x < $count; $x++) {
        $curid = $objArray[$x]->getId();
        for ($y = 1; $y <= 7; $y++) {
            $closetime = $con->query("SELECT closetime FROM dinner WHERE id=$curid AND day =$y");
            $row_cnt = $closetime->num_rows;
            if ($row_cnt > 0) {
                $closetime = $con->query("SELECT closetime FROM dinner WHERE id=$curid AND day =$y")->fetch_object()->closetime;
                $objArray[$x]->setclsTime($y, "dnnr", $closetime);
            }
        }
    }
}
//for testing
    /*
    $max = sizeof($objArray);
    for($i = 0; $i < ($max) ; $i++){
        echo "Location Name: " . $objArray[$i]->getName() ."<br>";
        echo "Location ID: " . $objArray[$i]->getId() ."<br>";
        echo "Current status: " . $objArray[$i]->status() ."<br>";
        for ($x = 1; $x <= 7; $x++  ){
            $this20 = $objArray[$i]->getopnTime($x,"brkfst");
            if( $this20 != Null){
                echo "breakfast " . $x . " : ". $objArray[$i]->getopnTime($x,"brkfst") ."<br>";
         }}

         for ($x = 1; $x <= 7; $x++  ){
            $this20 = $objArray[$i]->getopnTime($x,"lnch");
            if( $this20 != Null){
                echo "Lunch " . $x . " : ". $objArray[$i]->getopnTime($x,"lnch") ."<br>";
         }}

         for ($x = 1; $x <= 7; $x++  ){
            $this20 = $objArray[$i]->getopnTime($x,"dnnr");
            if( $this20 != Null){
                echo "Dinner " . $x . " : ". $objArray[$i]->getopnTime($x,"dnnr") ."<br>";
         }}

    }

        $x= 4;
        echo "Location Name: " . $objArray[3]->getName() ."<br>";
        echo "Location ID: " . $objArray[3]->getId() ."<br>";
        echo "Lunch " . $x . " : ". $objArray[3]->getopnTime($x,"lnch") ."<br>";
        echo "Lunch close" . $x . " : ". $objArray[3]->getclsTime($x,"lnch") ."<br>";
        echo "Dinner " . $x . " : ". $objArray[3]->getopnTime($x,"dnnr") ."<br>";
        echo "Dinner close" . $x . " : ". $objArray[3]->getclsTime($x,"dnnr") ."<br>";
        echo "Current status: " . $objArray[3]->status() ."<br>";

    }

    //sending shit to android
    $max = sizeof($objArray);
    for($i = 0; $i <= ($max) ; $i++){

        echo $objArray[$i]->getName() . ",";
    for ($x = 1; $x <= 7; $x++  ){
          $this20 = $objArray[$i]->getopnTime($x,"brkfst");
          if( $this20 != Null){
              echo $objArray[$i]->getopnTime($x,"brkfst"); .",";
          }
          //else{
         //     echo -1.",";
         // }

          //$this20 = null;
          $this20 = $objArray[$i]->getclsTime($x,"brkfst");
          if( $this20 != Null){
              echo $this20 .",";
          }
          else{
              echo -1. ",";
          }


          //$this20 = null;
          $this20 = $objArray[$i]->getopnTime($x,"lnch");
          if( $this20 != Null){
              echo $this20 .",";
          }
          else{
              echo -1. ",";
          }
          //$this20 = null;
          $this20 = $objArray[$i]->getclsTime($x,"lnch");
          if( $this20 != Null){
              echo $this20 .",";
          }
          else{
              echo -1. ",";
          }



          //$this20 = null;
          $this20 = $objArray[$i]->getopnTime($x,"dnnr");
          if( $this20 != Null){
              echo $this20 . ",";
          }
          else{
              echo -1.",";
          }
          //$this20 = null;
          $this20 = $objArray[$i]->getclsTime($x,"dnnr");
          if( $this20 != Null){
              echo $this20 . ",";
          }
          else{
              echo -1. ",";
          }


      }
      echo "<br>";
  }

*/





?>
</body>
</html>