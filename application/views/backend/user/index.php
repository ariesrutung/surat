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
                    <h5 class="mb-0 text-capitalize">Data Pengelola Website</h5>
                    <a href="<?= base_url() ?>admin/user/tambah" class="btn bg-gradient-info btn-sm ms-auto mb-0"><i class="fas fa-plus me-2"></i>Tambah Data Pengelola</a>
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
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 ps-2">Nama</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 ps-2">Username</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7 ps-2">Email</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7">Password</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7">Role</th>
                                        <th class="text-capitalize text-secondary text-sm font-weight-bolder opacity-7">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $no = 1; ?>
                                    <?php foreach ($data as $key) : ?>
                                        <tr>
                                            <td class="text-secondary font-weight-normal text-sm text-center"><?= $no; ?></td>
                                            <td class="text-secondary font-weight-normal text-sm"><?= $key['name']; ?></td>
                                            <td class="text-secondary font-weight-normal text-sm"><?= $key['username']; ?></td>
                                            <td class="text-secondary font-weight-normal text-sm"><?= $key['email']; ?></td>
                                            <td class="text-secondary font-weight-normal text-sm"><?= $key['password']; ?></td>
                                            <td class="text-secondary font-weight-normal text-sm"><?= $key['level']; ?></td>
                                            <td class="text-right">
                                                <button type="button" class="btn bg-gradient-info btn-xs mb-0" data-bs-toggle="modal" data-bs-target="#lihatFoto<?= $key['id_user']; ?>"><i class="fas fa-eye"></i></button>
                                                <a href="<?= base_url() ?>admin/user/edit/<?= $key['id_user']; ?>" class="btn bg-gradient-primary btn-xs mb-0"><i class="fas fa-pencil-alt"></i></a>
                                                <button type="button" class="btn bg-gradient-warning btn-xs mb-0" data-bs-toggle="modal" data-bs-target="#hapusUser<?= $key['id_user']; ?>"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                            <!-- <td class="w-15 text-center">

                                                <?php if (!empty($key['gambar'])) : ?>
                                                    <img class="w-25" src="<?= base_url('/uploads/profil_pengelola/' . $key['gambar']); ?>" alt="Profil Pengguna">
                                                <?php else : ?>
                                                    <img class="w-25" src="<?= base_url('/assets/img/default-avatar.png') ?>" alt="Profil Pengguna Default">
                                                <?php endif; ?>
                                            </td> -->
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
    <div class="modal fade" id="hapusUser<?= $key['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusUser<?= $key['id_user']; ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusUser<?= $key['id_user']; ?>Label">Peringatan!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url(); ?>admin/user/hapus/<?= $key['id_user']; ?>">
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

<?php foreach ($data as $key) : ?>
    <div class="modal fade" id="lihatFoto<?= $key['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="lihatFoto<?= $key['id_user']; ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lihatFoto<?= $key['id_user']; ?>Label">Detail Surat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="instruction">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if (!empty($key['gambar'])) : ?>
                                    <img class="w-100" src="<?= base_url('/uploads/profil_pengelola/' . $key['gambar']); ?>" alt="Profil Pengguna">
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