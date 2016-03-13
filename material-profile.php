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
  include 'header.php';
?>

<main>
  <div class="container">
    <div class="section">
      <div class="row" style="text-align: center;">
        <div class="profile-image imageClass-1"></div>
        <div class="profile-name green z-depth-2">Einstein Bros Bagels</div>
        <ul class="flex-container">
          <li class="flex-item-wide z-depth-2">
            <div class="quick-info green">
              <div class="card-status open">OPEN</div>
              <div class="card-content">
                <h4 class="center-align" style="margin-top: -5px;">Hours of Operation</h4>
                <h6 class="center-align week-of"></h6>
                <?php include 'hours-einsteins.php' ?>
              </div>
            </div>
          </li>

          <li class="flex-item">
            <div class="quick-info green z-depth-2">
              <div class="card-image einsteins1"></div>
              <div class="quick-info-text">
                <h3>Our Mission</h3>
                Einstein Bros. Bagels is your neighborhood bagel shop. We’re proud to provide our guests with freshly baked bagels, breakfast sandwiches, lunch sandwiches, coffee, catering and so much more. Stop on in. We’ll have a fresh bagel and cup of coffee ready for you.
              </div>
            </div>
          </li>

          <li class="flex-item">
            <div class="quick-info green z-depth-2">
              <div class="card-image einsteins3"></div>
              <div class="quick-info-text">
                <h3>Darn Good Coffee</h3>
                We serve up your soon-to-be favorite drinks. Whether they be hot, cold, or iced, a cup of happiness awaits your hectic workday, relaxing day at home, or fun day out with friends.
              </div>
            </div>
          </li>

          <li class="flex-item">
            <div class="quick-info green z-depth-2">
              <div class="card-image einsteins2"></div>
              <div class="quick-info-text">
                <h3>More Than A Snack</h3>
                 In addition to serving up delicious bagels and coffee, we cook gourmet breakfast and lunch sandwiches. High-five your tastebuds!
              </div>
            </div>
          </li>

          <li class="flex-item">
            <div class="quick-info green z-depth-2">
              <div class="card-image einsteins1"></div>
              <div class="quick-info-text">
                <h3>Download Menu</h3>
                <a href="images/einstieins-menu.pdf" target="_blank"><img src="images/foodMenu.png" class="menu-download" alt="Download image"/></a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</main>

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
