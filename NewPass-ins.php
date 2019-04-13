<?php
    include('LoginId.php');

    if(isset($_POST['next3']))
    {
        $name=$_POST['name'];
        $add=$_POST['add'];
        $code=$_POST['code'];
        $id=$_SESSION["id"];

        $q="INSERT INTO `institute`(`Insti_id`, `Reg_id`, `Name`, `Address`, `Insti_code`) VALUES ('','$id','$name','$add','$code')";
        $in=mysqli_query($con,$q);

        if($in){
            header('location:NewPass-route.php');
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
						<a class="navbar-brand" href="home_student.html">

                            <img src="images1/logo.png" width="50px" height="50px" >
						</a>
					</div>
					<!--/.navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<nav class="link-effect-2" id="link-effect-2">
							<ul class="nav navbar-nav navbar-right">
								<li class="active"><a href="home_student.html" class="effect-3">Home</a></li>
								<li><a href="NewPass.php" class="effect-3">Apply New pass</a></li>
								<li><a href="Renew.php" class="effect-3">Renew</a></li>
								<li><a href="about_student.html" class="effect-3 ">About</a></li>
								<li><a href="contact_student.php" class="effect-3 ">Contact</a></li>
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
        <h1>Institute Details</h1>
	<div class="login box box--big">
		<!-- form starts here -->
		<form action="" method="post">
			<div class="agile-field-txt">
				<label>Name</label>
				<input type="text" name="name" placeholder="Enter Your Institute name" required="" />
			</div>
			<div class="agile-field-txt">
				<label> Address</label>
				<input type="text" name="add" placeholder="Enter address of institute" required="" id="myInput" />
			</div>
            <div class="agile-field-txt">
				<label> Code</label>
				<input type="text" name="code" placeholder="Enter code of institute" required="" id="myInput" />
			</div>

            <input type="submit" name="next3" value="Next-->">
    	</form>
	</div>
    <!-- //form ends here -->

<div class="footer-bot wow fadeInRight animated" data-wow-delay=".5s">
	<div class="container">
			<div class="logo2">
				<h3><a href="home_student.html">DBPS</a></h3>
			</div>
			<div class="ftr-menu">
				 <ul>
					<li><a href="NewPass.php">Apply Newpass</a></li>
					<li><a href="Renew.php">Renew</a></li>
					<li><a href="about_student.html">About us</a></li>
					<li><a href="contact_student.php">Contact</a></li>
                    <li><a href="home.html">Logout</a></li>
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
