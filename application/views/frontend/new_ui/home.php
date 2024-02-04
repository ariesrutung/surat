<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    .pl-0 {
        padding-left: 0 !important;
    }

    .pl-3 {
        padding-left: 30px !important;
    }

    .content.col-xl-8.d-flex.align-items-stretch.pl-3 {
        padding-top: 0;
    }

    .content.col-xl-8.d-flex.align-items-stretch.pl {
        padding-bottom: 0;
    }

    section#tabs h3,
    h3.tujuan {
        font-weight: 700 !important;
        font-size: 34px !important;
        margin-bottom: 30px !important;
    }

    section#tabs li {
        padding: 5px 0;
    }

    .section-bg:before {
        content: "";
        background: #1b1b1b;
        position: absolute;
        bottom: 60px;
        top: 30px;
        left: 0;
        right: 0;
        transform: skewY(-1deg);
    }

    section#services {
        padding-top: 80px;
    }

    h3.tujuan:after,
    h3:after {
        content: " " !important;
        position: relative;
        display: block;
        width: 50px;
        height: 3px;
        background: #00a8ff;
        bottom: 0;
        left: 0;
        margin-top: 10px;
    }

    #carousel {
        clip-path: polygon(100% 0, 100% 95%, 0 100%, 0 0);
        /* clip-path: polygon(100% 0, 100% 95%, 50% 95%, 0 100%, 0 0); */
    }

    #carousel h1 {
        margin: 0;
        font-size: 48px;
        font-weight: 700;
        color: #fff;
        text-align: left !important;
        width: 100%;
        padding-right: 40%;
    }

    #carousel h2 {
        color: #fff;
        margin: 10px 0 0 0;
        font-size: 24px;
        text-align: left;
        width: 100%;
        padding-right: 30%;
    }

    .testimonial-wrap {
        border: 1px solid #d1d1d1 !important;
        border-radius: 5px;
    }

    .swiper-slide {
        width: 50% !important;
    }

    .testimonials .testimonial-item {
        box-sizing: content-box;
        padding: 15px;
        margin: 15px;
        min-height: auto !important;
        box-shadow: 0px 2px 12px rgba(0, 0, 0, 0.08);
        position: relative;
        background: #fff;
        border-radius: 15px;
    }

    .testimonials .testimonial-item p {
        font-style: normal !important;
        margin: 30px auto 15px auto;
    }

    .testimonials .testimonial-item p {
        font-style: normal !important;
        margin: 0;
    }

    .testimonials .swiper-pagination .swiper-pagination-bullet {
        width: 20px;
        height: 10px;
        background-color: #fff;
        opacity: 1;
        border: 1px solid #00a8ff;
        border-radius: 10px !important;
    }

    .testimonials .swiper-pagination .swiper-pagination-bullet-active {
        background-color: #00a8ff !important;
    }

    section#testimonials {
        padding-bottom: 0;
    }

    #services p.mt-3 {
        color: #999;
    }

    i.bi.bi-calendar-date-fill {
        font-size: 20px !important;
        margin-right: 10px;
        color: #999;
    }

    hr {
        margin-top: 1rem;
        margin-bottom: 0;
        border: 0;
        border-top: 2px solid rgb(255 255 255);
    }

    i.bi.bi-file-earmark-pdf-fill {
        font-size: 30px;
    }

    .btn.btn-more {
        color: #fff;
        background: transparent;
        border: 2px solid #00a8ff;
        border-radius: 30px;
    }

    a.btn.btn-more:hover {
        color: #fff;
        background-color: #00a8ff;
    }

    .btn.btn-danger {
        border-radius: 30px;
        border: 2px solid #00a8ff;
        background-color: #00a8ff;
    }

    a.btn.btn-danger:hover {
        border-radius: 30px;
        background-color: transparent;
        border: 2px solid #00a8ff;
        color: #212529;
    }

    #tabs img.w-100 {
        border-radius: 10px;
        margin: 10px 0;
        object-fit: cover;
        height: 400px !important;
        object-position: center top;
    }

    a:hover {
        color: #00a8ff;
    }

    a {
        color: #000;
    }


    section#about li {
        padding: 5px 0;
    }

    section#about ul i {
        font-size: 20px;
        padding-right: 4px;
        color: #00a8ff;
    }

    section#about ul {
        list-style: none;
        padding: 0;
    }

    section#about .w-100 {
        width: 100% !important;
        height: auto !important;
        object-fit: contain;
    }

    canvas#pendidikanChart,
    canvas#pekerjaanChart {
        background-color: #fff;
        border-radius: 10px;
        padding: 10px;
    }
