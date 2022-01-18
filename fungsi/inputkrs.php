<?php
	session_start();
 
    include "koneksi.php";
	(!isset($_SESSION['nim']));
	
	/* Start = menentukan semester ganjil/genap */
	$nama_bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	$bulan = date('n') - 1;
	$bulan_ini = $nama_bulan[$bulan];
	$data_arr = array(0 => array("semester_nama" => 0, "month" => "Agustus September Oktober November Desember"),
	1 => array("semester_nama" => 1, "month" => "Januari Februari Maret April Mei Juni Juli")
	);
	for ($i=0; $i<count($data_arr); $i++) {
	if ($bulan_ini == $data_arr[$i]['month']){
	$bulan_ini = 'Ganjil';
	}
	else {
	$bulan_ini = 'Genap';
	}
	}
	$semester = $bulan_ini;
	/* End = menentukan semester ganjil/genap */

	/* Start = menentukan tahun ajaran sekarang */
	$tahun_ini = date('Y');
	$tahun_kemarin = $tahun_ini;
	$tahun = $tahun_kemarin."/".$tahun_ini;
	/* Start = menentukan tahun ajaran sekarang */
	
	$sks = mysql_query("SELECT sks from makul_matakuliah");
	$nim= $_SESSION['nim'];
	$mk = $_POST['mk'];
	$j = 0;
	$jum = $j + $sks['sks'];
	
	if($jum ==0){
	foreach($mk as $value){
	$input = mysql_query("INSERT INTO akademik_krs (krs_id, kode_makul, nim, jadwal_id, semester, semester_nama, tahun) VALUES('', '$value', '$nim', '', '', '$semester', '$tahun')", $conn2);
	}
	if($input)
	{
	?>
		<script>
		alert("Matakuliah berhasil dimasukan");
		window.close();
		if (window.close){
		window.location = "../pengelolaankrs.php"
		}
		</script>
	<?php
	}
	else
	{
	?>
		<script>
		alert("SKS tidak mencukupi");
		window.close();
		if (window.close){
		window.location = "../pengelolaankrs.php"
		}
		</script>
	<?php
	}
	}
?>