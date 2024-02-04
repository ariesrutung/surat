<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tracking extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengajuan_track_model', 'pengajuan_track');

        $this->load->helper(array('form', 'url', 'Cookie', 'String'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $judul = [
            'title' => 'Tracking Surat',
            'sub_title' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        ];

        $this->load->view('frontend/new_ui/header', $judul);
        $this->load->view('frontend/new_ui/tracking');
        $this->load->view('frontend/new_ui/footer');
    }

    public function cari()
    {

        $id = $this->input->post('trackid', TRUE);
        $row = $this->pengajuan_track->findById($id);

        $data = [
            'id' => $id,
            'row' => $row
        ];

        if ($row === null) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-bank"></i> Maaf!</h5> ID yang anda masukkan Salah! <b>ID: </b><b>' . $id . '</b> <i>tidak ditemukan</i></div>');
            redirect(base_url("admin/tracking"));
        } else {
            redirect(base_url("admin/tracking/tracked/") . $id);
        }
    }

    public function tracked()
    {
        $id = $this->uri->segment(4);
        $data['row'] = $this->pengajuan_track->showById($id);
        $data['options'] = [
            'SPKK' => 'Kartu Keluarga',
            'SPNA' => 'Nikah(N.A)',
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
            'SITU' => 'Izin Tempat Usaha',
            'SIMB' => 'Izin Mendirikan Bangunan',
        ];

        $judul = [
            'title' => 'Hasil Tracking Surat',
            'sub_title' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        ];

        $this->load->view('frontend/new_ui/header', $judul);
        $this->load->view('frontend/new_ui/result', $data);
        $this->load->view('frontend/New_ui/footer', $data);
    }
}
