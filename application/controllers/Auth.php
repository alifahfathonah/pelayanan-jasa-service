<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // sudah_login();
        $this->load->library('form_validation');
        $this->load->model('auth_model');
    }

    public function index()
    {
        $this->form_validation->set_rules('user', 'Username', 'required|trim');
        $this->form_validation->set_rules('pass', 'Password', 'required|trim');
        $this->form_validation->set_error_delimiters('<div style="font-size: smaller;" class="text-danger">', '</div>');
        $this->form_validation->set_message('required', '%s belum diisi');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template_login', 'auth/login');
        } else {
            $post = $this->input->post(null, true);
            $this->auth_model->login($post);
        }
    }

    public function login_pelanggan()
    {
        $post = $this->input->post(null, true);
        $login = $this->auth_model->login_pelanggan($post);

        if ($login > 1) {
            redirect('_pelanggan/beranda');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('user', 'Username', 'required|trim');
        $this->form_validation->set_rules('pass', 'Password', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('telp', 'Telepon', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_error_delimiters('<div style="font-size: smaller;" class="text-danger">', '</div>');
        $this->form_validation->set_message('required', '%s belum diisi');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template_fe', 'pelanggan/auth/register');
        } else {
            $post = $this->input->post(null, true);
            $this->auth_model->register($post);

            if ($this->db->affected_rows() == 1) {
                $this->session->set_flashdata('daftar', 'Berhasil Daftar');
                redirect('_pelanggan/beranda');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('user');
        redirect('auth');
    }

    public function pelanggan_logout()
    {
        $this->session->unset_userdata('id_pelanggan');
        $this->session->unset_userdata('user');
        redirect('_pelanggan/beranda');
    }
}
