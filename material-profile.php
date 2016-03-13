<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Profile | FoodFinder</title>

  <!-- CSS  -->
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script type="text/javascript" src="js/moment.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Oswald:700,300,400' rel='stylesheet' type='text/css'>
</head>
<body style="background-color: #eeeeee;">

<?php

include 'food-finderprj2.php';

include 'db-connect.php';

//get location id from URL variable
$locationId = htmlspecialchars($_GET["id"]);
$k = $locationId;
$imageClass = "imageClass-" . $locationId;

$con = new mysqli($host, $user, $password, $dbname);

$objArray = array();

$dayArray = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

$dayNumber = date("w")+1;
  include 'header.php';
?>



  <?php include 'footer.php' ?>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script>
    $(document).ready(function(){
      var n = moment().startOf('week').add(1, 'days').format("MMMM Do");
      $(".week-of").append("Week of " + n);

    });
  </script>

  <script>
    $(document).ready(function(){

      var dateVar = new Date();
      var n = dateVar.getDay();

      $('tr.day-1').addClass('current-day');

    });
  </script>


  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
