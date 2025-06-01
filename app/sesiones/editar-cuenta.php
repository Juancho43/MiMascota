<!-- Hacer un cambiar contraseña, ver token, cambiar foto de usuario, cambiar nombre, cambiar tell, cambiar ubicacion -->
<?php
require("../config/config.php");
$usuario_id = $_SESSION["idusuario"];
$nombre = $_SESSION["nombre"];
$sql = "SELECT u.tell,u.notificar,u.ubicacion
FROM usuarios u
WHERE u.idusuario = '$usuario_id'
";
$query = mysqli_query($link,$sql);
$results = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="es">
<?php require("../include/_head.php")?>
<link rel="stylesheet" href="../css/formulario.css">
<body>
<?php require("../include/_header.php")?>
<main >
    <form method="POST" action="./controlador/editar.php">
    <a href='index.php' class="Volver">Volver</a>
    <legend>Editar cuenta</legend>
        <fieldset>	
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" required maxlength="30" value="<?= $nombre;?>">
            <label for="tell">Télefono</label>
            <input type="text" name="tell" id="tell" placeholder="Tu télefono" value = "<?= $results["tell"] ?>" > 
            <label for="notificar">Notificar</label>
            <select name="notificar" id="notificar">
                <option value="y">Sí</option>
                <option value="n">No</option>
            </select>
            <label for="provincia">*Provincia</label>
            <select name="provincia" id="provincia" onchange="city(this.value);" required>
                <?php
                $sql = "SELECT * FROM provincias";
                $query = mysqli_query($link,$sql);
                while($rows = mysqli_fetch_assoc($query))
                {
                    echo "<option value='$rows[id]'>$rows[provincia]</option>";
                }
                ?>
            </select>
            <label for="localidad">*Localidad</label>
            <select name="localidad" id="localidad" required>
            </select>
        </fieldset>	
        <input type="submit" name="cuenta" value="Editar">
    </form>
    
</main>
<script>
    document.ready = document.getElementById("notificar").value = '<?= $results["notificar"]?>';
    
    function city(id)
    {
        if (id == "") 
        {
        return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() 
            {
                if (this.readyState == 4 && this.status == 200) 
                {
                    document.getElementById("localidad").innerHTML = this.responseText;
                    console.log(this.responseText);
                }
            }
            xmlhttp.open("GET","./controlador/ciudades.php?id="+id,true);
            xmlhttp.send();
            console.log(this.responseText);
        }
    }
    let element = document.getElementById("provincia");
    let value = document.getElementById("provincia").value;
    element.onload = city(value);
    let element2 = document.getElementById("localidad");
    element2.onfocus = element2.value = '<?= $results["ubicacion"]?>';
</script>
</body>
</html>