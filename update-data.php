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
        echo "Choose a location to update: <select id=\"dynamic_select\">";
            for($i=1; $i <= $max; $i++){
                echo "<option value=\"update-location.php?id=" . $i . "\">$i. " . $objArray[$i-1]->getName() .
                    "</option>";
            }
        echo "</select>";

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

?>

</body>
</html>
