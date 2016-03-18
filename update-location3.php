<!--Thanks to Russell Bell for his help-->
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

<title>Update Location | FoodFinder</title>

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

<style>
    .row {
        margin-bottom: 0px;
    }
</style>

<body>
<?php

include 'header.php';

echo "<div class=\"container\">\n";

//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
//ini_set('html_errors', 'On');

include 'food-finderprj2.php';

include 'db-connect.php';

//get location id from URL variable
$id = htmlspecialchars($_GET["id"]);

// Create connection
$con = new mysqli($host, $user, $password, $dbname);

$objArray = array();

include 'pullData2.php';

$max = sizeof($objArray);

if ($con->connect_errno) {
    echo "<i class=\"material-icons small\">error_outline</i>Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

else {
    echo "<h4 class=\"heading center-align\"><i class=\"material-icons small\">add_location</i>Update Location:<br>" . $objArray[$id-1]->getName() . "</h4>";
    echo " <div class=\"row\">\n";
    echo "        <ul class=\"collapsible popout\" data-collapsible=\"expandable\">\n";
    echo "            <li>\n";
    echo "                <div class=\"collapsible-header green active\">\n";
    echo "                    <i class=\"material-icons\">info</i>Update Name\n";
    echo "                </div>\n";
    echo "                <div class=\"collapsible-body grey darken-4 green-text\">\n";
    echo "                   <div class=\"row\"  style=\"padding: 10px;\">\n";

    if(isset($_POST['update1'])) {

        $location_name = $_POST['location_name'];

        $sql = "UPDATE location_id SET location_name=\"$location_name\" WHERE id=$id";
        $result = mysqli_query($con, $sql);

        if (!$result)
        {
            echo "<div class=\"valign-wrapper\"><i class=\"material-icons small valign\">error_outline</i>&nbsp;Error: Could not update name.</div>";
        }

        else
        {
            echo "<div class=\"valign-wrapper\"><i class=\"material-icons small valign\">done</i>&nbsp;Name updated successfully!</div>";
        }
    }

    else
    { ?>
                          <form class="col s12" method="post" action="<?php $_PHP_SELF ?>">
                            <div class="row" style="padding: 10px;">
                              <div class="input-field col s6">
                                  <i class="material-icons prefix">label_outline</i>
                                  <input id="location_name" name="location_name" type="text" length="45" placeholder="Currently: <?php echo $objArray[$id-1]->getName(); ?>">
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
    }
    echo "                   </div>\n";
    echo "                </div>\n";
    echo "            </li>\n";
?>

    <?php
    echo "            <li>\n";
    echo "                <div class=\"collapsible-header green active\">\n";
    echo "                    <i class=\"material-icons\">assignment_ind</i>Update Description\n";
    echo "                </div>\n";
    echo "                <div class=\"collapsible-body grey darken-4 green-text\">\n";
    echo "                   <div class=\"row\"  style=\"padding: 10px;\">\n";

    if(isset($_POST['update2'])) {

        $location_description = $_POST['location_description'];

        $sql = "UPDATE descriptions SET description=\"" . $location_description . "\" WHERE id=" . $id;
        $result = mysqli_query($con, $sql);

        if (!$result)
        {
            echo "<div class=\"valign-wrapper\"><i class=\"material-icons small valign\">error_outline</i>&nbsp;Error: Could not update description.</div>";
        }

        else
        {
            echo "<div class=\"valign-wrapper\"><i class=\"material-icons small valign\">done</i>&nbsp;Description updated successfully!</div>";
        }
    }

    else
    { ?>
        <form class="col s12" method="post" action="<?php $_PHP_SELF ?>">
            <div class="row" style="padding: 10px;">
                <div class="input-field col s6">
                    <i class="material-icons prefix">label_outline</i>
                    <input id="location_description" name="location_description" type="text" length="45" placeholder="Currently: <?php echo $objArray[$id-1]->getDescription();
                    ?>">
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
    }
    echo "                   </div>\n";
    echo "                </div>\n";
    echo "            </li>\n";
    ?>

    <?php
    echo "            <li>\n";
    echo "                <div class=\"collapsible-header black-text green active\">\n";
    echo "                    <i class=\"material-icons\">view_quilt</i>Update Profile Card 1\n";
    echo "                </div>\n";
    echo "                <div class=\"collapsible-body white darken-4 green-text\" style=\"padding: 10px;\">\n";
    echo "        <ul class=\"collapsible popout\" data-collapsible=\"expandable\">\n";
    echo "            <li>\n";
    echo "                <div class=\"collapsible-header green black-text active\">\n";
    echo "                    <i class=\"material-icons\">title</i>Update Card 1 Heading\n";
    echo "                </div>\n";
    echo "                <div class=\"collapsible-body grey darken-4 green-text\">\n";
    echo "                   <div class=\"row\"  style=\"padding: 10px;\">\n";

    if(isset($_POST['update3'])) {

        $card1_heading = $_POST['card1_heading'];

        $sql = "UPDATE descriptions SET head1=\"" . $card1_heading . "\" WHERE id=" . $id;
        $result = mysqli_query($con, $sql);

        if (!$result)
        {
            echo "<div class=\"valign-wrapper\"><i class=\"material-icons small valign\">error_outline</i>&nbsp;Error: Could not update Card 1 Heading.</div>";
        }

        else
        {
            echo "<div class=\"valign-wrapper\"><i class=\"material-icons small valign\">done</i>&nbsp;Card 1 Heading updated successfully!</div>";
        }
    }

    else
    { ?>
        <form class="col s12" method="post" action="<?php $_PHP_SELF ?>">
            <div class="row" style="padding: 10px;">
                <div class="input-field col s6">
                    <i class="material-icons prefix">label_outline</i>
                    <input id="card1_heading" name="card1_heading" type="text" length="45" placeholder="Currently: <?php echo $objArray[$id-1]->getHeading(0);
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
    }
    echo "</div></div></li>";

    echo "            <li>\n";
    echo "                <div class=\"collapsible-header green black-text active\">\n";
    echo "                    <i class=\"material-icons\">subject</i>Update Card 1 Paragraph\n";
    echo "                </div>\n";
    echo "                <div class=\"collapsible-body grey darken-4 green-text\">\n";
    echo "                   <div class=\"row\"  style=\"padding: 10px;\">\n";

    if(isset($_POST['update4'])) {

        $card1_paragraph = $_POST['card1_paragraph'];

        $sql = "UPDATE descriptions SET par1=\"" . $card1_paragraph . "\" WHERE id=" . $id;
        $result = mysqli_query($con, $sql);

        if (!$result)
        {
            echo "<div class=\"valign-wrapper\"><i class=\"material-icons small valign\">error_outline</i>&nbsp;Error: Could not update Card 1 Paragraph.</div>";
        }

        else
        {
            echo "<div class=\"valign-wrapper\"><i class=\"material-icons small valign\">done</i>&nbsp;Card 1 Paragraph updated successfully!</div>";
        }
    }

    else
    { ?>
        <form class="col s12" method="post" action="<?php $_PHP_SELF ?>">
            <div class="row" style="padding: 10px;">
                <div class="input-field col s6">
                    <i class="material-icons prefix">label_outline</i>
                    <textarea class="materialize-textarea" id="card1_paragraph" name="card1_paragraph" type="text" length="300" placeholder="Currently: <?php echo
                    $objArray[$id-1]->getParagraph(0);  ?>"></textarea>
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
    }
    echo "</div></div></li>";

    echo "            <li>\n";
    echo "                <div class=\"collapsible-header green black-text active\">\n";
    echo "                    <i class=\"material-icons\">insert_photo</i>Update Card 1 Image\n";
    echo "                </div>\n";
    echo "                <div class=\"collapsible-body grey darken-4 green-text\">\n";
    echo "                   <div class=\"row\"  style=\"padding: 10px;\">\n";

    $target_dir = "images/" . $id . "/";
    $target_file = $target_dir . basename($_FILES["card1_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST['update5'])) {
        $check = getimagesize($_FILES["card1_image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        }

        else {
            echo "File is not an image.";
            $uploadOk = 0;
        }


        // Check file size
        if ($_FILES["card1_image"]["size"] > 1000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG/JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";

        }

        // if everything is ok, try to upload file
        else {
            $filename = basename($_FILES["card1_image"]["name"]);
            if (move_uploaded_file($_FILES["card1_image"]["tmp_name"], $target_file)) {
                $sql = "UPDATE descriptions SET img1=\"" . $filename . "\" WHERE id=" . $id;
                $result = mysqli_query($con, $sql);
                //echo $sql;
                //echo $filename;

                if (!$result)
                {
                    echo ('Error: Could not update Card 1 Image.');
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
    { ?>
        <form class="col s12" method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
            <div class="row" style="padding: 10px;">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Choose File</span>
                        <input type="file" name="card1_image" id="card1_image" placeholder="<?php $objArray[$id-1]->getImage(0);?>">
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
    }
    echo "</div></div></li>";


    ?>

<?php
    echo "                   </ul>\n";
    //echo "                </div>\n";
    echo "            </li>\n";
    ?>

<?php
    echo "        </ul>\n";
    echo "    </div>";
}
//close container
echo "</div>";
include 'footer.php';

?>
<script>
    $(document).ready(function() {
        $('select').material_select();
    });
</script>


</body>
</html>