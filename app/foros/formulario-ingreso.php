<?php
    require("../config/config.php"); 
    $libreta_id = $_GET["id"];
    $foro = $_GET["foro"];
    $localidad_id = $_GET["idl"];
    
?>

<!DOCTYPE html>
<html lang="en">
<?php require("../include/_head.php")?>
<link rel="stylesheet" href="../css/formulario.css">
<body>
<?php require("../include/_header.php")?>
    <main>
        <form action="./controlador/ingreso.php" method="post" enctype="multipart/form-data">
            <a href='../libretas/ver-libreta.php?id=<?= $libreta_id?>'>Volver</a>    
            <legend>Ingreso al foro <?= $foro?></legend>
            <fieldset>
                <label for="estado">*Estado</label>
                <input type="text" name="estado" id="estado" required placeholder="Buscando...">
                <label for="nota">*Nota</label>
                <textarea name="nota" id="nota" cols="30" rows="10" maxlength="250" required placeholder="Busco a pepe,Pepe busca pareja,Pepe busca hogar..."></textarea>
                
                <input type="hidden" name="idlocalidad" value=<?= $localidad_id;?>>
                <input type="hidden" name="idlibreta" value=<?= $libreta_id;?>>
                <input type="hidden" name="foro" value=<?= $foro;?>>
                <input type="submit" name="ingreso" value="Ingresar al foro.">
            </fieldset> 
            <p class='alerta'>* Los campos son obligatorios.</p>
        </form>
    </main>
</body>
</html>