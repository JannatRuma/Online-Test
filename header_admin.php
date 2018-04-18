

  <table width="100%">
  <tr>
  <td>
  <?php 
  @$_SESSION['email']; 
  error_reporting(1);
  ?>
  </td>
    <td>
	<?php
	if(isset($_SESSION['email']))
	{
	 echo "<div align=\"right\"><strong><a href=\"admin.php\"> Admin Home </a>|<a href=\"logout_admin.php\">Signout</a></strong></div>";
	 }
	 else
	 {
	 	echo "&nbsp;";
	 }
	?>
	</td>
	
  </tr>
  
</table>