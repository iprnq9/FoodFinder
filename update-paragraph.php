<!DOCTYPE html>
<html>
<body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('html_errors', 'On');

if(isset($_POST['update'])) {
  $servername = "localhost";
  $username = "root";
  $password = "FoodFinder";
  $dbname = "foodfinders";

  $id = $_POST['id'];
  $text = $_POST['text'];

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "INSERT INTO paragraphs (id, paragraph) VALUES ($id, \"$paragraph\")";
  $result = mysqli_query($conn, $sql);

  if (!$result)
  {
    echo ('Could not update data.');
  }

  else
  {
    echo "Added successfully!";
  }

  mysqli_close($conn);
}

else
{
  ?>
  <h1>Add new location:</h1>
  <form method = "post" action = "<?php $_PHP_SELF ?>">
    <table width = "400" border =" 0" cellspacing = "1"
           cellpadding = "2">

      <tr>
        <td width = "100">Location ID</td>
        <td><input name = "id" type = "text"
                   id = "id"></td>
      </tr>

      <tr>
        <td width = "300">Text</td>
        <td><input name = "paragraph" type = "text"
                   id = "paragraph" style="height: 400px;"></td>
      </tr>

      <tr>
        <td width = "100"> </td>
        <td>
          <input name = "update" type = "submit"
                 id = "update" value = "Update">
        </td>
      </tr>

    </table>
  </form>
  <?php
}

?>
</body>
</html>
