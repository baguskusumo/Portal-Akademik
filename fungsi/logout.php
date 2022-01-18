<?php
	session_start();
	unset($_SESSION['nim']);
?>
<script>
			alert("Anda Telah Berhasil Keluar");
			document.location.href = "../index.php";
</script>