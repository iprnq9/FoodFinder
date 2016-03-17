<!DOCTYPE html>
<html>
<body>

<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
//ini_set('html_errors', 'On');

include 'food-finderprj2.php';

include 'db-connect.php';

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

        $id = $_POST['id'];
        $location_name = $_POST['location_name'];

        $sql = "UPDATE location_id SET location_name=\"$location_name\" WHERE id=$id";
        $result = mysqli_query($con, $sql);

        if (!$result)
        {
            echo ('Error: Could not update data.');
        }

        else
        {
            echo "Name updated successfully!";
        }
    }

    else
    {
        ?>
        <h1>Update existing location:</h1>
        <form method = "post" action = "<?php $_PHP_SELF ?>">
            <table width = "400" border =" 0" cellspacing = "1"
                   cellpadding = "2">

                <tr>
                    <td width = "100">Choose a location</td>
                    <td>
                        <select name="id" id="id">
                            <?php
                                for($i=1; $i <= $max; $i++){
                                    echo "<option value=\"" . $i . "\">" . $objArray[$k]->getName() . "</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>

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
                               id = "update1" value = "Update">
                    </td>
                </tr>

            </table>
        </form>
        <?php
    }

    ?>


    <?php

    if(isset($_POST['update2'])) {

        //$id = $_POST['id'];
        $location_name = $_POST['location_name'];

        $sql = "INSERT INTO location_id (location_name) VALUES (\"$location_name\")";
        $result = mysqli_query($con, $sql);

        if (!$result)
        {
            echo ('Error: Could not update data.');
        }

        else
        {
            echo "Added successfully!";
        }

    }

    else
    {
        ?>
        <h1>Add new location:</h1>
        <form method = "post" action = "<?php $_PHP_SELF ?>">
            <table width = "400" border =" 0" cellspacing = "1"
                   cellpadding = "2">

                <tr>
                    <td width = "100">Name</td>
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
                        <input name = "update2" type = "submit"
                               id = "update2" value = "Add Location">
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
