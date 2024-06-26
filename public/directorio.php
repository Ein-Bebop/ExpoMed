<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#522d6d">
    <link rel="icon" href="../icons/favicon.png">
    <title>Directorio</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/fontello.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../OwlCarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="../OwlCarousel/owl.theme.default.min.css">
    
</head>
<body>

    <header id="header">
        <div id="header-logo"><img src="../assets/Logo_Blanco.svg" onclick="window.location.href='home.html'"></div>
        <label id="menu-open" class="icon-menu" onclick="openM();"></label>
        <div id="header-bar">
            <label id="menu-close" class="icon-cancel" onclick="closeM();"></label>
            <style>.header-o a{color: #fff;}</style>
            <div class="header-o" ><a href="talleres.php">Talleres</a><span id="border-b"></span></div>
            <div class="header-o" ><a href="atencion.html">Atención</a><span id="border-b"></span></div>
            <div class="header-o" ><a id="o-activo">Directorio</a><span id="border-b"></span></div>
            <div class="header-o" ><a href="afiliacion.html">Afiliación</a><span id="border-b"></span></div>
        </div>
        <div id="header-dim" onclick="closeM();"></div>
    </header>

    <section id="home-container" responsive-dir="home">
        <div id="home-titulo">Directorio Internacional</div>
        <div id="barra-busqueda">
            <select class="busqueda-filtro" name="filtro" id="busquedamain">
                <option value="Area">
                  Área
                </option>
                <option value="Nombre" selected>Nombre</option>
                <option value="Lugar">Ubicación </option>
                <!-- <option value="Etc">Professional</option> -->
            </select>
            <div id="busqueda-caja"><input id="buscarmedico" type="text" placeholder="Buscar"></div>
            <div id="busqueda-boton" onclick="filtroBusqueda();">Buscar <p class="icon-search-1"></p></div>
        </div>
    </section>

    <style>
    .prof-button:hover{
        background-color:#522d6d;
        color:#fff;
    }

    #busqueda-boton:hover{
        background-color:#522d6d !important;
        color:#fff !important;
    }

    .botones-container div:hover, .se-nosotros-button:hover, .se-aprende-button:hover,.capacitacion-info-button:hover{
        background-color:#522d6d !important;
        
    }

    form button:hover{
            background-color:#522d6d !important;
    }

    </style>    

    <section id="directorio-container">
        <div id="directorio-search-bar">
            <div id="filtrar-texto">Filtrar</div>


            <div class="container-dir"> 
                <!-- <div class="sub-title">Por Calificación</div>
                <select id="estrellas" class="busqueda-filtro" name="filtro" >
                    <option value="5" selected>★★★★★</option>   
                    <option value="4">★★★★☆ </option>
                    <option value="3">★★★☆☆</option>
                    <option value="2">★★☆☆☆</option>
                    <option value="1">★☆☆☆☆</option>
                </select> -->
                <div class="sub-title" onclick="borrarFiltro();" style="cursor:pointer">Borrar Filtro</div>
            </div>


             <div class="container-dir"> 
                <div class="sub-title">Por Área</div>

                <select class="busqueda-filtro" name="filtro" id="area-f" onchange="tag()">
                    <option value="" >Seleccionar area</option>
<?php
                include('../miAdmin/operaciones/db.php');
                $conn = mysqli_connect($servername, $username, $password, $database);

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                    echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
                }
                else{
                    //Conexión exitosa
                    $sql = "SELECT DISTINCT(area) as ar FROM directorio ORDER BY area ASC";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows >= 1) {
                        
                        while($row = $result->fetch_assoc()) {
                            
                            echo  '<option value="'.$row['ar'].'">'.$row['ar'].'</option>';
                            
                        }

                    }
                    
                    else {//Salida de datos si NO existen datos en la tabla
                          
                    }

                    $conn->close();
                }
?>
                </select>
            </div>

            <div class="container-dir"> 
                <div class="sub-title">Por Ubicación</div>
                <select class="busqueda-filtro" name="filtro" id="ubicacion-f" onchange="tag2()">
                    <option value="" >Seleccionar Ubicacion</option>
<?php
                include('../miAdmin/operaciones/db.php');
                $conn = mysqli_connect($servername, $username, $password, $database);

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                    echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
                }
                else{
                    //Conexión exitosa
                    $sql = "SELECT DISTINCT(ubicacion) as ub FROM directorio ORDER BY ubicacion ASC";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows >= 1) {
                        
                        while($row = $result->fetch_assoc()) {
                            
                            echo  '<option value="'.$row['ub'].'">'.$row['ub'].'</option>';
                            
                        }

                    }
                    
                    else {//Salida de datos si NO existen datos en la tabla
                          
                    }

                    $conn->close();
                }
