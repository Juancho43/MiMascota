<?php
require("../config/config.php");


$idl = $_GET["idl"];





//Paginacion

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$resultados = 10;
    $offset = ($pageno-1) * $resultados; 

    
$total_pages_sql = "SELECT COUNT(*) FROM foros WHERE foro='me-perdi' AND idlocalidad = $idl";
$result = mysqli_query($link,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $resultados);  

$sql_meperdi = "SELECT a.nombre,a.sexo,a.especie,a.raza,f.nota,f.estado,o.ruta,f.idforo
FROM foros f
INNER JOIN libretas l on (f.idlibreta = l.idlibreta)
INNER JOIN animales a on (l.idanimal = a.idanimal)
INNER JOIN fotos o on (o.fotoid = l.idlibreta)
WHERE f.foro = 'me-perdi' AND f.idlocalidad=$idl AND f.borrado='n'
LIMIT $offset,$resultados";

$meperdi = mysqli_query($link,$sql_meperdi);

$sql = "SELECT localidad FROM localidades WHERE id = '$idl'";
$query = mysqli_query($link,$sql);
$ciudad = mysqli_fetch_assoc($query);
$nombre = $ciudad["localidad"];




?>

<!DOCTYPE html>
<html lang="es">
<?php require("../include/_head.php");?>
<link rel="stylesheet" href="../css/foros.css">
<link rel="stylesheet" href="../css/paginacion.css">
<body>
<?php require("../include/_header.php");?>
    <main>
        <section>
            <a href="./provincia.php?foro=me-perdi" class='Volver'>Volver</a>
            <h2>Foro me perdí</h2>
            <?php if(mysqli_num_rows($meperdi)> 0):?>
                
            <table>

                <thead>
                <tr>
                    <th colspan="5" class='Centro'><h3><?= @$nombre?></h3></th>
                </tr>
                <tr>
                    
                    <th>Estado</th>
                    <th>Datos</th>
                    <th>Información</th>
                    <th>Más info</th>
                </tr>
                </thead>
                <tbody>
                    <?php while($registros = mysqli_fetch_assoc($meperdi)):?>
                        <tr class='Publicacion'>
                            
                            <td><?= $registros["estado"]?></td>
                            <?php 
                                $sexo = "";
                                if($registros["sexo"] == 'h') $sexo = "Hembra";
                                if($registros["sexo"] == 'm') $sexo = "Macho";
                            ?> 
                            <td><?= $registros["nombre"]?> - <?= $registros["raza"]?> - <?= $sexo ?></td>
                            <td><?= $registros["nota"]?></td>
                            <td><a href='ver-publicacion.php?f=me-perdi&idf=<?=$registros["idforo"]?>'>Entrar</a></td>
                        </tr>
                    <?php endwhile;?>  
                </tbody>
            </table>
            <ul class="Paginacion">
                <li><a href="<?php echo "?id=$id&pageno=1"; ?>">Inicio</a></li>
                <li class="<?php if($pageno <= 1){ echo 'Tope'; } ?>">
                    <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?id=$id&pageno=".($pageno - 1); } ?>">Anterior</a>
                </li>
            
                <li class="<?php if($pageno >= $total_pages){ echo 'Tope'; } ?>">
                    <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?id=$id&pageno=".($pageno + 1); } ?>">Siguiente</a>
                </li>

                <li><a href="<?php echo "?id=$id&pageno=$total_pages"; ?>">Último</a></li>
            </ul>
            <?php else:?> 
                <h3>Vaya... ¡Qué suerte no se perdió ninguna mascota por aquí!</h3>
                <br>
                
            <?php endif;?> 
        </section>
    </main>
</body>
</html>

