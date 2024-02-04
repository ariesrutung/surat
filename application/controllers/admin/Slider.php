<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Slider_model');

        if ($this->session->userdata('id_user') == FALSE) {
            redirect(base_url("admin/auth/login"));
        }
    }

    public function index()
    {

        $judul = [
            'title' => 'Slider',
            'sub_title' => ''
        ];

        $data['sliders'] = $this->Slider_model->get_sliders();

        $this->load->view('backend/template/header', $judul);
        $this->load->view('backend/slider/index', $data);
        $this->load->view('backend/template/footer');
    }

    public function hapus($id)
    {

        $data = $this->db->get_where('slider', ['id' => $id])->row_array();

        unlink("./uploads/foto/" . $data['gambar']);

        $this->db->where(['id' => $id]);
        $this->db->delete('slider');
        $this->session->set_flashdata('success', 'Berhasil Dihapus!');
        redirect(base_url('admin/slider/index'));
    }

    public function tambah_slider()
    {

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('subjudul', 'Subjudul', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');


        if ($this->form_validation->run() == FALSE) {
            $judul = [
                'title' => 'Management User',
                'sub_title' => 'Surat Masuk'
            ];
            $this->load->view('backend/template/header', $judul);
            $this->load->view('backend/slider/tambah_slider');
            $this->load->view('backend/template/footer');
        } else {
            $judul =  $this->input->post("judul", TRUE);
            $subjudul =  $this->input->post("subjudul", TRUE);
            $status =  $this->input->post("status", TRUE);


            $config['upload_path']          = './uploads/slider';
            $config['allowed_types']        = 'png|jpg|jpeg';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {

                $data = array('upload_data' => $this->upload->data());
                $gambar = $data['upload_data']['file_name'];

                $save = [
                    'judul' => $judul,
                    'subjudul' => $subjudul,
                    'status' => $status,
                    'gambar' => $gambar,

                ];

                $this->db->insert('slider', $save);
                $this->session->set_flashdata('success', 'Berhasil Ditambahkan!');
                redirect(base_url("admin/slider/index"));
            }
        }
    }

    // public function edit_slider($id)
    // {

    //     $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
    //     $this->form_validation->set_rules('subjudul', 'Subjudul', 'required|trim');
    //     $this->form_validation->set_rules('status', 'Status', 'required|trim');


    //     if ($this->form_validation->run() == FALSE) {
    //         $judul = [
    //             'title' => 'Management User',
    //             'sub_title' => 'Surat Masuk'
    //         ];

    //         $data['slider'] = $this->db->get_where('slider', ['id' => $id])->row_array();
    //         $this->load->view('backend/template/header', $judul);
    //         $this->load->view('backend/slider/edit_slider', $data);
    //         $this->load->view('backend/template/footer');
    //     } else {
    //         $judul =  $this->input->post("judul", TRUE);
    //         $subjudul =  $this->input->post("subjudul", TRUE);
    //         $status =  $this->input->post("status", TRUE);

    //         $config['upload_path']          = './uploads/slider';
    //         $config['allowed_types']        = 'png|jpg|jpeg';
    //         $this->load->library('upload', $config);

    //         if ($this->upload->do_upload('gambar')) {
    //             $data = $this->db->get_where('slider', ['id' => $id])->row_array();
    //             unlink("./uploads/slider/" . $data['gambar']);

    //             $data = array('upload_data' => $this->upload->data());
    //             $gambar = $data['upload_data']['file_name'];

    //             $update = [
    //                 'judul' => $judul,
    //                 'subjudul' => $subjudul,
    //                 'status' => $status,
    //                 'gambar' => $gambar,

    //             ];

    //             $this->db->where('id', $id);
    //             $this->db->update('slider', $update);

    //             $this->session->set_flashdata('success', 'Berhasil Diupdate!');
    //             redirect(base_url("admin/slider/index"));
    //         } else {
    //             $update = [
    //                 'judul' => $judul,
    //                 'subjudul' => $subjudul,
    //                 'status' => $status,
    //                 'gambar' => $gambar,

    //             ];

    //             $this->db->where('id', $id);
    //             $this->db->update('slider', $update);

    //             $this->session->set_flashdata('success', 'Berhasil Diupdate!');
    //             redirect(base_url("admin/slider/index"));
    //         }
    //     }
    // }

    public function edit_slider($id)
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('subjudul', 'Subjudul', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $judul = [
                'title' => 'Management User',
                'sub_title' => 'Surat Masuk'
            ];

            $data['slider'] = $this->db->get_where('slider', ['id' => $id])->row_array();
            $this->load->view('backend/template/header', $judul);
            $this->load->view('backend/slider/edit_slider', $data);
            $this->load->view('backend/template/footer');
        } else {
            $judul =  $this->input->post("judul", TRUE);
            $subjudul =  $this->input->post("subjudul", TRUE);
            $status =  $this->input->post("status", TRUE);

            $config['upload_path']          = './uploads/slider';
            $config['allowed_types']        = 'png|jpg|jpeg';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $data = $this->db->get_where('slider', ['id' => $id])->row_array();
                unlink("./uploads/slider/" . $data['gambar']);

                $uploaded_data = $this->upload->data();
                $gambar = $uploaded_data['file_name'];
            } else {
                $gambar = $this->db->get_where('slider', ['id' => $id])->row_array()['gambar'];
            }

            $update = [
                'judul' => $judul,
                'subjudul' => $subjudul,
                'status' => $status,
                'gambar' => $gambar,
            ];

            $this->db->where('id', $id);
            $this->db->update('slider', $update);

            $this->session->set_flashdata('success', 'Berhasil Diupdate!');
            redirect(base_url("admin/slider/index"));
        }
    }


    public function ubah_status()
    {
        $slider_id = $this->input->post('id');
        $status = $this->input->post('status');

        $result = $this->Slider_model->update_slider_status($slider_id, $status);

        if ($result) {
            echo json_encode(array(
                'success' => true,
                'message' => 'Status slider berhasil diubah',
                'slider_id' => $slider_id,
                'status' => $status,
            ));
        } else {
            echo json_encode(array(
                'success' => false,
                'message' => 'Gagal mengubah status slider',
                'slider_id' => $slider_id,
                'status' => $status,
            ));
        }
    }


    public function hapus_slider($id)
    {
        $gambar_slider = $this->Slider_model->get_gambar_slider($id);

        $result = $this->Slider_model->hapus_slider($id);

        if ($result) {
            $this->hapus_gambar($gambar_slider);

            $this->session->set_flashdata('success', 'Slider berhasil dihapus!');
            redirect('admin/slider/index');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus slider');
            redirect('admin/slider/index');
        }
    }

    private function hapus_gambar($gambar)
    {
        $path = './uploads/slider/' . $gambar;
        if (file_exists($path)) {
            unlink($path);
        }
    }
}
