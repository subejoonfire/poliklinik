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
                            <div class="card-body">
                                <form action="<?php echo base_url('keuangan/pemasukan/edit/' . $data['id_pemasukan']); ?>" method="post">
                                    <div class="form-group">
                                        <label for="id_keuangan">ID Keuangan</label>
                                        <select class="form-control" id="id_keuangan" name="id_keuangan" style="background-color: #ffffff;">
                                            <?php foreach ($keuangan as $k) : ?>
                                                <option value="<?php echo $k['id_keuangan']; ?>" <?php if ($data['id_keuangan'] == $k['id_keuangan']) echo 'elected'; ?>><?php echo $k['jenis_poli']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_pemasukan">Tanggal Pemasukan</label>
                                        <input type="date" class="form-control" id="tgl_pemasukan" name="tgl_pemasukan" value="<?php echo $data['tgl_pemasukan']; ?>" placeholder="Tanggal Pemasukan" style="background-color: #ffffff;">
                                    </div>
                                    <div class="form-group">
                                        <label for="id_obat">Keterangan</label>
                                        <select class="form-control" id="id_obat" name="id_obat" style="background-color: #ffffff;">
                                            <?php foreach ($jenisobat as $jo) : ?>
                                                <option value="<?php echo $jo['id_obat']; ?>" <?php if ($data['id_obat'] == $jo['id_obat']) echo 'elected'; ?>><?php echo $jo['jenis_obat']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jum_pemasukan">Jumlah Pemasukan</label>
                                        <input type="number" class="form-control" id="jum_pemasukan" name="jum_pemasukan" value="<?php echo $data['jum_pemasukan']; ?>" placeholder="Jumlah Pemasukan" style="background-color: #ffffff;">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
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