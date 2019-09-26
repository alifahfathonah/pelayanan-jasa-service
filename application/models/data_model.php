<?php

class data_model extends CI_Model
{
    public function get($tb, $order, $id = null, $param = null, $tb2 = null, $param2 = null)
    {
        $this->db->select('*');
        $this->db->from($tb);
        if ($tb2 != null) {
            $this->db->join($tb2, $param2 = $param2);
        }
        if ($id != null) {
            $this->db->where($param, $id);
        }
        $this->db->order_by($order, 'DESC');
        $query = $this->db->get();
        return $query;
    }

    // Fungsi untuk melakukan simpan data ke tabel pegawai
    public function addAth($post)
    {
        $data = array(
            "id_authorized" => $post['id'],
            "nama_authorized" => $post['nama'],
            "email" => $post['email'],
        );

        $this->db->insert('tb_authorized', $data); // Untuk mengeksekusi perintah insert data
    }

    public function editAth($post)
    {
        $data = array(
            "nama_authorized" => $post['nama'],
            "email" => $post['email'],
        );
        $this->db->where('id_authorized', $post['id']);
        $this->db->update('tb_authorized', $data); // Untuk mengeksekusi perintah insert data
    }

    public function addBarang($post)
    {
        $data = array(
            "id_barangelektronik" => $post['id'],
            "id_authorized" => $post['id_auth'],
            "nama_barang" => $post['nama'],
            "type" => $post['type'],
        );

        $this->db->insert('tb_barangelektronik', $data); // Untuk mengeksekusi perintah insert data
    }

    public function editBarang($post)
    {
        $data = array(
            "id_authorized" => $post['id_auth'],
            "nama_barang" => $post['nama'],
            "type" => $post['type'],
        );
        $this->db->where('id_barangelektronik', $post['id']);
        $this->db->update('tb_barangelektronik', $data); // Untuk mengeksekusi perintah insert data
    }

    public function addSparepart($post)
    {
        $data = array(
            "id_sparepart" => $post['id'],
            "id_authorized" => $post['id_auth'],
            "nama_sparepart" => $post['nama'],
            "harga" => $post['harga'],
            "stok" => $post['stok'],
        );

        $this->db->insert('tb_sparepart', $data); // Untuk mengeksekusi perintah insert data
    }

    public function editSparepart($post)
    {
        $data = array(
            "id_authorized" => $post['id_auth'],
            "nama_sparepart" => $post['nama'],
            "harga" => $post['harga'],
            "stok" => $post['stok'],
        );
        $this->db->where('id_sparepart', $post['id']);
        $this->db->update('tb_sparepart', $data); // Untuk mengeksekusi perintah insert data
    }

    public function pasokStok($post)
    {
        $data = array(
            "id_pasok" => $post['id'],
            "id_sparepart" => $post['id_spar'],
            "jumlah" => $post['jml'],
            "tgl_pasok" => date("Y-m-d H:i:s")
        );

        $this->db->insert('tb_pasok', $data); // Untuk mengeksekusi perintah insert data
    }

    public function ubahStok($post, $operasi)
    {
        $jumlah = $post['jml'];
        $this->db->set('stok', 'stok' . $operasi . $jumlah, false);
        $this->db->where('id_sparepart', $post['id_spar']);
        $this->db->update('tb_sparepart');
    }
}
