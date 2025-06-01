<?php
require("../config/config.php");

if(isset($_POST["logout"]))
{
    session_unset();
    header("location: https://mimascota.cf/");	
}    

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php require("../include/_head.php");?>
    <link rel="stylesheet" href="../css/formulario.css">
</head>
<body>
    <?php require("../include/_header.php");?>
    <main>
        <form method="post">
        <a href="https://mimascota.tk/app/inicio.php">Volver</a>
        <fieldset> 
            <legend>Cerrar sesión</legend> 
			<label for='logout'>¿Está seguro de cerrar sesión <?= $_SESSION["nombre"] ?>?</label>			
			<input type="submit" name="logout" value="Cerrar sesión">
			
        </fieldset>
		</form>
    </main>    
</body>
</html>