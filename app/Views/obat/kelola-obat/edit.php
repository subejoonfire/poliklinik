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
                            <form action="<?php echo base_url('obat/kelola-obat/edit/' . $obat['kode_obat']); ?>" method="post">
                                <div class="form-group">
                                    <label for="kode_obat">Kode Obat</label>
                                    <input type="text" class="form-control" id="kode_obat" name="kode_obat" value="<?= $obat['kode_obat'] ?>" placeholder="Kode Obat" style="background-color: #ffffff;">
                                </div>
                                <div class="form-group">
                                    <label for="idkandungan">Jenis Obat</label>
                                    <select class="form-control" id="idkandungan" name="idkandungan">
                                        <?php foreach ($kandungan as $jenis) : ?>
                                            <option value="<?= $jenis['idkandungan'] ?>" <?= ($obat['idkandungan'] == $jenis['idkandungan']) ? 'elected' : ''; ?>><?= $jenis['kandungan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="namaobat">Nama Obat</label>
                                    <input type="text" class="form-control" id="namaobat" name="namaobat" value="<?= $obat['namaobat'] ?>" placeholder="Nama Obat" style="background-color: #ffffff;">
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="<?= base_url('obat/kelola-obat/tampilan') ?>" class="btn btn-secondary">Kembali</a>
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