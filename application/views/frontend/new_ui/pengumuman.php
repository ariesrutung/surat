<style>
    i.bi.bi-file-earmark-pdf-fill {
        color: #00a8ff;
        font-size: 45px;
    }

    section#blog article.entry {
        border: 2px solid #e1e1e1;
        border-radius: 10px;
        padding: 10px;
    }

    .col-lg-2.d-flex.justify-content-center.align-items-center {
        border-right: 2px solid #e1e1e1;
    }
</style>
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-12 entries">
                <div class="row">
                    <?php if (empty($active_pengumuman)) : ?>
                        <div class="col-lg-12">
                            <p class="text-center">Belum ada data untuk ditampilkan.</p>
                        </div>
                    <?php else : ?>
                        <?php foreach ($active_pengumuman as $info) : ?>
                            <div class="col-lg-6">
                                <article class="entry">
                                    <div class="row">
                                        <div class="col-lg-2 d-flex justify-content-center align-items-center">
                                            <i class="bi bi-file-earmark-pdf-fill"></i>
                                        </div>
                                        <div class="col-lg-10">
                                            <h2 class="entry-title">
                                                <a href="<?= base_url('frontend/informasi/detail_pengumuman/' . $info['slug']); ?>"><?= (strlen($info['judul']) > 70) ? substr($info['judul'], 0, 70) . '...' : $info['judul']; ?></a>
                                            </h2>

                                            <div class="entry-meta">
                                                <ul>
                                                    <?php
                                                            $penulisId = $info['penulis'];
                                                            $query = $this->db->get_where('user', ['id_user' => $penulisId]);
                                                            $penulis = $query->row_array();
                                                            if ($penulis) {
                                                                $namaPenulis = ucfirst($penulis['name']);
                                                            } else {
                                                                $namaPenulis = 'Anonim';
                                                            }
                                                            ?>
                                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <?= $namaPenulis; ?></li>
                                                    <li class="d-flex align-items-center"><i class="bi bi-calendar-date-fill"></i><?= $info['tanggal']; ?></li>
                                                </ul>
                                            </div>
                                            <div class="entry-content">
                                                <p><?= (strlen($info['isi']) > 150) ? substr($info['isi'], 0, 150) . '...' : $info['isi']; ?></p>
                                            </div>
                                        </div>
                                    </div>

                                </article>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
</section>