<?php

class auth_model extends CI_Model
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

    public function login($post)
    {
        $user = $this->db->get_where('tb_user', ['username' => $post['user']])->row_array();

        if ($user) {
            if (password_verify($post['pass'], $user['password'])) {
                $data = [
                    'id_user' => $user['id_user'],
                    'user' => $user['username'],
                    'level' => $user['level']
                ];
                $this->session->set_userdata($data);
                if ($user['level'] == "pelayanan") {
                    redirect('pelayanan');
                } else if ($user['level'] == "teknisi") {
                    redirect('_teknisi/beranda');
                } else {
                    redirect('_pimpinan/beranda');
                }
            } else {
                $this->session->set_flashdata('pesan', 'Password anda salah');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', 'Email anda salah');
            redirect('auth');
        }
    }

    public function login_pelanggan($post)
    {
        $user = $this->db->get_where('tb_pendaftaran', ['username' => $post['user']])->row_array();

        if ($user) {
            if (password_verify($post['password'], $user['password'])) {
                $data = [
                    'id_pelanggan' => $user['id_pelanggan'],
                    'user' => $user['username'],
                ];
                $this->session->set_userdata($data);
                return $user;
            } else {
                $this->session->set_flashdata('pesan', 'Password anda salah');
                redirect('_pelanggan/beranda');
            }
        } else {
            $this->session->set_flashdata('pesan', 'Username anda salah');
            redirect('_pelanggan/beranda');
        }
    }

    public function register($post)
    {
        $data = [
            'id_pelanggan' => $post['id'],
            'nama_pelanggan' => $post['nama'],
            'jekel' => $post['jekel'],
            'no_telp' => $post['telp'],
            'username' => $post['user'],
            'password' => password_hash($post['pass'], PASSWORD_DEFAULT),
            'alamat' => $post['alamat'],
            'pelanggan_lat' => $post['lat'],
            'pelanggan_long' => $post['long'],
            'foto' => empty($_FILES['gambar']['name']) ? 'default.png' : $this->uploadImage(),
            'dateCreated' => time()
        ];

        $this->db->insert('tb_pendaftaran', $data);
    }

    public function registerCC($post)
    {
        $nama = $post['nama'];
        $pecah = explode(' ', $nama);
        $username = $pecah[0];
        $data = [
            'id_pelanggan' => $post['id_pel'],
            'nama_pelanggan' => $post['nama'],
            'jekel' => $post['jekel'],
            'no_telp' => $post['no'],
            'username' => $username,
            'password' => password_hash($username, PASSWORD_DEFAULT),
            'alamat' => $post['alamat'],
            'pelanggan_lat' => $post['lat'],
            'pelanggan_long' => $post['long'],
            'foto' => 'default.png',
            'dateCreated' => time()
        ];

        $this->db->insert('tb_pendaftaran', $data);
    }

    public function ubah_profile($post)
    {
        $param = [
            'nama_pelanggan' => $post['nama'],
            'jekel' => $post['jekel'],
            'no_telp' => $post['no'],
            'username' => $post['user'],
            'alamat' => $post['alamat'],
            'pelanggan_lat' => $post['lat'],
            'pelanggan_long' => $post['long'],
        ];
        $imageName = $_FILES['gambar']['name'];
        $id = $this->session->userdata('id_pelanggan');
        if (!empty($imageName)) {
            $param['foto'] = $this->uploadImage();
            $old = $this->get('tb_pendaftaran', 'id_pelanggan', $id, 'id_pelanggan')->row_array();
            $old2 = $old['foto'];
            if ($old2 != 'default.png') {
                unlink(FCPATH . 'assets/img/pelanggan/' . $old2);
            }
        } else {
            $param['foto'] = $post['old_image'];
        }

        $this->db->set($param);
        $this->db->where('id_pelanggan', $id);
        $this->db->update('tb_pendaftaran');
    }

    private function uploadImage()
    {
        $config['upload_path'] = './assets/img/pelanggan/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '2048';
        $config['file_name']  = round(microtime(true) * 1000);

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data('file_name');
        } else {
            echo $this->upload->display_errors();
        }
    }
}
