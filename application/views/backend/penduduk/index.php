<div id="halPenduduk" class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex align-items-center">
                    <h5 class="mb-0 text-capitalize">Data Penduduk</h5>
                    <a href="<?= base_url() ?>admin/penduduk/tambah_data_penduduk" class="btn bg-gradient-info btn-sm ms-auto mb-0"><i class="fas fa-plus me-2"></i>Tambah Data Penduduk</a>
                </div>
                <?php if ($this->session->flashdata('success') == TRUE) : ?>
                    <div class="alert alert-success">
                        <span><?= $this->session->flashdata('success'); ?></span>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <div class="card">
                        <div class="table-responsive">
                            <table id="tbl_penduduk" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-2">No.</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-10">Nama Lengkap</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-10">NIK</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-10">No. HP</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-15">Tempat, Tanggal Lahir</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-20">Alamat</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-10">Pekerjaan</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-10">Pendidikan</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 text-center w-10">Aksi</th>
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
<?php foreach ($data as $key) : ?>
    <div class="modal fade" id="hapusPenduduk<?= $key['nik']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusPenduduk<?= $key['nik']; ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusPenduduk<?= $key['nik']; ?>Label">Peringatan!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url(); ?>admin/penduduk/hapus/<?= $key['nik']; ?>">
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#tbl_penduduk').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= base_url('admin/penduduk/ajax_list'); ?>",
                "type": "POST"
            },
            "columns": [{
                    "data": "0",
                    "render": function(data) {
                        return '<span class="text-secondary font-weight-normal text-sm w-5 text-center">' + data + '</span>';
                    },
                    "orderable": false,
                },
                {
                    "data": "1",
                    "render": function(data) {
                        return '<span class="text-secondary font-weight-normal text-sm w-25">' + data + '</span>';
                    },
                    "orderable": false,
                },
                {
                    "data": "2",
                    "render": function(data) {
                        return '<span class="text-secondary font-weight-normal text-sm">' + data + '</span>';
                    },
                    "orderable": false,
                },

                {
                    "data": "3",
                    "render": function(data) {
                        return '<span class="text-secondary font-weight-normal text-sm">' + data + '</span>';
                    },
                    "orderable": false,
                },
                {
                    "data": "4",
                    "render": function(data) {
                        return '<span class="text-secondary font-weight-normal text-sm">' + data + '</span>';
                    }
                },
                {
                    "data": "5",
                    "render": function(data) {
                        return '<span class="text-secondary font-weight-normal text-sm">' + data + '</span>';
                    },
                    "orderable": false,
                },
                {
                    "data": "6",
                    "render": function(data) {
                        return '<span class="text-secondary font-weight-normal text-sm">' + data + '</span>';
                    }
                },
                {
                    "data": "7",
                    "render": function(data) {
                        return '<span class="text-secondary font-weight-normal text-sm">' + data + '</span>';
                    }
                },
                {
                    "data": "8",
                    "render": function(data, type, row) {
                        return data;
                    },
                    "orderable": false,
                },
            ],
            "createdRow": function(row, data, dataIndex) {
                $('th', row).addClass('text-capitalize text-secondary text-sm font-weight-bolder text-center opacity-7');
            }
        });
    });
</script>