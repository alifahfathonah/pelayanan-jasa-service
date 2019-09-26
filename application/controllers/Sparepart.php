<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sparepart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data_model', 'm');
    }

    public function index()
    {
        $data['tampilSemua'] = $this->m->get('tb_sparepart', 'id_sparepart', null, null, 'tb_authorized', 'id_authorized')->result_array();
        $data['authorized'] = $this->m->get('tb_authorized', 'id_authorized')->result_array();
        $this->template->load('template', 'pelayanan/sparepart/index', $data);
    }

    public function addSparepart()
    {
        $post = $this->input->post(null, true);
        $this->m->addSparepart($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Ditambahkan');
            redirect('sparepart');
        }
    }

    public function editSparepart()
    {
        $post = $this->input->post(null, true);
        $this->m->editSparepart($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Diubah');
            redirect('sparepart');
        }
    }

    public function deleteSparepart()
    {
        $id = $this->uri->segment(3);
        $this->db->where('id_sparepart', $id);
        $this->db->delete('tb_sparepart');
        redirect('sparepart');
    }

    public function pasok()
    {
        $data['tampilSemua'] = $this->m->get('tb_pasok', 'id_pasok', null, null, 'tb_sparepart', 'id_sparepart')->result_array();
        $this->template->load('template', 'pelayanan/sparepart/pasok', $data);
    }

    public function pasokStok()
    {
        $post = $this->input->post(null, true);
        $this->m->pasokStok($post);
        if ($this->db->affected_rows() == 1) {
            $this->m->ubahStok($post, '+');
            $this->session->set_flashdata('berhasil', 'Berhasil Ditambahkan');
            redirect('sparepart/pasok');
        }
    }
}
