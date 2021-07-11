<?php include('header.php');?>
 
<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="styletambah.css" rel="stylesheet" type="text/css" />
    <title>Tambah Data</title>
</head> 

<body>
	<a href="index.php">KEMBALI KE MENU</a>
	<br/><br/>
 
	<form action="add_penyewa.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>ID penyewa</td>
				<td><input type="text" name="id_penyewa"></td>
			</tr>
			<tr> 
				<td>ID apart</td>
				<td><input type="text" name="id_apart"></td>
			</tr>
			<tr>
				<td>Tanggal Check in</td>
				<td><input type="text" name="tgl_chekin"></td>
			</tr>
            <tr>
				<td>Tanggal Check out</td>
				<td><input type="text" name="tgl_checkout"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="TAMBAHKAN"></td>
			</tr>
		</table>
	</form>
	
	<?php
 
 
	if(isset($_POST['Submit'])) {
		$id_penyewa = $_POST['id_penyewa'];
		$id_apart = $_POST['id_apart'];
		$tgl_chekin = $_POST['tgl_chekin'];
		$tgl_checkout= $_POST['tgl_checkout'];

		include("config.php");
		
		$result = mysqli_query($conn, "INSERT INTO penyewa(id_penyewa,id_apart,tgl_chekin,tgl_checkout) 
		VALUES('$id_penyewa','$id_apart','$tgl_chekin','$tgl_checkout')");
		
		echo "User added successfully. <a href='index.php'>View Users</a>";
	}
	?>
</body>
<?php include('footer.php');?>
</html>