<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Transaksi</h1>
                <small>Bahan Baku Masuk</small>
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
            <h4 class="box-title"> Add Bahan Baku Masuk
                <div class="float-right">
                    <a href="<?= site_url('t_material') ?>" class="btn btn-outline-warning btn-sm btn-flat">
                        <i class="fa fa-undo"></i> Kembali
                    </a>
                </div>
            </h4>
        </div>
        <div class="box-body">
            <div class="row justify-content-center">
                <div class="col-md-4 form-horizontal">
                    <?php echo form_open_multipart('t_material/process') ?>
                    <div class="form-group mt-3">
                        <label> Kode Transaksi *</label>
                        <input type="hidden" name="id" value="<?= $row->t_material_id ?>">
                        <input type="text" name="t_material_id" value="<?= $row->t_material_id ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label> Tanggal Diterima *</label>
                        <input type="hidden" name="date" value="<?= $row->date ?>">
                        <input type="date" name="t_material_date" value="<?= date('Y-m-d') ?>" class="form-control" required>
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
                        <label> Supplier </label>
                        <select name="supplier" class="form-control">
                            <option value="">- Pilih -</option>
                            <?php foreach ($supplier->result() as $key => $data) { ?>
                                <option value="<?= $data->supplier_id ?>" <?= $data->supplier_id == $row->supplier_id ? "selected" : null ?>><?= $data->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label> Panjang *</label>
                        <input type="hidden" name="panjang" value="<?= $row->panjang ?>">
                        <input type="text" name="panjang" value="<?= $row->panjang ?>" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label> Diameter *</label>
                        <select name="diameter" class="form-control <?= $row->t_material_id ?>">
                            <option value="">- Pilih -</option>
                            <option value="1" <?= set_value('level') == 1 ? "selected" : null ?>>Sesuai</option>
                            <option value="2" <?= set_value('level') == 2 ? "selected" : null ?>>Tidak Sesuai</option>
                        </select>
                        <?= $row->t_material_id ?>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label> Jumlah *
                                <input type="hidden" name="jumlah" value="<?= $row->jumlah ?>" <?= $this->fungsi->user_login()->level != 1 ? "readonly" : ""; ?>>
                                <input type="text" name="jumlah" value="<?= $row->jumlah ?>" class="form-control" required>
                            </label>
                        </div>
                        <?php if ($this->fungsi->user_login()->level == 1) { ?>
                            <div class="col-md-4">
                                <label> OK
                                    <input type="hidden" name="ok" value="<?= $row->ok ?>">
                                    <input type="text" name="ok" value="<?= $row->ok ?>" class="form-control">
                                </label>
                                </label>
                            </div>
                            <div class="col-md-4">
                                <label> Reject
                                    <input type="hidden" name="reject" value="<?= $row->reject ?>">
                                    <input type="text" name="reject" value="<?= $row->reject ?>" class="form-control">
                                </label>
                                </label>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- <div class="form-group">
                        <label> Status Pemeriksaan *</label>
                        <select type="text" name="status" class="form-control">
                            <option value="">- Pilih -</option>

                        </select>
                    </div> -->
                    <!-- <?php if ($this->fungsi->user_login()->level == 1) { ?>
                        <div class="form-group">
                            <label> Bukti Incoming Inspection Sheet</label>
                            <?php if ($page == 'edit') {
                                    if ($row->image != null) { ?>
                                    <div style="margin-bottom: 5px;">
                                        <img src="<?= base_url('uploads/t_material/' . $row->image) ?>" style="width: 80%;">
                                    </div>
                            <?php
                                    }
                                }
                            ?>
                            <input type="hidden" name="id" value="<?= $row->t_material_id ?>">
                            <input type="file" name="image" class="form-control">
                            <small>(Dapat dibiarkan jika tidak <?= $page == 'edit' ? 'diganti' : 'ada' ?>)</small>
                        </div>
                    <?php } ?> -->
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

<div class="modal" id="modal-material">
    <div class="modal-dialog">
        <div class="model-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Select Material</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <td>ID Material</td>
                            <td>Name</td>
                            <td>Supplier</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>