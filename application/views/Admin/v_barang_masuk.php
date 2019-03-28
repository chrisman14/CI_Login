<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<title>Barang Masuk</title>
</head>
<body>
	<div class='container'>
	<h1>Data Buku</h1>
	</br>
	<div class="card-body">
              <div class="table-responsive">
	<table class='table table-bordered'>
		<tr>
			<th>No</th>

			<th>Judul</th>
			<th>Penulis</th>
			<th>ISBN</th>
		</tr>
		<?php
$no = $offset;
foreach ($data as $buku) {
    ?>
			<tr>
			<td><?php echo ++$no; ?></td>

			<td><?php echo $buku->judul; ?></td>
			<td><?php echo $buku->penulis; ?></td>
			<td><?php echo $buku->isbn; ?></td>

			</tr>
			<?php
}
?>
	</table>
	<?php echo $halaman?>
	</div>
	</div>
	</div>
</body>
</html>
