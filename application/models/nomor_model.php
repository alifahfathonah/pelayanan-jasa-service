<?php

class nomor_model extends CI_Model
{
    public function get($id = null, $tabel, $param, $not = null)
    {
        $this->db->select('*');
        if ($id != null) {
            $this->db->where('id_nomor', $id);
        }
        if ($not != null) {
            $this->db->where_not_in('nomor_perbaikan', $not);
        }
        $this->db->order_by($param, 'DESC');
        return $this->db->get($tabel);
    }

    public function addNomor($post)
    {
        $param = [
            'nomor_perbaikan' => $post['nomor'],
            'status' => 'belum'
        ];
        $this->db->insert('tb_nomorperbaikan', $param);
    }

    public function editNomor($post)
    {
        $param['nomor_perbaikan'] = $post['nomor'];
        $param['status'] = $post['status'];

        $this->db->where('id_nomor', $post['id']);
        $this->db->update('tb_nomorperbaikan', $param);
    }

    public function getStatus()
    {
        $query = "SELECT id_nomor, nomor_perbaikan FROM tb_nomorperbaikan WHERE status='belum' AND nomor_perbaikan NOT IN ('tidak')";
        return $this->db->query($query);
    }
}
