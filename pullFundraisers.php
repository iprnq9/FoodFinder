<?php
//get the number of objects in database
$resource = $con->query("SELECT * FROM fundraisers");
$count = $resource->num_rows;


//create objects in array
for($x=0; $x < $count; $x++){
    $fundArray[$x] = new foodFund;
}

//assign names to objects || set ids
$nameC = $count+1;

for ($x = 0; $x < $count; $x++){
    $query = "SELECT id FROM fundraisers WHERE id=" . ($x+1);
    $colName = "id";
    $val = $con->query($query)->fetch_object()->$colName;
    $fundArray[$x]->setId($val);

    $query = "SELECT name FROM fundraisers WHERE id=" . ($x+1);
    $colName = "name";
    $val = $con->query($query)->fetch_object()->$colName;
    $fundArray[$x]->setName($val);

    $query = "SELECT coverPhoto FROM fundraisers WHERE id=" . ($x+1);
    $colName = "coverPhoto";
    $val = $con->query($query)->fetch_object()->$colName;
    $fundArray[$x]->setCoverPhoto($val);

    $query = "SELECT location FROM fundraisers WHERE id=" . ($x+1);
    $colName = "location";
    $val = $con->query($query)->fetch_object()->$colName;
    $fundArray[$x]->setLocation($val);

    $query = "SELECT organization FROM fundraisers WHERE id=" . ($x+1);
    $colName = "organization";
    $val = $con->query($query)->fetch_object()->$colName;
    $fundArray[$x]->setOrganization($val);

    $query = "SELECT description FROM fundraisers WHERE id=" . ($x+1);
    $colName = "description";
    $val = $con->query($query)->fetch_object()->$colName;
    $fundArray[$x]->setDescription($val);

    $query = "SELECT start FROM fundraisers WHERE id=" . ($x+1);
    $colName = "start";
    $val = $con->query($query)->fetch_object()->$colName;
    $fundArray[$x]->setStartDate($val);

    $query = "SELECT end FROM fundraisers WHERE id=" . ($x+1);
    $colName = "end";
    $val = $con->query($query)->fetch_object()->$colName;
    $fundArray[$x]->setEndDate($val);

    $query = "SELECT open FROM fundraisers WHERE id=" . ($x+1);
    $colName = "open";
    $val = $con->query($query)->fetch_object()->$colName;
    $fundArray[$x]->setStartTime($val);

    $query = "SELECT close FROM fundraisers WHERE id=" . ($x+1);
    $colName = "close";
    $val = $con->query($query)->fetch_object()->$colName;
    $fundArray[$x]->setEndTime($val);

    $query = "SELECT contact FROM fundraisers WHERE id=" . ($x+1);
    $colName = "contact";
    $val = $con->query($query)->fetch_object()->$colName;
    $fundArray[$x]->setContact($val);

}
?>