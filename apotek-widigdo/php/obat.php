<?php

// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
  header("location: ../index.php"); // Kita Redirect ke halaman index.php karena belum login
}

?>
<div class="row">
    <div class="col-md-12">
        <!-- Membuat Tabel -->
        <div class="panel panel-default">
            <!-- Judul Tabel -->
            <div class="panel-heading">
                Data Obat
            </div>
            <div class="panel-body">
                <div class="table">
                    <!-- List Tabel -->
                    <table class="table table-striped table-bordered table-hover" id="tabelku">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Obat</th>
                                <th>Nama Obat</th>
                                <th>Kategori</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Jumlah Stok</th>
                                <th>Expired</th>
                                <!-- Tabel aksi khusus Admin -->
                                <?php 
                                    if(isset($_SESSION['username']) && $_SESSION['jabatan'] == "admin"){
                                ?>
                                <th>Aksi</th>
                                <?php 
                                    };
                                ?>
                            </tr>
                        </thead>
                        <body>
                            <?php  
                                // menghubungkan ke database
                                include "koneksi.php";
                                
                                // Buat query untuk menampilkan data obat sesuai limit yang ditentukan
                                $obat = "SELECT * FROM data_obat ORDER BY kode_obat ASC";
                                $result = $conn->query($obat);

                                // Membuat tabel obat
                                foreach ($result as $index => $data)  {
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $index + 1; ?></td>
                                <td><?php echo $data['kode_obat']; ?></td>
                                <td><?php echo $data['nama_obat']; ?></td>
                                <td><?php echo $data['kategori']; ?></td>
                                <td><?php echo number_format($data['harga_beli']); ?></td>
                                <td><?php echo number_format($data['harga_jual']); ?></td>
                                <td><?php echo $data['jumlah_stok']; ?></td>
                                <td><?php echo date_format(date_create($data['expired']),'d-m-Y'); ?></td>
                                <!-- Tabel aksi khusus Admin -->
                                <?php 
                                    if(isset($_SESSION['username']) && $_SESSION['jabatan'] == "admin"){
                                ?>
                                <td>
                                    <a href="main.php?page=editobat&kode_obat=<?php echo $data['kode_obat']; ?>" class="btn btn-info btn-xs"><i class="icofont-pencil"></i> Edit</a>
                                    <a href="main.php?obat=1&page=hapus&kode_obat=<?php echo $data['kode_obat']; ?>" class="btn btn-danger btn-xs" name="hapus_obat" id="alertHapus"><i class="icofont-trash"></i> Hapus</a>
                                </td>
                                <?php 
                                    };
                                ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>   
            </div>
                <!-- Khusus Admin -->
                <div class="panel-footer">
                    <?php 
                        if(isset($_SESSION['username']) && $_SESSION['jabatan'] == "admin"){
                    ?>
                    <a href="main.php?page=tambahobat" class="btn btn-success"><i class="icofont-plus-square"></i> Tambah Data Obat </a>
                    <?php 
                         };
                    ?>
                </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>
