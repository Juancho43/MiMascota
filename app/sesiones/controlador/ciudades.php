<?php
include_once("../../config/config.php");

$id = intval($_GET['id']);
$sql = "SELECT * FROM localidades WHERE id_provincia = $id";
$result = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($result)) {
  echo "<option value='$row[id]'>";
  echo $row['localidad'];
  echo "</option>";
}

mysqli_close($link);
?>