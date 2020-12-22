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

							<li class="nav-item">
                <a class="nav-link" href="PackersAndMoversuser.php">Packers&Movers  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php"><?php session_start();  echo $_SESSION['username']."  ";?><i class="fa fa-sign-out"></i>Logout</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </header>
	<!-- Header section end -->


	<!-- Page top section -->
	<section class="page-top-section set-bg"  data-setbg="img/service-bg.jpg">

		<div class="container register">

									<div class="row">
										<div class="col-md-3 register-left">
												<img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
												<h3>Thankyou</h3>

												<h5>For booking with us</h5>
													<br /><br /> <br />
												<li style="list-style:none;" class="nav-item">
														<a class="nav-link"  style="font-size:2rem; font-weight:bold;" href="http://localhost/Real-Estate-1/contact.html">Contact Us</a>
														</li>
												<li style="list-style:none ;" class="nav-item">
													<a class="nav-link"style="font-size:2rem; font-weight:bold;" href="http://localhost/Real-Estate-1/about.html">About Us</a>
												</li>
										</div>
											<div class="col-md-9 register-right">
													<div class="tab-content" id="myTabContent">

															<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
																	<h3 class="register-heading">Payment details</h3>
																	<form method="post" action="pay.php">
																	<div class="row register-form">

																			<div class="col-md-12 ">
																				<div class="form-group">

																						<h5>Amount:</h5>
																						<input type="text" class="form-control" name="Amount" placeholder=" " value="<?php echo $_SESSION["amt"]?>" />
																				</div>
																					<div class="form-group">
																							<input type="text" class="form-control" name="Bankname" placeholder="Name of the Bank *" value="" />

																					</div>

																					<div class="form-group">
																							<input type="text" class="form-control"  name="Loandetails" placeholder="Loan Details *" value="" />
																							<span class="error"></span>
																					</div>
																					<div class="form-group">
																							<input type="text" class="form-control"  name="Chequenumber" placeholder="Cheque No. *" value="" />
																							<span class="error"></span>
																					</div>
																					<div class="form-group">
																							<input type="text" class="form-control"  name="Paymentoption" placeholder="Payment Option *" value="" />
																							<input type="submit" class="btnRegister" name="submit" value="Submit"/>
																							<span class="error"></span>
																					</div>
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

	</section>
	<!--  Page top end -->
	<!-- page -->



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
