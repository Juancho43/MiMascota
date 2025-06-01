<!DOCTYPE html>
<html lang="es-AR">
<head>
    <meta name="google-site-verification" content="mzi64XvuOi4lUjawRAiLnKb_fGuJZ7iG4PbkmrsE3Vs" >
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Mi mascota</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="keywords" content="Mascotas, Mi mascota,Foro, Libretas">
    <meta name="description" content="Página web hecha para lucho 2021">
    <meta name="author" content="Juan Bravo">
</head>
<body>
<?php     
  session_start();
  
  if($_SESSION["login"]){
    header("Location: ./app/libretas/");
  }else{
    $_SESSION["login"]=false;
    header("Location: ./app/sesiones/ingresar.php");
  }
  
?>
    
</body>
</html>