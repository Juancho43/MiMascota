<?php 
require("../config/config.php"); 
    $id = $_SESSION["idusuario"];
    $registro_id = $_GET["id"];
    $sql = "SELECT fecha,evento,descripcion,proxevento,idlibreta FROM registros WHERE idregistro = $registro_id AND borrado = 'n'";
    $query = mysqli_query($link,$sql);
    $results = mysqli_fetch_assoc($query);        
?>
<!DOCTYPE html>
<html lang="es">
<?php require("../include/_head.php")?>
<link rel="stylesheet" href="../css/formulario.css">
<body>
<?php require("../include/_header.php")?>
    <main>
        <form action="./controlador/editar.php" method="post">
            <a href='ver-libreta.php?id=<?= $results['idlibreta']?>'>Volver</a>   
            <legend>Editar registro</legend>
            <fieldset>
                <label for="nombre">Fecha</label>
                <input type="date" name="fecha" id="fecha" value ='<?= $results['fecha']?>'>
                <label for="evento">*Evento</label>
                <input type="text" name="evento" id="evento" maxlength= "50" value ='<?= $results['evento']?>'>
                <label for="descripcion">*Descripcion</label>
                <textarea name="descripcion" id="descripcion" cols="30" rows="10" maxlength="255" ><?= $results['descripcion']?></textarea>
                <label for="proximo">Proximo evento</label>
                <input type="date" name="proximo" id="proximo" value = '<?= $results['proxevento']?>'>
                <input type="hidden" name="idregistro" value="<?= $registro_id?>">
                <input type="hidden" name="idlibreta" value="<?= $results['idlibreta']?>">
                <input type="submit" name="registro" value="Editar registro">
            </fieldset> 
        </form>
    </main>
</body>
</html>