<?php

require("../config/config.php");
$foro = $_GET["f"];
$id = $_GET["idf"];


$sql = "SELECT a.nombre,a.sexo,a.especie,a.raza,f.nota,f.estado,o.ruta,f.idforo, f.borrado, f.foro, c.localidad
FROM foros f
INNER JOIN libretas l on (f.idlibreta = l.idlibreta)
INNER JOIN animales a on (l.idanimal = a.idanimal)
INNER JOIN fotos o on (o.fotoid = l.idlibreta)
INNER JOIN localidades c on(c.id = f.idlocalidad)
WHERE f.foro = '$foro' and f.idforo = $id";

$meperdi = mysqli_query($link,$sql);
$registros = mysqli_fetch_assoc($meperdi);

?>

<link rel="stylesheet" href="../css/imprimir.css">        
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

<h1><?= $registros["foro"]?></h1>
<img src="../libretas/<?= $registros["ruta"]?>" alt="Foto">


<article>
    
    <p>Soy: <?= $registros["nombre"]?>, mi raza es: <?= $registros["raza"]?>.</p>
    
    <?php 
        if($registros["sexo"] == 'h') echo "<p>Soy hembra.</p>";
        if($registros["sexo"] == 'm') echo "<p>Soy macho.</p>";
    ?>
    
    <p>Descripción: <?= $registros["nota"]?></p>
    <!-- <p>Contacto:</p> -->
    <h5>Cartel creado en: mimascota.tk</h5>
</article>

<script>
    window.print();
</script>    
            
               
        
    
