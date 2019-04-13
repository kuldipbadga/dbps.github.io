<html>
    <head><title>Digital Bus Pass</title></head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">

	    <link href="css/comman.css" rel='stylesheet' type='text/css' />
      <link rel="shortut icon" type="image/png" href="images1/logo.png">
    <body>

<?php
    include("conn.php");

    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $q1="SELECT * FROM `new_student_doc` WHERE Reg_id=$id";
        $sel1=mysqli_query($con,$q1);
        while($fetch=mysqli_fetch_array($sel1,MYSQLI_BOTH))
        {
            $photo=$fetch['photo'];
            $icard=$fetch['icard'];
            $fee=$fetch['add_fee_re'];
            $temp=$fetch['add_slip'];
        }
        $q2="SELECT * FROM `old_student_doc` WHERE Reg_id=$id";
        $sel2=mysqli_query($con,$q2);
        while($fetch=mysqli_fetch_array($sel2,MYSQLI_BOTH))
        {
            $photo=$fetch['photo'];
            $icard=$fetch['icard'];
            $fee=$fetch['fee_re'];
            $temp=$fetch['hall_ticket'];
        }
        if(isset($_POST['show1']))
        {?>
              <img src="Document/ <?php echo $photo;?>" height="250px" width="300px"/><?php
        }
        if(isset($_POST['show2']))
        {?>
          <img src="Document/ <?php echo $icard;?>" height="250px" width="300px"/><?php
        }
        if(isset($_POST['show3']))
        {?>
          <img src="Document/ <?php echo $fee;?>" height="250px" width="300px"/><?php
        }
        if(isset($_POST['show4']))
        {?>
          <img src="Document/ <?php echo $temp;?>" height="250px" width="300px"/><?php
        }

        if(isset($_POST['verified']))
        {
            $q1="SELECT * FROM `registration` WHERE Reg_id=$id";
            $sel1=mysqli_query($con,$q1);
             while($fetch=mysqli_fetch_array($sel1,MYSQLI_BOTH))
             {
                 $name=$fetch['F_name']." ".$fetch['M_name']." ".$fetch['S_name'];

             }
            $q2="INSERT INTO `verified_stu`(`Reg_id`, `name`) VALUES ('$id','$name')";
            $in=mysqli_query($con,$q2);
            if($in) echo "Verified";
            ?>
            <a href="show.php">back to Requested list</a>
        <?php
        }
        if(isset($_POST['yes']))
        {
            $q2="UPDATE `renew` SET `status`=1 where id = '$id'";
            $in=mysqli_query($con,$q2);
            if($in) echo "Verified";
            ?>
            <a href="show.php">back to Requested list</a>
        <?php
        }
        if(isset($_POST['not_verified']))
        {
            if(isset($_POST['check_name']))
            {
                $name=1;
            }
            else
            {
                $name=0;
            }
            if(isset($_POST['check_email']))
            {
                $email=1;
            }
            else
            {
                $email=0;
            }if(isset($_POST['check_no']))
            {
                $no=1;
            }
            else
            {
                $no=0;
            }if(isset($_POST['check_dob']))
            {
                $dob=1;
            }
            else
            {
                $dob=0;
            }if(isset($_POST['check_gen']))
            {
                $gen=1;
            }
            else
            {
                $gen=0;
            }if(isset($_POST['check_age']))
            {
                $age=1;
            }
            else
            {
                $age=0;
            }if(isset($_POST['check_cource']))
            {
                $cource=1;
            }
            else
            {
                $cource=0;
            }if(isset($_POST['check_sem']))
            {
                $sem=1;
            }
            else
            {
                $sem=0;
            }
            if(isset($_POST[' check_start']))
            {
                $start=1;
            }
            else
            {
                $start=0;
            }

            if(isset($_POST['check_end']))
            {
                $end=1;
            }
            else
            {
                $end=0;
            }
            if(isset($_POST['check_vname']))
            {
                $vname=1;
            }
            else
            {
                $vname=0;
            }
            if(isset($_POST['check_pin']))
            {
                $pin=1;
            }
            else
            {
                $pin=0;
            }
            if(isset($_POST['check_dist']))
            {
                $dist=1;
            }
            else
            {
                $dist=0;
            }
            if(isset($_POST['check_depot']))
            {
                $depot=1;
            }
            else
            {
                $depot=0;
            }
            if(isset($_POST['check_photo']))
            {
                $photo=1;
            }
            else
            {
                $photo=0;
            }
            if(isset($_POST['check_icard']))
            {
                $icard=1;
            }
            else
            {
                $icard=0;
            }
            if(isset($_POST['check_add_fee_re']))
            {
                $add_fee_re=1;
            }
            else
            {
                $add_fee_re=0;
            }
            if(isset($_POST['check_slip']))
            {
                $slip=1;
            }
            else
            {
                $slip=0;
            }
            if(isset($_POST['check_insti_name']))
            {
                $insti_name=1;
            }
            else
            {
                $insti_name=0;
            }
            if(isset($_POST['check_insti_add']))
            {
                $insti_add=1;
            }
            else
            {
                $insti_add=0;
            }
            if(isset($_POST['check_insti_cod']))
            {
                $insti_cod=1;
            }
            else
            {
                $insti_cod=0;
            }
            $in="INSERT INTO `not_verified_stu`(`Reg_id`, `name`, `email`, `no`, `dob`, `gender`, `age`, `cource`, `sem`, `sem_start_date`, `sem_end_date`, `village_name`, `pincode`, `district`, `depot`, `insti_name`, `insti_add`, `insti_code`, `photo`, `icard`, `add_fee_re`, `add_slip`) VALUES ('$id','$name','$email','$no','$dob','$gen','$age','$cource','$sem','$start','$end','$vname','$pin','$dist','$depot','$insti_name','$insti_add','$insti_cod','$photo','$icard','$add_fee_re','$slip')";

            $in1=mysqli_query($con,$in);

            if($in1)
            {
                echo "Message sent to student...";
                ?><a href="show.php"> back to Requested list</a><?php
            }

        }

    }

?>

    </body>
</html>
