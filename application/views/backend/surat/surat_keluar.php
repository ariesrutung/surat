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
</style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex align-items-center">
                    <h5 class="mb-0 text-capitalize">Surat Keluar</h5>
                    <a href="<?= base_url() ?>admin/surat/tambah_surat_keluar" class="btn bg-gradient-info btn-sm ms-auto mb-0"><i class="fas fa-plus me-2"></i>Tambah Surat Keluar</a>
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
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 ps-2">Nama Surat</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7">Tanggal Surat</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7">Keterangan Surat</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data as $key) : ?>
                                        <tr>
                                            <td class="text-secondary font-weight-normal text-sm text-center"><?= $no; ?></td>
                                            <td class="text-secondary font-weight-normal text-sm text-right"><?= $key['nama_surat_keluar']; ?></td>
                                            <td class="text-secondary font-weight-normal text-sm"><?= $key['tanggal_surat_keluar']; ?></td>
                                            <td class="text-secondary font-weight-normal text-sm"><?= $key['keterangan_surat_keluar']; ?></td>
                                            <td class="text-secondary font-weight-normal text-sm">
                                                <a href="<?= base_url('uploads/surat_keluar') ?>/<?= $key['file_surat_keluar'] ?>" class="btn bg-gradient-info btn-xs mb-0" target="_blank"><i class="fas fa-file-pdf"></i></a>
                                                <!-- <button type="button" class="btn bg-gradient-info btn-xs mb-0" data-bs-toggle="modal" data-bs-target="#lihatSurat<?= $key['id_surat_keluar']; ?>"><i class="fas fa-eye"></i></button> -->
                                                <a href="<?= base_url() ?>admin/surat/editSuratKeluar/<?= $key['id_surat_keluar']; ?>" class="btn bg-gradient-primary btn-xs mb-0"><i class="fas fa-pencil-alt"></i></a>
                                                <button type="button" class="btn bg-gradient-warning btn-xs mb-0    " data-bs-toggle="modal" data-bs-target="#hapusSuratKeluar<?= $key['id_surat_keluar']; ?>"><i class="fas fa-trash-alt"></i></button>
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
<!-- 
<?php foreach ($data as $key) : ?>
    <div class="modal fade" id="lihatSurat<?= $key['id_surat_keluar']; ?>" tabindex="-1" role="dialog" aria-labelledby="lihatSurat<?= $key['id_surat_keluar']; ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lihatSurat<?= $key['id_surat_keluar']; ?>Label">Detail Surat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="instruction">
                        <div class="row">
                            <div class="col-md-12">
                                <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('uploads/surat_keluar') ?>/<?= $key['file_surat_keluar'] ?>"></embed>
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
<?php endforeach; ?> -->

<!-- Button trigger modal -->
<?php foreach ($data as $key) : ?>
    <div class="modal fade" id="hapusSuratKeluar<?= $key['id_surat_keluar']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusSuratKeluar<?= $key['id_surat_keluar']; ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusSuratKeluar<?= $key['id_surat_keluar']; ?>Label">Peringatan!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url(); ?>admin/surat/hapusSuratKeluar/<?= $key['id_surat_keluar']; ?>">
                    <div class="modal-body">
                        <p>Apakah anda yakin untuk menghapus surat keluar ini? </p>
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