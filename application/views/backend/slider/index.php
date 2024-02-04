<!-- Switchery CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.0/switchery.css" rel="stylesheet">

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

    .text-sm {
        white-space: normal !important;
    }

    .note-toolbar {
        padding: 10px 5px;
        color: #333;
        background-color: #f5f5f5;
        border-bottom: 1px solid;
        border-color: #ddd;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
    }

    .modal-body * {
        color: #000;
    }

    .modal-content-scrollable {
        max-height: 670px;
        overflow-y: auto;
    }

    div#bootstrap-data-table-export_paginate li {
        background-color: #647dfc;
        margin: 10px;
        padding: 10px;
        color: #fff !important;
    }

    div#bootstrap-data-table-export_paginate li a {
        color: #fff;
    }

    table.table th,
    table.table td {
        color: #000;
    }

    .js-switch+.switchery>small {
        top: 0 !important;
        background: #fff;
        border-radius: 100%;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
        height: 30px;
        position: absolute;
        width: 30px;
    }

    .js-switch+.switchery {
        border: 1px solid #dfdfdf;
        border-radius: 20px;
        cursor: pointer;
        display: inline-block;
        height: 30px;
        position: relative;
        vertical-align: middle;
        width: 50px;
        margin: 0;
    }

    .image-container {
        position: relative;
        display: inline-block;
    }

    .hover-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        font-size: 14px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .image-container:hover .hover-text {
        opacity: 1;
    }

    .hover-text {
        background-color: #7e7e7e;
        color: #fff !important;
        font-size: 12px;
        width: 100% !important;
        height: 100% !important;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        text-align: center;
    }

    td.aksi {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    a.btn {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 5px;
    }

    .text-white-50 {
        color: rgba(255, 255, 255, 0.5) !important;
        margin: 2px 4px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    a.btn.bg-gradient-primary.btn-xs.mb-0 {
        padding: 9px 15px !important;
        font-size: 0.75rem !important;
        margin-top: 0 !important;
    }
</style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex align-items-center">
                    <h5 class="mb-0 text-capitalize">Data Konten</h5>
                    <a href="<?= base_url() ?>admin/slider/tambah_slider" class="btn bg-gradient-info btn-sm ms-auto mb-0"><i class="fas fa-plus me-2"></i>Tambah Slider</a>
                </div>
                <?php if ($this->session->flashdata('success') == TRUE) : ?>
                    <div class="alert alert-success">
                        <span><?= $this->session->flashdata('success'); ?></span>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7">No.</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 ps-2 w-25">Judul</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-35">Subjudul</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-35">Status</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $no = 1; ?>
                                    <?php foreach ($sliders as $key) : ?>
                                        <tr>
                                            <td class="text-secondary font-weight-normal text-sm text-center"><?= $no; ?></td>
                                            <td class="text-secondary font-weight-normal text-sm"><?= $key->judul; ?></td>
                                            <td class="text-secondary font-weight-normal text-sm"><?= $key->subjudul; ?></td>
                                            <td>
                                                <input type="checkbox" class="js-switch" data-id="<?= $key->id ?>" <?= $key->status == 1 ? 'checked' : '' ?>>
                                            </td>
                                            <td class="aksi">
                                                <button type="button" class="btn bg-gradient-info btn-xs mb-0" data-bs-toggle="modal" data-bs-target="#lihatFoto<?= $key->id; ?>"><i class="fas fa-eye"></i></button>
                                                <a href="<?= base_url() ?>admin/slider/edit_slider/<?= $key->id; ?>" class="btn bg-gradient-primary btn-xs mb-0"><i class="fas fa-pencil-alt"></i></a>
                                                <button type="button" class="btn bg-gradient-warning btn-xs mb-0" data-bs-toggle="modal" data-bs-target="#hapusSlider<?= $key->id; ?>"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php foreach ($sliders as $key) : ?>
    <div class="modal fade" id="lihatFoto<?= $key->id; ?>" tabindex="-1" role="dialog" aria-labelledby="lihatFoto<?= $key->id; ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lihatFoto<?= $key->id; ?>Label">Slider <?= $key->judul; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="instruction">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if (!empty($key->gambar)) : ?>
                                    <img class="w-100" src="<?= base_url('/uploads/slider/' . $key->gambar); ?>" alt="Profil Pengguna">
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
<?php foreach ($sliders as $key) : ?>
    <div class="modal fade" id="hapusSlider<?= $key->id; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusSlider<?= $key->id; ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusSlider<?= $key->id; ?>Label">Peringatan!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url(); ?>admin/slider/hapus_slider/<?= $key->id; ?>">
                    <div class="modal-body">
                        <p>Apakah anda yakin untuk menghapus slider ini? </p>
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


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Switchery JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.0/switchery.js"></script>

<script>
    $(document).ready(function() {
        $('.js-switch').each(function() {
            var switchery = new Switchery(this, {
                size: 'small'
            });

            $(this).change(function() {
                var switchElement = this;
                var sliderId = $(switchElement).data('id');
                var status = switchElement.checked ? 1 : 0;

                // Lakukan AJAX request untuk mengubah status di database
                $.ajax({
                    url: '<?= base_url('admin/slider/ubah_status') ?>',
                    type: 'POST',
                    data: {
                        id: sliderId,
                        status: status
                    },
                    success: function(response) {
                        console.log(response);
                        // Show SweetAlert on success
                        Swal.fire({
                            title: 'Sukses!',
                            // text: 'Status updated successfully.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            // Check if the user clicked "OK"
                            if (result.isConfirmed) {
                                // Perform any other actions if needed
                            }
                        });
                    },
                    error: function(error) {
                        console.error(error);
                        // Show SweetAlert on error
                        Swal.fire({
                            title: 'Eror!',
                            // text: 'Failed to update status.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Fungsi untuk menampilkan pratinjau gambar di modal
        $('.preview-slider').click(function() {
            var imageUrl = $(this).data('image-url');
            $('#previewImage').attr('src', imageUrl);
            $('.modalPreviewSlider').modal('show');
        });
    });
</script>