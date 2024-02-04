<style>
    .section-bg {
        padding: 0;
        color: #fff;
    }

    .section-bg:before {
        content: "";
        background: transparent;
        position: absolute;
        bottom: 60px;
        top: 60px;
        left: 0;
        right: 0;
        transform: none;
    }

    .team .member .social a {
        transition: color 0.3s;
        color: #111111;
        margin: 0 3px;
        border-radius: 50px;
        width: 60%;
        height: 40px;
        background: #00a8ff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: ease-in-out 0.3s;
        color: #fff;
    }

    .team .member .social a:hover {
        background: #fff;
        color: #00a8ff;
        font-weight: bold;
    }

    .team .member .member-info span {
        text-transform: uppercase;
    }

    .team .member .member-info {
        padding: 25px 15px;
        background-color: #2b2b2b;
    }
</style>
<section id="team" class="team section-bg">
    <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="row">
            <?php foreach ($perangkatdesa as $pd) : ?>
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">

                    <div class="member aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img">
                            <?php if (!empty($pd['gambar'])) : ?>
                                <img class="w-100" src="<?= base_url('/uploads/aparatdesa/' . $pd['gambar']); ?>">
                            <?php else : ?>
                                <img class="w-100" src="<?= base_url('/assets/img/default-avatar.png') ?>" alt="Profil Default">
                            <?php endif; ?>
                            <div class="social">
                                <a class="btn" href="<?= base_url('frontend/perangkatdesa/detail/' . $pd['slug']); ?>">Lihat Profil</a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4 class="text-center text-white">
                                <?php
                                    $namaArray = explode(' ', $pd['nama_lengkap']);
                                    $jumlahKata = count($namaArray);
                                    if ($jumlahKata > 2) {
                                        echo $namaArray[0] . ' ' . $namaArray[$jumlahKata - 1];
                                    } else {
                                        echo $pd['nama_lengkap'];
                                    }
                                    ?>
                            </h4>
                            <span class="text-center text-white"><?= $pd['jabatan'] ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>