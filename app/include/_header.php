<header class='Header'>

    <h1><a  href='http://mimascota.cf/app/inicio.php'>Mi mascota</a></h1>
    <ul class='Header__nav' id='nav'>
        <li><a href='https://mimascota.cf/app/libretas/'>Libretas</a></li>
        <?php if($_SESSION["login"]): ?>
            <li><a href='http://mimascota.cf/app/sesiones/'>Perfil</a></li>
            <li><a href='http://mimascota.cf/app/manual-usuario.pdf'>Ayuda</a></li>
            <li><a href='http://mimascota.cf/app/sesiones/salir.php'>Salir</a></li>
        <?php else: ?>
            <li><a href='http://mimascota.cf/app/manual-usuario.pdf'>Ayuda</a></li>
            <li><a href='http://mimascota.cf/app/sesiones/ingresar.php'>Ingresar</a></li>
        <?php endif; ?>
        
    </ul>
</header>