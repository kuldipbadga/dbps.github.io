<?php

    include('LoginId.php');
    $id=$_SESSION['id'];
    $q1="SELECT * FROM `registration` WHERE Reg_id=$id";
    $q2="SELECT * FROM `new_pass` WHERE Reg_id=$id";
    $q3="SELECT * FROM `student_add` WHERE Reg_id=$id";
    $q4="SELECT * FROM `institute` WHERE Reg_id=$id";
    $q5="SELECT * FROM `student_pass` WHERE Reg_id=$id";
    $q6="SELECT * FROM `new_student_doc` WHERE Reg_id=$id";
    $q7="SELECT * FROM `old_student_doc` WHERE Reg_id=$id";

    $sel1=mysqli_query($con,$q1);
    while($fetch=mysqli_fetch_array($sel1,MYSQLI_BOTH))
    {
        $name=$fetch['F_name']." ".$fetch['M_name']." ".$fetch['S_name'];
        $email=$fetch['Email_id'];
        $no=$fetch['Contact_no'];
    }
    $sel2=mysqli_query($con,$q2);
    while($fetch=mysqli_fetch_array($sel2,MYSQLI_BOTH))
    {
        $dob=$fetch['birth_date'];
        $gen=$fetch['gender'];
        $age=$fetch['age'];
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
        $icode=$fetch['Insti_code'];
    }
    $sel5=mysqli_query($con,$q5);
    while($fetch=mysqli_fetch_array($sel5,MYSQLI_BOTH))
    {
        $fvillage=$fetch['fvillage'];
        $tvillage=$fetch['tvillage'];
        $type=$fetch['type'];
        $charge=$fetch['charge'];
    }
    $sel6=mysqli_query($con,$q6);
    while($fetch=mysqli_fetch_array($sel6,MYSQLI_BOTH))
    {
        $photo=$fetch['photo'];
        $icard=$fetch['icard'];
        $fee=$fetch['add_fee_re'];
        $temp=$fetch['add_slip'];
    }
    $sel7=mysqli_query($con,$q7);
    while($fetch=mysqli_fetch_array($sel7,MYSQLI_BOTH))
    {
        $photo=$fetch['photo'];
        $icard=$fetch['icard'];
        $fee=$fetch['fee_re'];
        $temp=$fetch['hall_ticket'];
    }
?>
<!DOCTYPE html>
<html>

<head>
	<title>Digital Bus Pass</title>
		<!--/metadata -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">

<link rel="shortut icon" type="image/png" href="images1/logo.png">
	<!-- //custom-theme -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/verifier.css" rel="stylesheet" type="text/css" media="all" />

  
