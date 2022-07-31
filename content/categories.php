<?php
if(!$user){ ?><h1 style="color:red">Access Denied!</h1><?php } else { ?>

<ul class="Categories">
<?php 
$resc=mysql_query ("SELECT * from categories Order By Name");
while($rc=mysql_fetch_array($resc)){ ?>

	<li>
	<h3><?php echo $rc[1]; ?></h3>
		<ul>
			<?php $resm=mysql_query ("SELECT * from members WHERE Category='$rc[ID]' AND LEVEL=2  Order By Name");
			 while($rm=mysql_fetch_array($resm)){ ?>
				<li><a href="index.php?page=member&id=<?php echo $rm['ID']; ?>"><?php echo $rm[Name]; ?></a></li>
			<?php } ?>
		</ul>	
	</li><?php
}

?>


</ul>


<?php } ?>