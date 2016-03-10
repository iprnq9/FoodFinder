<!--Thanks to Russell Bell for his help-->
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

<title>S&T Dining | FoodFinder</title>

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

include 'food-finderprj2.php';

include 'header.php';

include 'db-connect.php';

$con = new mysqli($host, $user, $password, $dbname);

$objArray = array();

if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

else {
    include 'pullData2.php';

    $k = 1;
    $dayArray = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

    echo "<table class=\"responsive-table centered bordered white\">\n";
    echo "                                    <thead><tr>\n";
    echo "                                        <th>Day</th>\n";

    for($i = 0; $i < ($objArray[$k]->getNumOpenCloseTimes()); $i++){
        echo "                                        <th>Open</th>\n";
        echo "                                        <th>Closed</th>\n";
    }

    echo "                                    </tr></thead>\n";

    for($day = 0; $day < 7; $day++) {
        echo "                                    <tr class=\"day-" . ($day+1) . "\">\n";
        echo "                                        <td>" . $dayArray[$day] . "</td>\n";

        $objArray[$k]->setOpenCloseArray($day+1);

        for ($i = 0; $i < ($objArray[$k]->getNumOpenCloseTimes()); $i++) {
            echo "                                        <td>" . $objArray[$k]->getOpenTime($i) . "</td>\n";
            echo "                                        <td>" . $objArray[$k]->getCloseTime($i) . "</td>\n";
        }

        echo "                                    </tr>\n";
    }

    echo "                                </table>\n";


//    echo "                                        <td>7:00am</td>\n";
//    echo "                                        <td>7:00pm</td>\n";
//    echo "                                    </tr>\n";
//    echo "                                    <tr class=\"day-2\">\n";
//    echo "                                        <td>Tuesday</td>\n";
//    echo "                                        <td>7:00am</td>\n";
//    echo "                                        <td>7:00pm</td>\n";
//    echo "                                    </tr>\n";
//    echo "                                    <tr class=\"day-3\">\n";
//    echo "                                        <td>Wednesday</td>\n";
//    echo "                                        <td>7:00am</td>\n";
//    echo "                                        <td>7:00pm</td>\n";
//    echo "                                    </tr>\n";
//    echo "                                    <tr class=\"day-4\">\n";
//    echo "                                        <td>Thursday</td>\n";
//    echo "                                        <td>7:00am</td>\n";
//    echo "                                        <td>7:00pm</td>\n";
//    echo "                                    </tr>\n";
//    echo "                                    <tr class=\"day-5\">\n";
//    echo "                                        <td>Friday</td>\n";
//    echo "                                        <td>7:00am</td>\n";
//    echo "                                        <td>7:00pm</td>\n";
//    echo "                                    </tr>\n";
//    echo "                                    <tr class=\"day-6\">\n";
//    echo "                                        <td>Saturday</td>\n";
//    echo "                                        <td>7:00am</td>\n";
//    echo "                                        <td>7:00pm</td>\n";
//    echo "                                    </tr>\n";
//    echo "                                    <tr class=\"day-0\">\n";
//    echo "                                        <td>Sunday</td>\n";
//    echo "                                        <td>7:00am</td>\n";
//    echo "                                        <td>7:00pm</td>\n";
//    echo "                                    </tr>\n";
//    echo "                                </table>\n";



}

include 'footer.php';

?>

<script>
    $("li.dining").addClass("active");
</script>

</body>
</html>