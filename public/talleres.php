<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../icons/favicon.png">
    <title>Expo Encuentro | Talleres</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/fontello.css">
    <!-- Styles para el slider-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="../slick/slick-theme.css"/>
    <link rel="stylesheet" href="../OwlCarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="../OwlCarousel/owl.theme.default.min.css">
    
</head>
<body></body>
    <header id="header">
        <div id="header-logo"><img src="../assets/Logo_Color.svg" id="color-img-ch" onclick="window.location.href='home.html'"></div>
        <label id="menu-open" class="icon-menu" onclick="openM();" style="color: #ffb259;"></label>
        <div id="header-bar">
            <label id="menu-close" class="icon-cancel" onclick="closeM();" ></label>
            <style>.header-o a{color: #ffb259;}#border-b{background-color: #ffb259 !important;width: 0%;}</style>
            <div class="header-o"  id="o-activo"><a>Talleres</a><span id="border-b"></span></div>
            <div class="header-o"  ><a href="atencion.html">Atención</a><span id="border-b"></span></div>
            <div class="header-o"  ><a href="directorio.php">Directorio</a><span id="border-b"></span></div>
            <div class="header-o"  ><a href="afiliacion.html">Afiliación</a><span id="border-b"></span></div>
        </div>
        <div id="header-dim" onclick="closeM();"></div>
    </header>  

    <div class="home-bienestar" style="background:#fff;">
        <div class="tall-tit-text">Crecer en<br> compañía<br> es mejor</div>
        <div class="at-desc-text">Desarróllate, aprende y crece de la mano de expertos y profesionales en el área de Medicina Tradicional y Terapias Complementarias.</div>
        <img class="tall-img" src="../assets/Web_TalleresM_Talleres_IMG.webp">
    </div>

        <?php
            include('../miAdmin/operaciones/db.php');
            $conn = mysqli_connect($servername, $username, $password, $database);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
                echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
            }
            else{
                //Conexión exitosa
                $sql = "SELECT * FROM talleres ORDER BY `idTaller` DESC";
                $result = $conn->query($sql);
                
                if ($result->num_rows >= 1) {

                    $firstrow = $result->fetch_assoc();

                    echo '<div class="taller-video" style="background:#fff;">';
                    // echo '<div class="taller-thumbnail" style="background-image: url('.'"../assets/talleres/'.$firstrow['img'].') !important;"></div>';
                    echo '<div class="taller-thumbnail" style="background-image: url('."'"."../assets/talleres/".$firstrow['img']."'".')"></div>';
                    echo '<div class="video-desc">';
                    echo '<div class="taller-tipo">'.$firstrow['tipo'].'</div>';
                    echo '<div class="taller-imparte">'.$firstrow['imparte'].'</div>';
                    echo '<div class="taller-nombre"><a style="color:#522d6d !important;" target="_blank" href="'.$firstrow['link'].'">'.$firstrow['nombre'].'</a></div>';
                    echo '</div>';
                    echo '</div>';

                    echo '<section id="cartasTalleres">';
                    
                    echo '<div class="owl-carousel owl-theme talleres-slider">';

                    

                    while($row = $result->fetch_assoc()) {
                        $tipo = $row['tipo'];
                        $nombre = $row['nombre'];
                        $imparte = $row['imparte'];
                        $brief = $row['brief'];
                        $link = $row['link'];
                        $foto = $row['img'];
                        
                        echo '<div class="card-taller">';
                        echo '<div class="taller-image">';
                        echo'<img src="../assets/talleres/'.$foto.'">';
                        echo '</div>';
                        echo '<div class="taller-desc">';
                        echo '<div class="taller-tipo">'.$tipo.'</div>';
                        echo '<div class="taller-imparte">'.$imparte.'</div>';
                        echo '<div class="taller-nombre"><a style="color:#522d6d !important;" target="_blank" href="'.$link.'">'.$nombre.'</a></div>';
                        echo '<div class="taller-brief">'.$brief.'</div>';
                        echo '</div>';
                        echo '</div>';
                        
                    }

                    echo '</div>';

                }
                $conn->close();
            }
        ?>
    </section>  
    <style>.resena{margin-top: 30px;}</style>
    <section class="resena">
        <div class="resena-texto">“Me encantó el taller de Terapia Floral. Lo aprendido es un gran apoyo para los tratamientos a diferentes padecimientos a través de los elixires. La manera en que la maestra Brenda lo realizó, muy bien explicado y el material compartido un gran apoyo. Gracias.”</div>
        <!-- <div class="resena-resenador">Teresa Ordóñez</div> -->
        <!-- <div class="resena-especialidad">Experta en terapias florales</div> -->
    </section>
    
