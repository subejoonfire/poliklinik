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
                            <a class="btn btn-primary mb-2" href="<?= base_url('obat/obat-masuk/tampilan/tambah') ?>">Tambah Data</a>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Obat</th>
                                        <th>Kandungan Obat</th>
                                        <th>Satuan</th>
                                        <th>Klasifikasi</th>
                                        <th>Produsen</th>
                                        <th>Supplier</th>
                                        <th>Harga</th>
                                        <th>Jumlah Masuk</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($obat as $om) : ?>
                                        <tr>
                                            <td>
                                                <?= $i++; ?>
                                            </td>
                                            <td>
                                                <?= $om['namaobat']; ?>
                                            </td>
                                            <td>
                                                <?= $om['kandungan']; ?>
                                            </td>
                                            <td>
                                                <?= $om['satuan']; ?>
                                            </td>
                                            <td>
                                                <?= $om['klasifikasi']; ?>
                                            </td>
                                            <td>
                                                <?= $om['produsen']; ?>
                                            </td>
                                            <td>
                                                <?= $om['suplier']; ?>
                                            </td>
                                            <td>
                                                <?= $om['harga']; ?>
                                            </td>
                                            <td>
                                                <?= $om['jumlah']; ?>
                                            </td>
                                            <td>
                                                Rp<?= $om['total']; ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('/obat/obat-masuk/hapus/') . $om['idriwayat']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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