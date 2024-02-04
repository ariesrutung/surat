<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Informasi_model');

        $this->load->helper(array('form', 'url', 'Cookie', 'String'));
        $this->load->library('form_validation');
    }

    public function berita()
    {
        $data['active_berita'] = $this->Informasi_model->get_active_berita();
        $judul = [
            'title' => 'Berita',
            'sub_title' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        ];

        $this->load->view('frontend/new_ui/header', $judul);
        $this->load->view('frontend/new_ui/berita', $data);
        $this->load->view('frontend/new_ui/footer', $data);
    }

    public function detail_berita($slug)
    {
        $data['detail'] = $this->db->get_where('informasi', ['slug' => $slug, 'kategori' => 'berita'])->row_array();

        if (!$data['detail']) {
            show_404();
        }

        $judul = [
            'title' => 'Detail Berita',
            'sub_title' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        ];

        $data['berita_terbaru'] = $this->Informasi_model->get_4_terbaru_by_kategori('berita');

        $this->load->view('frontend/new_ui/header', $judul);
        $this->load->view('frontend/new_ui/detail_berita', $data);
        $this->load->view('frontend/new_ui/footer', $data);
    }

    public function pengumuman()
    {
        $data['active_pengumuman'] = $this->Informasi_model->get_active_pengumuman();

        $judul = [
            'title' => 'Pengumuman',
            'sub_title' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        ];

        $this->load->view('frontend/new_ui/header', $judul);
        $this->load->view('frontend/new_ui/pengumuman', $data);
        $this->load->view('frontend/new_ui/footer', $data);
    }

    public function detail_pengumuman($slug)
    {
        $data['detail'] = $this->db->get_where('informasi', ['slug' => $slug, 'kategori' => 'pengumuman'])->row_array();

        if (!$data['detail']) {
            show_404();
        }

        $judul = [
            'title' => 'Detail Pengumuman',
            'sub_title' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        ];

        $data['pengumuman_terbaru'] = $this->Informasi_model->get_4_terbaru_by_kategori('pengumuman');

        $this->load->view('frontend/new_ui/header', $judul);
        $this->load->view('frontend/new_ui/detail_pengumuman', $data);
        $this->load->view('frontend/new_ui/footer', $data);
    }

    public function pelatihan()
    {
        $data['active_pelatihan'] = $this->Informasi_model->get_active_pelatihan();

        $judul = [
            'title' => 'Pelatihan',
            'sub_title' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        ];
        $this->load->view('frontend/new_ui/header', $judul);
        $this->load->view('frontend/new_ui/pelatihan', $data);
        $this->load->view('frontend/new_ui/footer', $data);
    }


    public function detail_pelatihan($slug)
    {
        $data['detail'] = $this->db->get_where('informasi', ['slug' => $slug, 'kategori' => 'pelatihan'])->row_array();

        if (!$data['detail']) {
            show_404();
        }

        $judul = [
            'title' => 'Detail Pelatihan',
            'sub_title' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        ];

        $data['pelatihan_terbaru'] = $this->Informasi_model->get_4_terbaru_by_kategori('pelatihan');

        $this->load->view('frontend/new_ui/header', $judul);
        $this->load->view('frontend/new_ui/detail_pelatihan', $data);
        $this->load->view('frontend/new_ui/footer', $data);
    }
}
