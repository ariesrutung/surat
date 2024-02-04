<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tambah Portofolio</h6>
                </div>
                <?php echo form_open_multipart(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="kategori" class="form-label">Kategori Informasi</label>
                                <select class="form-select" id="kategori" name="kategori" required>
                                    <option> - Pilih -</option>
                                    <option value="berita">Berita</option>
                                    <option value="pengumuman">Pengumuman</option>
                                    <option value="pelatihan">Pelatihan</option>
                                    <option value="profil">Profil Kelurahan</option>
                                    <option value="alur_surat_masuk">Alur Surat Masuk</option>
                                    <option value="alur_surat_keluar">Alur Surat Keluar</option>
                                    <option value="maksud_dan_tujuan">Maksud & Tujuan</option>
                                    <option value="struktur_organisasi">Struktur Organisasi</option>
                                    <option value="profil">Profil</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="dropzone">
                                    <div class="dz-message">
                                        <p> Klik atau Drop gambar disini</p>
                                    </div>

                                </div>
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

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

<script>
    Dropzone.autoDiscover = false;

    var foto_upload = new Dropzone(".dropzone", {
        url: "<?php echo base_url('admin/portofolio/proses_upload') ?>",
        maxFilesize: 2,
        method: "post",
        acceptedFiles: "image/*",
        paramName: "userfile",
        dictInvalidFileType: "Type file ini tidak dizinkan",
        addRemoveLinks: true,
    });

    // Simpan nilai kategori saat terjadi perubahan pada dropdown
    var selectedKategori = "";
    $("#kategori").change(function() {
        selectedKategori = $(this).val();
    });

    // Event ketika Memulai mengupload
    foto_upload.on("sending", function(a, b, c) {
        // Menggunakan nilai kategori sebagai token
        a.token = selectedKategori;
        c.append("token_foto", a.token); // Menyisipkan token untuk masing-masing foto
    });

    // Menonaktifkan Dropzone saat tombol "Simpan" ditekan
    $("button.btn-success").on("click", function() {
        foto_upload.disable();

        // Get the token and file name from the last uploaded file
        var lastFile = foto_upload.files[foto_upload.files.length - 1];
        var token = lastFile.token || '';
        var fileName = lastFile.name || '';

        // Perform AJAX request to save data to the database
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('admin/portofolio/save_to_database') ?>",
            data: {
                token: token,
                fileName: fileName
            },
            success: function(response) {
                console.log(response); // Log the response from the server
                // Add logic here based on the server response if needed
            },
            error: function(error) {
                console.error(error); // Log any errors that occur during the AJAX request
                // Add error handling logic here if needed
            },
            complete: function() {
                // Enable Dropzone after the AJAX request is complete (success or error)
                foto_upload.enable();
            }
        });
    });
</script>