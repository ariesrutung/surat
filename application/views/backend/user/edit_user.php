<style>
    .form-control:disabled,
    .form-control[readonly] {
        background-color: #e9ecef;
        opacity: 1;
        cursor: not-allowed !important;
    }

    span#togglePassword,
    span#togglePassword2 {
        border: 0 !important;
        border-radius: 0 5px 5px 0;
        background-color: #999;
    }
</style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tambah Data Pengelola Website</h6>
                </div>
                <?php echo form_open_multipart(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name" class="form-control-label">Nama</label>
                                <input class="form-control" name="name" id="name" type="text" value="<?= $user['name']; ?>" />
                                <?= form_error('name', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="username" class="form-control-label">Username</label>
                                <input class="form-control" name="username" id="username" type="text" value="<?= $user['username']; ?>" />
                                <?= form_error('username', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email" class="form-control-label">Email</label>
                                <input class="form-control" name="email" id="email" type="text" value="<?= $user['email']; ?>" />
                                <?= form_error('email', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="no_hp" class="form-control-label">No. HP</label>
                                <input class="form-control" name="no_hp" id="no_hp" type="text" value="<?= $user['no_hp']; ?>" />
                                <?= form_error('no_hp', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="address" class="form-control-label">Alamat</label>
                                <input class="form-control" name="address" id="address" type="text" value="<?= $user['address']; ?>" />
                                <?= form_error('address', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6">
                            <div class="form-group">
                                <label class="label-control">Hak Akses</label>
                                <select class="form-control" name="level" id="level">
                                    <option disabled selected> - Pilih Hak Akses - </option>
                                    <option value="administrator">Administrator</option>
                                    <option value="pegawai">Pegawai</option>
                                </select>
                                <?= form_error('level', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div> -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="label-control">Hak Akses</label>
                                <select class="form-control" name="level" id="level">
                                    <option disabled> - Pilih Hak Akses - </option>
                                    <option value="administrator" <?= ($user['level'] == 'administrator') ? 'selected' : ''; ?>>Administrator</option>
                                    <option value="pegawai" <?= ($user['level'] == 'pegawai') ? 'selected' : ''; ?>>Pegawai</option>
                                </select>
                                <?= form_error('level', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="password" class="form-control-label">Password</label>
                                <div class="input-group">
                                    <input class="form-control" name="password" id="password" type="password" value="<?= $user['password']; ?>" />
                                    <div class="input-group-append">
                                        <span class="input-group-text toggle-password" id="togglePassword">
                                            <i class="bi bi-eye text-white" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                                <?= form_error('password', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="password2" class="form-control-label">Konfirmasi Password</label>
                                <div class="input-group">
                                    <input class="form-control" name="password2" id="password2" type="password" value="<?= $user['password']; ?>" />
                                    <div class="input-group-append">
                                        <span class="input-group-text toggle-password" id="togglePassword2">
                                            <i class="bi bi-eye text-white" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                                <?= form_error('password2', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="gambar" class="form-control-label">Profil User</label>
                                <input class="form-control" type="file" name="gambar" id="gambar">
                                <?= form_error('gambar', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="category form-category">
                        <div class="form-footer text-right">
                            <button type="submit" class="btn btn-success btn-fill">Simpan</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.querySelector('i').classList.toggle('bi-eye');
        this.querySelector('i').classList.toggle('bi-eye-slash');
    });

    const togglePassword2 = document.getElementById('togglePassword2');
    const password2 = document.getElementById('password2');

    togglePassword2.addEventListener('click', function() {
        const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
        password2.setAttribute('type', type);
        this.querySelector('i').classList.toggle('bi-eye');
        this.querySelector('i').classList.toggle('bi-eye-slash');
    });
</script>