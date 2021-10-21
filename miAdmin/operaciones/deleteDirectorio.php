<?php
    
    include("db.php");//Incluye los datos de acceso a la BD
    $conn = mysqli_connect($servername, $username, $password, $database);//Sentencia de conexión

    if (!$conn) {//Si la conexión no es exitosa no muestra los datos
        die("Connection failed: " . mysqli_connect_error());
        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
    }
    else{//Conexión exitosa
        date_default_timezone_set("America/Mexico_City");//Dinfe la zona horaria a la de méxico

        // Consigue los datos del form de directorio
        $id = $_POST['idToDelete'];
        // Borrar también la img de la carpeta
        $pathImg = $_POST['fotoToDelete'];


        $sql = "DELETE FROM directorio WHERE idMed='".$id."'";
        $result = $conn->query($sql);

        // Si no falla el query entonces se borra la img
        if($result){
            if(unlink(dirname(__FILE__)."/../../assets/directorio/".$pathImg)){
                $noti = "Se borra correctamente";
            }else{
                $noti = "No se está borrando";
            }
        }
        
        //Cerramos conexión
        $conn->close();

        echo "Eliminación correcta";

        $noti = "Eliminado con éxito";
                                
        $notiCK = "notificacion";
        $notiCK_value = $noti;
        setcookie($notiCK, $notiCK_value, 0, "/"); // 86400 = 1 day
        
        header("location: ../directorio.php");
    }
    
//Finaliza Script PHP


?>