<?php
	include('conn.php');

	$q1="select * from new_pass";
	$sel=mysqli_query($con,$q1);
	$q2="select * from renew where status=0";
	$se2=mysqli_query($con,$q2);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Digital Bus Pass</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortut icon" type="image/png" href="images1/logo.png">
	<!-- //custom-theme -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

	<link rel="stylesheet" type="text/css" href="css/show.css">

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
						<a class="navbar-brand" href="home_verifier.html">

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
	<!-- /.header -->
<center>


	<article>
		<table align="center">
			<tr>
				<td colspan="7" class="h">Requested Pass</td>
			</tr>
			<tr>
				<th>ID</th>
				<th>NAME</th>
				<th>ACTION</th>
			</tr>

		<?php
		while($fetch=mysqli_fetch_array($sel))
		{
            $reg_id=$fetch['Reg_id'];
            $s=mysqli_query($con,"select * from verified_stu where Reg_id=$reg_id");
            $s1=mysqli_query($con,"select * from not_verified_stu where Reg_id=$reg_id");
            if(mysqli_num_rows($s)==0 && mysqli_num_rows($s1)==0)
            {

			$sel1=mysqli_query($con,"select * from registration where Reg_id=$reg_id");

			while($f=mysqli_fetch_array($sel1))
			{
				$id=$f['Reg_id'];
				$name=$f['F_name']." ".$f['M_name']." ".$f['S_name'];
				?>
				<tr>
					<td>
						<?php echo $id."<br>";?>
				</td>

				<td>
					<?php echo $name."<br>";?>
				</td>

				<td><a href="show1.php?id=<?php echo $fetch['Reg_id']?>">show</a></td>
				</tr><?php
			}
            }
		}
		?>
		</table>

	</article>
	<article>
		<table align="center">
			<tr>
				<td colspan="7" class="h">Renewal Passes</td>
			</tr>
			<tr>
				<th>ID</th>
				<th>NAME</th>
				<th>ACTION</th>
			</tr>

		<?php
		while($fetch=mysqli_fetch_array($se2))
		{
            $reg_id=$fetch['reg_id'];
            $s=mysqli_query($con,"select * from verified_stu where Reg_id=$reg_id");
            $s1=mysqli_query($con,"select * from not_verified_stu where Reg_id=$reg_id");
            if(mysqli_num_rows($s)==0 && mysqli_num_rows($s1)==0)
            {

			$sel1=mysqli_query($con,"select * from registration where Reg_id=$reg_id");

			while($f=mysqli_fetch_array($sel1))
			{
				$id=$f['Reg_id'];
				$name=$f['F_name']." ".$f['M_name']." ".$f['S_name'];
				?>
				<tr>
					<td>
						<?php echo $id."<br>";?>
				</td>

				<td>
					<?php echo $name."<br>";?>
				</td>

				<td><a href="show1_renew.php?id=<?php echo $id?>">show</a></td>
				</tr><?php
			}
            }
		}
		?>
		</table>

	</article>
    	</center>
</body>
</html>
