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

include 'food-fundraiser-obj.php';

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
    include 'pullFundraisers.php';

    $sinceEpoch = strtotime("today");

    echo '<div class="container">';
    echo "<h4 class=\"heading center-align\"><i class=\"material-icons small\">local_atm</i>&nbsp;Add Food Fundraiser</h4>";


    if (isset($_POST['insert'])) {

        $name = $_POST['name'];
        $organization = $_POST['organization'];
        $contact = $_POST['contact'];
        $location = $_POST['location'];
        $description = $_POST['description'];
        $start = $_POST['start'];
        $start = date("Y-m-d", strtotime($start));
        $end = $_POST['end'];
        $end = date("Y-m-d", strtotime($end));
        $open = $_POST['open'];
        $open= date("H:i:s", strtotime($open));
        $close = $_POST['close'];
        $close= date("H:i:s", strtotime($close));

        //$sql = "ALTER TABLE `fundraisers` AUTO_INCREMENT = ($count+1);";

        $result = mysqli_query($con, $sql);

        $sql = "INSERT INTO fundraisers (name, organization, contact, location, description, start, end, open, close)
                                VALUES ('$name', '$organization', '$contact', '$location', '$description', '$start', '$end', '$open', '$close')";

        $result = mysqli_query($con, $sql);

        if (!$result) {
            cardActionFail("Error: Food Fundraiser not added successfully.");
        }

        else {
            cardActionSuccess("Food Fundraiser added successfully!");
        }
    }

    else {

    ?>
    <div class="row">
        <div class="col s12 l8 push-l2">
            <div class="card white">
                <div class="card-content">
                    <span class="card-title">Fundraiser Details</span>
                    <p>Please fill out the form below to add your food fundraiser. This fundraiser must be through an Registered Student Organization (RSO) at Missouri S&T. Please
                        use proper capitalization and avoid special characters (&, #, @, etc).</p>
                </div>
                <div class="card-action">
                    <div class="row">
                        <form class="col s12" method="post" action="<?php $_PHP_SELF ?>" target="_blank">
                            <div class="row" style="padding: 0px;">
                                <div class="input-field col s12 l6">
                                    <i class="material-icons prefix">info_outline</i>
                                    <input id="name" name="name" type="text" maxlength="45" length="45">
                                    <label for="name">Fundraiser Name</label>
                                </div>
                            </div>
                            <div class="row" style="padding: 0px;">
                                <div class="input-field col s12 l6">
                                    <i class="material-icons prefix">group_work</i>
                                    <input id="organization" name="organization" type="text" maxlength="45" length="45">
                                    <label for="organization">Organization Name</label>
                                </div>
                            </div>
                            <div class="row" style="padding: 0px;">
                                <div class="input-field col s12 l6">
                                    <i class="material-icons prefix">mail</i>
                                    <input id="contact" name="contact" type="email" class="validate" maxlength="45" length="45">
                                    <label for="contact">Contact Email Address</label>
                                </div>
                            </div>
                            <div class="row" style="padding: 0px;">
                                <div class="input-field col s12 l6">
                                    <i class="material-icons prefix">place</i>
                                    <input id="location" name="location" type="text" class="validate" maxlength="45" length="45">
                                    <label for="location">Fundraiser Location</label>
                                </div>
                            </div>
                            <div class="row" style="padding: 0px;">
                                <div class="input-field col s12 l8">
                                    <i class="material-icons prefix">description</i>
                                    <textarea class="materialize-textarea" id="description" name="description" class="validate" type="text" maxlength="60" length="60"></textarea>
                                    <label for="description">Fundraiser Description</label>
                                </div>
                            </div>
                            <div class="row" style="padding: 0px;">
                                <div class="input-field col s12 l4">
                                    <i class="material-icons prefix">today</i>
                                    <input class="datepicker start" name="start" id="start" type="text">
                                    <label for="startdate" class="active">Start Date</label>
                                </div>
                                <div class="input-field col s12 l4">
                                    <input class="datepicker end" name="end" id="end" type="text" class="datepicker">
                                    <label for="end" class="active">End Date</label>
                                </div>
                            </div>
                            <div class="row" style="padding: 0px;">
                                <div class="input-field col s12 l4">
                                    <i class="material-icons prefix">access_time</i>
                                    <input type="text" class="timepicker" name="open" id="open"/>
                                    <label for="open">Start Time</label>
                                </div>
                                <div class="input-field col s12 l4">
                                    <input type="text" class="timepicker" name="close" id="close"/>
                                    <label for="close">End Time</label>
                                </div>
                                <div class="input-field col s12 l4">
                                    <input type="checkbox" id="allday" />
                                    <label for="allday">All Day</label>
                                </div>
                            </div>
                            <div class="input-field col s6">
                                <button class="btn waves-effect waves-light" type="submit" name="insert" id="insert">Update
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    }
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