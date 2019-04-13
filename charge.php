<?php
    include('LoginId.php');
    if(isset($_POST['next4']))
    {
        $fromvillage=$_POST['from'];
        $tovillage=$_POST['to'];
        $type=$_POST['passtype'];
        $id=$_SESSION['id'];

        $s="SELECT * FROM `distance` WHERE `From_village`='$fromvillage' and `To_village`='$tovillage' and `Pass_type`='$type'";
        $sel=mysqli_query($con,$s);

        if((mysqli_num_rows($sel))==1)
        {
            while($fetch=mysqli_fetch_array($sel,MYSQLI_BOTH))
            {
                $charge=$fetch['Amount'];
                $q="INSERT INTO `student_pass`(`pass_id`, `fvillage`, `tvillage`, `type`,`charge`) VALUES ('','$fromvillage','$tovillage','$type','$charge')";
                $in=mysqli_query($con,$q);

                if($in){
                    $_SESSION['charge']=$charge;
                }
            }
        }


    }

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Digital Bus Pass</title>
	<link href="css/comman.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortut icon" type="image/png" href="images1/logo.png">
</head>

<body>
	<h1>Route Details</h1>
    <h2>Distance</h2>
	<div class="login box box--big">
		<!-- form starts here -->
		<form action="" method="post">
			<div class="agile-field-txt">
				<label>From-Village</label>
				<input type="text" name="from" placeholder="Enter from village name" required="" />
			</div>
			<div class="agile-field-txt">
				<label> To-Village</label>
				<input type="text" name="to" placeholder="Enter to village name" required="" id="myInput" />
			</div>
            <div class="agile-field-txt">
            <label>Select pass type</label>
				<select id="myInput" name="passtype">
                    <option>local</option>
                    <option>express</option>
                </select>
            </div>
            <div class="agile-field-txt">
            <label>Charge</label>
                <div id="myinput">
				<?php
                    if(isset($_SESSION['charge']))
                    {
                        echo $_SESSION['charge'];
                    }
                ?>
                </div>
            </div>

            <input type="submit" name="next4" value="Next-->">
    	</form>
	</div>
	<!-- //form ends here -->
	<!--copyright-->
	<div class="copy-w">
        <p><a href="home_student.html">Home</a> | <a href="NewPass.php">Apply New Pass</a> |<a href="Renew.html">Renew</a> |<a href="contact.php">Contact Us</a> | <a href="about.html">About</a>| <a href="home.html">Logout</a></p>
		<p>© 2018-19 Digital Bus Pass . All Rights Reserved | Developed by Group number:4
		</p>
	</div>
	<!--//copyright-->
</body>
</html>
