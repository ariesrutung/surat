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
                    <h6>Tambah Konten</h6>
                </div>
                <?php echo form_open_multipart(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="judul" class="form-control-label">Judul</label>
                                <input class="form-control" name="judul" id="judul" type="text" value="<?= set_value('judul'); ?>" />
                                <?= form_error('judul', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="lokasi" class="form-control-label">Lokasi</label>
                                <input class="form-control" name="lokasi" id="lokasi" type="text" value="<?= set_value('lokasi'); ?>" />
                                <?= form_error('lokasi', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="tanggal" class="form-control-label">Tanggal</label>
                                <input class="form-control" name="tanggal" id="tanggal" type="date" value="<?= set_value('tanggal'); ?>" />
                                <?= form_error('tanggal', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="isi" class="form-control-label">Isi</label>
                                <textarea class="form-control" name="isi" id="isi" type="text" value="<?= set_value('isi'); ?>"></textarea>
                                <?= form_error('isi', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="gambar" class="form-control-label">Gambar</label>
                                <input class="form-control" type="file" name="gambar" id="gambar">
                                <?= form_error('gambar', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="ket_gambar" class="form-control-label">Keterangan Gambar</label>
                                <input type="text" class="form-control datepicker" name="ket_gambar" id="ket_gambar" value="<?= set_value('ket_gambar'); ?>" />
                                <?= form_error('ket_gambar', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="kategori" class="form-label">Kategori Informasi</label>
                                <select class="form-select" id="kategori" name="kategori" required>
                                    <option> - Pilih -</option>
                                    <option value="berita">Berita</option>
                                    <option value="pengumuman">Pengumuman</option>
                                    <option value="pelatihan">Pelatihan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6" style="visibility: hidden;">
                            <div class="form-group">
                                <label class="text-label">Status</label><br>
                                <input type="radio" name="status" value="1" checked> Aktif
                                <input type="radio" name="status" value="0"> Nonaktif
                            </div>
                            <?= form_error('status', '<div class="text-danger">', '</div>'); ?>
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
        .create(document.querySelector('#isi'))
        .catch(error => {
            console.error(error);
        });
</script>