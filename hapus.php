<?php 
	$koneksi = mysqli_connect("localhost","root","","mahasiswa2");
	$nim = $_GET['nim'];

	mysqli_query($koneksi, "DELETE FROM mhsbaru WHERE nim = '".$nim."'");
	header("location:cari.php?pesan= BERHASIl Di HAPUS");
 ?>