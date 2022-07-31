<?php 
if(!$user){
	 ?><h1 style="color:red">Access Denied!</h1><?php
	  }
else { 
	  ?><h1>
	<?php
	
	switch($_GET['level']){
		case 1: 
			 echo "Clients List";
			 break;
		case 2:
			 echo "Technicians List";  
			 break;
		case 3:
			 echo "Administrators List";  
			 break;
		default:
			 $_GET['level']=2;
			 echo "Search";   
			 break;  
	}
?>

</h1>
<form method="post" class="Search">
Name<input type="text" name="Name" value="<?php echo $_POST['Name']?>" size="30"/>
	<br><?php if($_GET['level']==2){ ?>Price Between<input type="text" name="PriceF" value="<?php echo $_POST['PriceF']?>" size="7"/>- <input type="text" name="PriceU" value="<?php echo $_POST['PriceU']?>" size="7"/>
Rate Between<input type="text" name="RateF" value="<?php  echo $_POST['RateF']?>" size="7"/>- <input type="text" name="RateU" value="<?php echo $_POST['RateU']?>" size="7"/>

        Category<select name="Cat" style="display:inline-block">
        <option></option>
        <?php $rs=mysql_query("SELECT ID,Name FROM categories ORDER BY Name"); 
        while($rc=mysql_fetch_array($rs)){
            ?>
            <option value="<?php echo $rc[ID]; ?>" 
            <? echo $_POST['Cat'];?>
            <?php if($_POST['Cat']==$rc[ID])
                     echo 'selected'; ?> >
            <?php echo $rc['Name']; ?></option>
            <?php } ?>
            </select>
        <?php } ?>
<input type="submit" value="Search"/>
</form>
<?php

if($v=$_POST['Name']){
	 $sql.=" AND Name LIKE '%$v%'";
	 }
if($v=$_POST['PriceU']){
	 $sql.=" AND Price BETWEEN '$_POST[PriceF]' AND '$_POST[PriceU]'";
	 }
if($v=$_POST['RateU']) {
	$sql.=" AND Rate BETWEEN '$_POST[RateF]' AND '$_POST[RateU]'";
	}
if($v=$_POST['Cat']) {
	$sql.=" AND Category='$_POST[Cat]' ";
}

$resm=mysql_query ("SELECT * from members WHERE Level='$_GET[level]' $sql  Order By Name"); 
$leveluser=$_GET[level];

?>
<br>
<table style="width:100%; background-color:#A59B7A; border-collapse:collapse" border="1" cellpadding="3">
	<tr>
		<th width="90px">Name</th>
		<th width="90px">Mobile</th>
        <th width="90px">Phone</th>
		<th>Address</th>
         <?php if($_GET['level']==2){ ?>
		<th>Price</th>
        <th>Comments on Price</th>
		<th>Rate</th>
        <th width="120px">Qualifications </th>
         <?php } ?>
		<th width="60">View</th>
		<?php if($user['Level']==3){ ?>
		<th width="60">Edit</th>
		<th width="60">Delete</th>
		<?php } ?>
	</tr>
	<?php while($rm=mysql_fetch_array($resm)){ ?> 

	<tr>
		
		<td><?php echo " $rm[Name]"; ?></td>
		<td><?php echo  "$rm[Mobile]"; ?></td>
        <td><?php echo  "$rm[Phone]"; ?></td>
		<td><?php echo "$rm[Address]"; ?></td>
        <?php if($_GET['level']==2){ ?>
		<td align="right"><?php echo number_format( "$rm[Price]",2); ?></td>
   		<td><?php echo "$rm[Comments]"; ?></td>
        <td align="center"><?php echo "$rm[Rate]"; ?></td>
		<td><?php echo  "$rm[Qualifications]"; ?></td>
        <?php } ?>
		<td align="center"><a href="index.php?page=member&level=<?php echo $leveluser?>&id=<?php echo $rm['ID']?>">View</a></td>
		<?php if($user['Level']==3){ ?>
		<td align="center"><a href="index.php?page=account&id=<?php echo $rm['ID']?>">Edit</a></td>
		<td align="center"><a href="index.php?page=delete&id=<?php echo $rm['ID']?>" onclick="return confirm('Are you sure you want to delete <?php echo "$rm[Name]" ?>\'s Account? ')">Delete</a></td>
		<?php } ?>
	</tr>
	<?php } ?>
</table>
<?php } ?>
