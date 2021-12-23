<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Customers
                    <small>Pelanggan</small>
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
            <h3 class="card-title">Data Customers</h3>
            <?php if ($this->fungsi->user_login()->level == 1) { ?>
                <div class="float-right">
                    <a href="<?= site_url('customer/add') ?>" class="btn btn-primary btn-sm btn-flat">
                        <i class="fa fa-plus"></i> Tambah
                    </a>
                </div>
            <?php } ?>   
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <?php if ($this->fungsi->user_login()->level == 1) { ?>
                            <th>Action</th>
                        <?php } ?>   
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?= $no++ ?></td>
                            <td><?= $data->name ?></td>
                            <td><?= $data->phone ?></td>
                            <td><?= $data->address ?></td>
                            <?php if ($this->fungsi->user_login()->level == 1) { ?>
                                <td width="160px">
                                    <a href="<?= site_url('customer/edit/' . $data->customer_id) ?>" class="btn btn-primary btn-xs">
                                        <i class="fa fa-pen"></i> Ubah
                                    </a>
                                    <a href="<?= site_url('customer/del/' . $data->customer_id) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"></i> Hapus
                                    </a>
                                </td>
                            <?php } ?>   
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>