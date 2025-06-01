<?php
require($_SERVER['DOCUMENT_ROOT']."/config.php");
var_dump($_GET);

$sql = "INSERT INTO foros(idlibreta,foro,estado,nota,creacion,borrado) VALUES (?,?,?,?,?,?)";

?>
