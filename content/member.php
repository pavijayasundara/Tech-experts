<?php
$r=mysql_fetch_array ( mysql_query ("SELECT * FROM members WHERE ID=".($_GET['id']*1)));

?>
<h1><?php echo  $r[Name]  ?>'s Professional Profile</h1>
	 <?php if($_GET['level']==2){ ?>
	<h3>Qualifications Details</h3>
	<dl>
	<dt>Company</dt><dd><?php echo $r['Company']  ?> &nbsp;</dd> 
	<dt>Category</dt><dd><?php echo array_pop(mysql_fetch_array(mysql_query("SELECT NAme FROM categories WHERE ID='$r[Category]'")));  ?>&nbsp; </dd>
	<dt>Qualifications</dt><dd><?php echo $r['Qualifications']  ?> &nbsp;</dd> 
	</dl>

	<h3>Service Charges</h3>
	<dl>
	<dt>Price</dt><dd><?php echo number_format( $r['Price'],2)  ?>&nbsp;</dd>
    <dt>Comments</dt><dd><?php echo $r['Comments']  ?>&nbsp;</dd> 
	<dt>Rate</dt><dd><?php echo  $r['Rate']  ?>&nbsp;</dd> 
	</dl>
	 <?php } ?>
	<h3>Contact Details</h3>
	<dl>
	<dt>Mobile</dt><dd><?php echo $r['Mobile']  ?>&nbsp;</dd>
	<dt>Phone</dt><dd><?php echo $r['Phone']  ?>&nbsp;</dd>
	<dt>Email</dt><dd><?php echo $r['Email']  ?>&nbsp;</dd>
	<dt>Fax</dt><dd><?php echo $r['Fax']  ?>&nbsp;</dd>
	<dt>Address</dt><dd><?php echo $r['Address']  ?>&nbsp;</dd>
	</dl>
