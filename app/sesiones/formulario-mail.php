<?php
require("../config/config.php"); 
?>

<!DOCTYPE html>
<html lang="es">
<?php require("../include/_head.php"); ?>
<link rel="stylesheet" href="../css/formulario.css">
<body>
<?php require("../include/_header.php"); ?>
    <main>
        <form action="controlador/validar.php" method="post">
        <a href='https://mimascota.tk/app/inicio.php'>Volver inicio</a>
            <legend>Valide su mail</legend>
            <p>A su mail le llegará un correo con un código.</p>
            <fieldset>
                <label for="token">Ingrese su código:</label>
                <input type="text" name="token" id="token" maxlength="8" class="token">
                <input type="submit" name="ok" value="Validar mail">
            </fieldset>
        </form>
    </main>
</body>
</html>