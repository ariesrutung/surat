<style>
    img.w-100 {
        height: 85%;
        object-fit: cover;
        object-position: center;
    }
</style>
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
        <div class="tab-content">
            <div class="tab-pane active show" id="tab-1">
                <div class="row">
                    <div class="col-lg-7 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                        <!-- <h2><?= $sambutan['judul']; ?></h2> -->
                        <p><?= $sambutan['isi']; ?></p>
                    </div>
                    <div class="col-lg-5 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                        <img class="w-100" src="<?= base_url('uploads/informasi/' . $sambutan['gambar']); ?>" alt="Gambar Berita">
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>