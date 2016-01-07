<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Material Profile</title>

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
      <div class="row">

        <div class="col s12 center-align" style="margin-top: -30px;"><h1 class="profile-title">Einstein Bros Bagels</h1></div>

        <div class="col l2 hide-on-med-and-down">&nbsp;</div>

        <div class="row">
          <div class="col s12 m12 l8">
            <div class="card open">
              <div class="card-content" style="margin-top: -20px;">
                <h4 class="caption center-align"></h4>
                <h4 class="center-align">Hours of Operation</h4>
                <h6 class="center-align week-of"></h6>
                <?php include 'hours-einsteins.php' ?>
              </div>
            </div>
          </div>
        </div>

        <div class="col l2 hide-on-med-and-down">&nbsp;</div>

        <div class="row">
          <div class="col s12 m12 l8">
            <div class="card medium">
              <div class="card-image">
                <img src="images/bagels2.jpg" class="materialboxed" data-caption="Bagels. Tons of bagels.">
                <span class="card-title">&nbsp;</span>
              </div>
              <div class="card-content" style="margin-top: -20px;">
                <h4>Bagels. Tons of Bagels.</h4>
                <p>These bagels are good. I mean delicious. Tons of flavors. Gotta love a warm bagel. Yum.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col l2 hide-on-med-and-down">&nbsp;</div>

        <div class="row">
          <div class="col s12 m12 l8">
            <div class="card medium">
              <div class="card-image">
                <img src="images/bagels2.jpg" class="materialboxed" data-caption="Bagels. Tons of bagels.">
                <span class="card-title">&nbsp;</span>
              </div>
              <div class="card-content" style="margin-top: -20px;">
                <h4>Bagels. Tons of Bagels.</h4>
                <p>These bagels are good. I mean delicious. Tons of flavors. Gotta love a warm bagel. Yum.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col l2 hide-on-med-and-down">&nbsp;</div>

        <div class="row">
          <div class="col s12 m12 l8">
            <div class="card medium">
              <div class="card-image">
                <img src="images/bagels2.jpg" class="materialboxed" data-caption="Bagels. Tons of bagels.">
                <span class="card-title">&nbsp;</span>
              </div>
              <div class="card-content" style="margin-top: -20px;">
                <h4>Bagels. Tons of Bagels.</h4>
                <p>These bagels are good. I mean delicious. Tons of flavors. Gotta love a warm bagel. Yum.</p>
              </div>
            </div>
          </div>
        </div>

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
