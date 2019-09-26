<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('info_model', 'i');
        $this->load->model('keluhan_model', 'km');
        $this->load->model('surat_model', 'sm');
    }

    public function simpan()
    {
        $post = $this->input->post(null, true);
        $this->i->simpan($post);
        $html = $this->load->view('pelayanan/info/view', array('info' => $this->km->get('tb_info', 'id_info')->result_array()), true);
        $spk = $this->load->view('pelayanan/surat/view', array('spk' => $this->sm->join()->result_array()), true);

        $callback = array(
            'status' => 'sukses',
            'pesan' => 'Data berhasil disimpan',
            'html' => $html,
            'spk' => $spk,
        );
        echo json_encode($callback);
    }
}
