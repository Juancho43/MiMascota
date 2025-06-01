<?php
require("../../config/config.php");

$ok = false;

if(isset($_POST["libreta"])){
    $sql = "DELETE FROM animales WHERE idanimal = ?";
    if($stmt = mysqli_prepare($link,$sql))
    {
        $animal_id = $_POST["idanimal"];        
        mysqli_stmt_bind_param($stmt, "i", $animal_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    $sql = "DELETE FROM fotos WHERE fotoid = ?";
    if($stmt = mysqli_prepare($link,$sql))
    {
        $libreta_id = $_POST["idlibreta"];     
        $sql = "SELECT ruta FROM fotos where fotoid = $libreta_id";
        $query = mysqli_query($link,$sql);
        $result = mysqli_fetch_assoc($query);
        $ruta = "../".$result["ruta"];
        unlink($ruta);
        mysqli_stmt_bind_param($stmt, "i", $libreta_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $respuesta = "Se ha borrado la libreta";
    $ok = true;
}

if(isset($_POST["registro"])){
    $sql = "DELETE FROM registros WHERE idregistro = ?";
    if($stmt = mysqli_prepare($link,$sql))
    {
        $registro_id = $_POST["idregistro"];        
        mysqli_stmt_bind_param($stmt, "i", $registro_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $respuesta = "Se ha borrado el registro";
    $ok = true;
}

if($ok){
    $_SESSION["response"] = $respuesta;
    mysqli_close($link);
    header("Location: ../index.php");
}else{
    $_SESSION["response"] = "Ha ocurrido un error";
    header("Location: ../index.php");
}

?>