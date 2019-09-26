<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelayanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('user_model');
        $this->load->model('notif_model', 'nm');
        $this->load->model('pelanggan_model', 'pm');
        $this->load->model('surat_model', 'sm');
    }

    public function getJumlah()
    {
        $jumlah = $this->nm->cek_notif();
        $pecah = $this->nm->lihat_notif();
        if ($jumlah > 0) {
            $kosong = "<div class='drop down-header p-3'>Notifikasi</div>
                    <div class='dropdown-list-content dropdown-list-icons'>";
            foreach ($pecah as $key) {
                $kosong .= "<a href=" . base_url('keluhan/tampil_perId/' . $key->id_keluhan) . " class='dropdown-item'>
                                <div class='dropdown-item-avatar'>
                                    <img class='rounded-circle' src=" . base_url('assets/img/pelanggan/' . $key->foto) . " alt=''>
                                </div>
                                <div class='dropdown-item-desc'>
                                    <b>" . $key->nama_pelanggan . "</b> mengirimkan keluhan
                                    <div class='time'>" . waktu_lalu($key->tgl_keluhan) . "</div>
                                </div>
                            </a>";
            }
            $kosong .= "</div>
                        <div class='dropdown-footer text-center'>
                            <a href=" . base_url('keluhan') . ">Lihat Selengkapnya <i class='fas fa-chevron-right'></i></a>
                        </div>";
        } else {
            $kosong = "<div class='drop down-header p-3'>Tidak ada Notifikasi</div>";
        }

        $data['jumlah'] = $jumlah;
        $data['kosong'] = $kosong;

        // 'kosong' => $kosong
        echo json_encode($data);
    }

    public function index()
    {
        $data['jumlah'] = $this->pm->jumlah_pelanggan();
        $data['jumlah_spk'] = $this->sm->jumlah_spk();
        $this->template->load('template', 'pelayanan/index', $data);
    }

    public function user()
    {
        $data['tampilSemua'] = $this->user_model->get()->result_array();
        $this->template->load('template', 'pelayanan/user/index', $data);
    }

    public function addUser()
    {
        $post = $this->input->post(null, true);
        $this->user_model->addUser($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Ditambahkan');
            redirect('pelayanan/user');
        }
    }

    public function editUser()
    {
        $post = $this->input->post(null, true);
        $this->user_model->editUser($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Diubah');
            redirect('pelayanan/user');
        }
    }

    public function deleteUser()
    {
        $id = $this->uri->segment(3);
        $this->db->where('id_user', $id);
        $this->db->delete('tb_user');
        redirect('pelayanan/user');
    }
}