?>
                </select>
            </div>

            <!-- <div class="container-dir"> 
                <select id="alfa" class="busqueda-filtro" name="filtro" id="">
                    <option value="area" selected>Orden Alfbetico</option>
                    <option value="nombre">Orden Alfbetico</option>
                    <option value="Lugar">Orden Alfbetico</option>
                    <option value="Etc">Orden Alfbetico</option>
                </select>
            </div> -->

        </div>

        <div id="directorio-cards">
            <div id="reslutados-texto">Resultados de la búsqueda :&nbsp;<div id="resultado-texto"></div></div>
            <!-- <div class="resultados-paginas">Página<p id="pagina-actual">1</p> de <p id="paginas-totales">5</p>
                <label class="left-page"><</label>&nbsp;<label class="right-page">></label>
            </div> -->

            <?php
                include('../miAdmin/operaciones/db.php');
                $conn = mysqli_connect($servername, $username, $password, $database);

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                    echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
                }
                else{
                    //Conexión exitosa
                    $sql = "SELECT * FROM directorio ORDER BY `idMed` DESC";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows >= 1) {
                        
                        echo '<div class="owl-carousel owl-theme dir-slider">';
                        $id=0;//ID de filas

                        while($row = $result->fetch_assoc()) {
                            
                            echo    '<div class="card-medico slide" data-slide-index="'.$id.'">';
                            echo    '<div class="card-categoria">Cultura</div>';
                            echo    "<div class='card-img-container'><div class='card-img' style='background-image: url(".'"'."../assets/directorio/".$row['foto']."');'></div></div>";
                            echo    '<div class="card-rama">'.$row['area'].'</div>';
                            echo    '<div class="card-nombre">'.$row['nombre'].'</div>';
                            echo    '<div class="card-especialidad">'.$row['especialidad'].'</div>';
                            echo    '<div class="card-descripcion">'.$row['descripcion'].'</div>';
                            echo    '<div class="card-ver-mas">Ver más</div>';
                            echo    '<div class="card-ubicacion">'.$row['ubicacion'].'</div>';
                            echo    '</div>';
                            
                            $id++;
                        }

                        echo '</div>';

                    }
                    
                    else {//Salida de datos si NO existen datos en la tabla
                            echo "<table>";
                            echo "<tr>";
                            echo "<th> No Hay Registros </th>";
                            echo "</tr>";
                            echo "</table>";
                    }

                    $conn->close();
                }
            ?>

            <!-- <div class="boton-tarjetas-final">Página Siguiente ></div> -->

        </div>
    </section>

    <style>

        .afiliarse .afiliarse-background-container{
            
        }

        @media (min-width:320px) and (max-width:800px){
            .afiliarse-info{
                border-top-right-radius: 0% !important;
                border-bottom-right-radius: 0% !important;
                top: -670px !important;
            }

            .afiliarse-descargar, .afiliarse-boton{
                margin-left: 20px !important;
            }
        }

        @media (min-width:510px) and (max-width:878px){
            .afiliarse-info{
                padding-bottom: 60px !important;
            }
        }


        @media (min-width:768px) and (max-width:801px){
            .afiliarse-info{
                top: -531px !important;
            }

            .se-aprende{
                height: auto !important;
                margin-top: 60px !important;
            }

            .se-aprende .se-aprende-info{
                width: 100%;
            }
        }

        @media (min-width:801px) and (max-width:1000px){
            .afiliarse-info{
                top: -604px !important;
                width: 90% !important;
                margin-left: 50px;
            }

            .afiliarse{
                height:650px !important;
            }
        }

        @media (min-width:880px) and (max-width:1000px){
            .afiliarse-info{
                
            }
        }

        @media (min-width:1024px) and (max-width:1600px){
            .afiliarse-info{
                top: -530px !important;
                width: 80% !important;
            }
        }

        @media (min-width:1300px) and (max-width:1600px){
            .afiliarse-info{
                top: -500px !important;
            }
        }

        @media (min-width:1600px) and (max-width:1800px){
            .afiliarse-info{
                
                
            }
        }


        @media (min-width:1920px) and (max-width:2500px){
            .afiliarse-info{
              
                
            }
        }
        
        

    </style>

    <section class="afiliarse" style="border-bottom-left-radius: 0px !important;">

        <div class="afiliarse-background-container">
            <div class="afiliarse-background"></div>
        </div>
        
        <div class="afiliarse-info">
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

    <div class="contacto" style="border-top-right-radius: 0; padding-top: 150px">
        <div class="message-contact">
            <h1>Contacto</h1>
            <h2>
                ¡Estar aquí significa que ya eres parte de nosotros! Pero si quieres ir
                mucho más profundo y aprender o ayudar a que otra persona
                crezca, ponte en contacto con nosotros. Nuestro esquema depende
                de la comunidad y el crecimiento de todos. ¡Deja tus datos y nos
                pondremos en contacto contigo!
            </h2>
            <div class="datosExpo">
                <h3><a class="icon-mail"></a>hola@eemttc.org</h3>
                <h3><a class="icon-cel"></a>55 59 60 7839</h3>
                <h3><a class="icon-time"></a>Lunes a Viernes 9:00 - 18:00</h3>
                <h3><a class="icon-phone"></a>01 800 4530 5678</h3>
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
    <script src="../js/filtros.js"></script>
    <script src="../OwlCarousel/jquery.min.js"></script>
    <script src="../OwlCarousel/owl.carousel.min.js"></script>
    <script type="text/javascript">
        

        $(document).ready(function() {
        var el = $('.owl-carousel');
        
        var carousel;
        var carouselOptions = {
            lazyLoad: true,
            margin: 20,
            nav: false,
            dots: true,
            slideBy: 'page',
            responsive: {
            0: {
                items: 1,
                rows: 2 //custom option not used by Owl Carousel, but used by the algorithm below
            },
            768: {
                items: 2,
                rows: 3 //custom option not used by Owl Carousel, but used by the algorithm below
            },
            991: {
                items: 3,
                rows: 2 //custom option not used by Owl Carousel, but used by the algorithm below
            }
            }
        };

        //Taken from Owl Carousel so we calculate width the same way
        var viewport = function() {
            var width;
            if (carouselOptions.responsiveBaseElement && carouselOptions.responsiveBaseElement !== window) {
            width = $(carouselOptions.responsiveBaseElement).width();
            } else if (window.innerWidth) {
            width = window.innerWidth;
            } else if (document.documentElement && document.documentElement.clientWidth) {
            width = document.documentElement.clientWidth;
            } else {
            console.warn('Can not detect viewport width.');
            }
            return width;
        };

        var severalRows = false;
        var orderedBreakpoints = [];
        for (var breakpoint in carouselOptions.responsive) {
            if (carouselOptions.responsive[breakpoint].rows > 1) {
            severalRows = true;
            }
            orderedBreakpoints.push(parseInt(breakpoint));
        }
        
        //Custom logic is active if carousel is set up to have more than one row for some given window width
        if (severalRows) {
            orderedBreakpoints.sort(function (a, b) {
            return b - a;
            });
            var slides = el.find('[data-slide-index]');
            var slidesNb = slides.length;
            if (slidesNb > 0) {
            var rowsNb;
            var previousRowsNb = undefined;
            var colsNb;
            var previousColsNb = undefined;

            //Calculates number of rows and cols based on current window width
            var updateRowsColsNb = function () {
                var width =  viewport();
                for (var i = 0; i < orderedBreakpoints.length; i++) {
                var breakpoint = orderedBreakpoints[i];
                if (width >= breakpoint || i == (orderedBreakpoints.length - 1)) {
                    var breakpointSettings = carouselOptions.responsive['' + breakpoint];
                    rowsNb = breakpointSettings.rows;
                    colsNb = breakpointSettings.items;
                    break;
                }
                }
            };

            var updateCarousel = function () {
                updateRowsColsNb();

                //Carousel is recalculated if and only if a change in number of columns/rows is requested
                if (rowsNb != previousRowsNb || colsNb != previousColsNb) {
                var reInit = false;
                if (carousel) {
                    //Destroy existing carousel if any, and set html markup back to its initial state
                    carousel.trigger('destroy.owl.carousel');
                    carousel = undefined;
                    slides = el.find('[data-slide-index]').detach().appendTo(el);
                    el.find('.fake-col-wrapper').remove();
                    reInit = true;
                }


                //This is the only real 'smart' part of the algorithm

                //First calculate the number of needed columns for the whole carousel
                var perPage = rowsNb * colsNb;
                var pageIndex = Math.floor(slidesNb / perPage);
                var fakeColsNb = pageIndex * colsNb + (slidesNb >= (pageIndex * perPage + colsNb) ? colsNb : (slidesNb % colsNb));

                //Then populate with needed html markup
                var count = 0;
                for (var i = 0; i < fakeColsNb; i++) {
                    //For each column, create a new wrapper div
                    var fakeCol = $('<div class="fake-col-wrapper"></div>').appendTo(el);
                    for (var j = 0; j < rowsNb; j++) {
                    //For each row in said column, calculate which slide should be present
                    var index = Math.floor(count / perPage) * perPage + (i % colsNb) + j * colsNb;
                    if (index < slidesNb) {
                        //If said slide exists, move it under wrapper div
                        slides.filter('[data-slide-index=' + index + ']').detach().appendTo(fakeCol);
                    }
                    count++;
                    }
                }
                //end of 'smart' part

                previousRowsNb = rowsNb;
                previousColsNb = colsNb;

                if (reInit) {
                    //re-init carousel with new markup
                    carousel = el.owlCarousel(carouselOptions);
                }
                }
            };

            //Trigger possible update when window size changes
            $(window).on('resize', updateCarousel);

            //We need to execute the algorithm once before first init in any case
            updateCarousel();
            }
        }

        //init
        carousel = el.owlCarousel(carouselOptions);
        });

        


    </script>
</body>
</html>