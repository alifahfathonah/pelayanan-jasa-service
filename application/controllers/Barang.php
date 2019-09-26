<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data_model', 'm');
    }

    public function index()
    {
        $data['tampilSemua'] = $this->m->get('tb_barangelektronik', 'id_barangelektronik', null, null, 'tb_authorized', 'id_authorized')->result_array();
        $data['authorized'] = $this->m->get('tb_authorized', 'id_authorized')->result_array();
        $this->template->load('template', 'pelayanan/barang/index', $data);
    }

    public function addBarang()
    {
        $post = $this->input->post(null, true);
        $this->m->addBarang($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Ditambahkan');
            redirect('barang');
        }
    }

    public function editBarang()
    {
        $post = $this->input->post(null, true);
        $this->m->editBarang($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Diubah');
            redirect('barang');
        }
    }

    public function deleteBarang()
    {
        $id = $this->uri->segment(3);
        $this->db->where('id_barangelektronik', $id);
        $this->db->delete('tb_barangelektronik');
        redirect('barang');
    }
}
