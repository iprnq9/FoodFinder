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
  <script type="text/javascript" src="js/moment.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700,500' rel='stylesheet' type='text/css'>

</head>
<body style="background-color: #eeeeee;">

  <?php include 'header.php' ?>

  <div class="container">
    <div style="text-align: center;"><div class="currently z-depth-1 green"></div></div>
    <div class="section">
      <ul class="flex-container">
      <li class="flex-item card">
        <div class="card-status open einsteins-status">OPEN</div>
        <div class="card-image einsteins"></div>
        <div class="card-info">
          <p class="card-title">Einstein Bros Bagels</p>
          <p class="card-subtitle">A coffee shop serving delicious bagels and more.</p>
          <br>
          <p class="card-hours center-align"><span class="todays-hours-text">Today's Hours&nbsp;<i class="material-icons">schedule</i></span>
            <table class="table centered bordered white" style="width: 50%;margin: 0 auto;">
            <thead><tr>
              <th>Open</th>
              <th>-</th>
              <th>Closed</th>
            </tr></thead>
            <tr>
              <td>7:00am</td>
              <td>-</td>
              <td>7:00pm</td>
            </tr>
            </table>
          </p>
          <div class="profile-button"><a href="material-profile.php" class="waves-effect waves-light btn green center-align z-depth-2"><i class="material-icons left">person_pin</i>View Profile</a></div>
        </div>
      </li>
      <li class="flex-item card">
        <div class="card-status closed">CLOSED</div>
        <div class="card-image rustic"></div>
        <div class="card-info">
          <p class="card-title">Rustic Range</p>
          <p class="card-subtitle">Classic burgers, made as desired.</p>
          <br>
          <p class="card-hours center-align"><span class="todays-hours-text">Today's Hours&nbsp;<i class="material-icons">schedule</i></span>
            <table class="table centered bordered white" style="width: 50%;margin: 0 auto;">
            <thead><tr>
              <th>Open</th>
              <th>-</th>
              <th>Closed</th>
            </tr></thead>
            <tr>
              <td>10:45am</td>
              <td>-</td>
              <td>7:00pm</td>
            </tr>
            </table>
          </p>
          <div class="profile-button"><a href="material-profile.php" class="waves-effect waves-light btn green center-align z-depth-2"><i class="material-icons left">person_pin</i>View Profile</a></div>
        </div>
      </li>
      <li class="flex-item card">
        <div class="card-status open">OPEN</div>
        <div class="card-image mondo"></div>
        <div class="card-info">
          <p class="card-title">Mondo Subs</p>
          <p class="card-subtitle">Sandwiches served made to order.</p>
          <br>
          <p class="card-hours center-align"><span class="todays-hours-text">Today's Hours&nbsp;<i class="material-icons">schedule</i></span>
          <table class="table centered bordered white" style="width: 50%;margin: 0 auto;">
            <thead><tr>
              <th>Open</th>
              <th>-</th>
              <th>Closed</th>
            </tr></thead>
            <tr>
              <td>7:00am</td>
              <td>-</td>
              <td>9:00pm</td>
            </tr>
          </table>
          </p>
          <div class="profile-button"><a href="material-profile.php" class="waves-effect waves-light btn green center-align z-depth-2"><i class="material-icons left">person_pin</i>View Profile</a></div>
        </div>
      </li>
      <li class="flex-item card">
        <div class="card-status open">OPEN</div>
        <div class="card-image havener"></div>
        <div class="card-info">
          <p class="card-title">Havener Food Court</p>
          <p class="card-subtitle">Italian, Mexican, Asian, Salad, or Homestyle. Options!</p>
          <br>
          <p class="card-hours center-align"><span class="todays-hours-text">Today's Hours&nbsp;<i class="material-icons">schedule</i></span>
          <table class="table centered bordered white" style="width: 50%;margin: 0 auto;">
            <thead><tr>
              <th>Open</th>
              <th>-</th>
              <th>Closed</th>
            </tr></thead>
            <tr>
              <td>7:30am</td>
              <td>-</td>
              <td>2:00pm</td>
            </tr>
            <tr>
              <td>4:30pm</td>
              <td>-</td>
              <td>7:00pm</td>
            </tr>
          </table>
          </p>
          <div class="profile-button"><a href="material-profile.php" class="waves-effect waves-light btn green center-align z-depth-2"><i class="material-icons left">person_pin</i>View Profile</a></div>
        </div>
      </li>
      <li class="flex-item card">
        <div class="card-status closed">CLOSED</div>
        <div class="card-image patio"></div>
        <div class="card-info">
          <p class="card-title">The Patio</p>
          <p class="card-subtitle">Mediterranean food to go!</p>
          <br>
          <p class="card-hours center-align"><span class="todays-hours-text">Today's Hours&nbsp;<i class="material-icons">schedule</i></span>
          <table class="table centered bordered white" style="width: 50%;margin: 0 auto;">
            <thead><tr>
              <th>Open</th>
              <th>-</th>
              <th>Closed</th>
            </tr></thead>
            <tr>
              <td>10:30am</td>
              <td>-</td>
              <td>2:00pm</td>
            </tr>
          </table>
          </p>
          <div class="profile-button"><a href="material-profile.php" class="waves-effect waves-light btn green center-align z-depth-2"><i class="material-icons left">person_pin</i>View Profile</a></div>
        </div>
      </li>
      <li class="flex-item card">
        <div class="card-status closed">CLOSED</div>
        <div class="card-image miner-munchies"></div>
        <div class="card-info">
          <p class="card-title">Miner Munchies</p>
          <p class="card-subtitle">Come shop your favorite snacks and groceries!</p>
          <br>
          <p class="card-hours center-align"><span class="todays-hours-text">Today's Hours&nbsp;<i class="material-icons">schedule</i></span>
          <table class="table centered bordered white" style="width: 50%;margin: 0 auto;">
            <thead><tr>
              <th>Open</th>
              <th>-</th>
              <th>Closed</th>
            </tr></thead>
            <tr>
              <td>5:00pm</td>
              <td>-</td>
              <td>10:00pm</td>
            </tr>
          </table>
          </p>
          <div class="profile-button"><a href="material-profile.php" class="waves-effect waves-light btn green center-align z-depth-2"><i class="material-icons left">person_pin</i>View Profile</a></div>
        </div>
      </li>
      <li class="flex-item card">
        <div class="card-status open">OPEN</div>
        <div class="card-image miner-break"></div>
        <div class="card-info">
          <p class="card-title">Miner Break Caf&eacute;</p>
          <p class="card-subtitle">Proudly serving Starbucks&trade; coffee and more!</p>
          <br>
          <p class="card-hours center-align"><span class="todays-hours-text">Today's Hours&nbsp;<i class="material-icons">schedule</i></span>
          <table class="table centered bordered white" style="width: 50%;margin: 0 auto;">
            <thead><tr>
              <th>Open</th>
              <th>-</th>
              <th>Closed</th>
            </tr></thead>
            <tr>
              <td>8:00am</td>
              <td>-</td>
              <td>7:00pm</td>
            </tr>
          </table>
          </p>
          <div class="profile-button"><a href="material-profile.php" class="waves-effect waves-light btn green center-align z-depth-2"><i class="material-icons left">person_pin</i>View Profile</a></div>
        </div>
      </li>
      <li class="flex-item card">
        <div class="card-status closing-soon">CLOSES IN 25 MIN</div>
        <div class="card-image tj"></div>
        <div class="card-info">
          <p class="card-title">Thomas Jefferson Dining Hall</p>
          <p class="card-subtitle">All you can eat buffet, with many options.</p>
          <br>
          <p class="card-hours center-align"><span class="todays-hours-text">Today's Hours&nbsp;<i class="material-icons">schedule</i></span>
          <table class="table centered bordered white" style="width: 50%;margin: 0 auto;">
            <thead><tr>
              <th>Open</th>
              <th>-</th>
              <th>Closed</th>
            </tr></thead>
            <tr>
              <td>6:45am</td>
              <td>-</td>
              <td>10:30pm</td>
            </tr>
            <tr>
              <td>10:45pm</td>
              <td>-</td>
              <td>2:00pm</td>
            </tr>
            <tr>
              <td>4:45pm</td>
              <td>-</td>
              <td>7:30pm</td>
            </tr>
          </table>
          </p>
          <div class="profile-button"><a href="material-profile.php" class="waves-effect waves-light btn green center-align z-depth-2"><i class="material-icons left">person_pin</i>View Profile</a></div>
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
