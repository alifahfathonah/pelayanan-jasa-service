<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perkiraan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('perkiraan_model', 'pm');
    }

    public function index()
    {
        $data['tampilSemua'] = $this->pm->get()->result_array();
        $this->template->load('template', 'pelayanan/perkiraan/index', $data);
    }

    public function addPB()
    {
        $post = $this->input->post(null, true);
        $this->pm->addPB($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Ditambahkan');
            redirect('perkiraan');
        }
    }

    public function editPB()
    {
        $post = $this->input->post(null, true);
        $this->pm->editPB($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Diubah');
            redirect('perkiraan');
        }
    }

    public function deletePB()
    {
        $id = $this->uri->segment(3);
        $this->db->where('id_perkiraan', $id);
        $this->db->delete('tb_perkiraan');
        redirect('perkiraan');
    }
}
