<?php
	session_start();
 
    include "fungsi/koneksi.php";
	(!isset($_SESSION['nim']));
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
				<th>ALAMAT</th><th>:</th>
				<?php
					if(!isset($_SESSION['nim'])) {
					header('location:index.php'); }
					else { $alamat= $_SESSION['alamat']; }
					require_once("fungsi/koneksi.php");

					$query = mysql_query("SELECT * FROM student_mahasiswa WHERE alamat = '$alamat'",$conn2);
					$hasil = mysql_fetch_array($query);
					?>	
					<?php
					echo "<td>$alamat</td>";
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
				<th>TEMPAT TANGGAL LAHIR</th><th>:</th>
				<?php
					if(!isset($_SESSION['nim'])) {
					header('location:index.php'); }
					else { $tempat_lahir= $_SESSION['tempat_lahir'];
						   $tanggal_lahir= $_SESSION['tanggal_lahir'];}
					require_once("fungsi/koneksi.php");

					$query = mysql_query("SELECT tempat_lahir, tanggal_lahir FROM student_mahasiswa WHERE tempat_lahir = '$tempat_lahir' and tanggal_lahir= '$tanggal_lahir'",$conn2);
					$hasil = mysql_fetch_array($query);
					?>	
					<?php
					echo "<td>$tempat_lahir , $tanggal_lahir</td>";
				?>
			</tr>
			<tr>
				<th>AGAMA</th><th>:</th>
				<?php
					if(!isset($_SESSION['nim'])) {
					header('location:index.php'); 
					$_SESSION['keterangan'] = $row['keterangan'];}
					else { $nim = $_SESSION['nim'];}
					require_once("fungsi/koneksi.php");

					$query = mysql_query("SELECT app_agama.keterangan FROM student_mahasiswa LEFT JOIN app_agama ON student_mahasiswa.agama_id=app_agama.agama_id where student_mahasiswa.nim='$nim'",$conn2);
					$hasil = mysql_fetch_array($query);
					?>	
					<td><?php
					echo $hasil['keterangan'];
				?></td>
			</tr>
			<tr>
				<th>JENIS KELAMIN</th><th>:</th>
				<td></td>
			</tr>
			<tr>
				<th>ASAL SLTA</th><th>:</th>
				<?php
					if(!isset($_SESSION['nim'])) {
					header('location:index.php'); }
					else { $sekolah_nama= $_SESSION['sekolah_nama']; }
					require_once("fungsi/koneksi.php");

					$query = mysql_query("SELECT * FROM student_mahasiswa WHERE sekolah_nama = '$sekolah_nama'",$conn2);
					$hasil = mysql_fetch_array($query);
					?>	
					<?php
					echo "<td>$sekolah_nama</td>";
				?>
			</tr>
			<tr>
				<th>TANGGAL TERDAFTAR</th><th>:</th>
				<?php
					if(!isset($_SESSION['nim'])) {
					header('location:index.php'); }
					else { $tanggal= $_SESSION['tanggal']; }
					require_once("fungsi/koneksi.php");

					$query = mysql_query("SELECT * FROM student_mahasiswa WHERE tanggal = '$tanggal'",$conn2);
					$hasil = mysql_fetch_array($query);
					?>	
					<?php
					echo "<td>$tanggal</td>";
				?>
			</tr>
			<tr>
				<th>NAMA AYAH</th><th>:</th>
				<?php
					if(!isset($_SESSION['nim'])) {
					header('location:index.php'); }
					else { $nama_ayah= $_SESSION['nama_ayah']; }
					require_once("fungsi/koneksi.php");

					$query = mysql_query("SELECT * FROM student_mahasiswa WHERE nama_ayah = '$nama_ayah'",$conn2);
					$hasil = mysql_fetch_array($query);
					?>	
					<?php
					echo "<td>$nama_ayah</td>";
				?>
			</tr>
			<tr>
				<th>NAMA IBU</th><th>:</th>
				<?php
					if(!isset($_SESSION['nim'])) {
					header('location:index.php'); }
					else { $nama_ibu= $_SESSION['nama_ibu']; }
					require_once("fungsi/koneksi.php");

					$query = mysql_query("SELECT * FROM student_mahasiswa WHERE nama_ibu = '$nama_ibu'",$conn2);
					$hasil = mysql_fetch_array($query);
					?>	
					<?php
					echo "<td>$nama_ibu</td>";
				?>
			</tr>
			<tr>
				<th>ALAMAT ORANGTUA</th><th>:</th>
				<?php
					if(!isset($_SESSION['nim'])) {
					header('location:index.php'); }
					else { $alamat_ayah= $_SESSION['alamat_ayah']; }
					require_once("fungsi/koneksi.php");

					$query = mysql_query("SELECT * FROM student_mahasiswa WHERE alamat_ayah = '$alamat_ayah'",$conn2);
					$hasil = mysql_fetch_array($query);
					?>	
					<?php
					echo "<td>$alamat_ayah</td>";
				?>
			</tr>
			<tr>
				<th>WARGA NEGARA</th><th>:</th>
				<?php
					if(!isset($_SESSION['nim'])) {
					header('location:index.php'); 
					$_SESSION['warganegara'] = $row['warganegara'];}
					else { $nim = $_SESSION['nim'];}
					require_once("fungsi/koneksi.php");

					$query = mysql_query("SELECT app_warganegara.warganegara FROM student_mahasiswa LEFT JOIN app_warganegara ON student_mahasiswa.warganegara_id=app_warganegara.warganegara_id where student_mahasiswa.nim='$nim'",$conn2);
					$hasil = mysql_fetch_array($query);
					?>	
					<td><?php
					echo $hasil['warganegara'];
				?></td>
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