<?php

include("config.php");

if(isset($_POST['update']))
{	
    
	
	$id_penyewa=$_POST['id_penyewa'];
	$id_apart=$_POST['id_apart'];
	$tgl_in=$_POST['tgl_in'];
    $tgl_out=$_POST['tgl_out'];
		
	// update user dataa
	$result = mysqli_query($conn, 
	"UPDATE penyewa SET id_penyewa='$id_penyewa',id_apart='$id_apart',tgl_chekin='$tgl_in',tgl_checkout='$tgl_out' 
	WHERE id_penyewa=$id_penyewa");

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

$result = mysqli_query($conn, "SELECT * FROM penyewa WHERE id_penyewa=$id");
 
while($user_data = mysqli_fetch_array($result))
{
	$id_penyewa = $user_data['id_penyewa'];
	$id_apart = $user_data['id_apart'];
	$tgl_in = $user_data['tgl_chekin'];
    $tgl_out = $user_data['tgl_checkout'];
}
?>
<?php include('header1.php');?>
 
<body>
	<a href="index.php">KEMBALI KE MENU</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="edit_penyewa.php">
		<table border="0">
			<tr> 
				<td>ID Penyewa</td>
				<td><input type="text" name="id_penyewa" readonly value=<?php echo $id_penyewa;?>></td>
			</tr>
			<tr> 
				<td>ID Apart</td>
				<td><input type="text" name="id_apart" value=<?php echo $id_apart;?>></td>
			</tr>
			<tr> 
				<td>Tanggal Check In</td>
				<td><input type="date" name="tgl_in" value=<?php echo $tgl_in;?>></td>
			</tr>
			<tr>   
                <td>Tanggal Check Out</td>
				<td><input type="date" name="tgl_out" value=<?php echo $tgl_out;?>></td>
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