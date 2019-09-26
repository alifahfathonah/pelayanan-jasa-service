<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_model', 'lm');
        $this->load->model('surat_model', 'sm');
        $this->load->model('data_model', 'dm');
    }

    public function index()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Service Tanggal ' . tgl_indo($tgl);
                $url_cetak = 'laporan/cetak?filter=1&tanggal=' . $tgl;
                $transaksi = $this->lm->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di lm
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Service Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $url_cetak = 'laporan/cetak?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $transaksi = $this->lm->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di lm
            } else if ($filter == '3') { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Service Tahun ' . $tahun;
                $url_cetak = 'laporan/cetak?filter=3&tahun=' . $tahun;
                $transaksi = $this->lm->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di lm
            } else if ($filter == '4') { // Jika filter nya 3 (per tahun)
                $merk = $_GET['merk'];

                $ket = 'Data Service Merk ' . $merk;
                $url_cetak = 'laporan/cetak?filter=4&merk=' . $merk;
                $transaksi = $this->lm->view_by_merk($merk); // Panggil fungsi view_by_year yang ada di lm
            } else if ($filter == '5') { // Jika filter nya 3 (per tahun)
                $teknisi = $_GET['teknisi'];

                $ket = 'Data Service Dari Teknisi : ' . $teknisi;
                $url_cetak = 'laporan/cetak?filter=5&teknisi=' . $teknisi;
                $transaksi = $this->lm->view_by_teknisi($teknisi); // Panggil fungsi view_by_year yang ada di lm
            } else { // Jika filter nya 3 (per tahun)
                $kota = $_GET['kota'];

                $ket = 'Data Service Dari Kota : ' . ucfirst($kota);
                $url_cetak = 'laporan/cetak?filter=6&kota=' . $kota;
                $transaksi = $this->lm->view_by_kota($kota); // Panggil fungsi view_by_year yang ada di lm
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Service';
            $url_cetak = 'laporan/cetak';
            $transaksi = $this->lm->view_all(); // Panggil fungsi view_all yang ada di lm
        }

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url($url_cetak);
        $data['transaksi'] = $transaksi;
        $data['option_tahun'] = $this->lm->option_tahun();
        $data['teknisi'] = $this->dm->get('tb_user', 'id_user', 'teknisi', 'level')->result_array();
        $this->template->load('template', 'pimpinan/laporan/index', $data);
    }

    public function cetak()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Service Tanggal ' . date('d-m-y', strtotime($tgl));
                $transaksi = $this->lm->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di lm
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Service Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $transaksi = $this->lm->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di lm
            } else if ($filter == '3') { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Service Tahun ' . $tahun;
                $transaksi = $this->lm->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di lm
            } else if ($filter == '4') { // Jika filter nya 3 (per tahun)
                $merk = $_GET['merk'];

                $ket = 'Data Service Merk ' . $merk;
                $transaksi = $this->lm->view_by_merk($merk); // Panggil fungsi view_by_year yang ada di lm
            } else if ($filter == '5') { // Jika filter nya 3 (per tahun)
                $teknisi = $_GET['teknisi'];

                $ket = 'Data Service Dari Teknisi : ' . $teknisi;
                $transaksi = $this->lm->view_by_teknisi($teknisi); // Panggil fungsi view_by_year yang ada di lm
            } else { // Jika filter nya 3 (per tahun)
                $kota = $_GET['kota'];

                $ket = 'Data Service Dari Kota : ' . ucfirst($kota);
                $transaksi = $this->lm->view_by_kota($kota); // Panggil fungsi view_by_year yang ada di lm
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Service';
            $transaksi = $this->lm->view_all(); // Panggil fungsi view_all yang ada di lm
        }

        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;
        $this->load->view('pimpinan/laporan/cetak', $data);
    }

    public function detail($id)
    {
        $data['sparepart'] = $this->sm->joinSparepart($id)->result_array();
        $data['surat'] = $this->sm->joinDetail($id)->row_array();
        $this->template->load('template', 'pimpinan/laporan/detail', $data);
    }

    public function cetakDetail($id)
    {
        $data['sparepart'] = $this->sm->joinSparepart($id)->result_array();
        $data['surat'] = $this->sm->joinDetail($id)->row_array();
        $this->load->view('pimpinan/laporan/cetak_detail', $data);
    }
}
