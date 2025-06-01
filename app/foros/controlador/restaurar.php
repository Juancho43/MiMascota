<?php
require("../../config/config.php");
$ok = false;
$borrado = 'n';

if(isset($_POST["publicacion"]))
{
    $foro = $_POST["foro"];
    $sql = "UPDATE foros SET borrado = ? WHERE idforo = ?";
    if($stmt = mysqli_prepare($link,$sql))
    {
        $foro_id = $_POST["idforo"];        
        
        mysqli_stmt_bind_param($stmt, "si", $borrado ,$foro_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($link);
    
    
    header("Location: ../ver-publicacion.php?idf=$foro_id&f=$foro");
    
}
?>