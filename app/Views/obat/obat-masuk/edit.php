<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <?= $title; ?>
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">
                            <?= $title; ?>
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <?php if (session('pesan')) : ?>
                                <div class="alert alert-success alert-dismissible mt-3">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?= session('pesan'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="<?php echo base_url('obat/obat-masuk/edit/'. $data['id_obat_masuk']); ?>" method="post">
                                <div class="form-group">
                                    <label for="id_obat">Jenis Obat</label>
                                    <select class="form-control" id="id_obat" name="id_obat">
                                        <?php foreach ($jenisobat as $jo) { ?>
                                            <option value="<?= $jo['id_obat'] ?>" <?= ($data['id_obat'] == $jo['id_obat']) ? 'elected' : ''; ?>><?= $jo['jenis_obat'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_masuk">Tanggal Masuk</label>
                                    <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="<?= $data['tanggal_masuk'] ?>" placeholder="Tanggal Masuk" style="background-color: #ffffff;">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $data['jumlah'] ?>" placeholder="Jumlah" style="background-color: #ffffff;">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="text" class="form-control" id="status" name="status" value="<?= $data['status'] ?>" placeholder="Status" style="background-color: #ffffff;">
                                </div>
                                <div class="form-group">
                                    <label for="nomina_harga">Nomina Harga</label>
                                    <input type="number" class="form-control" id="nomina_harga" name="nomina_harga" value="<?= $data['nomina_harga'] ?>" placeholder="Nomina Harga" style="background-color: #ffffff;">
                                </div>
                                <div class="form-group">
                                    <label for="total_harga">Total Harga</label>
                                    <input type="number" class="form-control" id="total_harga" name="total_harga" value="<?= $data['total_harga'] ?>" placeholder="Total Harga" style="background-color: #ffffff;">
                                </div>
                                <div class="form-group">
                                    <label for="klasifikasi">Klasifikasi</label>
                                    <input type="text" class="form-control" id="klasifikasi" name="klasifikasi" value="<?= $data['klasifikasi'] ?>" placeholder="Klasifikasi" style="background-color: #ffffff;">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="<?= base_url('obat/obat-masuk/tampilan') ?>" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>


</div>
<?= $this->EndSection() ?>