</style>
<div id="carousel" class="carousel slide" data-ride="carousel">
    <?php if (!empty($active_sliders)) : ?>
        <ol class="carousel-indicators">
            <?php foreach ($active_sliders as $index => $slider) : ?>
                <li data-target="#carousel" data-slide-to="<?php echo $index; ?>" <?php echo ($index == 0) ? 'class="active"' : ''; ?>></li>
            <?php endforeach; ?>
        </ol>
        <div class="carousel-inner">
            <?php foreach ($active_sliders as $index => $slider) : ?>
                <div class="carousel-item <?= ($index == 0) ? 'active' : ''; ?>">
                    <img style="background-size: contain !important;" src="<?php echo base_url('uploads/slider/' . $slider->gambar); ?>" alt="Carousel Image">
                    <div class="carousel-caption">
                        <h1 class="animated fadeInLeft"><?= $slider->judul; ?></h1>
                        <h2 class="animated fadeInRight"><?= $slider->subjudul; ?></h2>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php if (count($active_sliders) > 1) : ?>
            <!-- Tampilkan carousel control hanya jika ada lebih dari satu gambar yang aktif -->
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        <?php endif; ?>
    <?php else : ?>
        <!-- Tampilkan gambar default jika tidak ada slider yang aktif -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img style="background-size: contain !important;" src="<?php echo base_url('assets/frontend/assets/img/blog/blog-recent-4.jpg'); ?>" alt="Default Image">
            </div>
        </div>
    <?php endif; ?>
</div>


