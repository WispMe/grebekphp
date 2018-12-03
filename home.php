<?php 

require_once("auth.php");
require 'koneksi.php';

$namabelakang = $_SESSION["user"]["namabelakang"];
$namadepan = $_SESSION["user"]["namadepan"];
$nama = $namabelakang . ' ' . $namadepan;


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>WELCOME!</h1>
<div class="card-body text-center">
	<h3><?php echo $namabelakang ?><a> </a><?php echo $namadepan ?></h3>
	<p><?php echo $_SESSION["user"]["email"] ?></p>
	<p><a href="logout.php">Logout</a></p>
</div>
<?php 
require 'koneksi.php';
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
 	<th>Kuantitas</th>
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
		<td> <a name='pinjam' href="home.php?id= <?php echo $product->id; ?> &action=add">Pinjam</a> </td>
	</tr>
	<?php } ?>
 </table>

 <?php 
// Start the session
require 'koneksi.php';
require 'item.php';

if(isset($_GET['id']) && !isset($_POST['update']))  { 
	$sql = "SELECT * FROM buku WHERE id=".$_GET['id'];
	$result = mysqli_query($con, $sql);
	$product = mysqli_fetch_object($result); 
	$item = new Item();
	$item->id = $product->id;
	$item->nama_buku = $product->nama_buku;
	$item->penerbit = $product->penerbit;
	$item->tahun_terbit = $product->tahun_terbit;
	$item->jenis = $product->jenis;
    $iteminstock = $product->quantity;
	$item->quantity = 1;
	// Check product is existing in cart
	$index = -1;
	$cart = unserialize(serialize($_SESSION['cart'])); // set $cart as an array, unserialize() converts a string into array
	for($i=0; $i<count($cart);$i++)
		if ($cart[$i]->id == $_GET['id']){
			$index = $i;
			break;
		}
		if($index == -1) 
			$_SESSION['cart'][] = $item; // $_SESSION['cart']: set $cart as session variable
		else {
			
			if (($cart[$index]->quantity) < $iteminstock)
				 $cart[$index]->quantity ++;
			     $_SESSION['cart'] = $cart;
		}
}
// Delete product in cart
if(isset($_GET['index']) && !isset($_POST['update'])) {
	$cart = unserialize(serialize($_SESSION['cart']));
	unset($cart[$_GET['index']]);
	$cart = array_values($cart);
	$_SESSION['cart'] = $cart;
}
// Update quantity in cart
if(isset($_POST['update'])) {
  $arrQuantity = $_POST['quantity'];
  $cart = unserialize(serialize($_SESSION['cart']));
  for($i=0; $i<count($cart);$i++) {
     $cart[$i]->quantity = $arrQuantity[$i];
  }
  $_SESSION['cart'] = $cart;
}
?>
<h2> Items in your cart: </h2> 
<form  action='' method="POST">
<table id="t01">
<tr>
	<th>Option</th>
	<th>Id</th>
	<th>Nama Buku</th>
	<th>Penerbit</th>
</tr>

<?php 
  //  if (isset($_POST['pinjam'])) {
     		# code...
     	$cart = unserialize(serialize($_SESSION['cart']));
 	 	$s = 0;
 	 	$index = 0;
 		for($i=0; $i<count($cart); $i++){
 ?>	
   <tr>
    	<td><a href="home.php?index=<?php echo $index; ?>" onclick="return confirm('Are you sure?')" >Delete</a> </td>
   		<td> <?php echo $cart[$i]->id; ?> </td>
   		<td> <?php echo $cart[$i]->nama_buku; ?> </td>
   		<td> <?php echo $cart[$i]->penerbit; ?> </td>
   		
   
   </tr>
 	<?php 
	 	$index++;
 	} 
 //}?>
</table>
<input class="form-control" type="submit" name="pesan" style="background-color:rgb(147,147,147);" value="Pesan"></div>
</form>
<br>


<?php 
if(isset($_GET["id"]) || isset($_GET["index"])){
 header('Location: home.php');
} 

?>

<?php  

if (isset($_POST['pesan'])) {
	# code...
	$cart = unserialize(serialize($_SESSION['cart']));
	for($i=0; $i<count($cart);$i++) {
	$sql = "INSERT INTO pesanan (order_nama, id_buku, tanggal, status) VALUES ('$nama', '".$cart[$i]->id."', '".date('Y-m-d')."', '0')";
	$query = mysqli_query($con, $sql);
	if( $query ) {
		// kalau berhasil alihkan ke halaman list-siswa.php
		header('Location: sukses.php');
	} else {
		// kalau gagal tampilkan pesan
		die("Gagal menyimpan perubahan...");
	}

	unset($_SESSION['cart']);
	}
}

?>
</body>
</html>