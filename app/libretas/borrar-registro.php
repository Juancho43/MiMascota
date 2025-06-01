<?php 
require("../config/config.php"); 
$id = $_GET["id"];
$lid = $_GET["idl"];
?>
<!DOCTYPE html>
<html lang="es">
<?php require("../include/_head.php")?>
<link rel="stylesheet" href="../css/formulario.css">
<body>
<?php require("../include/_header.php")?>
    <main>
    <form method="post" action="./controlador/borrar.php">
    <a href='ver-libreta.php?id=<?=$lid?>'>Volver</a>      
            <label for="registro">¿Seguro que quiere borrar este registro? <br> Una vez hecho no se podrá recuperar.</label>
            <input type="hidden" name="idregistro" value='<?php echo $id; ?>'>
            <input type="submit" name="registro" id="registro" value="Borrar">
        </form>  
    </main>
</body>
</html>