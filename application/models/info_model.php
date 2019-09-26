<?php

class info_model extends CI_Model
{
    public function simpan($post)
    {
        $param = [
            'id_info' => null,
            'id_surat' => $post['id_surat'],
            'info' => $post['info'],
            'keterangan' => $post['ket'],
        ];

        $this->db->insert('tb_info', $param);
    }
}
