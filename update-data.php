<!--Thanks to Russell Bell for his help-->
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
<meta name="theme-color" content="#66BB6A" />

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
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
//ini_set('html_errors', 'On');

include 'header.php';

echo "<div class=\"container\">\n";
echo "<h4 class=\"heading center-align\"><i class=\"material-icons small\">assignment_ind</i>&nbsp;Update a Location</h4>";

include 'food-finderprj2.php';

include 'db-connect.php';

//get location id from URL variable
$id = htmlspecialchars($_GET["id"]);

// Create connection
$con = new mysqli($host, $user, $password, $dbname);

$objArray = array();

include 'pullData2.php';

$max = sizeof($objArray);

echo "<div class=\"row\">\n";



if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

else {
        echo "  <div class=\"col s12 m8 push-m2\">\n";
        echo "   <div class=\"card-panel grey darken-4 white-text\">\n";
        echo "<div class=\"row\">\n";
        echo "<form class=\"input-field\">\n";
        echo "<div class=\"input-field col s12 m12 l12\">\n";
        echo "<select class=\"icons\" id=\"dynamic_select\">\n";
        echo "   <option value=\"\" disabled selected>Choose a location to update</option>";
            for($i=1; $i <= $max; $i++){
                echo "<option value=\"update-location5.php?id=" . $i . "\" data-icon=\"images/$i/" . $objArray[$i-1]->getCoverPhoto() . "\" class=\"left circle\">$i. " .
                $objArray[$i-1]->getName() .
                    "</option>\n";
            }
        echo "</select>\n";
        echo " <label>Choose a location to update:</label>\n";
        echo "</form>\n";

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
        echo "</div>\n";
        echo "</div>\n";
}

echo "</div>\n";
echo "</div>\n";
echo "</div>\n";

include 'footer.php';

?>

<script>
    $(document).ready(function() {
        $('select').material_select();
    });
</script>

</body>
</html>
