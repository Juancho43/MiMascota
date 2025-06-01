<?php 
require("../config/config.php"); 
$id = $_GET["id"];
$lid = $_GET["lid"];
?>
<!DOCTYPE html>
<html lang="es">
<?php require("../include/_head.php")?>
<link rel="stylesheet" href="../css/formulario.css">
<body>
    <?php require("../include/_header.php")?>
    <main>
        <form action="./controlador/restaurar.php" method="post">
        <a href='ver-libreta.php?id=<?= $lid?>'>Volver</a>   
            <label for="registro">¿Seguro que quiere restaurar este registro?</label>
            <input type="hidden" name="idregistro" value='<?php echo $id; ?>'>
            <input type="hidden" name="idlibreta" value='<?php echo $lid; ?>'>
            <input type="submit" name="registro" id="registro" value="Restaurar">
        </form>
        
    </main>
    
</body>
</html>