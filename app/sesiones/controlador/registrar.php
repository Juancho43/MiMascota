<?php
include_once("../../config/config.php");
include_once("../../config/class.phpmailer.php");
include_once("../../config/class.smtp.php");

//Entro al formulario a procesar los datos.
if(isset($_POST["login"]))
{
    $error = false;
    //Declaro las variables a utilizar.
    $mail = $_POST["mail"];
    $clave = $_POST["clave"];
    $clave2 = $_POST["clavedos"]; 
    
    //Verifico que las contraseñas sean iguales.
    if($clave === $clave2)
    {
        $clave = password_hash($clave,PASSWORD_DEFAULT);
    }else{
        $mensaje = "Las contraseñas no son las mismas.";
        $error = true;
        echo $mensaje;
        // header("Location: ../formulario-registro.php?m=1");
    }

    //Verifico si ya se encuentra registrado el mail.
    $sql = "SELECT nombre FROM usuarios WHERE mail = '$mail'";
    $query = mysqli_query($link,$sql);
    $si = mysqli_num_rows($query);
    if($si) 
    {
        $mensaje = "El mail ingresado ya se encuentra registrado.";
        $error = true;
        echo $mensaje;
        // header("Location: ../formulario-registro.php?m=2");
    }
    
    $token = bin2hex(random_bytes(4));
    //Ejecuto el sql para que se cargue el usuario.
    if(!$error)
    {
        $sql = "INSERT INTO usuarios(nombre,clave,mail,tell,ubicacion,tipo,estado,token,notificar)VALUES(?,?,?,?,?,?,?,?,?)";
        if($stmt = mysqli_prepare($link,$sql))
        {
            $nombre = $_POST["nombre"];
            $tell = $_POST["tell"];
            $ubicacion = $_POST["localidad"];
            $tipo = "usuario";
            $estado = "pendiente";
            $notificar = "y";
            mysqli_stmt_bind_param($stmt, "sssssssss", $nombre, $clave, $mail, $tell, $ubicacion,$tipo,$estado,$token,$notificar);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        $emailDestino = $mail;
        $mensaje = "Hola! Nos alegra que te hayas registrado en Mi Mascota /n
            Para completar el registro vaya a  <a href='https://mimascota.cf/app/sesiones/formulario-mail.php?tokek=$token'>validar mail</a> y ponga el 
            siguiente código: <b>$token</b>.";
        
/*
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->Port = 465; 
            $mail->SMTPSecure = 'ssl';
            $mail->IsHTML(true); 
            $mail->CharSet = "utf-8";

            // Datos de la cuenta de correo utilizada para enviar vía SMTP
            $smtpHost = "c2320290.ferozo.com";  // Dominio alternativo brindado en el email de alta 
            $smtpUsuario = "soporte@mimascota.tk";  // Mi cuenta de correo
            $smtpClave = "Mascotas136";  // Mi contraseña
            // VALORES A MODIFICAR //
            $mail->Host = $smtpHost; 
            $mail->Username = $smtpUsuario; 
            $mail->Password = $smtpClave;

            $mail->From = "soporte@mimascota.tk"; // Email desde donde envío el correo.
            $mail->FromName = "Mi mascota Team";
            $mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario
            $mensaje = "";
            $mail->Subject = "Validar mail"; // Este es el titulo del email.
            $mensajeHtml = nl2br($mensaje);
            $mail->Body = "{$mensajeHtml} <br />
            <div style='background:#fff;background-color:#fff;Margin:0px auto;max-width:600px;'>
            <table align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='background:#fff;background-color:#fff;width:100%;'>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <h3>Hola! Nos alegra que te hayas registrado en Mi Mascota</h3>
            <p>Para completar el registro vaya a  <a href='https://mimascota.tk/app/sesiones/formulario-mail.php?tokek=$token'>validar mail</a> y ponga el 
            siguiente código: <b>$token</b>.</p>
            <br />Mensaje enviado desde mimascota.tk<br />"; // Texto del email en formato HTML
            $mail->AltBody = "{$mensaje} \n\n Mensaje enviado desde mimascota.tk"; // Texto sin formato HTML
            // FIN - VALORES A MODIFICAR //

            $estadoEnvio = $mail->Send(); 
            */
            mysqli_close($link);
            if(mail($mail,"Validación de mail",$mensaje)){
                header("Location: ../formulario-mail.php");	
            } else {
                header("Location: ../formulario-registro.php");	
            }
    }
  
}

?>