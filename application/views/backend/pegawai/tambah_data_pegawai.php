<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tambah Data Pegawai</h6>
                </div>
                <?php echo form_open_multipart(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nama" class="form-control-label">Nama Lengkap</label>
                                <input class="form-control" name="nama" id="nama" type="text" value="<?= set_value('nama'); ?>" />
                                <?= form_error('nama', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nip" class="form-control-label">NIP</label>
                                <input class="form-control" name="nip" id="nip" type="text" value="<?= set_value('nip'); ?>" />
                                <?= form_error('nip', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tempat_lahir" class="form-control-label">Tempat Lahir</label>
                                <input class="form-control" name="tempat_lahir" id="tempat_lahir" type="text" value="<?= set_value('tempat_lahir'); ?>" />
                                <?= form_error('tempat_lahir', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tanggal_lahir" class="form-control-label">Tanggal Lahir</label>
                                <input type="date" class="form-control datepicker" name="tanggal_lahir" id="tanggal_lahir" value="<?= set_value('tanggal_lahir'); ?>" />
                                <?= form_error('tanggal_lahir', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="alamat" class="form-control-label">Alamat</label>
                                <input class="form-control" name="alamat" id="alamat" type="text" value="<?= set_value('alamat'); ?>" />
                                <?= form_error('alamat', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="no_hp" class="form-control-label">No. Hp</label>
                                <input class="form-control" name="no_hp" id="no_hp" type="text" value="<?= set_value('no_hp'); ?>" />
                                <?= form_error('no_hp', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jabatan" class="form-control-label">Jabatan</label>
                                <input class="form-control" name="jabatan" id="jabatan" type="text" value="<?= set_value('jabatan'); ?>" />
                                <?= form_error('jabatan', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="pendidikan" class="form-control-label">pendidikan</label>
                                <input class="form-control" name="pendidikan" id="pendidikan" type="text" value="<?= set_value('pendidikan'); ?>" />
                                <?= form_error('pendidikan', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="foto" class="form-control-label">Profil Pegawai</label>
                                <input class="form-control" type="file" name="foto" id="foto">
                                <?= form_error('foto', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="category form-category">
                        <div class="form-footer text-right">
                            <button type="submit" class="btn btn-success btn-fill">simpan</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>