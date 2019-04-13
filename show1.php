<?php

    include('conn.php');


    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
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

    if($sem==1)
    {
      $sel6=mysqli_query($con,$q6);
      while($fetch=mysqli_fetch_array($sel6,MYSQLI_BOTH))
      {
          $photo=$fetch['photo'];
          $icard=$fetch['icard'];
          $fee=$fetch['add_fee_re'];
          $sliporhall=$fetch['add_slip'];
      }
    }
    else {
      $sel7=mysqli_query($con,$q7);
      while($fetch=mysqli_fetch_array($sel7,MYSQLI_BOTH))
      {
          $photo=$fetch['photo'];
          $icard=$fetch['icard'];
          $fee=$fetch['fee_re'];
          $sliporhall=$fetch['hall_ticket'];
      }
    }

	}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Digital Bus Pass</title>
		<!--/metadata -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">


	<!-- //custom-theme -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/verifier.css" rel="stylesheet" type="text/css" media="all" />
<link rel="shortut icon" type="image/png" href="images1/logo.png">

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
								<li class="active"><a href="home_verifier.html" class="effect-3">Home</a></li>
								<li><a href="verifier_profile.php" class="effect-3">Profile</a></li>
								<li><a href="show.php" class="effect-3">Requested Passes</a></li>
								<li><a href="about_verifier.html" class="effect-3">About</a></li>
								<li><a href="contact_verifier.php" class="effect-3">Contact</a></li>
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

    <!-- First Box Student box-->

    <article>
    <div class="main_box">

      <table class="tt">

       <!--  <h3>Select Wrong Details</h3> -->

            <form action="" method="post">
                <button type="submit" name="select" >Select All</button>
                <button type="submit" name="dselect" >Deselect All</button>
            </form>
            <form action="v_submit.php?id=<?php echo $id;?>" method="post">
                <button type="submit" name="not_verified">Not Verified</button>
      
		<!-- <div class="_box"> -->

            <tr>
			     <td colspan="7" class="s"><h3>Student Detail</h3></td>
            </tr>


           <!--  <div class="photo">
                <img src="C:\xampp\htdocs\DIGITAL BUS PASS SYSTEM\images1\logo.png" ></img>

            </div> -->
			<tr>
                <div class="agile-field-txt">
               <td width="10px" align="center">
                 <input type="checkbox"
                 <?php if(isset($_POST['select']))
                 {
                     ?> checked<?php
                 }
                 ?> name="check_name" >
                </td>
                <td>
    				<label>   Name : </td><td></label><?php echo $name; ?></td></tr>
                </td>
			 </div>
            </tr>
            <tr>
			<div class="agile-field-txt">
                <td width="10px" align="center">
                    <input type="checkbox"
                    <?php if(isset($_POST['select']))
                    {
                        ?> checked<?php
                    }
                    ?> name="check_email" >
                </td>
                <td>
    				<label>Email :  </td><td></label><?php echo $email; ?></td></tr>
                </td>
			</div>
            </tr>
            <tr>
	        <div class="agile-field-txt">
                <td width="10px" align="center">
                    <input type="checkbox"
                    <?php if(isset($_POST['select']))
                    {
                        ?> checked<?php
                    }
                    ?> name="check_no">
                </td>
                <td>
    				<label> Contact No. :  </td><td></label><?php echo $no; ?></td></tr>
                </td>
			</div>
            </tr>

            <tr>
			<div class="agile-field-txt">
                <td width="10px" align="center">
                    <input type="checkbox"
                    <?php if(isset($_POST['select']))
                    {
                        ?> checked<?php
                    }
                    ?> name="check_dob">
                </td>
                <td>
    				<label> Date Of Birth :  </td><td></label><?php echo $dob; ?></td></tr>
                </td>
			</div>
            </tr>
            <tr>
	        <div class="agile-field-txt">
                <td width="10px" align="center">
                    <input type="checkbox"
                    <?php if(isset($_POST['select']))
                    {
                        ?> checked<?php
                    }
                    ?> name="check_gen">
                </td>
                <td>
				    <label> Gender :  </td><td></label><?php echo $gen; ?></td></tr>
                </td>
			</div>
            </tr>
            <tr>
	        <div class="agile-field-txt">
                <td width="50px"></td>
                <td>

				    <label>Age :  </td><td></label><?php echo $age; ?></td></tr>
                </td>
			</div>
            </tr>
            <tr>
			<div class="agile-field-txt">
                <td width="10px" align="center">
                <input type="checkbox"
                <?php if(isset($_POST['select']))
                {
                    ?> checked<?php
                }
                ?> name="check_cource">
            </td>
            <td>
				    <label> Cource :  </td><td></label><?php echo $course; ?></td></tr>
                </td>

			</div>
            </tr>
            <tr>
			<div class="agile-field-txt">
                <td width="10px" align="center">
                <input type="checkbox"
                <?php if(isset($_POST['select']))
                {
                    ?> checked<?php
                }
                ?> name="check_sem">
            </td>
            <td>
				<label> Semester :  </td><td></label><?php echo $sem; ?> </td></tr>
                </td>
			</div>
            </tr>
            <tr>
			<div class="agile-field-txt">
                <td width="10px" align="center">
                <input type="checkbox"
                <?php if(isset($_POST['select']))
                {
                    ?> checked<?php
                }
                ?> name="check_start">
            </td>
            <td>
				<label> Sem Start Date:  </td><td></label><?php echo $start; ?></td></tr>
                </td>
			</div>
            </tr>
            <tr>
			<div class="agile-field-txt">
                <td width="10px" align="center">
                <input type="checkbox"
                <?php if(isset($_POST['select']))
                {
                    ?> checked<?php
                }
                ?> name="check_end">
            </td>
            <td>
				<label> Sem End Date :  </td><td></label><?php echo $end; ?></td></tr>
                </td>
			</div>
            </tr>

        <!-- </table> -->
   <!--  </div> -->
        <div class="_box">

            <!-- <table> -->
             <tr>
                 <td colspan="7" class="s"><h3>Institute Detail</h3></td>
            </tr>

            <tr>
                <div class="agile-field-txt">
                    <td width="10px" align="center">
                    <input type="checkbox"
                    <?php if(isset($_POST['select']))
                    {
                        ?> checked<?php
                    }
                    ?> name="check_insti_name">
                </td>

                <td>

                    <label>Institute Name:  </td><td></label><?php echo $iname; ?></td></tr>
                </td>
                </div>
            </tr>
            <tr>
                <div class="agile-field-txt">
                    <td width="10px" align="center">
                    <input type="checkbox"
                    <?php if(isset($_POST['select']))
                    {
                        ?> checked<?php
                    }
                    ?> name="check_insti_add">
                </td>
                <td>
                    <label>Address:  </td><td></label><?php echo $add; ?></td></tr>
                </td>
                </div>
            </tr>
            <tr>
                <div class="agile-field-txt">
                <td width="10px" align="center">
                    <input type="checkbox"
                    <?php if(isset($_POST['select']))
                    {
                        ?> checked<?php
                    }
                    ?> name="check_insti_cod">
                </td>
                <td>

                    <label> Code:  </td><td></label><?php echo $icode; ?></td></tr>
                 </td>
                </div>
            </tr>

        <!-- </table> -->
        </div>







		<!--  -->
		<div class="_box">
            <!-- <table> -->
             <tr>
                 <td colspan="7" class="s"><h3>Route Detail</h3></td>
            </tr>

			<tr>

			<div class="agile-field-txt">
                <td width="50px"></td>
                <td>
				    <label>From Village :  </td><td></label><?php echo $fvillage; ?></td></tr>
                </td>
			</div>
            </tr>

            <tr>
			<div class="agile-field-txt">
                <td width="50px"></td>
                <td>

				<label>To village :  </td><td></label><?php echo $tvillage; ?></td></tr>
                </td>
			</div>

            </tr>

            <tr>
            <div class="agile-field-txt">
                <td width="50px"></td>
                <td>

				<label> Type :  </td><td></label><?php echo $type; ?></td></tr>
                </td>
			</div>
            </tr>

            <tr>
			<div class="agile-field-txt">
                <td width="50px"></td>
                <td>

				<label> Charge :  </td><td></label><?php echo $charge; ?></td></tr>
                </td>

			</div>


            <!-- </table> -->
		</div>

        <div class="_box">
            <!-- <table> -->
             <tr>
                 <td colspan="7" class="s"><h3>Address Detail</h3></td>
            </tr>

            <tr>
            <div class="agile-field-txt">
                <td width="10px" align="center">
                <input type="checkbox"
                <?php if(isset($_POST['select']))
                {
                    ?> checked<?php
                }
                ?> name="check_vname">
            </td>
            <td>

                <label>Village Name :  </td><td></label><?php echo $village; ?></td></tr>
                </td>
            </div>
            </tr>

            <tr>
            <div class="agile-field-txt">
                <td width="10px" align="center">
                <input type="checkbox"
                <?php if(isset($_POST['select']))
                {
                    ?> checked<?php
                }
                ?> name="check_pin">
            </td>
            <td>

                <label>Pincode :  </td><td></label><?php echo $pin; ?></td></tr>
                </td>
            </div>
            </tr>

            <tr>
            <div class="agile-field-txt">
                <td width="10px" align="center">
                <input type="checkbox"
                <?php if(isset($_POST['select']))
                {
                    ?> checked<?php
                }
                ?> name="check_dist">
            </td>
            <td>

                <label> District :  </td><td></label><?php echo $dis; ?></td></tr>
                </td>
            </div>
            </tr>

            <tr>
            <div class="agile-field-txt">
                <td width="10px" align="center">
                <input type="checkbox"
                <?php if(isset($_POST['select']))
                {
                    ?> checked<?php
                }
                ?> name="check_depot">
            </td>
            <td>
                <label> Depot :  </td><td></label><?php echo $depot; ?></td></tr>
                </td>
            </div>
            </tr>


        </table>
        </div>
    </div>

    
     
    <div class="sec_box">
        <table>
            <tr>
            
                <td colspan="7" class="s"><h3>Document Detail</h3></td>
                
            </tr>
                
                <tr>

             <div class="agile-field-txt" class="p">
                <td width="50px" align="center">
                 <input type="checkbox"
                <?php if(isset($_POST['select']))
                {
                    ?> checked<?php
                }
                ?> name="check_photo">
                <label>Photo :</label>                            
                </td>

                <td>
                    <div class="pic">
                        <img src="Document /<?php echo $photo ?>" width="300px" height="300px" />
                </div>
            </td>
            </div>


             </tr>

             <tr>
            <div class="agile-field-txt" class="i">
                <td width="50px" align="center">
                <input type="checkbox"
                <?php if(isset($_POST['select']))
                {
                    ?> checked<?php
                }
                ?> name="check_icard">
                <label>I-card : </label>
                </td>
                <td>
                     <div class="pic">
                <img src="Document /<?php echo $icard ?>" width="300px" height="300px" />
            </div>

                </td>
            </div>

            </tr>

            <tr>

            <div class="agile-field-txt" class="a" >
                <td width="50px" align="center">
                <input type="checkbox"
                <?php if(isset($_POST['select']))
                {
                    ?> checked<?php
                }
                ?> name="check_add_fee_re">
                <label>Addmission fee reciept : </label>

                </td>
                <td>
                     <div class="pic">
                <img src="Document /<?php echo $fee ?>" width="300px" height="300px" />
                 </div>
                </td>
            </div>
            </tr>

            <tr>
            <div class="agile-field-txt" class="ad">
                <td width="50px" align="center">
                <input type="checkbox"
                <?php if(isset($_POST['select']))
                {
                    ?> checked<?php
                }
                ?> name="check_slip">
                <label> Admission slip  : </label>
                </td>

                <td>
                     <div class="pic">
                <img class="ads" src="Document /<?php echo $sliporhall ?>" width="300px" height="300px" />
                </td>
            </div>
            
            </tr>
        <!-- </div> -->

        </table>

    </div>

</article>


 
    </div>
</form> 



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
