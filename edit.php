<?php 
		echo "<h1>Detail</h1>";
		$koneksi = mysqli_connect("localhost","root","","mahasiswa2");
		$nim = $_GET['nim'];

		$query = mysqli_query($koneksi, "SELECT * FROM mhsbaru WHERE nim = '".$nim."'");
		$row = mysqli_fetch_array($query);
		
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

			foreach ($query as $qU ) {
				echo "<tr>
						<td>".$qU['nim']."</td>
						<td>".$qU['nama']."</td>
						<td>".$qU['jenis_kelamin']."</td>
						<td>".$qU['prodi']."</td>
						<td>".$qU['fakultas']."</td>
						<td>".$qU['asal']."</td>
						<td>".$qU['moto_hidup']."</td>
					</tr>";
			}
			echo "</table>";
 ?>

 <form method="POST">
 	<br><br>
 	<h1>EDIT DATA</h1>
 	<table>
 		<tr>
 			<td>NIM</td>
 			<td></td>
 			<td><?php echo $row['nim'];?></td>
 		</tr>
 		<tr>
			<td>Nama</td>
			<td></td>
			<td><input type="text" name="nama" value="<?php  echo $row['nama']?>"></td>
		</tr>
			<td>Jenis Kelamin</td>
			<td></td>
			<td><input type="radio" name="jk" value="pria"> Pria <input type="radio" name="jk" value="wanita"> Wanita</td>
		</tr>
		<tr>
			<td>Program Studi</td>
			<td></td>
			<td><select name="prodi">
				<option value="-1"> Pilih Prodi</option>
				<option value="D3 Sistem Informasi"> D3 Sistem Informasi</option>
				<option value="S1 Sistem Informasi"> S1 Sistem Informasi</option>
				<option value="S1 MBTI">S1 MBTI</option>
				<option value="S1 Ilmu Komunikasi">S1 Ilmu Komunikasi</option>
			</select></td>
		</tr>
		<tr>
			<td>Fakultas</td>
			<td></td>
			<td><select name="fak">
				<option value="-1"> >Pilih Fakultas</option>
				<option value="Fakultas Ekonomi Bisnis"> Fakultas Ekonomi Bisnis</option>
				<option value="Fakultas Komunikasi Bisnis"> Fakultas Komunikasi Bisnis</option>
				<option value="Fakultas Ilmu Terapan">Fakultas Ilmu Terapan</option>
				<option value="Fakultas Industri Kreatif">Fakultas Industri Kreatif</option>
			</select></td>
		</tr>
			
		<tr>
			<td>Asal</td>
			<td></td>
			<td><input type="text" name="asal" value="<?php echo $row['asal']?>"></td>
		</tr>
		<tr>
			<td>Moto Hidup</td>
			<td></td>
			<td><textarea name="moto"><?php echo $row['moto_hidup'];?></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" name="submit" value="Update"><a href="cari.php">Cari Data</a></td>
		</tr>
 	</table>
 </form>
 <?php 
 	if (isset($_POST['submit'])) {
 		$koneksi = mysqli_connect("localhost","root","","mahasiswa2");

 		$nim = $_GET['nim'];
		$nama = $_POST['nama'];
		$jk = $_POST['jk'];
		$prodi = $_POST['prodi'];
		$fak  = $_POST['fak'];
		$asal  = $_POST['asal'];
		$moto = $_POST['moto'];

		$qryUbah = mysqli_query($koneksi, "SELECT * FROM mhsbaru WHERE nim = '".$nim."'");
		$row1 = mysqli_fetch_array($qryUbah);

		if ($prodi !== -1) {
			if ($fak !== -1) {
				$sql = mysqli_query($koneksi, "UPDATE `mhsbaru` SET `nama` ='".$nama."', `jenis_kelamin`= '".$jk."', `prodi`= '".$prodi."', `fakultas`= '".$fak."', `asal`= '".$asal."', `moto_hidup`= '".$moto."' WHERE nim = '".$nim."'");
				echo "Data Berhasil Di Ubah";
			}
			else{
				echo "Fakultas Tidak Boleh Kosong";
			}
		}
		else{
			echo "Prodi Tidak Boleh Kosong";
		}
 		
 	}
  ?>