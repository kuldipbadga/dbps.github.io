<?php

    include('LoginId.php');
    $id=$_SESSION['ver_id'];
    $q="SELECT * FROM `verifier` WHERE ver_id='$id'";
    $sel=mysqli_query($con,$q);
    $row=mysqli_num_rows($sel);
    while($fetch=mysqli_fetch_array($sel,MYSQLI_BOTH))
    {
        $name=$fetch['name'];
        $insti_name=$fetch['insti_name'];
        $no=$fetch['no'];
        $email=$fetch['email'];
        $icard=$fetch['insti_card'];
        $validity=$fetch['validity'];
    }
?>
<!DOCTYPE html>
<html>

<head>
	<title>Digital Bus Pass</title>
		<!--/metadata -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link rel="shortut icon" type="image/png" href="images1/logo.png">

	<!-- //custom-theme -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/verifier.css" rel="stylesheet" type="text/css" media="all" />
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
                <li class="active"><a href="home_verifier.html" class="effect-3">Home</a></li>
                <li><a href="verifier_profile.php" class="effect-3">Profile</a></li>
                <li><a href="verification.php" class="effect-3">Requested Passes</a></li>
                <li><a href="#about" class="effect-3 scroll">About</a></li>
                <li><a href="#contact" class="effect-3 scroll">Contact</a></li>
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


    <article>
	<div class="main_box">

         <table>

            <label>Status:
              <?php if($validity==1)
                {
                    echo "You are able to verify Students.";
                }
                else
                {
                    echo "You are not verified!";
                }
            ?></label>

            <tr>
                 <td colspan="7" class="s"><h3>Your Details</h3></td>
            </tr>
            		<tr>
                <div class="agile-field-txt">

                          <td align="center">
                          <label>Name : </label></td>
                          <br><td><?php
                    echo $name;
                ?>
                </td>
			           </div>
            </tr>
            <tr>
			<div class="agile-field-txt">
                <td align="center">
				<label>Email : </label>
                </td>

                <td>
                <?php
                echo $email;
              ?>
            </td>

			</div>
            </tr>
            <tr>
			<div class="agile-field-txt">
                <td align="center">
				<label>Institute Name : </label>
                </td>

                <td>
                <?php
                echo $insti_name;
              ?>
            </td>

			</div>
            </tr>
            <tr>
			<div class="agile-field-txt">
                <td align="center">
				<label>No : </label>
                </td>

                <td>
                <?php
                echo $no;
              ?>
            </td>

			</div>
            </tr>
            <tr>
			<div class="agile-field-txt">
                <td align="center">
				<label>Icard : </label>
                </td>

                <td>
                <?php
                echo $icard;
              ?>
            </td>

			</div>
            </tr>


        </article>



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
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
				<script src="js/SmoothScroll.min.js"></script>



<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->




</body>

</html>
