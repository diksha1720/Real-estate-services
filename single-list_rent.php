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
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
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
																echo "<li><a class='nav-link' href='builderHome.php'>Home</a></li>";
														}
														else
														{
																echo "<li><a class='nav-link' href='normalHomeSale.php'>Home</a></li>";
														}
														?>
							 <?php
														if($_SESSION['type']=='builder')
														{
																echo "<li><a  class='nav-link' href='builderHome.php'>For Sale</a></li>";
														}
														else
														{
																echo "<li><a class='nav-link' href='normalHomeSale.php'>For Sale</a></li>";
														}
														?>

											<?php if($_SESSION['type']=='builder')
														{
																echo "<li><a class='nav-link' href='builderHome.php'>For Rent ></a></li>";
														}
														else
														{
																echo "<li><a class='nav-link' href='normalHomeRent.php'>For Rent</a></li>";
														}
														?>


								<li><a class="nav-link" href="contact.html">Questions </a></li>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="PackersAndMovers.php">Packers And Movers </a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="logout.php"><?php  echo $_SESSION['username']."  ";?><i class="fa fa-user-circle-o"></i>Logout</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</header>
	<!-- Header section end -->


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container hero-text text-white">
			<h2>SINGLE   LISTINGS</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>Single Listing</span>
		</div>
	</div>
  <?php
