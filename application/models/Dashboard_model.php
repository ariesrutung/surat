<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function user()
    {
        return $this->db->get("user")->result_array();
    }

    public function get_5_pengajuan_terbaru()
    {
        $this->db->select('*');
        $this->db->from('pengajuan_surat');
        $this->db->order_by('tanggal', 'desc');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_5_penduduk_terbaru()
    {
        $this->db->select('*');
        $this->db->from('penduduk');
        $this->db->order_by('tgl_lhr', 'desc');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result();
    }
}
