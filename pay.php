<!DOCTYPE html>
<html>
<head>
  <title>Digital Bus Pass</title>
  <link rel="shortut icon" type="image/png" href="images1/logo.png">

</head>
<body>


<?php
    include('LoginId.php');
    
    $id=$_SESSION['id'];

    $selDoc1 = "select * from new_student_doc WHERE reg_id = '$id'";
    $selDoc2 = "select * from old_student_doc WHERE reg_id = '$id'";
    $selSem = "select sem from new_pass WHERE Reg_id = '$id'";
    $fetch = mysqli_fetch_array(mysqli_query($con,$selSem));
    $sem = $fetch['sem'];
    if(isset($_POST['show1']))
    {
        if($sem == 1)
        {
            $fetch = mysqli_fetch_array(mysqli_query($con,$selDoc1));
            $photo = $fetch['photo'];

            ?><img src="Document/<?php echo $photo ?>" width="500px" height="500px"/><?php
        }
        else
        {
          $fetch = mysqli_fetch_array(mysqli_query($con,$selDoc2));
          $photo = $fetch['photo'];

          ?><img src="Document/<?php echo $photo ?>" width="500px" height="500px"/><?php
        }
    }
    if(isset($_POST['show2']))
    {
        if($sem == 1)
        {
            $fetch = mysqli_fetch_array(mysqli_query($con,$selDoc1));
            $photo = $fetch['icard'];

            ?><img src="Document/<?php echo $photo ?>" width="500px" height="500px"/><?php
        }
        else
        {
          $fetch = mysqli_fetch_array(mysqli_query($con,$selDoc2));
          $photo = $fetch['icard'];

          ?><img src="Document/<?php echo $photo ?>" width="500px" height="500px"/><?php
        }
    }
    if(isset($_POST['show3']))
    {
        if($sem == 1)
        {
            $fetch = mysqli_fetch_array(mysqli_query($con,$selDoc1));
            $photo = $fetch['add_slip'];

            ?><img src="Document/<?php echo $photo ?>" width="500px" height="500px"/><?php
        }
        else
        {
          $fetch = mysqli_fetch_array(mysqli_query($con,$selDoc2));
          $photo = $fetch['fee_re'];

          ?><img src="Document/<?php echo $photo ?>" width="500px" height="500px"/><?php
        }
    }
    if(isset($_POST['show4']))
    {
        if($sem == 1)
        {
            $fetch = mysqli_fetch_array(mysqli_query($con,$selDoc1));
            $photo = $fetch['add_fee_re'];

            ?><img src="Document/<?php echo $photo ?>" width="500px" height="500px"/><?php
        }
        else
        {
          $fetch = mysqli_fetch_array(mysqli_query($con,$selDoc2));
          $photo = $fetch['hall_ticket'];
          ?><img src="Document/<?php echo $photo ?>" width="500px" height="500px"/><?php
        }
    }

    if(isset($_POST['pay']))
    {
        $q1="SELECT * FROM `registration` WHERE Reg_id='$id'";
        $q2="SELECT * FROM `new_pass` WHERE Reg_id='$id'";
        $q3="SELECT * FROM `student_add` WHERE Reg_id='$id'";
        $q4="SELECT * FROM `institute` WHERE Reg_id='$id'";
        $q5="SELECT * FROM `student_pass` WHERE Reg_id='$id'";
        $q6="SELECT * FROM `new_student_doc` WHERE Reg_id='$id'";
        $q7="SELECT * FROM `old_student_doc` WHERE Reg_id='$id'";


        $sel1=mysqli_query($con,$q1);
        while($fetch=mysqli_fetch_array($sel1,MYSQLI_BOTH))
        {
            $name=$fetch['F_name']." ".$fetch['M_name']." ".$fetch['S_name'];

        }
        $sel2=mysqli_query($con,$q2);
        while($fetch=mysqli_fetch_array($sel2,MYSQLI_BOTH))
        {

            $gen=$fetch['gender'];
            $age=$fetch['age'];
            $dob=$fetch['birth_date'];
            $course=$fetch['course'];
            $sem=$fetch['sem'];
            $start=$fetch['Sem_start_date'];
            $end=$fetch['Sem_end_date'];
        }
        $sel3=mysqli_query($con,$q3);
        while($fetch=mysqli_fetch_array($sel3,MYSQLI_BOTH))
        {
            $village=$fetch['village'];
            $pin=$fetch['pincode'];
            $dis=$fetch['district'];
            $depot=$fetch['depot'];
        }
        $sel4=mysqli_query($con,$q4);
        while($fetch=mysqli_fetch_array($sel4,MYSQLI_BOTH))
        {
            $iname=$fetch['Name'];
            $add=$fetch['Address'];

        }
        $sel5=mysqli_query($con,$q5);
        while($fetch=mysqli_fetch_array($sel5,MYSQLI_BOTH))
        {
            $fvillage=$fetch['fvillage'];
            $tvillage=$fetch['tvillage'];
            $type=$fetch['type'];
            $charge=$fetch['charge'];
        }
        if($sem ==1)
        {
            $sel6=mysqli_query($con,$q6);
            while($fetch=mysqli_fetch_array($sel6,MYSQLI_BOTH))
            {
                $photo = "Document/".$fetch['photo']; 
            }
        }
        else
        {
           $sel7=mysqli_query($con,$q7);
            while($fetch=mysqli_fetch_array($sel7,MYSQLI_BOTH))
            {
                $photo = "Document/".$fetch['photo']; 
            }
        }

        require("fpdf/fpdf.php");
        $pdf = new FPDF();
        $pdf->AddPage();

        $pdf->SetFont("Arial","I",16);
        $pdf->Image('images1/logo.png',11,11,9,8);
        $pdf->Cell(0,10,"DIGITAL BUS PASS SYSTEM",1,1,C);
        $pdf->Cell(50,10,"Student Name :",0,0);
        $pdf->Image($photo,165,22,30,40);
        $pdf->Cell(80,10,$name,0,1);
        $pdf->Cell(50,10,"Student Address: ",0,0);
        $pdf->Cell(80,10,$village."; Pincode : ".$pin,0,1);
        $pdf->Cell(50,10,"Gender : ",0,0);
        $pdf->Cell(80,10,$gen,0,1);
        $pdf->Cell(50,10,"Age : ",0,0);
        $pdf->Cell(80,10,$age,0,1);
        $pdf->Cell(50,10,"Institute Name: ",0,0);
        $pdf->Cell(80,10,$iname,0,1);
        $pdf->Cell(50,10,"Institute Address: ",0,0);
        $pdf->Cell(80,10,$add,0,1); 
        $pdf->Cell(50,10,"From Place: ",0,0);
        $pdf->Cell(75,10,$fvillage,0,0);
        $pdf->Cell(50,10,"To Place: ",0,0);
        $pdf->Cell(80,10,$tvillage,0,1);
        $pdf->Cell(50,10,"Pass Amount: ",0,0);
        $pdf->Cell(75,10,$charge,0,0);
        $pdf->Cell(50,10,"Pass Type: ",0,0);
        $pdf->Cell(80,10,$type,0,1);
        $pdf->Cell(50,10,"Start Date: ",0,0);
        $pdf->Cell(80,10,$start,0,1);
        $pdf->Cell(50,10,"End Date: ",0,0);
        $pdf->Cell(80,10,$end,0,1);
        $pdf->Cell(0,10,"Student Six Month Concession Pass",1,1,C);
        $pdf->Cell(0,10,"Student Signature",0,0,L);
        $pdf->Cell(0,10,"Officer's Signature",0,0,R);
        $pdf->output();
        // header('location:main_pass.php');
    }
    if(isset($_POST['update']))
    {
      $q="select * from not_verified_stu where `Reg_id`=$id";

      $sel=mysqli_query($con,$q);

      if(mysqli_num_rows($sel)==1)
      {
          $fetch=mysqli_fetch_array($sel);
          if($fetch['name']==1)
          {
            $f=$_POST['fname'];
            $m=$_POST['mname'];
            $l=$_POST['lname'];
            mysqli_query($con,"UPDATE `registration` SET `F_name`='$f',`M_name`='$m',`S_name`='$l' WHERE `Reg_id`='$id'");
          }
          if($fetch['email']==1)
          {
            $email=$_POST['Email_id'];
            mysqli_query($con,"UPDATE `registration` SET `Email_id`='$email' WHERE `Reg_id`='$id'");
          }
          if($fetch['no']==1)
          {
            $no=$_POST['no'];
            mysqli_query($con,"UPDATE `registration` SET `Contact_no`='$no' WHERE `Reg_id`='$id'");
          }
          if($fetch['dob']==1)
          {
            $dob=$_POST['dob'];
            $dateOfBirth = $dob;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dateOfBirth), date_create($today));
            $age= $diff->format('%y');
            mysqli_query($con,"UPDATE `new_pass` SET `birth_date`= '$dob' , `age`= '$age' WHERE `Reg_id`='$id'");
          }
          if($fetch['gender']==1)
          {
            $gen=$_POST['gen'];
            mysqli_query($con,"UPDATE `new_pass` SET `gender`= '$gen'  WHERE `Reg_id`='$id'");
          }
          if($fetch['cource']==1)
          {
            $cource=$_POST['cource'];
            mysqli_query($con,"UPDATE `new_pass` SET `cource`= '$cource'  WHERE `Reg_id`='$id'");
          }
          if($fetch['sem']==1)
          {
            $sem=$_POST['sem'];
            mysqli_query($con,"UPDATE `new_pass` SET `sem`= '$sem'  WHERE `Reg_id`='$id'");
          }
          if($fetch['sem']==1)
          {
            $start=$_POST['start'];
            mysqli_query($con,"UPDATE `new_pass` SET `sem_start_date`= '$start'  WHERE `Reg_id`='$id'");
          }
          if($fetch['sem_end_date']==1)
          {
            $end=$_POST['sem_start_date'];
            mysqli_query($con,"UPDATE `new_pass` SET `sem_end_date`= '$end'  WHERE `Reg_id`='$id'");
          }
          if($fetch['village_name']==1)
          {
            $village=$_POST['village'];
            mysqli_query($con,"UPDATE `student_add` SET `village`= '$village'  WHERE `Reg_id`='$id'");
          }
          if($fetch['pincode']==1)
          {
            $pin=$_POST['pin'];
            mysqli_query($con,"UPDATE `student_add` SET `pincode`= '$pin'  WHERE `Reg_id`='$id'");
          }
          if($fetch['district']==1)
          {
            $dist=$_POST['dist'];
            mysqli_query($con,"UPDATE `student_add` SET `district`= '$dist'  WHERE `Reg_id`='$id'");
          }
          if($fetch['depot']==1)
          {
            $depot=$_POST['depot'];
            mysqli_query($con,"UPDATE `student_add` SET `depot`= '$depot'  WHERE `Reg_id`='$id'");
          }
          if($fetch['depot']==1)
          {
            $depot=$_POST['depot'];
            mysqli_query($con,"UPDATE `student_add` SET `depot`= '$depot'  WHERE `Reg_id`='$id'");
          }
          if($fetch['insti_name']==1)
          {
            $insti_name=$_POST['insti_name'];
            mysqli_query($con,"UPDATE `institute` SET `Name`= '$insti_name'  WHERE `Reg_id`='$id'");
          }
          if($fetch['insti_add']==1)
          {
            $insti_add=$_POST['insti_add'];
            mysqli_query($con,"UPDATE `institute` SET `Address`= '$insti_add'  WHERE `Reg_id`='$id'");
          }
          if($fetch['insti_add']==1)
          {
            $insti_add=$_POST['insti_add'];
            mysqli_query($con,"UPDATE `institute` SET `Insti_code`= '$insti_add'  WHERE `Reg_id`='$id'");
          }
          $s=mysqli_query($con,"select * from new_pass where `Reg_id`='id'");
          $f=mysqli_fetch_array($s);
          $target_dir = "Document/ ";
          $uploadOk = 1;
              if($fetch['photo']==1)
              {
                  $photo=$_FILES["photo"]["name"];
                  $temp1=$_FILES["photo"]["tmp_name"];
                  $target_file0 = $target_dir . $photo;
                  $imageFileType0 = strtolower(pathinfo($target_file0,PATHINFO_EXTENSION));

                  if($imageFileType0 != "jpg" && $imageFileType0 != "png" && $imageFileType0 != "jpeg" )
                  {
                      echo "Sorry, only JPG, JPEG & PNG files are allowed.";
                      $uploadOk = 0;
                  }
                  if ($uploadOk == 0)
                  {
                      echo "Sorry, your file was not uploaded.";
                  }
                  else
                  {

                      $mov0=move_uploaded_file($temp1,$target_file0);
                      if($mov0==true and $sem==1)
                      {
                          mysqli_query($con,"UPDATE `new_student_doc` SET `photo`= '$photo'  WHERE `reg_id`='$id'");
                      }
                      else if ($mov0==true and $sem>1) {
                          mysqli_query($con,"UPDATE `old_student_doc` SET `photo`= '$photo'  WHERE `reg_id`='$id'");
                      }

                  }
              }
              if($fetch['icard']==1)
              {
                  $icard=$_FILES["icard"]["name"];
                  $temp1=$_FILES["icard"]["tmp_name"];
                  $target_file0 = $target_dir . $icard;
                  $imageFileType0 = strtolower(pathinfo($target_file0,PATHINFO_EXTENSION));

                  if($imageFileType0 != "jpg" && $imageFileType0 != "png" && $imageFileType0 != "jpeg" )
                  {
                      echo "Sorry, only JPG, JPEG & PNG files are allowed.";
                      $uploadOk = 0;
                  }
                  if ($uploadOk == 0)
                  {
                      echo "Sorry, your file was not uploaded.";
                  }
                  else
                  {
                      $mov0=move_uploaded_file($temp1,$target_file0);
                      if($mov0==true and $sem==1)
                      {
                          mysqli_query($con,"UPDATE `new_student_doc` SET `icard`= '$icard'  WHERE `reg_id`='$id'");
                      }
                      elseif ($mov0==true and $sem<1) {
                          mysqli_query($con,"UPDATE `old_student_doc` SET `icard`= '$icard'  WHERE `reg_id`='$id'");
                      }

                  }
              }
              if($fetch['add_fee_re']==1)
              {
                  $add_fee_re=$_FILES["add_fee_re"]["name"];
                  $temp1=$_FILES["add_fee_re"]["tmp_name"];
                  $target_file0 = $target_dir . $icard;
                  $imageFileType0 = strtolower(pathinfo($target_file0,PATHINFO_EXTENSION));

                  if($imageFileType0 != "jpg" && $imageFileType0 != "png" && $imageFileType0 != "jpeg" )
                  {
                      echo "Sorry, only JPG, JPEG & PNG files are allowed.";
                      $uploadOk = 0;
                  }
                  if ($uploadOk == 0)
                  {
                      echo "Sorry, your file was not uploaded.";
                  }
                  else
                  {
                      $mov0=move_uploaded_file($temp1,$target_file0);
                      if($mov0==true and $sem==1)
                      {
                          mysqli_query($con,"UPDATE `new_student_doc` SET `add_fee_re`= '$add_fee_re'  WHERE `reg_id`='$id'");
                      }
                      elseif ($mov0==true and $sem<1) {
                          mysqli_query($con,"UPDATE `old_student_doc` SET `fee_re`= '$add_fee_re'  WHERE `reg_id`='$id'");
                      }

                  }
              }
              if($fetch['add_slip']==1)
              {
                  $slip=$_FILES["slip"]["name"];
                  $temp1=$_FILES["slip"]["tmp_name"];
                  $target_file0 = $target_dir . $icard;
                  $imageFileType0 = strtolower(pathinfo($target_file0,PATHINFO_EXTENSION));

                  if($imageFileType0 != "jpg" && $imageFileType0 != "png" && $imageFileType0 != "jpeg" )
                  {
                      echo "Sorry, only JPG, JPEG & PNG files are allowed.";
                      $uploadOk = 0;
                  }
                  if ($uploadOk == 0)
                  {
                      echo "Sorry, your file was not uploaded.";
                  }
                  else
                  {
                      $mov0=move_uploaded_file($temp1,$target_file0);
                      if($mov0==true and $sem==1)
                      {
                          mysqli_query($con,"UPDATE `new_student_doc` SET `add_slip`= '$slip'  WHERE `reg_id`='$id'");
                      }
                      elseif ($mov0==true and $sem<1) {
                          mysqli_query($con,"UPDATE `old_student_doc` SET `hall_ticket`= '$slip'  WHERE `reg_id`='$id'");
                      }

                  }
              }
          if($uploadOk ==1)
          {
              echo "Succesfully Updated";
              mysqli_query($con,"DELETE FROM `not_verified_stu` WHERE `Reg_id`='$id'");
                ?><a href="home_student.html"> back to homepage</a><?php
          }
    }
  }

?>
</body>
</html>
