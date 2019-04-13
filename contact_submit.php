<?php
    
    include('conn.php');
    if(isset($_POST['submit']))
    {
        $fname=$_POST['Fname'];
        $lname=$_POST['Lname'];
        $no=$_POST['Number'];
        $email=$_POST['Email'];
        $msg=$_POST['Message'];
        
        $in=mysqli_query($con,"INSERT INTO `contact`(`con_id`, `first_name`, `last_name`, `mo_no`, `email`, `msg`) VALUES ('','$fname','$lname','$no','$email','$msg')");
        
    }
?>