<!--Thanks to Russell Bell for his help-->
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

<title>Manage | FoodFinder</title>

<!-- CSS  -->
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="custom.css" rel="stylesheet">
<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<script type="text/javascript" src="js/moment.js"></script>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700,500' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oswald:700,300,400' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

<body>
<?php

include 'header.php';

echo "<div class=\"container\">\n";
echo "    <div class=\"row\">\n";
echo "        <div class=\"col s12 m6 l6\" style=\"height: 100%\">\n";
echo "            <div class=\"card green lighten-1\" style=\"height: 100%\">\n";
echo "                <div class=\"card-content\">\n";
echo "                    <span class=\"card-title\">Update a location's information</span>\n";
echo "                    <p>Click the link below if you want to update the hours of location, a location's text, location, description, or other information found on the site.<br><br></p>\n";
echo "                    <p style=\"text-align: center;\"><img src=\"images/update.png\" width=\"50%\"></p>\n";
echo "                </div>\n";
echo "                <div class=\"card-action white-text center-align\">\n";
echo "                    <a href=\"update-location.php\" class=\"white-text\">Update Information</a>\n";
echo "                </div>\n";
echo "            </div>\n";
echo "        </div>\n";
echo "        <div class=\"col s12 m6 l6\">\n";
echo "            <div class=\"card green lighten-1\" style=\"height: 100%\">\n";
echo "                <div class=\"card-content\">\n";
echo "                    <span class=\"card-title\">Add a new location</span>\n";
echo "                    <p>Click the link below if you want to add a new location to the list of S&T Dining options. You'll be prompted to input all of the following: weekly hours, location, short description, four cover photos, three paragraphs of text, and a downloadable menu.</p>\n";
echo "                    <p style=\"text-align: center;\"><img src=\"images/add.png\" width=\"50%\"></p>\n";
echo "                </div>\n";
echo "                <div class=\"card-action white-text center-align\">\n";
echo "                    <a href=\"add-location.php\" class=\"white-text\">Add location</a>\n";
echo "                </div>\n";
echo "            </div>\n";
echo "        </div>\n";
echo "    </div>\n";
echo "</div>\n";


include 'footer.php';
?>
</body>
</html>
