
 <?php include ("home.html"); ?>
<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Result</title>
  <link rel="stylesheet" type="text/css" href="quiz.css">
</head>
<body>
  <?php
     include("header.php");
     include("db.php");
     // extract($_SESSION);
     extract($_POST);

     $sql = mysqli_query($con, "select r.test_date, s.sub_name, r.tot_que, r.score from result r, subject s where r.sub_id=s.sub_id and r.email='$_SESSION[email]'");
     // $sql = mysqli_query($con, "select * from result where email='$_SESSION[email]'");

     echo "<h1 class='style8' align=center>Result</h1>";
     echo '<div style="margin:auto;width:70%;height:400px;box-shadow:2px 1px 2px 2px #CCCCCC;align:center"><div style="padding-top:6%"></div>';
     if(mysqli_num_rows($sql)<1)
     {
       echo "<h1 class=head1>Sorry !</h1>";
       echo "<h2 class=head1> You have not given any quiz.</h2>";
       exit;
     }
     
     echo "<table border=1 align=center bgcolor=#e6e6e6>";
     echo   "<tr class=style2><th>Date </th>";
     echo      "<th width=300>Subject Name</th>";
     echo      "<th>Total<br> Question </th>";
     echo      "<th>Score</th></tr>";
     while($row=mysqli_fetch_array($sql))
     {
        echo "<tr class=style8><td>" . $row[0] . "</td>";
        echo   "<td align=center>" . $row[1] . "</td>";
        echo   "<td align=center>" . $row[2] . "</td>";
        echo   "<td align=center>" . $row[3] . "</td></tr>";
     }
     echo "</table>";
  
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

    