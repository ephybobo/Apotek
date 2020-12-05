<?php

// Start session
session_start();

// include file koneksi.php
include "koneksi.php";

// cek data input dengan data database pada index.php
if (isset($_POST['login'])) {
    // mengambil nilai value username dan password yang di-input
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);
    // mencocokan data username dan password pada tabel data_user
    $query = mysqli_query ($conn, "SELECT * FROM data_user WHERE username = '$username' AND password='$password'");

    // apakah  datanya match (?)
    if (mysqli_num_rows($query) !== 0) {
        // membuat session bedasarkan status jabatan
        $get = mysqli_fetch_array($query);
        $_SESSION['username'] = $get['username']; // Set session untuk username (simpan username di session)
        $_SESSION['nama_lengkap'] = $get['nama_lengkap'];
        $_SESSION['kode_user'] = $get['kode_user']; 
        $_SESSION['jabatan'] = $get['jabatan']; // Set session untuk nama_lengkap (simpan nama di session)
        setcookie("message","delete",time()-1); // Kita delete cookie message

            //on the second page you check if that session is true, else redirect to the login page  
            if( $_SESSION['username'] = true ) {
                echo "<script type='text/javascript'>alert('Login berhasil, Selamat datang $username'); location.href=\"main.php\";</script>";
            }
            else
            //redirect to the login page
            echo "<script type='text/javascript'>alert('Akses anda ditolak, Harap login terlebih dahulu''); location.href=\"../index.php\";</script>";
    
    } else
        echo "<script type='text/javascript'>alert('Login Gagal, Username atau Password Salah!'); location.href=\"../index.php\";</script>";
} 
// jika berusaha mengakses url login.php maka akses ditolak 
// http://localhost/apotek-widigdo/php/login.php
else if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
    header("location: ../index.php"); // Kita Redirect ke halaman index.php karena belum login
  }

?>