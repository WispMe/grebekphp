<?php

include("koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['submit'])){
	
	// ambil data dari formulir
	$id = $_POST['id'];
	$namabelakang = $_POST['namabelakang'];
	$namadepan = $_POST['namadepan'];
	$pm = $_POST['peminatan'];
	$email = $_POST['email'];
	$nohp = $_POST['nohp'];
	
	// buat query update
	$sql = "UPDATE member SET namabelakang='$namabelakang', namadepan='$namadepan', peminatan='$pm', email='$email', nohp='$nohp' WHERE id=$id";
	$query = mysqli_query($con, $sql);
	
	// apakah query update berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman list-siswa.php
		header('Location: showusera.php');
	} else {
		// kalau gagal tampilkan pesan
		die("Gagal menyimpan perubahan...");
	}
	
	
} else {
	die("Akses dilarang...");
}

?>
