
  <table width="100%">
  <tr>
  <td>
  <?php 
  @$_SESSION['email']; 
  error_reporting(1); //display_start_up_errors, error_reporting, and log_errors must be set to on so that errors are always logged behind the scenes. 
  ?>
  </td>
  <td>    
	<?php
	if(isset($_SESSION['email']))
	{
     echo $_SESSION['email'];
	 echo "<div align=\"right\"><strong><a href=\"index.php\"> Home </a>|<a href=\"logout.php\">Signout</a></strong></div>";
	 }
	 else
	 {
	 	echo "&nbsp;";   //add space; str_repeat('&nbsp;', 5); // adds 5 spaces
	 }
	?>
  </td>
	
  </tr>
  
</table>
<!-- <ul class="nav navbar-nav navbar-right">
        
        
      <?php
        if(isset($_SESSION['id'])){?>
          <li class="navbar-text">Welcome <b><?php echo $_SESSION['id'];?></b></li>
          <li><a href="logout.php">Logout</a></li>
       <?php }else{
      ?>
      <li <?php echo $title=='Login'?'class="active"':''?>><a href="login.php">Login</a></li>
      <li <?php echo $title=='Registration'?'class="active"':''?>><a href="registration.php">Registration</a></li>
      <?php } ?>
    </ul>-->