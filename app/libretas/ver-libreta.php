<?php 

require("../config/config.php");

    //Traer variables principales
    $id = $_SESSION["idusuario"];
    $libreta_id = $_GET["id"];

    //Paginación
    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    
    $resultados = 3;
    $offset = ($pageno-1) * $resultados; 

    
    $total_pages_sql = "SELECT COUNT(*) FROM registros WHERE idlibreta = $libreta_id AND borrado = 'n'";
    $result = mysqli_query($link,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $resultados);
    

    
    
    //Traer los datos de la mascota
    $sql = "SELECT f.idanimal,l.nombre,l.especie,l.nacimiento,l.raza,l.sexo,f.borrado,f.idlibreta,o.ruta,o.descripcion,u.ubicacion
    FROM libretas f
    INNER JOIN animales l ON (f.idanimal = l.idanimal)
    LEFT JOIN fotos o ON (o.fotoid = f.idlibreta)
    INNER JOIN usuarios u ON(u.idusuario = f.idusuario)
    WHERE idlibreta = $libreta_id AND f.idusuario = $id AND f.borrado = 'n'";
    $query = mysqli_query($link,$sql);
    $results = mysqli_fetch_assoc($query);  

    //Traer los registros de la libreta de la mascota
    $sql = "SELECT f.fecha,f.evento,f.descripcion,f.proxevento,f.idregistro,f.idlibreta
    FROM libretas l 
    INNER JOIN registros f on(f.idlibreta = l.idlibreta)
    
    WHERE l.idlibreta=$libreta_id and l.idusuario = $id and f.borrado='n'
    ORDER BY f.fecha  ASC
    LIMIT $offset,$resultados;
    ";
    $query_registros = mysqli_query($link,$sql);

    $sql = "SELECT idforo,foro FROM foros WHERE idlibreta = $libreta_id";
    $query = mysqli_query($link,$sql);
    
?>  

<!DOCTYPE html>
<html lang="es">
<?php require("../include/_head.php");?>
<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
<meta http-equiv="Pragma" content="no-cache">
<body>
<link rel="stylesheet" href="../css/libreta.css">
<link rel="stylesheet" href="../css/paginacion.css">

<?php require("../include/_header.php");?>
    <main>
      
        

        <section>
            <div class="Opciones">
                <a href='<?php echo "eliminar-libreta.php?id=$results[idlibreta]";?>'>
                    <article class="Boton">
                        <span class="material-icons"> delete </span>
                    </article>
                </a>
                <a href='<?php echo "editar-libreta.php?id=$results[idlibreta]";?>'>
                    <article class="Boton">
                        <span class="material-icons"> edit </span>
                    </article>
                </a>
                <a href="index.php">
                    <article class="Boton">
                        <span class="material-icons"> arrow_back </span>
                    </article>
                </a>
            </div>
            
            <div class="Main">
            <h2 class="Titulo">Datos</h2>             
            <article class="Registro">
                       
                    <p>Nombre: <?= $results["nombre"]?></p>
                    <p>Fecha de nacimiento: <?= fecha($results["nacimiento"]);?></p>
                    <p>Especie: <?= $results["especie"]?></p>
                    <p>Raza: <?= $results["raza"]?></p>
                    <?php
                        if($results["sexo"] == 'h') echo "<p>Sexo: Hembra</p>";
                        if($results["sexo"] == 'm') echo "<p>Sexo: Macho</p>";
                    ?>    
                </article>
                <article class="Foro">                        
                    <?php if(mysqli_num_rows($query) >0): ?>
                        <?php while($foro = mysqli_fetch_assoc($query)):?>
                        <a href="../foros/ver-publicacion.php?f=<?= $foro["foro"]?>&idf=<?=$foro["idforo"]?>">Ver publicación en foro <?=$foro["foro"] ?></a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </article>
                <article class="Foto">    
                    <h2 class="Titulo">Foto</h2>
                    <?php if($results['ruta'] == ""):?>
                            <img src='img/muestra.png' alt='Imagén de muestra'>
                            <a href='formulario-foto.php?id=<?=$results["idlibreta"]?>&n=<?=$results["nombre"]?>'>Añadir foto</a>
                    <?php else: ?>
                            <img src='<?=$results["ruta"];?>' alt='<?=$results["descripcion"];?>'>
                            <a href='editar-foto.php?id=<?=$results["idlibreta"]?>&n=<?=$results["nombre"]?>'>Cambiar foto</a>
                            <a href='eliminar-foto.php?id=<?=$results["idlibreta"]?>'>Eliminar foto</a>
                    <?php endif;?>
                </article>
                    
                
                
            </div>
        
        </section>        
        <section>
                <div class="Opciones">
                    <a href='<?php echo "formulario-registro.php?id=$results[idlibreta]";?>'>
                        <article class="Boton">
                            <span class="material-icons"> add </span>
                        </article>
                    </a>
                    <a href='<?php echo "papelera-registro.php?id=$results[idlibreta]";?>'>
                        <article class="Boton">
                            <span class="material-icons"> delete </span>
                        </article>
                    </a>
                </div>
                <div class="Registros">
                    <h2 class="Titulo">Registros</h2>                    
                    <?php while ($registros = mysqli_fetch_assoc($query_registros)): ?>
                    <article class="Registro">
                            <p><?= fecha($registros['fecha']); ?></p>
                            <p>Evento: <?= $registros['evento']; ?></p>
                            <p><?= $registros['descripcion']; ?></p>
                            <?php if($registros["proxevento"] !== "0000-00-00"):?>
                                <p>Proxima visita: <?= fecha($registros["proxevento"])?></p>
                                
                            <?php endif;?>
                            <a href='editar-registro.php?id=<?= $registros['idregistro']; ?>'>Editar</a>
                            <a href='eliminar-registro.php?id=<?= $registros['idregistro']; ?>&lid=<?= $registros['idlibreta']; ?>'>Eliminar</a>
                        </article>
                    <?php endwhile; ?>
                </div>
                <div>
                    <ul class="Paginacion">
                        
                        <li>
                            <a href="<?php echo "?id=$libreta_id&pageno=1"; ?>">
                                <span class="material-icons">
                                    first_page
                                </span>
                            </a>
                        </li>

                        <li class="<?php if($pageno <= 1){ echo 'Tope'; } ?>">
                            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?id=$libreta_id&pageno=".($pageno - 1); } ?>">
                            <span class="material-icons">
                                arrow_back_ios
                            </span>
                            </a>
                        </li>

                        <li class="<?php if($pageno >= $total_pages){ echo 'Tope'; } ?>">
                            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?id=$libreta_id&pageno=".($pageno + 1); } ?>">
                            <span class="material-icons">
                                arrow_forward_ios
                            </span>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo "?id=$libreta_id&pageno=$total_pages"; ?>">
                                <span class="material-icons">
                                last_page
                                </span>
                            </a>
                        </li>

                    </ul>
                </div>
        
        </section>
        
    </main>
    
</body>
</html>
