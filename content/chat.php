<?php
session_start();
include_once("chat.funct.php");
$sql="SELECT UN FROM members WHERE Name='Administrator'";
$query=mysql_query($sql);
if($query){
	$row=mysql_fetch_array($query);
	if($user['Level'] == 1){
		$_POST['tech']=$row['UN'];
		}
	}

if(isset($_POST['send'])){
	if($_POST['sender']!=$user['UN']){
		echo "<h1><font color='#7D26CD'>Invalid user.Message was not sent </font></h1>";
		}
	
	elseif(send_msg($_POST['sender'],$_POST['message'],$_POST['tech'])){
		 echo "message sent"; 
		}
	else{
		echo ("message sending failed");
		}
	}
?>

<div id="messages">
<?php
$messages = get_msg($user['UN'],$_POST['tech']);
	foreach($messages as $value) {
		echo '<font color="#7D26CD" size=+1><b>'.$value['sender'].'</font>'.' Sent'.'</b><br />';
		echo $value['message'].'<br /><br />';
	}
?>

<form method="post" >
<label>Enter Username:<input type="text" name="sender"/></label>
<?php if($user['Level'] == 3){?>
<label>Enter Clients name:<input type="text" name="tech"/></label>
<?php }
 ?>
<label>Enter Message:<textarea name="message" rows="8" cols="70"></textarea></label>
<div id="submit"><input type="submit" name="send" value="Send Message"></div>
</form>
</div>
