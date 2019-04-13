<?php
include("conn.php");
if(isset($_POST['get']))
{
		$name=$_POST['name'];
		$no=$_POST['no'];
		$email=$_POST['email'];
		$sel=mysqli_query($con,"select * from registration where `Contact_no`='$no' and `Email_id`='$email'");

		if(mysqli_num_rows($sel)>=1)
		{

			while($fetch=mysqli_fetch_array($sel,MYSQLI_BOTH))
			{
				$id=$fetch['Reg_id'];
				$_SESSION['id'] = $id;

			// Authorisation details.
			$username = "hitenmakwana4@gmail.com";
			$hash = "6a12c570dfb5b101557c6eccf1b7bc9495eff51d52a7c0409b574e621e828877";

			// Config variables. Consult http://api.textlocal.in/docs for more info.
			$test = "0";

			// Data for text message. This is the text message data.
			$sender = "TXTLCL"; // This is who the message appears to be from.
			$numbers =  $no;// A single number or a comma-seperated list of numbers
			$otp=mt_rand(100000,999999); //randrom number generation
			setcookie("otp", $otp);
			$message = "Hey,  ".$name." your OTP is ".$otp.".  If not Requested by you,Ignore it.";
			// 612 chars or less
			// A single number or a comma-seperated list of numbers
			$message = urlencode($message);
			$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
			$ch = curl_init('http://api.textlocal.in/send/?');
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch); // This is the result from the API
			setcookie("result",$result);
			if($result)
			{
					header('location:fogot1.php');
			}


		curl_close($ch);
			}
		}
		else
		{
			echo "User not found";
		}
}

if(isset($_POST['ver']))
{
		$verotp=$_POST['otp'];
		echo $verotp;
		if($verotp==$_COOKIE["otp"])
		{
				header('location:fogot2.php');
		}
		else
		{
				echo("otp wrong");
		}
}
?>
