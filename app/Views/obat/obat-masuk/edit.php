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
                            <form action="<?php echo base_url('obat/obat-masuk/edit/' . $data['idstok']); ?>" method="post">
                                <div class="form-group">
                                    <label for="nama_obat">Nama Obat</label>
                                    <select class="form-control" id="nama_obat" name="nama_obat">
                                        <?php foreach ($obat as $no) { ?>
                                            <option value="<?= $no['kode_obat'] ?>" <?= ($data['kode_obat'] == $no['kode_obat']) ? 'selected' : ''; ?>><?= $no['namaobat'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="klasifikasi">Klasifikasi</label>
                                    <input type="text" class="form-control" id="klasifikasi" name="klasifikasi" value="<?= $data['klasifikasi'] ?>" placeholder="Klasifikasi" style="background-color: #ffffff;">
                                </div>
                                <div class="form-group">
                                    <label for="produsen">Produsen</label>
                                    <input type="text" class="form-control" id="produsen" name="produsen" value="<?= $data['produsen'] ?>" placeholder="Produsen" style="background-color: #ffffff;">
                                </div>
                                <div class="form-group">
                                    <label for="supplier">Supplier</label>
                                    <input type="text" class="form-control" id="supplier" name="supplier" value="<?= $data['suplier'] ?>" placeholder="Supplier" style="background-color: #ffffff;">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $data['jumlah'] ?>" placeholder="jumlah" style="background-color: #ffffff;">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga Beli</label>
                                    <input type="number" class="form-control" id="harga" name="harga" value="<?= $data['harga'] ?>" placeholder="harga" style="background-color: #ffffff;">
                                </div>
                                <div class="form-group">
                                    <label for="total">Total</label>
                                    <input type="number" class="form-control" id="total" name="total" placeholder="Total" style="background-color: #efefef;" disabled>
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
<script>
    document.addEventListener('DOMContentLoaded', updateTotal)
    const hargaInput = document.getElementById('harga');
    const satuanInput = document.getElementById('jumlah');
    const totalInput = document.getElementById('total');

    hargaInput.addEventListener('input', updateTotal);
    satuanInput.addEventListener('input', updateTotal);

    function updateTotal() {
        const harga = parseInt(hargaInput.value);
        const satuan = parseInt(satuanInput.value);
        const total = harga * satuan;
        totalInput.value = total;
    }
</script>
<?= $this->EndSection() ?>