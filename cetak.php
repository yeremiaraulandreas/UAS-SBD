<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA LAPORAN </title>
</head>
<body>

	<center>

		<h2>DATA LAPORAN TRANSAKSI </h2>
		<h4>Mahogany The Oasis</h4>

	</center>

	<?php 
	   function rupiah($angka){
	
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                return $hasil_rupiah;
             
            }  
	include 'config.php';
	?>
    <hr><br>
	<table border="1" style="width: 60%" align="center">
		<tr>
			<th width="1%">No</th>
			<th>Nama Penyewa</th>
            <th>Tanggal Transaksi</th>
			<th width="5%">Total Transaksi</th>
		</tr>
		<?php 
		$no = 1;
		$query = mysqli_query($conn, "SELECT * FROM trs_sewa INNER JOIN penyewa ON trs_sewa.id_penyewa=penyewa.id_penyewa");
		if (!$query) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
        }
		$total = 0;
         foreach ($query as $data) {
			 $total += $data['total_trs'];
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td align="center"><?php echo $data['nm_penyewa']; ?></td>
			<td align="center" width="25%"><?php echo $data['tgl_trs']; ?></td>
            <td align="center" width="40%"><?php echo rupiah($data['total_trs']) ?></td>
		</tr>
			<?php 
		}
		?>
		<tr>
			<td colspan="3">Total Pembayaran :</td>
			<td align="center"><?php echo rupiah($total) ?></td>
		</tr>
	
	</table>

	<script>
		window.print();
	</script>

</body>
</html>