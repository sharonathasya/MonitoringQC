<!-- Hello, ini nanti untuk <b>Laporan Hasil Produksi</b> -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Laporan
					<small>Hasil Produksi</small>
				</h1>

			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item">
					<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
					</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

	<div class="card">
		<div class="card-header with-border">
			<h3 class="card-title float-left">Filter Data</h3>
			<a href="#" class="float-right" data-toggle="modal" data-target="#modal-panduan" data-area="<?php ?>">
				<i class="fa fa-info-circle"></i> Penggunaan Filter
			</a>
		</div>
		<div class="card-body">
			<form action="" method="post">
				<div class="row">
					<div class="col-md-4">
						<div class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-4 control-label">Date</label>
								<div class="">
									<input type="date" name="date1" class="form-control" value="<?= isset($post['filter']) ? $post['date1'] : ''; ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-4 control-label">s/d</label>
								<div class="">
									<input type="date" name="date2" class="form-control" value="<?= isset($post['filter']) ? $post['date2'] : ''; ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-9 control-label">Nama Produk Jadi</label>
								<div class="">
									<select name="product" class="form-control">
										<option value="">- Pilih -</option>
										<?php foreach ($b_produksi->result_array() as $data) { ?>
											<option value="<?= $data['product_id']; ?>" <?php
																						if ($post != null) {
																							echo $post['product'] == $data['product_id'] ? 'selected' : '';
																						}
																						?>><?= $data['name'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12" align="right">
						<!-- <div class="pull-right"> -->
						<button type="submit" name="filter" class="btn btn-info btn-flat" value="filter">
							<i class="fa fa-search"></i> Filter
						</button>
						<button type="submit" name="cetak" class="btn btn-success btn-flat">
							<i class="fa fa-print"></i> Cetak
						</button>
						<button type="submit" name="reset" class="btn btn-secondary" value="reset">Reset</button>
						<!-- </div> -->
					</div>
				</div>
			</form>
		</div>

	</div>


	<?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header with-border">
			<h6 class="box-title"><?= isset($post['filter']) ? "Hasil Pencarian " : ''; ?> Laporan Produk Jadi</h6>

		</div>
		<div class="box-body table-responsive">
			<?php $no = 1;
			if ((isset($post['filter']) && $post['filter'] != '') || (isset($post['reset']) && $post['reset'] != '')) { ?>
				<table class="table table-bordered table-striped" id="table1">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Produksi</th>
							<th>Tanggal Masuk</th>
							<th>Produk</th>
							<th>Customer</th>
							<th>Jumlah</th>
							<th>OK</th>
							<th>NG</th>
							<th>Operator</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($row->result() as $key => $data) { ?>
							<tr <?php if ($data->ok != 0) {
								?>>
								<td style="width:5%;"><?= $no++ ?></td>
								<td><?= $data->t_product_id ?></td>
								<td><?= indo_date($data->date) ?></td>
								<td><?= $data->product_name ?></td>
								<td><?= $data->customer_name ?></td>
								<td class="text-center"><?= $data->jumlah ?></td>
								<td class="text-center"><?= $data->ok ?></td>
								<td class="text-center"><?= $data->ng ?></td>
								<td><?= $data->operator ?></td>

							</tr>
					<?php }
							}
						} else { ?>
					<h2 align="center"> Silakan Masukkan Filter Data </h2>
					<!-- <ol align="left">
									<h4><li>Masukkan tanggal awal dan tanggal akhir untuk menampilkan data di jangka waktu tertentu.</li></h4>
									<h4><li>Masukkan nama bahan baku untuk mengecek data bahan baku tertentu.</li></h4>
									<h4><li>Klik tombol "Filter" untuk menampilkan data berdasarkan filter.</li></h4>
									<h4><li>Tekan reset untuk menampilkan semua data dalam semua periode (tanpa filter).</li></h4>
								</ol> -->
				<?php
						}
				?>
					</tbody>
				</table>
		</div>
	</div>
	<!-- MODAL DIALOG -->
	<div class="modal fade" id="modal-panduan">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Panduan Penggunaan Filter</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body modal-evidence">
					<div class="card" style="height: 100%;">
						<div class="card-body">
							<ol align="left">
								<h4>
									<li>Masukkan tanggal awal dan tanggal akhir untuk menampilkan data di jangka waktu tertentu.</li>
								</h4>
								<h4>
									<li>Masukkan nama bahan baku untuk mengecek data bahan baku tertentu.</li>
								</h4>
								<h4>
									<li>Klik tombol "Filter" untuk menampilkan data berdasarkan filter.</li>
								</h4>
								<h4>
									<li>Tekan reset untuk menampilkan semua data dalam semua periode (tanpa filter).</li>
								</h4>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- MODAL DIALOG -->
</section>
<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>