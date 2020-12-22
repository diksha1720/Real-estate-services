<?php
   include("indexDB.php");
   session_start();
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    $username='';$password='';$b=true;
    $passwordErr="";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['username']))
				$username=test_input($_POST['username']);
				else $b=false;
        if(isset($_POST['password']))
				$password=test_input($_POST['password']);
				else $b=false;
        if(isset($_POST['type']))
						$type=test_input($_POST['type']);
						else $b=false;
				$tablename='';$id='';
				if(empty($_POST['username']))
				$b=false;
				if($b==false)
				{
					header('Location: loginuser.php');
				}
        if($type=='normal')
        {
            $id='uid';
            $tablename='login';
        }
        else if($type=='builder')
        {
            $id='bid';
            $tablename='login_builder';
        }
        $q="select $id,password from $tablename where username='$username'";
        // echo $q;
        $result=$conn->query($q);
        if($result==true)
        {
            $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
        }
        else
        {
            $passwordErr = "*Invalid credentials ";
					// header('Location: loginuser.php');
        }
        if($row['password']==$password)
        {
            $_SESSION['username']=$username;
            $_SESSION['type']=$type;
            if($id=='uid' && $b==true)
            {
                $_SESSION['id']=$row['uid'];
               header('Location: normalHomeSale.php');
            }
            if($id=='bid' && $b==true)
            {
                $_SESSION['id']=$row['bid'];
                header('Location: builderHome.php');
            }
        }
        else
        {
          $passwordErr = "*Invalid credentials ";
            // echo "Invalid Password!!!!";
            // header('Location: loginuser.php');
        }
    }
?>
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
	<!-- <link rel="stylesheet" href="css/bootstrap.min.css"/> -->
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<!-- <link rel="stylesheet" type="text/css" href=""> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
	<!-- Page Preloder -->
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
              <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="loginuser.php">Login</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </header>

  <!-- Default form login -->
  <section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class=" loginform text-white">
<form class="text-center border border-light p-5" action="loginuser.php" method="post">
    <p class="h4 mb-12">Sign in</p>
    <input type="text" name="username" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Username">
    <span class="error"><?php echo $passwordErr; ?></span>
    <input type="password" id="defaultLoginFormPassword" name="password" class="form-control mb-4" placeholder="Password">
    <span class="error"><?php echo $passwordErr; ?></span>
    <label for="options"></label>
    <select name="type" >
      <option value="builder">
        Builder
      </option>
      <option value="normal">
        Customer
      </option>
    </select>

    <div class="d-flex justify-content-around">
        <div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">

            </div>
        </div>
    </div>
    <button class="btn btn-info btn-block my-4" type="submit" value="Login">Sign in</button>
    <p>Not a member?
        <a href="register.php"><i>Register</i></a>
    </p>
</form>

</div>
</section>
<!-- Default form login -->
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
