<?php
	// Koneksi ke database
	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "invoice";
	$koneksi = mysqli_connect($host, $user, $password, $database);

	// Mengecek apakah berhasil terhubung ke database
	if (mysqli_connect_errno()) {
		echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
	}

	// // Mengambil data dari form
	$id = $_GET['id'];

	// // Menghapus data dari database
	$query = "DELETE FROM purchase WHERE id='$id'";
	$hasil = mysqli_query($koneksi, $query);

	if ($hasil) {
    	header('Location: index.php');
	} else {
    	echo "Failed to delete data.";
	}

	// Menutup koneksi ke database
	mysqli_close($koneksi);

	// Redirect ke halaman index.php
	header("Location: index.php");
	exit();

?>
