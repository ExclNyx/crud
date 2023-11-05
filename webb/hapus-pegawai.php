<?php 
	include 'koneksi.php';

	if (isset($_GET['idpegawai'])){
		$delete = mysqli_query($conn, "DELETE FROM user WHERE id = '".$_GET['idpegawai']."'");
		echo "<script>window.location = 'pegawai.php'</script>";
	}

?>