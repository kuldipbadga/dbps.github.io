<!DOCTYPE html>
<html>

<head>
	<title>Digital Bus Pass System</title>
<link rel="shortut icon" type="image/png" href="images1/logo.png">
</head>

<body>

  <?php
  include('LoginId.php');
  $id=$_SESSION['ver_id'];
  $q="SELECT * FROM `verifier` WHERE ver_id='$id'";
  $sel=mysqli_query($con,$q);
  $row=mysqli_num_rows($sel);
  while($fetch=mysqli_fetch_array($sel,MYSQLI_BOTH))
  {
    $validity=$fetch['validity'];
  }
  if($validity==1)
  {
    header('location:show.php');
  }
  else {
    ?> <script>
      alert("You are not verifiyed!")</script>
      <a href="home_verifier.html">Back to home.</a><?php

  }

   ?>

</body>
</html>
