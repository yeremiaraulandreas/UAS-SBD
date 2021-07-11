<?php

include("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id_trs'];
	
	$id_trs=$_POST['id_trs'];
	$id_penyewa=$_POST['id_penyewa'];
	$tgl_trs=$_POST['tgl_trs'];
    $total_trs=$_POST['total_trs'];
		
	// update user dataa
	$result = mysqli_query($conn, 
	"UPDATE trs_sewa SET id_trs='$id_trs',id_penyewa='$id_penyewa',tgl_trs='$tgl_trs',total_trs='$total_trs' 
	WHERE id_trs=$id");

    header("Location: index.php");
}
?>

<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="styleubah.css" rel="stylesheet" type="text/css" />
    <title>Ubah Data Mobil</title>
</head>

<?php

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM trs_sewa WHERE id_trs=$id");
 
while($user_data = mysqli_fetch_array($result))
{
	$id_trs = $user_data['id_trs'];
	$id_penyewa = $user_data['id_penyewa'];
	$tgl_trs = $user_data['tgl_trs'];
    $total_trs = $user_data['total_trs'];
}
?>
<?php include('header1.php');?>
 
<body>
	<a href="index.php">KEMBALI KE MENU</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="edit_trs.php">
		<table border="0">
			<tr> 
				<td>ID Transaksi</td>
				<td><input type="text" name="id_trs" value=<?php echo $id_trs;?>></td>
			</tr>
			<tr> 
				<td>ID Penyewa</td>
				<td><input type="text" name="id_penyewa" value=<?php echo $id_penyewa;?>></td>
			</tr>
			<tr> 
				<td>Tanggal Transaksi</td>
				<td><input type="text" name="tgl_trs" value=<?php echo $tgl_trs;?>></td>
			</tr>
			<tr>   
            <td>Total</td>
				<td><input type="text" name="total_trs" value=<?php echo $total_trs;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
<?php include('footer.php');?>
</html>