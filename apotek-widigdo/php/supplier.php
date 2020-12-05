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
                Data Supplier
            </div>
            <div class="panel-body">
                <div class="table">
                    <!-- List Tabel -->
                    <table class="table table-striped table-bordered table-hover" id="tabelku">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Supplier</th>
                                <th>Nama Supplier</th>
                                <th>No Telepon</th>
                                <th>Alamat</th>
                                <th>Kota</th>
                                <th>Kode Pos</th>
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
                        <tbody>
                            <?php  
                                // menghubungkan ke database
                                include "koneksi.php";
                                
                                // Buat query untuk menampilkan data supplier sesuai limit yang ditentukan
                                $supplier = "SELECT * FROM data_supplier";
                                $result = $conn->query($supplier);

                                // Membuat tabel supplier
                                foreach ($result as $index => $data)  {
                            ?>

                            <!-- Menampilkan isi tabel sesuai dengan database -->
                            <tr class="odd gradeX">
                                <td><?php echo $index + 1; ?></td>
                                <td><?php echo $data['kode_supplier']; ?></td>
                                <td><?php echo $data['nama_supplier']; ?></td>
                                <td><?php echo $data['no_telp']; ?></td>
                                <td><?php echo $data['alamat']; ?></td>
                                <td><?php echo $data['kota']; ?></td>
                                <td><?php echo $data['kode_pos']; ?></td>
                                <!-- Tabel aksi khusus Admin -->
                                <?php 
                                   if(isset($_SESSION['username']) && $_SESSION['jabatan'] == "admin"){
                                ?>
                                <td>
                                    <a href="main.php?page=editsupplier&kode_supplier=<?php echo $data['kode_supplier']; ?>" class="btn btn-info btn-xs"><i class="icofont-pencil"></i> Edit</a>
                                    <a href="main.php?supplier=1&page=hapus&kode_supplier=<?php echo $data['kode_supplier']; ?>" class="btn btn-danger btn-xs" id="alertHapus"><i class="icofont-trash"></i> Hapus</a>
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
                        <a href="main.php?page=tambahsupplier" class="btn btn-success"><i class="icofont-plus-square"></i> Tambah Data Supplier</a>
                    <?php 
                            };
                    ?>
                </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>