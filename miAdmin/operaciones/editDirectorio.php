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
        $id = $_POST['idInvisible'];
        $area = $_POST['area'];
        $nombre = $_POST['nombre'];
        $especialidad = $_POST['especialidad'];
        $descripcion = $_POST['descripcion'];
        $ubicacion = $_POST['ubicacion'];
        $bio = $_POST['bio'];
        $foto = $_POST['fotoPath'];

        // Si hay archivo entonces también se debe reemplazar en la db y en la carpeta
        if($_FILES['foto']['name'] != ""){
            $filename = $_FILES['foto']['name'];
            $filesize = $_FILES['foto']['size'];
            $tmp_name = $_FILES['foto']['tmp_name'];
            $file_type = $_FILES['foto']['type'];
            $date = date("d-m-Y_h-i-s A"); //El nuevo nombre de la imagen será la hora actual en ese momento
            $temp = explode(".", $filename); //Quita la extensión del archivo
            $new_filename = $date . '.' . end($temp);//El nuevo nombre del archivo es la fecha y hora anterior de $date mas la extensión del archivo temporal del navegador
            $f_folder = "../../assets/directorio/" . DIRECTORY_SEPARATOR . $new_filename;//Ruta del archivo a la carpeta dentro del host
            move_uploaded_file($tmp_name, $f_folder);//Mueve el archivo a la carpeta

            // Borramos la imagen anterior
            // unlink($foto, $f_folder);
            $fotoPathCompleto = $f_folder.$foto;
            if(unlink(dirname(__FILE__)."/../../assets/directorio/".$foto)){
                $noti = "Se borra correctamente";
            }else{
                $noti = "No se está borrando";
                // if(file_exists(dirname(__FILE__)."/../../assets/directorio/".$foto)){
                //     $noti .= "Sí existe el archivo";
                // }
            }
            $sql = "UPDATE directorio SET area= '".$area."', nombre = '".$nombre."', especialidad='".$especialidad."', descripcion='".$descripcion."', ubicacion='".$ubicacion."', bio='".$bio."', foto='".$new_filename."' WHERE idMed='".$id."'";
        }else{
            $sql = "UPDATE directorio SET area= '".$area."', nombre = '".$nombre."', especialidad='".$especialidad."', descripcion='".$descripcion."', ubicacion='".$ubicacion."', bio='".$bio."' WHERE idMed='".$id."'";
        }
        
        // $ruta = "assets/directorio/".$new_filename;//La ruta del archivo, se ingresa a la tabla
        $result = $conn->query($sql);
        
        //Cerramos conexión
        $conn->close();

        echo "Actualización correcta";

        $noti = "Actualizado con éxito";
                                
        $notiCK = "notificacion";
        $notiCK_value = $noti;
        setcookie($notiCK, $notiCK_value, 0, "/"); // 86400 = 1 day
        
        header("location: ../directorio.php");
    }
    
//Finaliza Script PHP


?>