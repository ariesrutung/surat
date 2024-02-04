<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portofolio extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Portofolio_model');

        $this->load->helper(array('form', 'url', 'Cookie', 'String'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $judul = [
            'title' => 'Portofolio Kegiatan',
            'sub_title' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        ];

        $data['portofolios'] = $this->Portofolio_model->get_all();
        $data['unique_categories'] = array_unique(array_column($data['portofolios'], 'kategori'));

        $this->load->view('frontend/new_ui/header', $judul);
        $this->load->view('frontend/new_ui/portofolio', $data);
        $this->load->view('frontend/new_ui/footer', $data);
    }
}
