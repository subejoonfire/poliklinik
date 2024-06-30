<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?php echo base_url('assets/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Pegawai</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url('assets/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Poli Klinik</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="/" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>

                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-pills"></i>
                        <p>
                            Kelola Obat
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('/obat/jenis-obat/tampilan'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Kandungan Obat
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('/obat/kelola-obat/tampilan'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Obat
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('/obat/obat-masuk/tampilan'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Obat Masuk
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('/obat/obat-keluar/tampilan'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Obat Keluar
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/kelola-supplier" class="nav-link">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>
                            Kelola Produsen

                        </p>
                    </a>
                </li>

                <li class="nav-header">Barang Masuk & Keluar</li>
                <li class="nav-header">Kelola Pengguna</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Kelola User
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User Management</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-header">Kelola Keuangan</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="#ffffff" d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM288 160a96 96 0 1 1 0 192 96 96 0 1 1 0-192z" />
                            </svg></i>
                        <p>
                            Kelola Keuangan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('keuangan/keuangan/tampilan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Keuangan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('keuangan/saldo/tampilan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Saldo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('keuangan/pemasukan/tampilan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pemasukan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('keuangan/pengeluaran/tampilan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengeluaran</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout

                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>