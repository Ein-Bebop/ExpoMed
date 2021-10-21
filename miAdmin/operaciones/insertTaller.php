<?php
    
    include("db.php");//Incluye los datos de acceso a la BD
    $conn = mysqli_connect($servername, $username, $password, $database);//Sentencia de conexión

    if (!$conn) {//Si la conexión no es exitosa no muestra los datos
        die("Connection failed: " . mysqli_connect_error());
        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
    }
    else{//Conexión exitosa
        date_default_timezone_set("America/Mexico_City");//Dinfe la zona horaria a la de méxico

        //Consigue los datos del form de directorio
        $tipo = $_POST['area'];
        $nombre = $_POST['nombre'];
        $imparte = $_POST['especialidad'];
        $brief = $_POST['descripcion'];
        $link = $_POST['ubicacion'];

        //Sube el archivo a la carpeta de assets
        $filename = $_FILES['foto']['name'];
        $filesize = $_FILES['foto']['size'];
        $tmp_name = $_FILES['foto']['tmp_name'];
        $file_type = $_FILES['foto']['type'];
        $date = date("d-m-Y_h-i-s A"); //El nuevo nombre de la imagen será la hora actual en ese momento
        $temp = explode(".", $filename); //Quita la extensión del archivo
        $new_filename = $date . '.' . end($temp);//El nuevo nombre del archivo es la fecha y hora anterior de $date mas la extensión del archivo temporal del navegador
        $f_folder = "../../assets/talleres/" . DIRECTORY_SEPARATOR . $new_filename;//Ruta del archivo a la carpeta dentro del host
        move_uploaded_file($tmp_name, $f_folder);//Mueve el archivo a la carpeta

        $ruta = $new_filename;//La ruta del archivo, se ingresa a la tabla

        $sql = "INSERT INTO talleres (tipo, nombre, imparte, brief, link, img) VALUES ('".$tipo."', '".$nombre."', '".$imparte."', '".$brief."', '".$link."', '".$ruta."')";
        $result = $conn->query($sql);
        
        $conn->close();
        //Cerramos conexión

        echo "Registro correcto";

        $noti = "Registrado con éxito.";
                                
        $notiCK = "notificacion";
        $notiCK_value = $noti;
        setcookie($notiCK, $notiCK_value, 0, "/"); // 86400 = 1 day
        
        header("location: ../talleres.php");
    }
    
//Finaliza Script PHP


?>