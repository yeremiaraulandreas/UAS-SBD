<?php
    include 'config.php';
    $id = $_GET['id'];

    $result = mysqli_query($conn, "DELETE FROM penyewa WHERE id_penyewa= '{$id}'");

    header('location: index.php');
?>