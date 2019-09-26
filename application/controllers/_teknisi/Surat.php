<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('surat_model', 'sm');
        $this->load->model('data_model', 'dm');
    }

    public function index()
    {
        $data['spk'] = $this->sm->join()->result_array();
        $data['datap'] = $this->dm->get('tb_suratperintahkerja', 'id_surat')->result_array();
        $this->template->load('template', 'teknisi/surat', $data);
    }

    public function ubah()
    {
        $this->sm->ubah();
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Diubah');
            redirect('_teknisi/surat');
        }
    }

    public function ubahPerjalanan()
    {
        $this->sm->ubahPerjalanan();
        if ($this->db->affected_rows() == 1) {
            redirect('_teknisi/surat');
        }
    }

    public function ubahSetengah()
    {
        $this->sm->ubahSetengah();
        redirect('_teknisi/surat');
    }

    public function ubahSelesai()
    {
        $this->sm->ubahSelesai();
        echo base_url('_teknisi/pembayaran/bayar/' . $this->input->get('id'));
    }

    public function ubahSelesai2()
    {
        $this->sm->ubahSelesai();
        echo base_url('_teknisi/pembayaran/bayar/' . $this->input->get('id'));
    }

    public function tampilPerID($id)
    {
        $data['sparepart'] = $this->sm->joinSparepart($id)->result_array();
        $data['surat'] = $this->sm->joinDetail($id)->row_array();
        $this->template->load('template', 'teknisi/tampil', $data);
    }

    public function lokasi($id)
    {
        $data['surat'] = $this->sm->joinDetail($id)->row_array();
        $this->template->load('template', 'teknisi/lokasi', $data);
    }

    public function tampil_notif($id)
    {
        $this->sm->ubahNotif($id);
        $data['key'] = $this->sm->joinDetail($id)->row_array();
        $this->template->load('template', 'teknisi/tampil_notif', $data);
    }

    public function info()
    {
        $this->sm->ubah_info();
        redirect('_teknisi/surat');
    }

    public function detail($id)
    {
        $data['sparepart'] = $this->sm->joinSparepart($id)->result_array();
        $data['surat'] = $this->sm->joinDetail($id)->row_array();
        $this->template->load('template', 'teknisi/tampil', $data);
    }
}
