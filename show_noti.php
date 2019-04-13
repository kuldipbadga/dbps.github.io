<?php

    include('conn.php');


        $q="SELECT * FROM `notification`";


        $sel=mysqli_query($con,$q);


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
						<a class="navbar-brand" href="home_admin.html">

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
								<li><a href="#about" class="effect-3 scroll">About</a></li>
								<li><a href="#contact" class="effect-3 scroll">Contact</a></li>
                <li><a href="show_noti.php"><img class="noti" width="30px" height="30px" src="Document/notification.png" ></img></a></li>
							</ul>
						</nav>
					</div>
					<!--/.navbar-collapse-->
					<!--/.navbar-->
				</div>
			</nav>
		</div>
	</div>

    <!-- First Box Student box-->

    <article>
    <div class="main_box">

      <table>


		<!-- <div class="_box"> -->

            <tr>
			     <td colspan="7" class="s"><h3>Notification</h3></td>
            </tr>
            <?php
            while($fetch=mysqli_fetch_array($sel,MYSQLI_BOTH))
            {
                $des=$fetch['description'];
                $link=$fetch['link'];
            ?>

			<tr>
                <div class="agile-field-txt">

                <td>
    				<label>   Description : </td><td></label><?php echo $des; ?></td>
                </td>
			 </div>
            </tr>
            <tr>
			<div class="agile-field-txt">

                </td>
                <td>
    				<label>Links :  </td><td></label><a href="<?php echo $link; ?>"> <?php echo  $link ?></a></td>
                </td>
			</div>
    </tr><?php } ?>

    </article>
    </div>

</table>


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
