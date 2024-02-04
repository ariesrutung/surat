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
                    <h5 class="mb-0 text-capitalize">Pengajuan Surat</h5>
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
                                        <th class="text-capitalize text-center text-secondary text-sm font-weight-bolder opacity-7">No.</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 ps-2">ID Pengajuan</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7">Nama Pengaju (NIK)</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7">No. HP</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7">Tanggal</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7">Status Pengajuan</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7">Jenis Surat</th>
                                        <th class="text-capitalize text-center text-secondary text-sm font-weight-bolder opacity-7">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $no = 1; ?>
                                    <?php foreach ($data as $key) : ?>
                                        <?php if ($key['status'] !== '5') : ?>
                                            <tr>
                                                <td class="text-center"><?= $no; ?></td>
                                                <td class="text-secondary font-weight-normal text-sm"><?= $key['id']; ?></td>
                                                <td class="text-secondary font-weight-normal text-sm"><?= $key['nama'] . ' (' . $key['nik'] . ')'; ?></td>
                                                <td class="text-secondary font-weight-normal text-sm"><?= $key['no_hp']; ?></td>
                                                <td class="text-secondary font-weight-normal text-sm"><?= $key['tanggal']; ?></td>
                                                <td class="text-secondary font-weight-normal text-sm"><?= $status[$key['status']]; ?></td>
                                                <td class="text-secondary font-weight-normal text-sm"><?= $options[$key['jenis_surat']]; ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('uploads/berkas') ?>/<?= $key['file'] ?>" class="btn bg-gradient-info btn-xs mb-0" target="_blank"><i class="fas fa-file-pdf"></i></a>
                                                    <!-- <a type="button" class="btn bg-gradient-info btn-xs mb-0" data-bs-toggle="modal" data-bs-target="#lihatfile<?= $key['id']; ?>"><i class="fas fa-file-pdf"></i></a> -->
                                                    <button type="button" class="btn bg-gradient-primary btn-xs mb-0" data-bs-toggle="modal" data-bs-target="#statusPengajuan<?= $key['id']; ?>"><i class="fas fa-pencil-alt"></i></button>
                                                    <button type="button" class="btn bg-gradient-warning btn-xs mb-0" data-bs-toggle="modal" data-bs-target="#hapusPengajuan<?= $key['id']; ?>"><i class="fas fa-trash-alt"></i></button>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                        <?php endif; ?>
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
    <div class="modal fade" id="lihatfile<?= $key['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="lihatFile<?= $key['id']; ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lihatFile<?= $key['id']; ?>Label">Detail Dokumen Pendukung Surat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="instruction">
                        <div class="row">
                            <div class="col-md-12">
                                <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('uploads/berkas') ?>/<?= $key['file'] ?>"></embed>
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


<?php foreach ($data as $key) : ?>
    <div class="modal fade" id="statusPengajuan<?= $key['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="statusPengajuan<?= $key['id']; ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusPengajuan<?= $key['id']; ?>Label">Peringatan!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url(); ?>admin/surat/updateStatus/<?= $key['id']; ?>">
                    <div class="modal-body">
                        <p>Update Status Pengajuan ID: <?= $key['id'] ?>? </p>
                        <label for="status">Pilih Status</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" value="1" <?= $key['status'] == '1' ? 'checked="true"' : '' ?>><span class="circle"></span><span class="check"></span> <?= $status['1'] ?>
                            </label>
                            <label>
                                <input type="radio" name="status" value="2" <?= $key['status'] == '2' ? 'checked="true"' : '' ?>><span class="circle"></span><span class="check"></span> <?= $status['2'] ?>
                            </label>
                            <label>
                                <input type="radio" name="status" value="3" <?= $key['status'] == '3' ? 'checked="true"' : '' ?>><span class="circle"></span><span class="check"></span> <?= $status['3'] ?>
                            </label>
                            <label>
                                <input type="radio" name="status" value="4" <?= $key['status'] == '4' ? 'checked="true"' : '' ?>><span class="circle"></span><span class="check"></span> <?= $status['4'] ?>
                            </label>

                            <label>
                                <input type="radio" name="status" value="5" <?= $key['status'] == '5' ? 'checked="true"' : '' ?>><span class="circle"></span><span class="check"></span> <?= $status['5'] ?>
                            </label>
                        </div>
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

<?php foreach ($data as $key) : ?>
    <div class="modal fade" id="hapusPengajuan<?= $key['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusPengajuan<?= $key['id']; ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusPengajuan<?= $key['id']; ?>Label">Peringatan!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url(); ?>admin/surat/hapusPengajuan/<?= $key['id']; ?>">
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