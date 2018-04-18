<?php
  session_start();
  extract($_POST);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Updated Profile</title>
	<link href="quiz.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div align="center">
   <?php
      include("header.php");
      extract($_POST);
      include("db.php");
      $rs=mysqli_query($con, "select * from user where email='$emailid'");
	  echo '<div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;align:center"><div style="padding-top:6%"></div>';
      if (mysqli_num_rows($rs)>0)
      {
	    echo "<br><br><br><div class=head1>Email Id Already Exists</div>";
	    echo '<br><h2>Go to the</h2><h2 class=style8><a href=index.php>Previos Page</a></h2>';
	    exit;
      } else {
        $sql="update user set name='$Name', email='$emailid', password='$pass', institution='$ins', phone='$mob' WHERE email = '$_SESSION[email]'";
        $rs=mysqli_query($con, $sql)or die("Could Not Perform the Query");

        $sql="update result set email='$emailid' WHERE email = '$_SESSION[email]'";
        $rs=mysqli_query($con, $sql)or die("Could Not Perform the Query");

        echo "<br><br><br><h2>Your Profile is Created Sucessfully</h2>";
        echo "<br><h2>Please Login using your Email ID = $emailid and Password = $pass to view your Profile</h2>";
        echo "<br><h2 class=style8><a href=index.php>Login</a></h2>";
      }
      session_destroy();
    ?> </div>
</body>
</html>