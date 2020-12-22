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
	<!-- <link rel ="stylesheet" href="css/bootstrap.min.css"/> -->
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
              <!-- <?php session_start();
							if($_SESSION['type']=='builder')
												{
														echo "<li><a class='nav-link' href='builderHome.php'>Home</a></li>";
												}
												else
												{
														echo "<li><a class='nav-link' href='normalHomeSale.php'>Home</a></li>";
												}
												?> -->

							<li class="nav-item">
                <a class="nav-link" href="addup.php">Add Upcoming Projects  </a>
							<li class="nav-item">
                <li><a class="nav-link" href="upcomingprojects.php">My Upcoming Projects </a></li>
              </li>
							<li class="nav-item">
                <a class="nav-link" href="PackersAndMovers.php">Packers And Movers </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="logout.php"><?php  echo $_SESSION['username']."  ";?><i class="fa fa-sign-out"></i>Logout</a>
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
		<div class="container hero-text text-white">
			<h2>List your building on our website</h2>
			<a href="addprojectsale.php" class="site-btn">Add Now</a>
		</div>
	</section>

	<!-- Hero section end -->
	<?php
	include('indexDB.php');
	$loc=$c='';
	$x1="select distinct location from flat";
	$x2="select distinct city from flat";
	$q="select * from cardsale order by time desc";
	if(isset($_POST['loc']) && isset($_POST['city']))
	{
		$loc=$_POST['loc'];
		$c=$_POST['city'];
		if($loc=='All' && $c=='All')
		{
			$q="select * from cardsale order by time desc";
		}
		if($loc=='All' && $c!='All')
		{
			$q="select * from cardsale where city='$c' order by time desc";
		}
		if($loc!='All')
		{
			$x2="select city from cardsale where location='$loc'";
			$q="select * from cardsale where location='$loc' order by time desc";
		}
	}
	$r1=$conn->query($x1);
	$r2=$conn->query($x2);
	?>

	<!-- Filter form section -->
	<!-- <div class="filter-search">
		<div class="container">
			<form class="filter-form" method="post" action="builderHome.php">
			<h2>Search by Location</h2>
			<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Location   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;City</h4>
				<select name="loc">
					<option value="All" selected>All</option>
					<?php
					while($p1=mysqli_fetch_array($r1, MYSQLI_ASSOC))
					{
						echo "<option value='".$p1['location']."'>".$p1['location']."</option>";
					}
					?>
				</select>
				<select name="city">
					<option value="All" selected>All</option>
					<?php
					while($p2=mysqli_fetch_array($r2, MYSQLI_ASSOC))
					{
						echo "<option value='".$p2['city']."'>".$p2['city']."</option>";
					}
					?>
				</select>
				<button class="site-btn fs-submit" type="submit">SEARCH</button>
			</form>
		</div>
	</div> -->
	<!-- page -->
	<section class="page-section categories-page">
		<br><br>
		<!-- <h2 align="center">All Properties</h2>

			<br><br>
				<div class="container">
			<div class="row">
				<?php
						$r = $conn->query($q);
						while($x=mysqli_fetch_array($r, MYSQLI_ASSOC))
						{
							?>
							<div class='col-md-4' style="height:320px; margin:50px; border: 5px groove black">
								<form action='single-list_sale.php?action=add&id=<?php echo $x['flat_id']; ?>' method="post">
								<div class='sale-notic'>FOR Sale</div>
									<div class='propertie-info text-white' style="background-image:url('<?php echo $x['image'] ?>');height:270px">
									<div class='info-warp'>
										<p><i class='fa fa-map-marker'></i><?php echo $x['location'] ?></p>
									</div>
									<button class='price' type='submit'><?php echo "Rs. ".$x['totalcost'] ?></button>
									</div>
									</form>
							</div>
				<?php
						}
				?>
			</div>
		</div>
				<br><br> -->
				<br /> <br /><br />
		<h2 align="center">Your Properties</h2>

				<br><br><div class="container">
		<div class="row">
				<?php
						$ab="select * from flat natural join sale where bid=".$_SESSION['id']."";
						$r1 = $conn->query($ab);
						while($y=mysqli_fetch_array($r1, MYSQLI_ASSOC))
						{
							?>
							<div class='col-md-4' style="height:320px; margin:50px; border: 5px groove black">
								<form action='' method="post">
								<div class='sale-notic'>FOR Sale</div>
									<div class='propertie-info text-white' style="background-image:url('<?php echo $y['image'] ?>');height:270px">
									<div class='info-warp'>
										<p><i class='fa fa-map-marker'></i><?php echo $y['location'] ?></p>
									</div>
									<button class='price' type=''><?php echo "Rs. ".$y['totalcost'] ?></button>
									</div>
									</form>
							</div>
				<?php
						}
				?>
			</div>
		</div>
	</section>
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
	<!-- Clients section end -->



	<!-- Footer section -->+
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
