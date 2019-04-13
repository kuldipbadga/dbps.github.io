<?php

    include('conn.php');


    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $q1="SELECT * FROM `renew` WHERE reg_id='$id' and status=0";


        $sel1=mysqli_query($con,$q1);
        while($fetch=mysqli_fetch_array($sel1,MYSQLI_BOTH))
        {
            $sdate=$fetch['sdate'];
            $edate=$fetch['edate'];
            $type=$fetch['type'];
            $old_pass=$fetch['old_pass'];
        }
    }
    
?>
<!DOCTYPE html>
<html>

<head>
	<title>Digital Bus Pass</title>
		<!--/metadata -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">


	<!-- //custom-theme -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/verifier.css" rel="stylesheet" type="text/css" media="all" />
<link rel="shortut icon" type="image/png" href="images1/logo.png">

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

    <!-- First Box Student box-->

    <article>
    <div class="main_box">

      <table>

       <!--  <h3>Select Wrong Details</h3> -->

            <form action="" method="post">
                <button type="submit" name="select" >Select All</button>
                <button type="submit" name="dselect" >Deselect All</button>
            </form>
            <form action="v_submit.php?id=<?php echo $id;?>" method="post">
                <button type="submit" name="no">Not Verified</button>
                <button type="submit"  name="yes">Verified</button>
    <!-- <div class="_box"> -->

            <tr>
			     <td colspan="7" class="s"><h3>Renewal Details</h3></td>
            </tr>


           <!--  <div class="photo">
                <img src="C:\xampp\htdocs\DIGITAL BUS PASS SYSTEM\images1\logo.png" ></img>

            </div> -->
			<tr>
                <div class="agile-field-txt">
               <td width="10px" align="center">
                 <input type="checkbox"
                 <?php if(isset($_POST['select']))
                 {
                     ?> checked<?php
                 }
                 ?> name="check_name" >
                </td>
                <td>
    				<label>   Start Date : </td><td></label><?php echo $sdate; ?></td></tr>
                </td>
			 </div>
            </tr>
            <tr>
			<div class="agile-field-txt">
                <td width="10px" align="center">
                    <input type="checkbox"
                    <?php if(isset($_POST['select']))
                    {
                        ?> checked<?php
                    }
                    ?> name="check_email" >
                </td>
                <td>
    				<label>End Date :  </td><td></label><?php echo $edate; ?></td></tr>
                </td>
			</div>
            </tr>
            <tr>
	        <div class="agile-field-txt">
                <td width="10px" align="center">
                    <input type="checkbox"
                    <?php if(isset($_POST['select']))
                    {
                        ?> checked<?php
                    }
                    ?> name="check_no">
                </td>
                <td>
    				<label> Type :  </td><td></label><?php echo $type; ?></td></tr>
                </td>
			</div>
            </tr>

            <tr>

             <div class="agile-field-txt" class="p">
                <td width="50px" align="center">
                 <input type="checkbox"
                <?php if(isset($_POST['select']))
                {
                    ?> checked<?php
                }
                ?> name="check_photo">
                <label>Photo :</label>                            
                </td>

                <td>
                    <div class="pic">
                        <img src="Document/ <?php echo $old_pass ?>" width="300px" height="300px" />
                </div>
            </td>
            </div>


             </tr>
</article>


 
    </div>
</form> 



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
