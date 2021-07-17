<?php include('header.php');?>
 
<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="styletambah.css" rel="stylesheet" type="text/css" />
    <title>Tambah Data Mobil</title>
</head> 

<body>
	<a href="index.php">KEMBALI KE MENU</a>
	<br/><br/>
 
	<form action="add_apart.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>ID Apartement</td>
				<td><input type="text" name="id_apart"></td>
			</tr>
			<tr> 
				<td>Unit</td>
				<td><input type="text" name="unit_apart"></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><input type="text" name="harga"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="TAMBAHKAN"></td>
			</tr>
		</table>
	</form>
	
	<?php
 
 
	if(isset($_POST['Submit'])) {
	
		$unit_apart = $_POST['unit_apart'];
		$harga = $_POST['harga'];
		
		include("config.php");
		
		$result = mysqli_query($conn, "INSERT INTO apartemen(unit_apart,harga) 
		VALUES('$unit_apart','$harga')");
		
		echo "User added successfully. <a href='index.php'>View Users</a>";
	}
	?>
</body>
<?php include('footer.php');?>
</html>
