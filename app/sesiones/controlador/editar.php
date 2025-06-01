<?php
require("../../config/config.php");

if(isset($_POST["cuenta"]))
{
    
    $sql = "UPDATE usuarios SET nombre = ?, tell = ?, ubicacion = ?, notificar = ? WHERE idusuario = ?";
    if($stmt = mysqli_prepare($link,$sql))
    {
        $nombre = $_POST["nombre"];
        $tell = $_POST["tell"];
        $ubicacion = $_POST["ubicacion"];
        $notificar = $_POST["notificar"];
        $usuario_id = $_SESSION["id"];
        mysqli_stmt_bind_param($stmt, "ssisi", $nombre,$tell,$ubicacion,$notificar,$usuario_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: https://mimascota.tk/app/sesiones/");    
        
    }
}

?>