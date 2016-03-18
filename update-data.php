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
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
//ini_set('html_errors', 'On');

include 'header.php';

echo "<div class=\"container\">\n";

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
echo "<div class=\"input-field col s12\">";

if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

else {
        echo "Choose a location to update: <select class=\"icons\" id=\"dynamic_select\">";
            for($i=1; $i <= $max; $i++){
                echo "<option value=\"update-location.php?id=" . $i . "\" data-icon=\"" . $objArray[$i-1]->getImage(0) . "\" class=\"left circle\">$i. " .
                $objArray[$i-1]->getName() .
                    "</option>";
            }
        echo "</select>";
        echo " <label>Choose a location to update:</label>";

        echo "<script>\n";
        echo "    $(function(){ ";
        echo "      $('#dynamic_select').on('change', function () {\n";
        echo "          var url = $(this).val(); \n";
        echo "          if (url) { // require a URL\n";
        echo "              window.location = url; \n";
        echo "          }\n";
        echo "          return false;\n";
        echo "      });\n";
        echo "    });\n";
        echo "</script>";
}

echo "</div>";
echo "</div>";
echo "</div>";

include 'footer.php';

?>

</body>
</html>
