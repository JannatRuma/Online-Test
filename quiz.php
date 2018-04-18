<?php
include ("home.html");
?>
<?php
include("db.php");
   session_start();
   extract($_POST);
   extract($_GET);
   extract($_SESSION);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Online Quiz</title>
  <link rel="stylesheet" type="text/css" href="quiz.css">
</head>
<body>
   <?php
     include("header.php");
     
     $result=mysqli_query($con, "select * from question where sub_id=$subid");

     if (!isset($_SESSION[qn])) {
      $_SESSION[qn] = 0;
      $_SESSION[trueans] = 0;
     
     } else {

        if ($submit=='Next' && isset($ans)) {
          mysqli_data_seek($result, $_SESSION[qn]);
          $row=mysqli_fetch_row($result);
          if($ans==$row[7])
          {
            $_SESSION[trueans]=$_SESSION[trueans]+1;
          }
          $_SESSION[qn]=$_SESSION[qn]+1;
        } else if ($submit=='Get Result' && isset($ans)) {
          mysqli_data_seek($result, $_SESSION[qn]);
          $row=mysqli_fetch_row($result);
          if($ans==$row[7])
          {
            $_SESSION[trueans]=$_SESSION[trueans]+1;
          }
          echo "<h1 class='style8' align=center>Result</h1>";
          echo '<div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;align:center"><div style="padding-top:6%"></div>';
          $_SESSION[qn]=$_SESSION[qn]+1;
          echo "<table align=center><tr class=tot><td>Total Question<td>". $_SESSION[qn];
          echo "<tr class=tans><td>Correct Answer<td>".$_SESSION[trueans];
          $w=$_SESSION[qn]-$_SESSION[trueans];
          echo "<tr class=fans><td>Wrong Answer<td> ". $w;
          echo "</table>";
          mysqli_query($con, "insert into result(email,sub_id,test_date,tot_que,score) values('$_SESSION[email]','$subid',now(),'$_SESSION[qn]','$_SESSION[trueans]')") or die(mysql_error());
          unset($_SESSION[qn]);
          unset($_SESSION[sid]);
          // unset($_SESSION[tid]);
          unset($_SESSION[trueans]);
          exit;
        }
     }


     $result=mysqli_query($con, "select * from question where sub_id=$subid");
  
      // Seek to row number 15
     mysqli_data_seek($result, $_SESSION[qn]);

      // Fetch row
     $row=mysqli_fetch_row($result);
     // echo $_SESSION[qn];
     echo "<h2 class='style8' align=center>Choose Correct Answer</h2>";
    echo '<div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;align:center">';
     echo "<form name=myfm method=post action=''>";
     echo "<table border=0>"; 
     // echo "<tr><td><p><b>" . $n . ":" . $row['que'] . "</b></p></td></tr>";
     echo "<tr><td><p><b>" . $row[2] . "</b></p></td></tr>";
     echo "<tr><td><input type=radio name=ans value=1>" . $row[3] . "<br>";
     echo "<input type=radio name=ans value=2>" . $row[4] . "<br>";
     echo "<input type=radio name=ans value=3>" . $row[5] . "<br>";
     echo "<input type=radio name=ans value=4>" . $row[6] . "<br>";
     if($_SESSION[qn] < mysqli_num_rows($result)-1){
       echo "<tr><td>&nbsp;</td></tr>";
       echo "<tr><td><input type=submit name=submit value='Next'></form>";
     } else{
       echo "<tr><td>&nbsp;</td></tr>";
       echo "<tr><td><input type=submit name=submit value='Get Result'></form>";
       }
     ?>
</body>
</html>

<?php
//include ("foot.php");
?>

 