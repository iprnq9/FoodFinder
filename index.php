<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>FoodFinder</title>

  <!-- CSS  -->
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
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
      <ul class="flex-container">
      <li class="flex-item card">
        <div class="card-status open"></div>
        <div class="card-image"><img src="images/bagels2.jpg" /></div>
        <div class="card-info">
          <p class="card-title">Einstein Bros Bagels</p>
          <p class="card-subtitle">A coffee shop serving delicious bagels and more.</p>
          <p class="card-hours">
            <table class="table centered bordered white">
            <thead><tr>
              <th>Day</th>
              <th>Open</th>
              <th>-</th>
              <th>Closed</th>
              <th>Open</th>
              <th>-</th>
              <th>Closed</th>
            </tr></thead>
            <tr>
              <td>Monday</td>
              <td>7:00am</td>
              <td>-</td>
              <td>12:00pm</td>
              <td>1:00pm</td>
              <td>-</td>
              <td>7:00pm</td>
            </tr>
            </table>
          </p>
          <div class="profile-button"><a href="material-profile.php" class="waves-effect waves-light btn green center-align z-depth-2"><i class="material-icons left">person_pin</i>View Profile</a></div>
        </div>
        <div class="card-status busy"></div>
      </li>
      <li class="flex-item card">
        <div class="card-status closed"></div>
        <div class="card-image"><img src="images/rustic2-2.jpg" /></div>
        <div class="card-info">
          <p class="card-title">Rustic Range</p>
          <p class="card-subtitle">Classic burgers, made as desired.</p>
          <p class="card-hours">
            <table class="table centered bordered white">
            <thead><tr>
              <th>Day</th>
              <th>Open</th>
              <th>-</th>
              <th>Closed</th>
              <th>Open</th>
              <th>-</th>
              <th>Closed</th>
            </tr></thead>
            <tr>
              <td>Monday</td>
              <td>7:00am</td>
              <td>-</td>
              <td>12:00pm</td>
              <td>1:00pm</td>
              <td>-</td>
              <td>7:00pm</td>
            </tr>
            </table>
          </p>
        <div class="profile-button"><a href="material-profile.php" class="waves-effect waves-light btn green center-align z-depth-2"><i class="material-icons left">person_pin</i>View Profile</a></div>
        </div>
      </li>
      <li class="flex-item card">3</li>
      <li class="flex-item card">4</li>
      <li class="flex-item card">5</li>
      <li class="flex-item card">6</li>
      <li class="flex-item card">7</li>
      <li class="flex-item card">8</li>
      </ul>
    </div>
  </div>

  <?php include 'footer.php' ?>
  <!--  Scripts-->
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  </body>
</html>
