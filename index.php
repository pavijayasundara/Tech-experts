<?php
session_start();        
mysql_connect('localhost','root','');
mysql_select_db('techsol');

if($_REQUEST['cmd']=='logout'){ 
	unset($_SESSION['user']);
}
if($_REQUEST['cmd']=='Login'){
	$_SESSION['user']=mysql_fetch_array(mysql_query("SELECT * FROM members WHERE `UN`='$_POST[UN]' AND `Password`='$_POST[PW]'"));
	 } 
if($_SESSION['user']){ 
	$user=$_SESSION['user'];
}

?>
<!DOCTYPE html>
<head>

<title>TechSol Inc</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="top">
<div class="Title"><div class="links"><a href="index.php?page=customers">Our Techs</a><a href="index.php?page=about">Our Profile</a><a href="index.php?page=services"> Our Services</a></div>
<div id="logo"><a href="index.php"><h1>TechSol</h1></a>
</div>
</div>
</div>
<div class="Body">
	<table style="height:100%; width:100%"><tr>
	<td width="804" valign="top" class="Content">
    
		<?php if(is_file($p="content/$_GET[page].php")){
		include($p);
		} 
		else{
		?> 
		<img src="images/Toy-Tool-Box.jpg">
		<?php } ?>
	</td> 
<td width="286" valign="top" class="LoginBox">
	<?php
	if($user){ 
	?><b>Welcome!</b><br />
	<big><?php echo $user['UN']; ?>
    </big><a href="index.php?cmd=logout">Logout</a>
	<br />
	<a href="index.php?page=password">Change Password</a>
	<a href="index.php?page=account">Account Settings</a> <br />
	
    <big>Service Desk</big>
	<a href="index.php?page=categories">Categories</a>
	<a href="index.php?page=search">Search</a>
	<a href="index.php?page=chat">Chat</a>

	<br />
	<?php if($user['Level']==3){ ?>
	<big>Admin Panel</big>
	<a href="index.php?page=search&level=1">Clients List</a>
	<a href="index.php?page=search&level=2">Tecnicians List</a>
	<a href="index.php?page=search&level=3">Administrators List</a> 
	<a href="index.php?page=account&level=2">Add New Tecnician</a>
	<a href="index.php?page=account&level=3">Add New Administrator</a> 
	<?php } ?>
	
	<?php } else { ?>
	<div class="Login">
		<?php if($_REQUEST['cmd']=='Login'){ ?><span style="color:red">Invalid username 
		or password.</span><?php } ?>
		<form method="post">
			<label>Username<input name="UN" type="text" /></label> <label>Password<input name="PW" type="password" /></label>
			<input name="cmd" type="submit" value="Login" />
		</form>
	</div>
	<br /><br />
	<a href="index.php?page=account">Register Now</a>
	<a href="mailto://recovery@techsol.com">I forgot my password.</a>
	<a href="mailto://techsol15@yahoo.com">Help on using our services.</a> <br />
	<br /><br />
	<?php } ?></td>
	</tr></table>
</div>



<div class="Bottom">
	
	<div class ="contact">
    
    <span>Contact Us</span><br/>
    <p>e-mail:&nbsp;<b> <a href="mailto:techsol15@yahoo.com" style="color:#FFF; text-decoration:none"> techsol15@yahoo.com</a></b></p>
    <p>Address:&nbsp;<b>15/B,Station Road,Colombo3 </b></p>
    <p>Contact No:&nbsp;<b>0112536221 &nbsp;/ &nbsp;0112536260 </b></p>
    </div>
	<ul>
		<li><span>Experts On</span>
		<ul>
			<li>Programming</li>
			<li>Auto Mechanics</li>
			<li>Electricians</li>
			<li>Plumbing</li>
			<li>Construction</li>
		</ul>
		</li>
		<li><span>We Provide</span>
		<ul>
			<li>Technical Support</li>
			<li>Consultancy</li>
			<li>Project Planning</li>
			<li>Over the Phone<br/> Assistance</li>
		</ul>
		</li>
		<li><span>Our Techs</span>
		<ul>
			<li>Maga</li>
			<li>Sri Lanka Telecom</li>
			<li>Toyota Lanka</li>
			<li>Singer</li>
			<li>Anton</li>
		</ul>
		</li>
	</ul>
</div>
<div class="LinksBot "><span class="Copyright">&copy; Copyright TechSol Inc. 2013. All rights reserved.</span><a href="index.php?page=services">Our Services</a><a href="index.php?page=about">Our Profile</a><a href="index.php?page=customers"> Our Customers</a></div>
</body>
</html>
