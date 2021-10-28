<?php 
    date_default_timezone_set("America/Mexico_City");
    $date = date("Y-m-d");
    $id = $randomSixDigitInt = \random_int(10000000, 99999999);

    $nombre = $_POST['nombre'];
    $email = $_POST['correo'];
    $asunto = $_POST['asunto'];
    $telefono = $_POST['tel'];
    $msg = $_POST['msg'];
                
    $to = "eemttc.hola@gmail.com"; // Send to ourselves
    $from = "EXPO MED <hola@eemttc.org>";
    $subject = $nombre.' desea contactarte!'; // Give the email a subject 
    
    $message = '<html><body style="background:#f5f5f5;">';//Inicia Body
    $message .= '<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">';//Importa la fuente
    
    $message .='<img style="width:100%;display:block;margin:20px auto;" src="https://eemttc.org/assets/Logo_Color.svg">';//Agrega la imagen del logo
    
    $message .= '<div style="width:100%;height:1px;background:#ddd;margin-bottom:50px;"></div>';//Separador
    
    $message .= '<div style="width:80%;margin:0 auto;text-align:justify;style="background:#fff;">';//Inicia contenedor
    $message .='<h2 style="width:100%;text-align:center;color:#000">Alguien desea contactarte</h2>';
    $message .='<h2 style="width:100%;text-align:center;color:#000">Datos de contacto:'.$nombre.' <br> '.$email.' <br> '.$asunto.' <br> '.$telefono.' <br> '.$msg.'</h2>';
    $message .= '</div>';//Cierra contenedor
    $message .= '<div style="width:100%;height:1px;background:#ddd;margin-top:50px;margin-bottom:50px;"></div>';//Separador
    
    
    $message .= '</body></html>';//Cierra Body

    // Set from headers
    $headers =  "From: ".($from)."\r\n";
    $headers .= "Reply-To: ".($from)."\r\n";
    $headers .= "Return-Path: ".($from)."\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "X-Priority: 3\nX-MSmail-Priority: high";
    $headers .= "X-Mailer: PHP".phpversion()."\r\n";

    $result = mail($to,$subject,$message,$headers);
    if($result){
        $noti = "Correo enviado correctamente.";
    }else{
        $noti = "Error al enviar correo.";
    }
        
    $notiCK = "notificacion";
    $notiCK_value = $noti;
    setcookie($notiCK, $notiCK_value, 0, "/"); // 86400 = 1 day
    
    echo $noti;
    // header('Location: ../../public/home.html');

?>