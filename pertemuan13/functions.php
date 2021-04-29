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

	$namabarang = htmlspecialchars($data["namabarang"]);
	$harga = htmlspecialchars($data["harga"]);
	$merk = htmlspecialchars($data["merk"]);

	// upload gambar
	$gambar = upload();
	if( !$gambar) {
		return false;
	}

	$query = "INSERT INTO otomotif
				VALUES
				('', '$gambar', '$namabarang', '$harga', '$merk')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang di upload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu');
				</script>";
		return false;
	}

	// cek apakah yang di upload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar');
			</script>";
		return false;
	}

	// lolos pengecekan, gambar siap di upload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;


	move_uploaded_file($tmpName, 'img/' . $namaFile);

	return $namaFileBaru;

}




function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM otomotif WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function ubah($data) {
	global $conn;

	$id = $data["id"];
	$gambarLama = htmlspecialchars($data["gambarLama"]);
	$namabarang = htmlspecialchars($data["namabarang"]);
	$harga = htmlspecialchars($data["harga"]);
	$merk = htmlspecialchars($data["merk"]);

	// cek apakah user pilih gambar baru atau tidak
	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();

	}
	
	$query = "UPDATE otomotif SET
				gambar = '$gambar',
				namabarang = '$namabarang',
				harga = '$harga',
				merk = '$merk'
				WHERE id = $id
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function cari($keyword) {
	$query = "SELECT * FROM otomotif
				WHERE
            namabarang LIKE '%$keyword%' OR
            harga LIKE '%$keyword%' OR
            merk LIKE '%$keyword%' 
            ";
    return query($query);
}

?>