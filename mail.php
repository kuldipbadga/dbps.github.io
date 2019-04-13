<?php
    include('conn.php');
    if(isset($_POST['submit']))
    {

            $email=$_POST['email'];
            $sel=mysqli_query($con,"select * from `registration` where `Email_id`='$email'");
            if(mysqli_num_rows($sel)==1)
            {
                $fetch=mysqli_fetch_array($sel);
                $_SESSION['id']=$fetch['Reg_id'];
                $resetPassLink = 'http://localhost/DIGITAL%20BUS%20PASS/fogot1.php';

                $to = $email;
                $subject = "Password Update Request";
                $mailContent = 'Dear '.$fetch['F_name'].',
                <br/>Recently a request was submitted to reset a password for your account. If this was a mistake, just ignore this email and nothing will happen.
                <br/>To reset your password, visit the following link: <a href="'.$resetPassLink.'">'.$resetPassLink.'</a>
                <br/><br/>Regards,
                <br/>Digital Bus Pass System-dbps';

                //set content-type header for sending HTML email
               $headers = 'From: digital0bus0pass@gmail.com' . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=utf-8';
                //send email
                $e=mail($to,$subject,$mailContent,$headers);
                if($e)
                {
                    echo "The reset password link is sent!";?><a href="https://mail.google.com">check out.</a><?php
                }
                else {
                  echo "check your internet connection...";
                }
            }
            else
            {
                echo "email not find..";
            }
        }
 ?>
