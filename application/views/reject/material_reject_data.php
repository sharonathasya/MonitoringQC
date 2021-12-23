<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 col-lg-12">
                <h1>Data Material Reject
                </h1>

            </div>
            <div class="col-sm-6 col-lg-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
                    </li>
                </ol>
            </div>
            <div class="col-sm-6 col-lg-6">
                <div class="content">
                    <table class="table table-bordered table-striped" id="table1">
                        <tr>
                            <td width="50%">Tanggal Masuk</td>
                            <td>:</td>
                            <td><?=$thisproblem['date']; ?></td>
                        </tr>
                        <tr>
                            <td width="50%">Nama Material</td>
                            <td>:</td>
                            <td><?=$thisproblem['material_name']; ?></td>
                        </tr>
                        <tr>
                            <td width="50%">Supplier</td>
                            <td>:</td>
                            <td><?=$thisproblem['supplier_name']; ?></td>
                        </tr>
                        <tr>
                            <td width="50%">Panjang</td>
                            <td>:</td>
                            <td><?=$thisproblem['panjang']; ?></td>
                        </tr>
                        <tr>
                            <td width="50%">Jumlah</td>
                            <td>:</td>
                            <td><?=$thisproblem['jumlah']; ?></td>
                        </tr>
                        <tr>
                            <td width="50%">OK</td>
                            <td>:</td>
                            <td><?=$thisproblem['ok']; ?></td>
                        </tr>
                        <tr>
                            <td width="50%">Reject</td>
                            <td>:</td>
                            <td><?=$thisproblem['reject']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <?php $this->view('messages') ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Material Reject</h3>
            <div class="float-right">
                <a href="#" class="btn btn-primary btn-sm btn-flat tambah_detail" data-toggle="modal" data-target="#modal-detail-masalah" data-area="<?php ?>" data-id="<?php ?>">
                <!-- <a href="#" class="btn btn-primary btn-sm btn-flat"> -->
                    <i class="fa fa-plus"></i> Tambah
                </a>
                <a href="<?= site_url('t_material') ?>" class="btn btn-outline-warning btn-sm btn-flat">
                    <i></i> Kembali
                </a>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Reject</th>
                            <th>Penyebab Reject</th>
                            <th>Jumlah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php $i=1; foreach ($detail_problem as $dt): ?>
                        <tr>
                            <td><?=$i; ?></td>
                            <td><?=$dt['jenis_cacat']; ?></td>
                            <td><?=$dt['penyebab']; ?></td>
                            <td><?=$dt['jumlah_reject']; ?></td>
                            <td>
                                <?php if ($this->fungsi->user_login()->level == 1) { ?>
                                    <a href="#" class="btn btn-primary btn-sm btn-flat view_detail" data-toggle="modal" data-target="#modal-detail-masalah" data-id="<?=$dt['material_reject_id'] ?>">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                <?php } ?>
                                <a href="<?= site_url('material_reject/del/' . $dt['material_reject_id'] . '/'. $this_kode) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php $i++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div><!-- /.container-fluid -->
</section>
<!-- MODAL DIALOG -->
<div class="modal fade" id="modal-detail-masalah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title masalah_modal_title">Tambah Detil Masalah</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card" style="height: 100%;">
                    <div class="card-body">
                        <form action="<?=site_url('material_reject/process'); ?>" method="post">
                            <input type="hidden" name="event" value="add" id="event">
                            <input type="hidden" name="t_material_id" value="<?=$this_kode; ?>">
                            <input type="hidden" name="material_reject_id" value="" id="gudang_cacat_id">
                            <div class="row mt-2">
                                <div class="col-3">Material</div>
                                <div class="col">
                                    <input type="text" disabled="" name="material" class="form-control" value="<?=$thisproblem['material_name']; ?>">                                    
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-3">Jenis Cacat<strong>*</strong></div>
                                <div class="col">
                                    <!-- <input type="hidden" name="id_user" class="form-control" value="<?=$user['id']; ?>"> -->
                                    <select class="form-control jenis_cacat" name="cacat_id">
                                        <option value=""> -- Pilih -- </option>
                                        <?php foreach ($jenis_cacat as $j) { ?>
                                            <option value="<?=$j['cacat_id']; ?>"><?=$j['jenis_cacat']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row mt-2">                
                                <div class="col-3">Jumlah Cacat<strong>*</strong></div>
                                <div class="col">
                                    <input type="number" name="jumlah_cacat" class="form-control jumlah_cacat" placeholder="Jumlah ...">
                                </div>                                
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <strong>* Wajib diisi</strong>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-warning text-dark float-right ml-2">Simpan</button>
                                    <a href="#" data-dismiss="modal" aria-label="Close" class="btn btn-secondary float-right">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function() {
    $('.tambah_detail').on('click', function() {
        $('.masalah_modal_title').html('Tambah Detail Masalah');
        $('.jenis_cacat').val('');
        $('.jumlah_cacat').val('');
        $('#event').val('add');
        $('#material_reject_id').val('');        
    });    
    
    $('.view_detail').on('click', function() {
        $('#event').val('edit');
        const id = $(this).data('id');
        console.log(id);
        $('#gudang_cacat_id').val(id);        
        $('.masalah_modal_title').html('Edit Detail Masalah');
        $.ajax({
            url:'<?=site_url('material_reject/get_det_JSON'); ?>',
            data:{id : id},
            method:'post',
            dataType:'json',
            success:function(data) {
                console.log(data);
                $('.jenis_cacat').val(data.cacat_id);
                $('.jumlah_cacat').val(data.jumlah_reject);
            }
        });
    });
});
</script>