<main id="main">

    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-left">

            <div class="section-title mb-4">
                <h2>Pengumuman Hari ini</h2>
                <p>Dapatkan pengumuman terbaru per hari ini terkait kementerian desa.</p>
            </div>
            <div class="row">
                <?php if (!empty($pengumuman_terbaru)) : ?>
                    <?php foreach ($pengumuman_terbaru as $pg) : ?>
                        <div class="col-md-6">
                            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                                <h4 class="ml-0"><a href="<?= base_url('frontend/informasi/detail_pengumuman/' . $pg->slug); ?>"><?= (strlen($pg->judul) > 100) ? substr($pg->judul, 0, 100) . '...' : $pg->judul; ?></a></h4>
                                <!-- <p><?= (strlen($pg->isi) > 100) ? substr($pg->isi, 0, 100) . '...' : $pg->isi; ?></p> -->
                                <hr>

                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="mt-3 ml-0"><i class="bi bi-calendar-date-fill"></i><?= $pg->lokasi; ?>, <?= $pg->tanggal; ?></p>
                                    </div>
                                    <div class="col-md-4 d-flex justify-content-end align-items-center">
                                        <i class="bi bi-file-earmark-pdf-fill"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="col-md-12">
                        <p class="text-center">Belum ada pengumuman untuk ditampilkan.</p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row">
                <?php if (!empty($pengumuman_terbaru)) : ?>
                    <div class="col-md-12 d-flex justify-content-start align-items-center">
                        <a class="btn btn-more" href="<?= base_url('frontend/informasi/pengumuman'); ?>">Pengumuman Lainnya</a>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </section>

    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">
            <div class="section-title mb-4">
                <h2><?= $title2; ?></h2>
                <p><?= $sub_title2; ?></p>
            </div>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    <?php if (!empty($berita_terbaru)) : ?>
                        <?php foreach ($berita_terbaru as $info) : ?>
                            <div class="swiper-slide">
                                <div class="testimonial-wrap">
                                    <div class="testimonial-item">
                                        <a href="<?= base_url('frontend/informasi/detail_berita/' . $info->slug); ?>">
                                            <h6 class="mb-3"><?= (strlen($info->judul) > 50) ? substr($info->judul, 0, 50) . '...' : $info->judul; ?></h6>
                                        </a>
                                        <p>
                                            <a href="<?= base_url('frontend/informasi/detail_berita/' . $info->slug); ?>">
                                                <?= (strlen($info->isi) > 150) ? substr($info->isi, 0, 150) . '...' : $info->isi; ?>
                                            </a>
                                        </p>
                                        <h4 class="mt-3"><i class="bi bi-calendar-date-fill"></i><?= $info->lokasi; ?>, <?= $info->tanggal; ?></h4>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="col-md-12">
                            <p class="text-center">Belum ada pengumuman untuk ditampilkan.</p>
                        </div>
                    <?php endif; ?>

                </div>
                <div class="swiper-pagination"></div>
            </div>

            <div class="row">
                <?php if (!empty($berita_terbaru)) : ?>
                    <div class="col-md-12 d-flex justify-content-start align-items-center">
                        <a class="btn btn-danger" href="<?= base_url('frontend/informasi/berita'); ?>">Berita Lainnya</a>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </section>

    <section id="about" class="section-bg tabs">
        <div class="container" data-aos="fade-up">
            <div class="section-title mb-4">
                <h2><?= $alur_masuk['judul']; ?></h2>
                <!-- <p><?= $alur_masuk['ket_gambar']; ?></p> -->
            </div>
            <div class="row no-gutters mb-5" data-aos="fade-up" data-aos-delay="200">
                <div class="content col-lg-7 d-flex align-items-stretch pl">
                    <div class="content">
                        <h3><?= $alur_masuk['ket_gambar']; ?></h3>
                        <p><?= $alur_masuk['isi']; ?></p>
                    </div>
                </div>
                <div class="col-lg-5 d-flex align-items-stretch">
                    <img class="w-100 ml-3" src="<?= base_url('uploads/profil/' . $alur_masuk['gambar']); ?>" alt="Gambar Berita">
                </div>
            </div>

            <div class="row no-gutters" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-5 d-flex align-items-stretch">
                    <img class="w-100" src="<?= base_url('uploads/profil/' . $alur_keluar['gambar']); ?>" alt="Gambar Berita">
                </div>

                <div class="content col-lg-7 d-flex align-items-stretch pl-3">
                    <div class="content">
                        <h3><?= $alur_keluar['ket_gambar']; ?></h3>
                        <p><?= $alur_keluar['isi']; ?></p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="tabs" class="tabs">
        <div class="container" data-aos="fade-up">
            <div class="section-title mb-4">
                <h2><?= $fungsi_tujuan['judul']; ?></h2>
                <p><?= $fungsi_tujuan['ket_gambar']; ?></p>
            </div>
            <div class="tab-content">
                <div class="tab-pane active show" id="tab-1">
                    <div class="row">
                        <div class="col-lg-9 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                            <p><?= $fungsi_tujuan['isi']; ?></p>
                        </div>
                        <div class="col-lg-3 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                            <img class="w-100" src="<?= base_url('uploads/informasi/' . $fungsi_tujuan['gambar']); ?>" alt="Gambar Berita">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section id="tabs" class="tabs">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>GRAFIK PERBANDINGAN PENDUDUK</h2>
                <p>Grafik di bawah ini menampilkan data penduduk berdasarkan pendidikan dan pekerjaan</p>
            </div>

            <div class="row mt-5">
                <div class="col-lg-6 col-md-12">
                    <h4 class="mb-4">Berdasarkan Pendidikan</h4>
                    <canvas id="pendidikanChart" height="200"></canvas>
                </div>

                <div class="col-lg-6 col-md-12">
                    <h4 class="mb-4">Berdasarkan Pekerjaan</h4>
                    <canvas id="pekerjaanChart" height="200"></canvas>
                </div>
            </div>
        </div>
    </section>

</main>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var myListItems = document.querySelectorAll("section#tabs ul li");

        myListItems.forEach(function(item) {
            var iconElement = document.createElement("i");
            iconElement.className = "bi bi-check2-all";
            item.insertBefore(iconElement, item.firstChild);
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        var myListItems = document.querySelectorAll("section#about ul li");

        myListItems.forEach(function(item) {
            var iconElement = document.createElement("i");
            iconElement.className = "bi bi-check2-all";
            item.insertBefore(iconElement, item.firstChild);
        });
    });
</script>

<script>
    var pendidikanData = <?php echo json_encode($pendidikan_data); ?>;

    var labels = [];
    var data = [];

    for (var i = 0; i < pendidikanData.length; i++) {
        labels.push(pendidikanData[i].pendidikan);
        data.push(pendidikanData[i].total);
    }
    var ctx = document.getElementById('pendidikanChart').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                ],
            }]
        },
        options: {}
    });
</script>

<script>
    var pekerjaanData = <?php echo json_encode($pekerjaan_data); ?>;

    var labels = [];
    var data = [];

    for (var i = 0; i < pekerjaanData.length; i++) {
        labels.push(pekerjaanData[i].pekerjaan);
        data.push(pekerjaanData[i].total);
    }
    var ctx = document.getElementById('pekerjaanChart').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                ],
            }]
        },
        options: {}
    });
</script>