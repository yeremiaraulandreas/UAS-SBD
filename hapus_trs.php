<?php
    include 'config.php';
    $id = $_GET['id'];

    $result = mysqli_query($conn, "DELETE FROM trs_sewa WHERE id_trs= '{$id}'");

    header('location: index.php');
?>