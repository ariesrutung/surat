<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit Konten</h6>
                </div>
                <?php echo form_open_multipart(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="judul" class="form-control-label">Judul</label>
                                <input class="form-control" name="judul" id="judul" type="text" value="<?= $informasi['judul']; ?>" />
                                <?= form_error('judul', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="lokasi" class="form-control-label">Lokasi</label>
                                <input class="form-control" name="lokasi" id="lokasi" type="text" value="<?= $informasi['lokasi']; ?>" />
                                <?= form_error('lokasi', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="tanggal" class="form-control-label">Tanggal</label>
                                <input class="form-control" name="tanggal" id="tanggal" type="date" value="<?= $informasi['tanggal']; ?>" />
                                <?= form_error('tanggal', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="isi" class="form-control-label">Isi</label>
                                <textarea class="form-control" name="isi" id="isi"><?= $informasi['isi']; ?></textarea>
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
                                <input type="text" class="form-control datepicker" name="ket_gambar" id="ket_gambar" value="<?= $informasi['ket_gambar']; ?>" />
                                <?= form_error('ket_gambar', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori Informasi</label>
                                <select class="form-select" id="kategori" name="kategori" required>
                                    <option disabled> - Pilih -</option>
                                    <option value="berita" <?= ($informasi['kategori'] == 'berita') ? 'selected' : ''; ?>>Berita</option>
                                    <option value="pengumuman" <?= ($informasi['kategori'] == 'pengumuman') ? 'selected' : ''; ?>>Pengumuman</option>
                                    <option value="pelatihan" <?= ($informasi['kategori'] == 'pelatihan') ? 'selected' : ''; ?>>Pelatihan</option>
                                </select>
                                <?= form_error('kategori', '<div class="text-danger">', '</div>'); ?>
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
        .create(document.querySelector('#isi'))
        .catch(error => {
            console.error(error);
        });
</script>