<!DOCTYPE html>
<html>
<head>
	<?php
$user = 'root';
$password = 'root';
$db = 'CMSC';
$host = 'localhost';
$port = 8889;


// Create connection
$conn = new mysqli($host, $user, $password, $db, $port);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>
</head>

<body>
<form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
  Favorite Orioles:<br>
	<input list="browsers" name="browser">
  <datalist id="browsers">

    <!-- NOTE NO JAVASCRIPT, JUST CALL THIS IN A JS FUNCTION -->
    <?php
  $sql = "SELECT favO FROM js2";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
         echo "<option value='". $row["favO"]. "'>";
     }

  ?>
  </datalist>
  <input type="submit">
</form>


<?php
$v1 = $_POST["browser"];
$sql = "INSERT INTO js2 (favO)
VALUES ('$v1')";
?>

</body>
</html>
