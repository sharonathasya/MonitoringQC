<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Customers</h1>
                <small>Pelanggan</small>
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
            <h3 class="box-title"><?= ucfirst($page) ?> Customer</h3>
            <div class="float-right">
                <a href="<?= site_url('customer') ?>" class="btn btn-outline-warning btn-sm btn-flat">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row justify-content-center">
                <div class="col-md-4 form-horizontal">

                    <form action="<?= site_url('customer/process') ?>" method="post">
                        <div class="form-group">
                            <label> Customer Name *</label>
                            <input type="hidden" name="id" value="<?= $row->customer_id ?>">
                            <input type="text" name="customer_name" value="<?= $row->name ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Phone *</label>
                            <input type="text" name="phone" value="<?= $row->phone ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Address *</label>
                            <textarea name="addr" class="form-control" required><?= $row->address ?></textarea>
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