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
$sql = 'SELECT pesanan.id, pesanan.order_nama, pesanan.tanggal, pesanan.status, buku.nama_buku FROM pesanan INNER JOIN buku ON pesanan.id_buku = buku.id';
$result = mysqli_query($con, $sql);
 ?>
<h2> Select the items: </h2>
 <table id="t01">
 <tr>
 	<th>Id</th>
 	<th>Nama Pemesan</th>
 	<th>Tanggal</th>
 	<th>Nama Buku</th>
 	<th>Status</th>
 </tr>
 	<?php while($product = mysqli_fetch_object($result)) { ?> 
	<tr>
		<td> <?php echo $product->id; ?> </td>
		<td> <?php echo $product->order_nama; ?> </td>
		<td> <?php echo $product->tanggal; ?> </td>
		<td> <?php echo $product->nama_buku; ?> </td>
		<td> <?php echo $product->status; ?> </td>
	</tr>
	<?php } ?>
 </table>

</body>
</html>