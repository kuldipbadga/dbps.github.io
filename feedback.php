<?php
	include('conn.php');

	$q1="select * from contact";
	$sel=mysqli_query($con,$q1);
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
						<a class="navbar-brand" href="home_admin.html">

                            <img src="images1/logo.png" width="50px" height="50px" >
						</a>
					</div>
					<!--/.navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<nav class="link-effect-2" id="link-effect-2">
							<ul class="nav navbar-nav navbar-right">
								<li class="active"><a href="home_admin.html">Home</a></li>
 		 					<li><a href="show_insti.php" >Requested Institutes</a></li>
 		 					<li><a href="notification.php" >Add New Notification </a></li>
 		 					<li><a href="feedback.php">Feedbacks</a></li>
 		 					<li><a href="home.html" >Logout</a></li>
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
				<td colspan="7" class="h">Feedbacks</td>
			</tr>
			<tr>
				<th>ID</th>
				<th>EMAIL ID</th>
				<th>ACTION</th>
			</tr>

		<?php
		while($fetch=mysqli_fetch_array($sel))
		{
						$id=$fetch['con_id'];
            $email=$fetch['email'];
				?>
				<tr>
					<td>
						<?php echo $id."<br>";?>
				</td>

				<td>
					<?php echo $email."<br>";?>
				</td>

				<td><a href="show_feedback.php?id=<?php echo $id?>">show</a></td>
				</tr><?php
			}

?>
		</table>

	</article>
    	</center>
</body>
</html>
