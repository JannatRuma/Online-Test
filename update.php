<?php
include("home.html");
?>

<?php
  session_start();
  extract($_POST);
?>


<!DOCTYPE html>
<html>
<head>
  <title>Update Profile</title>
  <script>
    function validation_fom2(){
            var Name = form2.Name;
            var EmailID = form2.emailid;
            var Pass = form2.pass;
            var Cpass = form2.cpass;
            var Inst = form2.ins;
            var Mobile = form2.mob;

            if(Name.value=="")
            {
               window.alert("Plese Enter Name");
               Name.focus();
               return false;
            }
            if(EmailID.value=="")
            {
               window.alert("Plese Enter your Email Address");
               EmailID.focus();
               return false;
            }
            e=EmailID.value;
            f1=e.indexOf('@');
            f2=e.indexOf('@',f1+1);
            e1=e.indexOf('.');
            e2=e.indexOf('.',e1+1);
            n=e.length;

            if(!(f1>0 && f2==-1 && e1>0 && e2==-1 && f1!=e1+1 && e1!=f1+1 && f1!=n-1 && e1!=n-1))
            {
               window.alert("Please Enter valid Email");
               EmailID.focus();
               return false;
            }
            if(Pass.value=="")
            {
                window.alert("Plese Enter Your Password");
                Pass.focus();
                return false;
            }
            if (Pass.value.length < 4) {
               window.alert("Password must be atleast 4 characters long");
               Pass.focus();
               return false;
            } 
            if(Cpass.value=="")
            {
               window.alert("Plese Enter Confirm Password");
               Cpass.focus();
               return false;
            }
            if(Pass.value!=Cpass.value)
            {
               window.alert("Confirm Password does not matched");
               Cpass.focus();
               return false;
            }
            if(Inst.value=="")
            {
               window.alert("Plese Enter Your Institution's name");
               Inst.focus();
               return false;
            }
           if(Mobile.value=="")
           {
               window.alert("Plese Enter Mobile Number");
               Mobile.focus();
               return false;
            } else {
               return true;
            }
        }
  </script>
  <link rel="stylesheet" type="text/css" href="quiz.css">
  <style>
    input[type=text] {
       width: 300px;
       box-sizing: border-box;
       border: 2px solid #ccc;
       border-radius: 4px;
       font-size: 16px;
       background-color: white;
       padding: 7px 0px 7px 0px;
    }

    input[type=password] {
       width: 300px;
       box-sizing: border-box;
       border: 2px solid #ccc;
       border-radius: 4px;
       font-size: 16px;
       background-color: white;
       padding: 7px 0px 7px 0px;
    }

    input[type=submit] {
       width: 200px;
       box-sizing: border-box;
       border: 1px solid black;
       border-radius: 4px;
       font-size: 16px;
       background-color: green;
       padding: 7px 0px 7px 0px;
       color: white
    }
  </style>
</head>
<body>
  <?php
     include("header.php");
     include("db.php");
     // extract($_SESSION);
     

     $sql = mysqli_query($con, "select name, email, password, institution, phone from user where email='$_SESSION[email]'");
     $row=mysqli_fetch_array($sql);
     ?>
     <br><br><br><h1 class='style8' align=center>Update Profile</h1>
     <div style="margin:auto;width:90%;height:450px;box-shadow:2px 1px 2px 2px #CCCCCC;align:center;font-size:20px"><div style="padding-top:6%">
    <form name="form2" method="post" action="updateinfo.php" onSubmit="return validation_fom2();">
      <table width="70%" border="0" align="center">
      <tr>
        <td height="10px">&nbsp;</td>
        <td></td>
      </tr>
      <tr>
        <td><div align="left" class="style7">Name</div></td>
        <td><input type="text" name="Name" value="<?php echo $row[0]; ?>"></td>
      </tr>
      <tr>
        <td><div align="left" class="style7">Email ID</div></td>
        <td><input type="text" name="emailid" value="<?php echo $row[1]; ?>"></td>
      </tr>
      <tr>
        <td><div align="left" class="style7">Password</div></td>
        <td><input type="text" name="pass" value="<?php echo $row[2]; ?>"></td>
      </tr>
      <tr>
        <td width="110px"><div align="left" class="style7">Confirm Password</div></td>
        <td><input type="password" name="cpass"></td>
      </tr>
      <tr>
        <td><div align="left" class="style7">Institution</div></td>
        <td><input type="text" name="ins" id="ins"  value="<?php echo $row[3]; ?>"></textarea></td>
      </tr>
      <tr>
        <td><div align="left" class="style7">Mobile No</div></td>
        <td><input type="text" name="mob"  value="<?php echo $row[4]; ?>"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
           <td><input type="submit" name="Submit" value="Update"></td>
      </tr>
      </table>
    </form></div>
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

    