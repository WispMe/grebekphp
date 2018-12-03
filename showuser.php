<?php include("koneksi.php"); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran Mahamember Baru | Tel-U</title>
</head>

<body>
	<header>
		<h3>member yang sudah mendaftar</h3>
	</header>

	<nav>
		<a href="adduser.php">[+] Tambah Baru</a>
	</nav>

	<br>

	<table border="1">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Belakang</th>
			<th>Nama Depan</th>
			<th>Peminatan</th>
			<th>Email</th>
			<th>No Hp</th>
			<th>Tindakan</th>
		</tr>
	</thead>
	<tbody>

		<?php
		$sql = "SELECT * FROM member";
		$query = mysqli_query($con, $sql);

		while($member = mysqli_fetch_array($query)){
			echo "<tr>";
			echo "<td>".$member['ID']."</td>";
			echo "<td>".$member['namabelakang']."</td>";
			echo "<td>".$member['namadepan']."</td>";
			echo "<td>".$member['peminatan']."</td>";
			echo "<td>".$member['email']."</td>";
			echo "<td>".$member['nohp']."</td>";
			echo "<td>";
			echo "<a href='edituser.php?id=".$member['ID']."'>Edit</a> | ";
			echo "<a href='hapus.php?id=".$member['ID']."'>Hapus</a>";
			echo "</td>";

			echo "</tr>";
		}
		?>

		<br>
		<a href="adminhome.php" title="">Kembali</a>
	</tbody>
	</table>

	<p>Total: <?php echo mysqli_num_rows($query) ?></p>

	</body>
</html>
