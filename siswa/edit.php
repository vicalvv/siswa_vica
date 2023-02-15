<?php 
include 'koneksi.php';
if (isset($_GET['id'])) {
	if ($_GET['id'] != "") {
		
		$id = $_GET['id'];

		$query = mysqli_query($koneksi,"SELECT * FROM siswa WHERE id_siswa='$id'");
		$row = mysqli_fetch_array($query);

	}else{
		header("location:index.php");
	}
}else{
	header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	
	<title>Data Edit Siswa</title>
</head>
<body>
	<div class="container mt-5 ">
		<center class="mb-5" ><h2>Data Edit Siswa</h2></center>
		<hr>
		<form action="edit_act.php" method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<label class="form-label">Nama Lengkap Siswa</label>
				<input type="text" name="nama_lengkap" class="form-control" value="<?php echo $row['siswa_nama']; ?>" >
				<input type="hidden" name="id" class="form-control" value="<?php echo $row['id_siswa']; ?>" >
			</div>
			<div class="mb-3">
				<label class="form-label">Kelas</label>
				<input type="text" name="kelas" class="form-control" value="<?php echo $row['siswa_kelas']; ?>">
			</div>
			<div class="mb-3">
				<label class="form-label">Alamat</label>
				<textarea class="form-control" name="alamat" rows="3"><?php echo $row['siswa_alamat']; ?></textarea>
			</div>
			<div class="mb-3">
				<label class="form-label">Pas Foto</label>
				<input type="file" name="pas_foto" class="form-control">
				<br>
				<?php 
				if ($row['siswa_foto'] == "") { ?>
					<img src="https://via.placeholder.com/500x500.png?text=PAS+FOTO+SISWA" style="width:100px;height:100px;">
				<?php }else{ ?>
					<img src="foto/<?php echo $row['siswa_foto']; ?>" style="width:100px;height:100px;">
				<?php } ?>
			</div>
			<div class="mb-3">
				<button class="btn btn-success" type="submit">Submit</button>
				<a href="index.php" class="btn btn-danger">Kembali</a>
			</div>
		</form>
		
	</div>
</body>
</html>