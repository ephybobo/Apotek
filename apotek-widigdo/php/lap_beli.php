<?php 

// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
    header("location: ../index.php"); // Kita Redirect ke halaman index.php karena belum login
}

?>
<div class="row">
	<div class="col-md-12">
		<h2 class="judul-lap">Laporan Data Pembelian</h2>
	</div>
	<br/><br/>
	<hr/>
	<br/>
	<div class="col-md-12">
		<form method="POST" class="form-inline">
			<div class="form-group">
				<input type="date" id="tgl1" class="form-control" name="tgl1">
			</div>
			<div class="form-group">
				<label>  Sampai  </label>
				<input type="date" id="tgl2" class="form-control" name="tgl2">
			</div>
			<div class="form-group">
				<button id="formbtn" name="prosess" class="btn btn-primary"><i class="icofont-ui-text-loading"></i> Prosess</button>
				<button class="btn btn-success" name="semua"><i class="icofont-database"></i> Semua Data</button>
			</div>
		</form>
	</div>
</div>
<hr/>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading" text-align="center">
				<?php if (isset($_POST['prosess'])): ?>
					<a href="cetak_beli.php?prosess&tgl1=<?php echo $_POST['tgl1']; ?>&tgl2=<?php echo $_POST['tgl2']; ?>" target="_BLANK" class="btn btn-info"><i class="icofont-print"></i> Cetak</a>
				<?php endif ?>
				<?php if (isset($_POST['semua'])): ?>
					<a href="cetak_beli.php?semua" target="_BLANK" class="btn btn-info"><i class="icofont-print"></i> Cetak</a>
				<?php endif ?>
				<?php if (!isset($_POST['prosess']) && !isset($_POST['semua'])): ?>
					<a href="#" class="btn btn-info" disabled="disabled"><i class="icofont-print"></i> Cetak</a>
				<?php endif ?>
			</div>
			<div class="panel-body">
				<table class="table table-bordered table-hover">
					<thead>
						<tr class="active">
							<th>No</th>
							<th>Tanngal Pembelian</th>
							<th>Kode Pembelian</th>
							<th>Kode Obat</th>
							<th>Kode Supplier</th>
							<th>Harga Satuan</th>
							<th>Jumlah Beli</th>
							<th>Expired</th>
							<th>Total Harga</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						// menghubungkan ke database
						include "koneksi.php";

						if (isset($_POST['prosess'])) {
							$dari_tanggal = $_POST['tgl1'];
							$ke_tanggal = $_POST['tgl2'];

							$result= mysqli_query($conn,"SELECT * from data_pembelian where tanggal between '$dari_tanggal' and '$ke_tanggal'");
							$result1 = mysqli_query($conn,"SELECT SUM(total) as total_pembelian1 from data_pembelian where tanggal between '$dari_tanggal' and '$ke_tanggal'");
							$total1 = mysqli_fetch_assoc($result1);
							$hasil1 = $total1['total_pembelian1'];

							foreach ($result as $index => $data) {
					?>
						<tr>
							<td><?php echo $index + 1; ?></td>
							<td><?php echo date_format(date_create($data['tanggal']),'d-m-Y');?></td>
							<td><?php echo $data['kode_pembelian']; ?></td>
							<td><?php echo $data['kode_obat']; ?></td>
							<td><?php echo $data['kode_supplier']; ?></td>
							<td><?php echo number_format($data['harga_satuan']); ?></td>
							<td><?php echo $data['jumlah']; ?></td>
							<td><?php echo date_format(date_create($data['expired']),'d-m-Y'); ?></td>
							<td><?php echo number_format($data['total']); ?></td>
						</tr>
					<?php
						}
					?>
						<tr>
							<td colspan="8" text-align="center">TOTAL</td>
							<td>Rp. <?php echo number_format($hasil1); ?></td>
						</tr>
					<?php
						}
					?>
						
					<?php

						// menghubungkan ke database
						include "koneksi.php";

						if (isset($_POST['semua'])) {
							$result3= mysqli_query($conn,"SELECT * from data_pembelian");			
							$result4 = mysqli_query($conn,"SELECT SUM(total) as total_pembelian2 from data_pembelian");
							$total2 = mysqli_fetch_assoc($result4);
							$hasil2 = $total2['total_pembelian2'];
			
							foreach ($result3 as $index => $data) {
					?>
						<tr>
							<td><?php echo $index + 1; ?></td>
							<td><?php echo date_format(date_create($data['tanggal']),'d-m-Y');?></td>
							<td><?php echo $data['kode_pembelian']; ?></td>
							<td><?php echo $data['kode_obat']; ?></td>
							<td><?php echo $data['kode_supplier']; ?></td>
							<td><?php echo number_format($data['harga_satuan']); ?></td>
							<td><?php echo $data['jumlah']; ?></td>
							<td><?php echo date_format(date_create($data['expired']),'d-m-Y'); ?></td>
							<td><?php echo number_format($data['total']); ?></td>		
						</tr>
					<?php
						}
					?>
						<tr>
							<td colspan="8" text-align="center">TOTAL</td>
							<td>Rp. <?php echo number_format($hasil2); ?></td>
						</tr>
					<?php
					}
					?>
				
						<?php
						if (isset($_POST['']))  {
						?>
						<tr>
							<td colspan="9" text-align="center">Pilih Opsi Tampil</td>
						</tr>
						<tr>
							<td colspan="8" text-align="center">TOTAL</td>
							<td></td>
						</tr>
					<?php
						}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>