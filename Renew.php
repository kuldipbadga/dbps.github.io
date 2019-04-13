<?php
    include('LoginId.php');
    $id=$_SESSION["id"];

    $sel = mysqli_query($con,"select * from renew where id='$id'");
    
    $f=mysqli_fetch_array($sel);
    if($f['status']==1)
    {
    	echo "You are Verified...";
    	?>
    	<form action="pay.php" method="post" enctype="multipart/form-data">
    	<div class="print">
                   <a href="https://test.instamojo.com/@digital0bus0pass" rel="im-checkout" data-behaviour="remote" data-style="light" data-text="Pay"></a>
                    <button type="submit" name="pay">Get Pass</button>
                    <script src="https://js.instamojo.com/v1/button.js"></script>
                    </div></form><?php
    	exit;
    }
    else {
    	echo "You are already apply for renew pass";
 		?><a href="home_student.html">Click here to back to home</a><?php 
    	exit;
    }
    if(isset($_POST['renew']))
    {
        $sdate=$_POST['sdate'];
        $edate=$_POST['edate'];
        $type=$_POST['type'];
        $target_dir = "Document/ ";
        $old=$_FILES["oldpass"]["name"];
        $target_file = $target_dir . $old;
        $uploadOk = 1;
        $imageFileType1 = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
       
        // Check file size
        if ($_FILES["oldpass"]["size"] > 5000000) {
            $_SESSION['oldpass_size']="Sorry, your file is too large. it must be less than 5MB";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType1 != "jpg" && $imageFileType1 != "pdf" && $imageFileType1 != "jpeg" ) {
            $_SESSION['oldpass
            _type']="Sorry, only JPG, JPEG & PNG files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) 
        {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        }
        else 
        {
            $mov=move_uploaded_file($_FILES["oldpass"]["tmp_name"],$target_file);

	        if ($mov==true)
	       	{ 

	            $q="INSERT INTO `renew`(`id`, `reg_id`, `sdate`, `edate`, `type`, `old_pass`) VALUES ('','$id','$sdate','$edate','$type','$old')";
	            $in=mysqli_query($con,$q);
	            if($in)
	            {
	               	?><b><font color="white"><?php
	                echo "The file has been uploaded.";
	            }
	            else
	            {
	                echo "Sorry, there was an error uploading your file.";
	            }
	        }
        	else 
        	{
            echo "Sorry, there was an error uploading your file.";
        	}
    	}?></font></b><?php
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
								<li class="active"><a href="home_student.html" class="effect-3">Home</a></li>
								<li><a href="condition.php" class="effect-3">Apply New Pass</a></li>
								<li><a href="Renew.php" class="effect-3">Renew</a></li>
								<li><a href="about_student.html" class="effect-3 ">About</a></li>
								<li><a href="contact_student.php" class="effect-3 ">Contact</a></li>
                                <li><a href="home.html" class="effect-3 ">Logout</a></li>
							</ul>
						</nav>
					</div>
					<!--/.navbar-collapse-->
					<!--/.navbar-->
				</div>
			</nav>
		</div>
	</div>
        <h1>Renew Pass</h1>
	<div class="login box box--big">
		<!-- form starts here -->
		<form action="" method="post" enctype="multipart/form-data">
			<div class="agile-field-txt">
				<label>Start-Date</label>
				<input type="date" name="sdate" placeholder="Enter start date" required="" />
			</div>
			<div class="agile-field-txt">
				<label> End-Date</label>
				<input type="date" name="edate" placeholder="Enter to village name" required="" id="myInput" />
			</div>
            <div class="agile-field-txt">
            <label>Select pass type</label>
				<select id="myInput" name="type">
                    <option>Local</option>
                    <option>Express</option>
                </select>
            </div>

            <div class="agile-field-txt">
				<label> Upload Old pass</label>
				<input type="file" name="oldpass" required="" id="myInput" />
                <strong><font color=red>
                <?php if(isset($_SESSION['oldpass_exist']))
                        {
                            echo $_SESSION['oldpass_exist'];
                            unset ($_SESSION['oldpass_exist']);
                        }
                        if(isset($_SESSION['oldpass_size']))
                        {
                            echo $_SESSION['oldpasssize'];
                            unset ($_SESSION['oldpass_size']);
                        }
                        if(isset($_SESSION['oldpass_type']))
                        {
                            echo $_SESSION['oldpass_type'];
                            unset ($_SESSION['oldpass_type']);
                        }?></font></strong>
			</div>

             <input type="submit" name="renew" value="Submit">


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
					<li><a href="home_student.html">Home </a></li>
					<li><a href="condition.php">Apply New Pass</a></li>
					<li><a href="renew.php">Renew</a></li>
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

