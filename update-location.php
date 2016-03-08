<!--Thanks to Russell Bell for his help-->
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

<title>S&T Dining | FoodFinder</title>

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

//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
//ini_set('html_errors', 'On');

if(isset($_POST['update'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "goldgreen";

    $id = $_POST['id'];
    $location_name = $_POST['location_name'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "UPDATE location_id2 SET location_name = \"$location_name\" WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (!$result)
    {
        echo ('Could not update data.');
    }

    else
    {
        echo "Name updated successfully!";
        include 'db-test.php';
    }

    unset($connection);
}

else
{
    ?>

    <div class="row">
        <form class="col s12 m8 offset-l2" method = "post" action = "<?php $_PHP_SELF ?>">
            <div class="row" style="margin-top: 15px;">
                <div class="input-field col s6">
                    <input placeholder="Einstein Bros Bagels" id="location_name" type="text" length="45" class="validate">
                    <label for="location_name">Dining Location Name</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Havener Center" id="location_location" type="text" length="45" class="validate">
                    <label for="location_location">Location</label>
                </div>
            </div>
            <div class="file-field input-field">
                <div class="btn">
                    <span>File</span>
                    <input type="file" multiple>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload a JPG or PNG">
                </div>
            </div>
            <button class="btn-large waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>

    <?php
}

?>
</div>
<?php

include 'footer.php';

?>

</body>
</html>
