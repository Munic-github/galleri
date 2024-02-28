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
    <link rel="shortcut icon" href="../hero/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Halaman Foto</title>
</head>
<body>
    <h1>Halaman Foto</h1>
    <p>Selamat Datang <b><?=$_SESSION['namalengkap']?></b> </p>

    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul> 
    
     <!-- Tombol untuk melihat komentar -->
  <button class="btn btn-secondary btn-sm mt-3" data-bs-toggle="collapse" data-bs-target="#komentarCollapse" aria-expanded="false" aria-controls="komentarCollapse">
            <i class="fas fa-comments"></i> Tambah foto
        </button>

        <!-- Kolaps komentar -->
        <div class="collapse mt-3" id="komentarCollapse">
            <div class="mt-4">
            <div class="border p-2 mb-3">
            <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judulfoto"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsifoto"></td>
            </tr>
            <tr>
                <td>Lokasi File</td>
                <td><input type="file" name="lokasifile"></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>
                    <select name="albumid">
                    <?php 
                        include "koneksi.php";
                        $userid=$_SESSION['userid'];
                        $sql=mysqli_query($conn,"select * from album where userid='$userid'");
                        while($data=mysqli_fetch_array($sql)){
                    ?>
                      <option value="<?=$data['albumid']?>"><?=$data['namaalbum']?></option>

                    <?php 
                      }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
                    </div>
                </div>
           </div>
       <br></br>
       <div class="container mt-3">
       <table class="table">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Tanggal Unggah</th>
            <th>Lokasi File</th>
            <th>Album</th>
            <th>Disukai</th>
            <th>Aksi</th>
        </tr>
        <?php 
          include "koneksi.php";

          $userid=$_SESSION['userid'];
          $sql=mysqli_query($conn,"select * from foto,album where foto.userid='$userid' and foto.
          albumid=album.albumid");
          while($data=mysqli_fetch_array($sql)){
        ?>
  
         <tr>
            <td><?=$data['fotoid']?></td>
            <td><?=$data['judulfoto']?></td>
            <td><?=$data['deskripsifoto']?></td>
            <td><?=$data['tanggalunggah']?></td>
            <td>
                <img src="gambar/<?=$data['lokasifile']?>" width="200px">
            </td>
            <td><?=$data['namaalbum']?></td>
            <td>
                   <?php
                        $fotoid=$data['fotoid'];
                        $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                        echo mysqli_num_rows($sql2);
                    ?>
            </td>
            <td>
                <a href="hapus_foto.php?fotoid=<?=$data['fotoid']?>">Hapus</a>
                <a href="edit_foto.php?fotoid=<?=$data['fotoid']?>">Edit</a>
            </td>
         </tr>
   
       <?php
           }
        ?>
     </table>
        </div>
</body>
</html>