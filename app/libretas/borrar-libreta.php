<?php 
require("../config/config.php"); 
$id = $_GET["ida"];
$idl = $_GET["idl"];
?>
<!DOCTYPE html>
<html lang="es">
<?php require("../include/_head.php")?>
<link rel="stylesheet" href="../css/formulario.css">
<body>
<?php require("../include/_header.php")?>
    <main>
    <form method="post" action="./controlador/borrar.php">
        <a href='ver-libreta.php?id=<?= $id?>'>Volver</a>   
            <label for="libreta">¿Seguro que quiere borrar definitivamente esta libreta? <br> Toda la información asociada se eliminará.</label>
            <input type="hidden" name="idanimal" value='<?php echo $id; ?>'>
            <input type="hidden" name="idlibreta" value='<?php echo $idl; ?>'>
            <input type="submit" name="libreta" id="libreta" value="Borrar">
        </form>  
    </main>
</body>
</html>