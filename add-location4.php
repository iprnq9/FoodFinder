<!--Thanks to Russell Bell for his help-->
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
<meta name="theme-color" content="#66BB6A"/>

<title>Add Food Fundraiser | FoodFinder</title>

<!-- CSS  -->
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
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
<script type="text/javascript" src="js/jquery.timepicker.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.timepicker.css" />

<style>
    .row {
        margin-bottom: 0px;
    }
</style>

<body>

<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
//ini_set('html_errors', 'On');

include 'food-finderprj2.php';

include 'header.php';

include 'db-connect.php';

include 'functions.php';

$con = new mysqli($host, $user, $password, $dbname);

$fundArray = array();

$dayNumber = date("w") + 1;

if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}

else {
    include 'pullData2.php';


    echo '<div class="container">';
    echo "<h4 class=\"heading center-align\"><i class=\"material-icons small\">add_location</i>&nbsp;Add New S&T Dining Location</h4>";

    ?>

    <div class="row">
    <div class="col s12 l8 push-l2">
    <div class="card grey darken-4 white-text">
    <div class="card-content">
        <span class="card-title">S&T Dining Location Details</span>
        <p>Please fill out the form below to add your S&T Dining Location. This location must be a permanent dining facility at Missouri
            S&T. Please use proper capitalization and avoid special characters (&, #, @, etc).<br></p>
        <p>Once the location has been added, use the link that appears to update its full details. This is just an initial addition of the location.</p>
    </div>
    <div class="card-action">
    <div class="row">

    <?php


    if (isset($_POST['insert'])) {

        $name = $_POST['name'];

        //$sql = "ALTER TABLE `fundraisers` AUTO_INCREMENT = ($count+1);";

        //$result = mysqli_query($con, $sql);

        //echo "name" . $name;

        if($name !== ""){
            //$sql = "INSERT INTO 'location_id'('location_name') VALUES ('$name')";
            $sql = "INSERT INTO `location_id`(`location_name`) VALUES (\"$name\")";
            $result = mysqli_query($con, $sql);
            //echo "result: " . $result;
        }

        if (!$result) {
            cardActionFail("Error: S&T Dining Location '$name' not added to database table 'location_id' successfully.");
        }

        else {
            //$sql = "SELEC"
            //insert blank row into descriptions table
            $sql = "INSERT INTO `descriptions` (`id`) VALUES (NULL)";
            $result = mysqli_query($con, $sql);

            if (!$result) {
                cardActionFail("Error: S&T Dining Location '$name' not added to database table 'descriptions' successfully. Do not re-add the location, please contact support.");
            }

            else
                cardActionSuccess("S&T Dining Location '$name' added successfully!&nbsp;<a href=\"update-data.php\"> Click here to input its details!</a>");
        }

        //$result = mysqli_query($con, $sql);



    }

    else {

        ?>

                            <form class="col s12" method="post" action="<?php $_PHP_SELF ?>" target="">
                                <div class="row" style="padding: 0px;">
                                    <div class="input-field col s12 l6">
                                        <i class="material-icons prefix">info_outline</i>
                                        <input id="name" name="name" type="text" maxlength="45" length="45">
                                        <label for="name">S&T Dining Location Name</label>
                                    </div>
                                </div>
                                <div class="input-field col s6">
                                    <button class="btn waves-effect waves-light" type="submit" name="insert" id="insert">
                                        <i class="material-icons left">add</i>Add Location
                                    </button>
                                </div>
                            </form>



        <?php
    }

    ?>

    </div>
    </div>
    </div>
    </div>
    </div>

        <?php
    echo "</div>";
}

include 'footer.php';

?>

<script>
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 2 // Creates a dropdown of 15 years to control year
    });

    $('input.timepicker').timepicker();

</script>

<script>
    $('#allday').change(function() {
        if ($('input#allday').is(':checked') == true){
            $('input#open').val('00:00:00').prop('readonly', true);
            $('input#close').val('23:59:59').prop('readonly', true);
            $('label[for="open"]').hide();
            $('label[for="close"]').hide();
            console.log('checked');
        } else {
            $('input#open').val('').prop('readonly', false);
            $('input#close').val('').prop('readonly', false);
            $('label[for="open"]').show();
            $('label[for="close"]').show();
            console.log('unchecked');
        }
    });
</script>

</body>
</html>