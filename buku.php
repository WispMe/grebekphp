<?php

include("koneksi.php");
require_once("auth.php");
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
$sql = 'SELECT * FROM buku';
$result = mysqli_query($con, $sql);
 ?>
<h2> Select the items: </h2>
 <table id="t01">
 <tr>
 	<th>Id</th>
 	<th>Nama Buku</th>
 	<th>Penerbit</th>
 	<th>Tahun</th>
 	<th>Jenis</th>
 	<th>Quantity</th>
 	<th>Tindakan</th>
 </tr>
 	<?php while($product = mysqli_fetch_object($result)) { ?> 
	<tr>
		<td> <?php echo $product->id; ?> </td>
		<td> <?php echo $product->nama_buku; ?> </td>
		<td> <?php echo $product->penerbit; ?> </td>
		<td> <?php echo $product->tahun_terbit; ?> </td>
		<td> <?php echo $product->jenis; ?> </td>
		<td> <?php echo $product->quantity; ?> </td>
	</tr>
	<?php } ?>
 </table>

 <h3>Form Tambah Buku</h3>
 <form action="addbuku.php" method="POST">
		
		<fieldset>
		
		<p>
			<label for="nama_buku">Nama Buku: </label>
			<input type="text" name="nama_buku" placeholder="Nama Buku" />
		</p>
		<p>
			<label for="penerbit">Penerbit: </label>
			<input type="text" name="penerbit" placeholder="Nama Penerbit" />
		</p>
		<p>
			<label for="tahun_terbit">Tahun Terbit: </label>
			<input type="text" name="tahun_terbit" placeholder="Tahun Terbit" />
		</p>
		<p>
			<label for="jenis">Jenis: </label>
			<input type="text" name="jenis" placeholder="Jenis" />
		</p>
		<p>
			<input type="submit" value="submit" name="submit" />
		</p>
		
		</fieldset>
	
	</form>

</body>
</html>