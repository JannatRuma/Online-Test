<?php
include ("home.html");
?>

<?php
session_start();
include("header_admin.php");
include("db.php");
error_reporting(1);
?>

<link href="quiz.css" rel="stylesheet" type="text/css">
<style>
    
    table#t01 {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    table#t01 th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    table#t01 td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    table#t01 tr:nth-child(even) {
        background-color: #dddddd;
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

<?php
extract($_POST);

echo "<br>";
if (!isset($_SESSION['email']))
{
  echo "<br><h2><div  class='head1'>You are not Logged On Please Login to Access this Page</div></h2>";
  echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
  exit();
}
else
    echo $_SESSION['email'];
echo "<br><div style='text-align: center'><h1 class=style8>Delete Question</h1></div>";
if($submit == 'submit' || strlen($testid)>0 )
{
  echo '<div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:center">';
  $sql = mysqli_query($con, "select que_id, sub_id, que from question where sub_id = '$testid'") or die(mysqli_error());

  $num_row = mysqli_num_rows($sql);
  if(mysqli_num_rows($sql) > 0) {
    echo '<table width="100%" id="t01">';
    echo    "<tr>
              <th>Question ID</th>
              <th>Subject ID</th>
              <th>Question</th>
              <th>Action</th>
            </tr>";
    while( $userrow = mysqli_fetch_array($sql) ) {
      echo "<tr>";
      echo    "<td>" . $userrow['que_id'] . "</td>"; $_SESSION['que_id'] = $userrow['que_id'];
      echo    "<td>" . $userrow['sub_id'] . "</td>";
      echo    "<td>" . $userrow['que'] . "</td>";
      echo    "<td>";?>
      <a href="delete.php" onclick="return confirm('Are you sure you wish to delete this Record?');"><span class="errors"> Delete</span></a>
              </td>  <!--?id= $userrow['que_id']-->
            </tr>
<?php 
    }
    echo "</table>";
    exit;      
  } else {
    echo '<div style="padding-top:15%">';
    echo "<h2 class=head1>No question is added for this subject !</h2>";
    exit;
  }
  
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admininistrative Task</title>
</head>

<body>
  <div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:center;"><div style="padding-top: 25px">
    <form name="form1" method="post" onSubmit="return check();">
      <table width="30%"  border="0" align="center">
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
                echo "<option value='$row[0]'>$row[1]</option>";
              } else {
                echo "<option value='$row[0]'>$row[1]</option>";
              }
            }
          ?>
          </select></td>
        </tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr>
          <td height="30"></td>
          <td><input type="submit" name="submit" value="Submit" ></td>
        </tr>
      </table>
    </form>
  </div></div>
</body>
</html>
<?php
include ("foot.php");
?>