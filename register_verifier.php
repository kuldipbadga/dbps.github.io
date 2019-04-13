<?php

	include('conn.php');

	if(isset($_REQUEST["submit"]))
	{
		$name= $_REQUEST ["name"];
		$insti_name = $_REQUEST["insti_name"];
		$no=$_REQUEST["mobile"];
		$mail=$_REQUEST ["email"];
		$pass=$_REQUEST ["password"];
		$rpass=$_REQUEST ["rpassword"];


		//icard upload file----
		$target_dir = "Document/ ";
		$icard=$_FILES["icard"]["name"];
		$temp2=$_FILES["icard"]["tmp_name"];
		$target_file1 = $target_dir . $icard;
		$uploadOk = 1;

		$imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));

		if ($_FILES["icard"]["size"] > 2000000) {
				$_SESSION['icard_size']="Sorry, your file is too large. it must be less than 2MB";
				$uploadOk = 0;
		}
		if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" ) {
				$_SESSION['icard_type']="Sorry, only JPG, JPEG & PNG files are allowed.";
				$uploadOk = 0;
		}
		$imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
		$ins=mysqli_query($con,"select insti_name from verifier where insti_name='$insti_name'");

		if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		}
		else
		{
				$mov1=move_uploaded_file($temp2,$target_file1);
				$uploadOk=1;
		}


		//email verification---
		if(mysqli_num_rows($ins)<1)
		{
            if(preg_match('/^[0-9]{10}$/',$no))
        	{
							//password matching----
	            if($pass==$rpass)
	            {
	                $uploadOk=1;
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
			$uploadOk=0;
			$_SESSION["emailused"]="Email already exist!";
		}

		if($uploadOk==1)
		{
				$q="INSERT INTO `verifier`(`ver_id`, `name`, `insti_name`, `no`,`email`, `password`, `insti_card`) VALUES ('','$name','$insti_name','$no','$mail','$pass','$icard')";
				$in=mysqli_query($con,$q);
				if($in)
				{
					?>

					<font	color="white">
						Succecfully Submited...
					</font>
					<?php
				}
				else {
					?>

					<font	color="white">
						Something was wrong...
					</font>
					<?php
				}
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
	<h1>Verifier Details</h1>
	<div class="login box box--big">
		<!-- form starts here -->
		<form action="" method="post" enctype="multipart/form-data">

			<div class="agile-field-txt">
				<label>Your Name</label>
				<input type="text" name="name" value="<?php if(isset($_SESSION["NotMatch"]) OR isset($_SESSION["invalidno"]))
                {
                    echo $name;
                }
                ?>" placeholder="Enter Your Name" required="" />
			</div>

             <div class="agile-field-txt">
				<label>Institute Name</label>
				<input type="text" name="insti_name" value="<?php if(isset($_SESSION["NotMatch"]) OR isset($_SESSION["invalidno"]))
                {
                    echo $mail;
                }
                ?>"  placeholder="Enter Your Institute name" required="" id="myInput" />
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
 <label>Email address</label>
 <input type="email" name="email" value="<?php if(isset($_SESSION["NotMatch"]) OR isset($_SESSION["invalidno"]))
				 {
						 echo $no;
				 }
				 ?>" placeholder="Enter Your Email address" required="" id="myInput" />
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
			<div class="agile-field-txt">
				<label> Institute Icard</label>
				<input type="file" name="icard" required id="myInput"/>
			</div>

            <input type="submit" name="submit" value="SUBMIT">
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
