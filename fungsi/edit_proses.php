<?php
	session_start();
	include "koneksi.php";
	
	$id = $_POST['id_product'];
	$name = $_POST['product_name'];
	$id_category = $_POST['kategori'];
	$lokasi_file = $_FILES['file']['tmp_name'];
	$tipe_file = $_FILES['file']['type'];
	$nama_file = $_FILES['file']['name'];
	$direktori = "../css/file/$nama_file";
	
	if(!empty($lokasi_file)){
		move_uploaded_file($lokasi_file,$direktori);
		//Masukkan ke dalam database
		$query = mysql_query("UPDATE product SET product_name='$name',id_category='$id_category',file='$nama_file' WHERE id_product='$id' ");
			if($query)
			{
				?>
					<script language ="javascript">
					var nama = "<?php echo $name; ?>";
					alert("Data File dengan nama "+nama+" berhasil di Update.");
					document.location.href = "../login.php";
					</script>
				<?php
			}
			else
			{
			?>			<script language ="javascript">
						var id = "<?php echo $id; ?>";
						alert("Data File gagal di Edit!!");
						document.location.href = "../edit_file.php?id="+id;
						</script>
			<?php
			}
		}
		else{ echo "File yang dituju kosong !!"; }
		
		?>	