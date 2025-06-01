<?php
require("../../config/config.php");

$ok = false;
$today = date("Y-n-j");
$time =  date("G:i:s");
if(isset($_POST["libreta"]))
{
    
    //Subo al animal
    $sql = "INSERT INTO animales(nombre,nacimiento,especie,sexo,raza,borrado) VALUES (?,?,?,?,?,?)";
    if($stmt = mysqli_prepare($link,$sql))
    {
        $nombre = $_POST["nombre"];
        $sexo = $_POST["sexo"];
        $nacimiento = $_POST["fecha-nac"];
        $especie = $_POST["especie"];
        $raza = $_POST["raza"];
        $borrado = "n";
        mysqli_stmt_bind_param($stmt, "ssssss", $nombre,$nacimiento,$especie,$sexo,$raza, $borrado);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        
    }

    // Subo la libreta
    $animal_id = mysqli_insert_id($link);
    $sql= "INSERT INTO libretas (idusuario,idanimal,creacion,borrado)VALUES(?,?,?,?)";
    if($stmt = mysqli_prepare($link,$sql))
    {
        $user_id = $_SESSION["idusuario"];
        $creacion = $today;
        $borrado = "n";
        mysqli_stmt_bind_param($stmt,'iiss',$user_id,$animal_id,$creacion,$borrado);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);    
    }
    
    mysqli_close($link);
    

}

if(isset($_POST["registro"]))
{
    $sql = "INSERT INTO registros(idlibreta, fecha, evento, descripcion, proxevento, notificado,borrado) VALUES (?,?,?,?,?,?,?)";
    if($stmt = mysqli_prepare($link,$sql)){
        $libreta_id = $_POST["idlibreta"];
        $fecha = $_POST["fecha"];
        $evento = $_POST["evento"];
        $descripcion = $_POST["descripcion"];
        $proxevento = $_POST["proximo"];
        $borrado = 'n'; 
        mysqli_stmt_bind_param($stmt, "issssss", $libreta_id,$fecha,$evento,$descripcion,$proxevento,$borrado, $borrado);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
    
}


if(isset($_POST["foto"]))
{
    
    if($_FILES['foto']['name'] !== "")
    {
        
        $sql = "INSERT INTO fotos(ruta,descripcion,creacion,fotoid,fototipo)VALUES(?,?,?,?,?)";
        if($stmt = mysqli_prepare($link,$sql))
        {            
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
            $animal_id = $_POST["fotoid"];
            $dirname = "img/".$_POST["nombre"] ."_$animal_id/";
            $nombre = "foto_libreta." . $extension;
            $ruta = $dirname.$nombre;
            $name = "../" . $dirname;
            $rute = $name.$nombre;   
            if (!file_exists($name)) 
            {
                mkdir($name);
            }
            $descripcion = "Foto de ".$_POST['nombre'].".";
            $creacion = date("Y-n-j h:i:s");
            $fotoid = $_POST["fotoid"];
            $fototipo = "libretas";
            
            if(move_uploaded_file($_FILES["foto"]["tmp_name"], $rute)) 
            {
                mysqli_stmt_bind_param($stmt,'sssis',$ruta,$descripcion,$creacion,$fotoid,$fototipo);
                mysqli_stmt_execute($stmt);    
            } else {
                echo "No subió el archivo";
            }
            
            mysqli_stmt_close($stmt);    
            mysqli_close($link);
            
        }

    }
    
}

    
    header("Location: ../index.php");



?>