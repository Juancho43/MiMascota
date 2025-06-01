<?php
    require("../config/config.php");
    $idf = $_GET["idf"];
    $foro = $_GET["f"];
    
    $sql = "SELECT f.estado, f.nota
    FROM foros f    
    WHERE f.foro = '$foro' and f.idforo = $idf";

    $query = mysqli_query($link,$sql);
    $rows = mysqli_fetch_assoc($query);
    
?>

<!DOCTYPE html>
<html lang="en">
<?php require("../include/_head.php")?>
<link rel="stylesheet" href="../css/formulario.css">
<body>
<?php require("../include/_header.php")?>
    <main>
        <form action="./controlador/editar.php" method="post">
            <a href='../foros/ver-publicacion.php?idf=<?= $idf?>&f=<?= $foro?>'>Volver</a>    
            <legend>Editar publicación</legend>
            <fieldset>
                <label for="estado">*Estado</label>
                <input type="text" name="estado" id="estado" required  value=<?=$rows["estado"] ?>>
                <label for="nota">*Nota</label>
                <textarea name="nota" id="nota" cols="30" rows="10" maxlength="250" required> <?=$rows["nota"] ?></textarea>
                <input type="hidden" name="idforo" value=<?= $idf;?>>
                <input type="hidden" name="f" value=<?= $foro;?>>
                <input type="submit" name="publicacion" value="Editar publicación">
            </fieldset> 
            <p class='alerta'>* Los campos son obligatorios.</p>
        </form>
    </main>
</body>
</html>