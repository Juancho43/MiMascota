<?php 
require("../config/config.php");
$id = $_GET["id"];
$lid = $_GET["lid"];
?>
<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="../css/formulario.css">
<?php require("../include/_head.php");?>
<body>
    <?php require("../include/_header.php");?>
    <main>
        <form method="post" action="./controlador/eliminar.php">
        <a href='ver-libreta.php?id=<?= $lid?>'>Volver</a>   
            <label for="registro">¿Seguro que quiere eliminar este registro? <br> Se moverá a la papelera.</label>
            <input type="hidden" name="idregistro" value='<?php echo $id; ?>'>
            <input type="hidden" name="idlibreta" value='<?php echo $lid; ?>'>
            <input type="submit" name="registro" id="registro" value="Eliminar">
        </form>  
    </main>
</body>
</html>