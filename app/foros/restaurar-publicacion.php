<?php 
require("../config/config.php");
$idf = $_GET["idf"];
$foro = $_GET["f"];
?>
<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="../css/formulario.css">
<?php require("../include/_head.php");?>
<body>
    <?php require("../include/_header.php");?>
    <main>
        <form method="post" action="./controlador/restaurar.php">
            <a href='../foros/ver-publicacion.php?idf=<?= $idf?>&f=<?= $foro?>'>Volver</a>    
            <label for="publicacion">¿Seguro que quiere restaurar esta publicación? <br> Volverá a ser visible el foro.</label>
            <input type="hidden" name="idforo" value='<?= $idf; ?>'>
            <input type="hidden" name="foro" value='<?= $foro; ?>'>
            <input type="submit" name="publicacion" id="publicacion" value="Restaurar">
        </form>  
    </main>
</body>
</html>