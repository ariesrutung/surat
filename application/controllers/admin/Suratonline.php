<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suratonline extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengajuan_track_model', 'pengajuan_track');
        $this->load->model('Penduduk_model', 'penduduk');

        $this->load->helper(array('form', 'url', 'Cookie', 'String'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $judul = [
            'title' => 'Pengajuan Surat Online',
            'sub_title' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        ];

        $data['options'] = [
            '- Pilih -',
            'Surat Pengantar:' => [
                'SPKK' => 'Kartu Keluarga',
                'SPNA' => 'Nikah(N.A)',
            ],
            'Surat Keterangan:' => [
                'SKKL' => 'Kelahiran',
                'SKKM' => 'Kematian',
                'SKP' => 'Pindah',
                'SKD' => 'Datang',
                'SKBM' => 'Belum Menikah',
                'SKPH' => 'Penghasilan',
                'SKM' => 'Miskin',
                'SKU' => 'Usaha',
                'SKT' => 'Tanah',
                'SKGG' => 'Ganti Rugi',
            ],
            'Rekomendasi Surat:' => [
                'SITU' => 'Izin Tempat Usaha',
                'SIMB' => 'Izin Mendirikan Bangunan',
            ],
        ];

        $this->load->view('frontend/new_ui/header', $judul);
        $this->load->view('frontend/new_ui/s_online', $data);
        $this->load->view('frontend/new_ui/footer', $data);
    }

    public function ajukan()
    {
        $status = [
            1 => 1,  // Pending
            2 => 2,  // Diterima dan Dilanjutkan
            3 => 3,  // Sudah Diketik dan Diparaf
            4 => 4,  // Sudah Ditandatangani Lurah dan Selesai
        ];

        $nama = $this->input->post('nama', TRUE);
        $nik = $this->input->post('nik', TRUE);
        $no_hp = $this->input->post('no_hp', TRUE);
        $jenis_surat = $this->input->post('jenis_surat', TRUE);

        $ceknik = $this->penduduk->cek_penduduk($nik)->num_rows();

        if ($ceknik <= 0) {
            $save = [
                'nik' => $nik,
                'nama' => $nama,
                'no_hp' => $no_hp,
            ];

            $this->db->insert('penduduk', $save);
        }

        $rid = uniqid($jenis_surat, TRUE);
        $rid2 = str_replace('.', '', $rid);
        $rid3 = substr(str_shuffle($rid2), 0, 3);

        $cc = $this->db->count_all('pengajuan_surat') + 1;
        $count = str_pad($cc, 3, STR_PAD_LEFT);
        $id = $jenis_surat . "-" . $rid3 . $count . date('ymdHis');

        if ($_FILES['file']['error'] != UPLOAD_ERR_NO_FILE) {
            if ($_FILES['file']['size'] >= 5242880) {
                $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i> MAAF!</h5> File Lebih 2MB!</div>');
                redirect(base_url("admin/suratonline"));
            }

            $config['upload_path']   = './uploads/berkas';
            $config['allowed_types'] = '*';
            $config['max_size']      = 5120; // 5MB
            $config['file_name']     = $id; // Gunakan ID sebagai nama file

            $this->load->library('upload', $config);

            if ($this->upload->do_upload("file")) {
                $data = array('upload_data' => $this->upload->data());
                $berkas = $data['upload_data']['file_name'];
            }
        } else {
            // Jika tidak ada file diunggah, set nilai $file ke '-'
            $berkas = '-';
        }

        $data = [
            'id' => $id,
            'nik' => $nik,
            'jenis_surat' => $jenis_surat,
            'file' => $berkas, // Menggunakan variabel $berkas yang sudah didefinisikan
            'tanggal' => date('Y-m-d'),
            'status' => $status[1]
        ];

        $this->pengajuan_track->insert_p_surat($data);

        $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Selamat!</h5> Anda telah berhasil mengajukan permohonan pembuatan surat <b>' . $jenis_surat . '</b> dengan <b>ID</b> <b>' . $id . '</b></div>');
        redirect(base_url("admin/suratonline"));
    }
}
