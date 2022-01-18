<?php
	session_start();
	include "koneksi.php";
	
	$id = $_GET['id'];
	
	$hapus = mysql_query("DELETE FROM product WHERE id_product='$id'");
	if($hapus){
?>
		<script>
		var id = "<?php echo $id; ?>";
		alert("Product dengan ID "+id+" berhasil di hapus");
		document.location.href="../admin_setting.php";
		</script>
<?php
	 }
	 else{
?>
		<script>
		var id = "<?php echo $id; ?>";
		alert("Product dengan ID "+id+" gagal di hapus");
		document.location.href="../admin_setting.php";
		</script>
<?php
	}
?>	