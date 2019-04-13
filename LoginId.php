<?php
   include("conn.php");
   if(isset($_POST['submit']))
   {
        $email=$_POST['email'];
        $pass=$_POST['password'];
        $sel=$_POST['myInput'];
        if($sel=="Student")
        {
            $s=mysqli_query($con,"SELECT * FROM `registration` WHERE Email_id='$email' and password='$pass'");
            if((mysqli_num_rows($s))==1)
            {
                $fetch=mysqli_fetch_array($s,MYSQLI_BOTH);

                $_SESSION["id"]=$fetch["Reg_id"];
                header("location:home_student.html");
            }
            else
            {
                header('location:Login1.php');

            }
        }

      elseif($sel=="Verifier")
       {
            $s=mysqli_query($con,"SELECT * FROM `verifier` WHERE email='$email' and password='$pass'");

            if((mysqli_num_rows($s))==1)
            {
                $fetch=mysqli_fetch_array($s,MYSQLI_BOTH);
                $_SESSION["ver_id"]=$fetch["ver_id"];
                header("location:home_verifier.html");
            }
            else
            {
                header('location:Login1.php');

            }
       }
       else {
         $s=mysqli_query($con,"SELECT * FROM `admin` WHERE Email_id='$email' and Password='$pass'");

         if((mysqli_num_rows($s))==1)
         {
            header("location:home_admin.html");
         }
         else
         {
             echo "Please select user type "; ?><a href="Login.php">Back to Login Page...</a><?php

         }

       }
   }

?>
