<?php

$connect=mysql_connect('localhost','root');
$a=mysql_select_db('techsol');


function get_msg($sender,$tech){
	$query="SELECT * FROM chat1 WHERE sender='$sender' || receiver= '$sender' ";
	$run=mysql_query($query);
	$messages=array();
	while($message=mysql_fetch_assoc($run)){
		
		$messages[]=array('sender'=>$message['sender'],'message'=>$message['message']);
		}
	return $messages;
	}
	
function send_msg($sender,$message,$tech){

	if(!empty($sender)&&!empty($message)){
		$sender=mysql_real_escape_string($sender);
		$message=mysql_real_escape_string($message);
		$tech=mysql_real_escape_string($tech);
		$query="INSERT INTO  chat1(sender,receiver,message) VALUES('$sender','$tech','$message')";
		$run=mysql_query($query);
		if($run){
			return true;
			}
		else{
			return false;
			}
	}
	else{
		
		return false;
	}
}