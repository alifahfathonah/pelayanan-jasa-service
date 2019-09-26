<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keluhan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('keluhan_model', 'n');
        $this->load->model('data_model', 'dm');
        $this->load->model('auth_model', 'am');
        $this->load->model('keluhan_model', 'km');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['keluhan'] = $this->n->join()->result_array();
        $data['spk'] = $this->n->get('tb_suratperintahkerja', 'id_surat')->result_array();
        $this->template->load('template', 'pelayanan/keluhan/index', $data);
    }

    public function ubahStatus($id)
    {
        $this->n->ubahStatus($id, '1');
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Dikirim');
            redirect('keluhan');
        }
    }

    public function kirim($id)
    {
        $data = $this->n->joinById($id)->row_array();
        $tgl = tgl_indo($data['tgl_keluhan']);
        $contents = "<table><tr><th style='padding: 8px 20px' colspan='3'>Data Keluhan</th></tr><tr><td style='padding: 8px 20px'>Nama Pelanggan</td><td>:</td><td style='padding: 8px 10px'>$data[nama_pelanggan]</td></tr><tr><td style='padding: 8px 20px'>No Telepon</td><td>:</td><td style='padding: 8px 10px'>$data[no_telp]</td></tr><tr><td style='padding: 8px 20px'>Alamat</td><td>:</td><td style='padding: 8px 10px'>$data[alamat]</td></tr><tr><td style='padding: 8px 20px'>Keluhan</td><td>:</td><td style='padding: 8px 10px'>$data[keluhan]</td></tr><tr><td style='padding: 8px 20px'>Barang</td><td>:</td><td style='padding: 8px 10px'>$data[nama_barang] - $data[type]</td></tr><tr><td style='padding: 8px 20px'>Tanggal</td><td>:</td><td style='padding: 8px 10px'>$tgl</td></tr><tr><td style='padding: 8px 20px'>Garansi</td><td>:</td><td style='padding: 8px 10px'><img src='http://localhost/service-harco/assets/img/garansi/$data[gambar_garansi]'></td></tr></table>";

        $this->email->from('myusuf@gmail.com', 'Harco Elektronik');
        $this->email->to($data['email']);

        $this->email->subject('Data Keluhan');
        $this->email->message($contents);

        $this->email->set_mailtype('html');
        $this->email->send();
        $this->ubahStatus($id);
    }

    public function konfirmasi()
    {
        $post = $this->input->post(null, true);
        $this->n->konfirmasi($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Dikonfirmasi');
            redirect('keluhan');
        }
    }

    public function tampil_perID($id)
    {
        $this->n->ubahNotif($id);
        $data['semua'] = $this->n->join()->result_array();
        $data['keluhan'] = $this->n->joinById($id)->row_array();
        $this->template->load('template', 'pelayanan/keluhan/tampil', $data);
    }

    public function tambah()
    {
        $data['be'] = $this->dm->get('tb_barangelektronik', 'id_barangelektronik', 'Random', 'nama_authorized !=', 'tb_authorized', 'id_authorized')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('pemohon', 'Pemohon', 'required|trim');
        $this->form_validation->set_rules('alamat_p', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_p', 'No. Telepon', 'required|trim');
        $this->form_validation->set_rules('no', 'No Telepon', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('keluhan', 'Keluhan', 'required|trim');
        $this->form_validation->set_rules('seri', 'Seri', 'required|trim');
        $this->form_validation->set_error_delimiters('<div style="font-size: smaller;" class="text-danger">', '</div>');
        $this->form_validation->set_message('required', '%s belum diisi');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'pelayanan/keluhan/tambah', $data);
        } else {
            $post = $this->input->post(null, true);
            $this->am->registerCC($post);
            $this->km->tambahCC($post);

            if ($this->db->affected_rows() == 1) {
                $this->session->set_flashdata('berhasil', 'Berhasil melakukan keluhan');
                redirect('keluhan');
            }
        }
    }
}
