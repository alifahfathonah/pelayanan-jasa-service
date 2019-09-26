<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('notif_model', 'nm');
        $this->load->model('surat_model', 'sm');
    }

    public function index()
    {
        $id = $this->fungsi->user_login()->id_user;
        $data['jumlah'] = $this->sm->totalOrder($id);
        $this->template->load('template', 'teknisi/index', $data);
    }

    public function getJumlah()
    {
        $user = $this->fungsi->user_login()->id_user;
        $jumlah = $this->nm->cek_notif_teknisi($user);
        $pecah = $this->nm->lihat_notif_teknisi($user);
        if ($jumlah > 0) {
            $kosong = "<div class='drop down-header p-3'>Notifikasi</div>
                    <div class='dropdown-list-content dropdown-list-icons'>";
            foreach ($pecah as $key) {
                $kosong .= "<a href=" . base_url('_teknisi/surat/tampil_notif/' . $key->id_surat) . " class='dropdown-item'>
                                <div class='dropdown-item-avatar'>
                                    <img class='rounded-circle' src=" . base_url('assets/img/pelanggan/' . $key->foto) . " alt=''>
                                </div>
                                <div class='dropdown-item-desc'>
                                    <b>" . $key->nama_pelanggan . "</b> - Surat Perintah Kerja <b> Baru </b>
                                    <div class='time'>" . waktu_lalu($key->tgl) . "</div>
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
}
