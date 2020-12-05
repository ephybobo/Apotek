<?php

// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
  header("location: ../index.php"); // Kita Redirect ke halaman index.php karena belum login
}

?>

<div class="row">
  <div class="col-md-12">
    <h2></h2>   
    <h4>Selamat datang <span style="color:#078721;font-size:20px"><b><?php echo $_SESSION['nama_lengkap'];?></b></span> di Sistem Informasi Farmasi Apotek Widigdo!</h4>
  </div>
</div>
<hr />

<div class="row">
    <!-- NOTIFIKASI OBAT HABIS -->
	<div class="col-md-6 col-sm-6 col-xs-6">           
		<div class="panel panel-back noti-box">
            <span class="icon-box bg-color-green set-icon">
                <i class="icofont-pills" style="font-size:75px;"></i>
            </span>
           	<div class="text-box" >
                <p class="main-text">Obat Habis</p>
                <p class="text-muted" > 
                <?php 
                    // menghubungkan ke database
                    include "koneksi.php";
                    // sql menghitung jumlah item yang sudah habis(=0) item
                    $habis= mysqli_query ($conn, "SELECT COUNT(*) as jumlah FROM data_obat WHERE jumlah_stok=0");
                    $result = mysqli_fetch_array($habis);
                    echo "Ada <span style='color:#00bc00;font-size:20px'> <b> {$result['jumlah']} </b> </span> item sudah habis";
                ?>
                </p>
                <a  href="main.php?page=sudahhabis"><input type="submit" name="habis_stk" class="btn btn-block" id="habis-stk" value="LIHAT" /><br></a>
                <p class="text-muted"> 
                    <?php 
                        // menghubungkan ke database
                        include "koneksi.php";
                        // sql menghitung jumlah item yang akan habis (<=10) item
                        $akan_habis= mysqli_query ($conn, "SELECT COUNT(*) as jumlah FROM data_obat WHERE jumlah_stok <=10");
                        $result = mysqli_fetch_array($akan_habis);
                        echo "<br>Ada <span style='color:#00bc00;font-size:20px'> <b> {$result['jumlah']} </b> </span> item akan habis <br>";
                    ?>
                </p>
                <a  href="main.php?page=akanhabis"><input type="submit" name="akan_stk" class="btn btn-block" id="akan-stk" value="LIHAT" /></a>
            </div>
        </div>
	</div>
    <!-- NOTIFIKASI OBAT EXPIRED -->
	<div class="col-md-6 col-sm-6 col-xs-6">           
		<div class="panel panel-back noti-box">
            <span class="icon-box bg-color-red set-icon">
                <i class="icofont-warning" style="font-size:75px;"></i>
            </span>
        	<div class="text-box" >
                <p class="main-text"> Obat Expired</p>
                <p class="text-muted">
                    <?php
                        // menghubungkan ke database
                        include "koneksi.php";
                        // sql menghitung jumlah item yang sudah expired (<= now()) item
                        $exp = mysqli_query ($conn, "SELECT COUNT(*) as jumlah FROM data_obat WHERE expired <= CURDATE()");
                        $result = mysqli_fetch_array($exp);
                        echo "Ada <span style='color:#f13232;font-size:20px'> <b> {$result['jumlah']} </b> </span> item sudah expired";
                    ?>
                </p> 
                <a  href="main.php?page=sudahexp"><input type="submit" name="sudah_exp" class="btn btn-block" id="sudah-exp" value="LIHAT" /><br></a>
                <p class="text-muted"> 
                    <?php
                        // menghubungkan ke database
                        include "koneksi.php";
                        // sql menghitung jumlah item yang akan expired dalam 30 hari (sebulan) item
                        $akan_exp = mysqli_query ($conn, "SELECT count(*) AS jumlah FROM data_obat WHERE expired<=timestampadd(day, 30, CURDATE()) AND expired >= CURDATE()");
                        $result = mysqli_fetch_array($akan_exp);
                        echo "<br> Ada <span style='color:#f13232;font-size:20px'> <b> {$result['jumlah']} </b> </span> item akan expired";
                    ?>      
                </p> 
                <a  href="main.php?page=akanexp"><input type="submit" name="akan_exp" class="btn btn-block" id="akan-exp" value="LIHAT" /></a>
            </div>
        </div>
	</div>
    <!-- NOTIFIKASI PEMBELIAN -->
        
    <!-- Khusus Pimpinan -->
    <?php 
        if(isset($_SESSION['username']) && $_SESSION['jabatan'] == "pimpinan"){
    ?>
    <div class="col-md-6 col-sm-6 col-xs-6">           
		<div class="panel panel-back noti-box">
            <span class="icon-box bg-color-red set-icon">
                <i class="icofont-dollar-minus" style="font-size:75px;"></i>
            </span>
        	<div class="text-box" >
                <p class="main-text"> Transaksi Pembelian </p>
                <p class="text-muted">
                    <?php
                        // menghubungkan ke database
                        include "koneksi.php";
                        // sql menghitung jumlah data pembelian dalam sehari
                        $beli_seminggu = mysqli_query ($conn, "SELECT count(*) AS jumlah FROM data_pembelian WHERE tanggal >= CURDATE()");
                        $result = mysqli_fetch_array($beli_seminggu);
                        echo "<br><br>Ada <span style='color:#f13232;font-size:20px'> <b> {$result['jumlah']} </b> </span> data tercatat";
                    ?>
                </p> 
                <a  href="main.php?page=transaksibeli"><input type="submit" name="beli_sebulan" class="btn btn-block" id="sudah-exp" value="LIHAT" /><br></a>
            </div>
        </div>
    </div>
    <!-- NOTIFIKASI PENJUALAN -->
    <div class="col-md-6 col-sm-6 col-xs-6">           
		<div class="panel panel-back noti-box">
            <span class="icon-box bg-color-green set-icon">
                <i class="icofont-dollar-plus" style="font-size:75px;"></i>
            </span>
           	<div class="text-box" >
                <p class="main-text"> Transaksi Penjualan </p>
                <p class="text-muted" > 
                <?php
                    // menghubungkan ke database
                    include "koneksi.php";
                    // sql menghitung jumlah data penjualan dalam sehari
                    $akan_habis= mysqli_query ($conn, "SELECT count(*) AS jumlah FROM data_penjualan WHERE tanggal >= CURDATE()");
                    $result = mysqli_fetch_array($akan_habis);
                    echo "<br><br>Ada <span style='color:#00bc00;font-size:20px'> <b> {$result['jumlah']} </b> </span> data tercatat"; 
                ?>
                </p>
                <a  href="main.php?page=transaksijual"><input type="submit" name="jual_sehari" class="btn btn-block" id="habis-stk" value="LIHAT" /><br></a>
            </div>
        </div>
	</div>
    <?php 
        };
    ?>
</div>