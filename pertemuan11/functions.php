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

	$gambar = htmlspecialchars($data["gambar"]);
	$namabarang = htmlspecialchars($data["namabarang"]);
	$harga = htmlspecialchars($data["harga"]);
	$merk = htmlspecialchars($data["merk"]);

	$query = "INSERT INTO otomotif
				VALUES
				('', '$gambar', '$namabarang', '$harga', '$merk')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM otomotif WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function ubah($data) {
	global $conn;

	$id = $data["id"];
	$gambar = htmlspecialchars($data["gambar"]);
	$namabarang = htmlspecialchars($data["namabarang"]);
	$harga = htmlspecialchars($data["harga"]);
	$merk = htmlspecialchars($data["merk"]);

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

?>