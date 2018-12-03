<?php 

include("koneksi.php");

if( !isset($_GET['id']) ){
	// kalau tidak ada id di query string
	header('Location: showuser.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM member WHERE id=$id";
$query = mysqli_query($con, $sql);
$member = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
	die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Formulir Edit member | SMK Coding</title>
</head>

<body>
	<header>
		<h3>Formulir Edit member</h3>
	</header>
	
	<form action="proses-edit.php" method="POST">

		<input type="hidden" name="id" value="<?php echo $member['id'] ?>" />
		
		<div class="form-group">
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col"><input class="form-control" type="text" name="namabelakang" placeholder="Nama belakang" value="<?php echo $member['namabelakang'] ?>"></div>
                        <div class="col"><input class="form-control" type="text" name="namadepan" placeholder="Nama depan" value="<?php echo $member['namadepan'] ?>"></div>
                    </div>
                </div>
                <div class="form-group">
                    <p>Peminatan</p><select class="form-control" name="peminatan">
                    	<?php $pm = $member['peminatan']; ?>
                        <option value="Saintek" <?php echo ($pm == 'Saintek') ? "checked": "" ?>>Saintek</option>
                        <option value="Soshum" <?php echo ($pm == 'Soshum') ? "checked": "" ?>>Soshum</option>
                    </select>
                </div>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Alamat email" value="<?php echo $member['email'] ?>"></div>
                <div class="form-group"><input class="form-control" type="tel" name="nohp" placeholder="Nomor telepon" value="<?php echo $member['nohp'] ?>"></div>
                <div class="form-group"><button class="btn btn-primary btn-block" role="button" type="submit" name="submit" style="background-color:rgb(147,147,147);" href="#">Edit User</button></div>
                <a href="showuser.php">Kembali</a>
            </div>
        </div>
    </div>
	
	</form>
	
	</body>
</html>
