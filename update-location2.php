<!--Thanks to Russell Bell for his help-->
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

<title>Update Location| FoodFinder</title>

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
    <h4 class="heading center-align"><i class="material-icons small">add_location</i>Add New Location</h4>
<div class="row">
    <ul class="collapsible popout" data-collapsible="expandable">
        <li>
            <form class="col s12 m12 l10 push-l1" method="post" action = "<?php $_PHP_SELF ?>">
                <div class="collapsible-header green active"><i class="material-icons">store</i>Update Name</div>
                <div class="collapsible-body grey darken-4 green-text">
                    <div class="row" style="padding: 10px;">
                        <div class="input-field col s12 m12">
                            <i class="material-icons prefix">info_outline</i>
                            <input placeholder='<?php $objArray[$id-1]->getName(); ?>' id="location_name" type="text"
                            length="45"
                            class="validate">
                            <label for="location_name">Updated Name</label>
                        </div>
                    </div>
                </div>
                <button class="btn-large waves-effect waves-light green lighten-1" type="submit" name="update1"
                        id="update1">Update Name
                    <i class="material-icons right">send</i>
                </button>
            </form>

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
        </li>
    </ul>
</div>

<?php
}

?>
</div>
<?php

include 'footer.php';

?>
<script>
    $(document).ready(function() {
        $('select').material_select();
    });
</script>


</body>
</html>
