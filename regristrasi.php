<?php
	session_start();
 
    include "fungsi/koneksi.php";
	(!isset($_SESSION['nim']));
$nim= $_SESSION['nim'];
$q	= mysql_query("select ar.aksi, ar.tanggal_registrasi, ar.status, ar.semester, ar.tahun_akademik from akademik_registrasi as ar where nim='$nim'", $conn2);
?>
<!-- Template-->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Portal Akademik</title>
		<link rel="stylesheet" href="css/css.css">
		<script type="text/javascript" src="js/jquery.tools.min.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
						 
	</head>
	
	<body>
		<div class="innertube">
		<div class="kiri">
		<img src="img/usu.png" alt="Home" title="Home"></img>
		
		<div id="subheader-title">1
			
		</div>
		
		<div id="infoAreaContainer-single">
		<div class="info-area">
		<table class="table-userbio">
		<th>
		Regristrasi Mahasiswa
		</th>
		</table>
		<table class="table-userbio">
			<tr>
				<th>NAMA</th><th>:</th>
				<?php
					if(!isset($_SESSION['nim'])) {
					header('location:index.php'); }
					else { $nama= $_SESSION['nama']; }
					require_once("fungsi/koneksi.php");

					$query = mysql_query("SELECT * FROM student_mahasiswa WHERE nama = '$nama'",$conn2);
					$hasil = mysql_fetch_array($query);
					?>	
					<?php
					echo "<td>$nama</td>";
				?>
			</tr>
			<tr>
				<th>NIM</th><th>:</th>
				<?php
					if(!isset($_SESSION['nim'])) {
					header('location:index.php'); }
					else { $nim= $_SESSION['nim']; }
					require_once("fungsi/koneksi.php");

					$query = mysql_query("SELECT * FROM student_mahasiswa WHERE nim = '$nim'",$conn2);
					$hasil = mysql_fetch_array($query);
					?>	
					<?php
					echo "<td>$nim</td>";
				?>
			</tr>
			<tr>
				<th>PROGRAM STUDI</th><th>:</th>
				<?php
					if(!isset($_SESSION['nim'])) {
					header('location:index.php'); 
					$_SESSION['nama_konsentrasi'] = $row['nama_konsentrasi'];}
					else { $nim = $_SESSION['nim'];}
					require_once("fungsi/koneksi.php");

					$query = mysql_query("SELECT student_mahasiswa.nim,akademik_konsentrasi.nama_konsentrasi FROM student_mahasiswa LEFT JOIN akademik_konsentrasi ON student_mahasiswa.konsentrasi_id=akademik_konsentrasi.konsentrasi_id where student_mahasiswa.nim='$nim'",$conn2);
					$hasil = mysql_fetch_array($query);
					?>	
					<td><?php
					echo $hasil['nama_konsentrasi'];
					?></td>
			</tr>
		</table>

		<table class="krs">
		<tr>
		<th>SEMESTER</th>
		<th>STATUS</th>
		<th>TANGGAL</th>
		<th>AKSI</th>
		</tr>
		<?php while($data= mysql_fetch_array($q)){?>
		<tr>
		<td>
		<?php echo $data['semester']; ?>,
		<?php echo $data['tahun_akademik']; ?>
		</td>
		<td>
		<?php echo $data['status']; ?>
		</td>
		<td>
		<?php echo $data['tanggal_registrasi']; ?>
		</td>
		<td>
		<?php echo $data['aksi']; ?>
		<?php } ?>
		</td>
		</tr>
		</table>
		
		</div>
		</div>
		</div>
		
		
		<div class="kanan">
			<div class="image">
			</div>
			<h3>
					<?php
					if(!isset($_SESSION['nama'])) {
					header('location:index.php'); }
					else { $nama= $_SESSION['nama']; }
					require_once("fungsi/koneksi.php");

					$query = mysql_query("SELECT * FROM student_mahasiswa WHERE nama = '$nama'",$conn2);
					$hasil = mysql_fetch_array($query);
					?>	
					<?php
					echo "$nama";
					?>
			</h3>
			
			<p>
					<?php
					if(!isset($_SESSION['nim'])) {
					header('location:index.php'); }
					else { $nim_mhs = $_SESSION['nim']; }
					require_once("fungsi/koneksi.php");

					$query = mysql_query("SELECT * FROM student_mahasiswa WHERE nim = '$nim_mhs'",$conn2);
					$hasil = mysql_fetch_array($query);
					?>	
					<?php
					echo "$nim_mhs";
					?>
			</p>
			
			<p>
					<?php
					if(!isset($_SESSION['nim'])) {
					header('location:index.php'); 
					$_SESSION['nama_konsentrasi'] = $row['nama_konsentrasi'];}
					else { $nim = $_SESSION['nim'];}
					require_once("fungsi/koneksi.php");

					$query = mysql_query("SELECT student_mahasiswa.nim,akademik_konsentrasi.nama_konsentrasi FROM student_mahasiswa LEFT JOIN akademik_konsentrasi ON student_mahasiswa.konsentrasi_id=akademik_konsentrasi.konsentrasi_id where student_mahasiswa.nim='$nim'",$conn2);
					$hasil = mysql_fetch_array($query);
					?>	
					<?php
					echo $hasil['nama_konsentrasi'];
					?>
			</p>
			
			<div id="potodiri">
					<?php
					if(!isset($_SESSION['nim'])) {
					header('location:index.php'); }
					else { $image = $_SESSION['image']; }
					require_once("fungsi/koneksi.php");

					$query = mysql_query("SELECT * FROM student_mahasiswa WHERE image = '$image'",$conn2);
					$hasil = mysql_fetch_array($query);
					?>	
					<img src="img/<?php
					echo "$image";
					?>"/>
			</div>

		<div class="menu">
			<a href="login.php">Halaman Depan</a>
			<a href="#">Panduan</a>
			<a href="fungsi/logout.php">Logout</a>
					
		</div>	
		<div class="menukanan2">
			<a href="profil.php">Profil</a>
			<a href="regristrasi.php">Regristrasi</a>
			<a href="matakuliah.php">Matakuliah</a>
			<a href="pengelolaankrs.php">Pengelolaan KRS</a>
					
		</div>			
		</div>
		</div>
	</body>
</html>