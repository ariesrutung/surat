<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Galeri_model');
        $this->load->model('Informasi_model', 'informasi');

        $this->load->helper(array('form', 'url', 'Cookie', 'String'));
        $this->load->library('form_validation');

        if ($this->session->userdata('id_user') == FALSE) {
            redirect(base_url("admin/auth/login"));
        }
    }

    public function index()
    {

        $judul = [
            'title' => 'Management Informasi',
            'sub_title' => ''
        ];

        $data['data'] = $this->db->get('informasi')->result_array();
        $this->load->view('backend/template/header', $judul);
        $this->load->view('backend/informasi/index', $data);
        $this->load->view('backend/template/footer');
    }

    public function hapus_informasi($id)
    {

        $data = $this->db->get_where('informasi', ['id' => $id])->row_array();

        unlink("./uploads/informasi/" . $data['gambar']);

        $this->db->where(['id' => $id]);
        $this->db->delete('informasi');
        $this->session->set_flashdata('success', 'Berhasil Dihapus!');
        redirect(base_url('admin/informasi'));
    }

    public function tambah_informasi()
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
                'title' => 'Tambah Informasi',
                'sub_title' => ''
            ];
            $this->load->view('backend/template/header', $judul);
            $this->load->view('backend/informasi/tambah_informasi');
            $this->load->view('backend/template/footer');
        } else {

            $judul = $this->input->post("judul", TRUE);
            $isi = $this->input->post("isi", TRUE);
            $lokasi = $this->input->post("lokasi", TRUE);
            $ket_gambar = $this->input->post("ket_gambar", TRUE);
            $tanggal = $this->input->post("tanggal", TRUE);
            $kategori = $this->input->post("kategori", TRUE);
            $status = '1';
            $penulis = $this->session->userdata('id_user');

            $config['upload_path']          = './uploads/informasi';
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
                    'status' => $status,
                    'penulis' => $penulis,
                ];

                $this->db->insert('informasi', $save);
                $this->session->set_flashdata('success', 'Berhasil Ditambahkan!');
                redirect(base_url("admin/informasi"));
            }
        }
    }

    public function edit_informasi($id)
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
                'title' => 'Management Informasi',
                'sub_title' => 'Surat Masuk'
            ];

            $data['informasi'] = $this->db->get_where('informasi', ['id' => $id])->row_array();
            $this->load->view('backend/template/header', $judul);
            $this->load->view('backend/informasi/edit_informasi', $data);
            $this->load->view('backend/template/footer');
        } else {
            $judul = $this->input->post("judul", TRUE);
            $isi = $this->input->post("isi", TRUE);
            $lokasi = $this->input->post("lokasi", TRUE);
            $ket_gambar = $this->input->post("ket_gambar", TRUE);
            $tanggal = $this->input->post("tanggal", TRUE);
            $kategori = $this->input->post("kategori", TRUE);

            $config['upload_path']          = './uploads/informasi';
            $config['allowed_types']        = 'png|jpg|jpeg';
            $this->load->library('upload', $config);

            // Cek apakah gambar diunggah
            if ($this->upload->do_upload('gambar')) {
                $data = $this->db->get_where('informasi', ['id' => $id])->row_array();
                unlink("./uploads/informasi/" . $data['gambar']);

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
                $this->db->update('informasi', $update);

                $this->session->set_flashdata('success', 'Berhasil Diupdate!');
                redirect(base_url("admin/informasi"));
            } else {
                // Jika gambar tidak diunggah, gunakan gambar yang sudah ada
                $gambar = $this->db->get_where('informasi', ['id' => $id])->row_array()['gambar'];

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
                $this->db->update('informasi', $update);

                $this->session->set_flashdata('success', 'Berhasil Diupdate!');
                redirect(base_url("admin/profil/informasi"));
            }
        }
    }

    public function ubah_status()
    {
        $info_id = $this->input->post('id');
        $status = $this->input->post('status');

        $result = $this->informasi->update_informasi_status($info_id, $status);

        if ($result) {
            echo json_encode(array(
                'success' => true,
                'message' => 'Status slider berhasil diubah',
                'info_id' => $info_id,
                'status' => $status,
            ));
        } else {
            echo json_encode(array(
                'success' => false,
                'message' => 'Gagal mengubah status slider',
                'info_id' => $info_id,
                'status' => $status,
            ));
        }
    }
}
