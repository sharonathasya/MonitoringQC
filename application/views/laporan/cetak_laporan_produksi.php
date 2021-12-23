<!DOCTYPE html>
<html>

<head>
    <title>Laporan Hasil Produksi</title>
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
    <h3>LAPORAN HASIL PRODUKSI</h3>
    <hr>
    <p>LAPORAN <?php echo ($post['date1'] != '' && $post['date2'] != '') ? "PERIODE " . $post['date1'] . " - " . $post['date2'] : "SEMUA PERIODE"; ?></p>
    <table border="1" cellpadding="4" cellspacing="0" width="100%">
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
            <?php $no = 1;
            foreach ($row->result() as $key => $data) { ?>
                <tr>
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
    <a href="<?= base_url('laporan/l_h_produksi'); ?>" class="no-print">Kembali</a><br>
</body>

</html>