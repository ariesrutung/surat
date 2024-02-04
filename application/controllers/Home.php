<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Galeri_model');
        $this->load->model('Informasi_model');
        $this->load->model('Slider_model');
        $this->load->model('Penduduk_model');

        $this->load->helper(array('form', 'url', 'Cookie', 'String'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $judul = [
            'title' => 'Berita',
            'sub_title' => 'Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.',

            'title2' => 'Berita Hari ini',
            'sub_title2' => 'Dapatkan informasi terbaru seputar kementerian desa di seluruh Indonesia per hari ini!'
        ];
        $data['alur_keluar'] = $this->db->get_where('profil', ['kategori' => 'alur_surat_keluar'])->row_array();
        $data['alur_masuk'] = $this->db->get_where('profil', ['kategori' => 'alur_surat_masuk'])->row_array();
        $data['fungsi_tujuan'] = $this->db->get_where('profil', ['kategori' => 'maksud_dan_tujuan'])->row_array();

        $data['berita_terbaru'] = $this->Informasi_model->get_4_terbaru_by_kategori('berita');
        $data['pengumuman_terbaru'] = $this->Informasi_model->get_4_terbaru_by_kategori('pengumuman');
        $data['pelatihan_terbaru'] = $this->Informasi_model->get_4_terbaru_by_kategori('pelatihan');
        $data['pendidikan_data'] = $this->Penduduk_model->get_pendidikan_data();
        $data['pekerjaan_data'] = $this->Penduduk_model->get_pekerjaan_data();
        $data['active_sliders'] = $this->Slider_model->get_active_sliders();

        $data['profil'] = $this->Galeri_model->getProfil();
        $this->load->view('frontend/new_ui/header', $judul);
        $this->load->view('frontend/new_ui/home', $data);
        $this->load->view('frontend/new_ui/footer', $data);
    }
}
