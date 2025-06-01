<?php 
require("../config/config.php");

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
            <label for="cuenta">¿Seguro que quiere eliminar su cuenta?</label>
            <input type="submit" name="cuenta" id="cuenta" value="Eliminar">
        </form>  
    </main>
</body>
</html>