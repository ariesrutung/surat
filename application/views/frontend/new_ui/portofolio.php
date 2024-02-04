<style>
    .portfolio .portfolio-wrap .portfolio-links {
        text-align: center;
        z-index: 4;
        height: 100%;
        width: 100%;
    }

    .portfolio .portfolio-wrap .portfolio-links a {
        height: 100%;
        width: 100%;
    }

    .portfolio .portfolio-wrap {
        transition: 0.3s;
        position: relative;
        overflow: hidden;
        z-index: 1;
        background: rgba(17, 17, 17, 0.6);
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">
        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <?php foreach ($unique_categories as $category) : ?>
                        <?php
                            // Replace underscore with space in the category name
                            $kategori_tampilan = str_replace('_', ' ', $category);
                            ?>
                        <li data-filter=".filter-<?php echo strtolower($category); ?>"><?php echo $kategori_tampilan; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

            <?php foreach ($unique_categories as $category) : ?>
                <?php
                    $filtered_portofolios = array_filter($portofolios, function ($item) use ($category) {
                        return strtolower($item['kategori']) === strtolower($category);
                    });
                    ?>
                <?php foreach ($filtered_portofolios as $portfolio) : ?>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo strtolower($portfolio['kategori']); ?>">
                        <div class="portfolio-wrap">
                            <img src="<?= base_url('uploads/portofolio/' . $portfolio['gambar']); ?>" class="img-fluid portfolio-lightbox" data-gallery="portfolioGallery">
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="<?= base_url('uploads/portofolio/' . $portfolio['gambar']); ?>" data-gallery="portfolioGallery" class="portfolio-lightbox d-flex justify-content-center align-items-center" title="<?php echo $portfolio['judul']; ?>"><i class="bi bi-plus btn-xl"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>

        </div>

    </div>
</section>