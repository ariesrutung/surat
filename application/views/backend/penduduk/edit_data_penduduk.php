<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        display: block;
        width: 100%;
        padding: 0.5rem 1rem 0.5rem 0.75rem;
        -moz-padding-start: calc(0.75rem - 3px);
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1.4rem;
        color: #495057;
        background-color: #fff;
        border: 1px solid #d2d6da;
        border-radius: 0.5rem;
        transition: box-shadow 0.15s ease, border-color 0.15s ease;
        appearance: none;
    }

    .select2-container--default .select2-selection--single {
        background-color: transparent;
        border: 0;
        border-radius: 4px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        position: absolute;
        top: 1px;
        right: 10px;
        width: 20px;
        height: 35px;
    }

    .form-control:disabled,
    .form-control[readonly] {
        background-color: #e9ecef;
        opacity: 1;
        cursor: not-allowed !important;
    }
</style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit Data Penduduk</h6>
                </div>
                <?php echo form_open_multipart(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="nik" class="form-control-label">NIK</label>
                                <input class="form-control" name="nik" id="nik" type="text" value="<?= $penduduk['nik']; ?>" />
                                <?= form_error('nik', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="nama" class="form-control-label">Nama Lengkap</label>
                                <input class="form-control" name="nama" id="nama" type="text" value="<?= $penduduk['nama']; ?>" />
                                <?= form_error('nama', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="tmpt_lhr" class="form-control-label">Tempat Lahir</label>
                                <input class="form-control" name="tmpt_lhr" id="tmpt_lhr" type="text" value="<?= $penduduk['tmpt_lhr']; ?>" />
                                <?= form_error('tmpt_lhr', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="tgl_lhr" class="form-control-label">Tanggal Lahir</label>
                                <input type="date" class="form-control datepicker" name="tgl_lhr" id="tgl_lhr" value="<?= $penduduk['tgl_lhr']; ?>" />
                                <?= form_error('tgl_lhr', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="alamat" class="form-control-label">Alamat</label>
                                <input class="form-control" name="alamat" id="alamat" type="text" value="<?= $penduduk['alamat']; ?>" />
                                <?= form_error('alamat', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="no_hp" class="form-control-label">No. Hp</label>
                                <input class="form-control" name="no_hp" id="no_hp" type="text" value="<?= $penduduk['no_hp']; ?>" />
                                <?= form_error('no_hp', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="pendidikan" class="form-label">Pendidikan</label>
                                <select class="form-select" id="pendidikan" name="pendidikan" required>
                                    <option disable selected="selected"> - Pilih -</option>
                                    <option value="tidak_tamat" <?= ($penduduk['pendidikan'] == 'tidak_tamat') ? 'selected' : ''; ?>>Tidak Tamat SD</option>
                                    <option value="sd" <?= ($penduduk['pendidikan'] == 'sd') ? 'selected' : ''; ?>>Tamat SD</option>
                                    <option value="smp" <?= ($penduduk['pendidikan'] == 'smp') ? 'selected' : ''; ?>>Tamat SMTP</option>
                                    <option value="smta" <?= ($penduduk['pendidikan'] == 'smta') ? 'selected' : ''; ?>>Tamat SMTA</option>
                                    <option value="diploma" <?= ($penduduk['pendidikan'] == 'diploma') ? 'selected' : ''; ?>>Diploma</option>
                                    <option value="s1" <?= ($penduduk['pendidikan'] == 's1') ? 'selected' : ''; ?>>Sarjana (S1)</option>
                                    <option value="s2" <?= ($penduduk['pendidikan'] == 's2') ? 'selected' : ''; ?>>Pasca Sarjana (S2)</option>
                                    <option value="doktor" <?= ($penduduk['pendidikan'] == 'doktor') ? 'selected' : ''; ?>>Doktor (S3)</option>
                                    <option value="lainnya" <?= ($penduduk['pendidikan'] == 'lainnya') ? 'selected' : ''; ?>>Lainny</option>
                                </select>

                                <?= form_error('pendidikan', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <select class="form-select" id="pekerjaan" name="pekerjaan" required>
                                    <option value="<?= $penduduk['pekerjaan']; ?>" selected="selected"><?= $penduduk['pekerjaan']; ?></option>
                                </select>
                                <?= form_error('pekerjaan', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="rw_rt" class="form-control-label">RW/RT</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input class="form-control" placeholder="RW" name="rw" id="rw" type="number" value="<?= $penduduk['rw']; ?>" />
                                        <?= form_error('rw', '<div class="text-danger text-sm">', '</div>'); ?>
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control" placeholder="RT" name="rt" id="rt" type="number" value="<?= $penduduk['rt']; ?>" />
                                        <?= form_error('rt', '<div class="text-danger text-sm">', '</div>'); ?>
                                    </div>
                                </div>
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

<!-- Script -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#pekerjaan").select2({
            ajax: {
                url: '<?= base_url() ?>admin/penduduk/getPekerjaan',
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
    });
</script>