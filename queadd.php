<?php
include ("home.html");
?>
<?php
session_start();
include("header_admin.php");
include("db.php");
error_reporting(1);
?>

<?php
extract($_POST);

echo "<br>";
if (!isset($_SESSION['email']))
{
  echo "<br><h2><div  class=head1>You are not Logged On Please Login to Access this Page</div></h2>";
  echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
  exit();
}
else
    echo $_SESSION['email'];
echo "<br><div style='text-align: center'><h1 class=style8>Add Question</h1></div>";
if($submit == 'submit' || strlen($testid)>0 )
{
  mysqli_query($con, "insert into question(sub_id, que, op1, op2, op3, op4, ans) values ('$testid','$addque','$ans1','$ans2','$ans3','$ans4','$anstrue')") or die(mysqli_error());
  $found = "N";
  $submit = "";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admininistrative Task</title>
  <style>
     input[type=text] {
       width: 250px;
       box-sizing: border-box;
       border: 2px solid #ccc;
       border-radius: 4px;
       font-size: 16px;
       background-color: white;
       padding: 7px 0px 7px 0px;
    }

    input[type=submit] {
       width: 100px;
       box-sizing: border-box;
       border: 1px solid black;
       border-radius: 4px;
       font-size: 16px;
       background-color: green;
       padding: 7px 0px 7px 0px;
       color: white
    }
  </style>
  <link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
  <div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:center;"><div style="padding-top: 25px">
    <form name="form1" method="post" onSubmit="return check();">
      <table width="80%"  border="0" align="center">
        <tr>
          <td height="30"><strong> Select a Subject </strong></td>  
          <td height="30"><select style="width: 150px;box-sizing: border-box;border: 1px solid black;border-radius: 4px;padding: 4px 0px 4px 0px;font-size: 16px;" name="testid" id="testid">

          <?php
            $rs=mysqli_query($con, "select * from subject order by sub_name");
            echo "<option selected>Choose Any Sub</option>";
            while($row=mysqli_fetch_array($rs))
            {
              if($row[0]==$testid)
              {
                echo "<option value='$row[0]' selected>$row[1]</option>";
              } else {
                echo "<option value='$row[0]'>$row[1]</option>";
              }
            }
          ?>
          </select>
        <tr>
          <td height="30"><strong> Enter Question </strong></td>
          <td><textarea name="addque" cols="60" rows="2" id="addque" required></textarea></td>
        </tr>
        <tr>
          <td height="30"><strong>Enter Option1 </strong></td>
          <td><input name="ans1" type="text" id="ans1" size="85" maxlength="85" required></td>
        </tr>
        <tr>
          <td height="30"><strong>Enter Option2 </strong></td>
          <td><input name="ans2" type="text" id="ans2" size="85" maxlength="85" required></td>
        </tr>
        <tr>
          <td height="30"><strong>Enter Option3 </strong></td>
          <td><input name="ans3" type="text" id="ans3" size="85" maxlength="85"></td>
        </tr>
        <tr>
          <td height="30"><strong>Enter Option4</strong></td>
          <td><input name="ans4" type="text" id="ans4" size="85" maxlength="85"></td>
        </tr>
        <tr>
          <td height="30"><strong>Enter Answer </strong></td>
          <td><input name="anstrue" type="text" id="anstrue" size="50" maxlength="50" required></td>
        </tr>
        <tr>
          <td height="30"></td>
          <td><input type="submit" name="submit" value="Add" ></td>
        </tr>
      </table>
    </form>
    <?php
      if ($found){
        echo "<h2 align=center class=style8>Question Added Successfully.</h2>";
      }
    ?>
  </div></div>
</body>
</html>
<?php
include ("foot.php");
?>