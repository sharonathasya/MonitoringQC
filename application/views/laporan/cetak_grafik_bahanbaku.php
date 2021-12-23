<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN QUALITY CONTROL BAHAN BAKU</title>
    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <style type="text/css">
        body {
            font-family: Arial;
        }

        table {
            border-collapse: collapse;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function get_bulan(ang_bulan) {
            var angka = parseInt(ang_bulan) - 1;
            var bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            return bulan[angka];
        }

        function drawChart() {
            console.log("baris 162 BULAN = " + '<?=$post['bulan'] ?>' + " THN / Material = " + '<?=$post['tahun'] ?>' + " / " + '<?=$material['name']; ?>');
        $.ajax({
            url: 'http://localhost/myqc/laporan/getDetailRejectOk_material',
            method: 'post',
            data: {
                filter: 'true',
                bulan: '<?=$post['bulan'] ?>',
                tahun: '<?=$post['tahun'] ?>',
                material: <?="'".$post['material']."'"; ?>
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
                    var material_ = '<?= $post['material']; ?>';
                    var bulan= '<?=$post['bulan'] ?>';
                    var tahun= '<?=$post['tahun'] ?>';
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
                    //  data_visualisasi[0].push(data['cacat'][i]['jenis_cacat']);
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
    </script>
</head>

<body>
    <?php 
        //var_dump($post); die;
    ?>
    <h3>LAPORAN QUALITY CONTROL GRAFIK BAHAN BAKU</h3>
    <hr>
    <p>GRAFIK <?php echo ($_POST['bulan'] != '' && $_POST['tahun'] != '') ? " BULAN " . $_POST['bulan'] . " " . $_POST['tahun'] : "SEMUA PERIODE"; ?></p>
    <div align="center">
        <div id="columnchart_material" style="width: 600px; height: 500px; margin: 20px;"></div>
    </div>
    <br>
    <p align="right">
        Dilaporkan oleh,
        <br>
        <br>
        <br>
        <br>
        Quality Control
    </p>
    <a href="#" class="no-print" onclick="window.print();">Cetak/Print</a><br>
    <a href="<?= base_url('laporan/l_qc'); ?>" class="no-print">Kembali</a><br>
</body>

</html>