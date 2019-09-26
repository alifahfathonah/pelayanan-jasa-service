<?php

class pelanggan_model extends CI_Model
{
    public function get($tb, $order, $id = null, $param = null, $tb2 = null, $param2 = null)
    {
        $this->db->select('*');
        $this->db->from($tb);
        if ($tb2 != null) {
            $this->db->join($tb2, $param2 = $param2);
        }
        if ($id != null) {
            $this->db->where($param, $id);
        }
        $this->db->order_by($order, 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function jumlah_pelanggan()
    {
        $this->db->select('id_pelanggan');
        return $this->db->get('tb_pendaftaran')->num_rows();
    }
}
