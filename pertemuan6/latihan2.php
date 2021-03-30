<?php 
// $mahasiswa = [
// ["Sandhika Galih", "043040023", "sandhikagalih@unpas.ac.id", "Teknik Informatika"],
// ["Doddy Ferdiansyah", "033040001", "diddy@gmail.com", "Teknik Industri"]
// ];

// Array Asssociative
// definisinya sama seperti array numerik, kecuali
// key-nya adalah string yang kita buat sendiri
$mahasiswa = [
	[
	"nama" => "Sandhika Galih", 
	"nrp" => "043040023",
	"email" => "sandhikagalih@unpas.ac.id",
	"jurusan" => "Teknik Informatika",
	"gambar" => "1.jfif"
],
[	
	"nama" => "Doddy Ferdiansyah", 
	"nrp" => "033040001",
	"email" => "doddy@gmail.com",
	"jurusan" => "Teknik Industri",
	"gambar" => "2.jpg"
]
];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Mahasiswa</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>

	<?php foreach ($mahasiswa as $mhs) : ?>
	<ul>
		<li>
			<img src="img/<?= $mhs["gambar"]; ?>">
		</li>
		<li>Nama : <?= $mhs["nama"]; ?></li>
		<li>NRP : <?= $mhs["nrp"]; ?></li>
		<li>Email : <?= $mhs["email"]; ?></li>
		<li>Jurusan : <?= $mhs["jurusan"]; ?></li>
	</ul>
	<?php endforeach; ?>

</body>
</html>