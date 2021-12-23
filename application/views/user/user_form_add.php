<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Users</h1>
                <small>Tambah Data Pengguna</small>
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
            <h3 class="box-title">Tambah Pengguna</h3>
            <div class="float-right">
                <a href="<?= site_url('user') ?>" class="btn btn-outline-warning btn-sm btn-flat">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row justify-content-center">
                <div class="col-md-4 form-horizontal">

                    <form action="" method="post">
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" name="fullname" value="<?= set_value('fullname') ?>" class="form-control <?= form_error('fullname') ? 'is-invalid' : null ?>">
                            <?= form_error('fullname') ?>
                        </div>
                        <div class="form-group">
                            <label>Username *</label>
                            <input type="text" name="username" value="<?= set_value('username') ?>" class="form-control <?= form_error('username') ? 'is-invalid' : null ?>">
                            <?= form_error('username') ?>
                        </div>
                        <div class="form-group">
                            <label>Password *</label>
                            <input type="password" name="password" value="<?= set_value('password') ?>" class="form-control <?= form_error('password') ? 'is-invalid' : null ?>">
                            <?= form_error('password') ?>
                        </div>
                        <div class="form-group">
                            <label>Password Confirmation *</label>
                            <input type="password" name="passconf" value="<?= set_value('passconf') ?>" class="form-control <?= form_error('passconf') ? 'is-invalid' : null ?>">
                            <?= form_error('passconf') ?>
                        </div>
                        <div class="form-group">
                            <label>Address </label>
                            <textarea name="address" class="form-control"><?= set_value('address') ?></textarea>
                            <?= form_error('address') ?>
                        </div>
                        <div class="form-group">
                            <label>Level *</label>
                            <select name="level" class="form-control <?= form_error('level') ? 'is-invalid' : null ?>">
                                <option value="">- Pilih -</option>
                                <option value="1" <?= set_value('level') == 1 ? "selected" : null ?>>Quality Control</option>
                                <option value="2" <?= set_value('level') == 2 ? "selected" : null ?>>Gudang</option>
                                <option value="3" <?= set_value('level') == 3 ? "selected" : null ?>>Produksi</option>
                            </select>
                            <?= form_error('level') ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">
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