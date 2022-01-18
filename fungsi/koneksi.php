<?php
	$host1 = "localhost";
	$user1 = "root";
	$password1 = "";
	
	$host2 = "localhost";
	$user2 = "root";
	$password2 = "";
	
	$conn1 = mysql_connect($host1, $user1, $password1);
	$conn2 = mysql_connect($host2, $user2, $password2, true);
	
	mysql_select_db("akademik1", $conn2);
	mysql_select_db("bank", $conn1);
?>