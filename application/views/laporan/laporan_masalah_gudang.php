<!-- Hello, ini nanti untuk <b>Laporan Hasil Produksi</b> -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Laporan
					<small>Masalah Gudang</small>
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
								<label class="col-sm-4 control-label">Bulan</label>
                                <div class="">
                                    <!-- <input type="date" name="date1" class="form-control" value="<?= isset($post['filter']) ? $post['date1'] : ''; ?>"> -->
                                    <select class="form-control" name="bulan">
                                        <option value="">-- Pilih --</option>
                                        <option value="01" <?= ($post['filter'] != null && $post['bulan'] == 1) ? 'selected' : ''; ?>>Januari</option>
                                        <option value="02" <?= ($post['filter'] != null && $post['bulan'] == 2) ? 'selected' : ''; ?>>Februari</option>
                                        <option value="03" <?= ($post['filter'] != null && $post['bulan'] == 3) ? 'selected' : ''; ?>>Maret</option>
                                        <option value="04" <?= ($post['filter'] != null && $post['bulan'] == 4) ? 'selected' : ''; ?>>April</option>
                                        <option value="05" <?= ($post['filter'] != null && $post['bulan'] == 5) ? 'selected' : ''; ?>>Mei</option>
                                        <option value="06" <?= ($post['filter'] != null && $post['bulan'] == 6) ? 'selected' : ''; ?>>Juni</option>
                                        <option value="07" <?= ($post['filter'] != null && $post['bulan'] == 7) ? 'selected' : ''; ?>>Juli</option>
                                        <option value="08" <?= ($post['filter'] != null && $post['bulan'] == 8) ? 'selected' : ''; ?>>Agustus</option>
                                        <option value="09" <?= ($post['filter'] != null && $post['bulan'] == 9) ? 'selected' : ''; ?>>September</option>
                                        <option value="10" <?= ($post['filter'] != null && $post['bulan'] == 10) ? 'selected' : ''; ?>>Oktober</option>
                                        <option value="11" <?= ($post['filter'] != null && $post['bulan'] == 11) ? 'selected' : ''; ?>>November</option>
                                        <option value="12" <?= ($post['filter'] != null && $post['bulan'] == 12) ? 'selected' : ''; ?>>Desember</option>
                                    </select>
                                </div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-horizontal">
							<div class="form-group">
                                <label class="col-sm-4 control-label">Tahun</label>
                                <div class="">
                                    <select class="form-control" name="tahun">
                                        <option value="">-- Pilih --</option>
                                        <?php date_default_timezone_set('Asia/Jakarta'); $year = (int)date('Y'); for ($i=2020; $i <= $year+3; $i++) { ?>
                                            <option value="<?=$i; ?>" <?= ($post['filter'] != null && $post['tahun'] == $i) ? 'selected' : ''; ?>><?=$i; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-horizontal">
							<div class="form-group">
                                <label class="col-sm-9 control-label">Nama Bahan Baku</label>
                                <div class="">
                                    <select name="material" class="form-control">
                                        <option value="">- Pilih -</option>
                                        <?php foreach ($b_material->result_array() as $data) { ?>
                                            <option value="<?= $data['material_id']; ?>" <?php
                                            if ($post != null) {
                                                echo $post['material'] == $data['material_id'] ? 'selected' : '';
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
			<h6 class="box-title"><?= isset($post['filter']) ? "Hasil Pencarian " : ''; ?> Laporan Masalah Gudang</h6>

		</div>
		<div class="box-body table-responsive">
			<?php $no = 1;
            if ((isset($post['filter']) && $post['filter'] != '') || (isset($post['reset']) && $post['reset'] != '')) { ?>
				<table class="table table-bordered table-striped" id="table1">
					<thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Masalah</th>
                        <th>Tanggal Pelaporan</th>
                        <th>No Lot</th>
                        <th>Material</th>
                        <th>Jumlah Masalah Ditemukan</th>
                        <th>Status</th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result_array() as $data) : ?>
                        <tr>
                            <td style="width:5%;"><?= $no++ ?></td>
                            <td><?= $data['t_gudang_id'] ?></td>
                            <td><?= indo_date($data['date']) ?></td>
                            <td><?= $data['no_lot'] ?></td>
                            <td><?= $data['material_name'] ?></td>
                            <td class="text-center"><?= $data['jumlah_masalah'] ?></td>
                            <td><span class="badge <?= $data['status'] == 1 ? 'badge-success' : 'badge-danger' ?>"><?= $data['status'] == 1 ? 'Sudah Dicek' : 'Belum Dicek' ?></span></td>
                        </tr>
                    <?php endforeach; } else {?>
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
</section>
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
                                    <li>Masukkan bulan dan tahun untuk menampilkan data di jangka waktu tertentu.</li>
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