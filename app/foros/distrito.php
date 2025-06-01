<?php
require("../config/config.php");

$foro = $_GET["foro"];
$id = $_GET["id"];
//Paginacion

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$resultados = 10;
    $offset = ($pageno-1) * $resultados; 

    
$total_pages_sql = "SELECT COUNT(*) FROM localidades WHERE id_provincia= $id";
$result = mysqli_query($link,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $resultados);  

$sql = "SELECT * FROM localidades WHERE id_provincia = $id LIMIT $offset,$resultados";
$query = mysqli_query($link,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<?php require("../include/_head.php");?>
<link rel="stylesheet" href="../css/foros.css">
<link rel="stylesheet" href="../css/paginacion.css">
<body>
<?php require("../include/_header.php");?>
    <main>
        <section>
            <a href="./provincia.php?foro=me-perdi" class='Volver'>Volver</a>
            <h2>Foro me perdí</h2>
            <table>
                <thead>
                    <tr>
                        <th><h3>Seleccionar localidad</h3></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($localidades = mysqli_fetch_assoc($query)):?>
                    
                        <tr>
                            <td>
                                <a href='<?=$foro?>.php?idl=<?=$localidades["id"]?>'><?= $localidades["localidad"]?></a>
                            </td>
                        </tr>
                    <?php endwhile;?>  
                </tbody>
            </table>
            <ul class="Paginacion">
                <li><a href="<?php echo "?id=$id&foro=$foro&pageno=1"; ?>">Inicio</a></li>
                <li class="<?php if($pageno <= 1){ echo 'Tope'; } ?>">
                    <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?id=$id&foro=$foro&pageno=".($pageno - 1); } ?>">Anterior</a>
                </li>
            
                <li class="<?php if($pageno >= $total_pages){ echo 'Tope'; } ?>">
                    <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?id=$id&foro=$foro&pageno=".($pageno + 1); } ?>">Siguiente</a>
                </li>

                <li><a href="<?php echo "?id=$id&foro=$foro&pageno=$total_pages"; ?>">Último</a></li>
            </ul>
        </section>
    </main>
</body>
</html>

