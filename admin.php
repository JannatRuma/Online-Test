<?php
  session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
  <title>Administration Section</title>
  <link rel="stylesheet" type="text/css" href="quiz.css">
</head>
<body>

  <?php
    include ("home.html");

     include("header_admin.php");
     include ("db.php");
     extract($_POST);
     if (isset($submit)) {
      $rs = mysqli_query($con, "select * from admin where email = '$loginid' and password = '$pass'");
      if (mysqli_num_rows($rs) < 1) {
        $found = "N";
      }
      else {
        $_SESSION['email'] = $loginid;
      }
     }
     if (isset($_SESSION['email'])) {
         echo $_SESSION['email'];
    echo '<h1 class="style8" align= "center">Welcome to Administrative Section </h1>
          <div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:center">
            <div style="padding-top:10%">
              <p class="style4"><a href="subadd.php"><font size=4>Add Subject</font></a></p>
              <p class="style4"><a href="queadd.php"><font size=4>Add Question</font></a></p>
              <p class="style4"><a href="quedelete.php"><font size=4>Delete Question</font></a></p>
            </div>
          </div>';
    exit;
     }
  ?>

  <table width="100%" border="0">
    <tr>
      <td width="25%" bgcolor="#FFFFFF"><div align="center" class="style1">Adminstrative Login</div></td>
      <td width="1%" rowspan="2" bgcolor="#191971"></td>
      <td width="100%" height="25">&nbsp;</td>
    </tr>
    <tr>
      
      <td align="center" valign="top">
        <form name="form1" method="post" action="">
          <p><a href="index.php"><img src="images/ad.jpg" width="134" height="128"></a></p>
          <p class="style2">Email ID
            <input name="loginid" type="text" id="loginid2"></p>
          <p class="style2">Password
            <input name="pass" type="password" id="pass2"></p>
            <span class="errors">
            <?php
              if (isset($found)) {
                echo "Invalid Username or Password";
              }
           ?>
           <p><input type="submit" name="submit" id="submit" value="Login"></p>
            
            </form>
      </td>
      <td height="296"><div align="center">
        <h1 class="style8">Admin Panel</h1>
        <span class="style5"><img src="images/al.jpg" width="200" height="170"></span>
      </div></td>
    </tr>
  </table>
    
   <?php
    echo "</div>
       <br \>
       <br \>

       </div>";
    ?>
<br> <br>
<hr><hr>



</body>
</html>
<?php
include ("foot.php");    
?>