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
        $data['jumlah_spk'] = $this->sm->jumlah_spk('sudah', 'ttd');
        $this->template->load('template', 'pimpinan/index', $data);
    }

    public function getJumlah()
    {
        $jumlah = $this->nm->cek_notif_pimpinan();
        $pecah = $this->nm->lihat_notif_pimpinan();
        if ($jumlah > 0) {
            $kosong = "<div class='drop down-header p-3'>Notifikasi</div>
                    <div class='dropdown-list-content dropdown-list-icons'>";
            foreach ($pecah as $key) {
                $kosong .= "<a href=" . base_url('_pimpinan/surat/tampil_notif/' . $key->id_surat) . " class='dropdown-item'>
                                <div class='dropdown-item-icon bg-primary text-white'>
                                    <i class='fas fa-envelope'></i>
                                </div>
                                <div class='dropdown-item-desc'>
                                    <b>Surat Perintah Kerja " . $key->id_surat . " <b> belum tertanda tangani </b>
                                    <div class='time'>" . waktu_lalu($key->tgl) . "</div>
                                </div>
                            </a>";
            }
            $kosong .= "</div>
                        <div class='dropdown-footer text-center'>
                            <a href=" . base_url('_pimpinan/surat') . ">Lihat Selengkapnya <i class='fas fa-chevron-right'></i></a>
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
