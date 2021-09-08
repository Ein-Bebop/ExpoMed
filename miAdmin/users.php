<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#522d6d">
    <link rel="icon" href="img/favicon.png">
    <title>Admin - Expo Encuentro</title>
    <link rel="stylesheet" href="styles/panel.css">
    <link rel="stylesheet" href="../styles/fontello.css">
</head>
<body>
    <section id="main-se">
        <div id="panel-izq">
            <div id="panel-logo"><img src="../assets/Logo_Blanco.svg"></div>
            <div class="panel-izq-division"></div>
            <div class="panel-user"><img src="img/default-user.png"><p>Diego Garay Valdés Contreras</p></div>
            <div class="panel-user-config"><p class="icon-cog"> Configuración</p></div>
            <div class="panel-izq-division"></div>
            <div class="nav">
                <div></div>
                <div class="option" onclick="window.location.href='index.php'"><p class="icon-folder-empty"> Directorio</p></div>
                <div class="option" style="background:#ff7f30;font-weight:bolder;"><p class="icon-sliders"> Admin</p></div>


            </div>
            <div class="exit">
                <div style="cursor:default"></div>
                <div class=option><p class="icon-angle-left">Salir</p></div>
            </div>
        
        </div>
        <div id="panel-der">
                <div class="barra">
                    <input type="text" name="busqueda" id="buscar" placeholder="Buscar Médico, Categoría, Especialidad...">
                    <div class="button"><p class="icon-plus-circled"> Agregar Médico</p></div>
                </div>

                <div id="content">

                    
                </div>

        </div>
    </section>
</body>
</html>