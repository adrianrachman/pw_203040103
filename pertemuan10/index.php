<?php
require 'functions.php';
$otomotif = query("SELECT * FROM otomotif");

?>


<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

<h1>Daftar Barang</h1>

<a href="tambah.php">Tambah data</a>
<br><br>

<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>No</th>
		<th>Aksi</th>
		<th>Gambar</th>
		<th>Nama Barang</th>
		<th>Harga</th>
		<th>Merk</th>
	</tr>
	<?php $i = 1; ?>
	<?php foreach( $otomotif as $om ) : ?>
	<tr>
		<td><?= $i ?></td>
		<td>
			<a href="">ubah</a>	|
			<a href="hapus.php?id=<?= $om["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
		</td>
		<td><img src="img/<?= $om["gambar"]; ?>" width="150"></td>
		<td><?= $om["namabarang"]; ?></td>
		<td><?= $om["harga"]; ?></td>
		<td><?= $om["merk"]; ?></td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>

</table>
</body>
</html>