<?php

class Fungsi
{

    function user_login()
    {
        $ci = get_instance();
        $ci->load->model('user_model');
        $sesi = $ci->session->userdata('id_user');
        $hasil = $ci->user_model->get($sesi)->row();
        return $hasil;
    }

    function pelanggan_login()
    {
        $ci = get_instance();
        $ci->load->model('pelanggan_model');
        $sesi = $ci->session->userdata('id_pelanggan');
        $hasil = $ci->pelanggan_model->get('tb_pendaftaran', 'id_pelanggan', $sesi, 'id_pelanggan')->row();
        return $hasil;
    }

    function kode_otomatis($param, $param2, $param3)
    {
        $ci = get_instance();
        $query = "SELECT max($param) as kode FROM $param2";
        $ambil = $ci->db->query($query)->row_array();
        $kode = substr($ambil['kode'], 3, 3);

        $tambah = $kode + 1;
        // return $tambah;
        if ($tambah < 10) {
            return $id = "$param3" . "00" . $tambah;
        } else {
            return $id = "$param3" . "0" . $tambah;
        }
    }

    function kode_spk()
    {
        $harini = date('dmYHis');
        $kode = "SPK-" . $harini;
        return $kode;
    }

    function kode_keluhan()
    {
        $harini = date('dmYHis');
        $kode = "KEL-" . $harini;
        return $kode;
    }
}
