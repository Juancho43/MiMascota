<?php 
require("../config/config.php");
$idf = $_GET["idf"];
$foro = $_GET["f"];
$idl = $_GET["idl"];
?>
<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="../css/formulario.css">
<?php require("../include/_head.php");?>
<body>
    <?php require("../include/_header.php");?>
    <main>
        <form method="post" action="./controlador/eliminar.php">
            <a href='../foros/ver-publicacion.php?idf=<?= $idf?>&f=<?= $foro?>'>Volver</a>    
            <label for="publicacion">¿Seguro que quiere eliminar esta publicación? <br> No aparecerá en el foro.</label>
            <input type="hidden" name="idlibreta" value='<?= $idl; ?>'>
            <input type="hidden" name="idforo" value='<?= $idf; ?>'>
            <input type="submit" name="publicacion" id="publicacion" value="Eliminar">
        </form>  
    </main>
</body>
</html>