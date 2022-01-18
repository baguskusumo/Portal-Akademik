<?php
	session_start();
	include "koneksi.php";
	
	$id = $_GET['id'];
	
	$hapus = mysql_query("DELETE FROM users WHERE id='$id'");
	if($hapus){
?>
		<script>
		var id = "<?php echo $id; ?>";
		alert("User dengan ID "+id+" berhasil di hapus");
		document.location.href="../admin_setting.php";
		</script>
<?php
	 }
	 else{
?>
		<script>
		var id = "<?php echo $id; ?>";
		alert("User dengan ID "+id+" gagal di hapus");
		document.location.href="../admin_setting.php";
		</script>
<?php
	}
?>	