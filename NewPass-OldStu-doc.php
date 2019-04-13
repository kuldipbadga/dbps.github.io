
<?php
    include('Loginid.php');
    $id=$_SESSION['id'];
    if(isset($_POST["done"])) {
        $target_dir = "Document/ ";
        $photo=$_FILES["photo"]["name"];
        $icard=$_FILES["icard"]["name"];
        $re=$_FILES["re"]["name"];
        $hall=$_FILES["hall"]["name"];

        $temp1=$_FILES["photo"]["tmp_name"];
        $temp2=$_FILES["icard"]["tmp_name"];
        $temp3=$_FILES["re"]["tmp_name"];
        $temp4=$_FILES["hall"]["tmp_name"];

        $target_file0 = $target_dir . $photo;
        $target_file1 = $target_dir . $icard;
        $target_file2 = $target_dir . $re;
        $target_file3 = $target_dir . $hall;
        $uploadOk = 1;

        $imageFileType0 = strtolower(pathinfo($target_file0,PATHINFO_EXTENSION));
        $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
        $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
        $imageFileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file0)) {
            $_SESSION['photo_exist']="Sorry, file already exists.";
            $uploadOk = 0;
        }
        if (file_exists($target_file1)) {
            $_SESSION['icard_exist']="Sorry, file already exists.";
            $uploadOk = 0;
        }
        if (file_exists($target_file2)) {
            $_SESSION['re_exist']="Sorry, file already exists.";
            $uploadOk = 0;
        }
        if (file_exists($target_file3)) {
            $_SESSION['hall_exist']="Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["photo"]["size"] > 2000000) {
            $_SESSION['photo_size']="Sorry, your file is too large. it must be less than 2MB";
            $uploadOk = 0;
        }
        if ($_FILES["icard"]["size"] > 2000000) {
            $_SESSION['icard_size']="Sorry, your file is too large. it must be less than 2MB";
            $uploadOk = 0;
        }
        if ($_FILES["re"]["size"] > 2000000) {
            $_SESSION['re_size']="Sorry, your file is too large. it must be less than 2MB";
            $uploadOk = 0;
        }
        if ($_FILES["hall"]["size"] > 2000000) {
            $_SESSION['hall_size']="Sorry, your file is too large. it must be less than 2MB";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType0 != "jpg" && $imageFileType0 != "png" && $imageFileType0 != "jpeg" ) {
            $_SESSION['photo_type']="Sorry, only JPG, JPEG & PNG files are allowed.";
            $uploadOk = 0;
        }
        if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" ) {
            $_SESSION['icard_type']="Sorry, only JPG, JPEG & PNG files are allowed.";
            $uploadOk = 0;
        }
        if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" ) {
            $_SESSION['re_type']="Sorry, only JPG, JPEG & PNG files are allowed.";
            $uploadOk = 0;
        }
        if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg" ) {
            $_SESSION['hall_type']="Sorry, only JPG, JPEG & PNG files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        }
        else {
            $mov0=move_uploaded_file($temp1,$target_file0);
            $mov1=move_uploaded_file($temp2,$target_file1);
            $mov2=move_uploaded_file($temp3,$target_file2);
            $mov3=move_uploaded_file($temp4,$target_file3);
        if ($mov0==true && $mov1==true && $mov2==true && $mov3==true) {
            $q="INSERT INTO `old_student_doc`(`id`, `reg_id`,`photo`,`icard`, `fee_re`, `hall_ticket`) VALUES ('','$id','$photo','$icard','$re','$hall')";
            $in=mysqli_query($con,$q);
            if($in)
                header('location:show_detail.php');
            else
                echo "Sorry, there was an error uploading your file.";
        }
        else {
            echo "there was an error uploading your file.";
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
	<h1>Documents Section</h1>
	<div class="login box box--big">
		<!-- form starts here -->
		<form action="" method="post" enctype="multipart/form-data">
            <div class="agile-field-txt">
                <label> Your Photo</label>
                <input type="file" name="photo" required id="myInput"/>
                <strong><font color=red>
                <?php if(isset($_SESSION['photo_exist']))
                        {
                            echo $_SESSION['photo_exist'];
                            unset ($_SESSION['photo_exist']);
                        }
                        if(isset($_SESSION['photo_size']))
                        {
                            echo $_SESSION['photo_size'];
                            unset ($_SESSION['photo_size']);
                        }
                        if(isset($_SESSION['photo_type']))
                        {
                            echo $_SESSION['photo_type'];
                            unset ($_SESSION['photo_type']);
                        }?></font>
            </div>
			<div class="agile-field-txt">
				<label> I-card</label>
				<input type="file" name="icard" required id="myInput"/>
                <strong><font color=red>
                <?php if(isset($_SESSION['icard_exist']))
                        {
                            echo $_SESSION['icard_exist'];
                            unset ($_SESSION['icard_exist']);
                        }
                        if(isset($_SESSION['icard_size']))
                        {
                            echo $_SESSION['icard_size'];
                            unset ($_SESSION['icard_size']);
                        }
                        if(isset($_SESSION['icard_type']))
                        {
                            echo $_SESSION['icard_type'];
                            unset ($_SESSION['icard_type']);
                        }?></font>
			</div>
			<div class="agile-field-txt">
				<label> Last Sem Exam Fee Recipt</label>
				<input type="file" name="re"  id="myInput" />
                <font color=red >
                <?php if(isset($_SESSION['re_exist']))
                        {
                            echo $_SESSION['re_exist'];
                            unset ($_SESSION['re_exist']);
                        }
                        if(isset($_SESSION['re_size']))
                        {
                            echo $_SESSION['re_size'];
                            unset ($_SESSION['re_size']);
                        }
                        if(isset($_SESSION['re_type']))
                        {
                            echo $_SESSION['re_type'];
                            unset ($_SESSION['re_type']);
                        }?></font>
			</div>
            <div class="agile-field-txt">
				<label> Hall Ticket</label>
				<input type="file" name="hall"  id="myInput" />
                <font color=red >
                <?php if(isset($_SESSION['hall']))
                        {
                            echo $_SESSION['hall_exist'];
                            unset ($_SESSION['hall_exist']);
                        }
                        if(isset($_SESSION['hall_size']))
                        {
                            echo $_SESSION['hall_size'];
                            unset ($_SESSION['hall_size']);
                        }
                        if(isset($_SESSION['hall_type']))
                        {
                            echo $_SESSION['hall_type'];
                            unset ($_SESSION['hall_type']);
                        }?></font>
            </div>
            <input type="submit" name="done" value="Submit">
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
