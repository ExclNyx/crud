<?php
	$conn = mysqli_connect('localhost','root','','db_web') or die ('Gagal');	
	if (mysqli_connect_error()){
		echo "Koneksi database gagal : " . mysqli_connect_error();
	}
	
?>
