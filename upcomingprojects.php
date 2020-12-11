<!DOCTYPE html>
<html lang="en">
<head>
	<title>HomePros</title>
	<meta charset="UTF-8">
	<meta name="description" content="HOUSING-CO">
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

	<link rel="stylesheet" type="text/css" href="Styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>

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


	<!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="img/bg.jpg">
		<?php
		include('indexDB.php');
	    if($_SESSION['type']=='builder')
	    {
	        $q="select * from upcoming_projects where bid=".$_SESSION['id']."";
	    }
	    else
	    {
	        $q="select * from upcoming_projects";
	    }
	    $res=$conn->query($q);
		?>
		<section class="page-section categories-page text-white">
	    <br><br><br><br>
	    <div class="container">
				<br />
				<br /><br /><br />
	            <table class="table table-hovertable table-striped table-dark table-bordered">
	                <thead class="thead-light">
	                    <tr>
	                        <th>Name of Builder</th>
	                        <th>Location</th>
	                        <th>City</th>
	                        <th>Estimated Completion Time</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    <?php
	                        while($x=mysqli_fetch_array($res, MYSQLI_ASSOC))
	                        {
	                            $q1="select nameorg from login_builder where bid=".$x['bid']."";
	                            $r1=$conn->query($q1);
	                            $p1=mysqli_fetch_array($r1, MYSQLI_ASSOC);
	                            echo "<tr>";
	                                echo "<td>".$p1['nameorg']."</td>";
	                                echo "<td>".$x['location']."</td>";
	                                echo "<td>".$x['city']."</td>";
	                                echo "<td>".$x['comp_time']." Months</td>";
	                            echo "</tr>";
	                        }
						?>
	                </tbody>
	            </table>
			</div>
		</section>

	</section>

	<!-- Hero section end -->

	<!-- page -->
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
