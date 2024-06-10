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
                    <div class="card-header">
                        <?php if (session('pesan')): ?>
                            <div class="alert alert-success alert-dismissible mt-3">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?= session('pesan'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#staticBackdrop">
                                Tambah Data Obat Masuk
                            </button>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama Obat</th>
                                        <th>Nama prodeusen</th>
                                        <th>klasifikasi</th>
                                        <th>Tanggal Expired</th>
                                        <th>Jumlah</th>
                                        <th>Harga Satuan</th>
                                        <th>Total Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $totalHargaSeluruh = 0;
                                    foreach ($obat_masuk_sementara as $oms): ?>
                                        <tr>
                                            <td>
                                                <?= $no++; ?>
                                            </td>
                                            <td>
                                                <?= date('d-m-Y', strtotime($oms['tanggal_masuk'])); ?>
                                            </td>
                                            <td>
                                                <?= $oms['nama_obat']; ?>
                                            </td>
                                            <td>
                                                <?= $oms['nama_produsen']; ?>
                                            </td>
                                            <td>
                                                <?= $oms['klasifikasi']; ?>
                                            </td>
                                            <td>
                                                <?= date('d-m-Y', strtotime($oms['tanggal_expired'])); ?>
                                            </td>
                                            <td>
                                                <?= $oms['jumlah']; ?>
                                            </td>
                                            <td>
                                                <?= $oms['harga_satuan']; ?>
                                            </td>
                                            <td>
                                                <?= $oms['total_harga']; ?>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-warning btn-sm edit-btn" data-toggle="modal"
                                                    data-target="#editModal" data-id="<?= $oms['id_obat_masuk']; ?>"
                                                    data-tanggal="<?= date('d-m-Y', strtotime($oms['tanggal_masuk'])); ?>"
                                                    data-nama="<?= $oms['nama_obat']; ?>"
                                                    data-supplier="<?= $oms['nama_produsen']; ?>"
                                                    data-kategori="<?= $oms['klasifikasi']; ?>"
                                                    data-tanggal="<?= date('d-m-Y', strtotime($oms['tanggal_expired'])); ?>"
                                                    data-jumlah="<?= $oms['jumlah']; ?>"
                                                    data-harga="<?= $oms['harga_satuan']; ?>"
                                                    data-total="<?= $oms['total_harga']; ?>">
                                                    <i class="fas fa-edit"></i>
                                                </a>


                                                <a href="/obat-masuk/hapus/<?= $oms['id_obat_masuk']; ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?');">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <!-- tombol pindah menjadi status diterima -->
                                                <a href="/obat-masuk/diterima/<?= $oms['id_obat_masuk']; ?>"
                                                    class="btn btn-success btn-sm"
                                                    onclick="return confirm('Apakah Anda Yakin Ingin Memindahkan Data Ini ?');">
                                                    <i class="fas fa-share"></i>
                                                </a>
                                            </td>
                                            <?php
                                            $totalHargaSeluruh += $oms['total_harga']; // Akumulasi total harga
                                    endforeach;
                                    ?>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                            // Format total harga seluruh sebagai ribuan dalam bahasa Indonesia
                            $totalHargaSeluruhFormatted = number_format($totalHargaSeluruh, 0, ',', '.');

                            // Menambahkan teks "Rp" di depan angka
                            $totalHargaSeluruhFormatted = 'Rp ' . $totalHargaSeluruhFormatted;
                            ?>


                        </div>
                    </div>
                    <!-- bold -->
                    <div class="col-12">
                        <h5>Total Harga Seluruh:
                            <?= $totalHargaSeluruhFormatted; ?>
                        </h5>

                    </div>
                </div>
            </div>
    </section>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <?= $title; ?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form group -->
                    <form action="/obat-masuk/simpan-sementara" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Nama produsen</label>
                                <select name="id_supplier" id="id_supplier" class="form-control">
                                    <option value="">Pilih produsen</option>
                                    <?php foreach ($supplier as $s): ?>
                                        <option value="<?= $s['id_supplier']; ?>" data-kode="<?= $s['kode_supplier']; ?>">
                                            <?= $s['nama_supplier']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Kode produsen</label>
                                <input type="text" class="form-control" id="kode_supplier" readonly>
                            </div>
                        </div>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
                        </script>

                        <script>
                            // Mendengarkan perubahan pada dropdown "Nama Supplier"
                            document.getElementById("id_supplier").addEventListener("change", function () {
                                // Mendapatkan pilihan yang dipilih
                                var selectedOption = this.options[this.selectedIndex];

                                // Mengisi nilai "Kode Supplier" dengan data kode dari pilihan yang dipilih
                                document.getElementById("kode_supplier").value = selectedOption.getAttribute("data-kode");
                            });
                        </script>

                        <div class="form-group">
                            <label for="">Nama Obat</label><button type="button" class="btn btn-primary btn-sm ml-2"
                                data-toggle="modal" data-target="#modalDalamModal">
                                <i class="fas fa-plus"></i>
                            </button>
                            <select name="id_obat" id="id_obat" class="form-control">
                                <option value="">Pilih Obat</option>
                                <?php foreach ($obat as $o): ?>
                                    <option value="<?= $o['id_obat']; ?>" data-kode="<?= $o['harga']; ?>">
                                        <?= $o['nama_obat']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Jumlah Obat</label>
                                <input type="number" class="form-control" name="jumlah" oninput="validateInput(this);">
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
                            <div class="form-group col-md-6">
                                <label for="">Nominal Harga (SATUAN)</label>
                                <input type="text" class="form-control" id="nominal_harga" name="nominal_harga">
                            </div>
                        </div>

                        <script>
                            // Mendengarkan perubahan pada dropdown "Nama Supplier"
                            document.getElementById("id_obat").addEventListener("change", function () {
                                // Mendapatkan pilihan yang dipilih
                                var selectedOption = this.options[this.selectedIndex];

                                // Mengisi nilai "Kode Supplier" dengan data kode dari pilihan yang dipilih
                                document.getElementById("nominal_harga").value = selectedOption.getAttribute("data-kode");
                            });
                        </script>

                        <!-- Hasil perkalian -->
                        <div class="form-group col-md-6">
                            <label for="">Total</label>
                            <input type="text" class="form-control" id="total" name="total_harga" readonly>
                        </div>

                        <script>
                            function calculateTotal() {
                                // Ambil nilai dari kolom jumlah
                                var jumlah = parseFloat(document.getElementsByName('jumlah')[0].value) || 0;

                                // Ambil nilai dari kolom nominal harga dan hilangkan separator ribuan
                                var nominalHarga = parseFloat(document.getElementById('nominal_harga').value.replace(/\./g, '').replace(/\,/g, '')) || 0;

                                // Hitung total perkalian
                                var total = jumlah * nominalHarga;

                                // Tampilkan hasil total tanpa pemisah ribuan
                                document.getElementById('total').value = total.toFixed(0);
                            }

                            var jumlahInput = document.getElementsByName('jumlah')[0];
                            jumlahInput.addEventListener('input', function () {
                                calculateTotal();
                            });

                            var hargaInput = document.getElementById('nominal_harga');
                            hargaInput.addEventListener('input', function (e) {
                                var unformatted = e.target.value.replace(/\./g, '').replace(/\,/g, '');
                                e.target.value = formatRupiah(unformatted);
                                calculateTotal();
                            });

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

                                rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;

                                return rupiah;
                            }
                        </script>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <!-- Modal Kedua -->
                    <div class="modal fade" id="modalDalamModal" tabindex="-1" role="dialog"
                        aria-labelledby="modalDalamModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalDalamModalLabel">Tambah Data Obat</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/kelola-obat/simpan" method="post">
                                        <?= csrf_field(); ?>
                                        <div class="form-group">
                                            <label for="nama">Nama Jenis Obat</label>
                                            <select class="form-control" name="id_jenis_obat" id="id_jenis_obat">
                                                <option value="">-- Pilih Jenis Obat --</option>
                                                <?php foreach ($jenis_obat as $jo): ?>
                                                    <option value="<?= $jo['id_jenis_obat']; ?>">
                                                        <?= $jo['jenis_obat']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('id_jenis_obat'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama">Kode Obat</label>
                                            <input type="text"
                                                class="form-control <?= ($validation->hasError('kode_obat')) ? 'is-invalid' : ''; ?>"
                                                id="kode_obat" name="kode_obat" placeholder="Masukkan Kode Obat"
                                                value="<?= old('kode_obat', 'AR-' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT)); ?>"
                                                pattern="AR-\d{3}" readonly>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kode_obat'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama">Nama Obat</label>
                                            <input type="text"
                                                class="form-control <?= ($validation->hasError('nama_obat')) ? 'is-invalid' : ''; ?>"
                                                id="nama_obat" name="nama_obat" placeholder="Masukkan Nama Obat"
                                                value="<?= old('nama_obat'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_obat'); ?>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="harga">Harga</label>
                                            <input type="text"
                                                class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>"
                                                id="harga" name="harga" placeholder="Masukkan Harga"
                                                value="<?= old('harga'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('harga'); ?>
                                            </div>
                                        </div>

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

                                            // Fungsi untuk memvalidasi input stok
                                            function validateInput(input) {
                                                // Menghapus karakter "-" dari masukan pengguna
                                                input.value = input.value.replace(/-/g, '');

                                                // Hanya mengizinkan karakter angka
                                                input.value = input.value.replace(/\D/g, '');

                                                // Jika Anda ingin mengizinkan desimal, Anda dapat menggunakan regex ini:
                                                // input.value = input.value.replace(/[^\d.]/g, '');
                                            }

                                            // Menambahkan event listener untuk memvalidasi input stok saat menginputkan
                                            var stokInput = document.getElementById('stok');
                                            stokInput.addEventListener('input', function () {
                                                validateInput(this);
                                            });
                                        </script>

                                        <div class="form-group">
                                            <label for="stok">Stok</label>
                                            <input type="text"
                                                class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>"
                                                id="stok" name="stok" placeholder="Masukkan Stok"
                                                value="<?= old('stok'); ?>" oninput="validateInput(this);">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('stok'); ?>
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
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





</div>
<?= $this->EndSection() ?>