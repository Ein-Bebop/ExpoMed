<?php
    
    include("db.php");//Incluye los datos de acceso a la BD
    $conn = mysqli_connect($servername, $username, $password, $database);//Sentencia de conexión

    if (!$conn) {//Si la conexión no es exitosa no muestra los datos
        die("Connection failed: " . mysqli_connect_error());
        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
    }
    else{//Conexión exitosa
        //Consigue los datos del form
        $email = $_POST['emailSuscribe'];

        $sql = "INSERT INTO suscriptores (correo) VALUES ('".$email."')";
        $result = $conn->query($sql);
        
        $conn->close();
        //Cerramos conexión

        echo "Registro correcto";

        $noti = "Registrado con éxito.";
                                
        $notiCK = "notificacion";
        $notiCK_value = $noti;
        setcookie($notiCK, $notiCK_value, 0, "/"); // 86400 = 1 day
        
        header("location: ../../public/talleres.php");
    }
    
//Finaliza Script PHP
?>