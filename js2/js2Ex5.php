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
?>
</head>

<body>
<form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
  Favorite Orioles:<br>
	<input type="text" name="browsers" list="browsers" autocomplete="off">
  <datalist id="browsers">
    <?php
  $sql = "SELECT favO FROM js2";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
         echo "<option value='". $row["favO"]. "'>";
     }

  ?>
  </datalist>
  <input type="submit" onClick="window.location.reload()">
</form>


<?php
$v1 = $_POST["browsers"];
echo $v1;
$sql = "INSERT INTO js2 (favO)
VALUES ('$v1')";
 $result = $conn->query($sql);
 
?>

</body>
</html>
