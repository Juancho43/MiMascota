<?php 
require("../config/config.php"); 
    $id = $_SESSION["idusuario"];
    $libreta_id = $_GET["id"];
    $sql = "SELECT f.idanimal, l.nombre,l.nacimiento,l.especie,l.sexo,l.raza,f.idlibreta
    from libretas f 
    INNER JOIN animales l on(f.idanimal=l.idanimal)
    where f.idlibreta = $libreta_id and f.idusuario = $id";
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
            <legend>Editar libreta</legend>
            <fieldset>
                <label for="nombre">Nombre de la mascota</label>
                <input type="text" name="nombre" id="nombre" maxlength="30" value="<?= $results["nombre"]?>">
                <label for="sexo">Sexo</label>
                <select name="sexo" id="sexo">
                    <option value="m">Macho</option>
                    <option value="h">Hembra</option>
                </select>
                <script>
                     document.ready = document.getElementById("sexo").value = '<?= $results["sexo"]?>';
                </script>
                <label for="fecha-nac">Fecha de Nacimiento</label>
                <input type="date" name="fecha-nac" id="fecha-nac" value="<?= $results["nacimiento"]?>">
                <label for="especie">Especie</label>
                <input type="especie" name="especie" id="especie"  maxlength="10" value="<?= $results["especie"]?>">
                <label for="raza">Raza</label>
                <input type="text" name="raza" id="raza" che maxlength="20" value="<?= $results["raza"]?>">
                <input type="hidden" name="idanimal" value="<?= $results['idanimal']?>">
                <input type="hidden" name="idlibreta" value="<?= $results['idlibreta']?>">
                <input type="submit" name="libreta" value="Editar mascota">
            </fieldset> 
        </form>
    </main>
</body>
</html>