<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Material 3</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="custom.css" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script type="text/javascript" src="js/date.js"></script>
</head>
<body style="background-color: #eeeeee;">

  <?php include 'header.php' ?>

  <div class="container">
    <div class="section">

      <!--   Tiles Section   -->
      <div class="row">
        <div class="col m1 l2">&nbsp;</div>
        <div class="col s12 m10 l8 offset-l2 offset-m1">
          <div class="card hoverable">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="images/bagels.jpg">
            </div>
            <div class="card-content green lighten-3">
              <span class="card-title activator grey-text text-darken-4"><i class="material-icons">event_available</i>Einstein Bros. Bagels<i class="material-icons right">add</i></span>
              <p>A coffee shop for students serving delicious bagels and more.</p>
            </div>
            <div class="card-reveal green lighten-3">
              <div class="row">
                <span class="card-title grey-text text-darken-4"><i class="material-icons">event_available</i>Einstein Bros. Bagels<i class="material-icons right">close</i></span>
                <p>A coffee shop for students serving delicious bagels and more.</p>
              </div>
              <div class="">
                <div class="row">
                  <div class="col s12 m12 l12">
                    <?php include 'hours-tj.php' ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12 center-align">
                    <a href="material-profile.html" class="waves-effect waves-light btn green center-align"><i class="material-icons left">person_pin</i>View Profile</a>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="card hoverable">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="images/bagels.jpg">
            </div>
            <div class="card-content red lighten-3">
              <span class="card-title activator grey-text text-darken-4"><i class="material-icons">event_busy</i>Einstein Bros. Bagels<i class="material-icons right">add</i></span>
              <p>A coffee shop for students serving delicious bagels and more.</p>
            </div>
            <div class="card-reveal red lighten-3">
              <div class="row">
                <span class="card-title grey-text text-darken-4"><i class="material-icons">event_busy</i>Einstein Bros. Bagels<i class="material-icons right">close</i></span>
                <p>A coffee shop for students serving delicious bagels and more.</p>
              </div>
              <div class="">
                <div class="row">
                  <div class="col s12 m12 l12">
                    <?php include 'hours-einsteins.php' ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12 center-align">
                    <a href="material-profile.html" class="waves-effect waves-light btn green center-align"><i class="material-icons left">person_pin</i>View Profile</a>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    <br><br>
    </div>
    </div>




  <?php include 'footer.php' ?>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
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
