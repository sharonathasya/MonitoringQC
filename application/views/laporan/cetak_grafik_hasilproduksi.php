<!DOCTYPE html>
<html>

<head>
    <title>VISUALISASI GRAFIK HASIL PRODUKSI</title>
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

        function drawChart() {
            $.ajax({
                url: 'http://localhost/myqc/laporan/getRejectOk_produksi',
                method: 'post',
                data: {
                    filter: 'true',
                    date1: <?php echo "'" . $post['date1'] . "'"; ?>,
                    date2: <?php echo "'" . $post['date2'] . "'"; ?>,
                    product: <?php echo "'" . $post['product'] . "'"; ?>
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data['row'].length == 0) {
                        $('#columnchart_produksi').empty();
                        alert("Tidak ada data ditemukan ! ");
                        $('#columnchart_produksi').html('<h1 align="center"> Tidak ada data ditemukan ! </h1>');
                    } else {
                        google.charts.load('current', {
                            'packages': ['bar']
                        });
                        var data_visualisasi_p = [
                            ['Periode Tahun-Bulan', 'Ok', 'Ng']
                        ];
                        for (i in data['row']) {
                            data_visualisasi_p.push([data['row'][i]['tahun_bulan'], parseInt(data['row'][i]['jumlah_ok']), parseInt(data['row'][i]['jumlah_ng'])]);
                        }
                        console.log(data_visualisasi_p);
                        var datap = google.visualization.arrayToDataTable(data_visualisasi_p);
                        var optionsp = {
                            hAxis: {
                                title: 'Periode dalam Tahun-Bulan'
                            },
                            vAxis: {
                                title: 'Total Produksi'
                            },
                            chart: {
                                title: 'Data Ok dan Ng',
                                subtitle: 'Grafik Jumlah Barang Ok / Ng',
                            }
                        };
                        $('#columnchart_produksi').empty();
                        var chartp = new google.charts.Bar(document.getElementById('columnchart_produksi'));
                        chartp.draw(datap, google.charts.Bar.convertOptions(optionsp));
                    }
                }
            });
        }
    </script>
</head>

<body>
    <?php //var_dump($post); 
    ?>
    <h3>VISUALISASI GRAFIK HASIL PRODUKSI</h3>
    <hr>
    <p>GRAFIK <?php echo ($post['date1'] != '' && $post['date2'] != '') ? "PERIODE " . $post['date1'] . " - " . $post['date2'] : "SEMUA PERIODE"; ?></p>
    <div align="center">
        <div id="columnchart_produksi" style="width: 800px; height: 500px;"></div>
    </div>
    <br>
    <p>
        Dilaporkan oleh,
        <br>
        <br>
        <br>
        Quality Control
    </p>
    <a href="#" class="no-print" onclick="window.print();">Cetak/Print</a><br>
    <a href="<?= base_url('laporan/l_qc'); ?>" class="no-print">Kembali</a><br>
</body>

</html>