<!--Thanks to Russell Bell for his help-->
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('html_errors', 'On');

include 'food-finderprj2.php';

include 'db-connect.php';

$con = new mysqli($host, $user, $password, $dbname);

$objArray = array();

if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

else {
    include 'pullData2.php';

    $k = 3;
    $dayArray = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

    //echo "<table class=\"responsive-table centered bordered white\">\n";
    //echo "                                    <thead><tr>\n";
    //echo "                                        <th>Day</th>\n";

    for($i = 0; $i < ($objArray[$k]->getNumOpenCloseTimes()); $i++){
        echo "i = " . $i . ". NumOpenCloseTimes = " . ($objArray[$k]->getNumOpenCloseTimes()) . ".<br><br>";
        //echo "                                        <th>Open</th>\n";
        //echo "<td>-</td>";
        //echo "                                        <th>Closed</th>\n";
    }

    //echo "                                    </tr></thead>\n";

    for($day = 0; $day < 7; $day++) {
        echo "Day = " . $day . ". Day = " . $dayArray[$day] . ".<br><br>";
        //echo "                                    <tr class=\"day-" . ($day+1) . "\">\n";
        //echo "                                        <td>" . $dayArray[$day] . "</td>\n";

        $objArray[$k]->setOpenCloseArray($day);

        echo "<ul>";
        for ($i = 0; $i < ($objArray[$k]->getNumOpenCloseTimes()); $i++) {
            echo "                                        <li>" . $objArray[$k]->getOpenTime($i) . "</li>\n";
            echo "<li>-</li>";
            echo "                                        <li>" . $objArray[$k]->getCloseTime($i) . "</li>\n";
        }
        echo "</ul>";
        //echo "                                    </tr>\n";
    }

    //echo "                                </table>\n";


}

?>


</body>
</html>