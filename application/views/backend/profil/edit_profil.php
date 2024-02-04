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
                                <input class="form-control" name="judul" id="judul" type="text" value="<?= $profil['judul']; ?>" />
                                <?= form_error('judul', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="lokasi" class="form-control-label">Lokasi</label>
                                <input class="form-control" name="lokasi" id="lokasi" type="text" value="<?= $profil['lokasi']; ?>" />
                                <?= form_error('lokasi', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="tanggal" class="form-control-label">Tanggal</label>
                                <input class="form-control" name="tanggal" id="tanggal" type="date" value="<?= $profil['tanggal']; ?>" />
                                <?= form_error('tanggal', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="isi" class="form-control-label">Isi</label>
                                <textarea class="form-control" name="isi" id="isi"><?= $profil['isi']; ?></textarea>
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
                                <input type="text" class="form-control datepicker" name="ket_gambar" id="ket_gambar" value="<?= $profil['ket_gambar']; ?>" />
                                <?= form_error('ket_gambar', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori Profil</label>
                                <select class="form-select" id="kategori" name="kategori" required>
                                    <option disabled> - Pilih -</option>
                                    <option value="profil" <?= ($profil['kategori'] == 'profil') ? 'selected' : ''; ?>>Profil Kelurahan</option>
                                    <option value="alur_surat_masuk" <?= ($profil['kategori'] == 'alur_surat_masuk') ? 'selected' : ''; ?>>Alur Surat Masuk</option>
                                    <option value="alur_surat_keluar" <?= ($profil['kategori'] == 'alur_surat_keluar') ? 'selected' : ''; ?>>Alur Surat Keluar</option>
                                    <option value="maksud_dan_tujuan" <?= ($profil['kategori'] == 'maksud_dan_tujuan') ? 'selected' : ''; ?>>Maksud & Tujuan</option>
                                    <option value="struktur_organisasi" <?= ($profil['kategori'] == 'struktur_organisasi') ? 'selected' : ''; ?>>Struktur Organisasi</option>
                                    <option value="profil" <?= ($profil['kategori'] == 'profil') ? 'selected' : ''; ?>>Profil</option>
                                    <option value="sambutan" <?= ($profil['kategori'] == 'sambutan') ? 'selected' : ''; ?>>Sambutan Kepala Desa</option>
                                </select>
                                <?= form_error('kategori', '<div class="text-danger">', '</div>'); ?>
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
    ClassicEditor
        .create(document.querySelector('#isi'))
        .catch(error => {
            console.error(error);
        });
</script>