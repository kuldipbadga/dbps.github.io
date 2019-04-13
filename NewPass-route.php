<?php
    include('LoginId.php');
    $id=$_SESSION['id'];
    if(isset($_POST['next4']))
    {
        $fromvillage=$_POST['from'];
        $tovillage=$_POST['to'];
        $type=$_POST['passtype'];
        $id=$_SESSION['id'];


        $s="SELECT * FROM `distance`";
        $sel=mysqli_query($con,$s);

        if((mysqli_num_rows($sel))>=1)
        {
            while($fetch=mysqli_fetch_array($sel,MYSQLI_BOTH))
            {
                if(strcasecmp($fetch['From_village'],$fromvillage)==0 && strcasecmp($fetch['To_village'],$tovillage)==0 && strcasecmp($fetch['Pass_type'],$type)==0)
                {
                    $charge=$fetch['Amount'];
                    $q="INSERT INTO `student_pass`(`pass_id`, `Reg_id`,`fvillage`, `tvillage`, `type`,`charge`) VALUES ('','$id','$fromvillage','$tovillage','$type','$charge')";
                    $in=mysqli_query($con,$q);

                    if($in)
                    {
                        $q="SELECT `sem` FROM `new_pass` WHERE Reg_id=$id";
                        $sel=mysqli_query($con,$q);
                        $fetch=mysqli_fetch_array($sel,MYSQLI_BOTH);
                        $sem=$fetch["sem"];
                        if($sem==1){
                        header('location:NewPass-NewStu-doc.php');
                    }
                    else
                    {header('location:NewPass-OldStu-doc.php');}
                    }

                }

            }
        }
        else{
            $_SESSION['noRoot']="Does not find root";
        }


    }
    if(isset($_POST['amount']))
    {
        $fromvillage=$_POST['from'];
        $tovillage=$_POST['to'];
        $type=$_POST['passtype'];
        $id=$_SESSION['id'];

        $s="SELECT * FROM `distance`";
        $sel=mysqli_query($con,$s);

        if((mysqli_num_rows($sel))>=1)
        {
            while($fetch=mysqli_fetch_array($sel,MYSQLI_BOTH))
            {
                if(strcasecmp($fetch['From_village'],$fromvillage)==0 && strcasecmp($fetch['To_village'],$tovillage)==0 && strcasecmp($fetch['Pass_type'],$type)==0)
                {
                   $_SESSION["a"]=$fetch['Amount'];
                }

            }

            $_SESSION["fvillage"]=$fromvillage;
            $_SESSION["tvillage"]=$tovillage;

        }
        else{
            $_SESSION['noRoot']="Does not find route";
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
        <h1>Route Details</h1>
    <h2>Distance</h2>
	<div class="login box box--big">
		<!-- form starts here -->
		<form action="" method="post">
			<div class="agile-field-txt">
				<label>From-Village</label>
				<input type="text" name="from" placeholder="Enter from village name" required="" value="<?php if(isset($_SESSION['fvillage']))
                    {
                        echo $_SESSION['fvillage'];
                        unset($_SESSION['fvillage']);
                    }else echo "";?>"/>
			</div>
			<div class="agile-field-txt">
				<label> To-Village</label>
				<input type="text" name="to" placeholder="Enter to village name" required="" value="<?php if(isset($_SESSION['tvillage']))
                    {
                        echo $_SESSION['tvillage'];
                        unset($_SESSION['tvillage']);
                    }else echo "";?>"id="myInput" />
			</div>
            <div class="agile-field-txt">
            <label>Select pass type</label>
				<select id="myInput" name="passtype">
                    <option>local</option>
                    <option>express</option>
                </select>
            </div>
            <div class="agile-field-txt">
          		<label>Charge:-
                <?php
                    if(isset($_SESSION['a']))
                    {
                        echo $_SESSION['a'];
                        unset($_SESSION['a']);
                    }
                    if(isset($_SESSION['noRoot']))
                    {  ?>
                        <font color=white><?php
                        echo $_SESSION['noRoot'];
                        unset($_SESSION['noRoot']);
                    }
                            ?></font>
            </label>

            </div>
            <input type="submit" name="amount" value="Show Amount">
            <input type="submit" name="next4" value="Next-->">
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
