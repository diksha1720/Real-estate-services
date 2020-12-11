<!DOCTYPE html>
<html lang="en">
<head>
	<title>HomePros</title>
	<meta charset="UTF-8">
	<meta name="description" content="LERAMIZ Landing Page Template">
	<meta name="keywords" content="LERAMIZ, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
    <div class="header-top">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <a class="navbar-brand"style="font-size:2.5rem; font-weight:bold;" href="">HomePros</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto ">
							<?php session_start();
                            if($_SESSION['type']=='builder')
                            {
                                echo "<li class='nav-item'><a class='nav-link' href='builderHome.php'>Home</a></li>";
                            }
                            else
                            {
                                echo "<li class='nav-item'><a class='nav-link' href='normalHomeSale.php'>Home</a></li>";
                            }
                            ?>
                            <?php
                            if($_SESSION['type']=='builder')
                            {
                                echo "<li class='nav-item'><a class='nav-link' href='builderHome.php'>ForSale</a></li>";
                            }
                            else
                            {
                                echo "<li class='nav-item'><a class='nav-link' href='normalHomeSale.php'>ForSale</a></li>";
                            }
                            ?>

             				  <?php if($_SESSION['type']=='builder')
                            {
                                echo "<li class='nav-item'><a class='nav-link' href='builderHome.php'>ForRent</a></li>";
                            }
                            else
                            {
                                echo "<li class='nav-item'><a class='nav-link' href='normalHomeSale.php'>ForRent</a></li>";
                            }
                            ?>
							<li class="nav-item">
                <a class="nav-link" href="PackersAndMovers.php">Packers&Movers  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php"><?php  echo $_SESSION['username']."  ";?>Logout</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </header>
	<!-- Header section end -->


	<!-- Page top section -->
	<section class="page-top-section set-bg"  data-setbg="img/b23.jpg">
		<div class="container hero-text text-white">
			<h2>Packers And Movers at your service</h2>
		</div>
	</section>
	<!--  Page top end -->
	<!-- page -->

	<div class="container register">

								<div class="row">
									<div class="col-md-3 register-left">
											<img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
											<h3>Welcome</h3>
											<br /><br /> <br /><br /> <br />
											<h5>Packers and Movers at your service</h5>

									</div>
										<div class="col-md-9 register-right">
												<div class="tab-content" id="myTabContent">

														<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
																<h3 class="register-heading">Register</h3>
																<form method="post" action="insertPandM.php">
																<div class="row register-form">

																		<div class="col-md-12 ">
																				<div class="form-group">
																						<input type="text" class="form-control" name="name" placeholder="Name of Organisation *" value="" />

																				</div>
																				<div class="form-group">
																						<input type="text" class="form-control" name="cno" placeholder="Contact no. *" value="" />
																						<span class="error"></span>
																				</div>
																				<div class="form-group">
																						<input type="text" class="form-control"  name="email" placeholder="Email *" value="" />
																						<span class="error"></span>
																				</div>
																					<input type="submit" class="btnRegister" name="submit" value="Register"/>

																				</div>
																		</div>


																</div>
																</form>
														</div>


														<div class="tab-pane fade show"  role="tabpanel" aria-labelledby="profile-tab">

												</div>
										</div>
								</div>

						</div>
						<section class="page-section categories-page"  >
							<div class="container" >
								<br /><br /><br />
					            <table class="table table-hovertable table-striped table-light table-bordered">
					                <thead class="thead-dark">
					                    <tr>
					                        <th>Name of Organization</th>
					                        <th>Contact Number</th>
					                        <th>Email ID</th>
					                    </tr>
					                </thead>
					                <tbody>
					                    <?php
					                        include('indexDB.php');
					                        $q="select * from packers_movers";
					                        $result = $conn->query($q);
					                        while($x=mysqli_fetch_array($result, MYSQLI_ASSOC))
					                        {
					                            echo "<tr>";
					                                echo "<td>".$x['name_org']."</td>";
					                                echo "<td>".$x['contact_no']."</td>";
													echo "<td>".$x['email_id']."</td>";
					                            echo "</tr>";
					                        }
										?>
					                </tbody>
					            </table>
							</div>
						</section>
	<!-- Clients section -->
	<div class="clients-section">
		<div class="container">
			<div class="clients-slider owl-carousel">
				<a href="#">
					<img src="img/partner/1.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/2.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/3.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/4.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/5.png" alt="">
				</a>
			</div>
		</div>
	</div>
	<footer class="footer-section set-bg" data-setbg="img/footer-bg.jpg">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-md-6 footer-widget">

					<!-- <img src="img/logo1.png" alt=""> -->
					<h1 class="fw-title">HomePros</h1>
					<p>We provide you with the best services which is best for your family and which suits your pocket.</p>
					<div class="social">

						<a href="https://www.facebook.com/"><i class="fa fa-facebook icon"></i></a>
							<a href="https://www.twitter.com/"><i class="fa fa-twitter icon"></i></a>
							<a href="https://www.instagram.com/"><i class="fa fa-instagram icon"></i></a>
							<a href="https://www.pinterest.com/"><i class="fa fa-pinterest icon"></i></a>

					</div>
				</div>
				<div class="col-lg-3 col-md-6 footer-widget">
					<div class="contact-widget">
						<h5 class="fw-title">CONTACT US</h5>
						<p><i class="fa fa-map-marker"></i>You can contact us here......  </p>
						<p><i class="fa fa-phone icon"></i>Number</p>
						<p><i class="fa fa-envelope icon"></i>info.homepros@gmail.com</p>
						<p><i class="fa fa-clock-o icon"></i>Mon - Sat, 08 AM - 06 PM</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 footer-widget">
					<div class="double-menu-widget">
						<h5 class="fw-title">POPULAR PLACES</h5>
						<ul>
							<li><a href="">Mumbai</a></li>
							<li><a href="">Delhi</a></li>
							<li><a href="">Chennai</a></li>
							<li><a href="">Kolkata</a></li>
							<li><a href="">Banglore</a></li>
						</ul>
						<ul>
							<li><a href="">Chandigarh</a></li>
							<li><a href="">Pune</a></li>
							<li><a href="">Jaipur</a></li>
							<li><a href="">Kochi</a></li>
							<li><a href="">Ooty</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6  footer-widget">
					<div class="newslatter-widget">
						<h5 class="fw-title">NEWSLETTER</h5>
						<p>Subscribe your email to get the latest news and new offer also discount</p>
						<form class="footer-newslatter-form">
							<input type="text" placeholder="Email address">
							<button><i class="fa fa-send"></i></button>
						</form>
					</div>
				</div>
			</div>

		</div>
	</footer>


	<!-- Footer section end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
