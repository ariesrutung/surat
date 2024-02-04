<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profil_model');

        $this->load->helper(array('form', 'url', 'Cookie', 'String'));
        $this->load->library('form_validation');

        if ($this->session->userdata('id_user') == FALSE) {
            redirect(base_url("admin/auth/login"));
        }
    }

    public function index()
    {

        $judul = [
            'title' => 'Management Profil',
            'sub_title' => ''
        ];

        $data['data'] = $this->db->get('profil')->result_array();
        $this->load->view('backend/template/header', $judul);
        $this->load->view('backend/profil/index', $data);
        $this->load->view('backend/template/footer');
    }

    public function hapus_profil($id)
    {

        $data = $this->db->get_where('profil', ['id' => $id])->row_array();

        unlink("./uploads/profil/" . $data['gambar']);

        $this->db->where(['id' => $id]);
        $this->db->delete('profil');
        $this->session->set_flashdata('success', 'Berhasil Dihapus!');
        redirect(base_url('admin/profil'));
    }

    public function tambah_profil()
    {

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('ket_gambar', 'Keterangan Gambar', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $judul = [
                'title' => 'Tambah Profil',
                'sub_title' => ''
            ];
            $this->load->view('backend/template/header', $judul);
            $this->load->view('backend/profil/tambah_profil');
            $this->load->view('backend/template/footer');
        } else {

            $judul = $this->input->post("judul", TRUE);
            $isi = $this->input->post("isi", TRUE);
            $lokasi = $this->input->post("lokasi", TRUE);
            $ket_gambar = $this->input->post("ket_gambar", TRUE);
            $tanggal = $this->input->post("tanggal", TRUE);
            $kategori = $this->input->post("kategori", TRUE);
            $penulis = $this->session->userdata('id_user');

            $config['upload_path']          = './uploads/profil';
            $config['allowed_types']        = 'png|jpg|jpeg|pdf';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {

                $data = array('upload_data' => $this->upload->data());
                $gambar = $data['upload_data']['file_name'];
                $slug = url_title($this->input->post('judul'), 'dash', TRUE);

                $save = [
                    'judul' => $judul,
                    'isi' => $isi,
                    'lokasi' => $lokasi,
                    'gambar' => $gambar,
                    'ket_gambar' => $ket_gambar,
                    'slug' => $slug,
                    'tanggal' => $tanggal,
                    'kategori' => $kategori,
                    'penulis' => $penulis,
                ];

                $this->db->insert('profil', $save);
                $this->session->set_flashdata('success', 'Berhasil Ditambahkan!');
                redirect(base_url("admin/profil"));
            }
        }
    }

    public function edit_profil($id)
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('ket_gambar', 'Keterangan Gambar', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $judul = [
                'title' => 'Management Profil',
                'sub_title' => 'Surat Masuk'
            ];

            $data['profil'] = $this->db->get_where('profil', ['id' => $id])->row_array();
            $this->load->view('backend/template/header', $judul);
            $this->load->view('backend/profil/edit_profil', $data);
            $this->load->view('backend/template/footer');
        } else {
            $judul = $this->input->post("judul", TRUE);
            $isi = $this->input->post("isi", TRUE);
            $lokasi = $this->input->post("lokasi", TRUE);
            $ket_gambar = $this->input->post("ket_gambar", TRUE);
            $tanggal = $this->input->post("tanggal", TRUE);
            $kategori = $this->input->post("kategori", TRUE);

            $config['upload_path']          = './uploads/profil';
            $config['allowed_types']        = 'png|jpg|jpeg';
            $this->load->library('upload', $config);

            // Cek apakah gambar diunggah
            if ($this->upload->do_upload('gambar')) {
                $data = $this->db->get_where('profil', ['id' => $id])->row_array();
                unlink("./uploads/profil/" . $data['gambar']);

                $uploaded_data = $this->upload->data();
                $gambar = $uploaded_data['file_name'];
                $slug = url_title($this->input->post('judul'), 'dash', TRUE);

                $update = [
                    'judul' => $judul,
                    'isi' => $isi,
                    'lokasi' => $lokasi,
                    'gambar' => $gambar,
                    'ket_gambar' => $ket_gambar,
                    'slug' => $slug,
                    'tanggal' => $tanggal,
                    'kategori' => $kategori,
                ];

                $this->db->where('id', $id);
                $this->db->update('profil', $update);

                $this->session->set_flashdata('success', 'Berhasil Diupdate!');
                redirect(base_url("admin/profil"));
            } else {
                // Jika gambar tidak diunggah, gunakan gambar yang sudah ada
                $gambar = $this->db->get_where('profil', ['id' => $id])->row_array()['gambar'];

                $update = [
                    'judul' => $judul,
                    'isi' => $isi,
                    'lokasi' => $lokasi,
                    'gambar' => $gambar,
                    'ket_gambar' => $ket_gambar,
                    'slug' => $slug,
                    'tanggal' => $tanggal,
                    'kategori' => $kategori,
                ];

                $this->db->where('id', $id);
                $this->db->update('profil', $update);

                $this->session->set_flashdata('success', 'Berhasil Diupdate!');
                redirect(base_url("admin/profil"));
            }
        }
    }
}
