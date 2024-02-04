<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
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
                    <a href="<?= base_url() ?>admin/profil/tambah_informasi" class="btn bg-gradient-info btn-sm ms-auto mb-0"><i class="fas fa-plus me-2"></i>Tambah Konten</a>
                </div>
                <?php if ($this->session->flashdata('success') == TRUE) : ?>
                    <div class="alert alert-success">
                        <span><?= $this->session->flashdata('success'); ?></span>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <div class="card">
                        <div class="table-responsive">
                            <table id="info_table" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-3 text-center">No.</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-25">Judul</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-50">Isi</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-5">Kategori</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-5">Status</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 w-18 text-center">Aksi</th>
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
    <div class="modal fade" id="hapusInformasi<?= $key['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusInformasi<?= $key['id']; ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusInformasi<?= $key['id']; ?>Label">Peringatan!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url(); ?>admin/profil/hapus_informasi/<?= $key['id']; ?>">
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

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#info_table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url('admin/profil/ajax_list'); ?>",
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
                    className: 'centerize',
                    render: function(data, type, full, meta) {

                        return '<input type="checkbox" checked data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="danger">';

                    },
                    "fnDrawCallback": function() {
                        $('#toggle-demo').bootstrapToggle();
                    },
                },

                // {
                //     "data": "4", // Sesuaikan dengan indeks kolom status pada data JSON
                //     "render": function(data, type, row) {
                //         // Tampilkan tombol switch dengan menggunakan Bootstrap Switch
                //         var id = row.id; // Pastikan ID tersedia di data atau sesuaikan dengan nama kolom ID yang benar
                //         var switchBtn = '<input type="checkbox" class="js-switch" data-id="' + (id ? id : '') + '" ' + (data == '1' ? 'checked' : '') + '>';
                //         return switchBtn;
                //     }
                // },
                {
                    "data": "5",
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