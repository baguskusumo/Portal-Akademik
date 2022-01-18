<?php
	session_start();
 
    include "fungsi/koneksi.php";

$q	= mysql_query("select nama from student_mahasiswa", $conn2);
$q1 = mysql_query("select nim from student_mahasiswa", $conn2);
						if(isset($_SESSION['nim'])) {
						header('location:login.php'); }
						require_once("fungsi/koneksi.php");
?>
<!-- Template-->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Login Portal Akademik</title>
		<link rel="stylesheet" href="css/css.css">
		<script type="text/javascript" src="js/jquery.tools.min.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
						
	</head>
	
	<body>
		<div class="innertube">
		<form method="post" action="fungsi/login_proses.php" id="signup" name="register">


							<div class="inputs">
								<input type="name" name="nim" id="nim" class="required" placeholder="NIM/NIP" autofocus />
								
								<input type="password" name="password" id="password" class="required" placeholder="password" />
								
								<td><input class="submit" type="submit" value="Login" style="width:60px; "/></td>
							
							</div>

							</form>
		</div>
	</body>
</html>