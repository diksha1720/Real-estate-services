<?php session_start();
include('indexDB.php');
$username = $name = $surname = $email = $password = $cpassword = $phone = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$usernameErr = $nameErr = $surnameErr = $emailErr =$lnoErr= $passwordErr = $cpasswordErr = $phoneErr = "";
$b=true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $usernameErr = "*Username is required";
        $b=false;
      } else {
        $username = test_input($_POST["username"]);
         if (!preg_match("/^[a-zA-Z0-9]*$/",$username) || $username=='') {
          $usernameErr = "*Only letters and numbers allowed";
          $b=false;
        }
      }

  if (empty($_POST["name"])) {
    $nameErr = "*Name is required";
    $b=false;
  } else {
    $name = test_input($_POST["name"]);
     if (!preg_match("/^[a-zA-Z]*$/",$name) || $name=='') {
      $nameErr = "*Only letters allowed ";
      $b=false;
    }
  }


  if (empty($_POST["surname"])) {
    $surnameErr = "*Surname is required";
    $b=false;
  } else {
    $surname = test_input($_POST["surname"]);
     if (!preg_match("/^[a-zA-Z]*$/",$surname) || $surname=='') {
      $surnameErr = "*Only letters allowed ";
      $b=false;
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "*Email is required";
    $b=false;
  } else {
    $email = test_input($_POST["email"]);
     if (!preg_match("/^[a-zA-Z0-9\.]*@[a-z\.]{1,}[a-z]*$/",$email) || $email=='') {
      $emailErr = "*Enter a Valid Email";
      $b=false;
    }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "*Password is required";
    $b=false;
  } else {
    $password = test_input($_POST["password"]);
     if (!preg_match("/^[a-zA-Z0-9]{7,}$/",$password) || $password=='') {
      $passwordErr = "*Enter minimum 7 characters ";
      $b=false;
    }
  }
  if (empty($_POST["confirm"])) {
    $cpasswordErr = "*Confirmation of Password is required";
    $b=false;
  } else {
    $cpassword = test_input($_POST["confirm"]);
    $password= test_input($_POST["password"]);
    if (strcmp($password,$cpassword)!=0) {
      $cpasswordErr = "*Password does not match ";
      $b=false;
    }
  }

  if (empty($_POST["phone"])) {
    $phoneErr = "*Contact Number is required";
    $b=false;
  } else {
    $phone = test_input($_POST["phone"]);
    if(!preg_match("/^[0-9]{10,10}$/",$phone) || $phone==''){
    	$phoneErr = "*Enter A Valid Contact Number";
    	$b=false;
    }
  }
}
if($b==true && isset($_POST['submit']))
{
    $sql = "insert into login(username,password,name,surname,email,phone) values('$username','$password','$name','$surname','$email',$phone)";
		$res=$conn->query($sql);
    $sql1="select uid from login where username='$username'";
    $result=$conn->query($sql1);
    $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
    $_SESSION['username']=$username;
    $_SESSION['type']='normal';
		$_SESSION['id']=$row['uid'];
		header('Location: normalHomeSale.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>HomePros</title>
	<meta charset="UTF-8">
	<meta name="description" content="HomePros">
	<meta name="keywords" content="LERAMIZ, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<!-- Stylesheets -->
	<!-- <link rel="stylesheet" href="css/bootstrap.min.css"/> -->
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
	          <ul class="navbar-nav ml-auto">
	            <li class="nav-item">
	              <a class="nav-link" href="index.html">Home  </a>
	            </li>
	            <li class="nav-item">
	              <a class="nav-link" href="about.html">About Us  </a>
	            </li>
	            <li class="nav-item">
	              <a class="nav-link" href="contact.html">Contact Us  </a>
	            </li>

	          </ul>
	        </div>
	      </nav>
			</div>
		</div>
	</header>

<section class="page-top-section set-bg " data-setbg="img/page-top-bg.jpg">
  <div class="container register">

                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <br /><br />
                        <h6>You are 30 seconds away from owning your own house!</h6>
                        <br /><br /><br />
                        <li style="list-style:none;" class="nav-item">
                            <a class="nav-link"  style="font-size:2rem; font-weight:bold;" href="http://localhost/Real-Estate-1/reg_builder.php">Builder?</a>
                            </li>
                        <li style="list-style:none ;" class="nav-item">
          	              <a class="nav-link"style="font-size:2rem; font-weight:bold;" href="http://localhost/Real-Estate-1/loginuser.php">Login</a>
          	            </li>
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Register as a Customer</h3>
                                <form method="post" action="register.php">
                                <div class="row register-form">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" placeholder="First Name *" value="" />
                                            <span class="error"><?php echo $nameErr; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="surname" placeholder="Last Name *" value="" />
                                            <span class="error"><?php echo $surnameErr; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control"  name="username" placeholder="UserName *" value="" />
                                            <span class="error"><?php echo $usernameErr; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" placeholder="Password *" value="" />
                                            <span class="error"><?php echo $passwordErr; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="confirm" placeholder="Confirm Password *" value="" />
                                            <span class="error"><?php echo $cpasswordErr; ?></span>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="Your Email *" value="" />
                                            <span class="error"><?php echo $emailErr; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" name="phone" name="txtEmpPhone" class="form-control" placeholder="Your Phone *" value="" />
                                            <span class="error"><?php echo $phoneErr; ?></span>

                                        </div>

                                        <br /><br /><br /><br />
                                        <input type="submit" class="btnRegister" name="submit" value="Register"/>
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
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/masonry.pkgd.min.js"></script>
<script src="js/magnific-popup.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
