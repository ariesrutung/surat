<!-- Switchery CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.0/switchery.css" rel="stylesheet">

<style>
    div#info_table_info {
        color: #8392ab;
        font-size: .875rem;
    }

    div#info_table_paginate li {
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

    div#info_table_paginate ul.pagination li:nth-child(1) a.page-link {
        font-size: 0;
    }

    div#info_table_paginate ul.pagination li:nth-last-child(1) a.page-link {
        font-size: 0;
    }

    div#info_table_paginate ul.pagination li:nth-child(1) a.page-link:before {
        content: "<";
        font-size: 16px;
    }

    div#info_table_paginate ul.pagination li:nth-last-child(1) a.page-link:before {
        content: ">";
        font-size: 16px;
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
</style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex align-items-center">
                    <h5 class="mb-0 text-capitalize">Data Konten</h5>
                    <a href="<?= base_url() ?>admin/informasi/tambah_informasi" class="btn bg-gradient-info btn-sm ms-auto mb-0"><i class="fas fa-plus me-2"></i>Tambah Konten</a>
                </div>
                <?php if ($this->session->flashdata('success') == TRUE) : ?>
                    <div class="alert alert-success">
                        <span><?= $this->session->flashdata('success'); ?></span>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <div class="card">
                        <form id="filterForm">
                            <div class="row">
                                <div class="col-md-3">
                                    <select id="kategoriFilter" class="form-select">
                                        <option value="" selected="selected" disabled> - Pilih Filter Kategori -</option>
                                        <option value="">Semua</option>
                                        <?php
                                        $uniqueCategories = array_unique(array_column($data, 'kategori'));
                                        foreach ($uniqueCategories as $kategori) :
                                            ?>
                                            <option value="<?= $kategori; ?>"><?= $kategori; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <button type="button" onclick="applyFilters()" class="btn btn-primary btn-sm">Terapkan Filter</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table id="info_table" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-5 text-center">No.</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-20">Judul</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-40">Isi</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-10">Kategori</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-10">Status</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-15 text-center">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data as $key) : ?>
                                        <tr>
                                            <td class="text-secondary font-weight-normal text-sm text-center w-5"><?= $no; ?></td>
                                            <td class="text-secondary font-weight-normal text-sm w-20">
                                                <?= (strlen($key['judul']) > 100) ? substr($key['judul'], 0, 100) . '...' : $key['judul']; ?>
                                            </td>
                                            <td class="text-secondary font-weight-normal text-sm w-40">
                                                <?= (strlen($key['isi']) > 150) ? substr($key['isi'], 0, 150) . '...' : $key['isi']; ?>
                                            </td>
                                            <td class="text-secondary font-weight-normal text-sm w-10"><?= $key['kategori']; ?></td>
                                            <td class="text-secondary font-weight-normal text-sm w-10">
                                                <input type="checkbox" class="js-switch" data-id="<?= $key['id'] ?>" <?= $key['status'] == 1 ? 'checked' : '' ?>>
                                            </td>
                                            <td class="text-secondary font-weight-normal text-sm w-15">
                                                <a href="<?= base_url('uploads/informasi') ?>/<?= $key['gambar'] ?>" class="btn bg-gradient-info btn-xs mb-0" target="_blank"><i class="fas fa-file-pdf"></i></a>
                                                <a href="<?= base_url() ?>admin/informasi/edit_informasi/<?= $key['id']; ?>" class="btn bg-gradient-primary btn-xs mb-0"><i class="fas fa-pencil-alt"></i></a>
                                                <button type="button" class="btn bg-gradient-warning btn-xs mb-0" data-bs-toggle="modal" data-bs-target="#hapusInformasi<?= $key['id']; ?>"><i class="fas fa-trash-alt"></i></button>
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

<!-- Button trigger modal -->
<?php foreach ($data as $key) : ?>
    <div class="modal fade" id="hapusInformasi<?= $key['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusInformasi<?= $key['id']; ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusInformasi<?= $key['id']; ?>Label">Peringatan!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url(); ?>admin/informasi/hapus_informasi/<?= $key['id']; ?>">
                    <div class="modal-body">
                        <p>Apakah anda yakin untuk menghapus data penduduk ini? </p>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.0/switchery.js"></script>

<script>
    $(document).ready(function() {
        $('.js-switch').each(function() {
            var switchery = new Switchery(this, {
                size: 'medium'
            });

            $(this).change(function() {
                var switchElement = this;
                var infoId = $(switchElement).data('id');
                var status = switchElement.checked ? 1 : 0;

                // Lakukan AJAX request untuk mengubah status di database
                $.ajax({
                    url: '<?= base_url('admin/informasi/ubah_status') ?>',
                    type: 'POST',
                    data: {
                        id: infoId,
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
    function applyFilters() {
        var kategori = $('#kategoriFilter').val();

        // Terapkan filter menggunakan DataTables API
        $('#info_table').DataTable().column(3).search(kategori).draw();
    }
</script>