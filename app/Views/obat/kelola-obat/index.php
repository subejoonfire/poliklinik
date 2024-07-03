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
                            <a class="btn btn-primary mb-2" href="<?= base_url('obat/kelola-obat/tampilan/tambah') ?>">Tambah Data</a>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Obat</th>
                                        <th>Nama Obat</th>
                                        <th>Satuan Obat</th>
                                        <th>Kandungan Obat</th>
                                        <th>Stok Obat</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($obat as $o) :
                                        $stok = new \App\Models\StokModel();
                                        $data1 = $stok->where('kode_obat', $o['kode_obat'])->first();
                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $o['kode_obat']; ?></td>
                                            <td><?= $o['namaobat']; ?></td>
                                            <td><?= $o['satuan']; ?></td>
                                            <td><?= $o['kandungan']; ?></td>
                                            <td><?= $o['kandungan']; ?></td>
                                            <td><?= $data1['stok'] ?? '0'; ?></td>
                                            <td>
                                                <a href="<?= base_url('obat/kelola-obat/tampilan/edit/' . $o['kode_obat']); ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('obat/kelola-obat/hapus/' . $o['kode_obat']); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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