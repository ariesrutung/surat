<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portofolio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Portofolio_model');

        if ($this->session->userdata('id_user') == FALSE) {
            redirect(base_url("admin/auth/login"));
        }
    }

    public function index()
    {
        $judul = [
            'title' => 'Portofolio',
            'sub_title' => ''
        ];

        $config['upload_path']          = './uploads/portofolio';
        $config['allowed_types']        = 'png|jpg|jpeg';
        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        if ($this->upload->do_upload('gambar')) {
            $file = $this->upload->data('file_name');
            $judulinformasi = $this->input->post('judulinformasi');
            $kategori = $this->input->post('kategori');
            $this->db->insert('portofolio', array('judul' => $judulinformasi, 'gambar' => $file, 'kategori' => $kategori));
        }

        $data['portofolios'] = $this->Portofolio_model->get_all();

        $this->load->view('backend/template/header', $judul);
        $this->load->view('backend/portofolio/index', $data);
        $this->load->view('backend/template/footer');
    }


    public function hapus_portofolio($id)
    {
        $gambar_portofolio = $this->Portofolio_model->get_gambar_portofolio($id);

        $result = $this->Portofolio_model->hapus_portofolio($id);

        if ($result) {
            $this->hapus_gambar($gambar_portofolio);

            $this->session->set_flashdata('success', 'Portofolio berhasil dihapus!');
            redirect('admin/portofolio');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus portofolio');
            redirect('admin/portofolio');
        }
    }

    private function hapus_gambar($gambar)
    {
        $path = './uploads/portofolio/' . $gambar;

        if (file_exists($path)) {
            unlink($path);
        }
    }

    public function ajax_list()
    {
        $portofolios = $this->Portofolio_model->get_datatables();
        $data = array();
        foreach ($portofolios as $key => $porto) {
            $row = array();
            $row[] = $key + 1; // Nomor urut
            $row[] = $porto->judul;
            $row[] = $porto->kategori;

            $aksi = '<a href="' . base_url("uploads/portofolio") . '/' . $porto->gambar . '" class="btn bg-gradient-info btn-xs mx-1" target="_blank"><i class="fas fa-file-pdf"></i></a>';
            $aksi .= '<button type="button" class="btn bg-gradient-warning btn-xs mx-1" data-bs-toggle="modal" data-bs-target="#hapusPortofolio' . $porto->id . '"><i class="fas fa-trash-alt"></i></button>';

            $row[] = $aksi;

            $data[] = $row;
        }


        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Portofolio_model->count_all(),
            "recordsFiltered" => $this->Portofolio_model->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }
}
