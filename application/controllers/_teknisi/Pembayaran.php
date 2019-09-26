<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pembayaran_model', 'pm');
        $this->load->model('keluhan_model', 'km');
        $this->load->library('form_validation');
        $this->load->model('data_model', 'm');
    }

    public function index()
    {
        $user = $this->fungsi->user_login()->id_user;
        $data['bayar'] = $this->pm->join($user)->result_array();
        $data['belum_bayar'] = $this->pm->joinSudah($user)->result_array();
        $this->template->load('template', 'teknisi/pembayaran', $data);
    }

    public function bayar()
    {
        $id = $this->uri->segment(4);
        $data['jumlahData'] = $this->km->jumlahData($id);
        $data['totalSpar'] = $this->pm->totalSpar($id)->row_array();
        $data['bn'] = $this->pm->joinWhere()->row_array();
        $data['detail'] = $this->km->get('tb_suratdetail', 'id_detail', $id, 'id_surat', 'tb_suratperintahkerja', 'id_surat', 'tb_sparepart', 'id_sparepart')->result_array();
        $this->template->load('template', 'teknisi/bayar', $data);
    }

    public function simpanSparepart()
    {
        $post = $this->input->post(null, true);
        $this->m->ubahStok($post, '-');
        $this->pm->simpanSparepart($post);
        redirect('_teknisi/pembayaran/bayar/' . $post['id_surat']);
    }

    public function hapusSpar()
    {
        $post = $this->input->post(null, true);
        $this->m->ubahStok($post, '+');
        $this->pm->hapusSpar($post);

        redirect('_teknisi/pembayaran/bayar/' . $post['id_surat']);
    }

    public function simpan()
    {
        $this->pm->ubahttd();
        $this->pm->simpan();
        if ($this->input->post('garansi') != "") {
            $this->pm->statusGaransi();
        }
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Disimpan');
            redirect('_teknisi/pembayaran');
        }
    }
}
