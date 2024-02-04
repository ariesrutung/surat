<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Struktur extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url', 'Cookie', 'String'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $judul = [
            'title' => 'Struktur Organisasi',
            'sub_title' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        ];

        $data['struktur_org'] = $this->db->get_where('profil', ['kategori' => 'struktur_organisasi'])->row_array();

        $this->load->view('frontend/new_ui/header', $judul);
        $this->load->view('frontend/new_ui/struktur', $data);
        $this->load->view('frontend/new_ui/footer', $data);
    }
}
