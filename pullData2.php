<?php
//get the number of objects in database
$resource = $con->query("SELECT * FROM location_id");
$count = $resource->num_rows;

$dayNumber = date("w")+1;

//create objects in array
for($x=0; $x < $count; $x++){
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

//OPEN TIMES
//get brkfst times
for($x=0; $x < $count; $x++){
    $curid = $objArray[$x]->getId();
    for ($y = 1; $y <= 7; $y++  ){
        $opentime = $con->query("SELECT opentime FROM breakfast WHERE id=$curid AND day =$y");
        $row_cnt = $opentime->num_rows;
        if($row_cnt > 0){
            $opentime = $con->query("SELECT opentime FROM breakfast WHERE id=$curid AND day =$y")->fetch_object()->opentime;
            $objArray[$x]->setopnTime($y,"brkfst",$opentime);
        }
    }
}

//lunch times
for($x=0; $x < $count; $x++){
    $curid = $objArray[$x]->getId();
    for ($y = 1; $y <= 7; $y++  ){
        $opentime = $con->query("SELECT opentime FROM lunch WHERE id=$curid AND day =$y");
        $row_cnt = $opentime->num_rows;
        if($row_cnt > 0){
            $opentime = $con->query("SELECT opentime FROM lunch WHERE id=$curid AND day =$y")->fetch_object()->opentime;
            $objArray[$x]->setopnTime($y,"lnch",$opentime);
        }
    }
}

//dinner times
for($x=0; $x < $count; $x++){
    $curid = $objArray[$x]->getId();
    for ($y = 1; $y <= 7; $y++  ){
        $opentime = $con->query("SELECT opentime FROM dinner WHERE id=$curid AND day =$y");
        $row_cnt = $opentime->num_rows;
        if($row_cnt > 0){
            $opentime = $con->query("SELECT opentime FROM dinner WHERE id=$curid AND day =$y")->fetch_object()->opentime;
            $objArray[$x]->setopnTime($y,"dnnr",$opentime);
        }
    }
}

//CLOSETIMES
//get brkfst close times
for($x=0; $x < $count; $x++){
    $curid = $objArray[$x]->getId();
    for ($y = 1; $y <= 7; $y++  ){
        $closetime = $con->query("SELECT closetime FROM breakfast WHERE id=$curid AND day =$y");
        $row_cnt = $closetime->num_rows;
        if($row_cnt > 0){
            $closetime = $con->query("SELECT closetime FROM breakfast WHERE id=$curid AND day =$y")->fetch_object()->closetime;
            $objArray[$x]->setclsTime($y,"brkfst",$closetime);
        }
    }
}

//get lunch close times
for($x=0; $x < $count; $x++){
    $curid = $objArray[$x]->getId();
    for ($y = 1; $y <= 7; $y++  ){
        $closetime = $con->query("SELECT closetime FROM lunch WHERE id=$curid AND day =$y");
        $row_cnt = $closetime->num_rows;
        if($row_cnt > 0){
            $closetime = $con->query("SELECT closetime FROM lunch WHERE id=$curid AND day =$y")->fetch_object()->closetime;
            $objArray[$x]->setclsTime($y,"lnch",$closetime);
        }
    }
}

//get dinner close times
for($x=0; $x < $count; $x++){
    $curid = $objArray[$x]->getId();
    for ($y = 1; $y <= 7; $y++  ){
        $closetime = $con->query("SELECT closetime FROM dinner WHERE id=$curid AND day =$y");
        $row_cnt = $closetime->num_rows;
        if($row_cnt > 0){
            $closetime = $con->query("SELECT closetime FROM dinner WHERE id=$curid AND day =$y")->fetch_object()->closetime;
            $objArray[$x]->setclsTime($y,"dnnr",$closetime);
        }
    }
}

for ($x = 0; $x < $count; $x++) {
    $objArray[$x]->setOpenCloseArray();
    $desc = $con->query("SELECT description FROM descriptions WHERE id=($x+1)")->fetch_object()->description;
    $objArray[$x]->setDescription($desc);
}

for ($x = 0; $x < $count; $x++){
    for($card = 1; $card <=4; $card++){
        $query = "SELECT head" . $card . " FROM descriptions WHERE id=" . ($x+1);
        $colName = "head" . $card;
        $val = $con->query($query)->fetch_object()->$colName;
        $objArray[$x]->setHeadingArray(($card-1), $val);

        $query = "SELECT par" . $card . " FROM descriptions WHERE id=" . ($x+1);
        $colName = "par" . $card;
        $val = $con->query($query)->fetch_object()->$colName;
        $objArray[$x]->setParagraphArray(($card-1), $val);

        $query = "SELECT img" . $card . " FROM descriptions WHERE id=" . ($x+1);
        $colName = "img" . $card;
        $val = $con->query($query)->fetch_object()->$colName;
        $objArray[$x]->setImageArray(($card-1), $val);
    }

    $query = "SELECT coverPhoto FROM descriptions WHERE id=" . ($x+1);
    $colName = "coverPhoto";
    $val = $con->query($query)->fetch_object()->$colName;
    $objArray[$x]->setCoverPhoto($val);

    $query = "SELECT menu FROM descriptions WHERE id=" . ($x+1);
    $colName = "menu";
    $val = $con->query($query)->fetch_object()->$colName;
    $objArray[$x]->setMenu($val);

    $query = "SELECT location FROM descriptions WHERE id=" . ($x+1);
    $colName = "location";
    $val = $con->query($query)->fetch_object()->$colName;
    $objArray[$x]->setLocation($val);
}
?>