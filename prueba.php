<?php

ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "contacto@mimascota.tk";
$to = "yoelalonsosk8er@gmail.com";
$subject = "Checking PHP mail";
$message = "
   <html>
   <head>
       <title>This is a test HTML email</title>
   </head>
   <body>
       <p>Ando joya</p>
   </body>
   </html>
   ";
$headers = "From:" . $from;
if(mail($to,$subject,$message, $headers)) {
    echo "The email message was sent.";
} else {
    echo "The email message was not sent.";
}
?>