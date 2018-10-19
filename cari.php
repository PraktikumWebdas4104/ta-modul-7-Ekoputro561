<form method="POST">
	<table>
		<tr>
			<td>CARI</td>
			<td></td>
			<td><input type="text" name="nim" placeholder="Cari NIM"></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" name="cari" value="SEARCH"><a href="index.php"> &nbsp; Kembali</a></td>
		</tr>	
	</table>
</form>

<?php 
//error_reporting(0);
	if (isset($_POST['cari'])) {
		$koneksi = mysqli_connect("localhost","root","","mahasiswa2");
		$cari = $_POST['nim'];

		$query = mysqli_query($koneksi, "SELECT * FROM mhsbaru WHERE nim = '".$cari."'");
		$row1 = mysqli_fetch_array($query);
		
		echo "<table border =1>
					<tr>
						<th>NIM</th>
						<th>Nama</th>
						<th>Aksi</th>					
						
					</tr>";

			foreach ($query as $qry ) {
				echo "<tr>
						<td>".$qry['nim']."</td>
						<td>".$qry['nama']."</td>
						
						<td><a href ='hapus.php?nim=".$qry['nim']."'> HAPUS</a> &nbsp;&nbsp;
						<a href ='edit.php?nim=".$qry['nim']."'> EDIT</a></td>
				 	</tr>";
				
			}
	}
	else{
		include 'koneksi.php';
		$qryLihat = mysqli_query($koneksi,"SELECT * FROM mhsbaru");

		echo "<table border =1>
		 			<tr>
		 				<th>NIM</th>
		 				<th>Nama</th>
		 				<th>Jenis Kelamin</th>
		 				<th>Program Studi</th>
		 				<th>Fakultas</th>
		 				<th>Asal</th>
		 				<th>Motto Hidup</th>
		 			</tr>";

		 			foreach ($qryLihat as $qL) {
		 				echo "<tr>
		 						<td>".$qL['nim']."</td>
		 						<td>".$qL['nama']."</td>
								<td>".$qL['jenis_kelamin']."</td>
								<td>".$qL['prodi']."</td>
								<td>".$qL['fakultas']."</td>
								<td>".$qL['asal']."</td>
								<td>".$qL['moto_hidup']."</td>
							</tr>";
		 			}
	}
 ?>