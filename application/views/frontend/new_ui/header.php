<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url(); ?>assets/frontend/assets/img/favicon.png" rel="icon">
    <link href="<?= base_url(); ?>assets/frontend/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>assets/frontend/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="<?= base_url() ?>assets/css/progress_bar.css" rel="stylesheet" />
    <style>
        img.js-svg-injector {
            background-color: #2b2b2b;
            width: 100%;
            height: 131px;
            object-fit: fill;
            object-position: center;
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">
            <a href="<?= base_url('/'); ?>" class="logo me-auto"><img src="<?= base_url(); ?>assets/frontend/assets/img/logo.png" alt=""></a>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li>
                        <a href="<?= base_url('/'); ?>" <?php if ($this->uri->segment(2) == "") {
                                                            echo 'class="active"';
                                                        } ?>>Beranda</a>
                    </li>
                    <li class="dropdown"><a href="#" <?php if ($this->uri->segment(2) == "profil" || $this->uri->segment(2) == "struktur"  || $this->uri->segment(2) == "sambutan" || $this->uri->segment(2) == "pimpinan" || $this->uri->segment(2) == "perangkatdesa") {
                                                            echo 'class="active"';
                                                        } ?>><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?= base_url('/'); ?>frontend/profil" <?php if ($this->uri->segment(2) == "profil") {
                                                                                    echo 'class="active"';
                                                                                } ?>>Profil Desa</a></li>
                            <li><a href="<?= base_url('/'); ?>frontend/sambutan" <?php if ($this->uri->segment(2) == "sambutan") {
                                                                                        echo 'class="active"';
                                                                                    } ?>>Sambutan Kepala Desa</a></li>
                            <li><a href="<?= base_url('/'); ?>frontend/struktur" <?php if ($this->uri->segment(2) == "struktur") {
                                                                                        echo 'class="active"';
                                                                                    } ?>>Struktur Organisasi</a></li>
                            <li><a href="<?= base_url('/'); ?>frontend/perangkatdesa" <?php if ($this->uri->segment(2) == "perangkatdesa") {
                                                                                            echo 'class="active"';
                                                                                        } ?>>Perangkat Desa</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#" <?php if ($this->uri->segment(3) == "berita"  || $this->uri->segment(3) == "detail_berita" || $this->uri->segment(3) == "pengumuman" || $this->uri->segment(3) == "detail_pengumuman" || $this->uri->segment(3) == "pelatihan" || $this->uri->segment(3) == "detail_pelatihan") {
                                                            echo 'class="active"';
                                                        } ?>><span>Informasi</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?= base_url('/'); ?>frontend/informasi/berita" <?php if ($this->uri->segment(3) == "berita" || $this->uri->segment(3) == "detail_berita") {
                                                                                                echo 'class="active"';
                                                                                            } ?>>Berita</a></li>
                            <li><a href="<?= base_url('/'); ?>frontend/informasi/pengumuman" <?php if ($this->uri->segment(3) == "pengumuman" || $this->uri->segment(3) == "detail_pengumuman") {
                                                                                                    echo 'class="active"';
                                                                                                } ?>>Pengumuman</a></li>
                            <li><a href="<?= base_url('/'); ?>frontend/informasi/pelatihan" <?php if ($this->uri->segment(3) == "pelatihan" || $this->uri->segment(3) == "detail_pelatihan") {
                                                                                                echo 'class="active"';
                                                                                            } ?>>Pelatihan</a></li>
                        </ul>
                    </li>
                    <li><a href="<?= base_url('/'); ?>frontend/portofolio" <?php if ($this->uri->segment(2) == "portofolio") {
                                                                                echo 'class="active"';
                                                                            } ?>>Portofolio Kegiatan</a></li>
                    <li class="dropdown"><a href="#" <?php if ($this->uri->segment(2) == "suratonline" || $this->uri->segment(2) == "tracking") {
                                                            echo 'class="active"';
                                                        } ?>><span>e-Surat</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?= base_url('admin/suratonline') ?>" <?php if ($this->uri->segment(2) == "suratonline") {
                                                                                    echo 'class="active"';
                                                                                } ?>>Pengajuan Surat</a></li>
                            <li><a href="<?= base_url('admin/tracking') ?>" <?php if ($this->uri->segment(2) == "tracking") {
                                                                                echo 'class="active"';
                                                                            } ?>>Tracking Surat</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="<?= base_url('') ?>admin/auth/login" class="get-started-btn scrollto">MASUK</a>
        </div>
    </header>
    <?php if ($this->uri->uri_string() != 'admin/home' && $this->uri->uri_string() != '') : ?>
        <main id="main">
            <section class="breadcrumbs">
                <div class="container">
                    <div class="section-title">
                        <h2><?= $title; ?></h2>
                        <p><?= $sub_title; ?></p>
                    </div>
                </div>
            </section><!-- End Breadcrumbs -->
            <figure class="w-100">
                <img class="js-svg-injector" src="<?= base_url(); ?>assets/frontend/assets/img/breadcrumbs.svg" data-parent="#SVGhireUsBg">
            </figure>
        </main>
    <?php endif; ?>