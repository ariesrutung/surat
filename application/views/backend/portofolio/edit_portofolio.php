<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tambah Slider</h6>
                </div>
                <?php echo form_open_multipart(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="judul" class="form-control-label">Judul</label>
                                <input class="form-control" name="judul" id="judul" type="text" value="<?= $slider['judul']; ?>" />
                                <?= form_error('judul', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="subjudul" class="form-control-label">Subjudul</label>
                                <input class="form-control" name="subjudul" id="subjudul" type="text" value="<?= $slider['subjudul']; ?>" />
                                <?= form_error('subjudul', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="gambar" class="form-control-label">Gambar</label>
                                <input class="form-control" type="file" name="gambar" id="gambar">
                                <?= form_error('gambar', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-label">Status</label>
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