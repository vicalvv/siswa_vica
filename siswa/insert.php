<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	
	<title>Data Tambah Siswa</title>
</head>
<body>
	<div class="container mt-5 ">
		<center class="mb-5" ><h2>Data Tambah Siswa</h2></center>
		<hr>
		<?php if (isset($_GET['pesan'])) { ?>
			<?php if ($_GET['pesan'] == "berhasil") { ?>
				<div class="alert alert-primary" role="alert">
					Berhasil Menambahkan Data Siswa
				</div>
			<?php }elseif ($_GET['pesan'] == "gagal") { ?>
				<div class="alert alert-danger" role="alert">
					Gagal Menambahkan Data Siswa
				</div>
			<?php }elseif ($_GET['pesan'] == "ekstensi") { ?>
				<div class="alert alert-warning" role="alert">
					Ekstensi File Harus PNG Dan JPG
				</div>
			<?php }elseif ($_GET['pesan'] == "size") { ?>
				<div class="alert alert-warning" role="alert">
					Size File Tidak Boleh Lebih Dari 2 MB
				</div>
			<?php } ?>
		<?php } ?>
		<br>

		<form action="insert_act.php" method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<label class="form-label">Nama Lengkap Siswa</label>
				<input type="text" name="nama_lengkap" class="form-control">
			</div>
			<div class="mb-3">
				<label class="form-label">Kelas</label>
				<input type="text" name="kelas" class="form-control">
			</div>
			<div class="mb-3">
				<label class="form-label">Alamat</label>
				<textarea class="form-control" name="alamat" rows="3"></textarea>
			</div>
			<div class="mb-3">
				<label class="form-label">Pas Foto</label>
				<input type="file" name="pas_foto" class="form-control">
			</div>
			<div class="mb-3">
				<button class="btn btn-success" type="submit">Submit</button>
				<a href="index.php" class="btn btn-danger">Kembali</a>
			</div>
		</form>
		
	</div>
</body>
</html>