<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan_model', 'pm');
        $this->load->model('auth_model', 'am');
    }

    public function index()
    {
        $data['pelanggan'] = $this->pm->get('tb_pendaftaran', 'id_pelanggan', $this->session->userdata('id_pelanggan'), 'id_pelanggan')->row_array();
        $this->template->load('template_fe', 'pelanggan/profile/index', $data);
    }

    public function edit()
    {
        $data['pelanggan'] = $this->pm->get('tb_pendaftaran', 'id_pelanggan', $this->session->userdata('id_pelanggan'), 'id_pelanggan')->row_array();
        $this->template->load('template_fe', 'pelanggan/profile/ubah', $data);
    }

    public function prosesEdit()
    {
        $post = $this->input->post(null, true);
        $this->am->ubah_profile($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil diubah');
            redirect('_pelanggan/profile/edit');
        }
    }
}
