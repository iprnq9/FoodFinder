<!DOCTYPE html>
<html>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

<body>

<?php
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

        $sql = "UPDATE descriptions SET description=\"$location_description\" WHERE id=$id";
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
}
?>

</body>
</html>