</head>
<body>
	<!-- header -->
	<div class="header" id="home">

		<div class="content white agile-info">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
						<a class="navbar-brand" href="home_student.html">

                            <img src="images1/logo.png" width="50px" height="50px" >
						</a>
					</div>
					<!--/.navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<nav class="link-effect-2" id="link-effect-2">
							<ul class="nav navbar-nav navbar-right">
								<li class="active"><a href="home_student.html" class="effect-3">Home</a></li>
								<li><a href="condition.php" class="effect-3">Apply New Pass</a></li>
								<li><a href="Renew.php" class="effect-3">Renew</a></li>
								<li><a href="about_student.html" class="effect-3">About</a></li>
								<li><a href="contact_student.php" class="effect-3">Contact</a></li>
                                <li><a href="home.html" class="effect-3">Logout</a></li>
							</ul>
						</nav>
					</div>
					<!--/.navbar-collapse-->
					<!--/.navbar-->
				</div>
			</nav>
		</div>
	</div>


    <article>
	<div class="main_box">

         <table>
            <form action="pay.php" method="post" enctype="multipart/form-data">
            <label>Status:
            <?php
                $s=mysqli_query($con,"select * from verified_stu where Reg_id='$id'");
                $s1=mysqli_query($con,"select * from not_verified_stu where Reg_id='$id'");
                if(mysqli_num_rows($s)==1)
                {
                    echo "Succesfully Verified..";
                    ?><div class="print">
                    <button type="submit" name="pay"> <a href="main_pass.php"> PAY & GET PASS</a></button>
                    </div>
                    <?php
                }
                else if(mysqli_num_rows($s1)==1)
                {
                    echo "Invalid Details please correct it...";
                     ?><div class="print">
                    <button type="submit" name="update">Change</button>
                    </div>
                    <?php
                    while($fetch=mysqli_fetch_array($s1))
                    {
                        $_SESSION['name']=$fetch['name'];
                        $_SESSION['email']=$fetch['email'];
                        $_SESSION['no']=$fetch['no'];
                        $_SESSION['dob']=$fetch['dob'];
                        $_SESSION['sem']=$fetch['sem'];
                        $_SESSION['start']=$fetch['sem_start_date'];
                        $_SESSION['end']=$fetch['sem_end_date'];
                        $_SESSION['sem']=$fetch['sem'];
                        $_SESSION['gen']=$fetch['gender'];
                        $_SESSION['age']=$fetch['age'];
                        $_SESSION['cource']=$fetch['cource'];
                        $_SESSION['village']=$fetch['village_name'];
                        $_SESSION['pin']=$fetch['pincode'];
                        $_SESSION['dist']=$fetch['district'];
                        $_SESSION['depot']=$fetch['depot'];
                        $_SESSION['insti_name']=$fetch['insti_name'];
                        $_SESSION['insti_add']=$fetch['insti_add'];
                        $_SESSION['insti_code']=$fetch['insti_code'];
                        $_SESSION['photo']=$fetch['photo'];
                        $_SESSION['icard']=$fetch['icard'];
                        $_SESSION['add_fee_re']=$fetch['add_fee_re'];
                        $_SESSION['add_slip']=$fetch['add_slip'];

                    }
                }
                else
                {
                    echo "In progress...";
                }
            ?></label>

            <tr>
                 <td colspan="7" class="s"><h3>Student Detail</h3></td>
            </tr>


		<div class="_box">


                <?php if(isset($_SESSION['name']) and $_SESSION['name']==1)
                {?>
                  <tr>
            			<div class="agile-field-txt">

                            <td align="center">
                            <label>First Name : </label></td>
                            <br><td align="center">
				                    <input type="text" name="fname" placeholder="Your name"><td></tr>
                            <tr>
                              <td align="center">
                              <label>Middle Name : </label></td>
                              <br><td>

                <input type="text" name="mname" placeholder="Father name"></td></tr>
                <tr>
                <td align="center">
                <label>Last Name : </label></td>
                <br><td>

                <input type="text" name="lname" placeholder="Surname"></td></tr>

                <td>
                <?php
                   unset($_SESSION['name']);
                }
                else
                {?><tr>
                <div class="agile-field-txt">

                          <td align="center">
                          <label>Name : </label></td>
                          <br><td><?php
                    echo $name;
                } ?>
                </td>


			</div>
            </tr>
            <tr>
			<div class="agile-field-txt">
                <td align="center">
				<label>Email : </label>
                </td>
                <td>
                <?php if(isset($_SESSION['email']) and $_SESSION['email']==1)
                {

                ?>
				<input type="text" name="email">
                </td>
                <td>
                <?php
                    unset($_SESSION['email']);
                }
                else
                {
                     echo $email;
                } ?>
            </td>

			</div>
            </tr>

            <tr>
	        <div class="agile-field-txt">
                <td align="center">
				<label> Contact No. : </label>
                </td>
                <td>
                <?php if(isset($_SESSION['no']) and $_SESSION['no']==1)
                {
                ?>
				<input type="number" name="no"></td>
                <td>
                <?php
                    unset($_SESSION['no']);
                }
                else
                {
                     echo $no;
                } ?></td>
			</div>
            </tr>

            <tr>
			<div class="agile-field-txt">
                <td align="center">
				<label> Date Of Birth : </label>
                </td>
                <td>

                <?php if(isset($_SESSION['dob']) and $_SESSION['dob']==1)
                {
                ?>
				<input type="date" name="dob">
                </td>
                <td>
                <?php
                    unset($_SESSION['dob']);
                }
                else
                {
                     echo $dob;
                } ?>
                </td>
			</div>

            </tr>
             <tr>

	        <div class="agile-field-txt">
                <td align="center">
				<label> Gender : </label>
                </td>
                <td>
                <?php if(isset($_SESSION['gen']) and $_SESSION['gen']==1)
                {
                ?>
				<label>Select Gender</label>
				<select name="gen" id="myInput">
                    <option>select</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
                </td>
                <td>
                <?php

                    unset($_SESSION['gen']);
                }
                else
                {
                     echo $gen;
                } ?>
                </td>
			</div>
            </tr>

             <tr>

	        <div class="agile-field-txt">
                <td align="center">
				<label>Age : </label>
                </td>
                <td>

                <?php if(isset($_SESSION['age']) and $_SESSION['age']==1)
                {
                ?>
				<input type="text" name="age">
                </td>
                <td>
                <?php
                    unset($_SESSION['age']);
                }
                else
                {
                     echo $age;
                } ?>
                </td>
			</div></tr>
             <tr>

			<div class="agile-field-txt">
                <td align="center">
				<label> Cource : </label>
            </td>
            <td>
                <?php if(isset($_SESSION['cource']) and $_SESSION['cource']==1)
                {
                ?>
				<input type="text" name="course">
                </td>
                <td>
                <?php
                    unset($_SESSION['cource']);
                }
                else
                {
                     echo $course;
                } ?>
                </td>
			</div></tr>
             <tr>


			<div class="agile-field-txt">
                <td align="center">
				<label> Semester : </label>
            </td>
            <td>

                <?php if(isset($_SESSION['sem']) and $_SESSION['sem']==1)
                {
                ?>
				<input type="number" name="sem">
                </td>
                <td>
                <?php
                    unset($_SESSION['sem']);
                }
                else
                {
                     echo $sem;
                } ?>
                </td>
			</div></tr>
             <tr>


			<div class="agile-field-txt">
                <td align="center">
				<label> Sem Start Date: </label>
            </td>
            <td>
                <?php if(isset($_SESSION['start']) and $_SESSION['start']==1)
                {
                ?>
				<input type="date" name="start_date">
                </td>
                <td>
                <?php
                    unset($_SESSION['start']);
                }
                else
                {
                     echo $start;
                } ?>
                </td>
			</div></tr>
             <tr>


			<div class="agile-field-txt">
            <td align="center">
				<label> Sem End Date : </label>
            </td>
            <td>
                <?php if(isset($_SESSION['end']) and $_SESSION['end']==1)
                {
                ?>
				<input type="date" name="end_date">
                </td>
                <td>
                <?php
                    unset($_SESSION['end']);
                }
                else
                {
                     echo $end;
                } ?>
                </td>
			</div>	</tr>

		</div>

            <tr>
                 <td colspan="7" class="s"><h3>Address Detail</h3></td>
            </tr>

		<div class="_box">
            <tr>




			<div class="agile-field-txt">
                <td align="center">
				<label>Village Name : </label>
            </td>
            <td>
                <?php if(isset($_SESSION['village']) and $_SESSION['village']==1)
                {
                ?>
				<input type="text" name="village">
                </td>
                <td>
                <?php
                    unset($_SESSION['village']);
                }
                else
                {
                     echo $village;
                } ?>
                </td>
			</div>
            </tr>
            <tr>
			<div class="agile-field-txt">
                <td align="center">
				<label>Pincode : </label>
            </td>
            <td>
                <?php if(isset($_SESSION['pin']) and $_SESSION['pin']==1)
                {
                ?>
				<input type="number" name="pin">
            </td>
            <td>
                <?php
                    unset($_SESSION['pin']);
                }
                else
                {
                     echo $pin;
                } ?>
                </td>
			</div>
            </tr>
            <tr>
            <div class="agile-field-txt">
                <td align="center">
				<label> District : </label>
            </td>
            <td>
                <?php if(isset($_SESSION['dist']) and $_SESSION['dist']==1)
                {
                ?>
				<input type="text" name="dist">
                </td>
                <td>
                <?php
                    unset($_SESSION['dist']);
                }
                else
                {
                     echo $dis;
                } ?>
                </td>
			</div>
            </tr>
            <tr>
			<div class="agile-field-txt">
                <td align="center">
				<label> Depot : </label>
            </td>
            <td>
                <?php if(isset($_SESSION['depot']) and $_SESSION['depot']==1)
                {
                ?>
				<input type="text" name="depot">
                </td>
                <td>

                <?php
                    unset($_SESSION['depot']);
                }
                else
                {
                     echo $depot;
                } ?></td>
			</div>

            </tr>
		</div>

        <tr>
                 <td colspan="7" class="s"><h3>Route Detail</h3></td>
            </tr>

		<div class="_box">
            <tr>

				<div class="agile-field-txt">
                    <td align="center">
				<label>From Village : </label>

                </td>
                <td>
                <?php
                     echo $fvillage;
                 ?>
                 </td>
			</div>
        </tr>
            <tr>
			<div class="agile-field-txt">
                <td align="center">
				<label>To village : </label>
                </td>
                <td>
                <?php
                     echo $tvillage;
                 ?>
                <td>

			</div>
            </tr>
            <tr>
            <div class="agile-field-txt">
                <td align="center">
				<label> Type : </label>
                </td>
                <td>
                <?php
                     echo $type;
                 ?>
                 </td>
			</div>
            </tr>
            <tr>
			<div class="agile-field-txt">
                <td align="center">
				<label> Charge : </label>
                </td>
                <td>

                <?php
                     echo $charge;
                ?>
               </td>
			</div>

            </tr>
		</div>
        </tr>

        <!-- <tr>
                 <td colspan="7" class="s"><h3>Document Detail</h3></td>
            </tr>



		<div class="_box">
              <tr>


             <div class="agile-field-txt">
                <td>
				<label>Photo :</label>
            </td>
            <td>
                 <?php if(isset($_SESSION['photo']) and $_SESSION['photo']==1)
                {
                ?>
				<input type="file" name="photo" required />
                </td>
                <td>
                <?php
                    unset($_SESSION['photo']);
                }
                else
                {?>

                     <button type="submit" name="show1" value="Show">Show</button>

                    <?php
                } ?>
                </td>
             </div>
        </tr>

            <tr>
			<div class="agile-field-txt">
                <td>
				<label>I-card : </label>
            </td>
            <td>
                <?php if(isset($_SESSION['icard']) and $_SESSION['icard']==1)
                {
                ?>
				<input type="file" name="icard" required />
                </td>
                <td>
                <?php
                    unset($_SESSION['icard']);
                }
                else
                {?>

                     <button type="submit" name="show2" value="Show">Show</button>

                    <?php
                } ?>
                </td>

			</div>
            </tr>

            <tr>
			<div class="agile-field-txt">
                <td>
				<label>Addmission fee reciept : </label>
            </td>
            <td>
                 <?php if(isset($_SESSION['add_fee_re']) and $_SESSION['add_fee_re']==1)
                {
                ?>
				<input type="file" name="add_fee_re" required />
                </td>
                <td>
                <?php
                    unset($_SESSION['add_fee_re']);
                }
                else
                {?>

                     <button type="submit" name="show3" value="Show">Show</button>
                <?php
                } ?>
                </td>

			</div>
            </tr>

            <tr>
            <form action="photo.php?id=<?php echo $id;?>" method="post">
            <div class="agile-field-txt">
                <td>
				<label> Admission slip  : </label>
            </td>
            <td>
                <?php if(isset($_SESSION['add_slip']) and $_SESSION['add_slip']==1)
                {
                ?>
				<input type="file" name="slip" required />
                </td>
                <td>
                <?php
                    unset($_SESSION['slip']);
                }
                else
                {?>
                     <button type="submit" name="show4" value="Show">Show</button>
                    <?php
                } ?>
                </td>
          	</div>
            </tr>

		</div> -->


        <tr>
                 <td colspan="7" class="s"><h3>Institute Detail</h3></td>
            </tr>

			<div class="_box">
                <tr>


				<div class="agile-field-txt">
                    <td align="center">
					<label>Institute Name: </label>
                </td>
                <td>
                    <?php if(isset($_SESSION['insti_name']) and $_SESSION['insti_name']==1)
                    {
                    ?>
                    <input type="text" name="insti_name">
                    </td>
                    <td>
                    <?php
                        unset($_SESSION['insti_name']);
                    }
                    else
                    {
                         echo $iname;
                    } ?>
                    </td>
                </div>

            </tr>
            <tr>

				<div class="agile-field-txt">
                    <td align="center">
					<label>Address: </label>
                </td>
                <td>

                    <?php if(isset($_SESSION['insti_add']) and $_SESSION['insti_add']==1)
                    {
                    ?>
                    <input type="text" name="insti_add">
                    </td>
                    <td>
                    <?php

                        unset($_SESSION['insti_add']);
                    }
                    else
                    {
                         echo $add;
                    } ?>
                    </td>
				</div>
                </tr>
                <tr>
	            <div class="agile-field-txt">
                    <td align="center">
					<label> Code: </label>
                </td>
                <td>

                    <?php if(isset($_SESSION['insti_code']) and $_SESSION['insti_code']==1)
                    {
                    ?>
                    <input type="text" name="insti_code">
                    </td>
                    <td>
                    <?php
                        unset($_SESSION['insti_code']);
                    }
                    else
                    {
                         echo $icode;
                    } ?>
                    </td>
				</div>
                </tr>

			</div>

                </div>
			</form>

	</div>


    </div>

    <div class="ec_box">
        <div class="photo">
                <img src="C:\xampp\htdocs\DIGITAL BUS PASS SYSTEM\images1\logo.png" ></img>
        </div>

            </div>
</article>



<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- //js -->

<!-- start-smoth-scrolling -->
				<script type="text/javascript" src="js/move-top.js"></script>
				<script type="text/javascript" src="js/easing.js"></script>
				<script type="text/javascript">
					jQuery(document).ready(function($) {
						$(".scroll").click(function(event){
							event.preventDefault();
							$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
						});
					});
				</script>
		<!-- start-smoth-scrolling -->
		<!-- smooth scrolling-bottom-to-top -->
				<script type="text/javascript">
					$(document).ready(function() {
					/*
						var defaults = {
						containerID: 'toTop', // fading element id
						containerHoverID: 'toTopHover', // fading element hover id
						scrollSpeed: 1200,
						easingType: 'linear'
						};
					*/
					$().UItoTop({ easingType: 'easeOutQuart' });
					});
				</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
				<script src="js/SmoothScroll.min.js"></script>



<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->




</body>

</html>
