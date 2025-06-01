<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/formulario.css">
    <link rel="shortcut icon" href="./images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Mi mascota - Contacto</title>
</head>
<body>
<?php require("./include/_header.php");?>
    <main>
        <form action="contacto.php" method="post" >
            <a href='inicio.php'>Volver</a>    
            <legend>Formulario de contacto</legend>
            <fieldset>
                <label for="nombre">*Nombre</label>
                <input name="nombre" id="nombre" placeholder="Tu nombre" type="text" tabindex="1" required autofocus >
                <label for="email">*Email</label>
                <input name="email" id="email" placeholder="Tu email" type="email" tabindex="2" required>
                <label for="mensaje">*Mensaje</label>
                <textarea name="mensaje" id="mensaje" placeholder="Escribe tu mensaje...." tabindex="5" required></textarea>
                <input type="submit" name="correo" value="Enviar.">
            </fieldset> 
            <p class='alerta'>* Los campos son obligatorios.</p>
        </form>
    </main>
    <?php require("./include/_footer.php");?>
</body>
</html>