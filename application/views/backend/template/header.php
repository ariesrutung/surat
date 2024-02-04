<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/argon/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/argon/assets/img/favicon.png">
    <title><?= $title; ?></title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?= base_url() ?>assets/argon/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/argon/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?= base_url() ?>assets/argon/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= base_url() ?>assets/argon/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- Datatables JS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/argon/assets/css/custom-backend-css/halaman-penduduk.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/argon/assets/css/dataTables.bootstrap4.min.css">
    <script src="<?= base_url() ?>assets/argon/assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/argon/assets/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/argon/assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/argon/assets/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>assets/argon/assets/js/buttons.bootstrap4.min.js"></script>

    <style>
        .col-2 {
            flex: 0 0 auto;
            width: 10%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }

        .col-2 img {
            border-radius: 100%;
            height: auto;
            width: 50%;
        }

        .col-10 {
            flex: 0 0 auto;
            width: 90%;
            display: flex;
            align-items: self-start;
            justify-content: center;
            flex-direction: column;
            padding: 0;
        }
    </style>
</head>

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0 d-flex align-items-center justify-content-center" href="<?= base_url('admin/dashboard') ?>">
                <!-- <span class="font-weight-bold d-flex justify-content-center">PANEL ADMIN</span> -->
                <img src="<?= base_url('') ?>/assets/frontend/assets/img/logo.png" alt="Panel Logo">
            </a>
        </div>
        <hr class="horizontal dark mt-0">

        <!-- Bagian yang menampilkan gambar profil di header panel admin -->
        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($this->uri->segment(2) == 'dashboard') ? 'active' : ''; ?>" href="<?= base_url('admin/dashboard') ?>">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-tv text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Manajemen Surat</h6>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo ($this->uri->segment(3) == 'pengajuan') ? 'active' : ''; ?>" href="<?= base_url('admin/surat/pengajuan') ?>">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-envelope-exclamation-fill text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pengajuan Surat</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($this->uri->segment(3) == 'surat_masuk' || $this->uri->segment(3) == 'editSuratMasuk' || $this->uri->segment(3) == 'tambah_surat_masuk') ? 'active' : ''; ?>" href="<?= base_url('admin/surat/surat_masuk') ?>">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-envelope-check-fill text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Surat Masuk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($this->uri->segment(3) == 'surat_keluar' || $this->uri->segment(3) == 'editSuratKeluar' || $this->uri->segment(3) == 'tambah_surat_keluar') ? 'active' : ''; ?>" href="<?= base_url('admin/surat/surat_keluar') ?>">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-envelope-arrow-up-fill text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Surat Keluar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($this->uri->segment(3) == 'surat_keterangan' || $this->uri->segment(3) == 'editSuratKeterangan' || $this->uri->segment(3) == 'tambah_surat_keterangan') ? 'active' : ''; ?>" href="<?= base_url('admin/surat/surat_keterangan') ?>">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-envelope-plus-fill text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Surat Keterangan</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Manajemen Website</h6>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo ($this->uri->segment(2) == 'informasi' || $this->uri->segment(2) == 'tambah_informasi' || $this->uri->segment(2) == 'edit_informasi') ? 'active' : ''; ?>" href="<?= base_url('admin/informasi') ?>">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-pencil-square text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Informasi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($this->uri->segment(2) == 'slider' || $this->uri->segment(3) == 'tambah_slider' || $this->uri->segment(3) == 'edit_slider') ? 'active' : ''; ?>" href="<?= base_url('admin/slider/index') ?>">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-file-slides-fill text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Slider</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($this->uri->segment(2) == 'portofolio' || $this->uri->segment(3) == 'tambah_portofolio' || $this->uri->segment(3) == 'edit_portofolio') ? 'active' : ''; ?>" href="<?= base_url('admin/portofolio/index') ?>">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-images text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Portofolio</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($this->uri->segment(2) == 'tatakerja' || $this->uri->segment(3) == 'tambah_tatakerja' || $this->uri->segment(3) == 'edit_tatakerja') ? 'active' : ''; ?>" href="<?= base_url('admin/tatakerja/index') ?>">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-signpost-2-fill text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Tata Kerja</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($this->uri->segment(2) == 'profil' || $this->uri->segment(2) == 'tambah_profil' || $this->uri->segment(2) == 'edit_profil') ? 'active' : ''; ?>" href="<?= base_url('admin/profil') ?>">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-file-richtext-fill text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profil</span>
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Manajemen Users</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($this->uri->segment(2) == 'penduduk') ? 'active' : ''; ?>" href="<?= base_url('admin/penduduk') ?>">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-people-fill text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Penduduk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($this->uri->segment(2) == 'pegawai') ? 'active' : ''; ?>" href="<?= base_url('admin/pegawai') ?>">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-person-vcard-fill text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Aparat Desa</span>
                    </a>
                </li>
                <?php if ($this->session->userdata('level') == 'administrator') : ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($this->uri->segment(2) == 'user') ? 'active' : ''; ?>" href="<?= base_url('admin/user') ?>">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-person-fill-gear text-danger text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Pengelola Website</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <div class="row">
                        <div class="col-2">
                            <?php
                            $data = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
                            $gambarPath = 'uploads/profil_pengelola/' . $data['gambar'];
                            if (!empty($data['gambar']) && file_exists($gambarPath)) :
                                ?>
                                <img class="text-center" src="<?= base_url($gambarPath); ?>" alt="Profil Pengguna">
                            <?php else : ?>
                                <img class="text-center" src="<?= base_url('assets/img/default-avatar.png') ?>" alt="Profil Pengguna Default">
                            <?php endif; ?>
                        </div>

                        <div class="col-10">
                            <h5 class="m-0 text-white">Hi,<span>
                                    <?php

                                    $data = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

                                    ?>
                                    <?= ucfirst($data['username']); ?>
                                </span></h5><span class="text-sm text-white">Selamat Datang</span>
                        </div>
                    </div>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="<?= base_url('/') ?>" target="_blank" class="nav-link text-white p-0">
                                <i class="bi bi-globe fixed-plugin-button-nav cursor-pointer"></i>
                            </a>
                        </li>

                        <?php if ($this->session->userdata('id_user') == TRUE) : ?>

                            <li class="d-flex align-items-center">
                                <a class="text-white" href="<?= base_url() ?>admin/logout">
                                    <i class="bi bi-box-arrow-right"></i>
                                </a>
                            </li>

                        <?php else : ?>

                            <li>
                                <a href="<?= base_url() ?>auth/login">
                                    <i class="material-icons">login</i>
                                    <p>Login</p>
                                </a>
                            </li>

                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>