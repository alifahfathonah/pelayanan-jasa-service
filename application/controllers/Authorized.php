<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authorized extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data_model', 'm');
    }

    public function index()
    {
        $data['tampilSemua'] = $this->m->get('tb_authorized', 'id_authorized')->result_array();
        $this->template->load('template', 'pelayanan/authorized/index', $data);
    }

    public function addAth()
    {
        $post = $this->input->post(null, true);
        $this->m->addAth($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Ditambahkan');
            redirect('authorized');
        }
    }

    public function editAth()
    {
        $post = $this->input->post(null, true);
        $this->m->editAth($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Diubah');
            redirect('authorized');
        }
    }

    public function deleteAth()
    {
        $id = $this->uri->segment(3);
        $this->db->where('id_authorized', $id);
        $this->db->delete('tb_authorized');
        redirect('authorized');
    }
}