<!-- Estilo Botones -->
<style>
    .prof-button:hover{
        background-color:#522d6d;
        color:#fff;
    }

    .botones-container div:hover{
        background-color:#522d6d !important;
        
    }

    form button:hover{
            background-color:#522d6d !important;
    }

</style>

    <section class="profesionalizate">
        <form action="../miAdmin/operaciones/suscribeNews.php" method="post" enctype="multipart/form-data">
            <div class="prof-titulo">¡Profesionalizate!</div>
            <div class="prof-desc">Capacítate y profesionalizate con nuestros Cursos, Seminarios, Talleres, Conferencias, donde se analizan temas de actualidad, profesionalización o formación, en línea o presenciales
                ¡Deja tu correo y te mandaremos información de las distintas oportunidades para que crezcas en conocimiento!
            (Si eres afiliado o socio de EXPO ENCUENTRO MTTC, aprovecha los grandes descuentos)
            </div>
            <input class="prof-input" name="emailSuscribe" placeholder="Ingresa tu correo para recibir de nuestros talleres, cursos, etc.">
            <input class="prof-button" type="submit" value="Suscribirse"/>
        </form>

        <section class="prox-eventos">
            <div class="eventos-tit">Próximos Eventos</div>
                <section id="cartasTalleres" style="background: none; height: 430px;">
                <?php
                    include('../miAdmin/operaciones/db.php');
                    $conn = mysqli_connect($servername, $username, $password, $database);

                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
                    }
                    else{
                        //Conexión exitosa
                        $sql = "SELECT * FROM eventos ORDER BY `idTaller` DESC";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows >= 1) {
                            
                            echo '<div class="owl-carousel owl-theme talleres-slider">';

                            while($row = $result->fetch_assoc()) {
                                $tipo = $row['tipo'];
                                $nombre = $row['nombre'];
                                $imparte = $row['imparte'];
                                $brief = $row['brief'];
                                $link = $row['link'];
                                $foto = $row['img'];
                                
                                echo '<div class="card-taller">';
                                echo '<div class="taller-image">';
                                echo'<img src="../assets/eventos/'.$foto.'">';
                                echo '</div>';
                                echo '<div class="taller-desc">';
                                echo '<div class="taller-tipo">'.$tipo.'</div>';
                                echo '<div class="taller-imparte">'.$imparte.'</div>';
                                echo '<div class="taller-nombre">'.$nombre.'</div>';
                                echo '<div class="taller-brief"><a href="'.$link.'">'.$brief.'</a></div>';
                                echo '</div>';
                                echo '</div>';
                                
                            }

                            echo '</div>';

                        }
                        $conn->close();
                    }
                ?>
                </section>
            </div>
        </section>
    </section>

    <section class="comunidad">
        <div class="comunidad-tit">
            Participa en nuestros eventos<br> y sé parte de la comunidad.
        </div>
        <!--<div class="comunidad-gallery">
             <div class="slider">
                    <div class="comunidad-img" style="background-image: url('../assets/talleres/slider/1.jpg');"></div>
                    <div class="comunidad-img" style="transform: scaleX(-1);background-image: url('../assets/talleres/slider/1.jpg');"></div>
            </div>  
        </div>
        -->
        
        <div class="owl-carousel comunidad-slider">
            <div class="comunidad-img" style="background-image: url('../assets/talleres/slider/1.webp');"></div>
            <div class="comunidad-img" style="background-image: url('../assets/talleres/slider/2.webp');"></div>
            <div class="comunidad-img" style="background-image: url('../assets/talleres/slider/3.webp');"></div>
            <div class="comunidad-img" style="background-image: url('../assets/talleres/slider/4.webp');"></div>
            <div class="comunidad-img" style="background-image: url('../assets/talleres/slider/5.webp');"></div>
            <div class="comunidad-img" style="background-image: url('../assets/talleres/slider/6.webp');"></div>
            <div class="comunidad-img" style="background-image: url('../assets/talleres/slider/7.webp');"></div>
            <div class="comunidad-img" style="background-image: url('../assets/talleres/slider/8.webp');"></div>
            <div class="comunidad-img" style="background-image: url('../assets/talleres/slider/9.webp');"></div>
        </div>
    </section>


    <style>

        .afiliarse .afiliarse-background-container{
            height: 600px !important;
        }

        @media (min-width:320px) and (max-width:800px){
            .afiliarse-info{
                border-top-right-radius: 0% !important;
                top: -750px !important;
            }

            .afiliarse-descargar, .afiliarse-boton{
                margin-left: 20px !important;
            }
        }

        @media (min-width:510px) and (max-width:878px){
            .afiliarse-info{
                border-bottom-right-radius: 0% !important;
                padding-bottom: 60px !important;
            }
        }


        @media (min-width:768px) and (max-width:801px){
            .afiliarse-info{
                padding-bottom: 80px !important;
                top: -600px !important;
            }
        }

        @media (min-width:801px) and (max-width:1000px){
            .afiliarse-info{
                top: -591px !important;
                margin-left: 100px !important;
                width: 90% !important;
            }
        }

        @media (min-width:880px) and (max-width:1000px){
            .afiliarse-info{
                padding-bottom: 60px !important;
                width: 70% !important;
            }
        }

        @media (min-width:1024px) and (max-width:1600px){
            .afiliarse-info{
                top: -576px !important;;
                width: 70% !important;
                
            }
        }

        @media (min-width:1600px) and (max-width:1800px){
            .afiliarse-info{
                top: -530px !important;
                
            }
        }


        @media (min-width:1920px) and (max-width:2500px){
            .afiliarse-info{
                top: -530px !important;
                
            }
        }
        
        

    </style>

    <section class="afiliarse" style="border-top-left-radius:0;border-bottom-left-radius:150px;padding-bottom: 100px; height: 625px;">

        <div class="afiliarse-background-container">
            <div class="afiliarse-background"></div>
        </div>
        
        <div class="afiliarse-info" style="top: -450px;">
            <div class="afiliarse-titulo">Sé parte de EEMTTC</div>
            <div class="afiliarse-desccripcion" style="margin-top: 5px;">¿Quieres formar parte de la red de Médicos Tradicionales y Terapeutas más grande? Afiliate a nosotros y obtén increibles beneficios al igual que compartes tu profesión con gente que lo necesita.</div>
            <div class="afiliarse-beneficios" style="margin-top: 10px; margin-bottom: 0;">Beneficios</div>
            <div class="afiliarse-lista" style="margin-top: 0;"><li>Colaboración en iniciativas dentro de la Asociación.</li></div>
            <div class="afiliarse-lista"><li>Formar parte del Directorio Internacional.</li></div>
            <div class="afiliarse-lista"><li>Beneficios de network.</li></div>
            <div class="afiliarse-lista"><li>Descuentos, promociones, e invitaciones especiales a eventos o capacitaciones.</li></div>
            <div class="afiliarse-lista"><li>Credencial de Afiliación.</li></div>
            <div class="afiliarse-lista"><li>y muchos más...</li></div>
            <div class="afiliarse-desccripcion">Completa el formato de afiliación con la información y documentación requerida y envíalo al correo afiliacion@eemttc.org. Nuestro equipo se comunicará contigo para completar el proceso.</div>
            <div class="botones-container" style="margin-top: 1rem;">
                <div class="afiliarse-descargar"><a href="../assets/bases-expoencuentro.pdf" download="Bases Expoencuentro">Descargar Bases</a></div>
                <div class="afiliarse-boton"><a href="../assets/bases-expoencuentro.pdf" download="Bases Expoencuentro">Quiero Afiliarme</a></div>
            </div>
            
        </div>
        
    </section>

    <section class="siguenos">
        <div class="siguenos-tit">
            Síguenos en nuestras redes
        </div>
        <div class="redes-sociales">
            <a class="icon-icon_sm_fb" href="https://www.facebook.com/ExpoEncuentroMedicinaTradicionalYTerapias" target="_blank"></a>
            <a class="icon-icon_sm_youtube" href="https://youtube.com/channel/UC4FapmbeW4_EikKqCvbUdRA" target="_blank"></a>
            <a class="icon-icon_sm_ig" style="margin-left: 15px;" href="https://www.instagram.com/medicinatradicionalyterapias/" target="_blank"></a>
            <a class="icon-001-tik-tok" href="https://vm.tiktok.com/ZMeyFShYA/" target="_blank"></a>
            <a class="icon-001-telegram" href="https://t.me/MedicinaTradicionalYTerapias" target="_blank"></a>
            <a class="icon-icon_sm_twt" href="https://twitter.com/medicin_terapia" target="_blank"></a>
        </div>
    </section>

    <div class="contacto" style="position: relative;z-index: 2;margin-top: -150px;">
        <div class="message-contact">
            <h1>Contacto</h1>

            <h2>¡Estar aquí significa que ya eres parte de nosotros! Pero si quieres ir<br>
                mucho más profundo y aprender o ayudar a que otra persona <br>
                crezca, ponte en contacto con nosotros. Nuestro esquema depende <br>
                de la comunidad y el crecimiento de todos. ¡Deja tus datos y nos <br>
                pondremos en contacto contigo!
            </h2>
            <div class="datosExpo">
                <h3><a class="icon-at"></a>hola@eemttc.org</h3>
                <h3><a class="icon-phone"></a>322 266 8193 </h3>
                <h3><a class="icon-time"></a>Lunes- Viernes 10:00-22:00 </h3>
                <h3><a class="icon-phone"></a>Horario de llamadas 18:00-22:00</h3>
            </div>
        </div>

        <div class="formcontact">
            <form class="contact-form" action="../miAdmin/operaciones/contactoMail.php" method="post">
                <label>Nombre</label><br>
                <input type="text" class="nombre-input" name="nombre" placeholder="Nombre">
                
                <br><br>
                <label>Correo</label><br>
                <input type="text" class="correo-input" name="correo" placeholder="Correo">

                <br><br>

                <div class="fila-asunto-tel">
                    <div class="bloque-asunto">
                        <label id="asunto-label">Asunto</label>
                        <select type="text" class="asunto-input" name="asunto" placeholder="Asunto">
                            Asunto
                            <option value="Consulta Médica">Consulta Médica</option>
                            <option value="Consulta Médica">Talleres</option>
                            <option value="Consulta Médica">Información General</option>
                            <option value="Consulta Médica">Afiliación</option>
                            <option value="Consulta Médica">Servicios</option>
                        </select>
                    </div>
    
                    <div class="bloque-tel">
                        <label id="tel-label">Teléfono</label>
                        <input type="text" class="telefono-input" name="tel" placeholder="Teléfono">
                    </div>
                </div>
                <br>
                <label>Mensaje</label><br>
                <input type="text" class="mensaje-input" name="msg" placeholder="Mensaje">

                <br><br>
                <button type="submit">Enviar</button>
            </form>
        </div>
        
    </div>

    <div class="footer">
        <div class="mapa-sitio">
            <h3>Mapa del sitio</h3>

            <ul>
                <li><a href="home.html">Inicio</a></li>
                <li><a href="talleres.php">Talleres</a></li>
                <li><a href="atencion.html">Atención</a></li>
                <li><a href="directorio.php" >Directorio</a></li>
                <li><a href="" class="footer-li-dir">Afiliación</a></li>
            </ul>            
        </div>

        <div class="forma-parte-footer">
            <h3>Forma parte de EEMTTC</h3>
            <ul>
                <li><a href="../assets/bases-expoencuentro.pdf" download="Bases Expoencuentro">Descargar Bases</a></li>
                <li><a href="../assets/bases-expoencuentro.pdf" download="Bases Expoencuentro">Afiliación</a></li>
                <li><a href="/">¡Contáctanos!</a></li>
            </ul>
        </div>

        <div class="footer-logo"><img src="../assets/Logo_Blanco.svg"></div>

        <div class="nuestras-redes">
            <h2>¡Síguenos en nuestras redes!</h2>
            <div class="redes-sociales">
                <a class="icon-icon_sm_fb" href="https://www.facebook.com/ExpoEncuentroMedicinaTradicionalYTerapias" target="_blank"></a>
                <a class="icon-icon_sm_youtube" href="https://youtube.com/channel/UC4FapmbeW4_EikKqCvbUdRA" target="_blank"></a>
                <a class="icon-icon_sm_ig" style="margin-left: 15px;" href="https://www.instagram.com/medicinatradicionalyterapias/" target="_blank"></a>
                <a class="icon-001-tik-tok" href="https://vm.tiktok.com/ZMeyFShYA/" target="_blank"></a>
                <a class="icon-001-telegram" href="https://t.me/MedicinaTradicionalYTerapias" target="_blank"></a>
                <a class="icon-icon_sm_twt" href="https://twitter.com/medicin_terapia" target="_blank"   ></a>
                
            </div>
        </div>

    </div>
    
    <script src="../js/header.js"></script>
    <script src="../OwlCarousel/jquery.min.js"></script>
    <script src="../OwlCarousel/owl.carousel.min.js"></script>
    <script type="text/javascript">
        $('.talleres-slider').owlCarousel({
            loop:true,
            margin:0,
            nav:false,
            responsive:{
                0:{
                    items:1,
                    margin: 0
                },
                768:{
                    items:2,
                    margin:-10
                },
                1160:{
                    items:3
                },
                1920:{
                    items:4
                }
            }
        })

        $('.comunidad-slider').owlCarousel({
            loop:true,
            margin:0,
            nav:false,
            responsive:{
                0:{
                    items:1,
                },
                1920:{
                    items: 1,
                }
            }
        })

    </script>
</body>
</html>