<style>
    div#info_table_info {
        color: #8392ab;
        font-size: .875rem;
    }

    div#info_table_paginate li {
        margin: 0 4px;
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

    div#tatakerja_table_paginate ul.pagination li {
        margin: 0 3px;
    }

    table#tatakerja_table td:nth-last-child(1) {
        display: flex;
        justify-content: center;
        align-items: center;
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

    div#tatakerja_table_paginate ul.pagination li:nth-child(1) a.page-link {
        font-size: 0;
    }

    div#tatakerja_table_paginate ul.pagination li:nth-last-child(1) a.page-link {
        font-size: 0;
    }

    div#tatakerja_table_paginate ul.pagination li:nth-child(1) a.page-link:before {
        content: "<";
        font-size: 16px;
    }

    div#tatakerja_table_paginate ul.pagination li:nth-last-child(1) a.page-link:before {
        content: ">";
        font-size: 16px;
    }
</style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex align-items-center">
                    <h5 class="mb-0 text-capitalize">Data Tata Kerja</h5>
                    <a href="<?= base_url() ?>admin/tatakerja/tambah" class="btn bg-gradient-info btn-sm ms-auto mb-0"><i class="fas fa-plus me-2"></i>Tambah Data</a>
                </div>
                <?php if ($this->session->flashdata('success') == TRUE) : ?>
                    <div class="alert alert-success">
                        <span><?= $this->session->flashdata('success'); ?></span>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <div class="card">
                        <div class="table-responsive">
                            <table id="tatakerja_table" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-5 text-center">No.</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-10">Nama Lengkap</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-10">Jabatan</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-25">Tugas</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-30">Fungsi</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-15 text-center">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<?php foreach ($tatakerja as $key) : ?>
    <div class="modal fade" id="hapusTatakerja<?= $key['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusTatakerja<?= $key['id']; ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusTatakerja<?= $key['id']; ?>Label">Peringatan!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url(); ?>admin/tatakerja/hapus/<?= $key['id']; ?>">
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


<?php foreach ($tatakerja as $key) : ?>
    <div class="modal fade" id="lihatFoto<?= $key['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="lihatFoto<?= $key['id']; ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lihatFoto<?= $key['id']; ?>Label">Foto Aparat Desa <?= $key['nama_lengkap']; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="instruction">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if (!empty($key['gambar'])) : ?>
                                    <img class="w-100" src="<?= base_url('/uploads/aparatdesa/' . $key['gambar']); ?>" alt="Profil Pengguna">
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#tatakerja_table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url('admin/tatakerja/ajax_list'); ?>",
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
                    "render": function(data) {
                        return '<span class="text-secondary font-weight-normal text-sm">' + data + '</span>';
                    }
                },
                {
                    "data": "4",
                    "render": function(data) {
                        return '<span class="text-secondary font-weight-normal text-sm">' + data + '</span>';
                    }
                },
                {
                    "data": "5",
                    "render": function(data, type, row) {
                        return data;
                    }
                },
            ],
            "createdRow": function(row, data, dataIndex) {
                $('th', row).addClass('text-capitalize text-secondary text-sm font-weight-bolder text-center opacity-7');
            }
        });
    });
</script>