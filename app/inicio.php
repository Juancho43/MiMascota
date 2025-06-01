<?php require("./config/config.php");?>
<!DOCTYPE html>
<html lang="es">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="shortcut icon" href="./images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Mi mascota</title>
</head>


<body>
<?php require("./include/_header.php");?>
    <main>
        
        <a href="./libretas/">
            <section class="Contenedor uno">
                <img src="./images/libreta.png" alt="libreta" class="Contenedor__imagen">
                <div><h2>¿Te olvidaste la libreta?</h2><p>Aquí podrás actualizar todos los detalles de tu libreta para tenerlos siempre con vos.</p></div>
            </section>
        </a>
        <a href="./foros/provincia.php?foro=adopción">
            <section class="Contenedor dos">
                <div><h2>¿Estás buscando una mascota?</h2><p>En este espacio podrás ver y publicar mascotas para adoptar.</p></div>
                <img src="./images/adopcion.png" alt="adopcion" class="Contenedor__imagen">
            </section>
        </a>

        <a href="./foros/provincia.php?foro=me-perdi">
            <section class="Contenedor uno">
            <img src="./images/perro-perdido.png" alt="perro-perdido" class="Contenedor__imagen"> 
                <div><h2>¿Se perdío tu mascota?</h2><p>Podés registrar tu anuncio acá para que otras personas lo vean.</p></div>
            </section>
        </a>
        <a href="./foros/provincia.php?foro=busco-pareja">
            <section class="Contenedor dos">
                <div><h2>¿Tu mascota busca pareja?</h2><p>En este espacio podrás ver y publicar un anuncio para buscarle una pareja a tu mascota</p></div>
                <img src="./images/pareja.png" alt="perro-pareja" class="Contenedor__imagen">
            </section>
        </a>
        <a href="manual-usuario.pdf">
            <section class="Contenedor uno">
                <img src="./images/manual.png" alt="libreta" class="Contenedor__imagen">
                <div><h2>¿Primera vez en el sitio?</h2><p>Con el siguiente link podrás descargar el manual de usuario para leer cómo usar la página.<a href="manual-usuario.pdf">Manual de usuario</a></p></div>
            </section>
        </a>
    </main>
    <footer>
    <article class="Contacto">
        <h4>Contacto</h4>
        <p><span class="fas fa-map-marker-alt"></span>Miramar, Buenos Aires, Argentina</p>
        <p><span class="fas fa-envelope"></span> <a href="mailto:soporte@mimascota.tk">soporte@mimascota.tk</a></p>
        <p><span class="fas fa-envelope"></span>Para comunicarte con nosotros haga click <a href="../../app/formulario-contacto.php" target="_blank" rel="noopener noreferrer">aquí</a></p>
    </article>
        <p class="Fondo">Desarrollado por Alvarez, Bravo, Gonzalez <span class="far fa-copyright"></span> 2021.</p>
        <p class="Fondo"><a href="https://highsoft-ar.com.ar/" target="_blank">Highsoft</a> <span class="far fa-copyright"></span> 2022.</p>
    </footer>
    
</body>
</html>