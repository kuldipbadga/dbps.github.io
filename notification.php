<?php

	include('conn.php');

	if(isset($_REQUEST["submit"]))
	{
		$des= $_REQUEST ["des"];
		$link = $_REQUEST["link"];

		$q="INSERT INTO `notification`(`id`, `description`, `link`) VALUES ('','$des','$link')";

		$in=mysqli_query($con,$q);
		if($in)
		{
				echo "Successfully Added...";
		}


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
	<link href="css/comman.css" rel='stylesheet' type='text/css' />

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
								<li class="active"><a href="home_admin.html">Home</a></li>
							 <li><a href="show_insti.php" >Requested Institutes</a></li>
							 <li><a href="notification.php" >Add New Notification </a></li>
							 <li><a href="feedback.php">Feedbacks</a></li>
							 <li><a href="home.html" >Logout</a></li>
							</ul>
						</nav>
					</div>
					<!--/.navbar-collapse-->
					<!--/.navbar-->
				</div>
			</nav>
		</div>
	</div>
	<h1>ADD NOTIFICATION</h1>
	<div class="login box box--big">
		<!-- form starts here -->
		<form action="" method="post" enctype="multipart/form-data">

			<div class="agile-field-txt">
				<label>Description</label>
				<textarea name="des" rows="5" cols="51" placeholder="Enter Description that shows in notification" required=""></textarea>
			</div>

             <div class="agile-field-txt">
				<label>Link (if have)</label>
				<input type="text" name="link" placeholder="Enter Link for information" id="myInput" />
			</div>
			 <div class="agile-field-txt"></div>


            <input type="submit" name="submit" value="ADD">
    	</form>
	</div>
	<!-- //form ends here -->


<div class="footer-bot wow fadeInRight animated" data-wow-delay=".5s">
	<div class="container">
			<div class="logo2">
				<h3><a href="home.html">DBPS</a></h3>
			</div>
			<div class="ftr-menu">
				 <ul>
					 <li class="active"><a href="home_admin.html" class="effect-3">Home</a></li>
					 <li><a href="show_insti.php" class="effect-3">Requested Institutes</a></li>
					 <li><a href="notification.php" class="effect-3">Add New Notification </a></li>
					 <li><a href="#about.php" class="effect-3 scroll">Feedbacks</a></li>
					 <li><a href="home.html" class="effect-3">Logout</a></li>
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
