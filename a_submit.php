<html>
    <head><title>Digital Bus Pass</title></head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link rel="shortut icon" type="image/png" href="images1/logo.png">

	    <link href="css/comman.css" rel='stylesheet' type='text/css' />
    <body>

<?php
    include("conn.php");

    if(isset($_GET['card']))
    {
      $card=$_GET['card'];
      if(isset($_POST['show']))
      {
        ?>
          <img width="500px" height="500px" src="Document/ <?php echo $card?>"> </img><?php
      }

    }

    if(isset($_GET['id']))
    {
        $id=$_GET['id'];

        if(isset($_POST['verified']))
        {
            $q="UPDATE `verifier` SET `validity`=1 WHERE `ver_id`='$id'";
            $up=mysqli_query($con,$q);

            if($up)
            {
              echo "Verified";
              ?> <a href="show_insti.php">Back to Requested List.</a><?php

            }
            else {
              echo "Something want wrong!";
            }
        }
        if(isset($_POST['not_verified']))
        {
            $q="DELETE from `verifier` WHERE `ver_id`='$id'";
            $del=mysqli_query($con,$q);

            if($del)
            {
                echo "Message sent to Verifier...";
                ?><a href="show_insti.php"> Back to Requested list</a><?php
            }

        }


    }

?>

    </body>
</html>
