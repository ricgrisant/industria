
<!DOCTYPE html>
<html lang="en">

<head>
    <title>The Travel - Tour Travel</title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- FAV ICON -->
    <link rel="shortcut icon" href="images/fav.ico">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:400,500,700" rel="stylesheet">
    <!-- FONT-AWESOME ICON CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!--== ALL CSS FILES ==-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/mob.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/toastr.css"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>

    <!-- MOBILE MENU -->
    <section>
        <div class="ed-mob-menu">
            <div class="ed-mob-menu-con">
                <div class="ed-mm-left">
                    <div class="wed-logo">
                        <a href="index.html"><img src="images/logo.png" alt="" />
                        </a>
                    </div>
                </div>
                <div class="ed-mm-right">
                    <div class="ed-mm-menu">
                        <a href="#!" class="ed-micon"><i class="fa fa-bars"></i></a>
                        <div class="ed-mm-inn">
                            <a href="#!" class="ed-mi-close"><i class="fa fa-times"></i></a>
                            <h4>Categorías</h4> 
                            <ul>
                                <li><a href="family-package.html">Paquetes</a></li>
                                <li><a href="booking-all.html">Lugares</a></li>
                                <li><a href="hotels-list.html">Transporte</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="booking-hotel.html">Hoteles</a></li>
                            </ul>
                            <h4>Paquetes Turisticos</h4>
                            <ul>
                                <li><a href="">Ver Todos</a></li>
                                <li><a href="">Paquetes Familiares</a></li>
                                <li><a href="">Luna de Miel</a></li>
                                <li><a href="">Grupos</a></li>
                                <li><a href="">Fin de Semana</a></li>
                                <li><a href="">Personalizarlo</a></li>
                            </ul>
                            <h4>Mi Tablero</h4>
                            <ul>
                                <li><a href="">Mis reservas</a></li>
                                <li><a href="">Mi Perfil</a></li>
                                <li><a href="">Editar Perfil</a></li>
                                <li><a href="">Paquetes</a></li>
                            </ul>
                            <h4 class="ed-dr-men-mar-top">Paginas de Registro</h4>
                            <ul>
                                <li><a href="register.html">Registrarse</a></li>
                                <li><a href="login.html">Entrar</a></li>
                                <li><a href="forgot-pass.html">¿Olvidaste la Contraseña?</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--HEADER SECTION-->
    <section>
        <!-- TOP BAR -->
        <div class="ed-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ed-com-t1-left">
                            <ul>
                                <li><a href="#">Contacto: ricgrisant@gmail.com, Tegucigalpa, Honduras</a>
                                </li>
                                <li><a href="#">Móvil: +504-3162-2193</a>
                                </li>
                            </ul>
                        </div>
                        <div class="ed-com-t1-right">
                            <ul> 
                                <?php
                                session_start();
                                if (isset($_SESSION["user"])) {
                                    echo '<li><a>'.$_COOKIE["Nombre"].' '.$_COOKIE["Apellido"].'</a>
                                        </li>
                                        <li><a href="class/cerrar_sesion.php">Cerrar Sesion</a>
                                        </li>';}
                                    else {
                                        echo '<ul><li><a href="login.html">Logueate</a></li>
                                            <li><a href="register.html">Registrate</a>
                                            </li>
                                             </ul>';
                                    }
                                    ?>
                            </ul>
                        </div>
                        <div class="ed-com-t1-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- LOGO AND MENU SECTION -->
        <div class="top-logo" data-spy="affix" data-offset-top="250">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wed-logo">
                            <a href="index.html"><img src="images/logo.png" alt="" />
                            </a>
                        </div>
                        <div class="main-menu">
                            <ul>
                                <li><a href="index.html">Principal</a>
                                </li>
                                <li class="about-menu">
                                    <a href="family-package.html" class="mm-arr">Paquetes</a>
                                    <!-- MEGA MENU 1 -->
                                    <div class="mm-pos">
                                        <div class="about-mm m-menu">
                                            <div class="m-menu-inn">
                                                <div class="mm1-com mm1-s1">
                                                    <div class="ed-course-in">
                                                        <a class="course-overlay menu-about" href="all-package.html">
                                                            <img src="images/sight/5.jpg" alt="">
                                                            <span>Paquetes Populares</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="mm1-com mm1-s2">
                                                    <p>sed libero enim sed faucibus turpis in eu mi bibendum neque egestas congue quisque egestas diam in arcu cursus euismod quis viverra nibh cras pulvinar mattis nunc sed blandit.</p>
                                                    <a href="all-package.html" class="mm-r-m-btn">Seguir Leyendo</a>
                                                </div>
                                                <div class="mm1-com mm1-s3">
                                                    <ul>
                                                        <li><a href="">Lugares</a></li>
                                                        <li><a href="">Buscar Paquetes</a></li>
                                                        <li><a href="">Buscar Hoteles</a></li>
                                                        <li><a href="">Buscar Transporte</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mm1-com mm1-s4">
                                                    <ul>
                                                        <li><a href="all-package.html">Todos los Paquetes</a></li><li><a href="family-package.html">Familia</a></li>
                                                        <li><a href="honeymoon-package.html">Luna de Miel</a></li>
                                                        <li><a href="group-package.html">Grupos</a></li>
                                                        <li><a href="weekend-package.html">Fin de Semana</a></li>
                                                        <li><a href="regular-package.html">Paquetes Regulares</a></li>
                                                        <li><a href="custom-package.html">Personalizarlo</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="hotels-list.html">Hoteles</a></li>
                                <!--<li><a class='dropdown-button ed-sub-menu' href='#' data-activates='dropdown1'>Courses</a></li>-->
                                <li><a href="transport.html">Transporte</a>
                                </li>
                                <li><a href="dashboard.html">Perfil</a>
                                </li>
                                <li><a href="contact.html">Contactarnos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END HEADER SECTION-->
        
    <!--====== TOUR DETAILS - BOOKING ==========-->
    <section>
        <div class="rows banner_book" id="inner-page-title">
            <div class="container">
                <div class="banner_book_1">
                    <ul>
                        <li class="dl1">Location : Rio,Brazil</li>
                        <li class="dl2">Price : $500</li>
                        <li class="dl3">Duration : 8 Nights/ 9 Days</li>
                        <li class="dl4"><a href="booking.html">Book Now</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php 
    include("class/class_conexion.php");
    if (isset($_GET["idEmpresa"])) {

    $conexion = new Conexion();

    $sql = "SELECT *
            FROM empresatransporte e
            INNER JOIN sucursalempresatransporte s ON s.idempresatransporte = e.idempresatransporte
            WHERE e.idempresatransporte=".$_GET["idEmpresa"];

    $resultado = $conexion->executeQuery($sql);
    $result = $conexion->getRow( $resultado);
?>
    <!--====== TOUR DETAILS ==========-->
    <section>
        <div class="rows inn-page-bg com-colo">
            <div class="container inn-page-con-bg tb-space">
                <div class="col-md-9">
                    <!--====== TOUR TITLE ==========-->
                    <div class="tour_head">
                        <h2> <?php echo $result['nombre'];
                        echo '<div class="auto" id="idEmpresa" style="display: none">'.$_GET["idEmpresa"].'</div>';
                        ?> 
                        <span class="tour_star">
                            <?php 
                                switch (round($result['calificacion'])) {
                                    case 0:
                                            echo 'Sin Calificar';
                                        break;

                                    case 1:
                                        echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                        break;

                                    case 2:
                                        for ($i=0; $i <2 ; $i++) { 
                                            echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                        }
                                        break;

                                    case 3:
                                        for ($i=0; $i <3 ; $i++) { 
                                            echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                        }
                                        break;

                                    case 4:
                                        for ($i=0; $i <4 ; $i++) { 
                                            echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                        }
                                        break;

                                    case 5:
                                        for ($i=0; $i <5 ; $i++) { 
                                            echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                        }
                                        break;
                                    
                                    default:
                                        for ($i=0; $i <5 ; $i++) { 
                                            echo '<i class="fa fa-star" aria-hidden="false"></i>';
                                        }
                                        break;
                                }
                         ?> 
                         <?php    
                             }
                             else
                             {
                                echo '            <div class="spe-title col-md-12">
                    <h2>Oppssss <span>Algo Salió Mal</span></h2>
                    <div class="title-line">

                    </div>"';
                             }
                          ?>
                     </span>
                            <span class="tour_rat">
                                <?php echo $result['calificacion'].' de '.'5';?>
                                
                            </span>
                        </h2> 
                        </div>
                    <!--====== TOUR DESCRIPTION ==========-->
                    <div class="tour_head1">
                        <h3>Descripción</h3>
                        <?php echo '<p>'.ucfirst($result['Descripcion']).'</p>'; 
                        ?>
                    </div>
                    <div class="tour_head1">
                        <h3>Destinos</h3>
                        <?php echo '<p>'.ucfirst($result['destinos']).'</p>'; 
                        ?>
                    </div>
                    <!--====== ROOMS: HOTEL BOOKING ==========-->
                    <div class="tour_head1 hotel-book-room">
                        <h3>Imágenes</h3>
                        <div id="myCarousel1" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators carousel-indicators-1">
                                <li data-target="#myCarousel1" data-slide-to="0"><img src="images/gallery/t1.jpg" alt="Chania">
                                </li>
                                <li data-target="#myCarousel1" data-slide-to="1"><img src="images/gallery/t2.jpg" alt="Chania">
                                </li>
                                <li data-target="#myCarousel1" data-slide-to="2"><img src="images/gallery/t3.jpg" alt="Chania">
                                </li>
                                <li data-target="#myCarousel1" data-slide-to="3"><img src="images/gallery/t4.jpg" alt="Chania">
                                </li>
                                <li data-target="#myCarousel1" data-slide-to="4"><img src="images/gallery/t5.jpg" alt="Chania">
                                </li>
                                <li data-target="#myCarousel1" data-slide-to="5"><img src="images/gallery/s6.jpeg" alt="Chania">
                                </li>
                                <li data-target="#myCarousel1" data-slide-to="6"><img src="images/gallery/s7.jpeg" alt="Chania">
                                </li>
                                <li data-target="#myCarousel1" data-slide-to="7"><img src="images/gallery/s8.jpg" alt="Chania">
                                </li>
                                <li data-target="#myCarousel1" data-slide-to="8"><img src="images/gallery/s9.jpg" alt="Chania">
                                </li>
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner carousel-inner1" role="listbox">
                                <div class="item active"> <img src="images/gallery/t1.jpg" alt="Chania" width="460" height="345"> </div>
                                <div class="item"> <img src="images/gallery/t2.jpg" alt="Chania" width="460" height="345"> </div>
                                <div class="item"> <img src="images/gallery/t3.jpg" alt="Chania" width="460" height="345"> </div>
                                <div class="item"> <img src="images/gallery/t4.jpg" alt="Chania" width="460" height="345"> </div>
                                <div class="item"> <img src="images/gallery/t5.jpg" alt="Chania" width="460" height="345"> </div>
                                <div class="item"> <img src="images/gallery/t6.jpg" alt="Chania" width="460" height="345"> </div>
                                <div class="item"> <img src="images/gallery/t7.jpg" alt="Chania" width="460" height="345"> </div>
                                <div class="item"> <img src="images/gallery/t8.jpg" alt="Chania" width="460" height="345"> </div>
                                <div class="item"> <img src="images/gallery/t9.jpg" alt="Chania" width="460" height="345"> </div>
                            </div>
                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel1" role="button" data-slide="prev"> <span><i class="fa fa-angle-left hotel-gal-arr" aria-hidden="true"></i></span> </a>
                            <a class="right carousel-control" href="#myCarousel1" role="button" data-slide="next"> <span><i class="fa fa-angle-right hotel-gal-arr hotel-gal-arr1" aria-hidden="true"></i></span> </a>
                        </div>
                    </div>
                    <!--====== TOUR LOCATION ==========-->
                    <div class="tour_head1 tout-map map-container">
                        <h3>Ubicación</h3>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6290415.157581651!2d-93.99661009218904!3d39.661150926343694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880b2d386f6e2619%3A0x7f15825064115956!2sIllinois%2C+USA!5e0!3m2!1sen!2sin!4v1467884030780" allowfullscreen></iframe>
                    </div>
                    <!--====== ABOUT THE TOUR ==========-->
                    <div class="tour_head1">
                        <h3>Horarios de Salida</h3>
                        <?php echo '<p style="text-align: center;font-size: x-large;background: coral;" >'.$result['horaSalidas'].'</p>'; ?>
                    </div>
                    <div>
                        <div class="dir-rat">
                            <div class="dir-rat-inn dir-rat-title">
                                <h3>Déjanos tu comentario</h3> 
                                <p> Ayúdanos a mejorar dejándonos tu comentario aquí<br>
                                Recuerda que debes estar registrado para hacerlo</p>
                            </div>
                            <div class="dir-rat-inn">
                                <form id="subComentario" class="dir-rat-form">
                                    <div class='starrr' style=" font-size: 25px;"></div>
                                    <div  class="form-group col-md-12 pad-left-o">
                                        <textarea id="opinion" placeholder="Escribe Aquí tu opinión"></textarea>
                                    </div>
                                    <div class="form-group col-md-12 pad-left-o">
                                        <input type="submit" value="SUBMIT" class="link-btn"> 
                                    </div>
                                </form>
                            </div>
                            <?php 

                                $sql2 = "SELECT * FROM turisteando.opinion;";

                                $resultado2 = $conexion->executeQuery($sql2);

                                
                                while ($row2 = $conexion->getRow($resultado2)) {

                        echo '  <!--COMMENT RATING-->
                        <div class="dir-rat-inn dir-rat-review">
                                <div class="row">
                                    <div class="col-md-3 dir-rat-left"> <img src="images/reviewer/4.jpeg" alt="">
                                        <p>'.$_COOKIE["Nombre"].' '.$_COOKIE["Apellido"].'<span>'.$row2["fecha"].'</span> </p>
                                    </div>
                                    <div class="col-md-9 dir-rat-right">
                                        <div class="dir-rat-star">';

                                             switch (round($row2['estrellas'])) {
                                    case 0:
                                            echo 'Sin Calificar';
                                        break;

                                    case 1:
                                        echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                        break;

                                    case 2:
                                        for ($i=0; $i <2 ; $i++) { 
                                            echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                        }
                                        break;

                                    case 3:
                                        for ($i=0; $i <3 ; $i++) { 
                                            echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                        }
                                        break;

                                    case 4:
                                        for ($i=0; $i <4 ; $i++) { 
                                            echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                        }
                                        break;

                                    case 5:
                                        for ($i=0; $i <5 ; $i++) { 
                                            echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                        }
                                        break;
                                    
                                    default:
                                        for ($i=0; $i <5 ; $i++) { 
                                            echo '<i class="fa fa-star" aria-hidden="false"></i>';
                                        }
                                        break;
                                }
                                        echo '</div>
                                        <p>'.$row2["opinionComentario"].'</p>
                                    </div>
                                </div>
                            </div>
                            </div>';    
                                  } 
                                  $conexion->closeConnection();
                            ?>
                <div class="col-md-3 tour_r">
                    <!--====== TRIP INFORMATION ==========-->
                    <div class="tour_right tour_incl tour-ri-com">
                        <h3>Información General</h3>
                        <ul>
                            <?php 
                                    echo '<li>Ubicación : '.$result["ubicacion"].'</li>';
                                    echo '<li>Apertura : '.$result["horaApertura"].'</li>';
                                    echo '<li>Cierre : '.$result["horaCierre"].'</li>';
                             ?>
                        </ul>
                    </div>
                    <!--====== PACKAGE SHARE ==========-->
                    <div class="tour_right head_right tour_social tour-ri-com">
                        <h3>Nuestras Redes</h3>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                            <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
                        </ul>
                    </div>
                    <!--====== HELP PACKAGE ==========-->
                    <div class="tour_right head_right tour_help tour-ri-com">
                        <h3>Contactanos</h3>
                        <div class="tour_help_1">
                            <h4 class="tour_help_1_call">Telefono</h4>
                            <h4><i class="fa fa-phone" aria-hidden="true"></i> <?php echo '<p>'.$result['telefono'].'</p>'; ?> </h4> </div>
                    </div>
                    <!--====== PUPULAR TOUR PACKAGES ==========-->
                    <div class="tour_right tour_rela tour-ri-com">
                        <h3>Te Puede Interesar</h3>
                        <div class="tour_rela_1"> <img src="images/related1.png" alt="" />
                            <h4>Dubai 7Days / 6Nights</h4>
                            <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</p> <a href="#" class="link-btn">View this Package</a> </div>
                        <div class="tour_rela_1"> <img src="images/related2.png" alt="" />
                            <h4>Mauritius 4Days / 3Nights</h4>
                            <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</p> <a href="#" class="link-btn">View this Package</a> </div>
                        <div class="tour_rela_1"> <img src="images/related3.png" alt="" />
                            <h4>India 14Days / 13Nights</h4>
                            <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</p> <a href="#" class="link-btn">View this Package</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== TIPS BEFORE TRAVEL ==========-->
    <section>
        <div class="rows tips tips-home tb-space home_title">
            <div class="container tips_1">
                <!-- TIPS BEFORE TRAVEL -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <h3>Tips Before Travel</h3>
                    <div class="tips_left tips_left_1">
                        <h5>Bring copies of your passport</h5>
                        <p>Aliquam pretium id justo eget tristique. Aenean feugiat vestibulum blandit.</p>
                    </div>
                    <div class="tips_left tips_left_2">
                        <h5>Register with your embassy</h5>
                        <p>Mauris efficitur, ante sit amet rhoncus malesuada, orci justo sollicitudin.</p>
                    </div>
                    <div class="tips_left tips_left_3">
                        <h5>Always have local cash</h5>
                        <p>Donec et placerat ante. Etiam et velit in massa. </p>
                    </div>
                </div>
                <!-- CUSTOMER TESTIMONIALS -->
                <div class="col-md-8 col-sm-6 col-xs-12 testi-2">
                    <!-- TESTIMONIAL TITLE -->
                    <h3>Customer Testimonials</h3>
                    <div class="testi">
                        <h4>John William</h4>
                        <p>Ut sed sem quis magna ultricies lacinia et sed tortor. Ut non tincidunt nisi, non elementum lorem. Aliquam gravida sodales</p> <address>Illinois, United States of America</address> </div>
                    <!-- ARRANGEMENTS & HELPS -->
                    <h3>Arrangement & Helps</h3>
                    <div class="arrange">
                        <ul>
                            <!-- LOCATION MANAGER -->
                            <li>
                                <a href="#"><img src="images/Location-Manager.png" alt=""> </a>
                            </li>
                            <!-- PRIVATE GUIDE -->
                            <li>
                                <a href="#"><img src="images/Private-Guide.png" alt=""> </a>
                            </li>
                            <!-- ARRANGEMENTS -->
                            <li>
                                <a href="#"><img src="images/Arrangements.png" alt=""> </a>
                            </li>
                            <!-- EVENT ACTIVITIES -->
                            <li>
                                <a href="#"><img src="images/Events-Activities.png" alt=""> </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== FOOTER 1 ==========-->
    <section>
        <div class="rows">
            <div class="footer1 home_title tb-space">
                <div class="pla1 container">
                    <!-- FOOTER OFFER 1 -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="disco">
                            <h3>30%<span>OFF</span></h3>
                            <h4>Eiffel Tower,Rome</h4>
                            <p>valid only for 24th Dec</p> <a href="booking.html">Book Now</a> </div>
                    </div>
                    <!-- FOOTER OFFER 2 -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="disco1 disco">
                            <h3>42%<span>OFF</span></h3>
                            <h4>Colosseum,Burj Al Arab</h4>
                            <p>valid only for 18th Nov</p> <a href="booking.html">Book Now</a> </div>
                    </div>
                    <!-- FOOTER MOST POPULAR VACATIONS -->
                    <div class="col-md-6 col-sm-12 col-xs-12 foot-spec footer_places">
                        <h4><span>Most Popular</span> Vacations</h4>
                        <ul>
                            <li><a href="tour-details.html">Angkor Wat</a> </li>
                            <li><a href="tour-details.html">Buckingham Palace</a> </li>
                            <li><a href="tour-details.html">High Line</a> </li>
                            <li><a href="tour-details.html">Sagrada Família</a> </li>
                            <li><a href="tour-details.html">Statue of Liberty </a> </li>
                            <li><a href="tour-details.html">Notre Dame de Paris</a> </li>
                            <li><a href="tour-details.html">Taj Mahal</a> </li>
                            <li><a href="tour-details.html">The Louvre</a> </li>
                            <li><a href="tour-details.html">Tate Modern, London</a> </li>
                            <li><a href="tour-details.html">Gothic Quarter</a> </li>
                            <li><a href="tour-details.html">Table Mountain</a> </li>
                            <li><a href="tour-details.html">Bayon</a> </li>
                            <li><a href="tour-details.html">Great Wall of China</a> </li>
                            <li><a href="tour-details.html">Hermitage Museum</a> </li>
                            <li><a href="tour-details.html">Yellowstone</a> </li>
                            <li><a href="tour-details.html">Musée d'Orsay</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== FOOTER 2 ==========-->
    <section>
        <div class="rows">
            <div class="footer">
                <div class="container">
                    <div class="foot-sec2">
                        <div>
                            <div class="row">
                                <div class="col-sm-3 foot-spec foot-com">
                                    <h4><span>Holiday</span> Tour & Travels</h4>
                                    <p>World's leading tour and travels Booking website,Over 30,000 packages worldwide.</p>
                                </div>
                                <div class="col-sm-3 foot-spec foot-com">
                                    <h4><span>Address</span> & Contact Info</h4>
                                    <p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A. Landmark : Next To Airport</p>
                                    <p> <span class="strong">Phone: </span> <span class="highlighted">+101-1231-1231</span> </p>
                                </div>
                                <div class="col-sm-3 col-md-3 foot-spec foot-com">
                                    <h4><span>SUPPORT</span> & HELP</h4>
                                    <ul class="two-columns">
                                        <li> <a href="#">About Us</a> </li>
                                        <li> <a href="#">FAQ</a> </li>
                                        <li> <a href="#">Feedbacks</a> </li>
                                        <li> <a href="#">Blog </a> </li>
                                        <li> <a href="#">Use Cases</a> </li>
                                        <li> <a href="#">Advertise us</a> </li>
                                        <li> <a href="#">Discount</a> </li>
                                        <li> <a href="#">Vacations</a> </li>
                                        <li> <a href="#">Branding Offers </a> </li>
                                        <li> <a href="#">Contact Us</a> </li>
                                    </ul>
                                </div>
                                <div class="col-sm-3 foot-social foot-spec foot-com">
                                    <h4><span>Follow</span> with us</h4>
                                    <p>Join the thousands of other There are many variations of passages of Lorem Ipsum available</p>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                                        <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== FOOTER - COPYRIGHT ==========-->
    <section>
        <div class="rows copy">
            <div class="container">
                <p>Copyrights © 2017 Company Name. All Rights Reserved</p>
            </div>
        </div>
    </section>
    <section>
        <div class="icon-float">
            <ul>
                <li><a href="#" class="sh">1k <br> Share</a> </li>
                <li><a href="#" class="fb1"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="gp1"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="tw1"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="li1"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="wa1"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="sh1"><i class="fa fa-envelope-o" aria-hidden="true"></i></a> </li>
            </ul>
        </div>
    </section>
    <!--========= Scripts ===========-->
    <script src="js/jquery-latest.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/toastr.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/starrr.js"></script>
    <script src="js/rating.js"></script>
</body>

</html>