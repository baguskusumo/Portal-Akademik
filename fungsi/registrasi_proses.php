<?php
	session_start();
 
    include "koneksi.php";
    
?>
<?php

		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		
		if(!(preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/",$_POST['email'])))
		{
		?>
		<script language="javascript">
		alert("Email Failed");
		document.location.href = "../home.php";
		</script>
		<?php
		}
		if ($password == $password2){
		$SQL="INSERT INTO users values(NULL,'$name','$email',MD5('$password'),'User')";
		mysql_query($SQL) or die (mysql_error());
		?>
		<script language="javascript">
		alert("New User added!");
		document.location.href = "../home.php";
		</script>
		<?php }
		else{
		?>
		<script language="javascript">
		alert("Not matched Password and Confirm Password!");
		document.location.href = "../home.php";
		</script>
		<?php }
		
		
		
	
?>