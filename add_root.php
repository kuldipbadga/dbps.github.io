<?php

	include('conn.php');

	if(isset($_POST["submit"]))
	{
		$fvillage= $_POST ["fvillage"];
		$tvillage = $_POST["tvillage"];
    $type= $_POST['type'];
    $dis= $_POST['dis'];
    $dur= $_POST['dur'];
    $amount= $_POST['amount'];

		$q="INSERT INTO `distance`(`Dis_id`, `From_village`, `To_village`, `Km`, `Pass_type`, `Duration`, `Amount`) VALUES ('','$fvillage','$tvillage','$dis','$type','$dur',$amount)";

		$in=mysqli_query($con,$q);
		if($in)
		{
      ?><font color=white><?php
				echo "Successfully Added...";?></font><?php
		}
    else {
      ?><font color=red><?php
        echo "Failed!";?></font><?php
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
	<h1>ADD ROOT</h1>
	<div class="login box box--big">
		<!-- form starts here -->
		<form action="" method="post" enctype="multipart/form-data">

			<div class="agile-field-txt">
				<label>From Village Name</label>
				<input type="text" name="fvillage" placeholder="Enter Name of from village" required="" id="myInput"/>
			</div>

             <div class="agile-field-txt">
				<label>To Village Name</label>
				<input type="text" name="tvillage" placeholder="Enter Name of To village" required id="myInput" />
			</div>
			 <div class="agile-field-txt"></div>

       <div class="agile-field-txt">
          <label>Distance (in km)</label>
          <input type="text" name="dis" placeholder="Enter Distance" id="myInput" />
      </div>

       <div class="agile-field-txt">
            <label>Pass Type</label>
            <select name="type">
                <option hidden >Choose Type</option>
                <option>local</option>
                <option>express</option>
            </select>


      </div>
      <div class="agile-field-txt">
          <label>Duration</label>
          <input type="text" name="dur" placeholder="Enter Validity or duration" id="myInput" />
      </div>

      <div class="agile-field-txt">
          <label>Amount</label>
          <input type="text" name="amount" placeholder="Enter Amount" id="myInput" />
      </div>



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
