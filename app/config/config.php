<?php
define("BASE_DIR", "app");
//Conexion BD
define('Server','localhost');
define('User','root');
define('Password','');
define('DB','mascotas');

$link = mysqli_connect(Server,User,Password,DB);

if($link === false){
    die("Error: no se pudo conectar por: " . mysqli_connect_error());
}
date_default_timezone_set("America/Argentina/Ushuaia");
mysqli_set_charset($link, "utf8");



function fecha($fecha){
    $anio = substr($fecha, 0, 4);
    $mes = intval(substr($fecha, 5, 2));
    $dia = substr($fecha, 8, 2);
    $meses = array("troll","enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
    $texto = "$dia de $meses[$mes] del $anio";
    return $texto;
}



//Sesiones
session_start();

// $_SESSION["online"] = true;
// $_SESSION["login"] = 1;
// $_SESSION["nombre"] = "Juan";
// $_SESSION["mail"] = "bravojuan43@gmail.com";
// $_SESSION["idusuario"] = 23;
// if($_SESSION["login"] == 1){
    


?>