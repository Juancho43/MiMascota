<?php
require("../../config/config.php");

if(isset($_POST["ok"]))
{
    
    $sql = "SELECT idusuario,nombre,mail,token FROM usuarios WHERE token = ?";
    if($stmt = mysqli_prepare($link,$sql))
    {
        $token = $_POST["token"];        
        mysqli_stmt_bind_param($stmt, "s", $token);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $sql = "UPDATE usuarios SET estado = ? WHERE token = ?";
        if($stmt = mysqli_prepare($link,$sql))
        {
            $estado = "aprobado";
            mysqli_stmt_bind_param($stmt, "ss", $estado, $token);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            session_unset();
        
            header("Location: https://mimascota.tk/app/inicio.php");    
        }
        
    }else{
        header("Location: ../formulario-mail.php");
    }   
    

    
}

?>