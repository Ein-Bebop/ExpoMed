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
            <div class="panel-user"><img src="img/default-user.png"><p><?php echo $nombre; ?></p></div>
            <div class="panel-user-config"><p class="icon-cog"> Configuración</p></div>
            <div class="panel-izq-division"></div>
            <div class="nav">
                <div></div>
                <div class="option" onclick="window.location.href='index.php'"><p class="icon-folder-empty"> Directorio</p></div>
                <div class="option" style="background:#ff7f30;font-weight:bolder;"><p class="icon-sliders"> Admin</p></div>
            </div>
            <div class="exit">
                <div style="cursor:default"></div>
                <div class="option" onclick="window.location.href='operaciones/salir.php'"><p class="icon-angle-left">Salir</p></div>
            </div>
        
        </div>
        
        <div id="panel-der">

            <div class="barra">
                <input type="text" name="busqueda" id="buscar" placeholder="Buscar Médico, Categoría, Especialidad...">
                <!-- <div class="button"><p class="icon-plus-circled"> Agregar Médico</p></div> -->
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

                        $sql = "SELECT * FROM admin";//Sentencia de consulta
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows >= 1) {
                            //Salida de datos si existen datos en la tabla
                            
                            echo "<table>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th scope='col'> Usuario </th>";
                            echo "<th scope='col'> Nombre </th>";
                            echo "<th scope='col'> Correo </th>";
                            echo "<th scope='col'> Fecha Registro </th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";

                            while($row = $result->fetch_assoc()) {

                                $id=1;//ID de filas
                                echo "<tr>";
                                echo "<td data-label='USUARIO' id=t-".$id.">".$row['usuario']."</td>";
                                echo "<td data-label='NOMBRE' id=t-".$id.">".$row['nombre']."</td>";
                                echo "<td data-label='CORREO' id=d-".$id.">".$row['email']."</td>";
                                echo "<td data-label='FECHA REGISTRO' id=p-".$id.">".$row['fecha']."</td>";
                                echo "</tr>"; 
                                
                                $id++;
                            }

                            echo "</tbody>";
                            echo "</table>";
                            
                        
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
</body>
</html>