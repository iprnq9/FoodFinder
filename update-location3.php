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
    echo "<h4 class=\"heading center-align\"><i class=\"material-icons small\">add_location</i>Update Location:&nbsp;" . $objArray[$id-1]->getName() . "</h4>";
    echo " <div class=\"row\">\n";
    echo "        <ul class=\"collapsible popout\" data-collapsible=\"expandable\">\n";
    echo "            <li>\n";
    echo "                <div class=\"collapsible-header green active\">\n";
    echo "                    <i class=\"material-icons\">store</i>Update Name\n";
    echo "                </div>\n";
    echo "                <div class=\"collapsible-body grey darken-4 green-text\">\n";
    echo "                   <div class=\"row\"  style=\"padding: 10px;\">\n";

    if(isset($_POST['update1'])) {

        $location_name = $_POST['location_name'];

        $sql = "UPDATE location_id SET location_name=\"$location_name\" WHERE id=$id";
        $result = mysqli_query($con, $sql);

        if (!$result)
        {
            echo ('<i class="material-icons small">error_outline</i>Error: Could not update name.');
        }

        else
        {
            echo "<p><i class=\"material-icons small\">done</i>Name updated successfully!</p>";
        }
    }

    else
    { ?>

                          <form class="col s12" method="post" action="<?php $_PHP_SELF ?>">
                            <div class="row" style="padding: 10px;">
                              <div class="input-field col s6">
                                <input id="location_name" name="location_name" type="text" length="45">
                                <label for="location_name">New Name</label>
                              </div>
                            </div>
                            <div class="input-field col s6">
                                <button class="btn waves-effect waves-light" type="submit" name="update1" id="update1">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                          </form>

<?php
    }
echo "</div>\n";
echo "                </div>\n";
echo "            </li>\n";
echo "        </ul>\n";
echo "    </div>";
}
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