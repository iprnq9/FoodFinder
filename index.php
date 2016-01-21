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
  <link href='https://fonts.googleapis.com/css?family=Oswald:700,300,400' rel='stylesheet' type='text/css'>

</head>
<body style="background-color: #eeeeee;">

  <?php include 'header.php' ?>

  <div class="container">
    <div style="text-align: center;"><div class="currently z-depth-1 green"></div></div>
    <div class="section">
      <ul class="flex-container">
      <li class="flex-item card">
        <div class="card-status einsteins-status"></div>
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
              <td>12:00pm</td>
            </tr>
            <tr>
              <td>1:00pm</td>
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
              <td>7:00am</td>
              <td>-</td>
              <td>12:00pm</td>
            </tr>
            <tr>
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

  <script>
  function updateTimes()
  {
    var n = moment().format("dddd");
    //$(".today").text(n);
    var m = moment().format("h:mma");
    var day = moment().format("d");
    var hour = moment().format("H");
    var minute = moment().format("m");
    var lunchTime = moment("10:45", "hh:mm");
    var dinnerTime = moment("16:45", "hh:mm");
    var nowTime = moment().format("hh:mm");
    var meal;
    if (day < 6 && day > 0)
    {
      if (lunchTime.isBefore() && dinnerTime.isAfter())
        meal = "Lunch";
      else if (dinnerTime.isBefore())
        meal = "Dinner";
      else if (lunchTime.isAfter())
        meal = "Breakfast";
    }

    else if (day == 0 || day == 6)
    {
      if (dinnerTime.isBefore())
        meal = "Dinner";
      else
        meal = "Brunch";
    }
    $(".currently").text(n + ", " + m + ": " + meal);
  }

  updateTimes();
  setInterval(updateTimes, 5000);
  </script>

  <script>
    // Initialize collapse button
    $(".button-collapse").sideNav();
  </script>

  <script>
  var openTime = moment("07:00", "hh:mm");
  var closeTime = moment("22:20", "hh:mm");
  var nowTime = moment().format("hh:mm");
  var nowTimeX = moment();
  var closingIn = closeTime.diff(nowTimeX, 'minutes');

  if (openTime.isBefore() && closeTime.isAfter())
  {
    $(".einsteins-status").html("OPEN").addClass("open");

    if (closingIn <= 30)
      $(".einsteins-status").html("CLOSES IN " + (closingIn+1) + " MIN").addClass("closing-soon").removeClass("open");
  }

  else
    $(".einsteins-status").text("CLOSED").addClass("closed");

  </script>

</body>
</html>
