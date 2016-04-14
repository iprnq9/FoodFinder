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

    echo "<h4 class=\"heading center-align\"><i class=\"material-icons small\">add_location</i>Update Location:<br>" . $objArray[$id-1]->getName() . "</h4>";
    echo " <div class=\"row\">\n";
    echo "<div class=\"card\">\n";

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
        <form class="col s12" method="post" action="<?php $_PHP_SELF ?>" target="_blank">
            <div class="row" style="padding: 10px;">
                <div class="input-field col s6">
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
    }
    //echo "                   </div>\n";
    echo "                </div>\n";
    ?>


    <?php
    //echo "        </ul>\n";
    echo "    </div>";
}
//close container
echo "</div>";

include 'footer.php';

?>

<script src="js/materialize.js"></script>
<script src="js/init.js"></script>

</body>
</html>