<style>
    #fungsi ul i,
    #tugas ul i {
        font-size: 20px !important;
        padding-right: 4px !important;
        color: #00a8ff !important;
        position: relative;
    }

    a.text-bold {
        color: #00a8ff !important;
    }

    .faq #tugas_fungsi li {
        margin-bottom: 0 !important;
    }
</style>

<section id="tabs" class="tabs">
    <div class="container aos-init aos-animate" data-aos="fade-up">

        <ul class="nav nav-tabs row d-flex" role="tablist">
            <li class="nav-item col-6" role="presentation">
                <a class="nav-link show active" data-bs-toggle="tab" data-bs-target="#tab-1" aria-selected="true" role="tab">
                    <i class="ri-gps-line"></i>
                    <h4 class="d-none d-lg-block">Dasar Hukum</h4>
                </a>
            </li>
            <li class="nav-item col-6" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2" aria-selected="false" role="tab" tabindex="-1">
                    <i class="ri-body-scan-line"></i>
                    <h4 class="d-none d-lg-block">Kedudukan Tugas & Kewenangan Perangkat Desa</h4>
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active show" id="tab-1" role="tabpanel">
                <div class="row">
                    <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                        <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.
                        </p>
                        <ul>
                            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                            <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                        </ul>
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum
                        </p>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 text-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <img src="assets/img/tabs-1.jpg" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab-2" role="tabpanel">
                <div class="row">
                    <div class="col-lg-12 order-2 order-lg-1 mt-3 mt-lg-0">
                        <section id="faq" class="faq">
                            <div class="container aos-init aos-animate" data-aos="fade-up">
                                <ul class="faq-list accordion aos-init aos-animate" data-aos="fade-up">
                                    <?php $no = 1; ?>
                                    <?php foreach ($tatakerja as $key) : ?>
                                        <?php
                                            $accordion_id = isset($key['jabatan']) ? str_replace(' ', '', $key['jabatan']) : '';
                                            // $show_class = $no === 1 ? ' show' : ''; // Add 'show' class only to the first accordion
                                            ?>

                                        <li>
                                            <a data-bs-toggle="collapse" class="text-bold" data-bs-target="#faq<?= $accordion_id; ?>" aria-expanded="true">
                                                Kedudukan, Tugas, dan Wewenang <?= isset($key['jabatan']) ? $key['jabatan'] : ''; ?>
                                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i>
                                            </a>

                                            <div id="faq<?= $accordion_id; ?>" class="collapse" data-bs-parent=".faq-list">
                                                <div class="row mt-4">
                                                    <div id="tugas_fungsi" class="col-lg-8">
                                                        <div id="tugas" class="tugas mt-4">
                                                            <ul>
                                                                <?= isset($key['tugas']) ? $key['tugas'] : ''; ?>
                                                            </ul>
                                                        </div>
                                                        <div id="fungsi" class="fungsi mt-4">
                                                            <ul>
                                                                <?= isset($key['fungsi']) ? $key['fungsi'] : ''; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <img class="w-100" src="<?= base_url('uploads/aparatdesa/' . $key['gambar']); ?>" alt="Gambar">
                                                        <h3 class="text-center"><?= isset($key['jabatan']) ? $key['jabatan'] : ''; ?></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </ul>

                            </div>
                        </section>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 text-center">
                        <img src="assets/img/tabs-2.jpg" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var myListItems = document.querySelectorAll(".tabs .tab-pane #tugas_fungsi ul>li");

        myListItems.forEach(function(item) {
            var iconElement = document.createElement("i");
            iconElement.className = "ri-check-double-line";
            item.insertBefore(iconElement, item.firstChild);
        });
    });
</script>