<!DOCTYPE html>
<html>
<body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('html_errors', 'On');

if(isset($_POST['update'])) {
    include 'db-connect.php';

    $id = $_POST['id'];
    $location_name = $_POST['location_name'];

    // Create connection
    $conn = new mysqli($host, $user, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "UPDATE location_id SET location_name=\"$location_name\" WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (!$result)
    {
        echo ('Error: Could not update data.');
    }

    else
    {
        echo "Name updated successfully!";
    }

    mysqli_close($conn);
}

else
{
    ?>
    <h1>Update name of location:</h1>
    <form method = "post" action = "<?php $_PHP_SELF ?>">
        <table width = "400" border =" 0" cellspacing = "1"
               cellpadding = "2">

            <tr>
                <td width = "100">Location ID</td>
                <td><input name = "location_id" type = "text"
                           id = "location_id"></td>
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
                    <input name = "update" type = "submit"
                           id = "update" value = "Update">
                </td>
            </tr>

        </table>
    </form>
    <?php
}

?>


<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('html_errors', 'On');

if(isset($_POST['update'])) {
    include 'db-connect.php';

    //$id = $_POST['id'];
    $location_name = $_POST['location_name'];

    // Create connection
    $conn = new mysqli($host, $user, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO location_id (location_name) VALUES (\"$location_name\")";
    $result = mysqli_query($conn, $sql);

    if (!$result)
    {
        echo ('Error: Could not update data.');
    }

    else
    {
        echo "Added successfully!";
    }

    mysqli_close($conn);
}

else
{
    ?>
    <h1>Add new location:</h1>
    <form method = "post" action = "<?php $_PHP_SELF ?>">
        <table width = "400" border =" 0" cellspacing = "1"
               cellpadding = "2">

<!--            <tr>-->
<!--                <td width = "100">Location ID</td>-->
<!--                <td><input name = "id" type = "text"-->
<!--                           id = "id"></td>-->
<!--            </tr>-->

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
                    <input name = "update" type = "submit"
                           id = "update" value = "Add Location">
                </td>
            </tr>

        </table>
    </form>
    <?php
}

?>

</body>
</html>
