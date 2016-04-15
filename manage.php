<!--Thanks to Russell Bell for his help-->
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
<meta name="theme-color" content="#66BB6A" />

<title>Manage | FoodFinder</title>

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
echo "<h4 class=\"heading center-align\"><i class=\"material-icons small\">settings</i>&nbsp;Manage</h4>";

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

    echo "      <div class=\"row\">\n";
    echo "        <div class=\"col s12 m8 push-m2\">\n";
    echo "          <div class=\"card white\">\n";
    echo "            <div class=\"card-content\">\n";
    echo "              <span class=\"card-title\">Update Existing Dining Location</span>\n";
    echo "              <p>Update the hours of location, a location's text, location, description, images, and other information found on the site.</p>\n";
    echo "            </div>\n";
    echo "            <div class=\"card-action\">\n";

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
    echo " </div>\n";
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

    echo "            </div>\n";
    echo "          </div>\n";
    echo "        </div>\n";
    echo "      </div>";

    //-----------------------------------------------------------------

    echo "      <div class=\"row\">\n";
    echo "        <div class=\"col s12 m8 push-m2\">\n";
    echo "          <div class=\"card white\">\n";
    echo "            <div class=\"card-content\">\n";
    echo "              <span class=\"card-title\">Add New Dining Location</span>\n";
    echo "              <p>Add a new location to the list of S&T Dining options. You'll be prompted to input all of the following: weekly hours, location, short description, four cover photos, three paragraphs of text, and a downloadable menu.</p>\n";
    echo "            </div>\n";
    echo "            <div class=\"card-action\">\n";
    echo "              <a href=\"add-location4.php\">Add Location</a>\n";
    echo "            </div>\n";
    echo "          </div>\n";
    echo "        </div>\n";
    echo "      </div>";

    //-----------------------------------------------------------------

    echo "      <div class=\"row\">\n";
    echo "        <div class=\"col s12 m8 push-m2\">\n";
    echo "          <div class=\"card white\">\n";
    echo "            <div class=\"card-content\">\n";
    echo "              <span class=\"card-title\">Submit Your Food Fundraiser</span>\n";
    echo "              <p>Submit a request to for FoodFinder to display your organization's food fundraiser. Be aware that confirmation of the fundraiser's credibility may take up to one week.</p>\n";
    echo "            </div>\n";
    echo "            <div class=\"card-action\">\n";
    echo "              <a href=\"add-food-fundraiser.php\">Submit Request</a>\n";
    echo "            </div>\n";
    echo "          </div>\n";
    echo "        </div>\n";
    echo "      </div>";

}

echo "</div>\n";//row
echo "</div>\n";//container

include 'footer.php';

?>

<script>
    $(document).ready(function() {
        $('select').material_select();
        $(".card").addClass('z-depth-1-half');
        $("li.manage").addClass("active");
    });
</script>

</body>
</html>
