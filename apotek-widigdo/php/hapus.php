<?php
    // menghubungkan ke database
    include 'koneksi.php';

    // ====================================== HAPUS DATA USER ============================
    if (isset($_GET['user'])) {
        $kode_user=$_GET['kode_user'];
        $query_user="DELETE from data_user where kode_user='$kode_user'";
        if(mysqli_query($conn, $query_user)){
            header("location:main.php?page=user");
        }
    }

    // ====================================== HAPUS DATA OBAT ============================    
    else if (isset($_GET['obat'])) {
        $kode_obat=$_GET['kode_obat'];
        $query_obat="DELETE from data_obat where kode_obat='$kode_obat'";
        if(mysqli_query($conn, $query_obat)){
            header("location:main.php?page=obat");
        }
    }

    // ====================================== HAPUS DATA SUPPLIER ============================    
    else if (isset($_GET['supplier'])) {        
        $kode_supplier=$_GET['kode_supplier'];
        $query_supplier="DELETE from data_supplier where kode_supplier='$kode_supplier'";
        if(mysqli_query($conn, $query_supplier)){
            header("location:main.php?page=supplier");
        }
    }

    // ====================================== HAPUS DATA PEMBELIAN ============================    
    else if (isset($_GET['pembelian'])) {        
        $kode_pembelian=$_GET['kode_pembelian'];
        $query_pembelian="DELETE from data_pembelian where kode_pembelian='$kode_pembelian'";
        if(mysqli_query($conn, $query_pembelian)){
            header("location:main.php?page=pembelian");
        }
    }

   // ====================================== HAPUS DATA PENJUALAN ============================    
    else if (isset($_GET['penjualan'])) {        
        $kode_penjualan=$_GET['kode_penjualan'];
        $query_penjualan="DELETE from data_penjualan where kode_penjualan='$kode_penjualan'";
        if(mysqli_query($conn, $query_penjualan)){
            header("location:main.php?page=penjualan");
        }
    }
?>
