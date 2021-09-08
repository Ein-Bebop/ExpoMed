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
                <div class="option" style="background:#ff7f30;font-weight:bolder;"><p class="icon-folder-empty"> Directorio</p></div>
                <div class="option" onclick="window.location.href='users.php'"><p class="icon-sliders"> Admin</p></div>


            </div>
            <div class="exit">
                <div style="cursor:default"></div>
                <div class=option><p class="icon-angle-left">Salir</p></div>
            </div>
        
        </div>
        <div id="panel-der">

                <div class="menu-add">
                    <form id="form-add" action="operaciones/insertDirectorio.php" method="post" enctype="multipart/form-data">
                        <div class="menu-add-titulo">Agregar Médico</div>
                        <div class="menu-option">Area</div>
                        <input type="text" name="area" placeholder="Ingresa el área de trabajo del médico" required>
                        <!-- <div class="menu-option">Categoria</div>
                        <input type="text" name="categoria" placeholder="Ingresa la categoria" required> -->
                        <div class="menu-option">Nombre</div>
                        <input type="text" name="nombre" placeholder="Ingresa el nombre del médico" required>
                        <div class="menu-option">Especialidad</div>
                        <input type="text" name="especialidad" placeholder="Ingresa la especialidad del médico" required>
                        <div class="menu-option">Descripción</div>
                        <input type="text" name="descripcion" placeholder="Ingresa la descripción de su trabajo" required>
                        <div class="menu-option">Ubicación</div>
                        <input type="text" name="ubicacion" placeholder="Ingresa la ubicación del médico" required>
                        <div class="menu-option">Biografía</div>
                        <input type="text" name="bio" placeholder="Ingresa un enlace de biografía del médico (Opcional)" required>
                        <div class="menu-option">Foto del Médico</div>
                        <input style="padding-top:10px" type="file" accept="image/*" name="foto">
                        <div class="form-buttons">
                            <div class="button-b" onclick="cancelAdd();">Cancelar</div>
                            <div class="button-a" onclick="sendDirectorio();">Añadir</div>
                        </div>
                    </form>
                    
                </div>

                <div class="barra">
                    <input type="text" name="busqueda" id="buscar" placeholder="Buscar Médico, Categoría, Especialidad...">
                    <div class="button" onclick="addM();"><p class="icon-plus-circled"> Agregar Médico</p></div>
                </div>

                <div id="content">

                <?php //Inicia Script PHP

                    include("operaciones/db.php");//Incluye los datos de acceso a la BD
                    $conn = mysqli_connect($servername, $username, $password, $database);//Sentencia de conexión

                    if (!$conn) {//Si la conexión no es exitosa no muestra los datos
                        die("Connection failed: " . mysqli_connect_error());
                        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
                    }
                    else{//Conexión exitosa

                        $sql = "SELECT * FROM directorio";//Sentencia de consulta
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows >= 1) {
                            //Salida de datos si existen datos en la tabla

                            while($row = $result->fetch_assoc()) {

                                $id=1;//ID de filas

                                echo '<div class="card-medico">';
                                echo '<div class="card-categoria">Cultura</div>';
                                echo "<div class='card-img-container'><div class='card-img' style='background-image: url(".'"'."../".$row['foto']."');'></div></div>";
                                echo '<div class="card-rama">'.$row['area'].'</div>';
                                echo '<div class="card-nombre">'.$row['nombre'].'</div>';
                                echo '<div class="card-especialidad">'.$row['especialidad'].'</div>';
                                echo '<div class="card-ver-mas">Editar</div>';
                                echo '<div class="card-ubicacion">'.$row['ubicacion'].'</div>';
                                echo '</div>';
                                
                                $id++;
                            }

                        }
                        
                        else {//Salida de datos si NO existen datos en la tabla
                                echo "<table>";
                                echo "<tr>";
                                echo "<th> No Hay Registros </th>";
                                echo "</tr>";
                                echo "</table>";
                        }

                        $conn->close();
                        //Cerramos conexión
                    }
                    
                //Finaliza Script PHP
                ?>

                </div>

        </div>
    </section>

    <script src="js/main.js"></script>
</body>
</html>