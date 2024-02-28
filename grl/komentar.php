<?php 
    include "koneksi.php";
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Komentar</title>
</head>
<body>
    <h1>Halaman Komentar</h1>
    <p>Selamat Datang <b><?=$_SESSION['namalengkap']?></b> </p>

    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul> 
    
    <form action="tambah_komentar.php" method="post">
        <?php 
            $fotoid = $_GET['fotoid'];
            $sql=mysqli_query($conn,"SELECT * FROM foto WHERE fotoid='$fotoid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="fotoid" value="<?=$data['fotoid']?>" hidden>
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judulfoto" value="<?=$data['judulfoto']?>"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsifoto" value="<?=$data['deskripsifoto']?>"></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><img src="gambar/<?=$data['lokasifile']?>" width="200px"></td>
            </tr>
            <tr>
                <td>Komentar</td>
                <td><input type="text" name="isikomentar"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
        <?php 
            }
        ?>
    </form>
    <table width="100%" border="1" cellpadding=5 cellspacing=0>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Komentar</th>
            <th>Tanggal</th>
        </tr>
        <?php 
            $fotoid = $_GET['fotoid'];
            $sql=mysqli_query($conn,"SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid='$fotoid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
           <tr>
              <td><?=$data['komentarid']?></td>
              <td><?=$data['namalengkap']?></td>
              <td><?=$data['isikomentar']?></td>
              <td><?=$data['tanggalkomentar']?></td>
           </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>
