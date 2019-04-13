<?php

	include('conn.php');

	if(isset($_REQUEST["submit"]))
	{
		$fname= $_REQUEST ["first"];
        $mname= $_REQUEST ["middle"];
        $lname= $_REQUEST ["last"];
		$mail=$_REQUEST ["email"];
		$no=$_REQUEST["mobile"];
		$pass=$_REQUEST ["password"];
		$rpass=$_REQUEST ["rpassword"];
		$email=mysqli_query($con,"select Email_id from registration where Email_id=$mail");


		if(mysqli_num_rows($email)==0)
		{
            if(preg_match('/^[0-9]{10}$/',$no))
        	{
	            if($pass==$rpass)
	            {
	                $insert="INSERT INTO `registration`(`Reg_id`,`F_name`, `M_name`, `S_name`, `Email_id`, `Contact_no`, `Password`) VALUES ('','$fname','$mname','$lname','$mail','$no','$pass')";

	                $in=mysqli_query($con,$insert);
	                if($in)
	                  header("location:Login.php");
	            }
	            else
	            {
	                $_SESSION["NotMatch"]="Password not match!";
	            }
        	}
        	else
       		{
            	$_SESSION["invalidno"]="Invalid Number!";
        	}

		}
		else
		{
			$_SESSION["emailused"]="Email already exist!";
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
								<li class="active"><a href="home.html" class="effect-3">Home</a></li>
								<li><a href="register.php" class="effect-3">Register</a></li>
								<li><a href="Login.php" class="effect-3">Login</a></li>
								<li><a href="register_verifier.php" class="effect-3">Add New Institute</a></li>
								<li><a href="about.html" class="effect-3 ">About</a></li>
								<li><a href="contact.php"ss class="effect-3 ">Contact</a></li>
							</ul>
						</nav>
					</div>
					<!--/.navbar-collapse-->
					<!--/.navbar-->
				</div>
			</nav>
		</div>
	</div>
	<h1>Registration</h1>
	<div class="login box box--big">
		<!-- form starts here -->
		<form action="" method="post">

			<div class="agile-field-txt">
				<label> First name</label>
				<input type="text" name="first" value="<?php if(isset($_SESSION["NotMatch"]) OR isset($_SESSION["invalidno"]))
                {
                    echo $fname;
                }
                ?>" placeholder="Enter Your Name" required="" />
			</div>
			<div class="agile-field-txt">
				<label> Middle name</label>
				<input type="text" name="middle" value="<?php if(isset($_SESSION["NotMatch"]) OR isset($_SESSION["invalidno"]))
                {
                    echo $mname;
                }
                ?>"  placeholder="Enter Your Father Name" required="" id="myInput" />
			</div>
            <div class="agile-field-txt">
				<label> Surname </label>
				<input type="text" name="last" value="<?php if(isset($_SESSION["NotMatch"]) OR isset($_SESSION["invalidno"]))
                {
                    echo $lname;
                }
                ?>" placeholder="Enter Your Surname" required="" id="myInput" />
			</div>
             <div class="agile-field-txt">
				<label> Email id</label>
				<input type="email" name="email" value="<?php if(isset($_SESSION["NotMatch"]) OR isset($_SESSION["invalidno"]))
                {
                    echo $mail;
                }
                ?>"  placeholder="Enter Your Email id" required="" id="myInput" />
			</div>
			<div class="agile-field-txt">
				<Font size="3px" color="red">
       		 	<?php
        			if(isset($_SESSION['emailused']))
					{
			            echo $_SESSION['emailused'],"<br>";
			            unset($_SESSION['emailused']);
					}
			    ?>
    			</Font>
			</div>

             <div class="agile-field-txt">
				<label>Mobile no</label>
				<input type="text" name="mobile" value="<?php if(isset($_SESSION["NotMatch"]) OR isset($_SESSION["invalidno"]))
                {
                    echo $no;
                }
                ?>" placeholder="Enter Your Mobile number" required="" id="myInput" />
			</div>
            <div class="agile-field-txt">
				<Font color="red">
        <?php
        if(isset($_SESSION['invalidno']))
		{
            echo $_SESSION['invalidno'],"<br>";
            unset($_SESSION['invalidno']);
		}
        ?>
    </Font>
			</div>
             <div class="agile-field-txt">
				<label> Password</label>
				<input type="password" name="password" placeholder="Enter Your Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="" id="myInput" />
			</div>

             <div class="agile-field-txt">
				<label> Re-Password</label>
				<input type="password" name="rpassword" placeholder="Re-Enter Your Password" required="" id="myInput" />

			</div>
             <div class="agile-field-txt">
				<Font color="red">
        <?php
        if(isset($_SESSION['NotMatch']))
		{
            echo $_SESSION['NotMatch'],"<br>";
            unset($_SESSION['NotMatch']);
		}
        ?>
    </Font>
			</div>

            <input type="submit" name="submit" value="SIGN UP">
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
