<?php
require("../../config/config.php");

$ok = false;
$id = 0;
if(isset($_POST["libreta"])){
    $sql = "UPDATE animales SET nombre = ?,nacimiento = ?, especie = ?, sexo= ?, raza= ? WHERE idanimal = ?";
    if($stmt = mysqli_prepare($link,$sql)){
        $nombre = $_POST["nombre"];
        $sexo = $_POST["sexo"];
        $nacimiento = $_POST["fecha-nac"];
        $especie = $_POST["especie"];
        $raza = $_POST["raza"];
        $animal_id = $_POST["idanimal"];
        $id = $_POST["idlibreta"];

        mysqli_stmt_bind_param($stmt, "sssssi", $nombre,$nacimiento,$especie,$sexo,$raza, $animal_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $respuesta = "Se ha editado correctamente.";
    $ok = true;
}

if(isset($_POST["registro"])){
    $sql = "UPDATE registros SET fecha = ?, evento = ?, descripcion = ?, proxevento= ? WHERE idregistro = ?";
    if($stmt = mysqli_prepare($link,$sql)){
        $fecha = $_POST["fecha"];
        $evento = $_POST["evento"];
        $descripcion = $_POST["descripcion"];
        $proxevento = $_POST["proximo"];
        $registro_id = $_POST["idregistro"];
        $id = $_POST["idlibreta"];
        mysqli_stmt_bind_param($stmt, "ssssi", $fecha, $evento, $descripcion, $proxevento, $registro_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    $respuesta = "Se ha editado correctamente el registro.";
    $ok = true;
}

if(isset($_POST["foto"]))
{
    $id = $_POST["fotoid"];
    $sql = "SELECT ruta FROM fotos where fotoid=$id";
    $query = mysqli_query($link,$sql);
    $result = mysqli_fetch_assoc($query);
    $ruta = "../".$result["ruta"];
    unlink($ruta);
    
        $extension = "";
        switch ($_FILES['foto']['type']) 
        {
            case 'image/gif': $extension = 'gif'; break;
            case 'image/png': $extension = 'png'; break;
            case 'image/jpg': $extension = 'jpg'; break;
            case 'image/bmp': $extension = 'bmp'; break;
            case 'image/jpeg': $extension = 'jpeg'; break;
            default: echo "Archivo no soportado";
        }

        
        $dirname = "img/".$_POST["nombre"] ."_$id/";
        $nombre = "foto_libreta." . $extension;
        $ruta = $dirname.$nombre;
        $name = "../" . $dirname;
        $rute = $name.$nombre;   
        
        $creacion = date("Y-n-j h:i:s");
        
        if(move_uploaded_file($_FILES["foto"]["tmp_name"], $rute)) 
        {
            $sql = "UPDATE fotos SET ruta = '$ruta' ,creacion = '$creacion' WHERE fotoid = $id ";
            $query = mysqli_query($link,$sql);
         
            $respuesta = "Se ha cambiado la foto exitosamente.";
            $ok = true;
        }
}

if($ok){
    
    $_SESSION["response"] = $respuesta;
    $_SESSION["response-type"] = true;
    mysqli_close($link);
    header("Location: ../ver-libreta.php?id=$id");
}else{
    $_SESSION["response"] = "Ha ocurrido un error";
    $_SESSION["response-type"] = false;
    header("Location: ../index.php");
}

?>