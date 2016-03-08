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
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
<body>
<?php

include 'header.php'; ?>



<div class="container">
    <h4 class="heading center-align"><i class="material-icons small">settings</i>Manage</h4>

    <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
        <div class="col s12 center-align">
            <a class="btn-large tooltipped" href="update-location.php" style="vertical-align: ;" data-position="bottom" data-delay="50" data-tooltip="Update the hours of location, a location's text, location, description, or other information found on the site."><i class="material-icons left">create</i>Update a Location's Information</a>
        </div>
    </div>

    <div class="row" style="margin-top: 70px; margin-bottom: 10px;">
        <div class="col s12 center-align">
            <a class="btn-large tooltipped" href="add-location.php" style="vertical-align: ;" data-position="bottom" data-delay="50" data-tooltip="Add a new location to the list of S&T Dining options. You'll be prompted to input all of the following: weekly hours, location, short description, four cover photos, three paragraphs of text, and a downloadable menu."><i class="material-icons left">add_location</i>Add a New Location</a>
        </div>
    </div>

    <div class="row" style="margin-top: 70px; margin-bottom: 80px;">
        <div class="col s12 center-align">
            <a class="btn-large tooltipped" href="add-fundraiser.php" style="vertical-align: ;" data-position="bottom" data-delay="50" data-tooltip="Submit a request to for FoodFinder to display your organization's food fundraiser. Be aware that confirmation of the fundraiser's credibility may take up to one week."><i class="material-icons left">local_atm</i>Add Your Organization's Food Fundraiser</a>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>

<script>
    $("li.manage").addClass("active");
</script>

</body>
</html>
