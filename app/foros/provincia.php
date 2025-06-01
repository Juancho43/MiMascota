<?php
require("../config/config.php");
$foro = $_GET["foro"];

//Paginación
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$resultados = 10;
    $offset = ($pageno-1) * $resultados; 


$total_pages_sql = "SELECT COUNT(*) FROM provincias";
$result = mysqli_query($link,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $resultados);    

$sql = "SELECT * FROM provincias LIMIT $offset,$resultados";
$query = mysqli_query($link,$sql);
?>


<!DOCTYPE html>
<html lang="en">
<?php require("../include/_head.php");?>
<body>
<?php require("../include/_header.php");?>
<link rel="stylesheet" href="../css/foros.css">
<link rel="stylesheet" href="../css/paginacion.css">
<main>
    <section>
        <a href="../inicio.php" class='Volver'>Volver</a>
        <h2>Foro <?=$foro; ?></h2>        
        <table>
            <thead>
                <tr>
                    <th><h3>Seleccionar distrito</h3></th>
                </tr>
            </thead>
            <tbody>
                <?php while($provincias = mysqli_fetch_assoc($query)):?>
                    <tr>
                        <td><a href="distrito.php?id=<?=$provincias["id"] ?>&foro=<?=$foro?>"><?= $provincias["provincia"]?></a></td>
                    </tr>
                <?php endwhile;?>
            </tbody>
        </table>
        <ul class="Paginacion">
            <li><a href="<?php echo "?foro=$foro&pageno=1"; ?>">Inicio</a></li>
            <li class="<?php if($pageno <= 1){ echo 'Tope'; } ?>">
                <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?foro=$foro&pageno=".($pageno - 1); } ?>">Anterior</a>
            </li>
        
            <li class="<?php if($pageno >= $total_pages){ echo 'Tope'; } ?>">
                <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?foro=$foro&pageno=".($pageno + 1); } ?>">Siguiente</a>
            </li>

            <li><a href="<?php echo "?foro=$foro&pageno=$total_pages"; ?>">Último</a></li>
        </ul>
    </section>
</main>
</body>
</html>