<?php
require("../config/config.php");
if(!$_SESSION["login"]){
    header("Location: https://mimascota.tk/app/inicio.php");    
}
$usuario_id = $_SESSION["idusuario"];
$nombre = $_SESSION["nombre"];
$sql = "SELECT u.mail,u.tell,u.token,u.notificar,l.localidad
    FROM usuarios u
    INNER JOIN localidades l ON(u.ubicacion = l.id)
    WHERE u.idusuario = '$usuario_id'
";
$query = mysqli_query($link,$sql);
$results = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="es">
<?php require("../include/_head.php");?>
<link rel="stylesheet" href="../css/libreta.css">
<body>
<?php require("../include/_header.php");?>
    <main>
        <section>
        <div><a href='../inicio.php' class="Volver">Volver</a></div>
            <div>
                <h2 class="Titulo">Mi cuenta</h2>
            </div>
            <div>
                <article class="Datos">
                    <h2 class="Titulo">Datos</h2>
                    <h2>Nombre: <?= $nombre?></h2>
                    <h2>Mail: <?= $results["mail"]?></h2>
                    <h2>Télefono <?= $results["tell"]?></h2>
                    <h2>Ubicación: <?= $results["localidad"]?></h2>
                    <h2>Token: <?= $results["token"]?></h2>
                    <?php if($results["notificar"] == "y"):?>
                        <h2>Notificar: sí</h2>
                    <?php else:?>
                        <h2>Notificar: no</h2>
                    <?php endif;?>
                </article>
                <article class="Opciones">
                    <h2 class="Titulo">Opciones</h2>
                    <a href='<?php echo "editar-cuenta.php?id=$usuario_id";?>'>Editar cuenta</a>
                    <a href='<?php echo "eliminar-cuenta.php?id=$usuario_id";?>'>Eliminar cuenta</a>
                </article>
            </div>
        </section>
    </main>
</body>
</html>