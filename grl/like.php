<?php
    include "koneksi.php";
    session_start();

    if(!isset($_SESSION['userid'])){
        // Jika pengguna tidak login, arahkan kembali ke halaman home
        header("location:home.php");
    } else {
        $fotoid = $_GET['fotoid'];
        $userid = $_SESSION['userid'];

        // Periksa apakah pengguna sudah memberikan like pada foto ini sebelumnya
        $sql = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");

        if(mysqli_num_rows($sql) == 1){
            // Jika pengguna sudah pernah memberikan like, maka hapus like tersebut
            mysqli_query($conn, "DELETE FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
            header("location:home.php");
        } else {
            // Jika pengguna belum memberikan like, tambahkan like
            $tanggallike = date("Y-m-d");
            mysqli_query($conn, "INSERT INTO likefoto VALUES('', '$fotoid', '$userid', '$tanggallike')");
            header("location:home.php");
        }
    }
?>
