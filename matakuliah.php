<?php
	session_start();
 
    include "fungsi/koneksi.php";
	(!isset($_SESSION['nim']));

	$nim= $_SESSION['nim'];
	$sqlmhs = mysql_query("SELECT * FROM student_mahasiswa WHERE nim='$nim'");

	//cek npm
	if(mysql_num_rows($sqlmhs)==0){
	?>
	<script>
	javascript:history.back(-1);
	</script>
	<?php
	}
	$nim= $_SESSION['nim'];
	$mhs = mysql_fetch_array($sqlmhs);

	//melakukan query ke database
	$sqlmatkul = mysql_query("SELECT * FROM makul_matakuliah LEFT JOIN student_mahasiswa ON makul_matakuliah.konsentrasi_id=student_mahasiswa.konsentrasi_id where student_mahasiswa.nim='$nim'");
	while($k = mysql_fetch_array($sqlmatkul)){
	$kode_makul[] = $k['kode_makul'];
	$nama_makul[] = $k['nama_makul'];
	$sks[] = $k['sks'];
	}
?>	

<!-- Template-->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Portal Akademik</title>
		<link rel="stylesheet" href="css/css.css">
		<script type="text/javascript" src="js/jquery.tools.min.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script>
		<?php
		echo "var jumlah = ".count($kode_makul).";\n";
		echo "var sks = new Array();\n";
		//mengambil sks matakuliah dan memasukkan ke array javascript
		for($j=0; $j<count($kode_makul); $j++){
		echo "sks['".$kode_makul[$j]."'] = ".$sks[$j].";\n";
		}
		?>
		function hitungtotal(){
		jum = 0;
		for(i=0;i<jumlah;i++){
		id = "mk"+i;
		td1 = "k1"+i;
		td2 = "k2"+i;
		td3 = "k3"+i;
		td4 = "k4"+i;
		if(document.getElementById(id).checked){
		kode_makul = document.getElementById(id).value
		jum = jum + sks[kode_makul];
		//untuk mengubah warna latar tabel apabila diceklist
		document.getElementById(td1).style.backgroundColor = "lightblue";
		document.getElementById(td2).style.backgroundColor = "lightblue";
		document.getElementById(td3).style.backgroundColor = "lightblue";
		document.getElementById(td4).style.backgroundColor = "lightblue";
		}else {
		document.getElementById(td1).style.backgroundColor = "white";
		document.getElementById(td2).style.backgroundColor = "white";
		document.getElementById(td3).style.backgroundColor = "white";
		document.getElementById(td4).style.backgroundColor = "white";
		}
		}
		//menampilkan total jumlah SKS yang diambil
		document.getElementById("jsks").value = jum;
		}
		</script>				 
	</head>
	
	<body>
		<div class="innertube2">
		<div class="kiri">
		<img src="img/usu.png" alt="Home" title="Home"></img>
		
		<div id="subheader-title2">1
			
		</div>
		
		<div id="infoAreaContainer-single">
		<div class="info-area">
		<form name="inputkrs" method="post" action="inputkrs.php">
		<table class="krs">
		<tr>
		<th height="25" width="100">Kode</th>
		<th>Mata Kuliah</th>
		<th>SKS</th>
		</tr>
		<?php
		//menampilkan matakuliah ke dalam tabel
		for($i=0; $i<count($kode_makul); $i++){
		?>
		<tr>
		<td id="k1<?=$i;?>"><?=$kode_makul[$i];?></td>
		<td id="k2<?=$i;?>"><?=$nama_makul[$i];?></td>
		<td id="k3<?=$i;?>" align="center"><?=$sks[$i];?></td>
		</tr>
		<?php
		}
		?>
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

		<div class="menu3">
			<a href="login.php">Halaman Depan</a>
			<a href="#">Panduan</a>
			<a href="fungsi/logout.php">Logout</a>
					
		</div>	
		<div class="menukanan3">
			<a href="profil.php">Profil</a>
			<a href="regristrasi.php">Regristrasi</a>
			<a href="matakuliah.php">Matakuliah</a>
			<a href="pengelolaankrs.php">Pengelolaan KRS</a>
					
		</div>			
		</div>
		</div>
	</body>
</html>