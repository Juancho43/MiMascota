<?php
require("../../config/config.php");
$ok = false;
$borrado = 'n';
$id = 0;
if(isset($_POST["libreta"]))
{
    $sql = "UPDATE libretas SET borrado = ? WHERE idlibreta = ?";
    if($stmt = mysqli_prepare($link,$sql))
    {
        $libreta_id = $_POST["idlibreta"];        
        mysqli_stmt_bind_param($stmt, "si",$borrado ,$libreta_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $respuesta = "Se ha restaurado la libreta.";
    mysqli_close($link);
    $_SESSION["response"] = $respuesta;
    header("Location: ../index.php");
}


if(isset($_POST["registro"]))
{
    $id = $_POST["idlibreta"];
    $sql = "UPDATE registros SET borrado = ? WHERE idregistro = ?";
    if($stmt = mysqli_prepare($link,$sql))
    {
        $registro_id = $_POST["idregistro"];        
        mysqli_stmt_bind_param($stmt, "si", $borrado,$registro_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $respuesta = "Se ha restaurado el registro.";
    $ok = true;

}


if($ok){
    mysqli_close($link);
    $_SESSION["response"] = $respuesta;
    header("Location: ../ver-libreta.php?id=$id");
}else{
    $_SESSION["response"] = "Algo malo ha pasado :C";
    header("Location: ../index.php");
}

?>