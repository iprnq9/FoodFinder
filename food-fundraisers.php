<!--Thanks to Russell Bell for his help-->
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
<meta name="theme-color" content="#66BB6A" />

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
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
<body>
<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
//ini_set('html_errors', 'On');

include 'food-fundraiser-obj.php';

include 'header.php';

include 'db-connect.php';

$con = new mysqli($host, $user, $password, $dbname);

$fundArray = array();

$dayNumber = date("w")+1;

if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

else {
    include 'pullFundraisers.php';

    $sinceEpoch = strtotime("today");

    echo '<div class="container"><div style="text-align: center;">';
    include 'currently.php';
    echo '</div><div class="section"><ul class="flex-container">';

    $max = sizeof($fundArray);
    for ($k = 0; $k < ($max); $k++){
        //$statusBit = $fundArray[$k]->getStatusBit();//2=closed for the day, 1=open, 0=not selling today
        //echo $statusBit;
        $status = $fundArray[$k]->status();
        if ($status == "Not Available")
            $statusClass = "closed";
        else
            $statusClass = "open";

        if($status !== "Not Within Dates") {
            $startTime = new DateTime($fundArray[$k]->getStartTime());
            $endTime = new DateTime($fundArray[$k]->getEndTime());
            $startDate = new DateTime($fundArray[$k]->getStartDate());
            $endDate = new DateTime($fundArray[$k]->getEndDate());

            //$imageClass = "imageClass-" . $fundArray[$k]->getId();
            echo "      <li class=\"flex-item black-text card grey darken-4 white-text\">\n";


            echo "        <div class=\"card-status " . $statusClass . "\">" . $status . "</div>\n";
            //echo "        <div class=\"card-status closing-soon\"><i class=\"material-icons\">place</i>&nbsp;" . $fundArray[$k]->getLocation() . "</div>";
            echo "              <div class=\"card-image\" style=\"background-image: url(images/fundraisers/" .
                $fundArray[$k]->getCoverPhoto() . "); background-size: cover; background-repeat: no-repeat;\"></div>\n";
            //echo "        <div class=\"card-image " . $imageClass . "\"></div>\n";
            echo "        <div class=\"card-info\">\n";
            echo "          <p class=\"card-title\">" . $fundArray[$k]->getOrganization() . ": " . $fundArray[$k]->getName() . "</p>\n";
            echo "          <p class=\"card-subtitle\">" . $fundArray[$k]->getDescription() . "</p>\n";
            //echo "          <p class=\"card-location\"><i class=\"material-icons\">place</i>&nbsp;" . $fundArray[$k]->getLocation() . "</p>\n";
            echo "          <p class=\"card-hours\"><span class=\"todays-hours-text valign\"><i class=\"material-icons\">schedule</i>&nbsp;Today's Hours</span></p>";
            echo "            <table class=\"table centered bordered grey darken-4 white-text\" style=\"width: 50%;margin: 0 auto;\">";
            echo "            <thead><tr>";
            echo "              <th>Open</th>";
            echo "              <th>-</th>";
            echo "              <th>Closed</th>";
            echo "            </tr></thead>";
            echo '<tr><td>' . $startTime->format("g:ia") . '</td><td>-</td><td>' . $endTime->format("g:ia") . '</td></tr>';
            //echo '<tr><td>' . $startDate->format("F j") . '</td><td> to </td><td>' . $endDate->format("F j") . '</td></tr>';
            echo "            </table>";
            if($startDate == $endDate)
                echo '<p class="card-date-range"><i class="material-icons">today</i>&nbsp;Date: ' . $startDate->format("F j") . '</p>';
            else
                echo '<p class="card-date-range"><i class="material-icons">today</i>&nbsp;Dates: ' . $startDate->format("F j") . ' to ' . $endDate->format("F j") . '</p>';
            echo "          </p>";
            echo "          <p class=\"card-location\"><i class=\"material-icons\">place</i>&nbsp;" . $fundArray[$k]->getLocation() . "</p>\n";
            echo "          <div
          class=\"profile-button\"><a href=\"mailto:" . $fundArray[$k]->getContact(). "\" class=\"waves-effect waves-light btn green center-align z-depth-2\"><i class=\"material-icons
          left\">person_pin</i>Email " . $fundArray[$k]->getOrganization() . "</a></div>\n";
            //echo "          <div class=\"profile-button\"><a href=\"profile.php?id=". $k . "\" class=\"waves-effect waves-light btn green center-align z-depth-2\"><i
            //class=\"material-icons left\">person_pin</i>View Profile</a></div>\n";
            echo "        </div>\n";
            echo "      </li>";
        }
    }
    echo "</ul></div></div>";

    //echo $fundArray[0]->getHeading(0);
}

include 'footer.php';

?>

<script>
    $("li.fundraisers").addClass("active");
</script>

</body>
</html>