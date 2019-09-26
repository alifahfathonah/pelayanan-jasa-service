<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan_model', 'm');
    }

    public function index()
    {
        $data['pelanggan'] = $this->m->get('tb_pendaftaran', 'id_pelanggan')->result_array();
        $this->template->load('template', 'pelayanan/pelanggan/index', $data);
    }
}
