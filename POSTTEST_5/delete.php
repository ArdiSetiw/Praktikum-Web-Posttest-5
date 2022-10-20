<?php
    require "connect.php";

    $id = $_GET['id_mobil'];

    $result = mysqli_query($conn, "DELETE FROM data_mobil WHERE id_mobil=$id");

    if ($result){
        echo "
        <script> 
            alert ('data berhasil dihapus');
            document.location.href = 'admin.php';
        </script>";
    } 
?>