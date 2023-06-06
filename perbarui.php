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
	$id = $_POST["id"];
	$order_no = $_POST["order_no"];
	$order_date = $_POST["order_date"];
	$po_expiry_date = $_POST["po_expiry_date"];
	$buyer = $_POST["buyer"];

	// Memeriksa apakah user telah memilih file photo baru atau tidak
	if ($_FILES['photo']['size'] > 0) {
		$photo = $_FILES['photo']['name'];
		$tmp = $_FILES['photo']['tmp_name'];
	} else {
		$photo = $_POST['old_photo'];
	}

	// Memperbarui data pada database
	$sql = "UPDATE purchase SET order_no='$order_no', order_date='$order_date', po_expiry_date='$po_expiry_date', buyer='$buyer', photo='$photo' WHERE id=$id";
	$result = mysqli_query($koneksi, $sql);

	// Menutup koneksi ke database
	mysqli_close($koneksi);

	// Redirect ke halaman index.php
	header("Location: index.php");
	exit();
?>
