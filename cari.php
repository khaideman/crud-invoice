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
	$cari = $_GET["cari"];

	// Mencari data dari database
	$sql = "SELECT * FROM purchase WHERE order_no LIKE '%$cari%' OR order_date LIKE '%$cari%' OR po_expiry_date LIKE '%$cari%' OR buyer LIKE '%$cari%'";
	$result = mysqli_query($koneksi, $sql);

	// Menutup koneksi ke database
	mysqli_close($koneksi);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hasil Pencarian</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<h1>Halaman Pencarian Data</h1>
	</header>
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="tambah.php">Tambah Data</a></li>
			<li><a href="cari.php">Cari Data</a></li>
		</ul>
	</nav>
	<main>
		<h2>Hasil Pencarian</h2>
		<table>
			<tr>
				<th>No</th>
				<th>Order No.</th>
				<th>Order Date</th>
				<th>PO Expiry Date</th>
				<th>Buyer</th>
				<th>Photo</th>
				<th>Aksi</th>
			</tr>
			<?php
				$no = 1;
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $no . "</td>";
					echo "<td>" . $row["order_no"] . "</td>";
					echo "<td>" . $row["order_date"] . "</td>";
					echo "<td>" . $row["po_expiry_date"] . "</td>";
					echo "<td>" . $row["buyer"] . "</td>";

					if (!empty($row["photo"])) {
						echo '<td><img id="invoice-img" src="photo/' . $row["photo"] . '" width="80"></td>';
					} else {
						echo '<td></td>';
					}

					echo "<td>";
					echo "<a href='edit.php?id=" . $row["id"] . "'>Edit</a> ";
					echo "<a href='hapus.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure want to delete this data?\")'>Hapus</a>";
					echo "</td>";
					echo "</tr>";
					$no++;
				}
			?>
		</table>
	</main>
	<footer>
		<p>CV Ball; 2023</p>
	</footer>
</body>
</html>
