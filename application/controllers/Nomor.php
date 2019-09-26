<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nomor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('nomor_model', 'm');
    }

    public function index()
    {
        $data['tampilSemua'] = $this->m->get(null, 'tb_nomorperbaikan', 'id_nomor', 'tidak')->result_array();
        $this->template->load('template', 'pelayanan/nomor/index', $data);
    }

    public function addNomor()
    {
        $post = $this->input->post(null, true);
        $this->m->addNomor($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Ditambahkan');
            redirect('nomor');
        }
    }

    public function editNomor()
    {
        $post = $this->input->post(null, true);
        $this->m->editNomor($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Diubah');
            redirect('nomor');
        }
    }

    public function deleteNomor()
    {
        $id = $this->uri->segment(3);
        $this->db->where('id_nomor', $id);
        $this->db->delete('tb_nomorperbaikan');
        redirect('nomor');
    }
}
