<?php 
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
    <title>Halaman Album</title>
</head>
<body>
    <h1>Halaman Album</h1>
    <p>Selamat Datang <b><?=$_SESSION['namalengkap']?></b> </p>

            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="album.php">Album</a></li>
                <li><a href="foto.php">Foto</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul> 
    
    <form action="tambah_album.php" method="post">
        <table>
            <tr>
                <td>Nama Album</td>
                <td><input type="text" name="namaalbum"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsi"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
       
     <table border="1" cellpandding=5 cellspacing=0>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Tanggal Dibuat</th>
            <th>Aksi</th>
        </tr>
        <?php 
          include "koneksi.php";

          $userid=$_SESSION['userid'];
          $sql=mysqli_query($conn,"select * from album where userid='$userid'");
          while($data=mysqli_fetch_array($sql)){
        ?>
  
         <tr>
            <td><?=$data['albumid']?></td>
            <td><?=$data['namaalbum']?></td>
            <td><?=$data['deskripsi']?></td>
            <td><?=$data['tanggaldibuat']?></td>
            <td>
                <a href="hapus_album.php?albumid=<?=$data['albumid']?>">Hapus</a>
                <a href="edit_album.php?albumid=<?=$data['albumid']?>">Edit</a>
            </td>
         </tr>
   
       <?php
           }
        ?>
     </table>

</body>
</html>