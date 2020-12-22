<?php
    include('indexDB.php');
    session_start();
    $loc=$city=$desc=$am=$ar=$i=$i1=$i2=$i3=$rate='';$cost=0;
    $locErr=$cityErr=$descErr=$amErr=$arErr=$iErr=$costErr=$rateErr='';
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$b=true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["loc"])) {
        $locErr = "*Location is required";
        $b=false;
      } else {
        $loc = test_input($_POST["loc"]);
         if (!preg_match("/^[a-zA-Z_ ]*$/",$loc) || $loc=='') {
          $locErr = "*Only letters allowed";
          $b=false;
        }
      }
      if (empty($_POST["city"])) {
        $cityErr = "*City is required";
        $b=false;
      } else {
        $city = test_input($_POST["city"]);
         if (!preg_match("/^[a-zA-Z]*$/",$city) || $city=='') {
          $cityErr = "*Only letters allowed";
          $b=false;
        }
      }
      if (empty($_POST["desc"])) {
        $descErr = "*Description is required";
        $b=false;
      } else {
        $desc = test_input($_POST["desc"]);
      }
      if (empty($_POST["amen"])) {
        $amErr = "*Amenities is required";
        $b=false;
      } else {
        $am = test_input($_POST["amen"]);
      }
      if (empty($_POST["img1"])) {
        $iErr = "*Image is required";
        $b=false;
      } else {
        $i = test_input($_POST["img1"]);
        $i1= test_input($_POST["img2"]);
        $i2= test_input($_POST["img3"]);
        $i3= test_input($_POST["img4"]);
      }
  if (empty($_POST["area"])) {
    $arErr = "*Area is required";
    $b=false;
  } else {
    $ar = test_input($_POST["area"]);
    if(!preg_match("/^[0-9]{1,10}$/",$ar) || $ar==''){
    	$arErr = "*Enter only Numbers";
    	$b=false;
    }
  }
  if (empty($_POST["rate"])) {
		$rateErr = "*Rate is required";
    $b=false;
  } else {
		$rate = test_input($_POST["rate"]);
		if(!preg_match("/^[0-9]{1,10}$/",$rate) || $rate==''){
    	$rateErr = "*Enter only Numbers";
    	$b=false;
    }
	}
}
if($b==true && isset($_POST['submit']))
{
		$id='';
		if($_SESSION['type']=='normal')
		{
			$id='uid';
		}
		else
		{
			$id='bid';
		}
    $q1="insert into flat(location,".$id.",city,description,amenities,area,image,image1,image2,image3) values('$loc',".$_SESSION['id'].",'$city','$desc','$am',$ar,'$i','$i1','$i2','$i3')";
		$result1 = $conn->query($q1);
		echo $q1;
    echo "Insert in flat done";
    $q3="select flat_id from flat where location='$loc' and city='$city' and area=$ar and amenities='$am'";
    $r3=$conn->query($q3);
    $x=mysqli_fetch_array($r3, MYSQLI_ASSOC);
    $test=$x['flat_id'];
    echo "flat id fetched is ".$test;
    $cost=$rate*$ar;
		$q2="insert into sale(flat_id,totalcost,rate) values($test,$cost,$rate)";
		echo $q2;
    $result2 = $conn->query($q2);
    echo "Sale inserted";
    if($_SESSION['type']=='normal')
		{
			header('Location: normalHomeSale.php');
		}
		else
		{
			header('Location: builderHome.php');
		}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>HomePros</title>
	<meta charset="UTF-8">
	<meta name="description" content="HOUSING-CO">
	<meta name="keywords" content="HOUSING-CO, unica, creative, html">
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

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


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
              <?php
							    if($_SESSION['type']=='builder')
                            {
                                echo "<li class='nav-item'>
                                <a class='nav-link' href='builderHome.php'>Home</a>
                                </li>";
                            }
                            else
                            {
                                echo "<li class='nav-item'><a class='nav-link' href='normalHomeSale.php'>Home</a></li>";
                            }
                            ?>

							<!-- <li class="nav-item">
                <a class="nav-link" href="normalHomeSale.php">ForSale  </a>
							<li class="nav-item">
                <li><a class="nav-link" href="normalHomeRent.php">ForRent  </a></li>
              </li> -->
							<!-- <li class="nav-item">
                <a class="nav-link" href="upcomingprojects.php">UpcomingProjects  </a>
              </li> -->
							<li class="nav-item">
                <a class="nav-link" href="PackersAndMovers.php">Packers&Movers  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php"><?php echo $_SESSION['username']."";?><i class="fa fa-sign-out"></i>Logout</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </header>
	<!-- Header section end -->
	<section class="hero-section set-bg" data-setbg="img/bg.jpg">
	<br /><br /></br>

              <div class="container register">

                            <div class="row">
                                <div class="col-md-3 register-left">
                                    <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                                    <h3 style="color:white;">Thankyou!</h3>
                                    <br /><br />
                                    <h5 style="color:white;">For choosing HomePros</h5>
                                    <br /><br /><br />
                                    <?php
                      							if($_SESSION['type']=='normal')
                      							{
                      								echo "<li style='list-style:none;' class='nav-item'>
                                          <a class='nav-link'  style='font-size:2rem; font-weight:bold;' href='http://localhost/Real-Estate-1/normalHomeSale.php'> Properties</a>
                                          </li>";
                      							}
                      							else
                      							{
                                      echo "<li style='list-style:none;' class='nav-item'>
                                          <a class='nav-link'  style='font-size:2rem; font-weight:bold;' href='http://localhost/Real-Estate-1/builderHome.php'>Properties</a>
                                          </li>";
                      							}
                      							?>

                                    <li style="list-style:none ;" class="nav-item">
                                      <a class="nav-link"style="font-size:2rem; font-weight:bold;" href="http://localhost/Real-Estate-1/upcomingprojects.php"> Projects</a>
                                    </li>
                                </div>
                                <div class="col-md-9 register-right">
                                    <div class="tab-content" id="myTabContent">

                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <h3 class="register-heading">Register your house for sale</h3>
                                            <form id="form" method="post" action="addprojectsale.php">
                                              <div class="row register-form">


                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                    <input type="text" name="loc" class="form-control" placeholder="Location *" value="" />
                                                    <span class="error"><?php echo $locErr; ?></span>
                                                  </div>
                                                  <div class="form-group">
                                                    <input type="text" name="city" class="form-control" placeholder="City *" value="" />
                                                    <span class="error"><?php echo $cityErr; ?></span>
                                                  </div>
                                                  <div class="form-group">
                                                    <input type="text" name="desc" class="form-control" placeholder="Description *" value="" />
                                                    <span class="error"><?php echo $descErr; ?></span>
                                                  </div>
                                                  <div class="form-group">
                                                    <input type="text" name="amen" class="form-control" placeholder="Amenities *" value="" />
                                                    <span class="error"><?php echo $amErr; ?></span>
                                                  </div>
                                                  <div class="form-group">
                                                    <input type="text" name="area" class="form-control" placeholder="Area *" value="" />
                                                    <span class="error"><?php echo $arErr; ?></span>
                                                  </div>
                                                </div>
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                  <input type="text" name="img1" class="form-control" placeholder="Image1 URL *" value="" />
                                                  <span class="error"><?php echo $iErr; ?></span>
                                              </div>
                                              <div class="form-group">
                                                  <input type="text" name="img2" class="form-control" placeholder="Image2 URL " value="" />
                                                  <span class="error"></span>
                                              </div>
                                              <div class="form-group">
                                                  <input type="text" name="img3" class="form-control" placeholder="Image3 URL " value="" />
                                                  <span class="error"></span>
                                              </div>
                                              <div class="form-group">
                                                  <input type="text" name="img4" class="form-control" placeholder="Image4 URL " value="" />
                                                  <span class="error"></span>
                                              </div>
                                              <div class="form-group">
                                                  <input type="text" name="rate" class="form-control" placeholder="Rate per sq ft *" value="" />
                                                  <span class="error"><?php echo $rateErr;?></span>
                                              </div>
                                              <div class="form-group">
                                                  <input type="submit" name="submit" class="btnRegister" value="Submit" />
                                              </div>
                                            </div>
                                        </div>
                                        </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
</div>

          </section>
    <!-- Properties section end -->

    <section class="set-bg" data-setbg="img/bg.jpg">

    </section>
	<!-- Clients section -->

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
