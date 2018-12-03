<?php

include("koneksi.php");

if(isset($_POST['submit'])){

    // filter data yang diinputkan
    $namabelakang = filter_input(INPUT_POST, 'namabelakang', FILTER_SANITIZE_STRING);
    $namadepan = filter_input(INPUT_POST, 'namadepan', FILTER_SANITIZE_STRING);
    $peminatan = filter_input(INPUT_POST, 'peminatan', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $nohp = filter_input(INPUT_POST, 'nohp', FILTER_SANITIZE_STRING);


    // menyiapkan query
    $sql = "INSERT INTO member (level, namabelakang, namadepan, peminatan, email, password, nohp) 
            VALUES (0, :namabelakang, :namadepan, :peminatan, :email, :password, :nohp)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":namabelakang" => $namabelakang,
        ":namadepan" => $namadepan,
        ":password" => $password,
        ":email" => $email,
        ":peminatan" => $peminatan,
        ":nohp" => $nohp
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman registersukses
    if($saved) header("Location: showuser.php");
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran user</title>
</head>

<body>
	<header>
		<h3>Pendaftaran user</h3>
	</header>
	
	<form action="" method="POST">
		
		<div class="form-group">
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col"><input class="form-control" type="text" name="namabelakang" placeholder="Nama belakang"></div>
                        <div class="col"><input class="form-control" type="text" name="namadepan" placeholder="Nama depan"></div>
                    </div>
                </div>
                <div class="form-group">
                    <p>Peminatan</p><select class="form-control" name="peminatan">
                        <option value="Saintek">Saintek</option>
                        <option value="Soshum">Soshum</option>
                    </select>
                </div>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Alamat email"></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Kata sandi"></div>
                <div class="form-group"><input class="form-control" type="tel" name="nohp" placeholder="Nomor telepon"></div>
                <div class="form-group"><button class="btn btn-primary btn-block" role="button" type="submit" name="submit" style="background-color:rgb(147,147,147);" href="#">Tambah User</button></div>
            </div>
        </div>
    </div>

	</form>
	
	</body>
</html>
