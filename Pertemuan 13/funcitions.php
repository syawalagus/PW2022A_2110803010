<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data) {
	global $conn;

	$nrp = htmlspecialchars($data["Nrp"]);
	$Nama = htmlspecialchars($data["Nama"]);
	$Email = htmlspecialchars($data["Email"]);
	$Jurusan = htmlspecialchars($data["Jurusan"]);

	// upload Gambar
	$Gambar = upload();
	if( !$Gambar ) {
		return false;
	}

	$query = "INSERT INTO mahasiwa
				VALUES
			  ('', '$nrp', '$Nama', '$Email', '$Jurusan', '$Gambar')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function upload() {

	$namaFile = $_FILES['Gambar']['name'];
	$ukuranFile = $_FILES['Gambar']['size'];
	$error = $_FILES['Gambar']['error'];
	$tmpName = $_FILES['Gambar']['tmp_name'];

	// cek apakah tidak ada Gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih Gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah Gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan Gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran Gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, Gambar siap diupload
	// generate Nama Gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;
}




function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM mahasiwa WHERE id = $id");
	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;

	$id = $data["id"];
	$nrp = htmlspecialchars($data["nrp"]);
	$Nama = htmlspecialchars($data["Nama"]);
	$Email = htmlspecialchars($data["Email"]);
	$Jurusan = htmlspecialchars($data["Jurusan"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);
	
	// cek apakah user pilih Gambar baru atau tidak
	if( $_FILES['Gambar']['error'] === 4 ) {
		$Gambar = $gambarLama;
	} else {
		$Gambar = upload();
	}
	

	$query = "UPDATE mahasiwa SET
				nrp = '$nrp',
				Nama = '$Nama',
				Email = '$Email',
				Jurusan = '$Jurusan',
				Gambar = '$Gambar'
			  WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}


function cari($keyword) {
	$query = "SELECT * FROM mahasiwa
				WHERE
			  Nama LIKE '%$keyword%' OR
			  nrp LIKE '%$keyword%' OR
			  Email LIKE '%$keyword%' OR
			  Jurusan LIKE '%$keyword%'
			";
	return query($query);
}


function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);

}









?>