<?php 
require("../config/config.php");
    $id = $_GET["id"];
    $n = $_GET["n"];
?>
<!DOCTYPE html>
<html lang="es">
<?php require("../include/_head.php")?>
<body>
<?php require("../include/_header.php")?>
<link rel="stylesheet" href="../css/formulario.css">
    <main>
        <form action="./controlador/cargar.php" method="post" enctype="multipart/form-data">
        <a href='ver-libreta.php?id=<?= $id?>'>Volver</a>   
            <legend>Nueva foto</legend>
            <fieldset>
                <label for="foto">*Foto</label>
                <input type="file" name="foto" id="foto">
                <input type="hidden" name="fotoid" value=<?= $id;?>>
                <input type="hidden" name="nombre" value=<?= $n;?>>
                <input type="submit" name="foto" value="Cargar foto">
            </fieldset> 
            <p class='alerta'>* Los campos son obligatorios.</p>
        </form>
    </main>
</body>
</html>