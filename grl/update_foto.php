<?php 
include "koneksi.php";
session_start();

$judulfoto = $_POST['judulfoto'];
$deskripsifoto = $_POST['deskripsifoto'];
$albumid = $_POST['albumid'];

// Periksa apakah ada file yang diunggah
if (!empty($_FILES['lokasifile']['name'])) {
    $filename = $_FILES['lokasifile']['name'];
    $filetmp = $_FILES['lokasifile']['tmp_name'];
    $filesize = $_FILES['lokasifile']['size'];
    $filetype = $_FILES['lokasifile']['type'];
    $fileext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    
    // Lokasi penyimpanan file
    $target_dir = "gambar/";
    $target_file = $target_dir . basename($filename);

    // Tentukan ekstensi file yang diperbolehkan
    $allowed_ext = array('png', 'jpg', 'jpeg', 'gif');

    // Periksa ekstensi file
    if (!in_array($fileext, $allowed_ext)) {
        echo "Ekstensi file tidak diizinkan.";
        exit;
    }

    // Periksa ukuran file
    if ($filesize > 1044070) {
        echo "Ukuran file terlalu besar.";
        exit;
    }

    // Pindahkan file ke direktori tujuan
    if (!move_uploaded_file($filetmp, $target_file)) {
        echo "Gagal mengunggah file.";
        exit;
    }

    // Gunakan variabel $filename (nama file baru) untuk update database
    $lokasifile = $filename;
} else {
    // Jika tidak ada file yang diunggah, gunakan nilai yang ada di database
    $lokasifile = '';
}

// Lakukan update data foto ke database
$query = "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', lokasifile='$lokasifile', albumid='$albumid'";
if(mysqli_query($conn, $query)) {
    header("location:foto.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

?>
