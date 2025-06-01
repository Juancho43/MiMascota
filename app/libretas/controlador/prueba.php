<?php

// unlink("../img/Cody_63/foto_libreta.jpeg");
$dir = opendir("../img/Cody_63/");

$contador = 0;
while (($archivo = readdir($dir)) !== false) 
{
    if ($archivo != "." && $archivo != "..") {
    echo $archivo."<br>";
    $contador++;
    }


}
echo $contador;


?>