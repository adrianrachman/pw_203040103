<?php
require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	

	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan');
				document.location.href = 'index.php';
			</script>
		";
	}



}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
</head>
<body>
	<h1>Tambah Data Otomotif</h1>

	<form action="" method="post">
		<ul>
			<li>
				<label for="gambar">Gambar	:</label><br>
				<input type="file" name="gambar" id="gambar" required>
			</li><br>
			<li>
				<label for="namabarang">Nama Barang	:</label><br>
				<input type="text" name="namabarang" id="namabarang" required>
			</li><br>
			<li>
				<label for="harga">Harga	:</label><br>
				<input type="price" name="harga" id="harga" required>
			</li><br>
			<li>
				<label for="merk">Merk	:</label><br>
				<select name="merk" id="merk">
					<option value="">-------Pilihan-------</option>
					<option value="Alpinestars">Alpinestars</option>
					<option value="Crossbone">Crossbone</option>
					<option value="Expedition">Expedition</option>
					<option value="Gaerne">Gaerne</option>
					<option value="Orca">Orca</option>
					<option value="Polisport">Polisport</option>
					<option value="Thor">Thor</option>
					<option value="UFO">UFO</option>
					<option value="">-</option>
				</select>
			</li><br>
			<li>
				<button type="submit" name="submit">Tambah Data</button>
			</li>
		</ul>
	</form>
</body>
</html>