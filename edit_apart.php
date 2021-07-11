<?php

include("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id_apart'];
	
	$id_apart=$_POST['id_apart'];
	$unit_apart=$_POST['unit_apart'];
	$harga=$_POST['harga'];
		
	// update user dataa
	$result = mysqli_query($conn, 
	"UPDATE apartemen SET id_apart='$id_apart',unit_apart='$unit_apart',harga='$harga' 
	WHERE id_apart=$id");

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

$result = mysqli_query($conn, "SELECT * FROM apartemen WHERE id_apart=$id");
 
while($user_data = mysqli_fetch_array($result))
{
	$id_apart = $user_data['id_apart'];
	$unit_apart = $user_data['unit_apart'];
	$harga = $user_data['harga'];
}
?>
<?php include('header1.php');?>
 
<body>
	<a href="index.php">KEMBALI KE MENU</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="edit_apart.php">
		<table border="0">
			<tr> 
				<td>ID apartement</td>
				<td><input type="text" name="id_apart" value=<?php echo $id_apart;?>></td>
			</tr>
			<tr> 
				<td>Unit apartement</td>
				<td><input type="text" name="unit_apart" value=<?php echo $unit_apart;?>></td>
			</tr>
			<tr> 
				<td>Harga</td>
				<td><input type="text" name="harga" value=<?php echo $harga;?>></td>
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