<!DOCTYPE html>
<html>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

<body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('html_errors', 'On');

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
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

else {

    if(isset($_POST['update1'])) {

        $location_name = $_POST['location_name'];

        $sql = "UPDATE location_id SET location_name=\"$location_name\" WHERE id=$id";
        $result = mysqli_query($con, $sql);

        if (!$result)
        {
            echo ('Error: Could not update name.');
        }

        else
        {
            echo "Name updated successfully!";
        }
    }

    else
    {
        ?>
        <h1>Update existing location:&nbsp;<?php echo $objArray[$id-1]->getName(); ?></h1>
        <h4>Update Name</h4>
        <form method = "post" action = "<?php $_PHP_SELF ?>">
            <table width = "400" border =" 0" cellspacing = "1"
                   cellpadding = "2">

                <tr>
                    <td width = "100">New Name</td>
                    <td><input name = "location_name" type = "text"
                               id = "location_name"></td>
                </tr>

                <tr>
                    <td width = "100"> </td>
                    <td> </td>
                </tr>

                <tr>
                    <td width = "100"> </td>
                    <td>
                        <input name = "update1" type = "submit"
                               id = "update1" value = "Update Name">
                    </td>
                </tr>

            </table>
        </form>
        <?php
    }

    ?>


    <?php

    if(isset($_POST['update2'])) {

        $location_description = $_POST['location_description'];

        $sql = "UPDATE descriptions SET description=\"" . $location_description . "\" WHERE id=" . $id;
        $result = mysqli_query($con, $sql);

        if (!$result)
        {
            echo ('Error: Could not update description.');
        }

        else
        {
            echo "Description updated successfully!";
        }

    }

    else
    {
        ?>
        <hr />
        <h4>Update Description</h4>
        <form method = "post" action = "<?php $_PHP_SELF ?>">
            <table width = "600" border =" 0" cellspacing = "1"
                   cellpadding = "2">

                <tr>
                    <td width = "100">New Description</td>
                    <td><input style="width: 300px;" name = "location_description" type = "text"
                               id = "location_description" placeholder="<?php echo $objArray[$id-1]->getDescription();
                        ?>"></td>
                </tr>

                <tr>
                    <td width = "100"> </td>
                    <td> </td>
                </tr>

                <tr>
                    <td width = "100"> </td>
                    <td>
                        <input name = "update2" type = "submit"
                               id = "update2" value = "Update Description">
                    </td>
                </tr>

            </table>
        </form>
        <?php
    }

    if(isset($_POST['update3'])) {

        $card1_heading = $_POST['card1_heading'];

        $sql = "UPDATE descriptions SET head1=\"$card1_heading\" WHERE id=$id";
        $result = mysqli_query($con, $sql);

        if (!$result)
        {
            echo ('Error: Could not update Card 1 Heading.');
        }

        else
        {
            echo "Card 1 Heading updated successfully!";
        }
    }

    else
    {
        ?>
        <h4>Update Card 1 Heading</h4>
        <form method = "post" action = "<?php $_PHP_SELF ?>">
            <table width = "400" border =" 0" cellspacing = "1"
                   cellpadding = "2">

                <tr>
                    <td width = "100">New Card 1 Heading</td>
                    <td><input name = "card1_heading" type = "text"
                               id = "card1_heading" placeholder="<?php echo $objArray[$id-1]->getHeading(0); ?>"></td>
                </tr>

                <tr>
                    <td width = "100"> </td>
                    <td> </td>
                </tr>

                <tr>
                    <td width = "100"> </td>
                    <td>
                        <input name = "update3" type = "submit"
                               id = "update3" value = "Update Card 1 Heading">
                    </td>
                </tr>

            </table>
        </form>
        <?php
    } ?>
    <?php
    if(isset($_POST['update4'])) {

        $card1_paragraph = $_POST['card1_paragraph'];

        $sql = "UPDATE descriptions SET par1=\"$card1_paragraph\" WHERE id=$id";
        $result = mysqli_query($con, $sql);

        if (!$result)
        {
        echo ('Error: Could not update Card 1 Paragraph.');
        }

        else
        {
        echo "Card 1 Paragraph updated successfully!";
        }
    }

    else
    {
    ?>

        <h4>Update Card 1 Paragraph</h4>
        <form method = "post" action = "<?php $_PHP_SELF ?>">
            <table width = "400" border =" 0" cellspacing = "1"
                   cellpadding = "2">

                <tr>
                    <td width = "100">New Card 1 Paragraph</td>
                    <td><input style="width: 200px; height: 200px;" name = "card1_paragraph" type = "text"
                               id = "card1_paragraph" placeholder="<?php echo $objArray[$id-1]->getParagraph(0);
                        ?>"></td>
                </tr>

                <tr>
                    <td width = "100"> </td>
                    <td> </td>
                </tr>

                <tr>
                    <td width = "100"> </td>
                    <td>
                        <input name = "update4" type = "submit"
                               id = "update4" value = "Update Card 1 Paragraph">
                    </td>
                </tr>

            </table>
        </form>
        <?php
    } ?>

    <?php

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["card1_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["update5"])) {
        $check = getimagesize($_FILES["card1_image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        }

        else {
            echo "File is not an image.";
            $uploadOk = 0;
        }


        // Check file size
        if ($_FILES["card1_image"]["size"] > 500000) {
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
            if (move_uploaded_file($_FILES["card1_image"]["tmp_name"], $target_file)) {
                $filename = basename($_FILES["card1_image"]["name"]);
                $sql = "UPDATE descriptions SET img1=\"" . $filename . "\" WHERE id=" . $id;
                $result = mysqli_query($con, $sql);

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

    //if post hasn't been activated, display form
    else { ?>
        <form action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="card1_image" id="card1_image">
            <input type="submit" id="update5" name="update5">
        </form>
    <?php
    }

    ?>


<?php
}
?>

</body>
</html>
