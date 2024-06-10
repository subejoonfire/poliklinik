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
                            <form action="<?php echo base_url('keuangan/keuangan/edit/' . $data['id_keuangan']); ?>" method="post">
                                <div class="form-group">
                                    <label for="hari_mulai">Hari Mulai</label>
                                    <select class="form-control" id="hari_mulai" name="hari_mulai" style="background-color: #ffffff;">
                                        <?php foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari) : ?>
                                            <option value="<?php echo $hari; ?>" <?php if ($data['hari_mulai'] == $hari) echo 'elected'; ?>><?php echo $hari; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jam_mulai">Jam Mulai</label>
                                    <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" value="<?php echo $data['jam_mulai']; ?>" placeholder="Jam Mulai" style="background-color: #ffffff;">
                                </div>
                                <div class="form-group">
                                    <label for="hari_berakhir">Hari Berakhir</label>
                                    <select class="form-control" id="hari_berakhir" name="hari_berakhir" style="background-color: #ffffff;">
                                        <?php foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari) : ?>
                                            <option value="<?php echo $hari; ?>" <?php if ($data['hari_berakhir'] == $hari) echo 'elected'; ?>><?php echo $hari; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jam_berakhir">Jam Berakhir</label>
                                    <input type="time" class="form-control" id="jam_berakhir" name="jam_berakhir" value="<?php echo $data['jam_berakhir']; ?>" placeholder="Jam Berakhir" style="background-color: #ffffff;">
                                </div>
                                <div class="form-group">
                                    <label for="jenis_poli">Jenis Poli</label>
                                    <select class="form-control" id="jenis_poli" name="jenis_poli" style="background-color: #ffffff;">
                                        <?php foreach (['Poli Gigi', 'Poli Umum'] as $jenis_poli) : ?>
                                            <option value="<?php echo $jenis_poli; ?>" <?php if ($data['jenis_poli'] == $jenis_poli) echo 'elected'; ?>><?php echo $jenis_poli; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
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