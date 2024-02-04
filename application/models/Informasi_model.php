<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi_model extends CI_Model
{
    public function get_informasi()
    {
        return $this->db->get('informasi')->result();
    }

    public function tambah_informasi($data)
    {
        $this->db->insert('informasi', $data);
        return $this->db->insert_id();
    }

    public function get_4_terbaru_by_kategori($kategori)
    {
        $this->db->select('*');
        $this->db->from('informasi');
        $this->db->where('kategori', $kategori);
        $this->db->where('status', 1); // Tambahkan kondisi untuk status aktif
        $this->db->order_by('tanggal', 'desc');
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_active_berita()
    {
        $this->db->where(['kategori' => 'berita', 'status' => 1]);
        $query = $this->db->get('informasi');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return $query->result_array();  // Perbaikan: tambahkan $this->
    }

    public function get_active_pelatihan()
    {
        $this->db->where(['kategori' => 'pelatihan', 'status' => 1]);
        $query = $this->db->get('informasi');

        if ($query->num_rows() > 0) {
            return $query->result_array();  // Menggunakan result_array() karena mengembalikan multiple rows
        }

        return array();  // Gunakan array() sebagai alternatif untuk result_array()
    }

    public function get_active_pengumuman()
    {
        $this->db->where(['kategori' => 'pengumuman', 'status' => 1]);
        $query = $this->db->get('informasi');

        if ($query->num_rows() > 0) {
            return $query->result_array();  // Menggunakan result_array() karena mengembalikan multiple rows
        }

        return array();  // Gunakan array() sebagai alternatif untuk result_array()
    }


    public function update_informasi_status($id, $status)
    {
        $data = array('status' => $status);
        $this->db->where('id', $id);
        $this->db->update('informasi', $data);
        return $this->db->affected_rows();
    }
}
