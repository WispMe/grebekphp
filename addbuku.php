<?php  
require_once("koneksi.php");

if(isset($_POST['submit'])){

    // filter data yang diinputkan
    $nama_buku = filter_input(INPUT_POST, 'nama_buku', FILTER_SANITIZE_STRING);
    $penerbit = filter_input(INPUT_POST, 'penerbit', FILTER_SANITIZE_STRING);
    $tahun_terbit = filter_input(INPUT_POST, 'tahun_terbit', FILTER_SANITIZE_STRING);
    // enkripsi password
    $jenis = filter_input(INPUT_POST, 'jenis', FILTER_SANITIZE_STRING);
    $nohp = filter_input(INPUT_POST, 'nohp', FILTER_SANITIZE_STRING);


    // menyiapkan query
    $sql = "INSERT INTO buku (nama_buku, penerbit, tahun_terbit, jenis) 
            VALUES (:nama_buku, :penerbit, :tahun_terbit, :jenis)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":nama_buku" => $nama_buku,
        ":penerbit" => $penerbit,
        ":jenis" => $jenis,
        ":tahun_terbit" => $tahun_terbit
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman registersukses
    if($saved) header("Location: buku.php");
}


?>