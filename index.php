<form action="" method="POST" enctype="multipart/form-data">
	<h2>REGISTRASI MABA </h2>
	<table>
		<tr>
			<td>Nama</td>
			<td></td>
			<td><input type="text" name="nama"></td>
		</tr>
		<tr>
			<td>Nim</td>
			<td></td>
			<td><input type="text" name="nim"></td>
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
			<td><input type="text" name="asal"></td>
		</tr>
		<tr>
			<td>Moto Hidup</td>
			<td></td>
			<td><textarea name="moto"> </textarea></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td align="right"><input type="submit" name="input" value="Input"><a href="cari.php"> Cari Data</a></td>
		</tr>
	</table>
</form>

<?php 
error_reporting(0);
	if (isset($_POST['input'])) {
		include 'koneksi.php';

		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$jk = $_POST['jk'];
		$prodi = $_POST['prodi'];
		$fak  = $_POST['fak'];
		$asal  = $_POST['asal'];
		$moto = $_POST['moto'];

		$qry = mysqli_query($koneksi, "SELECT * FROM mhsbaru WHERE = '$nim'");
		$row = mysqli_fetch_array($qry);

		if (!empty($nim) and !empty($nama) and !empty($jk) and !empty($prodi) and !empty($fak) and !empty($asal) and !empty($moto) )  {
			if (strlen($nim) == 10 && is_numeric($nim)==TRUE) {
				if (is_string($nama)== TRUE){
					$sql = $koneksi->query("
						INSERT INTO `mhsbaru`(`nim`,`nama`,`jenis_kelamin`,`prodi`,`fakultas`,`asal`,`moto_hidup`)
						VALUES ('$nim','$nama','$jk','$prodi','$fak','$asal','$moto')");

					echo "REGISTRASI BERHASIL";
				}
				else{
					echo "Nama Tidak Boleh Angka";
				}
				
			}else{
				echo "Nim Harus 10 karakter dan Angka";
			}
		
		 } else{
		 	echo "form tidak boleh kosong, semua harus hi isi ";
		 }

		}
 ?>