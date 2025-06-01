<?php 
require("../config/config.php");
$id = $_GET["id"];
?>
<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="../css/formulario.css">
<?php require("../include/_head.php");?>
<body>
    <?php require("../include/_header.php");?>
    <main>
        <form method="post" action="./controlador/eliminar.php">
            <a href='index.php'>Volver</a>  
            <label for="libreta">¿Seguro que quiere eliminar esta libreta? <br> Se moverá a la papelera.</label>
            <input type="hidden" name="idlibreta" value='<?php echo $id; ?>'>
            <input type="submit" name="libreta" id="libreta" value="Eliminar">
        </form>  
    </main>
</body>
</html>