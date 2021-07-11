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
 
	<form action="add_trs.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>ID Transaksi</td>
				<td><input type="text" name="id_trs"></td>
			</tr>
			<tr> 
				<td>ID penyewa</td>
				<td><input type="text" name="id_penyewa"></td>
			</tr>
			<tr>
				<td>Tanggal transaksi</td>
				<td><input type="text" name="tgl_trs"></td>
			</tr>
            <tr>
				<td>Total transaksi</td>
				<td><input type="text" name="total_trs"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="TAMBAHKAN"></td>
			</tr>
		</table>
	</form>
	
	<?php
 
 
	if(isset($_POST['Submit'])) {
		$id_trs = $_POST['id_trs'];
		$id_penyewa = $_POST['id_penyewa'];
		$tgl_trs = $_POST['tgl_trs'];
		$total_trs = $_POST['total_trs'];

		include("config.php");
		
		$result = mysqli_query($conn, "INSERT INTO trs_sewa(id_trs,id_penyewa,tgl_trs,total_trs) 
		VALUES('$id_trs','$id_penyewa','$tgl_trs','$total_trs')");
		
		echo "User added successfully. <a href='index.php'>View Users</a>";
	}
	?>
</body>
<?php include('footer.php');?>
</html>