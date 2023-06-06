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

	// Mengambil data dari form
	$order_no = $_POST["order_no"];
	$order_date = $_POST["order_date"];
	$po_expiry_date = $_POST["po_expiry_date"];
	$buyer = $_POST["buyer"];
	$photo = $_FILES['photo']['name'];
	$tmp = $_FILES['photo']['tmp_name'];

	// Upload file gambar
	$folder = 'photo/';
	move_uploaded_file($tmp, $folder . $photo);

	// Menyimpan data ke database
	$sql = "INSERT INTO purchase (order_no, order_date, po_expiry_date, buyer, photo) VALUES ('$order_no', '$order_date', '$po_expiry_date', '$buyer', '$photo')";
	if (mysqli_query($koneksi, $sql)) {
		echo "Data saved.";
	} else {
		echo "Data not saved: " . mysqli_error($koneksi);
	}

	// Menutup koneksi ke database
	mysqli_close($koneksi);

    // Redirect ke halaman index.php
	header("Location: index.php");
	exit();
?>
