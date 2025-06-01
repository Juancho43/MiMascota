<?php
require("../../config/config.php");


if(isset($_POST["publicacion"]))
{
    $foro_id = $_POST["idforo"];
        $foro = $_POST["f"];
    $sql = "UPDATE foros SET estado = ?,nota = ? WHERE idforo = ?";
    if($stmt = mysqli_prepare($link,$sql))
    {
        $nota = $_POST["nota"];
        $estado = $_POST["estado"];
        
        
        mysqli_stmt_bind_param($stmt, "ssi", $estado,$nota,$foro_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    header("Location: ../ver-publicacion.php?idf=$foro_id&f=$foro");
}



?>