<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('surat_model', 'sm');
    }

    public function index()
    {
        $data['spk'] = $this->sm->joinbelumttd()->result_array();
        $this->template->load('template', 'pimpinan/surat', $data);
    }

    public function ttd()
    {
        $this->sm->ttd();
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Diubah');
            redirect('_pimpinan/surat');
        }
    }

    public function tampil_notif($id)
    {
        $this->sm->ubahNotif_ttd($id);
        $data['key'] = $this->sm->joinDetail($id)->row_array();
        $this->template->load('template', 'pimpinan/tampil_notif', $data);
    }

    public function detail($id)
    {
        $data['sparepart'] = $this->sm->joinSparepart($id)->result_array();
        $data['surat'] = $this->sm->joinDetail($id)->row_array();
        $this->template->load('template', 'pimpinan/detail', $data);
    }
}
