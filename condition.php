<?php
	
	include('Loginid.php');
    $id=$_SESSION['id'];
	$q="SELECT `Reg_id` FROM `new_pass` WHERE Reg_id='$id'";
	$find=mysqli_query($con,$q);

	if(mysqli_num_rows($find)<=0){
		header('location:NewPass.php');

	}
	else{
		header('location:show_detail.php');
	}

	

?>