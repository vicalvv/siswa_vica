<?php 
// Menghubungkan file ini dengan file database
include 'koneksi.php';

// Mengambil data dari form lalu ditampung didalam variabel
$nama_lengkap = $_POST['nama_lengkap'];
$kelas = $_POST['kelas'];
$alamat = $_POST['alamat'];
$foto_nama = $_FILES['pas_foto']['name'];
$foto_size = $_FILES['pas_foto']['size'];

// Mengecek apakah file lebih besar 2 MB atau tidak
if ($foto_size > 2097152) {
	// Jika File lebih dari 2 MB maka akan gagal mengupload File
	header("location:insert.php?pesan=size");
}else{

	// Mengecek apakah Ada file yang diupload atau tidak
	if ($foto_nama != "") {

		// Ekstensi yang diperbolehkan untuk diupload boleh diubah sesuai keinginan
		$ekstensi_izin = array('png','jpg','jepg');
		// Memisahkan nama file dengan Ekstensinya
		$pisahkan_ekstensi = explode('.', $foto_nama); 
		$ekstensi = strtolower(end($pisahkan_ekstensi));
		// Nama file yang berada di dalam direktori temporer server
		$file_tmp = $_FILES['pas_foto']['tmp_name'];   
		// Membuat angka/huruf acak berdasarkan waktu diupload
		$tanggal = md5(date('Y-m-d h:i:s'));
		// Menyatukan angka/huruf acak dengan nama file aslinya
		$foto_nama_new = $tanggal.'-'.$foto_nama; 

		// Mengecek apakah Ekstensi file sesuai dengan Ekstensi file yg diuplaod
		if(in_array($ekstensi, $ekstensi_izin) === true)  {
			// Memindahkan File kedalam Folder "FOTO"
            move_uploaded_file($file_tmp, 'foto/'.$foto_nama_new);

            // Query untuk memasukan data kedalam table SISWA
            $query = mysqli_query($koneksi, "INSERT INTO siswa VALUES ('','$nama_lengkap', '$kelas', '$alamat', '$foto_nama_new')");

            // Mengecek apakah data gagal diinput atau tidak
            if($query){
            	header("location:insert.php?pesan=berhasil");
            } else {
                header("location:insert.php?pesan=gagal");
            }

        } else { 
        	// Jika ekstensinya tidak sesuai dengan apa yg kita tetapkan maka error
        	header("location:insert.php?pesan=ekstensi");        }

    }else{

    	// Apabila tidak ada file yang diupload maka akan menjalankan code dibawah ini
    	 $query = mysqli_query($koneksi, "INSERT INTO siswa(siswa_nama, siswa_kelas, siswa_alamat) VALUES ('$nama_lengkap', '$kelas', '$alamat')");

            // Mengecek apakah data gagal diinput atau tidak
            if($query){
            	header("location:insert.php?pesan=berhasil");
            } else {
                header("location:insert.php?pesan=gagal");
            }

    }

}
?>