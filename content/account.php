<script language="javascript">
function validation(){
	var username= document.frm.UN.value;
	var password= document.frm.PW.value;
	var password2=document.frm.CM.value;
	var email= document.frm.Email.value;
	var address=document.frm.Address.value;
	var atpos=email.indexOf("@");
	var dotpos=email.lastIndexOf(".");
	if(username.length<5){
		 alert('Username too short');
		 return false;
		 }
	else if (password.length<5){
		alert ("Password too short");
		return false;
		}
	else if(password!=password2){
		alert("password mismatch");
		return false;
		}
	else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length){
		  alert("Not a valid e-mail address");
  			return false;
  		}
	else if(address.length<5){
		 alert('Address too short');
		 return false;
		}
  	 
    	return true;
	
}
</script>
<?php

$r=$_POST; 

if($user['Level']!=3 || $_GET['id']*1==0 ){
	$r['ID']=$user['ID'];
	} 
else 
$r['ID']=$_GET['id']; 

if(!$user || ($user['Level']==3 && $_GET['level']) ){  
	$new=1;
	$title="Register and Create Account";
	if($user['Level']==3 && $_GET['level'] ){
	 $r['Level']=$_GET['level'] ; 
	}
	else
	 $r['Level']=1; 

	if($_POST['Submit']){
		if(mysql_fetch_array(mysql_query("SELECT * FROM `members` WHERE UN='$r[UN]' AND ID!='$r[ID]' "))) { 
		?>
		<script language="javascript" type="text/javascript">alert('Username already exsits. enter another.');</script>
		<?php  }
		else {
			//inserting registered user data into database
			mysql_query("INSERT INTO members (Name,UN,Password,Level,Category,Company,Price,Rate,Qualifications,Mobile,Phone,Fax,Email,Address) VALUES  ('$r[Name]','$r[UN]','$r[PW]','$r[Level]','$r[Category]','$r[Company]','$r[Price]','$r[Rate]','$r[Qualifications]','$r[Mobile]','$r[Phone]','$r[Fax]','$r[Email]','$r[Address]')");
			if(!$user){
				$user=$r;
				$_SESSION['user']=$r;
				}
			    $saved=1;
		}
	}
}
else{
	$title="Account Settings";
	$h=mysql_fetch_array(mysql_query("SELECT * FROM members WHERE `ID`='$r[ID]'"));
	$r['Level']=$h['Level'];
	if($_POST['Submit']){ 
		mysql_query("UPDATE members SET Name='$r[Name]',Company='$r[Company]',Price='$r[Price]',Rate='$r[Rate]',Qualifications='$r[Qualifications]',Mobile='$r[Mobile]',Phone='$r[Phone]',Fax='$r[Fax]',Email='$r[Email]',Address='$r[Address]' WHERE ID='$r[ID]'");
 		if($r['ID'] == $user['ID']) { 
		$r=array_merge($user,$r);
		$user=$r;
		$_SESSION['user']=$r;
		}
		$saved=2;
	} 
	elseif($_GET['id'] && $user['Level']==3)
	 $r=$h;
	else
	 $r=$user; 
}

if(!$saved) {
?>
<h1><?php echo $title ?></h1>
<form method="post" name="frm" onsubmit="return validation()">
	
	<label>Name*<input type="text" name="Name" value="<?php echo $r['Name'] ?>"  /></label>
	
	<?php if($r['Level']==2){ ?>
	<h3> Professional Details</h3>
	<label>Category*<Select name="Category"><?php $resc=mysql_query ("SELECT * from categories Order By Name"); while($rc=mysql_fetch_array($resc)){ ?><option value="<?php echo $rc['ID']?>"><?php echo $rc['Name']?></option><?php } ?></Select></label>
	<label>Company<input type="text" name="Company" value="<?php echo $r['Company'] ?>" /></label>
	<label>Price<input type="text" name="Price" value="<?php echo $r['Price'] ?>" /></label>
	<label>Rate<input type="text" name="Rate" value="<?php echo $r['Rate'] ?>" /></label>
	<label>Qualifications<textarea name="Qualifications" ><?php echo $r['Qualifications'] ?></textarea></label> 
	<?php } ?>
	
	<?php if($new){ ?>
	<h3>Account Details</h3>
	<label>Username*<input type="text" name="UN" value="<?php echo $r['UN'] ?>"  /></label>
	<label>Password*<input type="password" name="PW"   /></label>
	<label>Confirm Password*<input type="password" name="CM"  /></label>
	<?php } ?>
	
	<h3>Contact Details</h3>
	<label>Mobile<input type="text" name="Mobile" maxlength="10" value="<?php echo $r['Mobile'] ?>"  /></label>
	<label>Phone<input type="text" name="Phone" maxlength="10" value="<?php echo $r['Phone'] ?>" /></label>
	<label>Fax<input type="text" name="Fax" maxlength="10" value="<?php echo $r['Fax'] ?>" /></label>
	<label>Email*<input type="text" name="Email"  value="<?php echo $r['Email'] ?>" /></label>
	<label>Address*<textarea name="Address" ><?php echo $r['Address'] ?></textarea></label>
	<input type="submit" name="Submit" value="<?php if($new) echo 'Register'; else echo 'Update'; ?>" />
</form>
<?php } else {if(!$new) { ?>
	<h1>Account Details Updated!</h1><big>Account details of <b><?php echo $r[Name]?></b> was successfully updated.</big>
<?php } elseif($saved==1) { ?>
	<h1>Thank You!</h1><big> Thank you <b><?php echo $r[UN]?></b> for registering with us. We'll do our best to serve you.</big>
<?php } else  { ?>
	<h1>Account Successfully Created!</h1><big>Now <b><?php echo $r[Name]?></b> can login using his username and password.</big>
<?php } ?>
	<big><br> Please click <a href="index.php" >here</a> to continue to your account</big>
<?php } ?>
 