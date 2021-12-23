<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Transaksi</h1>
                <small>Masalah Gudang</small>
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
        <div class="card-header">
            <h4 class="box-title"> Add Masalah Bahan Baku Di Gudang
                <div class="float-right">
                    <a href="<?= site_url('t_gudang') ?>" class="btn btn-outline-warning btn-sm btn-flat">
                        <i class="fa fa-undo"></i> Kembali
                    </a>
                </div>
            </h4>
        </div>
        <div class="box-body">
            <div class="row justify-content-center">
                <div class="col-md-4 form-horizontal">
                    <?php echo form_open_multipart('t_gudang/process') ?>
                    <div class="form-group mt-3">
                        <label> Kode Masalah *</label>
                        <input type="hidden" name="id" value="<?= $row->t_gudang_id ?>">
                        <input type="text" name="t_gudang_id" value="<?= $row->t_gudang_id ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label> Tanggal Pelaporan *</label>
                        <input type="hidden" name="date" value="<?= $row->date ?>">
                        <input type="date" name="t_gudang_date" value="<?= date('Y-m-d') ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label> No Lot *</label>
                        <input type="hidden" name="no_lot" value="<?= $row->no_lot ?>">
                        <input type="text" name="no_lot" value="<?= $row->no_lot ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label> Nama Bahan Baku *</label>
                        <select name="material" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php foreach ($material->result() as $key => $data) { ?>
                                <option value="<?= $data->material_id ?>" <?= $data->material_id == $row->material_id ? "selected" : null ?>><?= $data->name ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label> Jumlah Masalah *</label>
                        <input type="hidden" name="jumlah_masalah" value="<?= $row->jumlah_masalah ?>">
                        <input type="text" name="jumlah_masalah" value="<?= $row->jumlah_masalah ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <?php if ($this->fungsi->user_login()->level == 1) { ?>
                            <label> Status Pemeriksaan *</label>
                            <select name="status" class="form-control <?= $row->t_gudang_id ?>">
                                <option value="">- Pilih -</option>
                                <option value="1" <?= set_value('level') == 1 ? "selected" : null ?>>Sudah Dicek</option>
                                <option value="2" <?= set_value('level') == 2 ? "selected" : null ?>>Belum Diek</option>
                            </select>
                        <?php } ?>

                    </div>
                    <!-- <div class="form-group">
                        <label> Status Pemeriksaan *</label>
                        <select type="text" name="status" class="form-control">
                            <option value="">- Pilih -</option>

                        </select>
                    </div> -->
                    <div class="form-group">
                        <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i> Save
                        </button>
                        <button type="Reset" class="btn btn-default btn-flat">Reset</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

</section>

<div class="modal" id="modal-gudang">
    <div class="modal-dialog">
        <div class="model-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Select gudang</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <td>ID gudang</td>
                            <td>Name</td>
                            <td>Supplier</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>