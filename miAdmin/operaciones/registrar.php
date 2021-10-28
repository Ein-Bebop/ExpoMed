<?php 
    //Fecha
    date_default_timezone_set("America/Mexico_City");
    $date = date("Y-m-d");
    
    //Datos del formulario
    $usuario = $_POST['user'];
    $contra = $_POST['pass'];
    $nombre = $_POST['name'];
    $correo = $_POST['email'];
    
    //Fecha
    $pass = md5($contra);
    $claveRegistro = $_POST['claveregistro'];
    $claveRegMD5 = md5($claveRegistro);

    $clave = "Ty9Rr6Yq21";
    $claveReal = md5($clave);

    $clave2 = "caca";
    $clave2Real = md5($clave2);
    $hash = md5( rand(100000,900000));

    if ($claveRegMD5 != $claveReal){
        $noti = "Clave de Registro Incorrecta";
        $notiCK = "notificacion";
        $notiCK_value = $noti;
        setcookie($notiCK, $notiCK_value, 0, "/"); // 86400 = 1 day
        
        header('Location: ../index.php');

    }else{
        
        include("db.php");//Incluye los datos de acceso a la BD
        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
        }
        else{            
            $sql = "SELECT * FROM admin WHERE usuario='".$usuario."' OR email = '".$correo."'";
            $result = $conn->query($sql);
        
             if($result->num_rows == 0) {
                 
                $sql2 = "SELECT * FROM admin WHERE nombre='".$nombre."'";
                $result2 = $conn->query($sql2);
        
                if($result2->num_rows == 0) {
                    
                    $sql2 = "INSERT INTO admin (usuario,pass,nombre,foto,fecha,email,hash) VALUES ('".$usuario."','".$pass."','".$nombre."','default-user.png','".$date."','".$correo."','".$hash."')";
                    $conn->query($sql2);
                    $conn->close();
            
                    $noti = "Usuario Registrado, ahora puedes iniciar sesión";
                    $notiCK = "notificacion";
                    $notiCK_value = $noti;
                    setcookie($notiCK, $notiCK_value, 0, "/"); // 86400 = 1 day
                    
                    header('Location: ../index.php');
                }else{
                    $noti = "Ese Nombre de consultor ya está registrado, intenta otro.";
                    $notiCK = "notificacion";
                    $notiCK_value = $noti;
                    setcookie($notiCK, $notiCK_value, 0, "/"); // 86400 = 1 day
                    
                    header('Location: ../index.php');
                }
            
            }else {
                    $noti = "Ese Usuario o Correo ya está registrado, intenta otro.";
                    $notiCK = "notificacion";
                    $notiCK_value = $noti;
                    setcookie($notiCK, $notiCK_value, 0, "/"); // 86400 = 1 day
                    
                    header('Location: ../index.php');
            }
        }
    }
?>