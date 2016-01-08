<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Profile 2</title>

  <!-- CSS  -->
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script type="text/javascript" src="js/date.js"></script>
</head>
<body style="background-color: #eeeeee;">

<?php include 'header.php' ?>

<main>
  <div class="container">
    <div class="section">
      <div class="row" style="text-align: center;">
        <div class="profile-image einsteins"></div>
        <div class="profile-name green z-depth-2">Einstein Bros Bagels</div>
        <ul class="flex-container">
          <li class="flex-item-wide">
            <div class="quick-info open">
              <div class="card-content">
                <h4 class="caption center-align">OPEN</h4>
                <h4 class="center-align">Hours of Operation</h4>
                <h6 class="center-align week-of"></h6>
                <?php include 'hours-einsteins.php' ?>
              </div>
            </div>
          </li>
          
          <li class="flex-item">
            <div class="quick-info green z-depth-2">
              <div class="quick-info-text">Text goes here.</div>
              <div class="quick-info-image circle einsteins">&nbsp;<div>
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
      var n = Date.today().previous().monday().toString("MMMM dd");
      $(".week-of").append("Week of " + n);

    });
  </script>

  <script>
    $(document).ready(function(){

      var dateVar = new Date();
      var n = dateVar.getDay();

      $('tr.day-' + n).addClass('current-day');

    });
  </script>


  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
