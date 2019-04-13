<?php

    include('conn.php');
    if(isset($_POST['submit']))
    {
        $fname=$_POST['Fname'];
        $lname=$_POST['Lname'];
        $no=$_POST['Number'];
        $email=$_POST['Email'];
        $msg=$_POST['Message'];

        $in=mysqli_query($con,"INSERT INTO `contact`(`con_id`, `first_name`, `last_name`, `mo_no`, `email`, `msg`) VALUES ('','$fname','$lname','$no','$email','$msg')");

    }
?>
<!DOCTYPE html>
<html>

<head>
	<title>Digital Bus Pass System</title>
		<!--/metadata -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link rel="shortut icon" type="image/png" href="images1/logo.png">

	<!-- //custom-theme -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />



<body>
	<!-- header -->
	<div class="header" id="home">

		<div class="content white agile-info">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

						<a class="navbar-brand" href="home_student.html">

                            <img src="images1/logo.png" width="50px" height="50px" >
						</a>
					</div>
					<!--/.navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<nav class="link-effect-2" id="link-effect-2">
							<ul class="nav navbar-nav navbar-right">
								<li class="active"><a href="home_verifier.html" class="effect-3">Home</a></li>
								<li><a href="verifier_profile.php" class="effect-3">Profile</a></li>
								<li><a href="show.php" class="effect-3">Requested Passes</a></li>
								<li><a href="about_verifier.html" class="effect-3">About</a></li>
								<li><a href="contact_verifier.php" class="effect-3">Contact</a></li>
                                <li><a href="home.html" class="effect-3">Logout</a></li>
							</ul>
						</nav>
					</div>
					<!--/.navbar-collapse-->
					<!--/.navbar-->
				</div>
			</nav>
		</div>
	</div>


	<!-- contact -->
	<div class="contact" id="contact">
		<div class="container">
			<div class="w3l-services-heading">
				<div class="wls_head_all">
					<h3>Contact</h3>
				</div>
			</div>
			<div class="agile-contact-grids">
				<div class="col-md-5 address">
					<h4>Contact Info</h4>
					<div class="address-row">
						<div class="col-md-2 w3-agile-address-left">
							<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 w3-agile-address-right">
							<h5>Visit Us</h5>
							<p>GOVERNMENT POLYTECHNIC BHUJ </p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="address-row">
						<div class="col-md-2 w3-agile-address-left">
							<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 w3-agile-address-right">
							<h5>Mail Us</h5>
							<p><a href="mailto:makvanakuldip05@gmail.com"> makvanakuldip05@gmail.com</a></p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="address-row">
						<div class="col-md-2 w3-agile-address-left">
							<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 w3-agile-address-right">
							<h5>Call Us</h5>
							<p>+91 111 111 1111</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-7 contact-form">
					<form action="" method="post">
						<input type="text" name="Fname" placeholder="First Name" required="">
						<input class="email" name="Lname" type="text" placeholder="Last Name" required="">
						<input type="text" name="Number" placeholder="Mobile Number" required="">
						<input class="email" name="Email" type="text" placeholder="Email" required="">
						<textarea name="Message" placeholder="Message" required=""></textarea>
						<input type="submit" name="submit" value="SUBMIT" >

					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //contact -->
<!-- footer -->

<div class="footer-bot wow fadeInRight animated" data-wow-delay=".5s">
	<div class="container">
			<div class="logo2">
				<h3><a href="home_student.html">DBPS</a></h3>
			</div>
			<div class="ftr-menu">
				 <ul>
					<li><a href="home_verifier.html" ">Home </a></li>
					<li><a href="verifier_profile.php"">Profile</a></li>
					<li><a href="show.php">Requested Passes</a></li>
					<li><a href="about_verifier.html">About us</a></li>
					<li><a href="contact_verifier.php" >Contact</a></li>
                     <li><a href="home.html" >Logout</a></li>
				 </ul>
			</div>
			<div class="clearfix"></div>
	</div>
</div>
<div class="copy-right wow fadeInLeft animated" data-wow-delay=".5s">
	<div class="container">
			<p> &copy; 2018 Digital Bus Pass System. All Rights Reserved | Developed by Hiten Makwana & Kuldip Makwana</p>
	</div>
</div>
<!-- //footer -->

<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- //js -->

<!-- start-smoth-scrolling -->
				<script type="text/javascript" src="js/move-top.js"></script>
				<script type="text/javascript" src="js/easing.js"></script>
				<script type="text/javascript">
					jQuery(document).ready(function($) {
						$(".scroll").click(function(event){
							event.preventDefault();
							$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
						});
					});
				</script>
		<!-- start-smoth-scrolling -->
		<!-- smooth scrolling-bottom-to-top -->
				<script type="text/javascript">
					$(document).ready(function() {
					/*
						var defaults = {
						containerID: 'toTop', // fading element id
						containerHoverID: 'toTopHover', // fading element hover id
						scrollSpeed: 1200,
						easingType: 'linear'
						};
					*/
					$().UItoTop({ easingType: 'easeOutQuart' });
					});
				</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 10;"> </span></a>
				<script src="js/SmoothScroll.min.js"></script>



<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->




</body>

</html>
