<?php

class Penduduk_model extends CI_Model
{
    function search_nik($nik)
    {
        $this->db->like('nik', $nik, 'both');
        $this->db->order_by('nik', 'ASC');
        $this->db->limit(10);
        return $this->db->get('penduduk')->result();
    }

    public function cek_penduduk($nik)
    {
        return $this->db->get_where('penduduk', array('nik' => $nik));
    }

    var $table = 'penduduk';
    // var $column_order = array('tmpt_lhr', 'pekerjaan', 'alamat');
    // var $column_search = array('nama', 'nik', 'no_hp', 'tmpt_lhr', 'tgl_lhr', 'pekerjaan', 'alamat', 'rt', 'rw');
    var $column_order = array('nama', 'nik', 'no_hp', 'tmpt_lhr', 'tgl_lhr', 'pekerjaan', 'alamat', 'rt', 'rw');
    var $column_search = array('nama', 'nik', 'no_hp', 'tmpt_lhr', 'tgl_lhr', 'pekerjaan', 'alamat', 'rt', 'rw');
    // var $order = array('nik' => 'asc');

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

    public function get_pendidikan_data()
    {
        $query = $this->db->query("SELECT pendidikan, COUNT(*) as total FROM penduduk GROUP BY pendidikan");
        return $query->result();
    }
    public function get_pekerjaan_data()
    {
        $query = $this->db->query("SELECT pekerjaan, COUNT(*) as total FROM penduduk GROUP BY pekerjaan");
        return $query->result();
    }

    // 

    function getPekerjaan($searchTerm = "")
    {
        // Fetch pekerjaan
        $this->db->select('*');
        $this->db->like('namapekerjaan', $searchTerm);
        $fetched_records = $this->db->get('pekerjaanortu');
        $pekerjaanortu = $fetched_records->result_array();

        // Initialize Array with fetched data
        $data = array();
        foreach ($pekerjaanortu as $po) {
            $data[] = array("id" => $po['namapekerjaan'], "text" => $po['namapekerjaan']);
        }
        return $data;
    }
}
