<!DOCTYPE html>
<html>

<head>
	<title>Digital Bus Pass System</title>
		<!--/metadata -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">

	<link href="css/comman.css" rel='stylesheet' type='text/css' />

<link rel="shortut icon" type="image/png" href="images1/logo.png">
	<!-- //custom-theme -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />

</head>
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
						<a class="navbar-brand" href="home.html">

                            <img src="images1/logo.png" width="50px" height="50px" >
						</a>
					</div>
					<!--/.navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<nav class="link-effect-2" id="link-effect-2">
							<ul class="nav navbar-nav navbar-right">
								<li class="active"><a href="home.html" class="effect-3">Home</a></li>
								<li><a href="register.php" class="effect-3">Register</a></li>
								<li><a href="Login.php" class="effect-3">Login</a></li>
								<li><a href="register_verifier.php" class="effect-3">Add New Institute</a></li>
								<li><a href="about.html" class="effect-3 ">About</a></li>
								<li><a href="contact.php" class="effect-3 ">Contact</a></li>
							</ul>
						</nav>
					</div>
					<!--/.navbar-collapse-->
					<!--/.navbar-->
				</div>
			</nav>
		</div>
	</div>
        <h1>Welcome to Digital Bus Pass</h1>
	<div class="login box box--big">
		<!-- form starts here -->
		<form action="LoginId.php" method="post">
			<div class="agile-field-txt">
				<label> Email</label>
				<input type="email" name="email" placeholder="Enter Email id" required="" />
			</div>
			<div class="agile-field-txt">
				<label> password</label>
				<input type="password" name="password" placeholder="Enter Password" required="" id="myInput" />
            </div>
            <div class="agile-field-txt">
				<label>User Type</label>
				<select name="myInput">
					<option hidden="">Select Type</option>
                    <option>Student</option>
                    <option>Verifier</option>
                </select>
                </div>
            <div class="agile-field-txt">
            <Font color="white"><strong>
                USER NOT FIND!!
                </strong> </Font></div>
                <div class="agile-field-txt">
				<div class="agile-right">
					<a href="fogot.php">forgot password?</a>
				</div>
            </div>
            <input type="submit" name="submit" value="SIGN IN">
		</form>
        </div>


<div class="footer-bot wow fadeInRight animated" data-wow-delay=".5s">
	<div class="container">
			<div class="logo2">
				<h3><a href="home.html">DBPS</a></h3>
			</div>
			<div class="ftr-menu">
				 <ul>
					<li><a href="home.html">Home </a></li>
					<li><a href="Register.php">Register</a></li>
					<li><a href="Login.php">Login</a></li>
					<li><a href="register_verifier.php">Add New Institute</a></li>
					<li><a href="about.html">About us</a></li>
					<li><a href="contact.php">Contact</a></li>
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

<!-- Number Scroler-->
	<script src="js/numscroller-1.0.js"></script>
<!-- /Number Scroler-->
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
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
				<script src="js/SmoothScroll.min.js"></script>



<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->




</body>

</html>
