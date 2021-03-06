<!--Thanks to Russell Bell for his help-->
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

<title>Add New Location| FoodFinder</title>

<!-- CSS  -->
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<script type="text/javascript" src="js/moment.js"></script>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700,500' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oswald:700,300,400' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
<link href="custom.css" rel="stylesheet">

<body>
<?php
$id = NULL;

include 'header.php';

echo "<div class=\"container\">\n";

error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('html_errors', 'On');

if(isset($_POST['update'])) {
    include 'db-connect.php';

    $location_location = $_POST['location_location'];
    $location_name = $_POST['location_name'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO location_id (location_name) VALUES (\"" . $location_name ."\"")";
    $result1 = mysqli_query($conn, $sql);
    $sql = "SELECT id FROM location_id WHERE location_name=\"" . $location_name . "\"";
    $location_id = mysqli_query($conn, $sql);

    if (!$result1)
    {
        echo ('Could not add location name.');
    }

    $sql = "INSERT INTO descriptions (id, location) VALUES (\"" . $location_id . "\"", \"" . $location_location ."\")";
    $result2 = mysqli_query($conn, $sql);

    if (!$result2)
    {
        echo ('Could not add location.');
    }

    else
    {
        echo "Name and Location added successfully!";
        //include 'db-test.php';
    }

    unset($conn);
}

else
{
    ?>
    <h4 class="heading center-align"><i class="material-icons small">add_location</i>Add New Location</h4>
    <div class="row">
            <ul class="collapsible popout" data-collapsible="expandable">
                <li>
                    <form class="col s12 m12 l10 push-l1" method = "post" action = "<?php $_PHP_SELF ?>">
                        <div class="collapsible-header green active"><i class="material-icons">store</i>Basic Information</div>
                        <div class="collapsible-body grey darken-4 green-text">
                            <div class="row" style="padding: 10px;">
                                <div class="input-field col s12 m12">
                                    <i class="material-icons prefix">info_outline</i>
                                    <input placeholder='Ex: "Einstein Bros Bagels"' id="location_name" type="text" length="45" class="validate">
                                    <label for="location_name">Dining Location Name</label>
                                </div>
                                <div class="input-field col s12 m12">
                                    <i class="material-icons prefix">place</i>
                                    <input placeholder='Ex: "Havener Center"' id="location_location" type="text" length="45" class="validate">
                                    <label for="location_location">Location</label>
                                </div>
                            </div>
                        </div>
                        <button class="btn-large waves-effect waves-light green lighten-1" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </form>
                </li>
<!--                <li>-->
<!--                    <div class="collapsible-header green"><i class="material-icons">schedule</i>Weekly Hours</div>-->
<!--                    <div class="collapsible-body grey darken-4" style="padding: 10px;">-->
<!--                    <ul class="collapsible" data-collapsible="expandable">-->
<!--                    --><?php
//                        $dayArray = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
//
//                        for($day = 0; $day < 7; $day++) {
//                            echo " <li>\n";
//                            echo "                                <div class=\"collapsible-header " .
//                                ($day==0?"active ":" ") . "green lighten-2\"><i class=\"material-icons\">today</i>" . $dayArray[$day] . "</div>\n";
//                            echo "                                <div class=\"collapsible-body white\" style=\"padding: 10px;\">\n";
//                            echo "                                    <div class=\"row\">\n";
//                            echo "                                        <form class=\"input-field\">\n";
//                            echo "                                        <div class=\"input-field col s12 m6 l2\">\n";
//                            echo "                                            <select>\n";
//                            echo "                                                <option value=\"\" disabled selected>Select</option>\n";
//
//                            for ($i=5; $i<24; $i++) {
//                                for ($j=0; $j < 2; $j++) {
//                                    echo '<option value="'. ($i).':'.($j*30) . '">' . ($i > 12 ? $i-12 : $i) . ':' . ($j*3) . '0 '. ($i < 12 ? 'am' : 'pm'). '</option>\n';
//                                }
//                            }
//
//                            echo "                                            </select>\n";
//                            echo "                                            <label>Breakfast Open</label>\n";
//                            echo "                                        </div>\n";
//                            echo "                                        <div class=\"input-field col s12 m6 l2\">\n";
//                            echo "                                            <select>\n";
//                            echo "                                                <option value=\"\" disabled selected>Select</option>\n";
//
//                            for ($i=5; $i<24; $i++) {
//                                for ($j=0; $j < 2; $j++) {
//                                    echo '<option value="'. ($i).':'.($j*30) . '">' . ($i > 12 ? $i-12 : $i) . ':' . ($j*3) . '0 '. ($i < 12 ? 'am' : 'pm'). '</option>\n';
//                                }
//                            }
//
//                            echo "                                            </select>\n";
//                            echo "                                            <label>Breakfast Close</label>\n";
//                            echo "                                        </div>\n";
//                            echo "                                        <div class=\"input-field col s12 m6 l2\">\n";
//                            echo "                                            <select>\n";
//                            echo "                                                <option value=\"\" disabled selected>Select</option>\n";
//
//                            for ($i=5; $i<24; $i++) {
//                                for ($j=0; $j < 2; $j++) {
//                                    echo '<option value="'. ($i).':'.($j*30) . '">' . ($i > 12 ? $i-12 : $i) . ':' . ($j*3) . '0 '. ($i < 12 ? 'am' : 'pm'). '</option>\n';
//                                }
//                            }
//
//                            echo "                                            </select>\n";
//                            echo "                                            <label>Lunch Open</label>\n";
//                            echo "                                        </div>\n";
//                            echo "                                        <div class=\"input-field col s12 m6 l2\">\n";
//                            echo "                                            <select>\n";
//                            echo "                                                <option value=\"\" disabled selected>Select</option>\n";
//                            for ($i=5; $i<24; $i++) {
//                                for ($j=0; $j < 2; $j++) {
//                                    echo '<option value="'. ($i).':'.($j*30) . '">' . ($i > 12 ? $i-12 : $i) . ':' . ($j*3) . '0 '. ($i < 12 ? 'am' : 'pm'). '</option>\n';
//                                }
//                            }
//                            echo "                                            </select>\n";
//                            echo "                                            <label>Lunch Close</label>\n";
//                            echo "                                        </div>\n";
//                            echo "                                        <div class=\"input-field col s12 m6 l2\">\n";
//                            echo "                                            <select>\n";
//                            echo "                                                <option value=\"\" disabled selected>Select</option>\n";
//                            for ($i=5; $i<24; $i++) {
//                                for ($j=0; $j < 2; $j++) {
//                                    echo '<option value="'. ($i).':'.($j*30) . '">' . ($i > 12 ? $i-12 : $i) . ':' . ($j*3) . '0 '. ($i < 12 ? 'am' : 'pm'). '</option>\n';
//                                }
//                            }
//                            echo "                                            </select>\n";
//                            echo "                                            <label>Dinner Open</label>\n";
//                            echo "                                        </div>\n";
//                            echo "                                        <div class=\"input-field col s12 m6 l2\">\n";
//                            echo "                                            <select>\n";
//                            echo "                                                <option value=\"\" disabled selected>Select</option>\n";
//                            for ($i=5; $i<24; $i++) {
//                                for ($j=0; $j < 2; $j++) {
//                                    echo '<option value="'. ($i).':'.($j*30) . '">' . ($i > 12 ? $i-12 : $i) . ':' . ($j*3) . '0 '. ($i < 12 ? 'am' : 'pm'). '</option>\n';
//                                }
//                            }
//                            echo "                                            </select>\n";
//                            echo "                                            <label>Dinner Close</label>\n";
//                            echo "                                        </div>\n";
//                            echo "                                    </form>\n";
//                            echo "                                    </div>\n";
//                            echo "                                </div>\n";
//                            echo "                            </li>\n";
                        }

                    ?>
<!--                    </ul>-->
<!--                    </div>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <div class="collapsible-header green slab"><i class="material-icons">description</i>Profile Card #1</div>-->
<!--                    <div class="collapsible-body grey darken-4 green-text" style="padding-top: 10px;">-->
<!--                        <div class="input-field col s12">-->
<!--                            <i class="material-icons prefix">label_outline</i>-->
<!--                            <input placeholder='Ex: "Darn Good Coffee"' id="par1_heading" type="text" length="45" class="validate">-->
<!--                            <label for="par1_heading">Paragraph 1 Heading</label>-->
<!--                        </div>-->
<!--                        <div class="row" style="padding: 10px">-->
<!--                            <div class="input-field col s12">-->
<!--                                <i class="material-icons prefix">assignment</i>-->
<!--                                <textarea id="par1_text" class="materialize-textarea" length="120"></textarea>-->
<!--                                <label for="par1_text">Paragraph text</label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="file-field input-field" style="padding: 10px">-->
<!--                            <div class="btn green lighten-1">-->
<!--                                <span>Upload</span>-->
<!--                                <input type="file">-->
<!--                                <i class="material-icons right">add_a_photo</i>-->
<!--                            </div>-->
<!--                            <div class="file-path-wrapper">-->
<!--                                <input class="file-path validate" type="text" placeholder="Must use .JPG or .PNG">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <div class="collapsible-header"><i class="material-icons">web</i>Profile Card #2</div>-->
<!--                    <div class="collapsible-body">-->
<!--                        <div class="row" style="margin-top: 15px;padding: 10px;">-->
<!--                            <div class="input-field col s12 m8">-->
<!--                                <input placeholder="Einstein Bros Bagels" id="location_name" type="text" length="45" class="validate">-->
<!--                                <label for="location_name">Dining Location Name</label>-->
<!--                            </div>-->
<!--                            <div class="input-field col s12 m8">-->
<!--                                <input placeholder="Havener Center" id="location_location" type="text" length="45" class="validate">-->
<!--                                <label for="location_location">Location</label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <div class="collapsible-header"><i class="material-icons">message</i>Profile Card #3</div>-->
<!--                    <div class="collapsible-body">-->
<!--                        <div class="row" style="margin-top: 15px;padding: 10px;">-->
<!--                            <div class="input-field col s12 m8">-->
<!--                                <input placeholder="Einstein Bros Bagels" id="location_name" type="text" length="45" class="validate">-->
<!--                                <label for="location_name">Dining Location Name</label>-->
<!--                            </div>-->
<!--                            <div class="input-field col s12 m8">-->
<!--                                <input placeholder="Havener Center" id="location_location" type="text" length="45" class="validate">-->
<!--                                <label for="location_location">Location</label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <div class="collapsible-header"><i class="material-icons">description</i>Profile Card #4</div>-->
<!--                    <div class="collapsible-body">-->
<!--                        <div class="row" style="margin-top: 15px;padding: 10px;">-->
<!--                            <div class="input-field col s12 m8">-->
<!--                                <input placeholder="Einstein Bros Bagels" id="location_name" type="text" length="45" class="validate">-->
<!--                                <label for="location_name">Dining Location Name</label>-->
<!--                            </div>-->
<!--                            <div class="input-field col s12 m8">-->
<!--                                <input placeholder="Havener Center" id="location_location" type="text" length="45" class="validate">-->
<!--                                <label for="location_location">Location</label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </li>-->
<!--            </ul>-->
<!--            <hr />-->
<!--            <button class="btn-large waves-effect waves-light green lighten-1" type="submit" name="action">Submit-->
<!--                <i class="material-icons right">send</i>-->
<!--            </button>-->
    </div>

    <?php
}

?>
</div>
<?php

include 'footer.php';

?>
<script>
    $(document).ready(function() {
        $('select').material_select();
    });
</script>


</body>
</html>
