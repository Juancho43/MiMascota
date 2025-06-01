<?php
require("../../config/config.php");

if(isset($_POST["ingreso"]))
{
    $sql = "INSERT INTO foros(idlibreta,idlocalidad,foro,estado,nota,creacion,borrado) VALUES (?,?,?,?,?,?,?)";
    if($stmt = mysqli_prepare($link,$sql))
    {
        $libreta_id = $_POST["idlibreta"];
        $localidad_id = $_POST["idlocalidad"];
        $foro = $_POST["foro"];
        $estado = $_POST["estado"];
        $nota = $_POST["nota"];
        $creacion = date("Y-n-j h:i:s");
        $borrado = "n";
        mysqli_stmt_bind_param($stmt, "iisssss", $libreta_id,$localidad_id,$foro,$estado,$nota,$creacion,$borrado);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $idf = mysqli_insert_id($link);
    mysqli_close($link);
    header("Location: ../ver-publicacion.php?f=$foro&idf=$idf");
}
    
?>
