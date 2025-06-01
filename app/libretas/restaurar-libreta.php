<?php 
require("../config/config.php"); 
$id = $_GET["id"];
?>
<!DOCTYPE html>
<html lang="es">
<?php require("../include/_head.php")?>
<link rel="stylesheet" href="../css/formulario.css">
<body>
    <?php require("../include/_header.php")?>
    <main>
        <form action="./controlador/restaurar.php" method="post">
            <a href='index.php'>Volver</a>  
            <label for="restaurar">¿Seguro que quiere restaurar esta libreta?</label>
            <input type="hidden" name="idlibreta" value='<?php echo $id; ?>'>
            <input type="submit" name="libreta" id="libreta" value="Restaurar">
        </form>
        
    </main>
    
</body>
</html>