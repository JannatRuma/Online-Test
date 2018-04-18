<?php
include ("home.html");
?>


<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>List of Subjects</title>
	<link rel="stylesheet" type="text/css" href="quiz.css">
</head>
<body>
    <?php
       include("header.php");
       include("db.php");
       echo '<h2 class="style8" align= "center"><b>Select Subject to Take Test</b> </h2>
             <div style="margin:auto;width:70%;height:300px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:center">';
       $sql=mysqli_query($con, "select * from subject");

       echo '<div style="padding-top:5%">';

       while($row=mysqli_fetch_row($sql))
       {
	      echo "<p class='style4'><a href=quiz.php?subid=$row[0]><font size=4>$row[1]</font></a></p>";
       }
       
    ?>



 <?php
    echo "</div>
       <br \>
       <br \>

       </div>";
    ?>
<br> <br>
<hr><hr>

<?php
include ("foot.php");    
?>

</body>
</html>

    