<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi_model extends CI_Model
{

    var $table = 'informasi';
    var $column_order = array('id', 'judul', 'isi', 'lokasi', 'gambar', 'ket_gambar', 'slug', 'tanggal', 'kategori', 'penulis');
    var $column_search = array('id', 'judul', 'isi', 'lokasi', 'gambar', 'ket_gambar', 'slug', 'tanggal', 'kategori', 'penulis');
    var $order = array('id' => 'asc');

    private function _get_datatables_query()
    {
        $this->db->from($this->table);

        $i = 0;
        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

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
        $this->db->order_by('tanggal', 'desc');
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result();
    }
}
