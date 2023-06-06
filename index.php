<?php
	session_start();
	if(!isset($_SESSION['username'])) {
		header('Location: login.php');
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="style.css">
	<script src="script.js"></script>
</head>
<body>
	<header>
		<h1>Home Page</h1>
	</header>
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="tambah.php">Input Data</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
		<form class="search" action="cari.php" method="get">
			<input type="text" name="cari" placeholder="search...">
			<button type="submit">Search</button>
		</form>
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

			// Mengambil data dari tabel
			if (isset($_GET["cari"])) {
				$cari = $_GET["cari"];
				$sql = "SELECT * FROM purchase WHERE buyer LIKE '%$cari%' OR order_no LIKE '%$cari%'";
			} else {
				$sql = "SELECT * FROM purchase";
			}
			$result = mysqli_query($koneksi, $sql);

			// Menampilkan data dalam bentuk tabel
			if (mysqli_num_rows($result) > 0) {
				echo "<table>";
				echo "<tr><th>No.</th><th>Order No.</th><th>Order Date</th><th>PO Expiry Date</th><th>Buyer</th><th>Photo</th><th>Action</th></tr>";
				$i = 1;
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $i . "</td>";
					echo "<td>" . $row["order_no"] . "</td>";
					echo "<td>" . $row["order_date"] . "</td>";
					echo "<td>" . $row["po_expiry_date"] . "</td>";
					echo "<td>" . $row["buyer"] . "</td>";

					if (!empty($row["photo"])) {
						echo '<td><img id="invoice-img" src="photo/' . $row["photo"] . '" width="80"></td>';
					} else {
						echo '<td></td>';
					}

					echo "<td><a href='edit.php?id=" . $row["id"] . "'>Edit</a> | <a href='hapus.php?id=" . $row["id"] . "'>Delete</a></td>";
					echo "</tr>";
					$i++;
				}
				echo "</table>";
			} else {
				echo "Data not found.";
			}

			// Menutup koneksi ke database
			mysqli_close($koneksi);
		?>
	</main>
	<footer>
		<p>CV Ball; 2023</p>
	</footer>
</body>
</html>
