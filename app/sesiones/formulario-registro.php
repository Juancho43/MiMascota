<?php
include_once("../config/config.php");

?>
<!DOCTYPE html>

<html lang="es">
<?php require("../include/_head.php")?>
<link rel="stylesheet" href="../css/formulario.css">
<body>
<?php require("../include/_header.php")?>
<main >
    <form method="POST" action="./controlador/registrar.php">
    <legend>Crea una cuenta.</legend>
        <fieldset>	
            <label for="nombre">*Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Tu nombre" required maxlength="30">
            <label for="mail">*Mail</label>
            <input type="mail" name="mail" id="mail" placeholder="Tu mail" required> 
            <label for="clave">*Contraseña</label>
            <input type="password" name="clave" id="clave" placeholder="Tu contraseña" required>
            <label for="clavedos">*Repetir contraseña</label>
            <input type="password" name="clavedos" id="clavedos" placeholder="Repetir tu contraseña" required> 
            <label for="tell">Télefono</label>
            <input type="text" name="tell" id="tell" placeholder="Tu télefono"> 
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
            
            <input type="submit" name="login" value="Registrarse">
        </fieldset>	
        <fieldset class="Opciones">
            <a href='ingresar.php'>¿Ya tienes una cuenta?</a>       
        </fieldset>
        <p>Al registrarse acepta los términos y condiciones.</p>
        <a href="terminos-condiciones.pdf">Leer</a>
        <p class='alerta'>* Los campos son obligatorios.</p>
        
    </form>  
    
</main>
<script>
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
</script>

</body>
</html>