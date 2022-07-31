<?php  if($user['Level']!=3 || $user['ID']==$_GET['id']){
	 ?><h1 style="color:red">Access Denied!</h1><?php  }
	 else {
		 mysql_query("DELETE FROM members WHERE ID='$_GET[id]'");

 ?>
<h1>Account Successfully Deleted!</h1>
<big>Account was deleted. Now that user cannot login to the 
system.<br> Please click <a href="index.php" >here</a> 
to continue to your account</big>
<?php  } ?>