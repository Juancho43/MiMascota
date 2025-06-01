<?php

require("../config/config.php");
$foro = $_GET["f"];
$id = $_GET["idf"];


$sql = "SELECT a.nombre,a.sexo,a.especie,a.raza,f.nota,f.estado,o.ruta,f.idforo, f.borrado, f.foro, c.localidad, c.id, l.idlibreta,f.creacion,u.mail,u.tell
FROM foros f
INNER JOIN libretas l on (f.idlibreta = l.idlibreta)
INNER JOIN animales a on (l.idanimal = a.idanimal)
INNER JOIN fotos o on (o.fotoid = l.idlibreta)
INNER JOIN localidades c on(c.id = f.idlocalidad)
INNER JOIN usuarios u on (u.idusuario = l.idusuario)
WHERE f.foro = '$foro' and f.idforo = $id";

$meperdi = mysqli_query($link,$sql);
$registros = mysqli_fetch_assoc($meperdi);

?>


<!DOCTYPE html>
<html lang="es">
<?php require("../include/_head.php");?>
<link rel="stylesheet" href="../css/publicacion.css">
<body>
<?php require("../include/_header.php");?>
    <main>
        <section>
            <div>
                <a href="<?= $registros["foro"] ?>.php?idl=<?=$registros["id"] ?>">Volver</a>
            </div>
            <div>
                <h2>Publicación en foro: <?= $registros["foro"]?></h2>
                <p><?= fecha($registros["creacion"]); ?></p>
                <?php 
                    if($registros["borrado"] == "y")
                    {
                        echo "<p>Eliminado</p>";
                    }else{
                        echo "<p>Publicado</p>";
                    }
                ?>
                
            </div>
            <div>
                <article>  
                    <img src="../libretas/<?= $registros["ruta"]?>" alt="Foto">
                </article>
                
                <article class='Detalles'>
                    <p>Estado: <?= $registros["estado"]?></p>
                    <p>Mascota: <?= $registros["nombre"]?>, <?= $registros["raza"]?></p>
                    
                    <?php 
                        if($registros["sexo"] == 'h') echo "<p>Sexo: Hembra</p>";
                        if($registros["sexo"] == 'm') echo "<p>Sexo: Macho</p>";
                    ?>
                    <p></p>
                    <p>Descripción: <?= $registros["nota"]?></p>
                    <p>Contacto: <?= $registros["mail"]?> ó <?= $registros["tell"]?>.</p>
                </article>
                <article class='Opciones'>
                    <a href="imprimir-publicacion.php?idf=<?=$id ?>&f=<?=$foro?>" target="_blank">Imprimir publicación</a>
                    <?php if($_SESSION["login"]):?>                        
                        <a href="../libretas/ver-libreta.php?id=<?=$registros["idlibreta"];?>">Volver a la libreta</a>
                        <a href="editar-publicacion.php?idf=<?=$id ?>&f=<?=$foro?>">Editar publicación</a>
                    
                        <?php if($registros["borrado"] == "y"):?>
                            <a href="restaurar-publicacion.php?idf=<?=$id ?>&f=<?=$foro?>">Restaurar publicación</a>
                            <a href="borrar-publicacion.php?idf=<?=$id ?>&f=<?=$foro?>">Borrar publicación</a>
                        <?php else:?>
                            <a href="eliminar-publicacion.php?idf=<?=$id ?>&f=<?=$foro?>&idl=<?=$registros["idlibreta"]?>">Eliminar publicación</a>
                        <?php endif;?>
                    <?php endif;?>
                </article>
            
            </div>       
               
        </section>
    </main>
</body>
</html>