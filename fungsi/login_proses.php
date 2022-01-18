<?php
	session_start();
	include "koneksi.php";
	
	$nim = mysql_real_escape_string($_POST['nim']);
	$password = mysql_real_escape_string($_POST['password']);

	$userCheck = mysql_query("SELECT * FROM student_mahasiswa WHERE nim = '$nim' AND password = MD5('$password')",$conn2) or die(mysql_error());
	
	if (mysql_num_rows($userCheck) == 1) {
		$row = mysql_fetch_array($userCheck);
		
		$_SESSION['image'] = $row['image'];
		$_SESSION['nim'] = $row['nim'];
		$_SESSION['nama'] = $row['nama'];
		$_SESSION['alamat'] = $row['alamat'];
		$_SESSION['tempat_lahir'] = $row['tempat_lahir'];
		$_SESSION['tanggal_lahir'] = $row['tanggal_lahir'];
		$_SESSION['agama_id'] = $row['agama_id'];
		$_SESSION['sekolah_nama'] = $row['sekolah_nama'];
		$_SESSION['tanggal'] = $row['tanggal'];
		$_SESSION['nama_ayah'] = $row['nama_ayah'];
		$_SESSION['nama_ibu'] = $row['nama_ibu'];
		$_SESSION['alamat_ayah'] = $row['alamat_ayah'];
		?>
		<script>
			document.location.href = "../login.php";
		</script>
		<?php
	} else {
		?>
		<script>
			alert("Incorrect email or password!");
			history.back(-1);
		</script>
		<?php
	}
?>