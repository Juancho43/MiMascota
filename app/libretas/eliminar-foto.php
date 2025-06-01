<?php 
require("../config/config.php");
$id = $_GET["id"];
$sql = "SELECT ruta FROM fotos where fotoid=$id";
$query = mysqli_query($link,$sql);
$result = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="../css/formulario.css">
<?php require("../include/_head.php");?>
<body>
    <?php require("../include/_header.php");?>
    <main>
        <form method="post" action="./controlador/eliminar.php">
        <a href='ver-libreta.php?id=<?= $id?>'>Volver</a>   
            <label for="foto">¿Seguro que quiere sacar esta foto?</label>
            <img src="<?= $result['ruta']?>" alt="Foto libreta">
            <input type="hidden" name="ruta" value='<?= $result['ruta']?>'>
            <input type="hidden" name="fotoid" value='<?= $id; ?>'>
            <input type="submit" name="foto" id="foto" value="Eliminar">
        </form>  
    </main>
</body>
</html>