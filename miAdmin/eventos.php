<?php 
        
     if(isset($_COOKIE['1be067584467e484c5bfc571bb26ef73'])){ 
                
                $sesionactiva = $_COOKIE['1be067584467e484c5bfc571bb26ef73'];
                $user = $_COOKIE['f8032d5cae3de20fcec887f395ec9a6a'];           
                $sesionactiva = substr($sesionactiva, 6, -6);
        
                //Define cipher 
                $cipher = "aes-256-cbc";
                $encryption_key = "fcYc!9mQnEQ>\nXk?8j6a$\,fK-u";
                $iv = "8TnzbZ(M(9CUn,hX"; 

                //Decrypt data 
                $decrypted_data = openssl_decrypt($user, $cipher, $encryption_key, 0, $iv); 

                $usuario = $decrypted_data;
         
                include("operaciones/db.php");
                $conn = mysqli_connect($servername, $username, $password, $database);

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                    echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
                    header("location: operaciones/salir.php");
                }
                else{
                    
                    $sql = "SELECT * FROM admin WHERE usuario = '".$usuario."' AND pass = '".strrev($sesionactiva)."'";
                    $result = $conn->query($sql);
                    
                    
                    if($result->num_rows >= 1) {
                        $row = $result->fetch_assoc();
                        $nombreusuario = $row['usuario'];
                        $nombre = $row['nombre'];
                    
                    }else{
                        header("location: operaciones/salir.php");
                    }
                       
                }
            
                $conn->close();

            
        }else{
                header("location: operaciones/salir.php");
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#522d6d">
    <link rel="icon" href="../icons/favicon.png">
    <title>Admin - Expo Encuentro</title>
    <link rel="stylesheet" href="styles/panel.css">
    <link rel="stylesheet" href="../styles/fontello.css">
</head>
<body>
    <section id="main-se">
        <div id="panel-izq">
            <div id="panel-logo"><img src="../assets/Logo_Blanco.svg"></div>
            <div class="panel-izq-division"></div>
            <div class="panel-user"><img src="user.png"><p><?php echo $nombre; ?></p></div>
            <!-- <div class="panel-user-config"><p class="icon-cog"> Configuración</p></div> -->
            <div class="panel-izq-division"></div>
            <div class="nav">
                <div></div>
                <div class="option" onclick="window.location.href='index.php'"><p class="icon-folder-empty"> Directorio</p></div>
                <div class="option"  onclick="window.location.href='talleres.php'"><p class="icon-folder-empty"> Talleres</p></div>
                <div class="option" style="background:#ff7f30;font-weight:bolder;"><p class="icon-folder-empty"> Eventos</p></div>
                <div class="option"  onclick="window.location.href='users.php'"><p class="icon-sliders"> Admin</p></div>

            </div>
            <div class="exit">
                <div style="cursor:default"></div>
                <div class="option" onclick="window.location.href='operaciones/salir.php'"><p class="icon-angle-left">Salir</p></div>
            </div>
        
        </div>
        
        <div id="panel-der">
            <div class="menu-add">
                <form id="form-add" action="operaciones/insertEvento.php" method="post" enctype="multipart/form-data">
                    <div class="menu-add-titulo">Agregar Evento</div>
                    <input type="text" name="idInvisible" style="display:none;">
                    <input type="text" name="fotoPath" style="display:none;">
                    <div class="menu-option">Tipo</div>
                    <input type="text" name="area" placeholder="Ingresa el tipo de evento" required>
                    <div class="menu-option">Nombre</div>
                    <input type="text" name="nombre" placeholder="Ingresa el nombre del evento" required>
                    <div class="menu-option">Imparte</div>
                    <input type="text" name="especialidad" placeholder="Ingresa el nombre de quien imparte" required>
                    <div class="menu-option">Descripción</div>
                    <input type="text" name="descripcion" placeholder="Ingresa la descripción del evento" required>
                    <div class="menu-option">Link</div>
                    <input type="text" name="ubicacion" placeholder="Ingresa el link al evento" required>
                    <div class="menu-option">Foto</div>
                    <input style="padding-top:10px" type="file" accept="image/*" name="foto">
                    <div class="form-buttons">
                        <div class="button-b" onclick="cancelAdd();">Cancelar</div>
                        <div class="button-a" onclick="sendForm();">Añadir</div>
                    </div>
                </form>
            </div>

            <div class="menu-delete" style="display:none;">
                <form id="form-delete" action="operaciones/deleteEvento.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="idToDelete" style="">
                    <input type="text" name="fotoToDelete" style="">
                </form>
            </div>

            <div class="barra">
                <div class="button" onclick="addEvento();" style="margin-left: 1rem;"><p class="icon-plus-circled"> Agregar Evento</p></div>
            </div>

            <div id="content" style="margin-top: 2rem;">

                <?php //Inicia Script PHP

                    include("operaciones/db.php");//Incluye los datos de acceso a la BD
                    $conn = mysqli_connect($servername, $username, $password, $database);//Sentencia de conexión

                    if (!$conn) {//Si la conexión no es exitosa no muestra los datos
                        die("Connection failed: " . mysqli_connect_error());
                        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
                    }
                    else{//Conexión exitosa

                        $sql = "SELECT * FROM eventos";//Sentencia de consulta
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows >= 1) {
                            //Salida de datos si existen datos en la tabla

                            while($row = $result->fetch_assoc()) {

                                $id=1;//ID de filas

                                $tipo = $row['tipo'];
                                $nombre = $row['nombre'];
                                $imparte = $row['imparte'];
                                $brief = $row['brief'];
                                $link = $row['link'];
                                $foto = $row['img'];

                                echo '<div class="card-medico">';
                                echo '<div class="icon-cancel-circled2" style="color: #e61919; font-size: 1.5rem; padding-left: .2rem; padding-top: .3rem; height: 2rem; width: 2rem;" onclick="deleteById('.$row['idTaller'].', `'.$foto.'`);"></div>';
                                echo '<div class="card-categoria">'.$row['tipo'].'</div>';
                                echo "<div class='card-img-container'><div class='card-img' style='background-image: url(".'"'."../assets/eventos/".$row['img']."');'></div></div>";
                                // echo '<div class="card-rama">'.$row['tipo'].'</div>';
                                echo '<div class="card-nombre">'.$row['nombre'].'</div>';
                                echo '<div class="card-especialidad">'.$row['imparte'].'</div>';
                                echo '<div class="card-especialidad" style="color: #bd0000;"><a href="'.$row['link'].'" style="text-decoration:none; color: #bd0000;" target="_blank"">'.$row['link'].'</a></div>';
                                echo '<div class="card-ver-mas" onclick="editEvento('.$row['idTaller'].',`'.$tipo.'`,`'.$nombre.'`,`'.$imparte.'`,`'.$brief.'`,`'.$link.'`,`'.$foto.'`);">Editar</div>';
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

    <div id="notificacion" style="z-index:3"></div>

    <script src="js/main.js"></script>
    <script src="js/notificacion.js"></script>

</body>
</html>