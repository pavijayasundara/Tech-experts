<?php $r=$_POST; 

if($_POST['Submit']){
	mysql_query( "UPDATE members SET Password='$r[PW]' WHERE ID='$user[ID]' AND Password='$r[OPW]'");
	if(mysql_affected_rows()==0) { ?><script language="javascript" type="text/javascript">alert('Old password was incorrect.');</script><?php  }
	else { 
		$saved=1;
	}
}

if(!$saved) {
?>
<h1>Change Password</h1>
<form method="post" onsubmit="return ValidateFrom(this)">
 
	<label>Old Password*<input type="password" name="OPW" onblur="if(this.value.length<5) alert('Old password too short');" id="OPW" /></label>
	<label>New Password*<input type="password" name="PW" onblur="if(this.value.length<5) alert('New password too short');" id="PW" /></label>
	<label>Confirm New Password*<input type="password" name="CM" onblur="  if(this.value !=document.getElementById('PW').value  ) alert('Confirm new password missmatch');" /></label>
 
	<input type="submit" name="Submit" value="Change" />
</form>
<?php } else { ?>
<h1>Password Successfully Changed!</h1>
Now you can use your new password to login next time.<br> Please click <a href="index.php" ><span style="color:#66F">here</span></a> 
to continue to your account
<?php } ?>
 
