<?php

session_start();
$user = "";
$pass = "";
$msg = "";
$forgot="";
include "config/config.php"	;
$servername = "localhost";
$username = "root";
$password = "";
$db= "sfs";
$conn=db();

$db_handle = mysqli_connect($servername, $username, $password,$db);


	
$res = mysqli_query($conn, "SELECT * FROM `worksheet`");
	
	
	
	while ($db_field = mysqli_fetch_assoc($res))
	{
		$name= $db_field['Name'];
		$username=$db_field['Username'];
		$group1=$db_field['Group1'];
		
	
	$res1 = "INSERT INTO users (name,Username,Group1) VALUES('$name','$username','$group1')";
	$result =	mysqli_query($db_handle,$res1);
	}
	if($result)
		$msg="You Will be Successfully Register";
		else
			$msg=' Two Passwords Are Not Match!';
		



?>