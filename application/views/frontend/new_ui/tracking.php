<style>
    .contact .formsaja {
        box-shadow: 0 0 30px rgba(214, 215, 216, 0.6);
        padding: 30px;
        border-radius: 4px;
    }

    .contact .formsaja .error-message {
        display: none;
        color: #fff;
        background: #ed3c0d;
        text-align: left;
        padding: 15px;
        font-weight: 600;
    }

    .contact .formsaja .error-message br+br {
        margin-top: 25px;
    }

    .contact .formsaja .sent-message {
        display: none;
        color: #fff;
        background: #18d26e;
        text-align: center;
        padding: 15px;
        font-weight: 600;
    }

    .contact .formsaja .loading {
        display: none;
        background: #fff;
        text-align: center;
        padding: 15px;
    }

    .contact .formsaja .loading:before {
        content: "";
        display: inline-block;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        margin: 0 10px -6px 0;
        border: 3px solid #18d26e;
        border-top-color: #eee;
        animation: animate-loading 1s linear infinite;
    }

    .contact .formsaja .form-group {
        margin-bottom: 25px;
    }

    .contact .formsaja input,
    .contact .formsaja textarea {
        box-shadow: none;
        font-size: 14px;
        border-radius: 4px;
    }

    .contact .formsaja input:focus,
    .contact .formsaja textarea:focus {
        border-color: #111111;
    }

    .contact .formsaja input {
        padding: 10px 15px;
    }

    .contact .formsaja textarea {
        padding: 12px 15px;
    }

    .contact .formsaja button[type=submit] {
        background: #00a8ff;
        border: 0;
        padding: 10px 32px;
        color: #fff;
        transition: 0.4s;
        border-radius: 4px;
    }

    .contact .formsaja button[type=submit]:hover {
        background: #e35052;
    }
</style>
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12">
                <?php if ($this->session->flashdata('success') == TRUE) : ?>
                    <?= $this->session->flashdata('success'); ?>
                <?php endif; ?>
            </div>
        </div>
        <?= form_open('admin/tracking/cari', 'id="tracking", class="formsaja"') ?>
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col form-group">
                        <input class="form-control form-control-lg form-control-borderless" type="search" name="trackid" placeholder="Masukkan ID Pengajuan Surat Anda">
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <button type="submit" class="btn btn-block btn-primary">Cari</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</section>