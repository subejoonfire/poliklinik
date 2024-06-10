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
                        <?= session()->getFlashdata('pesan'); ?>
                        <?= $validation->listErrors(); ?>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- form start -->
                            <form action="/kelola-supplier/update/<?= $supplier['id_supplier']; ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama">Nama produsen</label>
                                        <input type="text"
                                            class="form-control <?= ($validation->hasError('nama_supplier')) ? 'is-invalid' : ''; ?>"
                                            id="nama_supplier" name="nama_supplier" placeholder="Masukkan Nama Obat"
                                            value=" <?= $supplier['nama_supplier']; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_supplier'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama">Alamat Produsen</label>
                                        <input type="text"
                                            class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>"
                                            id="alamat" name="alamat" placeholder="Masukkan Alamat Supplier"
                                            value="<?= $supplier['alamat']; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('alamat'); ?>
                                        </div>
                                    </div>

                                    </div>
                                    <script>
                                        function validateInput(input) {
                                            // Menghapus karakter "-" dari masukan pengguna
                                            input.value = input.value.replace(/-/g, '');

                                            // Hanya mengizinkan karakter angka
                                            input.value = input.value.replace(/\D/g, '');

                                            // Jika Anda ingin mengizinkan desimal, Anda dapat menggunakan regex ini:
                                            // input.value = input.value.replace(/[^\d.]/g, '');
                                        }
                                    </script>



                                    <div class="card-footer">
                                        <a class="btn btn-warning" href="/kelola-supplier">Kembali</a>
                                        <button type="submit" id="submit-button" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
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

<?= $this->EndSection() ?>