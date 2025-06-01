<?php
require("../config/config.php");
$id = $_SESSION["idusuario"];
$sql = "SELECT f.idanimal,l.nombre,l.especie,f.borrado,f.idlibreta
        FROM libretas f
        INNER JOIN animales l ON (f.idanimal = l.idanimal)
        WHERE f.idusuario = $id and f.borrado = 'y';
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
        <a href="index.php" class="Volver">Volver</a>   
        <h2 class="Contenedor__titulo">Papelera de libretas</h2>    
        <section class="Papelera">
            
            
            <?php if(mysqli_num_rows($query) > 0): ?>
                <?php while($results = mysqli_fetch_assoc($query)): ?>
                    <article class='Basura'>
                        <h3><?= $results["nombre"]?></h3>
                        <h4><?= $results["especie"]?></h4>
                        <a href='./restaurar-libreta.php?id=<?=$results["idlibreta"]?>'>Restaurar</a>
                        <a href='./borrar-libreta.php?ida=<?=$results["idanimal"]?>&idl=<?=$results["idlibreta"]?>'>Eliminar</a>
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