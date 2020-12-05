<?php

// Start session nya
session_start(); 

// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
  header("location: ../index.php"); // Kita Redirect ke halaman index.php karena belum login
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Data -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Apotek Widigdo</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet">
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!--FOR TABLE -->
    <link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/bootbox.min.js"></script>

</head>

<body>
  <!-- Main Wrap -->
  <div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="background:#00bc00" >
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>    
            <span class="icon-bar"></span>
        </button>
        <!-- Tittle Navbar -->
        <a class="navbar-brand" style="background-color:#00bc00; color:white" href="main.php">Apotek Widigdo</a> 
      </div>
      <!-- Jabatan User -->
      <div class="left-side">
           <h1 class="nama-login"><i class="icofont-user" style="font-size:20px;color:white;margin-right:10px"></i><?php echo $_SESSION['jabatan'];?></h1>
      </div>
    </nav>   

  <!-- Navbar Menu -->
    <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse" >
        <ul class="nav" id="main-menu" >
          <li class="text-center" style="padding-top:20px; padding-bottom:30px; border:none; font-size:20px" id="kalender">
            <!-- Display Kalender -->
            <script src="../assets/js/waktu.js"></script>
          </li>
          <li class="text-center" style="padding-bottom:30px; font-size:20px" id="jam">
            <!-- Display Jam -->
            <script src="../assets/js/waktu.js"></script>
          </li>
          <!-- List Menu Navigasi -->
          <li class="active"><a href="main.php"><i class="icofont-dashboard-web"></i> Dashboard</a></li>
          <li><a  href="main.php?page=user"><i class="icofont-drug"></i> Data User </a></li>
          <li><a  href="main.php?page=obat"><i class="icofont-drug"></i> Data Obat </a></li>
          <li><a  href="main.php?page=supplier"><i class="icofont-ui-user-group"></i> Data Supplier</a></li> 
          <li><a  href="#"><i class="icofont-money-bag"></i> Data Transaksi <span class="icofont-arrow-left" style="float:right"></span></a>
            <ul class="nav nav-second-level">
              <li><a  href="main.php?page=pembelian"><i class="icofont-database"></i> Pembelian</a></li>
              <li><a  href="main.php?page=penjualan"><i class="icofont-database"></i> Penjualan</a></li>
            </ul>
          </li>
          <li><a  href="#"><i class="icofont-ui-file"></i> Laporan<span class="icofont-arrow-left" style="float:right"></span></a>
            <ul class="nav nav-second-level">
              <li><a  href="main.php?page=laporanpembelian"><i class="icofont-file-text"></i> Pembelian</a></li>
              <li><a  href="main.php?page=laporanpenjualan"><i class="icofont-file-text"></i> Penjualan</a></li>
            </ul>
          </li>
          <li><a  href="main.php?page=logout"><i class="icofont-logout"></i> Logout </a></li>
      </div>      
    </nav>  

    <!-- Setting Url Page -->
    <div id="page-wrapper">
      <div id="page-inner">
        <?php  
          if (isset($_GET['page'])) {
            // ===================== PAGE DATA USER ==============
            if ($_GET['page']=="user") {
              include 'user.php';
            }
            // Page add user
            elseif ($_GET['page']=="tambahuser") {
              include 'add_user.php';
            }
            // Page edit user
            elseif ($_GET['page']=="edituser") {
              include 'edit_user.php';
            }
            // ===================== PAGE DATA OBAT ==============
            elseif ($_GET['page']=="obat") {
              include 'obat.php';
            }
            // Page data obat akan habis
            elseif ($_GET['page']=="akanhabis") {
              include 'akan_habis.php';
            }
            // Page data obat sudah habis
            elseif ($_GET['page']=="sudahhabis") {
              include 'sudah_habis.php';
            }
            // Page data obat akan exp
            elseif ($_GET['page']=="akanexp") {
              include 'akan_exp.php';
            }
            // Page data obat sudah exp
            elseif ($_GET['page']=="sudahexp") {
              include 'sudah_exp.php';
            }
            // Page add obat
            elseif ($_GET['page']=="tambahobat") {
              include 'add_obat.php';
            }
            // Page edit obat
            elseif ($_GET['page']=="editobat") {
              include 'edit_obat.php';
            }
            // ===================== PAGE DATA SUPPLIER ==============
            elseif ($_GET['page']=="supplier") {
              include 'supplier.php';
            }
            // Page add data supplier
            elseif ($_GET['page']=="tambahsupplier") {
              include 'add_supplier.php';
            }
            // Page edit supplier
            elseif ($_GET['page']=="editsupplier") {
              include 'edit_supplier.php';
            }
            // ===================== PAGE DATA PEMBELIAN ==============
            elseif ($_GET['page']=="pembelian") {
              include 'pembelian.php';
            }
            // Page add data pembelian
            elseif ($_GET['page']=="tambahpembelian") {
              include 'add_pembelian.php';
            }
            // Page edit data pembelian
            elseif ($_GET['page']=="editpembelian") {
              include 'edit_pembelian.php';
            }
            // Page data pembelian sehari
            elseif ($_GET['page']=="transaksibeli") {
              include 'transaksi_beli.php';
            }
            // Page laporan pembelian
            elseif ($_GET['page']=="laporanpembelian") {
              include 'lap_beli.php';
            }
            // ===================== PAGE DATA PENJUALAN ==============
            elseif ($_GET['page']=="penjualan") {
              include 'penjualan.php';
            }
            // Page add penjualan
            elseif ($_GET['page']=="tambahpenjualan") {
              include 'add_penjualan.php';
            }
            // Page edit data penjualan
            elseif ($_GET['page']=="editpenjualan") {
              include 'edit_penjualan.php';
            }
            // Page data penjualan sehari
            elseif ($_GET['page']=="transaksijual") {
              include 'transaksi_jual.php';
            }
            // Page laporan penjualan
            elseif ($_GET['page']=="laporanpenjualan") {
              include 'lap_jual.php';
            }
            // ===================== SISTEM AKSI ==============
            elseif ($_GET['page']=="hapus") {
              include 'hapus.php';
            }
            elseif ($_GET['page']=="logout") {
              include 'logout.php';
            }
          }
          else{
             include 'beranda.php';
          }
        ?>  
      </div>
    </div>
  </div>
  
  <!-- Copyright -->
    <div class="footer-copyright text-center py-3" style="background:#00bc00;height:35px;color:white;padding-top:10px">© 2020 Copyright: Apotek Widigdo
    </div>
  <!-- Copyright -->

    <!-- /. WRAPPER  -->
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
    <!--DATA TABLE-->
    <script src="../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
      $(document).ready(function () {
        $('#tabelku').dataTable();
      });
    </script>
    <!-- Script Alert Hapus Data -->
    <script>
    $(document).on("click", "#alertHapus", function(h){
      h.preventDefault();
      var link = $(this).attr("href");
      bootbox.confirm("Apakah yakin untuk menghapus data ini?", function(confirmed){
        if (confirmed) {
          window.location.href = link;
        };
      });
    });
    </script>
    <script src="../assets/js/custom.js"></script>
</body>
</html>