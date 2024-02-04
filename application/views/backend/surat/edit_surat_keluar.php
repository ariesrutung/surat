<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit Surat Keluar</h6>
                </div>
                <?php echo form_open_multipart(); ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_surat" class="form-control-label">Nama Surat</label>
                        <input class="form-control" name="nama_surat" id="nama_surat" type="text" value="<?= $surat_keluar['nama_surat_keluar']; ?>" required="true" />
                    </div>
                    <div class="form-group">
                        <label for="tanggal_surat" class="form-control-label">Tanggal Surat</label>
                        <input type="date" class="form-control datepicker" name="tanggal_surat" id="tanggal_surat" value="<?= $surat_keluar['tanggal_surat_keluar']; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="keterangan_surat" class="form-control-label">Keterangan Surat</label>
                        <input class="form-control" name="keterangan_surat" id="keterangan_surat" value="<?= $surat_keluar['keterangan_surat_keluar']; ?>" type="text" required="true" />
                    </div>
                    <div class="form-group">
                        <label for="file_surat" class="form-control-label">File Surat</label>
                        <input class="form-control" type="file" name="file_surat" id="file_surat">
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