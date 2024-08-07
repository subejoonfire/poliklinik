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

                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- form start -->
                            <form action="/kelola-obat/update/<?= $obat['id_obat']; ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama">Nama Jenis Obat</label>
                                        <select class="form-control" name="id_jenis_obat" id="id_jenis_obat">
                                            <option value="<?= $obat['id_jenis_obat']; ?>">
                                                <?= $obat['jenis_obat']; ?>
                                            </option>
                                            <?php foreach ($jenis_obat as $jo): ?>
                                                <option value="<?= $jo['id_jenis']; ?>">
                                                    <?= $jo['jenis_obat']; ?>
                                                </option>
                                            <?php endforeach; ?>

                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('id_jenis_obat'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Obat</label>
                                        <input type="text"
                                            class="form-control <?= ($validation->hasError('nama_obat')) ? 'is-invalid' : ''; ?>"
                                            id="nama_obat" name="nama_obat" placeholder="Masukkan Nama Obat"
                                            value="<?= $obat['nama_obat']; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_obat'); ?>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="text"
                                            class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>"
                                            id="harga" name="harga" placeholder="Masukkan Harga"
                                            value="<?= $obat['harga']; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('harga'); ?>
                                        </div>
                                    </div>


                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
                                    </script>
                                    <script>
                                        function formatRupiah(angka) {
                                            var number_string = angka.toString();
                                            var split = number_string.split(',');
                                            var sisa = split[0].length % 3;
                                            var rupiah = split[0].substr(0, sisa);
                                            var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                                            if (ribuan) {
                                                separator = sisa ? '.' : '';
                                                rupiah += separator + ribuan.join('.');
                                            }

                                            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;

                                            return rupiah;
                                        }

                                        // Menambahkan event listener untuk memperbarui input saat menginputkan
                                        var hargaInput = document.getElementById('harga');
                                        hargaInput.addEventListener('input', function (e) {
                                            var unformatted = e.target.value.replace(/\./g, '').replace(/\,/g, '');
                                            e.target.value = formatRupiah(unformatted);
                                        });
                                    </script>


                                    <div class="form-group">
                                        <label for="harga">Harga Jual</label>
                                        <input type="text"
                                            class="form-control <?= ($validation->hasError('harga_jual')) ? 'is-invalid' : ''; ?>"
                                            id="harga_jual" name="harga_jual" placeholder="Masukkan Harga Jual"
                                            value="<?= $obat['harga_jual']; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('harga_jual'); ?>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="stok">Stok</label>
                                        <input type="number"
                                            class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>"
                                            id="stok" name="stok" placeholder="Masukkan Stok"
                                            value="<?= $obat['stok']; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('stok'); ?>
                                        </div>
                                    </div>

                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <a class="btn btn-warning" href="/kelola-obat">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
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