    <style>
        .testimonials .testimonial-item .testimonial-img {
            width: 100%;
            border-radius: 10px;
            border: 0;
            float: none;
            margin: 0 10px 0 0;
        }

        .testimonials .testimonial-item {
            box-sizing: content-box;
            padding: 10px;
            margin: 10px 15px;
            min-height: 200px;
            box-shadow: 0px 2px 12px rgba(0, 0, 0, 0.08);
            position: relative;
            background: #fff;
            border-radius: 15px;
        }

        .testimonials .testimonial-item {
            box-sizing: content-box;
            padding: 10px 10px 20px 10px;
            margin: 10px 15px;
            min-height: 200px;
            box-shadow: 0px 2px 12px rgba(0, 0, 0, 0.08);
            position: relative;
            background: #fff;
            border-radius: 10px;
            background-color: #2b2b2b;
        }

        img.w-100 {
            border-radius: 10px;
        }

        .card-block.text-center.text-white {
            background-color: #2b2b2b;
            padding: 10px 5px;
            border-radius: 10px;
        }
    </style>
    <section id="clients" class="clients">
        <div class="container" data-aos="zoom-in">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card user-card-full p-3">
                        <div class="row">
                            <div class="col-lg-4 col-sm-12 bg-c-lite-green user-profile m-0 py-0">
                                <div class="card-block text-center text-white">
                                    <div class="m-2">
                                        <?php if (!empty($detail['gambar'])) : ?>
                                            <img class="w-100" src="<?= base_url('/uploads/aparatdesa/' . $detail['gambar']); ?>">
                                        <?php else : ?>
                                            <img class="w-100" src="<?= base_url('/assets/img/default-avatar.png') ?>" alt="Profil Default">
                                        <?php endif; ?>
                                    </div>
                                    <h4 class="mt-4"><?= $detail['nama_lengkap'] ?></h4>
                                    <p class="text-uppercase text-muted"><?= $detail['jabatan'] ?></p>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-lg-8 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <h5><?= $detail['ket_tugas'] ?></h5>
                                        <?= $detail['tugas'] ?>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <h5 class="mt-4"><?= $detail['ket_fungsi'] ?></h5>
                                        <?= $detail['fungsi'] ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Aparat Desa Lainnya</h2>
                <div class="alert alert-info" role="alert">
                    Klik gambar atau nama untuk melihat detail pegawai
                </div>
            </div>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    <?php foreach ($perangkatdesa as $detail) : ?>
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <a href="<?= base_url('frontend/perangkatdesa/detail/' . $detail['slug']); ?>">
                                        <?php if (!empty($detail['gambar'])) : ?>
                                            <img class="testimonial-img" src="<?= base_url('/uploads/aparatdesa/' . $detail['gambar']); ?>">
                                        <?php else : ?>
                                            <img class="testimonial-img" src="<?= base_url('/assets/img/default-avatar.png') ?>" alt="Profil Default">
                                    </a>
                                <?php endif; ?>
                                <a href="<?= base_url('frontend/perangkatdesa/detail/' . $detail['slug']); ?>">
                                    <h3 class="text-center text-white"><?= $detail['nama_lengkap'] ?></h3>
                                </a>
                                <h4 class="text-center text-white text text-uppercase"><?= $detail['jabatan'] ?></h4>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->