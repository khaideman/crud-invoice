<!DOCTYPE html>
<html>
<head>
	<title>Edit Data</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<h1>Edit Data</h1>
	</header>
	<nav>
		<ul>
			<li><a href="index.php">Beranda</a></li>
			<li><a href="tambah.php">Input Data</a></li>
		</ul>
	</nav>
	<main>
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

			// Mengambil data dari database
			$id = $_GET["id"];
			$sql = "SELECT * FROM purchase WHERE id=$id";
			$result = mysqli_query($koneksi, $sql);
			$data = mysqli_fetch_assoc($result);

			// Menutup koneksi ke database
			mysqli_close($koneksi);
		?>
		<h2>Edit Purchase Order</h2>
		<form action="perbarui.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $data["id"]; ?>">
			<label for="order_no">Order No.</label>
			<input type="text" name="order_no" id="order_no" value="<?php echo $data["order_no"]; ?>" required>
			<label for="order_date">Order Date</label>
			<input type="date" name="order_date" id="order_date" value="<?php echo $data["order_date"]; ?>" required>
			<label for="po_expiry_date">PO Expiry Date</label>
			<input type="date" name="po_expiry_date" id="po_expiry_date" value="<?php echo $data["po_expiry_date"]; ?>" required>
			<label for="buyer">Buyer</label>
			<select name="buyer" id="buyer" required>
				<option value="">Pilih buyer</option>
				<option value="PT SENTRAL RETAILINDO DEWATA"<?php if ($data["buyer"] == "PT SENTRAL RETAILINDO DEWATA") echo " selected"; ?>>PT SENTRAL RETAILINDO DEWATA</option>
				<option value="PT MAJU JAYA"<?php if ($data["buyer"] == "PT MAJU JAYA") echo " selected"; ?>>PT MAJU JAYA</option>
			</select>
			<label for="photo">Photo</label>
			<?php if($data['photo']) { ?>
				<img src="photo/<?php echo $data['photo']; ?>" alt="Current photo" width="100">
			<?php } ?>
				<input type="file" name="photo" id="photo">
				<input type="hidden" name="old_photo" value="<?php echo $data['photo']; ?>">
			<button type="submit">Save</button>
			<button type="reset">Reset</button>
		</form>
	</main>
	<footer>
		<p>CV Ball; 2023.</p>
	</footer>
</body>
</html>
