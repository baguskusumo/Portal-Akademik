<?php
	session_start();
	include "koneksi.php";
	
	$id = $_GET['id'];
	
	$hapus = mysql_query("DELETE FROM akademik_krs WHERE krs_id='$id'");
	if($hapus){
?>
		<script>
		var id = "<?php echo $id; ?>";
		alert("Matakuliah berhasil di hapus");
		document.location.href="../pengelolaankrs.php";
		</script>
<?php
	 }
	 else{
?>
		<script>
		var id = "<?php echo $id; ?>";
		alert("Matakuliah gagal di hapus");
		document.location.href="../pengelolaankrs.php";
		</script>
<?php
	}
?>	