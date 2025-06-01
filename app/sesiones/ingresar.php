<?php
include_once("../config/config.php");
if($_SESSION["login"]){
    header("Location: https://mimascota.cf/app/inicio.php");
}
//Entro al formulario.
if(isset($_POST["login"]))
{
    
    //Declaro variables a utilizar.
    $mail = $_POST["mail"];
    $password = $_POST["password"];
    //Selecciono datos de la bd donde esté ese mail.
    $sql = "SELECT idusuario,nombre,clave from usuarios WHERE mail='$mail' AND estado = 'aprobado'";
    $query = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($query);
    $clave = $row["clave"];
    //Verifico la contraseña ya que esta se encuentra encriptada.
    if($pass = password_verify($password,$clave))
    {
        //Establezco variables en session.
        
        $_SESSION["login"] = true;
        $_SESSION["idusuario"] = $row["idusuario"];
        $_SESSION["nombre"] = $row["nombre"];
          
        
        header("location: ../libretas/index.php");
    }
}

?>


<!DOCTYPE html>
<html lang="es">
<?php require("../include/_head.php")?>
<link rel="stylesheet" href="../css/formulario.css">
<body>
<?php require("../include/_header.php")?>
    <main>
        <form method="post">
        <legend>Iniciar sesión en Mi Mascota</legend>
            <fieldset class="Main">
                
                
                <input type="text" name="mail" id="mail" placeholder="Mail">
                <div class="contrasenia">
                    <input type="password" name="password" id="password" placeholder="Contraseña">
                    <span class="material-icons" onclick="mostrarContrasena();" id="ojo">
                        visibility
                    </span>
                </div>
                <input type="submit" value="Iniciar sesión" name="login">    
            </fieldset>
            <fieldset class="Opciones">
                <a href='formulario-registro.php'>Registrarse</a>    
                <a href='recuperar-contrasenia.php'>¿Olvidaste tu contraseña?</a>
            </fieldset>
            
          
        </form>
        
    </main>

    <script>
    function mostrarContrasena()
    {
        let tipo = document.getElementById("password");
        let ojo = document.getElementById("ojo");
        if(tipo.type == "password"){
            tipo.type = "text";
            ojo.innerText = "visibility_off";
        }else{
            tipo.type = "password";
            ojo.innerText = "visibility";
        }
    }
    </script>    

</body>
</html>
