<?php
    session_start();
    if(!isset($_SESSION['user']))
        header("Location: login.php");
    include("class/class_conexion.php");
    $conexion= new Conexion();
    $user= $_COOKIE['idUsr'];
    $query = "CALL getBlogs($user, @men, @booleano);";
    $res =$conexion->executeQuery($query);
    $quer2 = "SELECT @men, @booleano;";
    $res2 = $conexion->executeQuery($quer2);
    if($res2[0]==0){
        $result = $conexion->getRows($res);
        //var_dump($result);
        //$filas = $conexion->countRegisters($res);
    }
    else
        $result = null;

?>

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
                                <li><a href="login.html">Entra</a>
                                </li>
                                <li><a href="register.html">Registrarte</a>
                                </li>
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

	<!--====== BANNER ==========-->
	<section>
		<div class="rows inner_banner inner_banner_1">
			<div class="container">
				<h2><span>Best Tour -</span> Packages in your City</h2>
				<ul>
					<li><a href="#inner-page-title">Home</a> </li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
					<li><a href="#inner-page-title" class="bread-acti">Blog Posts</a> </li>
				</ul>
				<p>Book travel packages and enjoy your holidays with distinctive experience</p>
			</div>
		</div>
	</section>
	<!--====== ALL POST ==========-->
	<section>
		<div class="rows inn-page-bg com-colo">
			<div class="container inn-page-con-bg tb-space pad-bot-redu-5" id="inner-page-title">
				<!-- TITLE & DESCRIPTION -->
				<div class="spe-title col-md-12">
					<h2>Holiday Tour <span>Blog</span> Posts</h2>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>
				</div>
				<!--===== POSTS ======-->
				<div class="rows">

                    <?php
                        if ($result!=null){
                            foreach ($result as $fila) {
                                $idBlog = $fila[0];
                                $nombre = $fila[1];
                                $descripcion = $fila[2];
                                $img =$fila[3];
                                $fecha=$fila[4];
                                $creador=$fila[5];
                                if(!file_exists($img)){
                                    $img = "images/sight/".(string)rand(1,5).".jpg";
                                }
                                echo '<div class="posts" id=',$idBlog,' name=',$idBlog,'><div class="col-md-6 col-sm-6 col-xs-12"> <img src="',$img,'" alt="" /> </div><div class="col-md-6 col-sm-6 col-xs-12"><h3>',$nombre,'</h3><h5><span class="post_author">Autor: ',$_COOKIE["Nombre"],' </span><span class="post_date">Fecha: ',$fecha,'</span></h5>',$descripcion,' <br><br><a href="blog-inner.php?idBlog=',$idBlog,'" class="link-btn">Read more</a> </div></div>';
                            }
                        }
                        else echo '<div class="posts"><div class="col-md-6 col-sm-6 col-xs-12"> <h3>No tienes blogs</h3> </div></div>';

                        echo '';
                    ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNuevoBlog">Blog Nuevo</button>
                    <div class="modal fade" id="modalNuevoBlog" tabindex="-1" role="dialog" aria-labelledby="modalNuevoBlogTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Blog nuevo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form class="col s12" action="" id="Form_InsertarBlog" name="Form_InsertarBlog" method="post" role="form">

                                <input type="hidden" class="validate form-control" required name="text_idUser" id="text_idUser"
                                value="<?php
                                    if(isset($_COOKIE["idUsr"])){
                                        echo  $_COOKIE["idUsr"];
                                    }
                                ?>">

                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <input type="text" class="validate form-control" required name="text_Nombre" id="text_Nombre" maxlength="50">
                                        <label>Nombre</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input type="text" class="validate form-control" required name="text_Descripcion" id="text_Descripcion" maxlength="100">
                                        <label>Descripcion</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" class="validate form-control" required name="text_Img" id="text_Img" maxlength="250">
                                        <label>Imagen</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s2" align="center">
                                    <input type="submit" value="Crear" class="waves-effect waves-light tourz-sear-btn" > </div>
                                </div>
                            </form>
                          </div>

                        </div>
                      </div>
                    </div>
                </div>
				<!--===== POST END ======-->
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
	<script src="js/wow.min.js"></script>
	<script src="js/materialize.min.js"></script>
	<script src="js/custom.js"></script>
    <script src="js/toastr.min.js"></script>
    <script src="js/nuevoBlog.js"></script>
</body>

</html>