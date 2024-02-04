<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>

<style>
    .text-center {
        text-align: center;
    }

    .text-left {
        text-align: left;
    }

    .table thead th {
        padding: 0.5rem 0.5rem;
        text-transform: capitalize;
        letter-spacing: 0px;
        border-bottom: 1px solid #e9ecef;
    }

    .alert.alert-success {
        margin: 5px 20px;
        padding: 15px;
        font-size: 14px;
        color: #fff;
    }

    div#tbl_penduduk_info {
        color: #8392ab;
        font-size: .875rem;
    }

    div.dataTables_wrapper div.dataTables_paginate ul.pagination li {
        margin: 0 4px;
    }

    .page-item .page-link,
    .page-item span {
        display: flex;
        align-items: center;
        justify-content: center;
        color: #8392ab;
        padding: 0;
        margin: 0 3px;
        border-radius: 50% !important;
        width: 36px !important;
        height: 36px;
        font-size: 0.875rem;
        border-radius: 10px !important;
        margin: 0 !important;
    }

    .text-center {
        text-align: center;
    }

    .page-item.active .page-link {
        color: #fff !important;
    }

    .text-left {
        text-align: left;
    }

    .table thead th {
        padding: 0.5rem 0.5rem;
        text-transform: capitalize;
        letter-spacing: 0px;
        border-bottom: 1px solid #e9ecef;
    }

    .alert.alert-success {
        margin: 5px 20px;
        padding: 15px;
        font-size: 14px;
        color: #fff;
    }

    .text-sm {
        white-space: normal !important;
    }

    .table .thead-light th {
        color: #8898aa;
        background-color: #f6f9fc;
    }

    .table .thead-light th {
        color: #8898aa;
        border-color: #e9ecef;
        background-color: #f6f9fc;
    }

    div#tbl_portofolio_paginate ul.pagination li:nth-child(1) a.page-link {
        font-size: 0;
    }

    div#tbl_portofolio_paginate ul.pagination li:nth-last-child(1) a.page-link {
        font-size: 0;
    }

    div#tbl_portofolio_paginate ul.pagination li:nth-child(1) a.page-link:before {
        content: "<";
        font-size: 16px;
    }

    div#tbl_portofolio_paginate ul.pagination li:nth-last-child(1) a.page-link:before {
        content: ">";
        font-size: 16px;
    }
</style>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex align-items-center">
                    <h5 class="mb-0 text-capitalize">PortoFolio Kegiatan</h5>
                </div>
                <?php if ($this->session->flashdata('success') == TRUE) : ?>
                    <div class="alert alert-success">
                        <span><?= $this->session->flashdata('success'); ?></span>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <div class="card">
                        <div class="table-responsive">
                            <table id="tbl_portofolio" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-capitalize text-secondary text-sm text-left font-weight-bolder opacity-7">No.</th>
                                        <th class="text-capitalize text-secondary text-sm text-left font-weight-bolder opacity-7">Judul Kegiatan</th>
                                        <th class="text-capitalize text-secondary text-sm text-left font-weight-bolder opacity-7">Kategori Kegiatan</th>
                                        <th class="text-capitalize text-secondary text-sm text-left font-weight-bolder opacity-7">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex align-items-center">
                    <h5 class="mb-0 text-capitalize">Tambah PortoFolio Kegiatan</h5>
                </div>
                <?php if ($this->session->flashdata('success') == TRUE) : ?>
                    <div class="alert alert-success">
                        <span><?= $this->session->flashdata('success'); ?></span>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <form id="forminformasi" method="post">
                        <div class="form-group">
                            <label>Nama Kegiatan</label>
                            <input id="judulinformasi" type="text" class="form-control" name="judulinformasi" placeholder="Judul Informasi">
                        </div>
                        <div class="form-group">
                            <label for="kategori" class="form-label">Kategori Kegiatan</label>
                            <select class="form-select" id="kategori" name="kategori" required>
                                <option disabled selected> - Pilih -</option>
                                <option value="pelatihan">Pelatihan</option>
                                <option value="seminar">Seminar</option>
                                <option value="studi_banding">Studi Banding</option>
                                <option value="perjalanan_dinas">Perjalanan Dinas</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <div class="dropzone informasi file" id="file">
                                <div class="dz-message">
                                    <p> Klik atau drop gambar di sini</p>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary saveInformasi">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php foreach ($portofolios as $porto) : ?>
    <div class="modal fade" id="lihatFoto<?= $porto['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="lihatFoto<?= $porto['id']; ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lihatFoto<?= $porto['id']; ?>Label">Slider <?= $porto['judul']; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="instruction">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if (!empty($porto['gambar'])) : ?>
                                    <img class="w-100" src="<?= base_url('/uploads/portofolio/' . $porto['gambar']); ?>" alt="Profil Pengguna">
                                <?php else : ?>
                                    <img class="w-100" src="<?= base_url('/assets/img/default-avatar.png') ?>" alt="Profil Pengguna Default">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Button trigger modal -->
<?php foreach ($portofolios as $porto) : ?>
    <div class="modal fade" id="hapusPortofolio<?= $porto['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusPortofolio<?= $porto['id']; ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusPortofolio<?= $porto['id']; ?>Label">Peringatan!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url(); ?>admin/portofolio/hapus_portofolio/<?= $porto['id']; ?>">
                    <div class="modal-body">
                        <p>Apakah anda yakin untuk menghapus portofolio ini? </p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn bg-gradient-primary">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>



<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

<script type="text/javascript">
    Dropzone.autoDiscover = false;

    $(document).ready(function() {
        // Unggah Infromasi di halaman admin panel
        var upload_informasi = new Dropzone(".informasi", {
            autoProcessQueue: false,
            url: "<?= base_url('admin/portofolio/') ?>",
            maxFilesize: 2,
            method: "post",
            acceptedFiles: "image/*,application/pdf,.psd",
            paramName: "gambar",
            dictInvalidFileType: "Type file ini tidak dizinkan",
            addRemoveLinks: true,
        });

        upload_informasi.on("sending", function(a, b, c) {
            a.judulinformasi = $("input[name='judulinformasi']").val();
            a.kategori = $("select[name='kategori']").val();
            c.append("judulinformasi", a.judulinformasi);
            c.append("kategori", a.kategori);
        });


        // Simpan Informasi
        $(document).on('click', '.saveInformasi', function(e) {
            var judulinformasi = $("input[name='judulinformasi']").val();
            var kategori = $("select[name='kategori']").val();
            if (judulinformasi == null || judulinformasi == '' || kategori == null || kategori == '') {} else {
                upload_informasi.processQueue();
            }
        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tbl_portofolio').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= base_url('admin/portofolio/ajax_list'); ?>",
                "type": "POST"
            },
            "columns": [{
                    "data": "0",
                    "render": function(data) {
                        return '<span class="text-secondary font-weight-normal text-sm w-5 text-center">' + data + '</span>';
                    }
                },
                {
                    "data": "1",
                    "render": function(data) {
                        return '<span class="text-secondary font-weight-normal text-sm w-25">' + data + '</span>';
                    }
                },
                {
                    "data": "2",
                    "render": function(data) {
                        return '<span class="text-secondary font-weight-normal text-sm w-50">' + data + '</span>';
                    }
                },
                {
                    "data": "3",
                    "render": function(data, type, row) {
                        return data;
                    }
                },
            ],
            "createdRow": function(row, data, dataIndex) {
                $('th', row).addClass('text-capitalize text-secondary text-sm font-weight-bolder opacity-7');
            }
        });
    });
</script>