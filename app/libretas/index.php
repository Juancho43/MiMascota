<?php
require("../config/config.php");
if($_SESSION["login"])
{
    $id = $_SESSION["idusuario"];
    $sql = "SELECT f.idanimal,l.nombre,l.especie,f.borrado,f.idlibreta,o.ruta,o.descripcion
    FROM libretas f
    INNER JOIN animales l ON (f.idanimal = l.idanimal)

    LEFT JOIN fotos o ON (o.fotoid = f.idlibreta)
    WHERE f.idusuario = $id AND f.borrado = 'n'
    ";
    $query = mysqli_query($link,$sql);
}else{
    header("Location: ../sesiones/ingresar.php");
}


?>
<!DOCTYPE html>
<html lang="es">
<?php require("../include/_head.php")?>

<link rel="stylesheet" href='../css/panel.css'>
<body>
    <?php require("../include/_header.php")?>

    <main class="Contenedor">
   
        
        <h2 class="Contenedor__titulo">Bienvenido <?= $_SESSION["nombre"]?> </h2>    
        <h3 class="Contenedor__subtitulo">Tus Libretas: </h3> 
        <div class="Opciones">
                <a href='formulario-libreta.php'>
                    <article class="Boton">
                        <span class='material-icons'>add</span>
                    </article>
                </a>
                <a href='papelera-libreta.php'>
                    <article class="Boton">
                        <span class='material-icons'>delete</span>
                    </article>
                </a>    
                <a href="../inicio.php">
                    <article class="Boton">
                        <span class="material-icons"> arrow_back </span>
                    </article>
                </a>
            </div>   
        <section class="Contenedor__libretas">
            <?php if(mysqli_num_rows($query) > 0):?>
            <?php  while($results = mysqli_fetch_assoc($query)):?>
                <article class="Libreta">
                    <a href="ver-libreta.php?id=<?=$results["idlibreta"]?>">
                        <?php
                            if($results['ruta'] == ""){
                                echo "<img src='img/muestra.png' alt='Imagén de muestra'></img>";;
                            }else{
                                echo "<img src='$results[ruta]' alt='$results[descripcion]'></img>";
                            } 
                        ?>
                        <h3><?= $results["nombre"]?></h3>
                        <h4><?= $results["especie"]?></h4>
                    </a>
                  
                </article>
            <?php endwhile;?>
            <?php else:?>
                <h3>No hay nada por aquí...</h3>
            <?php endif;?>
         
        </section>
         
        
        
    </main>
    
</body>
</html>