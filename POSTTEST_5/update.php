<?php
    require "connect.php";

    $id = $_GET['id_mobil'];

    $result = mysqli_query($conn, "SELECT * FROM data_mobil WHERE id_mobil=$id");

    $mbl = [];

    while ($row = mysqli_fetch_assoc($result)){
        $mbl[] = $row;
    }

    $mbl = $mbl[0];

    if (isset($_POST['update'])){
        $merek = $_POST['merek'];
        $model = $_POST['model'];
        $harga = $_POST['harga'];

        $sql = "UPDATE data_mobil  SET merek='$merek',model='$model', harga='$harga' WHERE id_mobil=$id";

        $result = mysqli_query($conn, $sql);

        if ($result){
            echo "
            <script> 
                alert ('data berhasil diupdate');
                document.location.href = 'admin.php';
            </script>";
        } else {
            echo "
            <script> 
                alert ('gagal diupdate');
                document.location.href = 'update.php';
            </script>";
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        <?php include "style.css" ?>
    </style>
    <script>
        <?php include "javascript.js" ?>
    </script>
    <script src="JavaScript.js"></script>
    <title>Document</title>
</head>
<body id="bg_abt" >
    <!-- Navigasi Bar -->
    <header id="container">
        <div id="judul">
            <p>MOBIL AUTOMOTIVE</p>
            <span>Admin</span>
        </div>
        <div id="nav_bar">
            <nav class="navbar-custom">
                <ul>
                    <li><a href="admin.php">Home</a></li>
                    <li>
                        <div class="theme-switch-wrapper">                    
                            <label class="theme-switch" for="checkbox">
                              <input type="checkbox" id="checkbox" value="check" onclick="theme_ab()"/>                        
                              <div class="slider round"></div>                    
                            </label>                
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="awwa">
        <form action="" method="POST" >
            <section class="cf">
            <table id="tab_add">
                <tr class="awu">
                    <th style="font-size: 25px;">Update Car</th>
                </tr>   
                <tr>
                    <td class='form_input'>Merek</td>
                </tr>
                <tr>
                    <td align=center>
                        <input class ='add' type="text" name="merek" placeholder="Merek Mobil" autocomplete="off" require>
                    </td>
                </tr>
                <tr>
                    <td class='form_input'>Model</td>
                </tr>
                <tr>
                    <td align=center>
                        <input class ='add' type="text" name="model" placeholder="Model Mobil" autocomplete="off" require>
                    </td>
                </tr>
                <tr>
                    <td class='form_input'>Harga</td>
                </tr>
                    <td align=center>
                        <input class ='add' type="number" name="harga" placeholder="Harga Mobil" autocomplete="off" require>
                    </td>
                <tr>
                    <td align=center><input type='submit' name='update' value='Update' id="feed-container" ></td>
                </tr>
            </table>
            </section>
        </form>
    </div>
    
</body>