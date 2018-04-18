 <?php
    include ("home.html");
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Signup</title>
    <link rel="icon" href="images/i3.jpg">
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
	    echo '<br><h2 class=style8><a href=index.php>Login</a></h2>';
	    exit;
      }
      
      else 
      {
        $sql="insert into user(name,email,password,institution,phone) values('$Name','$emailid','$pass','$ins','$mob')";
        $rs=mysqli_query($con, $sql)or die("Could Not Perform the Query");
        echo "<br><br><br><h2>Your Account is Created Sucessfully</h2>";
        echo "<br><h2>Please Login using your Email ID to take Quiz</h2>";
        echo "<br><h2 class=style8><a href=index.php>Login</a></h2>";
      }
    ?>
 
<?php
    echo "</div>
       <br \>
       <br \>

       </div>";
    ?>
    
     </div>
<br> <br>
<hr><hr>

<?php
include ("foot.php");    
?>

</body>
</html>