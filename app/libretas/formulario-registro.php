<?php 
require("../config/config.php"); 
$id = $_GET["id"];
?>
<!DOCTYPE html>
<html lang="es">
<?php require("../include/_head.php"); ?>
<body>
<?php require("../include/_header.php");?>
<link rel="stylesheet" href="../css/formulario.css">
    <main>
        <form action="./controlador/cargar.php" method="post">
            <a href='ver-libreta.php?id=<?= $id?>'>Volver</a>    
            <legend>Nuevo registro</legend>
            <fieldset>
                <label for="fecha">*Fecha</label>
                <input type="date" name="fecha" id="fecha" required>
                <label for="evento">*Evento</label>
                <input type="text" name="evento" id="evento" required maxlength= "50" placeholder="Ejemplo: desparacitación.">
                <label for="descripcion">*Descripcion</label>
                <textarea name="descripcion" id="descripcion" cols="30" rows="10" maxlength="255" placeholder="Ejemplo: Peso:20kg."></textarea>
                <label for="proximo">Proximo evento</label>
                <input type="date" name="proximo" id="proximo">
                <input type="hidden" name="idlibreta" value=<?php echo $id;?>>
                <input type="submit" name="registro" value="Cargar registro">
            </fieldset> 
            <p class='alerta'>* Los campos son obligatorios.</p>
        </form>
    </main>
    
</body>
</html>