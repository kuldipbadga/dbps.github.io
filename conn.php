<?php
session_start();
$host="localhost";
$uname="root";
$pass="";
$con=mysqli_connect("localhost","root","");
$db=mysqli_select_db($con,"digitalbuspass");
?>