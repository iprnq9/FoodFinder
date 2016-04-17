<!--Thanks to Russell Bell for his help-->
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
<meta name="theme-color" content="#66BB6A" />

<title>Update <!--TITLE--> | FoodFinder</title>

<!-- CSS  -->
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<script type="text/javascript" src="js/moment.js"></script>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700,500' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oswald:700,300,400' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
<link href="custom.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.timepicker.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.timepicker.css" />

<style>
    .row {
        margin-bottom: 0px;
    }
</style>

<body>
<?php

include 'header.php';

include 'functions.php';

echo "<div class=\"container\">\n";

//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
//ini_set('html_errors', 'On');

include 'food-finderprj2.php';

include 'db-connect.php';

//get location id from URL variable
$id = htmlspecialchars($_GET["id"]);
$i = $id;

$edit = htmlspecialchars($_GET["edit"]);
// Create connection
$con = new mysqli($host, $user, $password, $dbname);

$objArray = array();

include 'pullData2.php';

$max = sizeof($objArray);

if($id > $max || $id <= 0 || $id == NULL){
    header("Location: update-data.php"); /* Redirect browser */
    exit();
}


if ($con->connect_errno) {
    echo "<i class=\"material-icons small\">error_outline</i>Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

else {
    $name = $objArray[$id-1]->getName();

    $pageContents = ob_get_contents (); // Get all the page's HTML into a string
    ob_end_clean (); // Wipe the buffer

    // Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
    echo str_replace ('<!--TITLE-->', $name, $pageContents);

    echo "<h4 class=\"heading center-align\"><i class=\"material-icons small\">create</i>&nbsp;Update Location:<br>" . $objArray[$id-1]->getName() . "</h4>";
    echo " <div class=\"row\">\n";
    //echo "  <div class=\"col s12 m8 push-m2\">\n";
    //echo "   <div class=\"card-panel white\">\n";
    //echo "<div class=\"row\">\n";

    if($edit == name){

        echo "      <div class=\"row\">\n";
        echo "        <div class=\"col s12 l8 push-l2\">\n";
        echo "          <div class=\"card grey darken-4 white-text\">\n";
        echo "            <div class=\"card-content\">\n";
        echo "              <span class=\"card-title\">Update Name</span>\n";
        echo "              <p>Update the name of the location. Please use proper capitalization and avoid special characters (&, #, @, etc).</p>\n";
        echo "            </div>\n";
        echo "            <div class=\"card-action\">\n";

        echo "<div class=\"row\">\n";

        if(isset($_POST['update1'])) {

            $location_name = $_POST['location_name'];

            $sql = "UPDATE location_id SET location_name=\"$location_name\" WHERE id=$id";
            $result = mysqli_query($con, $sql);

            if (!$result)
            {
                formFail("Name");
            }

            else
            {
                formSuccess("Name");
            }
        }

        else
        {
?>
            <form class="col s12" method="post" action="<?php $_PHP_SELF ?>" target="">
                <div class="row" style="padding: 0px;">
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">label_outline</i>
                        <input id="location_name" name="location_name" type="text" length="45" value="<?php echo $objArray[$id-1]->getName(); ?>">
                        <label for="location_name">New Name</label>
                    </div>
                </div>
                <div class="input-field col s6">
                    <button class="btn waves-effect waves-light" type="submit" name="update1" id="update1">Update
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>

            <?php


?>

            <?php
//            echo "            </div>\n";
//            echo "          </div>\n";
//            echo "        </div>\n";
//            echo "      </div>";
        }
        echo "            </div>\n";
        echo "          </div>\n";
        echo "        </div>\n";
        echo "        </div>\n";
        echo "      </div>\n";
        echo "        </div>\n";
    }

    elseif($edit == hours){

        echo "      <div class=\"row\">\n";
        echo "        <div class=\"col s12 l8 push-l2\">\n";
        echo "          <div class=\"card grey darken-4 white-text\">\n";
        echo "            <div class=\"card-content\">\n";
        echo "              <span class=\"card-title\">Update Hours</span>\n";
        echo "              <p>Update the hours of the location. Use the dropdown selectors to input the hours.</p>\n";
        echo "              <p>If the location opens before 10:00am, update the Breakfast Open and Close (even after the Close is after 10:00am). If the location opens before 10:00am and then closes at 2:00pm and then reopens at 4:00pm and
              closes at 7:00pm, then it would look like this: </p>\n";
        echo "              <ul style='margin-left: 10px;'><li>Breakfast: 10:00am to 2:00pm</li><li>Lunch: 4:00pm to 7:00pm</li><li>Dinner: [nothing] to [nothing]</li></ul>\n";
        echo "            </div>\n";
        echo "            <div class=\"card-action\">\n";

        echo "<div class=\"row\">\n";

        if(isset($_POST['updatehours'])) {

//            $open1 = $_POST['open1'];
//            $close1 = $_POST['close1'];
//            $open2 = $_POST['open2'];
//            $close2 = $_POST['close2'];
//            $open3 = $_POST['open3'];
//            $close3 = $_POST['close3'];

//            $openArray = array($open1, $open2, $open3);
//            $closeArray = array($close1, $close2, $close3);

            for($day=1; $day <= 7; $day++){
                for($meal = 1; $meal <= 3; $meal++){
                    $open = $_POST['open'.$day.$meal]; //open13 would be sunday dinner
                    $close = $_POST['close'.$day.$meal];

                    if($open !== "" && $close !== ""){
                        $open = new DateTime($open);
                        //echo $open->format('H:i:s');
                        $openMinutes =  ($open->format('a') * 1440) + // total days converted to minutes
                                 ($open->format('H') * 60) +   // hours converted to minutes
                                  $open->format('i');          // minutes

                        //echo $openMinutes;

                        $open = date("H:i:s", mktime(0, $openMinutes, 0));

                        //echo $open;

                        //$close = $_POST['close'];
                        $close = new DateTime($close);
                        //echo $close->format('H:i:s');
                        $closeMinutes =  ($close->format('a') * 1440) + // total days converted to minutes
                            ($close->format('H') * 60) +   // hours converted to minutes
                            $close->format('i');          // minutes

                        if($openMinutes <= 600){
                            //update breakfast hours
                            $sql = "INSERT INTO breakfast (id, opentime, closetime, day) VALUES ($id, $openMinutes, $closeMinutes, $day) ON DUPLICATE KEY UPDATE opentime=$openMinutes, closetime=$closeMinutes";
                            $result = mysqli_query($con, $sql);
                            //echo "test";
                        }

                        elseif($openMinutes > 990){
                            //update dinner hours
                            $sql = "INSERT INTO dinner (id, opentime, closetime, day) VALUES ($id, $openMinutes, $closeMinutes, $day) ON DUPLICATE KEY UPDATE opentime=$openMinutes, closetime=$closeMinutes";
                            $result = mysqli_query($con, $sql);
                            //echo "test1";
                        }

                        else{
                            //update lunch
                            $sql = "INSERT INTO lunch (id, opentime, closetime, day) VALUES ($id, $openMinutes, $closeMinutes, $day) ON DUPLICATE KEY UPDATE opentime=$openMinutes, closetime=$closeMinutes";
                            $result = mysqli_query($con, $sql);
                            //echo "test2";
                        }
                    }
                }
            }

            if (!$result)
            {
                formFail("Hours");
            }

            else
            {
                formSuccess("Hours");
            }
        }

        else
        {
            ?>
            <form class="col s12" method="post" action="<?php $_PHP_SELF ?>" target="">
                <div class="row" style="padding: 0px;">
                    <ul class="collapsible" data-collapsible="expandable">
                        <?php
                        $dayArray = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
                        $mealArray = array("Breakfast", "Lunch", "Dinner");
                        $mealIndex = array("brkfst", "lnch", "dnnr");
                        for($day=1; $day <= 7; $day++){
                            $i = $day - 1;
                            $k = $id - 1;
                            echo "<li>\n";
                            echo "                            <div class=\"collapsible-header green black-text\"><i class=\"material-icons\">today</i>$dayArray[$i]</div>\n";
                            echo "                            <div class=\"collapsible-body white black-text\">\n";
                            echo "                                <div class=\"row\" style=\"padding: 0px;\">\n";
                            for($meal=1; $meal <= 3; $meal++){
                                $j = $meal - 1;
                                //$j = $mealIndex[$j];
//                                echo "                                    <div class=\"input-field col s12 l1\">\n";
//                                echo "                                        Breakfast:";
//                                echo "                                    </div>\n";
                                echo "                                    <div class=\"input-field col s11 l6\">\n";
                                echo "                                        <i class=\"material-icons prefix hide-on-med-and-down\">access_time</i>\n";
                                echo "                                        <input value=\"" . $objArray[$k]->getOpenTime($i, $j) . "\" type=\"text\" class=\"timepicker\" name=\"open".$day.$meal."\" id=\"open".$day.$meal."\"/>\n";
                                echo "                                        <label for=\"open".$day.$meal."\">$mealArray[$j]&nbsp;Open</label>\n";
                                echo "                                    </div>\n";
                                echo "                                    <div class=\"input-field col s11 l6\">\n";
                                echo "                                        <i class=\"material-icons prefix hide-on-med-and-down hide-on-med-and-up\">access_time</i>\n";
                                echo "                                        <input value=\"" . $objArray[$k]->getCloseTime($i, $j) . "\" type=\"text\" class=\"timepicker\" name=\"close".$day.$meal."\" id=\"close".$day.$meal."\"/>\n";
                                echo "                                        <label for=\"close".$day.$meal."\">$mealArray[$j]&nbsp;Close</label>\n";
                                echo "                                    </div>\n";
                            }
                            echo "                                </div>\n";
                            echo "                            </div>\n";
                            echo "                        </li>";
                        }
                        ?>
                    </ul>
                </div>
                <div class="input-field col s6">
                    <button class="btn waves-effect waves-light" type="submit" name="updatehours" id="updatehours">Update
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>

            <?php

//
//            echo "            </div>\n";
//            echo "          </div>\n";
//            echo "        </div>\n";
//            echo "        </div>\n";
//            echo "      </div>\n";
//            echo "        </div>\n";
            ?>

            <?php
            //echo "            </div>\n";
//            echo "          </div>\n";
//            echo "        </div>\n";
//            echo "      </div>";
        }

        echo "            </div>\n";
        echo "          </div>\n";
        echo "        </div>\n";
        echo "        </div>\n";
        echo "      </div>\n";
        echo "        </div>\n";

    }

    elseif ($edit == "description"){

        echo "      <div class=\"row\">\n";
        echo "        <div class=\"col s12 l8 push-l2\">\n";
        echo "          <div class=\"card grey darken-4 white-text\">\n";
        echo "            <div class=\"card-content\">\n";
        echo "              <span class=\"card-title\">Update Description</span>\n";
        echo "              <p>Update the description of the location. This should be a short phrase used to define the location. Please use proper capitalization and avoid special characters
               (&, #, @, etc). Ex: \"Classic burgers, made as desired.\"</p>\n";
        echo "            </div>\n";
        echo "            <div class=\"card-action\">\n";

        echo "<div class=\"row\">\n";

        if(isset($_POST['update2'])) {

            $location_description = $_POST['location_description'];

            $sql = "UPDATE descriptions SET description=\"" . $location_description . "\" WHERE id=" . $id;
            $result = mysqli_query($con, $sql);

            if (!$result)
            {
                formFail("Description");
            }

            else
            {
                formSuccess("Description");
            }
        }

        else
        {

            ?>
            <form class="col s12" method="post" action="<?php $_PHP_SELF ?>" target="">
                <div class="row" style="padding: 10px;">
                    <div class="input-field col s12 l8">
                        <i class="material-icons prefix">label_outline</i>
                        <textarea class="materialize-textarea" id="location_description" name="location_description" class="validate" type="text" maxlength="60" length="60"
                                  value="<?php echo
                        $objArray[$id-1]->getDescription();
                        ?>"><?php echo $objArray[$id-1]->getDescription(); ?></textarea>
                        <label for="location_description">New Description</label>
                    </div>
                </div>
                <div class="input-field col s6">
                    <button class="btn waves-effect waves-light" type="submit" name="update2" id="update2">Update
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>

            <?php

            ?>

            <?php
//            echo "            </div>\n";
//            echo "          </div>\n";
//            echo "        </div>\n";
//            echo "      </div>";
        }

        echo "            </div>\n";
        echo "          </div>\n";
        echo "        </div>\n";
        echo "        </div>\n";
        echo "      </div>\n";
        echo "        </div>\n";
    }

    elseif($edit == "cover_photo"){
        echo "      <div class=\"row\">\n";
        echo "        <div class=\"col s12 l8 push-l2\">\n";
        echo "          <div class=\"card grey darken-4 white-text\">\n";
        echo "            <div class=\"card-content\">\n";
        echo "              <span class=\"card-title\">Update Cover Photo</span>\n";
        echo "              <p>Update the cover photo of the location. File must be JPG, PNG, GIF and avoid using spaces or special characters - use underscore (_) or hyphen
             (-).
            .</p>\n";
        echo "            </div>\n";
        echo "            <div class=\"card-action\">\n";

        echo "<div class=\"row\">\n";

        $target_dir = "images/" . $id . "/";
        $target_file = $target_dir . basename($_FILES["coverPhoto"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST['updateCoverPhoto'])) {
            $check = getimagesize($_FILES["coverPhoto"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            }

            else {
                $msg = "File is not an image.";
                $uploadOk = 0;
                fileError($msg);
            }


            // Check file size
            if ($_FILES["coverPhoto"]["size"] > 1000000) {
                $msg = "Sorry, your file is too large.";
                $uploadOk = 0;
                fileError($msg);
            }
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "JPEG" && $imageFileType != "PNG") {
                $msg = "Sorry, only JPG/JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
                fileError($msg);
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $msg = "Sorry, your file was not uploaded.";
                fileError($msg);

            }

            // if everything is ok, try to upload file
            else {
                $filename = basename($_FILES["coverPhoto"]["name"]);
                if (move_uploaded_file($_FILES["coverPhoto"]["tmp_name"], $target_file)) {
                    $sql = "UPDATE descriptions SET coverPhoto=\"" . $filename . "\" WHERE id=" . $id;
                    $result = mysqli_query($con, $sql);
                    //echo $sql;
                    //echo $filename;

                    if (!$result)
                    {
                        formFail("Cover Photo");
                    }

                    else
                    {
                        formSuccess("Cover Photo");
                    }

                }
                else {
                    $msg = "Sorry, there was an error uploading your file \"" . $filename . "\".";
                    fileError($msg);
                }
            }
        }

        else
        {

            ?>
            <form class="col s12" method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data" target="">
                <div class="row" style="padding: 10px;">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>Choose File</span>
                            <input type="file" name="coverPhoto" id="coverPhoto" value="<?php $objArray[$id-1]->getCoverPhoto();?>">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>
                <div class="input-field col s6">
                    <button class="btn waves-effect waves-light" type="submit" name="updateCoverPhoto" id="updateCoverPhoto">Update
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>

            <?php


            ?>

            <?php

        }
        echo "            </div>\n";
        echo "          </div>\n";
        echo "        </div>\n";
        echo "        </div>\n";
        echo "      </div>\n";
        echo "        </div>\n";
    }

    elseif($edit == card_1) {

        echo "      <div class=\"row\">\n";
        echo "        <div class=\"col s12 l8 push-l2\">\n";
        echo "          <div class=\"card grey darken-4 white-text\">\n";
        echo "            <div class=\"card-content\">\n";
        echo "              <span class=\"card-title\">Update Profile Card #1</span>\n";
        echo "              <p>Update the first card found on this location's profile page. Each of the three content cards has an image, heading, and paragraph.<br><br>Please use
         proper
        capitalization and avoid special characters (&, #, @, etc).</p>\n";
        echo "            </div>\n";
        echo "            <div class=\"card-action\">\n";

        if (isset($_POST['update3'])) {

            $card1_heading = $_POST['card1_heading'];

            $sql = "UPDATE descriptions SET head1=\"" . $card1_heading . "\" WHERE id=" . $id;
            $result = mysqli_query($con, $sql);

            if (!$result) {
                formFail("Card 1 Heading");
            }

            else {
                formSuccess("Card 1 Heading");
            }
        }

        else {


            echo "<div class=\"row\">\n";
            ?>

            <form class="col s12" method="post" action="<?php $_PHP_SELF ?>" target="">
                <span class="card-title">Heading</span>
                <div class="row" style="padding: 10px;">
                    <div class="input-field col s12 l8">
                        <i class="material-icons prefix">label_outline</i>
                        <input id="card1_heading" name="card1_heading" type="text" maxlength="45" length="45" value="<?php echo $objArray[$id - 1]->getHeading(0);
                        ?>">
                        <label for="card1_heading">New Card 1 Heading</label>
                    </div>
                </div>
                <div class="input-field col s6">
                    <button class="btn waves-effect waves-light" type="submit" name="update3" id="update3">Update
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>

            <?php

            echo "            </div>\n";

        }

        echo "          </div>\n";


        echo "            <div class=\"card-action\">\n";

        if (isset($_POST['update4'])) {

            $card1_paragraph = $_POST['card1_paragraph'];

            $sql = "UPDATE descriptions SET par1=\"" . $card1_paragraph . "\" WHERE id=" . $id;
            $result = mysqli_query($con, $sql);

            if (!$result) {
                cardActionFail("Card 1 Paragraph not updated successfully.");
            }

            else {
                cardActionSuccess("Card 1 Paragraph updated successfully!");
            }
        }

        else {

            echo "<div class=\"row\">\n";
            ?>

            <form class="col s12" method="post" action="<?php $_PHP_SELF ?>" target="">
                <span class="card-title">Paragraph</span>
                <div class="row" style="padding: 10px;">
                    <div class="input-field col s12 l8">
                        <i class="material-icons prefix">label_outline</i>
                <textarea class="materialize-textarea" id="card1_paragraph" name="card1_paragraph" type="text" maxlength="300" length="300" placeholder=""><?php echo
                    $objArray[$id - 1]->getParagraph(0); ?></textarea>
                        <label for="card1_paragraph">New Card 1 Paragraph</label>
                    </div>
                </div>
                <div class="input-field col s6">
                    <button class="btn waves-effect waves-light" type="submit" name="update4" id="update4">Update
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>

            <?php
            echo "            </div>\n";
        }


        echo "          </div>\n";

        echo "            <div class=\"card-action\">\n";

        $target_dir = "images/" . $id . "/";
        $target_file = $target_dir . basename($_FILES["card1_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        // Check if image file is a actual image or fake image
        if (isset($_POST['update5'])) {
            $check = getimagesize($_FILES["card1_image"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $msg = "File is not an image.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["card1_image"]["size"] > 1000000) {
                $msg .= " Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "JPEG" && $imageFileType != "PNG") {
                $msg .= " Sorry, only JPG/JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $msg .= " Sorry, your file was not uploaded.";

            } // if everything is ok, try to upload file

            else {
                $filename = basename($_FILES["card1_image"]["name"]);
                if (move_uploaded_file($_FILES["card1_image"]["tmp_name"], $target_file)) {
                    $sql = "UPDATE descriptions SET img1=\"" . $filename . "\" WHERE id=" . $id;
                    $result = mysqli_query($con, $sql);
                    //echo $sql;
                    //echo $filename;

                    if (!$result) {
                        $msg .= ' Error: Could not update Card 1 Image.';
                    }

                    else {
                        $msg = "The file \"" . $filename . "\" has been uploaded.";
                        //cardActionSuccess($msg);
                    }
                }

                else {
                    $msg .= " Sorry, there was an error uploading your file \"" . $filename . "\".";
                }
            }

            if ($uploadOk == 1)
                cardActionSuccess($msg);

            else
                cardActionFail($msg);

        } else {

            echo "<div class=\"row\">\n";
            ?>
            <form class="col s12" method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data" target="">
                <span class="card-title">Card Image</span>
                <div class="row" style="padding: 10px;">
                    <div class="file-field input-field black-text">
                        <div class="btn">
                            <span>Choose File</span>
                            <input type="file" name="card1_image" id="card1_image">
                            <label for="card1_image">New Card 1 Image</label>
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>
                <div class="input-field col s6">
                    <button class="btn waves-effect waves-light" type="submit" name="update5" id="update5">Update
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>

            <?php


            echo "            </div>\n";

            ?>

            <?php
        }

        echo "          </div>\n";

        echo "        </div>\n";
        echo "        </div>\n";
        echo "      </div>\n";
        echo "        </div>\n";
    }

    elseif($edit == card_2) {

        echo "      <div class=\"row\">\n";
        echo "        <div class=\"col s12 l8 push-l2\">\n";
        echo "          <div class=\"card grey darken-4 white-text\">\n";
        echo "            <div class=\"card-content\">\n";
        echo "              <span class=\"card-title\">Update Profile Card #2</span>\n";
        echo "              <p>Update the second card found on this location's profile page. Each of the three content cards has an image, heading, and paragraph.<br><br>Please use
         proper
        capitalization and avoid special characters (&, #, @, etc).</p>\n";
        echo "            </div>\n";
        echo "            <div class=\"card-action\">\n";

        if (isset($_POST['update6'])) {

            $card2_heading = $_POST['card2_heading'];

            $sql = "UPDATE descriptions SET head2=\"" . $card2_heading . "\" WHERE id=" . $id;
            $result = mysqli_query($con, $sql);

            if (!$result) {
                formFail("Card 2 Heading");
            }

            else {
                formSuccess("Card 2 Heading");
            }
        }

        else {


            echo "<div class=\"row\">\n";
            ?>

            <form class="col s12" method="post" action="<?php $_PHP_SELF ?>" target="">
                <span class="card-title">Heading</span>
                <div class="row" style="padding: 10px;">
                    <div class="input-field col s12 l8">
                        <i class="material-icons prefix">label_outline</i>
                        <input id="card2_heading" name="card2_heading" type="text" maxlength="45" length="45" value="<?php echo $objArray[$id - 1]->getHeading(1);
                        ?>">
                        <label for="card2_heading">New Card 2 Heading</label>
                    </div>
                </div>
                <div class="input-field col s6">
                    <button class="btn waves-effect waves-light" type="submit" name="update6" id="update6">Update
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>

            <?php

            echo "            </div>\n";

        }

        echo "          </div>\n";


        echo "            <div class=\"card-action\">\n";

        if (isset($_POST['update7'])) {

            $card2_paragraph = $_POST['card2_paragraph'];

            $sql = "UPDATE descriptions SET par2=\"" . $card2_paragraph . "\" WHERE id=" . $id;
            $result = mysqli_query($con, $sql);

            if (!$result) {
                cardActionFail("Card 2 Paragraph not updated successfully.");
            }

            else {
                cardActionSuccess("Card 2 Paragraph updated successfully!");
            }
        }

        else {

            echo "<div class=\"row\">\n";
            ?>

            <form class="col s12" method="post" action="<?php $_PHP_SELF ?>" target="">
                <span class="card-title">Paragraph</span>
                <div class="row" style="padding: 10px;">
                    <div class="input-field col s12 l8">
                        <i class="material-icons prefix">label_outline</i>
                <textarea class="materialize-textarea" id="card2_paragraph" name="card2_paragraph" type="text" maxlength="300" length="300" placeholder=""><?php echo
                    $objArray[$id - 1]->getParagraph(1); ?></textarea>
                        <label for="card2_paragraph">New Card 2 Paragraph</label>
                    </div>
                </div>
                <div class="input-field col s6">
                    <button class="btn waves-effect waves-light" type="submit" name="update7" id="update7">Update
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>

            <?php
            echo "            </div>\n";
        }


        echo "          </div>\n";

        echo "            <div class=\"card-action\">\n";

        $target_dir = "images/" . $id . "/";
        $target_file = $target_dir . basename($_FILES["card2_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        // Check if image file is a actual image or fake image
        if (isset($_POST['update8'])) {
            $check = getimagesize($_FILES["card2_image"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $msg = "File is not an image.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["card2_image"]["size"] > 1000000) {
                $msg .= " Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "JPEG" && $imageFileType != "PNG") {
                $msg .= " Sorry, only JPG/JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $msg .= " Sorry, your file was not uploaded.";

            } // if everything is ok, try to upload file

            else {
                $filename = basename($_FILES["card2_image"]["name"]);
                if (move_uploaded_file($_FILES["card2_image"]["tmp_name"], $target_file)) {
                    $sql = "UPDATE descriptions SET img2=\"" . $filename . "\" WHERE id=" . $id;
                    $result = mysqli_query($con, $sql);
                    //echo $sql;
                    //echo $filename;

                    if (!$result) {
                        $msg .= ' Error: Could not update Card 2 Image.';
                    }

                    else {
                        $msg = "The file \"" . $filename . "\" has been uploaded.";
                        //cardActionSuccess($msg);
                    }
                }

                else {
                    $msg .= " Sorry, there was an error uploading your file \"" . $filename . "\".";
                }
            }

            if ($uploadOk == 1)
                cardActionSuccess($msg);

            else
                cardActionFail($msg);

        } else {

            echo "<div class=\"row\">\n";
            ?>
            <form class="col s12" method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data" target="">
                <span class="card-title">Card Image</span>
                <div class="row" style="padding: 10px;">
                    <div class="file-field input-field black-text">
                        <div class="btn">
                            <span>Choose File</span>
                            <input type="file" name="card2_image" id="card2_image">
                            <label for="card2_image">New Card 2 Image</label>
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>
                <div class="input-field col s6">
                    <button class="btn waves-effect waves-light" type="submit" name="update8" id="update8">Update
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>

            <?php


            echo "            </div>\n";

            ?>

            <?php
        }

        echo "          </div>\n";

        echo "        </div>\n";
        echo "        </div>\n";
        echo "      </div>\n";
        echo "        </div>\n";
    }

    elseif($edit == card_3) {

        echo "      <div class=\"row\">\n";
        echo "        <div class=\"col s12 l8 push-l2\">\n";
        echo "          <div class=\"card grey darken-4 white-text\">\n";
        echo "            <div class=\"card-content\">\n";
        echo "              <span class=\"card-title\">Update Profile Card #3</span>\n";
        echo "              <p>Update the third card found on this location's profile page. Each of the three content cards has an image, heading, and paragraph.<br><br>Please use
         proper
        capitalization and avoid special characters (&, #, @, etc).</p>\n";
        echo "            </div>\n";
        echo "            <div class=\"card-action\">\n";

        if (isset($_POST['update9'])) {

            $card3_heading = $_POST['card3_heading'];

            $sql = "UPDATE descriptions SET head3=\"" . $card3_heading . "\" WHERE id=" . $id;
            $result = mysqli_query($con, $sql);

            if (!$result) {
                formFail("Card 3 Heading");
            }

            else {
                formSuccess("Card 3 Heading");
            }
        }

        else {


            echo "<div class=\"row\">\n";
            ?>

            <form class="col s12" method="post" action="<?php $_PHP_SELF ?>" target="">
                <span class="card-title">Heading</span>
                <div class="row" style="padding: 10px;">
                    <div class="input-field col s12 l8">
                        <i class="material-icons prefix">label_outline</i>
                        <input id="card3_heading" name="card3_heading" type="text" maxlength="45" length="45" value="<?php echo $objArray[$id - 1]->getHeading(2);
                        ?>">
                        <label for="card3_heading">New Card 3 Heading</label>
                    </div>
                </div>
                <div class="input-field col s6">
                    <button class="btn waves-effect waves-light" type="submit" name="update9" id="update9">Update
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>

            <?php

            echo "            </div>\n";

        }

        echo "          </div>\n";


        echo "            <div class=\"card-action\">\n";

        if (isset($_POST['update10'])) {

            $card3_paragraph = $_POST['card3_paragraph'];

            $sql = "UPDATE descriptions SET par3=\"" . $card3_paragraph . "\" WHERE id=" . $id;
            $result = mysqli_query($con, $sql);

            if (!$result) {
                cardActionFail("Card 3 Paragraph not updated successfully.");
            }

            else {
                cardActionSuccess("Card 3 Paragraph updated successfully!");
            }
        }

        else {

            echo "<div class=\"row\">\n";
            ?>

            <form class="col s12" method="post" action="<?php $_PHP_SELF ?>" target="">
                <span class="card-title">Paragraph</span>
                <div class="row" style="padding: 10px;">
                    <div class="input-field col s12 l8">
                        <i class="material-icons prefix">label_outline</i>
                <textarea class="materialize-textarea" id="card3_paragraph" name="card3_paragraph" type="text" maxlength="300" length="300" placeholder=""><?php echo
                    $objArray[$id - 1]->getParagraph(2); ?></textarea>
                        <label for="card3_paragraph">New Card 3 Paragraph</label>
                    </div>
                </div>
                <div class="input-field col s6">
                    <button class="btn waves-effect waves-light" type="submit" name="update10" id="update10">Update
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>

            <?php
            echo "            </div>\n";
        }


        echo "          </div>\n";

        echo "            <div class=\"card-action\">\n";

        $target_dir = "images/" . $id . "/";
        $target_file = $target_dir . basename($_FILES["card3_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        // Check if image file is a actual image or fake image
        if (isset($_POST['update11'])) {
            $check = getimagesize($_FILES["card3_image"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $msg = "File is not an image.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["card3_image"]["size"] > 1000000) {
                $msg .= " Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "JPEG" && $imageFileType != "PNG") {
                $msg .= " Sorry, only JPG/JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $msg .= " Sorry, your file was not uploaded.";

            } // if everything is ok, try to upload file

            else {
                $filename = basename($_FILES["card3_image"]["name"]);
                if (move_uploaded_file($_FILES["card3_image"]["tmp_name"], $target_file)) {
                    $sql = "UPDATE descriptions SET img3=\"" . $filename . "\" WHERE id=" . $id;
                    $result = mysqli_query($con, $sql);
                    //echo $sql;
                    //echo $filename;

                    if (!$result) {
                        $msg .= ' Error: Could not update Card 3 Image.';
                    }

                    else {
                        $msg = "The file \"" . $filename . "\" has been uploaded.";
                        //cardActionSuccess($msg);
                    }
                }

                else {
                    $msg .= " Sorry, there was an error uploading your file \"" . $filename . "\".";
                }
            }

            if ($uploadOk == 1)
                cardActionSuccess($msg);

            else
                cardActionFail($msg);

        } else {

            echo "<div class=\"row\">\n";
            ?>
            <form class="col s12" method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data" target="">
                <span class="card-title">Card Image</span>
                <div class="row" style="padding: 10px;">
                    <div class="file-field input-field black-text">
                        <div class="btn">
                            <span>Choose File</span>
                            <input type="file" name="card3_image" id="card3_image">
                            <label for="card3_image">New Card 3 Image</label>
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>
                <div class="input-field col s6">
                    <button class="btn waves-effect waves-light" type="submit" name="update11" id="update11">Update
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>

            <?php


            echo "            </div>\n";

            ?>

            <?php
        }

        echo "          </div>\n";

        echo "        </div>\n";
        echo "        </div>\n";
        echo "      </div>\n";
        echo "        </div>\n";
    }

    elseif($edit == menu){
        $target_dir = "images/" . $id . "/";
        $target_file = $target_dir . basename($_FILES["menu"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST['updateMenu'])) {

            // Check file size
            if ($_FILES["menu"]["size"] > 1000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if ($imageFileType != "pdf" && $imageFileType != "PDF") {
                echo "Sorry, only pdf/PDF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";

            }

            // if everything is ok, try to upload file
            else {
                $filename = basename($_FILES["menu"]["name"]);
                if (move_uploaded_file($_FILES["menu"]["tmp_name"], $target_file)) {
                    $sql = "UPDATE descriptions SET menu=\"" . $filename . "\" WHERE id=" . $id;
                    $result = mysqli_query($con, $sql);
                    //echo $sql;
                    //echo $filename;

                    if (!$result)
                    {
                        echo ('Error: Could not update Menu.');
                    }

                    else
                    {
                        echo "The file \"" . $filename . "\" has been uploaded.";
                    }

                }
                else {
                    echo "Sorry, there was an error uploading your file \"" . $filename . "\".";
                }
            }
        }

        else
        {
            echo "      <div class=\"row\">\n";
            echo "        <div class=\"col s12 l8 push-l2\">\n";
            echo "          <div class=\"card grey darken-4 white-text\">\n";
            echo "            <div class=\"card-content\">\n";
            echo "              <span class=\"card-title\">Update Menu</span>\n";
            echo "              <p>Update the menu of the location. This will be available for users to download. Must use PDF format.</p>\n";
            echo "            </div>\n";
            echo "            <div class=\"card-action\">\n";

            echo "<div class=\"row\">\n";
            ?>
            <form class="col s12" method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data" target="">
                <div class="row" style="padding: 10px;">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>Choose File</span>
                            <input type="file" name="card3_image" id="card3_image" placeholder="<?php $objArray[$id-1]->getImage(2);?>">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>
                <div class="input-field col s6">
                    <button class="btn waves-effect waves-light" type="submit" name="update11" id="update11">Update
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>

            <?php


            echo "            </div>\n";
            echo "          </div>\n";
            echo "        </div>\n";
            echo "        </div>\n";
            echo "      </div>\n";
            echo "        </div>\n";
            ?>

            <?php
//            echo "            </div>\n";
//            echo "          </div>\n";
//            echo "        </div>\n";
//            echo "      </div>";
        }
    }

    else {
        echo "<h5 class='center-align'>Please use the dropdown below to choose a field to edit.</h5>\n";
        echo "</div>\n";
    }
    ?>






    <?php
    //echo "        </ul>\n";
    //echo "    </div>";
    //echo "</div>\n";
    //echo "</div>\n";
    //echo "</div>\n";
    echo "      <div class=\"row\">\n";
    echo "      <div class=\"row\">\n";
    echo "        <div class=\"col s12 l8 push-l2\">\n";
    echo "          <div class=\"card grey darken-4 white-text\">\n";
    echo "            <div class=\"card-content\">\n";
    echo "              <span class=\"card-title\">Update Another Field</span>\n";
    echo "              <p></p>\n";
    echo "            </div>\n";
    echo "            <div class=\"card-action\">\n";

    echo "<div class=\"row\">\n";
    echo "<form class=\"input-field\">\n";
    echo "<div class=\"input-field col s12\">\n";
    echo "<select class=\"\" id=\"dynamic_select\">\n";
    echo "   <option value=\"\" disabled selected>Choose a field to update</option>";
    echo "   <option value=\"update-location5.php?id=$i&edit=name\">Update Name</option>\n";
    echo "   <option value=\"update-location5.php?id=$i&edit=hours\">Update Hours</option>\n";
    echo "   <option value=\"update-location5.php?id=$i&edit=description\">Update Description</option>\n";
    echo "   <option value=\"update-location5.php?id=$i&edit=cover_photo\">Update Cover Photo</option>\n";
    echo "   <option value=\"update-location5.php?id=$i&edit=card_1\">Update Profile Card 1</option>\n";
    echo "   <option value=\"update-location5.php?id=$i&edit=card_2\">Update Profile Card 2</option>\n";
    echo "   <option value=\"update-location5.php?id=$i&edit=card_3\">Update Profile Card 3</option>\n";
    echo "   <option value=\"update-location5.php?id=$i&edit=menu\">Update Menu</option>";
    echo "</select>\n";
    echo " <label>Choose a field to update:</label>\n";
    echo "</form>\n";
    echo "</div>\n";

    echo "<script>\n";
    echo "    $(function(){ \n";
    echo "      $('#dynamic_select').on('change', function () {\n";
    echo "          var url = $(this).val(); \n";
    echo "          if (url) { // require a URL\n";
    echo "              window.location = url; \n";
    echo "          }\n";
    echo "          return false;\n";
    echo "      });\n";
    echo "    });\n";
    echo "</script>\n";

    echo "</div>\n";

    echo "            </div>\n";
    echo "          </div>\n";
    echo "        </div>\n";
    echo "        </div>\n";
    echo "      </div>";
}
//close container
echo "</div>";
echo "</div>";

include 'footer.php';

?>

<script>
    $('input.timepicker').timepicker({
        step: 15 // 15 minutes
    });
    $(document).ready(function() {
        $('select').material_select();
        $(".card").addClass('z-depth-1-half');
        //$('li').addClass('active');
        //$('.collapsible-header').addClass('active');
    });
</script>

<!--<script src="js/materialize.js"></script>-->
<!--<script src="js/init.js"></script>-->

</body>
</html>