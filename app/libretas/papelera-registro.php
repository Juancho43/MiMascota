<?php
require("../config/config.php");
$libreta_id = $_GET["id"];
$id = $_SESSION["idusuario"];
$sql = "SELECT r.fecha, r.evento, r.idregistro
        FROM registros r
        INNER JOIN libretas l ON (r.idlibreta = l.idlibreta)
        WHERE l.idusuario = $id AND r.borrado = 'y' AND r.idlibreta = $libreta_id;
        ";
$query = mysqli_query($link,$sql);
?>


<!DOCTYPE html>
<html lang="es">
<?php require("../include/_head.php")?>
<link rel="stylesheet" href="../css/panel.css">
<body>
<?php require("../include/_header.php")?>

    <main class="Contenedor">
        <a href="ver-libreta.php?id=<?= $libreta_id ?>" class="Volver">Volver</a>
        <h2 class="Contenedor__titulo">Registros borrados</h2>    
        <section class="Papelera">

            <?php if(mysqli_num_rows($query) > 0): ?>
                <?php while($results = mysqli_fetch_assoc($query)): ?>
                <article class="Basura">
                        <h3><?= $results['evento']; ?></h3>
                        <h3><?= $results['fecha']; ?></h3>
                        <a href="./restaurar-registro.php?id=<?= $results['idregistro']; ?>&lid=<?= $libreta_id; ?>">Restaurar</a>
                        <a href="./borrar-registro.php?id=<?= $results['idregistro']; ?>&idl=<?=$libreta_id; ?>">Borrar</a>
                </article>
                <?php endwhile; ?>

                <?php else: ?>
                    <article class='Mensaje'>
                        <h3>Por aquí no hay nada...</h3>
                    </article>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>