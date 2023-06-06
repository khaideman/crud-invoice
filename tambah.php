<!DOCTYPE html>
<html>
<head>
	<title>Input Data</title>
	<link rel="stylesheet" href="style.css">
	<script src="script.js"></script>
</head>
<body>
	<header>
		<h1>Input Data</h1>
	</header>
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="tambah.php">Input Data</a></li>
		</ul>
	</nav>
	<main>
		<h2>Input Purchase Order</h2>
		<form action="simpan.php" method="post" enctype="multipart/form-data">
			<div class="form-row">
				<label for="order_no">Order No.</label>
				<input type="text" name="order_no" id="order_no" required>
			</div>
			<div class="form-row">
				<label for="order_date">Order Date</label>
				<div class="input-icon">
					<input type="date" name="order_date" id="order_date" required>
					<span class="icon"><i class="far fa-calendar-alt"></i></span>
				</div>
			</div>
			<div class="form-row">
				<label for="po_expiry_date">PO Expiry Date</label>
				<div class="input-icon">
					<input type="date" name="po_expiry_date" id="po_expiry_date" required>
					<span class="icon"><i class="far fa-calendar-alt"></i></span>
				</div>
			</div>
			<div class="form-row">
				<label for="buyer">Buyer</label>
				<select name="buyer" id="buyer" required>
					<option value="">Pilih buyer</option>
					<option value="PT SENTRAL RETAILINDO DEWATA">PT SENTRAL RETAILINDO DEWATA</option>
					<option value="PT MAJU JAYA">PT MAJU JAYA</option>
				</select>
			</div>
			<div class="form-row">
				<label for="photo">Photo</label>
				<input type="file" name="photo" id="photo">
			</div>
			<div class="form-row">
				<button type="submit">Save</button>
				<button type="reset">Reset</button>
			</div>
		</form>
	</main>
	<footer>
		<p>CV Ball; 2023</p>
	</footer>
</body>
</html>
