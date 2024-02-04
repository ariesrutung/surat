<style>
    img.w-100 {
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
    }
</style>
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-12 entries">
                <div class="row">
                    <?php if (empty($active_berita)) : ?>
                        <div class="col-lg-12">
                            <p class="text-center">Belum ada data untuk ditampilkan.</p>
                        </div>
                    <?php else : ?>
                        <?php foreach ($active_berita as $info) : ?>
                            <div class="col-lg-4">
                                <article class="entry">
                                    <div class="entry-img">
                                        <?php if ($info['gambar']) : ?>
                                            <a href="<?= base_url('frontend/informasi/detail_berita/' . $info['slug']); ?>">
                                                <img class="w-100" src="<?= base_url('uploads/informasi/' . $info['gambar']); ?>" alt="Gambar Berita">
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <h2 class="entry-title">
                                        <a href="<?= base_url('frontend/informasi/detail_berita/' . $info['slug']); ?>"><?= (strlen($info['judul']) > 50) ? substr($info['judul'], 0, 50) . '...' : $info['judul']; ?></a>
                                    </h2>

                                    <div class="entry-meta">
                                        <ul>
                                            <?php
                                                    // Assuming $info adalah data dari tabel informasi
                                                    $penulisId = $info['penulis'];

                                                    // Ambil nama penulis dari tabel user
                                                    $query = $this->db->get_where('user', ['id_user' => $penulisId]);
                                                    $penulis = $query->row_array();

                                                    if ($penulis) {
                                                        $namaPenulis = ucfirst($penulis['name']); // Ganti 'name' dengan kolom yang sesuai di tabel user
                                                    } else {
                                                        $namaPenulis = 'Anonim';
                                                    }
                                                    ?>

                                            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <?= $namaPenulis; ?></li>
                                            <li class="d-flex align-items-center"><i class="bi bi-calendar-date-fill"></i><?= $info['tanggal']; ?></li>
                                        </ul>
                                    </div>

                                    <div class="entry-content">
                                        <p>
                                            <p><?= (strlen($info['isi']) > 150) ? substr($info['isi'], 0, 150) . '...' : $info['isi']; ?></p>
                                        </p>
                                    </div>

                                </article>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
</section>