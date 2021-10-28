<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#522d6d">
    <link rel="icon" href="../icons/favicon.png">
    <title>Sign Up - Expo Encuentro</title>
    <link rel="stylesheet" href="styles/panel.css">
    <link rel="stylesheet" href="../styles/fontello.css">
</head>

<body id="body-login" style="overflow: hidden;">
    
    <section id="login">
        <div id="login-logo"><img src="../assets/Logo_Color.svg"></div>
        <div id="login-titulo"><h2>Registrar nuevo usuario</h2></div>
        <form action="operaciones/registrar.php" method="post">
            
            <div><p>Usuario</p><input type="text" placeholder="Usuario" name="user" required></div>
            <div class="div-login"></div>
            <div><p>Contraseña</p><input type="password" placeholder="Contraseña" name="pass" required></div>
            <div class="div-login"></div>
            <div><p>Nombre Completo</p><input type="text" placeholder="Nombre Completo" name="name" required></div>
            <div class="div-login"></div>
            <div><p>Correo</p><input type="text" placeholder="Correo" name="email" required></div>
            <div class="div-login"></div>
            <div><p>Clave de registro</p><input type="text" placeholder="Correo" name="claveregistro" required></div>
            <div class="div-login"></div>

            <div id="botones-login">
                <button id="b-login">Registrar</button>
            </div>
            <div type="submit" class="div-login"></div>
        </form>
        <!-- <div id="olvide-div"><p class="icon-info-circled">Olvidé mi contraseña</p></div> -->

       
    </section>

    <p id="comment-down">v1.0</p>

    <div id="notificacion"></div>
</body>
<script src="js/notificacion.js"></script>
</html>