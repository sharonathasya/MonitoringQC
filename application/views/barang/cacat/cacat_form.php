<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Jenis Cacat</h1>
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
            <h3 class="box-title"><?= ucfirst($page) ?> Jenis Cacat</h3>
            <div class="float-right">
                <a href="<?= site_url('cacat') ?>" class="btn btn-outline-warning btn-sm btn-flat">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row justify-content-center">
                <div class="col-md-4 form-horizontal">
                    <?php echo form_open_multipart('cacat/process') ?>
                    <label> Kode Cacat *</label>
                    <input type="hidden" name="id" value="<?= $row->cacat_id ?>">
                    <input type="text" name="cacat_id" value="<?= $row->cacat_id ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label> Jenis Cacat *</label>
                        <input type="hidden" name="jenis_cacat" value="<?= $row->cacat_id ?>">
                        <input type="text" name="jenis_cacat" value="<?= $row->jenis_cacat ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label> Penyebab *</label>
                        <input type="text" name="penyebab" value="<?= $row->penyebab ?>" class="form-control" required>
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