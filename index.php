<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAHOGANI THE OASIS</title>
</head>

<body>
<header>
    <h1 style="display:flex; justify-content: center;">Tabel Data Apartement</h1>
</header>
    <div class="header">
        <div class="main">
           
            <a href="logout.php">LOGOUT</a>
        </div>
    </div>
        <h2>Tabel apartement</a></h2>
        <a href="add_apart.php">TAMBAH DATA BARU</a><br/><br/>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID Apartment</th>
                    <th>Unit </th>
                    <th>Harga</th>
                </tr>
            </thead>
            
            <?php 
            function rupiah($angka){
	
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                return $hasil_rupiah;
             
            }            
            include 'config.php';
            $sql = 'SELECT * FROM apartemen';
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query))
            {
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $row['id_apart']?></td>
                        <td><?php echo $row['unit_apart']?></td>
                        <td><?php echo $row['harga']?></td>
                        <td><a href="edit_apart.php?id=<?= $row['id_apart']; ?>"><button>UBAH</button></a> |
                    <a href="hapus_apart.php?id=<?= $row['id_apart']; ?>"><button>HAPUS</button></a></td>
                    </tr>
                </tbody>
                <?php
            }  
            ?>          
        </table>
        
        <h2>Tabel Penyewa</a></h2>
        <a href="add_penyewa.php">TAMBAH DATA BARU</a><br/><br/>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Nama Penyewa</th>
                    <th>ID apart</th>
                    <th>Tanggal check in</th>
                    <th>Tanggal Check out</th>
                </tr>
            </thead>
            <?php 
            include 'config.php';
            $sql = 'SELECT * FROM penyewa';
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query))
            {
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $row['nm_penyewa']?></td>
                        <td><?php echo $row['id_apart']?></td>
                        <td><?php echo date('d/m/y', strtotime($row['tgl_chekin']))?></td>
                        <td><?php echo date('d/m/y', strtotime($row['tgl_checkout']))?></td>
                        <td><a href="edit_penyewa.php?id=<?= $row['id_penyewa']; ?>"><button>UBAH</button></a> |
                    <a href="hapus_penyewa.php?id=<?= $row['id_penyewa']; ?>"><button>HAPUS</button></a></td>
                    </tr>
                </tbody>
                <?php
            }   
            ?>            
        </table>
    
        <h2>Tabel Transaksi</a></h2>
        <a href="add_trs.php">TAMBAH DATA BARU</a>&nbsp; ||&nbsp; <a href="cetak.php">CETAK</a> <br/><br/>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID Transaksi</th>
                    <th>ID penyewa</th>
                    <th>Tanggal transaksi</th>
                    <th>Total</th>
                </tr>
            </thead>
            <?php 
            include 'config.php';
            $sql = 'SELECT * FROM trs_sewa';
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query))
            {
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $row['id_trs']?></td>
                        <td><?php echo $row['id_penyewa']?></td>
                        <td><?php echo date('d/m/y', strtotime($row['tgl_trs']))?></td>
                        <td><?php echo $row['total_trs']?></td>
                        <td><a href="edit_trs.php?id=<?= $row['id_trs']; ?>"><button>UBAH</button></a> |
                    <a href="hapus_trs.php?id=<?= $row['id_trs']; ?>"><button>HAPUS</button></a></td>
                    </tr>
                </tbody>
                <?php
            }
                ?>
        </table>

        <br>
        <br>
    <footer>
        <p>&copy; 2021 - Universitas pelita bangsa Fakultas Teknik Informatika</p>
    </footer
</body>
</html>