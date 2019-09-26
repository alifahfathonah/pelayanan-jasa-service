<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('notif_model', 'nm');
    }

    public function index()
    {
        $this->template->load('template_fe', 'pelanggan/index');
    }

    public function getJumlah()
    {
        $id = $this->fungsi->pelanggan_login()->id_pelanggan;
        $jumlah = $this->nm->cek_notif_pelanggan($id);
        $pecah = $this->nm->lihat_notif_pelanggan($id);
        if ($jumlah > 0) {
            $kosong = "<div class='drop down-header p-3'>Notifikasi</div>
                    <div class='dropdown-list-content dropdown-list-icons'>";
            foreach ($pecah as $key) {
                $kosong .= "<a href=" . base_url('_pelanggan/keluhan/tampilan_notif/' . $key->id_info) . " class='dropdown-item'>
                                <div class='dropdown-item-icon bg-primary text-white'>
                                    <i class='fas fa-info'></i>
                                </div>
                                <div class='dropdown-item-desc'>
                                    <b>Info Jadwal Service <br> No. Keluhan " . $key->id_keluhan . "
                                    <div class='time'>" . waktu_lalu($key->info) . "</div>
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
