<style>
    .card i.bi {
        font-size: 30px;
    }


    .badge {
        font-size: 66%;
        font-weight: 600;
        line-height: 1;
        display: inline-block;
        padding: .35rem .375rem;
        text-align: center;
        vertical-align: baseline;
        white-space: nowrap;
        border-radius: .375rem
    }

    .btn .badge {
        position: relative;
        top: -1px
    }

    .badge-pill {
        padding-right: .875em;
        padding-left: .875em;
        border-radius: 10rem
    }

    .badge-primary {
        color: #2643e9;
        background-color: #eaecfb
    }

    .badge-secondary {
        color: #cfe3f1;
        background-color: #fff
    }

    .badge-success {
        color: #1aae6f;
        background-color: #b0eed3
    }

    .badge-info {
        color: #03acca;
        background-color: #aaedf9
    }

    .badge-warning {
        color: #ff3709;
        background-color: #fee6e0
    }

    .badge-danger {
        color: #f80031;
        background-color: #fdd1da
    }

    .badge-light {
        color: #879cb0;
        background-color: #fff
    }

    .badge-dark {
        color: #090c0e;
        background-color: #6a7783
    }

    .badge-default {
        color: #091428;
        background-color: #4172c6
    }

    .badge-white {
        color: #e8e3e3;
        background-color: #fff
    }

    .badge-neutral {
        color: #e8e3e3;
        background-color: #fff
    }

    .badge-darker {
        color: #000;
        background-color: #525252
    }

    .table thead th,
    .table td,
    .table th {
        padding: 10px;
    }
</style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Surat Masuk</p>
                                <h5 class="font-weight-bolder">
                                    <?= $this->db->get('surat_masuk')->num_rows(); ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <i class="bi bi-envelope-check-fill text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Surat Keluar</p>
                                <h5 class="font-weight-bolder">
                                    <?= $this->db->get('surat_keluar')->num_rows(); ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <i class="bi bi-envelope-arrow-up text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Surat Keterangan</p>
                                <h5 class="font-weight-bolder">
                                    <?= $this->db->get('surat_keterangan')->num_rows(); ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <i class="bi bi-envelope-arrow-down text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Pengajuan Surat</p>
                                <h5 class="font-weight-bolder">
                                    <?= $this->db->get('pengajuan_surat')->num_rows(); ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <i class="bi bi-envelope-open text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-4 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h6 class="text-capitalize">Surat Masuk</h6>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="myCharts"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h6 class="text-capitalize">Surat Keluar</h6>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="myCharts1"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h6 class="text-capitalize">Surat Keterangan</h6>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="myCharts2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card ">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-2">5 Pengajuan Surat Terbaru</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center ">
                        <thead>
                            <tr class="text-xs font-weight-bold mb-0">
                                <th class="text-center">No</th>
                                <th>NIK</th>
                                <th>Jenis Surat</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm mb-0">
                            <?php
                            $no = 1; // Inisialisasi nomor urut
                            foreach ($pengajuan_terbaru as $pengajuan) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $pengajuan->NIK; ?></td>
                                    <td><?= $pengajuan->jenis_surat; ?></td>
                                    <td><?= $pengajuan->tanggal; ?></td>
                                    <td>
                                        <?php
                                            // Array asosiatif untuk menghubungkan nilai radio dengan teks status
                                            $statusLabels = array(
                                                1 => 'Pending',
                                                2 => 'Syarat Tidak Terpenuhi',
                                                3 => 'Diterima dan Dilanjutkan',
                                                4 => 'Sudah Diketik dan Diparaf',
                                                5 => 'Ditandatangani Lurah/Selesai',
                                            );

                                            // Menampilkan teks status berdasarkan nilai dari kolom status pada database
                                            $statusText = isset($statusLabels[$pengajuan->status]) ? $statusLabels[$pengajuan->status] : '';

                                            // Mengatur kelas badge berdasarkan status
                                            $badgeClass = '';
                                            switch ($pengajuan->status) {
                                                case 1:
                                                    $badgeClass = 'badge badge-pill badge-default';
                                                    break;
                                                case 2:
                                                    $badgeClass = 'badge badge-pill badge-primary';
                                                    break;
                                                case 3:
                                                    $badgeClass = 'badge badge-pill badge-warning';
                                                    break;
                                                case 4:
                                                    $badgeClass = 'badge badge-pill badge-info';
                                                    break;
                                                case 5:
                                                    $badgeClass = 'badge badge-pill badge-success';
                                                    break;
                                                default:
                                                    $badgeClass = 'badge badge-pill badge-danger';
                                                    break;
                                            }

                                            echo '<span class="' . $badgeClass . '">' . $statusText . '</span>';
                                            ?>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">5 Data Penduduk Terbaru</h6>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table align-items-center ">
                            <thead>
                                <tr class="text-xs font-weight-bold mb-0">
                                    <th class="text-center">No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Pekerjaan</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm mb-0">
                                <?php
                                $no = 1;
                                foreach ($penduduk_terbaru as $pdk) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $pdk->nik; ?></td>
                                        <td><?= $pdk->nama; ?></td>
                                        <td><?= $pdk->pekerjaan; ?></td>
                                        <td><?= $pdk->alamat; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer pt-3  ">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-end">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-end">
                        © <script>
                            document.write(new Date().getFullYear())
                        </script>,
                        made with <i class="fa fa-heart"></i> by
                        <a href="https://ariesrutung.blogspot.com" class="font-weight-bold" target="_blank">Aries Rutung</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
</main>