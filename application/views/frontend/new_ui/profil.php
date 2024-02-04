<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
        <div class="section-title mb-4">
            <!-- <h2><?= $profil['judul']; ?></h2>
            <p><?= $profil['ket_gambar']; ?></p> -->
        </div>
        <div class="tab-content">
            <div class="tab-pane active show" id="tab-1">
                <div class="row">
                    <div class="col-lg-8 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                        <!-- <h2><?= $profil['judul']; ?></h2> -->
                        <p><?= $profil['isi']; ?></p>
                    </div>
                    <div class="col-lg-4 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                        <img class="w-100" src="<?= base_url('uploads/informasi/' . $profil['gambar']); ?>" alt="Gambar Berita">
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>