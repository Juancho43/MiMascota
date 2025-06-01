<?php
require("../../config/config.php");
if(isset($_POST["publicacion"])){
    $sql = "DELETE FROM foros WHERE idforo = ?";
    if($stmt = mysqli_prepare($link,$sql))
    {
        $foro_id = $_POST["idforo"];   
        mysqli_stmt_bind_param($stmt, "i", $foro_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
    header("Location: ../../libretas/index.php");
    
}

?>