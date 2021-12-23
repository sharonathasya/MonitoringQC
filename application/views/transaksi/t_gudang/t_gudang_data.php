<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Transaksi
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
    <?php $this->view('messages') ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Masalah Bahan Baku Di Gudang</h3>
            <div class="float-right">
                <a href="<?= site_url('t_gudang/add') ?>" class="btn btn-primary btn-sm btn-flat">
                    <i class="fa fa-plus"></i> Tambah
                </a>
            </div>
        </div>
        <?php if (!isset($_POST)) {
            echo "Ini inisial, ketika pertama datang";
        } ?>
        <div class="card-body table-responsive">
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
                        <?php if ($this->fungsi->user_login()->level == 1) { ?>
                            <th>
                                Detail Masalah
                            </th>
                        <?php } ?>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?= $no++ ?></td>
                            <td><?= $data->t_gudang_id ?></td>
                            <td><?= indo_date($data->date) ?></td>
                            <td><?= $data->no_lot ?></td>
                            <td><?= $data->material_name ?></td>
                            <td class="text-center"><?= $data->jumlah_masalah ?></td>
                            <td><span class="badge <?= $data->status == 1 ? 'badge-success' : 'badge-danger' ?>"><?= $data->status == 1 ? 'Sudah Dicek' : 'Belum Dicek' ?></span></td>
                            <?php if ($this->fungsi->user_login()->level == 1) { ?>
                                <td class="text-center">
                                    <a href="<?= site_url('gudang_reject/view/') . $data->t_gudang_id; ?>" class="btn btn-warning btn-xs">
                                        <i class="fa fa-lg"></i> Input
                                    </a>
                                    <!-- <form action="<?= site_url('gudang_reject') ?>" method="post">
                                        <input type="hidden" name="kode" value="<?= $data->t_gudang_id; ?>">
                                        <button class="btn btn-warning btn-xs"><i class="fa fa-lg"></i> Input</button>
                                    </form> -->
                                </td>
                            <?php } ?>
                            <td>
                                <?php if ($this->fungsi->user_login()->level == 1) { ?>
                                    <a href="<?= site_url('t_gudang/edit/' . $data->t_gudang_id) ?>" class="btn btn-primary btn-xs">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                <?php } ?>
                                <a href="<?= site_url('t_gudang/del/' . $data->t_gudang_id) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <!-- <a href="<?= site_url('t_gudang/detail/' . $data->t_gudang_id) ?>" class="btn btn-default btn-xs">
                                    <i class="fa fa-eye"></i>
                                </a> -->
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>