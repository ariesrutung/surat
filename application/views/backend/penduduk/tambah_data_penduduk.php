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
</style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tambah Data Penduduk</h6>
                </div>
                <?php echo form_open_multipart(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="nik" class="form-control-label">NIK</label>
                                <input class="form-control" name="nik" id="nik" type="text" value="<?= set_value('nik'); ?>" />
                                <?= form_error('nik', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="nama" class="form-control-label">Nama Lengkap</label>
                                <input class="form-control" name="nama" id="nama" type="text" value="<?= set_value('nama'); ?>" />
                                <?= form_error('nama', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="tmpt_lhr" class="form-control-label">Tempat Lahir</label>
                                <input class="form-control" name="tmpt_lhr" id="tmpt_lhr" type="text" value="<?= set_value('tmpt_lhr'); ?>" />
                                <?= form_error('tmpt_lhr', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="tgl_lhr" class="form-control-label">Tanggal Lahir</label>
                                <input type="date" class="form-control datepicker" name="tgl_lhr" id="tgl_lhr" value="10/10/2016" />
                                <?= form_error('tgl_lhr', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="alamat" class="form-control-label">Alamat</label>
                                <input class="form-control" name="alamat" id="alamat" type="text" value="<?= set_value('alamat'); ?>" />
                                <?= form_error('alamat', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="no_hp" class="form-control-label">No. Hp</label>
                                <input class="form-control" name="no_hp" id="no_hp" type="text" value="<?= set_value('no_hp'); ?>" />
                                <?= form_error('no_hp', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="pendidikan" class="form-label">Pendidikan</label>
                                <select class="form-select" id="pendidikan" name="pendidikan" required>
                                    <option disable selected="selected"> - Pilih -</option>
                                    <option value="tidak_tamat">Tidak Tamat SD</option>
                                    <option value="sd">Tamat SD</option>
                                    <option value="smp">Tamat SMTP</option>
                                    <option value="smta">Tamat SMTA</option>
                                    <option value="diploma">Diploma</option>
                                    <option value="s1">Sarjana (S1)</option>
                                    <option value="s2">Pasca Sarjana (S2)</option>
                                    <option value="doktor">Doktor (S3)</option>
                                    <option value="lainnya">Lainny</option>
                                </select>
                                <?= form_error('pendidikan', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <select class="form-select" id="pekerjaan" name="pekerjaan" required>
                                    <option value="" selected="selected"> - Pilih -</option>
                                </select>
                                <?= form_error('pekerjaan', '<div class="text-danger text-sm">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="rw_rt" class="form-control-label">RW/RT</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input class="form-control" placeholder="RW" name="rw" id="rw" type="number" value="<?= set_value('rw'); ?>" />
                                        <?= form_error('rw', '<div class="text-danger text-sm">', '</div>'); ?>
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control" placeholder="RT" name="rt" id="rt" type="number" value="<?= set_value('rt'); ?>" />
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