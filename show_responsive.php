<?php
	include('conn.php');

	$q1="select * from new_pass";
	$sel=mysqli_query($con,$q1);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Digital Bus Pass</title>

<link rel="shortut icon" type="image/png" href="images1/logo.png">
	<link rel="stylesheet" type="text/css" href="css/show_responsive.css">

</head>
<body>



	<article>
		<table align="center">

			<tr>
				<td colspan="7" class="h">Requested Pass</td>
			</tr>
			<tr>
				<th class="id">ID</th>
				<th>NAME</th>
				<th>Action</th>
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
				<tr><td><?php
				echo $id."<br>";
				?></td>

				<td><?php
				echo $name."<br>";
				?></td>
				<td><a href="show1.php?id=<?php echo $fetch['Reg_id']?>">show</a></td></tr><?php
			}
            }
		}
		?>
		</table>
		</article>



</body>
</html>
