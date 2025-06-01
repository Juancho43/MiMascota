<?php
require("../../config/config.php");

if(isset($_POST["cuenta"]))
{
    $sql = "DELETE FROM usuarios WHERE idusuario = ?";
    if($stmt = mysqli_prepare($link,$sql))
    {
        $usuario_id = $_SESSION["idusuario"];
        mysqli_stmt_bind_param($stmt, "i",$usuario_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        session_destroy();
        header("Location: https://mimascota.tk/");    
    }
}

?>