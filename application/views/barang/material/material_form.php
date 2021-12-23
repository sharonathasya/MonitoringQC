<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Materials</h1>
                <small>Bahan Baku</small>
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

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Bahan Baku</h3>
            <div class="float-right">
                <a href="<?= site_url('material') ?>" class="btn btn-outline-warning btn-sm btn-flat">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row justify-content-center">
                <div class="col-md-4 form-horizontal">

                    <form action="<?= site_url('material/process') ?>" method="post">
                        <div class="form-group">
                            <label> Nama Bahan Baku *</label>
                            <input type="hidden" name="id" value="<?= $row->material_id ?>">
                            <input type="text" name="material_name" value="<?= $row->name ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Supplier *</label>
                            <select name="supplier" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php foreach ($supplier->result() as $key => $data) { ?>
                                    <option value="<?= $data->supplier_id ?>" <?= $data->supplier_id == $row->supplier_id ? "selected" : null ?>><?= $data->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Save
                            </button>
                            <button type="Reset" class="btn btn-default btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>