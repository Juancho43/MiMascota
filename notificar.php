<?php
//Entrar una vez al día para ejecutar el código para mandar mail como notificaciones.

require("./app/config/config.php");
require("./app/config/class.smtp.php");
require("./app/config/class.phpmailer.php");
  
    $fecha = date('Y-m-d');
    $nextday = date("Y-m-d",strtotime ( '+5 day' , strtotime ( $fecha ) ) );
   
    $sql = "SELECT r.fecha, r.proxevento, r.evento, u.mail, r.descripcion, a.nombre , r.idregistro
    FROM registros r
    INNER JOIN libretas l on(r.idlibreta = l.idlibreta)
    INNER JOIN animales a on(a.idanimal = l.idanimal)
    INNER JOIN usuarios u on(u.idusuario = l.idusuario)
    WHERE r.proxevento >= '$fecha' AND r.proxevento <= '$nextday' AND r.notificado = 'n' AND r.borrado = 'n'";
    $query = mysqli_query($link,$sql);
       

// Datos de la cuenta de correo utilizada para enviar vía SMTP
    $smtpHost = "c2320290.ferozo.com";  // Dominio alternativo brindado en el email de alta 
    $smtpUsuario = "soporte@mimascota.tk";  // Mi cuenta de correo
    $smtpClave = "Mascotas136";  // Mi contraseña

  if(mysqli_num_rows($query)>0)
  {
    while($row = mysqli_fetch_assoc($query))
    {

      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->SMTPAuth = true;
      $mail->Port = 465; 
      $mail->SMTPSecure = 'ssl';
      $mail->IsHTML(true); 
      $mail->CharSet = "utf-8";

      // VALORES A MODIFICAR //
      $mail->Host = $smtpHost; 
      $mail->Username = $smtpUsuario; 
      $mail->Password = $smtpClave;

      $mail->From = "soporte@mimascota.tk"; // Email desde donde envío el correo.
      $mail->FromName = "Mi mascota";
      $emailDestino = "$row[mail]";
      $mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos el correo.

      $mail->Subject = "Aviso"; // Este es el titulo del email.
      $mensaje ="Te recordamos que el día: ".fecha($row["proxevento"])." <br /> Tenés el evento: $row[evento] $row[descripcion]  de $row[nombre]. <br />";
      $mensajeHtml = nl2br($mensaje);
      $mail->Body = "{$mensajeHtml} <br /><br />
      Mensaje enviado desde mimascota.tk
      <br />"; // Texto del email en formato HTML
      $mail->AltBody = "{$mensaje} \n\n Mensaje enviado desde mimascota.tk"; // Texto sin formato HTML
      // FIN - VALORES A MODIFICAR //

      $estadoEnvio = $mail->Send(); 
      if($estadoEnvio)
      {
          echo "<p>El correo fue enviado correctamente a $row[mail]</p> <br>";
          $sql = "UPDATE registros SET notificado = 'y' WHERE idregistro = $row[idregistro] ";
          mysqli_query($link,$sql);
          
      } else {
          echo "<p class='error'>Ocurrió un error inesperado con $row[mail]. </p><br>";
      }


    }
  }else
  {
    echo "<p>No hay nada que notificar C:</p>";
  }
    
?>

<link rel="stylesheet" href="./app/css/main.css">