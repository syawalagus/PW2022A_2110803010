<?php
require 'funcitions.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiwa berdasarkan id
$mhs = query("SELECT * FROM mahasiwa WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php';
			</script>
		";
	}


}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah data mahasiswa</title>
</head>
<body>
	<h1>Ubah data mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $mhs["Gambar"]; ?>">
		<ul>
			<li>
				<label for="Nrp">NRP : </label>
				<input type="text" name="Nrp" id="Nrp" required value="<?= $mhs["Nrp"]; ?>">
			</li>
			<li>
				<label for="Nama">Nama : </label>
				<input type="text" name="Nama" id="Nama" value="<?= $mhs["Nama"]; ?>">
			</li>
			<li>
				<label for="Email">Email :</label>
				<input type="text" name="Email" id="Email" value="<?= $mhs["Email"]; ?>">
			</li>
			<li>
				<label for="Jurusan">Jurusan :</label>
				<input type="text" name="Jurusan" id="Jurusan" value="<?= $mhs["Jurusan"]; ?>">
			</li>
			<li>
				<label for="Gambar">Gambar :</label> <br>
				<img src="img/<?= $mhs['Gambar']; ?>" width="40"> <br>
				<input type="file" name="Gambar" id="Gambar">
			</li>
			<li>
				<button type="submit" name="submit">Ubah Data!</button>
			</li>
		</ul>

	</form>




</body>
</html>