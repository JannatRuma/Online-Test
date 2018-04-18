<?php
include ("home.html");
?>
<?php
session_start();
include("header_admin.php");
include("db.php");
error_reporting(1);
extract($_POST);

echo "<br>";
if (!isset($_SESSION['email'])){
	echo "<br><h2><div  class=head1>You are not Logged On Please Login to Access this Page</div></h2>";
	echo "<a href=admin.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}
else
    echo $_SESSION['email'];
echo "<br><div style='text-align: center'><h1 class=style8>Add Subject</h1></div>";

echo "<table width=100%>";
echo "<tr><td align=center></table>";
if($submit=='submit' || strlen($subname)>0 ){
  $rs=mysqli_query($con, "select * from subject where sub_name='$subname'");
  if (mysqli_num_rows($rs)>0){
    $found = "N";	
  } else {
    mysqli_query($con, "insert into subject(sub_name) values ('$subname')") or die(mysqli_error());
    $found2 = "N";
    $submit="";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Subject</title>
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
   <div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;">
      <div style="padding-top:5%; text-align:center;">
        <form name="form1" method="post" action="">
           <p class=style7><font size=4>Enter A New Subject: </font> 
           <input type="text" name="subname" placeholder="  Enter Subject Name" id="subname" required></p>
      </div>
           <p>&nbsp;</p>
           <p style="margin-left: 610px"><input type="submit" name="submit" value="Add"></p>
        </form>
      <?php
        if (isset($found)) {
          echo "<br><br><br><div class=head1>Subject is Already Exists !</div>";
          exit;
        } 
        if (isset($found2)) {
          echo "<h2 align=center class=style8>Subject  \"$subname \" Added Successfully.</h2>";
        }
      ?>
  </div>  
</body>
</html>

<?php
include ("foot.php");
?>