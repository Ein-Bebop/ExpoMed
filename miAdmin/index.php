<?php 
        if(isset($_COOKIE['1be067584467e484c5bfc571bb26ef73'])){ 

                header("location: directorio.php");
        
        }else{
                
        }
?>


<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#522d6d">
    <link rel="icon" href="../icons/favicon.png">
    <title>Login - Expo Encuentro</title>
    <link rel="stylesheet" href="styles/panel.css">
    <link rel="stylesheet" href="../styles/fontello.css">
</head>

<body id="body-login">
    
    <section id="login" style="margin-top: 3rem;">
        <div id="login-logo"><img src="../assets/Logo_Color.svg"></div>
        <div id="login-titulo"><h2>Iniciar Sesión</h2></div>
        <form action="operaciones/login.php" method="post">
            <div><p>Usuario</p><input type="text" placeholder="Usuario" name="user" required></div>
            <div class="div-login"></div>
            <div><p>Contraseña</p><input type="password" placeholder="Contraseña" name="pass" required></div>
            <div class="div-login"></div>
            <div id="botones-login">
                <a id="b-registro" href="register.php" style="text-decoration:none;">Registro</a>
                <button id="b-login">Login</button>
            </div>
        </form>
        <!-- <div id="olvide-div"><p class="icon-info-circled">Olvidé mi contraseña</p></div> -->

       
    </section>

    <p id="comment-down">v1.0</p>

    <div id="notificacion"></div>
</body>
<script src="js/notificacion.js"></script>
</html>