include('indexDB.php');
$x=$_GET["id"];
$sql = "SELECT * FROM flat natural join rent where flat_id=$x";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$q='';$a;
if($_SESSION['type']=='normal')
{
  $a=1;
  $q="select name,surname from login where uid=".$row['uid']."";
}
else
{
  $a=2;
  $q="select nameorg from login_builder where bid=".$row['bid']."";
}
$res=$conn->query($q);
$r= mysqli_fetch_assoc($res);
$a="SELECT rent_amount FROM rent where flat_id=$x";
$r1 = $conn->query($a);
$r2 = mysqli_fetch_assoc($r1);
$_SESSION["amt"]=$r2['rent_amount'];
$b="SELECT name from login where UID=(SELECT uid from flat where flat_id=$x)";
$r4=$conn->query($b);
$r5= mysqli_fetch_assoc($r4);
$_SESSION["buyer"]=$r5['name'];
$_SESSION["flat_id"]=$x;
?>
	<!-- Page -->
	<section class="page-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 single-list-page">
					<div class="single-list-slider owl-carousel" id="sl-slider">
            <div class="sl-item set-bg" data-setbg="<?php echo $row['image'] ?>"></div>
            <div class="sl-item set-bg" data-setbg="<?php echo $row['image1'] ?>"></div>
						<div class="sl-item set-bg" data-setbg="<?php echo $row['image2'] ?>"></div>
						<div class="sl-item set-bg" data-setbg="<?php echo $row['image3'] ?>"></div>
          </div>
          <div class="owl-carousel sl-thumb-slider" id="sl-slider-thumb">
						<div class="sl-thumb set-bg" data-setbg="<?php echo $row['image'] ?>"></div>
						<div class="sl-thumb set-bg" data-setbg="<?php echo $row['image1'] ?>"></div>
						<div class="sl-thumb set-bg" data-setbg="<?php echo $row['image2'] ?>"></div>
						<div class="sl-thumb set-bg" data-setbg="<?php echo $row['image3'] ?>"></div>
					</div>
          <div class="single-list-content">
						<div class="row">
							<div class="col-xl-8 sl-title">
								<h2><?php echo $row['location'] ?></h2>
								<p><i class="fa fa-map-marker"></i><?php echo $row['location'] ?></p>
							</div>
							<div class="col-xl-4">
								<a href="payment.php" class="price-btn"><?php echo  "Rent Amount: ".$row['rent_amount']."/-" ?></a>
							</div>
							<div class="col-xl-4">
								<button class="price-btn"><?php echo  "Deposit Amount: ".$row['deposit_amount']."/-" ?></button>
                            </div>
                            <div class="col-xl-4">
								<button class="price-btn"><?php echo "Time Period: ".$row['time_period']." months" ?></button>
							</div>
						</div>
						<h3 class="sl-sp-title">Property Details</h3>
						<div class="row property-details-list">
							<div class="col-md-4 col-sm-6">
								<p><i class="fa fa-th-large"></i><?php echo $row['area']." sqft" ?></p>

							</div>
						</div>
						<h3 class="sl-sp-title">Description</h3>
						<div class="description">
							<p><?php echo $row['description'] ?></p>
							</div>
						<h3 class="sl-sp-title">Property Amenities</h3>
						<div class="row property-details-list">
							<div class="col-md-12 col-sm-6">
								<p><i class="fa fa-check-circle-o"></i><?php echo $row['amenities'] ?></p>
							</div>
						</div>
						<h3 class="sl-sp-title bd-no">Floorplan</h3>
						<div id="accordion" class="plan-accordion">
							<div class="panel">
								<div class="panel-header" id="headingOne">
									<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="flase" aria-controls="collapse3"><span><?php echo $row['area']." sqft"; ?></span>	<i class="fa fa-angle-down"></i>
									</button>
								</div>
								<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
									<div class="panel-body">
										<img src="img/plan-sketch.jpg" alt="">
									</div>
								</div>
							</div>
            </div>
          </div>
        </div>
          <?php
        	$x=$_GET["id"];
        	$sql1="SELECT * FROM flat natural join rent where flat_id=$x";
        	$result1 = $conn->query($sql1);
			$row1 = mysqli_fetch_assoc($result1);
			$b=0;$q1='';
			if($row1['bid']==NULL)
			{
				if($row1['uid']!=NULL)
				{
					$y=$row1['uid'];
				//echo "UID".$row1['uid'];
			//	echo $y;
				$b=1;
				//echo $b;
				}
			}
			if($row1['uid']==NULL)
			{
				if($row1['bid']!=NULL)
				{
					$y=$row1['bid'];
				//echo "BID".$row1['bid'];
				//echo $y;
				$b=2;
				//echo $b;
				}
			}
			if($b==1)
			{
				$q1="select * from login where UID=".$row1['uid']."";
				$_SESSION["save1"] =$row1['uid'] ;

			}
			else if($b==2)
			{
				 $q1="select * from login_builder where BID=".$row1['bid']."";
				 $_SESSION["save1"] =$row1['bid'] ;
			}
		//	echo $q1;
			$res1=$conn->query($q1);
			$r1= mysqli_fetch_assoc($res1);

        ?>



        <div class="col-lg-4 col-md-7 sidebar">
					<div class="author-card">
						<div class="author-img set-bg" data-setbg="img/author.jpg"></div>
						<div class="author-info">
							<h5><?php if($b==1){echo $r1['name']." ".$r1['surname'];} else {echo $r1['nameorg'];} ?></h5>
							<p><?php if($b==1){echo "Normal User";} else {echo "Builder";} ?></p>
						</div>
						<div class="author-contact">
							<p><i class="fa fa-phone"></i><?php if($b==1){echo $r1['phone'];} else {echo $r1['phoneno'];} ?></p>
							<p><i class="fa fa-envelope"></i><?php if($b==1){echo $r1['email'];} else {echo $r1['emailid'];} ?></p>
						</div>
					</div>
					<div class="contact-form-card">
						<h5>Do you have any question?</h5>

						<form id="form" method="post">
							<input type="text" name="name" placeholder="Your name">
							<input type="text" name="email" placeholder="Your email">
							<textarea name="question"placeholder="Your question"></textarea>
							<button name="send">SEND</button>
						</form>

							<?php
    include('indexDB.php');
    if(isset($_POST['name']))
    {
   		$name=$_POST['name'];
    }
    if(isset($_POST['email']))
    {
    	$email=$_POST['email'];
    }
    if(isset($_POST['question']))
    {
    	$question=$_POST['question'];
    }
    $id='';
    $c;

    if($_SESSION['type']=='normal')
    {
    	$c=1;
        $id=$row1['uid'];
    }
    else
    {
        $c=2;
        $id=$row1['bid'];
    }
    if($c==1)
    {
    	if(isset($_POST['send']))
    	{
    	 $q1="insert into feedbackuser(val,name,email,question) values(".$_SESSION['id'].",'$name','$email','$question')";
    	}
        $result1 = $conn->query($q1);
    }
    else
    {
    	if(isset($_POST['send']))
    	{
    	 $q1="insert into feedbackbuilder(val,name,email,question) values(".$_SESSION['id'].",'$name','$email','$question')";
    	}
        $result1 = $conn->query($q1);
    }
?>
      </div>
		</div>
	</section>
	<!-- Page end -->


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
