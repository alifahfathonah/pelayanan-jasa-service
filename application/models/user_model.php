<?php

class user_model extends CI_Model
{
    public function get($id = null, $level = null)
    {
        $this->db->select('*');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        if ($level != null) {
            $this->db->where('level', $level);
        }
        return $this->db->get('tb_user');
    }

    public function addUser($post)
    {
        $param = [
            'id_user' => $post['id'],
            'nama' => $post['nama'],
            'no_telp' => $post['no'],
            'username' => $post['username'],
            'password' => password_hash($post['password'], PASSWORD_DEFAULT),
            'level' => $post['level'],
        ];
        $this->db->insert('tb_user', $param);
    }

    public function editUser($post)
    {
        $param['nama'] = $post['nama'];
        $param['no_telp'] = $post['no'];
        $param['username'] = $post['username'];
        $param['level'] = $post['level'];
        if (!empty($post['password'])) {
            $param['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
        }
        $this->db->where('id_user', $post['id']);
        $this->db->update('tb_user', $param);
    }
}
