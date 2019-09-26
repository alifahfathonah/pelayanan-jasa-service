<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keluhan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('data_model', 'dm');
        $this->load->model('keluhan_model', 'km');
        $this->load->model('surat_model', 'sm');
    }

    public function index()
    {
        $data['be'] = $this->dm->get('tb_barangelektronik', 'id_barangelektronik', null, null, 'tb_authorized', 'id_authorized')->result_array();

        $this->form_validation->set_rules('seri', 'Seri', 'required|trim');
        $this->form_validation->set_rules('keluhan', 'Keluhan', 'required|trim');
        $this->form_validation->set_error_delimiters('<div style="font-size: smaller;" class="text-danger">', '</div>');
        $this->form_validation->set_message('required', '%s belum diisi');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template_fe', 'pelanggan/keluhan/tambah', $data);
        } else {
            $post = $this->input->post(null, true);
            $this->km->tambah($post);

            if ($this->db->affected_rows() == 1) {
                $this->session->set_flashdata('berhasil', 'Berhasil melakukan keluhan');
                redirect('_pelanggan/beranda');
            }
        }
    }

    public function riwayat()
    {
        $id = $this->fungsi->pelanggan_login()->id_pelanggan;
        $data['konfirmasi'] = $this->km->joinKonfirmasi($id)->result_array();
        $data['belum'] = $this->km->joinWhere($id)->result_array();
        $data['sudah'] = $this->sm->joinWhere($id, 'selesai')->result_array();
        $data['tolak'] = $this->km->joinKonfirmasi($id)->result_array();
        $this->template->load('template_fe', 'pelanggan/keluhan/riwayat', $data);
    }

    public function biaya()
    {
        $data['biaya'] = $this->dm->get('tb_perkiraan', 'id_perkiraan')->result_array();
        $this->template->load('template_fe', 'pelanggan/keluhan/biaya', $data);
    }

    public function keluhan_progress($id)
    {
        $pelanggan = $this->fungsi->pelanggan_login()->id_pelanggan;
        $data['belum'] = $this->km->joinProgress($id, 'belum', $pelanggan)->row_array();
        $data['otw'] = $this->km->joinProgress($id, 'otw', $pelanggan)->row_array();
        $data['setengah'] = $this->km->joinSetengah($id, 'setengah', $pelanggan)->row_array();
        $data['selesai'] = $this->km->joinProgress($id, 'selesai', $pelanggan)->row_array();
        $data['info'] = $this->km->info($id)->row_array();
        $data['tampilSemua'] = $this->dm->get('tb_info', 'id_info')->result_array();
        $this->template->load('template_fe', 'pelanggan/keluhan/progres', $data);
    }

    function tampilan_notif($id)
    {
        $this->km->ubahNotifPelanggan($id);
        $data['info'] = $this->km->lihat_notif($id);
        $this->template->load('template_fe', 'pelanggan/keluhan/tampil_notif', $data);
    }

    public function rincian($id)
    {
        $pelanggan = $this->fungsi->pelanggan_login()->id_pelanggan;
        $data['biaya'] = $this->km->joinRincian($id, 'selesai', $pelanggan)->row_array();
        $data['total'] = $this->km->totalSpar($id)->row_array();
        $data['spar'] = $this->km->joinSparPel($pelanggan, $id)->result_array();
        $this->template->load('template_fe', 'pelanggan/keluhan/rincian', $data);
    }
}
