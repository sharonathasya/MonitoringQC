<!DOCTYPE html>
<html>

<head>
    <title>Laporan Permasalahan Gudang</title>
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
    <h3>LAPORAN MASALAH GUDANG</h3>
    <hr>
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
                    <?php endforeach;?>
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
    <a href="<?= base_url('laporan/l_gudang'); ?>" class="no-print">Kembali</a><br>
</body>

</html>