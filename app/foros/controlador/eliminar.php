<?php
require("../../config/config.php");
$ok = false;
$borrado = 'y';

if(isset($_POST["publicacion"]))
{
    $sql = "UPDATE foros SET borrado = ? WHERE idforo = ?";
    if($stmt = mysqli_prepare($link,$sql))
    {
        $foro_id = $_POST["idforo"];        
        
        mysqli_stmt_bind_param($stmt, "si", $borrado ,$foro_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $respuesta = "Se ha eliminado la publicación.";
    mysqli_close($link);
    $_SESSION["response"] = $respuesta;
    $id = $_POST["idlibreta"];
    header("Location: ../../libretas/ver-libreta.php?id=$id");
    
}
?>