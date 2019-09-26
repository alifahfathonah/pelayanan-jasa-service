<?php

class perkiraan_model extends CI_Model
{
    public function get()
    {
        $this->db->order_by('id_perkiraan', 'ASC');
        return $this->db->get('tb_perkiraan');
    }

    public function addPB($post)
    {
        $param = [
            'keterangan' => $post['ket'],
            'harga' => $post['harga']
        ];
        $this->db->insert('tb_perkiraan', $param);
    }

    public function editPB($post)
    {
        $param = [
            'keterangan' => $post['ket'],
            'harga' => $post['harga']
        ];

        $this->db->where('id_perkiraan', $post['id']);
        $this->db->update('tb_perkiraan', $param);
    }

    public function getStatus()
    {
        return $this->db->get_where('tb_perkiraan', ['status' => 'belum']);
    }
}
