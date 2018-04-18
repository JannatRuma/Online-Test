<?php
  session_start();
?>

<?php
include("home.html");
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Profile</title>
  <link rel="stylesheet" type="text/css" href="quiz.css">
  <style>
    td{
      color: #0099cc;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <?php
     include("header.php");
     include("db.php");
     // extract($_SESSION);
     extract($_POST);

     $sql = mysqli_query($con, "select name, email, password, institution, phone from user where email='$_SESSION[email]'");
     // $sql = mysqli_query($con, "select * from result where email='$_SESSION[email]'");

     echo "<h1 class='style8' align=center>Profile</h1>";
     echo '<div style="margin:auto;overflow:hidden; width:70%;height:400px;box-shadow:2px 1px 2px 2px #CCCCCC;align:center;font-size:20px"><div style="padding-top:6%"></div>';

     $row=mysqli_fetch_array($sql);
     echo "<table width=70% border=0 align=right>";
     echo   "<tr><td></td>";
     echo   "<td></td>";
     echo   "<td></td>";
     echo      "<td rowspan=6 width=500px align=center valign=top><img src='images/p.jpg' width=250 height=250></td></tr>";
     echo   "<tr><th align=right width=80px>Name: </th>";
     echo      "<td>&nbsp;</td>";
     echo      "<td>$row[0]</td></tr>";
     echo   "<tr><th align=right>Email ID: </th>";
     echo      "<td>&nbsp;</td>";
     echo      "<td>$row[1]</td></tr>";
     echo   "<tr><th align=right>Password: </th>";
     echo      "<td>&nbsp;</td>";
     echo      "<td>$row[2]</td></tr>";
     echo   "<tr><th align=right>Institution: </th>";
     echo      "<td>&nbsp;</td>";
     echo      "<td>$row[3]</td></tr>";
     echo   "<tr><th align=right>Mobile No: </th>";
     echo      "<td>&nbsp;</td>";
     echo      "<td>$row[4]</td></tr>";
     echo   "<tr><td></td><td></td><td></td><td align=center><p class='style4'><a href=update.php><font size=4>Update Profile</font></a></p></td></tr>";
        

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

    
