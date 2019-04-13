<?php
    include('LoginId.php');
    $id=$_SESSION["id"];
    $n="SELECT * FROM `registration` WHERE Reg_id=$id";
    $result=mysqli_query($con,$n);
    while($fetch=mysqli_fetch_array($result,MYSQLI_BOTH))
    {
        $f=$fetch["F_name"];
        $m=$fetch["M_name"];
        $s=$fetch["S_name"];
        $no=$fetch["Contact_no"];
    }
    if(isset($_POST['next1']))
    {
        $name=$_POST['name'];
        $dob=$_POST['dob'];

        $dateOfBirth = $dob;
		$today = date("Y-m-d");
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age= $diff->format('%y');

        $no=$_POST['no'];
        $gen=$_POST['gender'];
        $course=$_POST['course'];
        $sem=$_POST['sem'];
        $sdate=$_POST['sdate'];
        $edate=$_POST['edate'];
        $id=$_SESSION["id"];
        $q="INSERT INTO `new_pass`(`stu_id`, `Reg_id`, `birth_date`, `gender`, `age`, `course`, `sem`, `Sem_start_date`, `Sem_end_date`) VALUES ('','$id','$dob','$gen','$age','$course','$sem','$sdate','$edate')";
        $in=mysqli_query($con,$q);
        if($in){
            header('location:NewPass-address.php');
        }
        else echo "error";
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

		<!-- form starts here -->
		<h1>Student Details</h1>
	<div class="login box box--big">
		<!-- form starts here -->
		<form action="" method="post">
			<div class="agile-field-txt">
				<label> Name</label>
				<input type="text" name="name" placeholder="Enter Your Name" value="<?php echo $f," ",$m," ",$s?>" required />
			</div>
			<div class="agile-field-txt">
				<label> Date Of Birth</label>
				<input type="date" name="dob" placeholder="DOB" requiredid="myInput" />
			</div>

             <div class="agile-field-txt">
				<label> Mobile no.</label>
				<input type="text" name="no"  placeholder="Enter Your Mobile number" value="<?php echo $no; ?>" required="" id="myInput" />
			</div>
             <div class="agile-field-txt">
				<label>Select Gender</label>
				<select name="gender" id="myInput">
                    <option hidden="">select</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
			</div>
             <div class="agile-field-txt">
				<label> Course</label>
				<input type="text" name="course" placeholder="Enter Your course" required="" id="myInput" />
			</div>
            <div class="agile-field-txt">
				<label> Semester</label>
				<input type="number" name="sem"  placeholder="Enter Your Current Semester" required="" id="myInput" />
			</div>
             <div class="agile-field-txt">
				<label> Sem-start-date</label>
				<input type="date" name="sdate" placeholder="Enter Semester starting date" required="" id="myInput" />
			</div>
             <div class="agile-field-txt">
				<label> Sem-end-date</label>
				<input type="date" name="edate" placeholder="Enter Semester ending date" required="" id="myInput" />
			</div>
            <input name="next1" type="submit" value="Next-->">
    	</form>
	</div>
	<!-- //form ends here -->
	<!-- //form ends here -->


<div class="footer-bot wow fadeInRight animated" data-wow-delay=".5s">
	<div class="container">
			<div class="logo2">
				<h3><a href="home_student.html">DBPS</a></h3>
			</div>
			<div class="ftr-menu">
				 <ul>
					<li><a href="NewPass.php">Apply New pass</a></li>
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
