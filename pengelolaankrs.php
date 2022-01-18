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
				<th>SEMESTER</th><th>:</th>
				<?php
					if(!isset($_SESSION['nim'])) {
					header('location:index.php'); }
					else { $nim= $_SESSION['nim']; }
					require_once("fungsi/koneksi.php");
					$query = mysql_query("SELECT ar.semester, ar.tahun_akademik FROM akademik_registrasi as ar JOIN akademik_tahun_akademik as atk ON ar.tahun_akademik=atk.keterangan WHERE atk.status = 'y' and ar.nim='$nim'",$conn2);
					$hasil = mysql_fetch_array($query);
					?><td>
					<?php echo $hasil['semester']; ?>,
					<?php echo $hasil['tahun_akademik']; ?></td>
			</tr>
			<tr>
				<th>SKS MAXIMUM</th><th>:</th>
				<?php
					echo "<td>-</td>";
				?>
			</tr>
		</table>
		
		<form method ="post" action="fungsi/insertkrs.php">
		<table class="krs">
		<tr>
		<th>KODE</th>
		<th>MATA KULIAH</th>
		<th>SKS</th>
		<th></th>
		</tr>
		<?php
		$nim= $_SESSION['nim'];
		//cek apakah mahasiswa sudah membayar kuliah di semester sekarang atau belum
		$cek = mysql_query("select ar.nim from student_mahasiswa as sm, akademik_tahun_akademik as atk, akademik_registrasi as ar where ar.status='Aktif' and aksi='Telah registrasi' and ar.tahun_akademik=atk.keterangan and atk.status='y' and ar.nim='$nim'");
		if(mysql_num_rows($cek)==0){
		?>
		<script>
		alert("Anda Belum Membayar Uang Kuliah");
		window.close();
		if (window.close){
		window.location = "index.php"
		}
		</script>
		<?php
		}
		else {
		$krs = mysql_query("SELECT a.semester_nama, a.krs_id, a.nim, b.kode_makul, b.nama_makul, b.sks FROM akademik_krs a LEFT JOIN makul_matakuliah b ON b.kode_makul =a.kode_makul WHERE a.nim='$nim'");
		$jum = 0;
		while($k = mysql_fetch_array($krs)){
		?>
		<tr>
		<td><?=$k['kode_makul'];?></td>
		<td><?=$k['nama_makul'];?></td>
		<td><?=$k['sks'];?></td>
		<td>
		<a href="fungsi/deletematkul.php?id=<?php echo $k['krs_id']; ?>" onclick="return confirm('Lanjut Menghapus Matakuliah Ini?');">Delete</a>
		</td>
		</tr>
		<?php
		$jum = $jum + $k['sks'];
		}}
		?>
		<tr>
		<td>Satuan Administrasi Lain
		</td>
		</tr>
		<tr>
		<th><input type="submit" value="Ambil" style="cursor:pointer;"></th>
		<th><i>Total</i></th>
		<th><b><?=$jum;?></b></th>
		</tr>
		</table>
		</form>
		
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