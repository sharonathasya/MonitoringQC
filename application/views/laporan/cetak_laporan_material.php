<!DOCTYPE html>
<html>
<?php 
date_default_timezone_set('Asia/Jakarta');
?>
<head>
    <title>Laporan Bahan Material Masuk</title>
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
</head>

<body>
    <h3>LAPORAN BAHAN MATERIAL MASUK</h3>
    <hr>
    <!-- <p>LAPORAN <?php echo ($post['tahun'] != '' && $post['bulan'] != '') ? "BULAN " . $post['bulan'] . " / TAHUN " . $post['tahun'] : "SEMUA PERIODE"; ?></p> -->    
    <?php if ($post['tahun'] != '' && $post['bulan'] != '') {?>
        <p>LAPORAN <?php echo  "BULAN " . $post['bulan'] . " / TAHUN " . $post['tahun']; ?></p>
    <?php } if($post['tahun'] != '' && $post['bulan'] == ''){?>
        <p>LAPORAN <?php echo  "TAHUN " . $post['tahun']; ?></p>
    <?php }if ($post['tahun'] == '' && $post['bulan'] == ''){ ?>    
        <p>LAPORAN SEMUA PERIODE</p>
    <?php  }?>
    <table border="1" cellpadding="4" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Transaksi</th>
                <th>Tanggal Masuk</th>
                <th>Bahan Baku</th>
                <th>Supplier</th>
                <th>Jumlah
                    <!-- <small>*per gulung</small> -->
                </th>
                <th>OK</th>
                <th>Reject</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($row->result() as $key => $data) { ?>
                <tr>
                    <td style="width:5%;" align="center"><?= $no++ ?></td>
                    <td><?= $data->t_material_id ?></td>
                    <td><?= indo_date($data->date) ?></td>
                    <td><?= $data->material_name ?></td>
                    <td><?= $data->supplier_name ?></td>
                    <td><?= $data->jumlah ?></td>
                    <td class="text-center"><?= $data->ok ?></td>
                    <td class="text-center"><?= $data->reject ?></td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>
    <br>
    <p>
        Dilaporkan oleh,
        <br>
        <br>
        <br>
        Quality Control
    </p>
    <a href="#" class="no-print" onclick="window.print();">Cetak/Print</a><br>
    <a href="<?= base_url('laporan/l_material'); ?>" class="no-print">Kembali</a><br>
</body>

</html>