<?php
    include 'config.php';
    $id = $_GET['id'];

    $result = mysqli_query($conn, "DELETE FROM apartemen WHERE id_apart= '{$id}'");

    header('location: index.php');
?>