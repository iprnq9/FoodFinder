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
      <ul class="flex-container">
      <li class="flex-item card open">
        <div class="card-status open"></div>
        <div class="card-image"><img src="images/bagels2.jpg" /></div>
        <div class="card-info">
          <p class="card-title">Einstein Bros Bagels</p>
          <p class="card-subtitle">A coffee shop serving delicious bagels and more.</p>
        </div>
      </li>
      <li class="flex-item card">
        <div class="card-status closed"></div>
        <div class="card-image"><img src="images/bagels2.jpg" /></div>
        <div class="card-info">
          <p class="card-title">Einstein Bros Bagels</p>
          <p class="card-subtitle">A coffee shop serving delicious bagels and more.</p>
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
