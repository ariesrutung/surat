<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }
</style>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tambah Data Tatakerja</h6>
                </div>
                <?php echo form_open_multipart(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nama_lengkap" class="form-control-label">Nama Lengkap</label>
                                <input class="form-control" name="nama_lengkap" id="nama_lengkap" type="text" value="<?= set_value('nama_lengkap'); ?>" />
                                <?= form_error('nama_lengkap', '<div class="text-danger text-sm">', '</div>'); ?>
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
                                <label for="tugas" class="form-control-label">Tugas</label>
                                <textarea class="form-control" name="tugas" id="tugas" type="text" value="<?= set_value('tugas'); ?>"></textarea>
                                <?= form_error('tugas', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="fungsi" class="form-control-label">Fungsi</label>
                                <textarea class="form-control" name="fungsi" id="fungsi" type="text" value="<?= set_value('fungsi'); ?>"></textarea>
                                <?= form_error('fungsi', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ket_tugas" class="form-control-label">Keterangan Tugas</label>
                                <input class="form-control" name="ket_tugas" id="ket_tugas" type="text" placeholder="Misalnya, Tugas Kepala Desa" value="<?= set_value('ket_tugas'); ?>">
                                <?= form_error('ket_tugas', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ket_fungsi" class="form-control-label">Keterangan Fungsi</label>
                                <input class="form-control" name="ket_fungsi" id="ket_fungsi" type="text" placeholder="Misalnya, Fungsi Kepala Desa" value="<?= set_value('ket_fungsi'); ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="gambar" class="form-control-label">Gambar</label>
                                <input class="form-control" type="file" name="gambar" id="gambar">
                                <?= form_error('gambar', '<div class="text-danger">', '</div>'); ?>
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

<script>
    ClassicEditor
        .create(document.querySelector('#tugas'))
        .catch(error => {
            console.error(error);
        });
</script>

<script>
    ClassicEditor
        .create(document.querySelector('#fungsi'))
        .catch(error => {
            console.error(error);
        });
</script>