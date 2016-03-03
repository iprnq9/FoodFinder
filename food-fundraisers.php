<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Food Fundraisers | FoodFinder</title>

  <!-- CSS  -->
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="custom.css" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script type="text/javascript" src="js/moment.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700,500' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Oswald:700,300,400' rel='stylesheet' type='text/css'>

</head>
<body style="background-color: #eeeeee;">

  <?php include 'header.php' ?>

  <script>
    $("li.fundraisers").addClass("active");
  </script>

  <div class="container">
    <div style="text-align: center;"><div class="currently z-depth-1 green"></div></div>
    <div class="section">
      <ul class="flex-container">
        <li class="flex-item card">
          <div class="card-status open">OPEN</div>
          <div class="card-image bake"></div>
          <div class="card-info">
            <div class="card-title-subtitle">
              <p class="card-title">IEEE Bake Sale</p>
              <p class="card-subtitle">Help support us geeks by buying some treats!</p>
            </div>
            <table class="table centered bordered white" style="width: 50%;margin: 0 auto;">
              <caption><p class="card-hours center-align"><span class="todays-hours-text">Today's Hours&nbsp;<i class="material-icons">schedule</i></span></p></caption>
              <thead><tr>
                <th>Open</th>
                <th>-</th>
                <th>Closed</th>
              </tr></thead>
              <tr>
                <td>7:45am</td>
                <td>-</td>
                <td>7:30pm</td>
              </tr>
            </table>
          </div>
        </li>
        <li class="flex-item card">
          <div class="card-status open">OPEN</div>
          <div class="card-image soup"></div>
          <div class="card-info">
            <div class="card-title-subtitle">
              <p class="card-title">Engineers Without Borders Potluck</p>
              <p class="card-subtitle">Bring a soup and eat some soup!</p>
            </div>
            <table class="table centered bordered white" style="width: 50%;margin: 0 auto;">
              <caption><p class="card-hours center-align"><span class="todays-hours-text">Today's Hours&nbsp;<i class="material-icons">schedule</i></span></p></caption>
              <thead><tr>
                <th>Open</th>
                <th>-</th>
                <th>Closed</th>
              </tr></thead>
              <tr>
                <td>10:00am</td>
                <td>-</td>
                <td>4:30pm</td>
              </tr>
            </table>
          </div>
        </li>
        <li class="flex-item card">
          <div class="card-status open">OPEN</div>
          <div class="card-image donuts"></div>
          <div class="card-info">
            <div class="card-title-subtitle">
              <p class="card-title">Kappa Delta Donut Sale</p>
              <p class="card-subtitle">Help support us by buying a dozen!</p>
            </div>
            <table class="table centered bordered white" style="width: 50%;margin: 0 auto;">
              <caption><p class="card-hours center-align"><span class="todays-hours-text">Today's Hours&nbsp;<i class="material-icons">schedule</i></span></p></caption>
              <thead><tr>
                <th>Open</th>
                <th>-</th>
                <th>Closed</th>
              </tr></thead>
              <tr>
                <td>8:00am</td>
                <td>-</td>
                <td>3:30pm</td>
              </tr>
            </table>
          </div>
        </li>
        <li class="flex-item card">
          <div class="card-status open">OPEN</div>
          <div class="card-image bbq"></div>
          <div class="card-info">
            <div class="card-title-subtitle">
              <p class="card-title">Pi Kappa Alpha Grill Out</p>
              <p class="card-subtitle">Burgers, hot dogs, chips, and a drink.</p>
            </div>
            <table class="table centered bordered white" style="width: 50%;margin: 0 auto;">
              <caption><p class="card-hours center-align"><span class="todays-hours-text">Today's Hours&nbsp;<i class="material-icons">schedule</i></span></p></caption>
              <thead><tr>
                <th>Open</th>
                <th>-</th>
                <th>Closed</th>
              </tr></thead>
              <tr>
                <td>10:00am</td>
                <td>-</td>
                <td>2:30pm</td>
              </tr>
            </table>
          </div>
        </li>
      </ul>
    </div>
  </div>

  <?php include 'footer.php' ?>
  <!--  Scripts-->
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  <script>
    $(".currently").text("Monday" + ", " + "10:05am" + ": " + "Breakfast");
  </script>



</body>
</html>
