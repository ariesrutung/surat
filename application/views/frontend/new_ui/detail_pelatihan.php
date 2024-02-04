<style>
    .blog .entry .entry-title {
        font-size: 28px;
        font-weight: bold;
        padding: 0;
        margin: 0 0 20px 0;
    }

    .entry-title {
        font-size: 28px;
        font-weight: bold;
        padding: 0;
        margin: 0 0 20px 0;
        color: #212529;
    }

    .w-100 {
        width: 100% !important;
        border-radius: 10px;
        margin-bottom: 10px;
    }

    .blog .entry .entry-img {
        max-height: 100% !important;
        margin: 0 0 5px 0;
        overflow: hidden;
    }

    p.text-sm {
        font-size: 12px;
        text-transform: capitalize !important;
        font-weight: bold;
        font-style: italic;
        color: #00a8ff;
        margin-bottom: 30px;
    }

    .swiper-slide {
        border: 1px solid #999;
        border-radius: 10px;
        margin: 0 10px !important;
    }

    .testimonials .testimonial-item {
        box-sizing: content-box;
        padding: 0;
        margin: 20px 15px;
        min-height: 200px;
        box-shadow: 0px 2px 12px rgba(0, 0, 0, 0.08);
        position: relative;
        background: #fff;
        border-radius: 15px;
    }

    hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid #000;
    }

    section#blog {
        padding-bottom: 0;
    }

    a:hover {
        color: #00a8ff;
    }

    a {
        color: #000;
    }

    section#testimonials {
        margin: 0 !important;
    }

    .testimonials .testimonial-item p {
        font-style: italic;
        margin: 10px auto 15px auto;
    }

    #faq h2:after,
    #testimonials h2::after {
        content: " ";
        position: relative;
        display: block;
        width: 50px;
        height: 3px;
        background: #00a8ff;
        bottom: 0;
        left: calc(50% - 25px px);
        margin-top: 10px;
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
</style>
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-12 entries">
                <article class="entry entry-single">
                    <div class="entry-img">
                        <?php if ($detail['gambar']) : ?>
                            <a href="<?= base_url('frontend/informasi/detail_berita/' . $detail['slug']); ?>">
                                <img class="w-100" src="<?= base_url('uploads/informasi/' . $detail['gambar']); ?>" alt="Gambar Berita">
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="entry-meta">
                        <h2 class="entry-title"><?= $detail['judul']; ?></h2>
                        <ul>
                            <?php
                            $penulisId = $detail['penulis'];
                            $query = $this->db->get_where('user', ['id_user' => $penulisId]);
                            $penulis = $query->row_array();

                            if ($penulis) {
                                $namaPenulis = ucfirst($penulis['name']);
                            } else {
                                $namaPenulis = 'Anonim';
                            }
                            ?>

                            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <?= $namaPenulis; ?></li>
                            <li class="d-flex align-items-center"><i class="bi bi-calendar-date-fill"></i><?= $detail['tanggal']; ?></li>
                        </ul>
                    </div>
                    <div class="entry-content">
                        <p><?= $detail['isi']; ?></p>
                    </div>
                </article>

                <hr>
            </div>
        </div>

        <section id="faq" class="faq">
            <div class="container px-0" data-aos="fade-up">
                <h2 class="entry-title">Materi Pelatihan</h2>
                <ul class="faq-list accordion" data-aos="fade-up">

                    <li>
                        <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
                        <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-bs-toggle="collapse" data-bs-target="#faq2" class="collapsed">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
                        <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-bs-toggle="collapse" data-bs-target="#faq3" class="collapsed">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
                        <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-bs-toggle="collapse" data-bs-target="#faq4" class="collapsed">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
                        <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-bs-toggle="collapse" data-bs-target="#faq5" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
                        <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-bs-toggle="collapse" data-bs-target="#faq6" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
                        <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
                            </p>
                        </div>
                    </li>

                </ul>

            </div>
        </section>

        <section id="testimonials" class="testimonials">
            <div class="container px-0" data-aos="fade-up">
                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="entry-title">Pelatihan Lainnya</h2>
                    <div class="swiper-wrapper">
                        <?php foreach ($pelatihan_terbaru as $info) : ?>
                            <div class="swiper-slide">
                                <div class="testimonial-wrap">
                                    <div class="testimonial-item">
                                        <a href="<?= base_url('frontend/informasi/detail_pelatihan/' . $info->slug); ?>">
                                            <h6 class="mb-3"><?= (strlen($info->judul) > 50) ? substr($info->judul, 0, 50) . '...' : $info->judul; ?></h6>
                                        </a>
                                        <p>
                                            <a href="<?= base_url('frontend/informasi/detail_pelatihan/' . $info->slug); ?>"><?= (strlen($info->isi) > 150) ? substr($info->isi, 0, 150) . '...' : $info->isi; ?></a>
                                        </p>
                                        <h4 class="mt-3"><i class="bi bi-calendar-date-fill"></i> <?= $info->lokasi; ?>, <?= $info->tanggal; ?></h4>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
    </div>
</section>