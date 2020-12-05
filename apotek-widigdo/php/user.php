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
                Data User
            </div>
            <div class="panel-body">
                <div class="table">
                    <!-- List Tabel -->
                    <table class="table table-striped table-bordered table-hover" id="tabelku">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode User</th>
                                <th>Nama Lengkap</th>
                                <th>Jabatan</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>No Telepon</th>
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
                                
                                // Buat query untuk menampilkan data siswa sesuai limit yang ditentukan
                                $user = "SELECT * FROM data_user";
                                $result = $conn->query($user);

                                // Membuat tabel user
                                foreach ($result as $index => $data)  {
                            ?>

                            <!-- Menampilkan isi tabel sesuai dengan database -->
                            <tr class="odd gradeX">
                                <td><?php echo $index + 1; ?></td>
                                <td><?php echo $data['kode_user']; ?></td>
                                <td><?php echo $data['nama_lengkap']; ?></td>
                                <td><?php echo $data['jabatan']; ?></td>
                                <td><?php echo $data['username']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['no_telp']; ?></td>
                                <!-- Tabel aksi khusus Admin -->
                                <?php 
                                    if(isset($_SESSION['username']) && $_SESSION['jabatan'] == "admin"){
                                ?>
                                <td>
                                    <a href="main.php?page=edituser&kode_user=<?php echo $data['kode_user']; ?>" class="btn btn-info btn-xs"><i class="icofont-pencil"></i> Edit</a>
                                    <a href="main.php?user=1&page=hapus&kode_user=<?php echo $data['kode_user']; ?>" class="btn btn-danger btn-xs" id="alertHapus" name="hapus_user"><i class="icofont-trash"></i> Hapus</a>
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
                            <a href="main.php?page=tambahuser" class="btn btn-success"><i class="icofont-plus-square"></i> Tambah Data User </a>
                        <?php 
                            };
                        ?>
                </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>