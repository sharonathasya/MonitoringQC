<!-- Hello, ini nanti untuk <b>Laporan Quality Control</b> -->
<?php 
date_default_timezone_set('Asia/Jakarta');
$month = date('m');
?>
<section class="content-header" id="bahanbaku">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Laporan
					<small>Quality Control Bahan Baku Masuk</small>
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
			<h3 class="card-title">Filter Data</h3>
		</div>
		<div class="card-body">
			<form target="_blank" action="<?php base_url(); ?>cetak_grafik_bahanbaku" method="post">
				<div class="row">
					<div class="col-md-4">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Bulan</label>
                                <div class="">
                                    <!-- <input type="date" name="date1" class="form-control" value="<?= isset($post['filter']) ? $post['date1'] : ''; ?>"> -->
                                    <select class="form-control" name="bulan" id="bulan_material">
                                        <option value="">-- Pilih --</option>
                                        <option value="01" <?= ($month == '01') ? 'selected' : ''; ?>>Januari</option>
                                        <option value="02" <?= ($month == '02') ? 'selected' : ''; ?>>Februari</option>
                                        <option value="03" <?= ($month == '03') ? 'selected' : ''; ?>>Maret</option>
                                        <option value="04" <?= ($month == '04') ? 'selected' : ''; ?>>April</option>
                                        <option value="05" <?= ($month == '05') ? 'selected' : ''; ?>>Mei</option>
                                        <option value="06" <?= ($month == '06') ? 'selected' : ''; ?>>Juni</option>
                                        <option value="07" <?= ($month == '07') ? 'selected' : ''; ?>>Juli</option>
                                        <option value="08" <?= ($month == '08') ? 'selected' : ''; ?>>Agustus</option>
                                        <option value="09" <?= ($month == '09') ? 'selected' : ''; ?>>September</option>
                                        <option value="10" <?= ($month == '10') ? 'selected' : ''; ?>>Oktober</option>
                                        <option value="11" <?= ($month == '11') ? 'selected' : ''; ?>>November</option>
                                        <option value="12" <?= ($month == '12') ? 'selected' : ''; ?>>Desember</option>
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
                                    <select class="form-control" name="tahun" id="tahun_material">
                                        <option value="">-- Pilih --</option>
                                        <?php date_default_timezone_set('Asia/Jakarta'); $year = (int)date('Y'); for ($i=2020; $i <= $year+3; $i++) { ?>
                                            <option value="<?=$i; ?>" <?= ($year == $i) ? 'selected' : ''; ?>><?=$i; ?></option>
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
                                    <select name="material" class="form-control" id="bahan_baku_m">
                                        <option value="">- Pilih -</option>
                                        <?php foreach ($b_material->result_array() as $data) { ?>
                                            <option value="<?= $data['material_id']; ?>"><?= $data['name'] ?></option>
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
						<a href="#bahanbaku" id="do_filter" class="btn btn-info btn-flat">
							<i class="fa fa-check"></i> Tampilkan Grafik
						</a>
						<button type="submit" name="cetak_bahanbaku" class="btn btn-success btn-flat">
							<i class="fa fa-print"></i> Cetak
						</button>
						<a href="#bahanbaku" id="reset_filter" class="btn btn-secondary">Reset</a>
						<!-- </div> -->
					</div>
				</div>
			</form>
		</div>

	</div>


	<?php $this->view('messages') ?>
	<div class="box pt-2 pb-3" align="center">
		<div class="box-body">
			<div id="columnchart_material" style="width: 900px; height: 450px;">
				<h2 align="center"> Silakan Masukkan Filter Data </h2>
				<!-- <ol align="left">
							<h4><li>Masukkan tanggal awal dan tanggal akhir untuk menampilkan data di jangka waktu tertentu.</li></h4>
							<h4><li>Masukkan nama bahan baku untuk mengecek data bahan baku tertentu.</li></h4>
							<h4><li>Tekan reset untuk menampilkan semua data dalam semua periode.</li></h4>
						</ol> -->
			</div>
		</div>
	</div>

</section>

<!-- UNTUK GRAFIK HASIL PRODUKSI -->
<section class="content-header" id="gudang">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Laporan
					<small>Quality Control Masalah Gudang</small>
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

<section class="content">

	<div class="card">
		<div class="card-header with-border">
			<h3 class="card-title">Filter Data</h3>
		</div>
		<div class="card-body">
			<form target="_blank" action="<?php base_url(); ?>cetak_grafik_gudang" method="post">
				<div class="row">
					<div class="col-md-4">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Bulan</label>
                                <div class="">
                                    <!-- <input type="date" name="date1" class="form-control" value="<?= isset($post['filter']) ? $post['date1'] : ''; ?>"> -->
                                    <select class="form-control" name="bulan" id="bulan_gudang">
                                        <option value="">-- Pilih --</option>
                                        <option value="01" <?= ($month == '01') ? 'selected' : ''; ?>>Januari</option>
                                        <option value="02" <?= ($month == '02') ? 'selected' : ''; ?>>Februari</option>
                                        <option value="03" <?= ($month == '03') ? 'selected' : ''; ?>>Maret</option>
                                        <option value="04" <?= ($month == '04') ? 'selected' : ''; ?>>April</option>
                                        <option value="05" <?= ($month == '05') ? 'selected' : ''; ?>>Mei</option>
                                        <option value="06" <?= ($month == '06') ? 'selected' : ''; ?>>Juni</option>
                                        <option value="07" <?= ($month == '07') ? 'selected' : ''; ?>>Juli</option>
                                        <option value="08" <?= ($month == '08') ? 'selected' : ''; ?>>Agustus</option>
                                        <option value="09" <?= ($month == '09') ? 'selected' : ''; ?>>September</option>
                                        <option value="10" <?= ($month == '10') ? 'selected' : ''; ?>>Oktober</option>
                                        <option value="11" <?= ($month == '11') ? 'selected' : ''; ?>>November</option>
                                        <option value="12" <?= ($month == '12') ? 'selected' : ''; ?>>Desember</option>
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
                                    <select class="form-control" name="tahun" id="tahun_gudang">
                                        <option value="">-- Pilih --</option>
                                        <?php date_default_timezone_set('Asia/Jakarta'); $year = (int)date('Y'); for ($i=2020; $i <= $year+3; $i++) { ?>
                                            <option value="<?=$i; ?>" <?= ($year == $i) ? 'selected' : ''; ?>><?=$i; ?></option>
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
                                    <select name="material" class="form-control" id="bahan_baku_g">
                                        <option value="">- Pilih -</option>
                                        <?php foreach ($b_material->result_array() as $data) { ?>
                                            <option value="<?= $data['material_id']; ?>"><?= $data['name'] ?></option>                                        	
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
						<a href="#gudang" id="do_filter_gudang" class="btn btn-info btn-flat">
							<i class="fa fa-check"></i> Tampilkan Grafik
						</a>
						<button type="submit" name="cetak_gudang" class="btn btn-success btn-flat">
							<i class="fa fa-print"></i> Cetak
						</button>
						<a href="#gudang" id="reset_filter_gudang" class="btn btn-secondary">Reset</a>
						<!-- </div> -->
					</div>
				</div>
			</form>
		</div>

	</div>


	<?php $this->view('messages') ?>
	<div class="box pt-2 pb-3" align="center">
		<div class="box-body">
			<div id="columnchart_gudang" style="width: 900px; height: 350px;">
				<h2 align="center"> Silakan Masukkan Filter Data </h2>				
			</div>
		</div>
	</div>

</section>

<!-- THE SCRIPT - Javascript, AJAX & Google Charts -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
  	google.load('visualization', '1.0', {'packages':['Bar']});  
	var bulan = '';
	var tahun = '';
	var material = '';

	$('#reset_filter').on('click', function() {
		$('#bulan_material').val('');
		$('#tahun_material').val('');
		$('#bahan_baku_m').val('');
		alert("Filter material masuk direset ! Menampilkan semua data.");
		drawChart_material('', '', '');
	});

	$('#do_filter').on('click', function() {
		bulan = $('#bulan_material').val();
		tahun = $('#tahun_material').val();
		material = $('#bahan_baku_m').val();
		alert("Menampilkan data material masuk sesuai filter.");
		drawChart_material(bulan, tahun, material);
	});

	function get_bulan(ang_bulan) {
		var angka = parseInt(ang_bulan) - 1;
		var bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
		return bulan[angka];
	}

	function drawChart_material(bulan, tahun, material_) {
		console.log("baris 162 BULAN = " + bulan + " THN / Material = " + tahun + " / " + material_);
		$.ajax({
			url: 'http://localhost/myqc/laporan/getDetailRejectOk_material',
			method: 'post',
			data: {
				filter: 'true',
				bulan: bulan,
				tahun: tahun,
				material: material_
			},
			dataType: 'json',
			success: function(data) {
				console.log(data);
				if (data['row'].length == 0) {
					$('#columnchart_material').empty();
					alert("Tidak ada data ditemukan ! ");
					$('#columnchart_material').html('<h1 align="center"> Tidak ada data ditemukan ! </h1>');
				} else {
					google.charts.load('current', {
						'packages': ['bar']
					});
					// console.log("baris 177");
					var material_name = '';
					var bulan_tahun = '';
					var data_visualisasi = [
						['Jenis Cacat', 'Jumlah']
					];
					if (bulan == '' && tahun == '') {
						bulan_tahun = 'Semua Periode';
					}else{
						bulan_tahun = 'Bulan ' + get_bulan(bulan) + ' ' + tahun;
					}
					// for (i in data['cacat']) {
					// 	data_visualisasi[0].push(data['cacat'][i]['jenis_cacat']);
					// }
					console.log(data_visualisasi);
					for (i in data['row']) {
						// data_visualisasi.push([data['row'][i]['tahun_bulan'], parseInt(data['row'][i]['jumlah_ok']), parseInt(data['row'][i]['jumlah_reject'])]);
						if (material_ == '') {
							material_name = 'Semua Material';
						}else{
							material_name = data['row'][i]['nama_material'];
						}
						data_visualisasi.push([data['row'][i]['jenis_cacat'], data['row'][i]['jumlah_reject']]);
					}
					console.log(data_visualisasi);
					var data = google.visualization.arrayToDataTable(data_visualisasi);
					var options = {
						hAxis: {
							title: ''
						},
						vAxis: {
							title: 'Total'
						},
						chart: {
							title: 'Laporan Quality Control Bahan Baku Masuk',
							subtitle: material_name + ' - ' + bulan_tahun,
						}
						//bars: 'horizontal' // Required for Material Bar Charts.
					};
					$('#columnchart_material').empty();
					var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
					chart.draw(data, google.charts.Bar.convertOptions(options));
				}
			}
		});
	}

	$('#reset_filter_gudang').on('click', function() {
		$('#bulan_gudang').val('');
		$('#tahun_gudang').val('');
		$('#bahan_baku_g').val('');
		// mulai = $('#mulai_produk').val();
		// akhir = $('#akhir_produk').val();
		// product_id = $('#product').val();
		alert("Filter data gudang direset ! Menampilkan semua data.");
		drawChart_gudang('', '', '');
	});

	$('#do_filter_gudang').on('click', function() {
		bulan = $('#bulan_gudang').val();
		tahun = $('#tahun_gudang').val();
		material = $('#bahan_baku_g').val();		
		alert("Menampilkan data gudang sesuai filter.");
		drawChart_gudang(bulan, tahun, material);
	});

	function drawChart_gudang(bulan, tahun, material) {
		console.log("baris 347 Mulai = " + bulan + " berakhir / Produk = " + tahun + " / " + material);
		$.ajax({
			url: 'http://localhost/myqc/laporan/getDetailRejectOk_gudang',
			method: 'post',
			data: {
				filter: 'true',
				tahun: tahun,
				bulan: bulan,
				material: material
			},
			dataType: 'json',
			success: function(data) {
				console.log(data);
				// console.log("baris 173 Mulai = " + mulai + " berakhir / Material = " + akhir + " / " + material_);
				if (data['row'].length == 0) {
					$('#columnchart_gudang').empty();
					alert("Tidak ada data ditemukan ! ");
					$('#columnchart_gudang').html('<h1 align="center"> Tidak ada data ditemukan ! </h1>');
				} else {
					google.charts.load('current', {
						'packages': ['bar']
					});
					// console.log("baris 177");
					// console.log(data);							
					var data_visualisasi = [
						['Jenis Cacat', 'Jumlah']
					];
					// for (i in data['cacat']) {
					// 	data_visualisasi[0].push(data['cacat'][i]['jenis_cacat']);
					// }
					console.log(data_visualisasi);
					for (i in data['row']) {
						// data_visualisasi.push([data['row'][i]['tahun_bulan'], parseInt(data['row'][i]['jumlah_ok']), parseInt(data['row'][i]['jumlah_reject'])]);
						data_visualisasi.push([data['row'][i]['jenis_cacat'], data['row'][i]['jumlah_cacat']]);
					}
					console.log(data_visualisasi);
					var datap = google.visualization.arrayToDataTable(data_visualisasi);
					var optionsp = {
						hAxis: {
							title: 'Jumlah'
						},
						vAxis: {
							title: 'Jenis Cacat'
						},
						chart: {
							title: 'Grafik Data Masalah Gudang',
							subtitle: 'Rincian Berdasarkan Jenis Cacat',
						}
					};
					$('#columnchart_gudang').empty();
					var chartp = new google.charts.Bar(document.getElementById('columnchart_gudang'));
					chartp.draw(datap, google.charts.Bar.convertOptions(optionsp));
				}
			}
		});
	}
</script>