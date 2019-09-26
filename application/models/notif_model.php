<?php

class notif_model extends CI_Model
{
    public function cek_notif()
    {
        $query = "SELECT id_keluhan FROM tb_keluhan WHERE status_notif='belum'";
        $hasil = $this->db->query($query);
        return $hasil->num_rows();
    }

    public function lihat_notif()
    {
        $query = "SELECT a.id_keluhan, a.keluhan, a.tgl_keluhan, a.status, a.konfirmasi, b.foto, b.nama_pelanggan, b.alamat, b.no_telp, c.nama_barang, c.type, d.nama_authorized, d.email FROM tb_keluhan a INNER JOIN tb_pendaftaran b ON a.id_pelanggan=b.id_pelanggan INNER JOIN tb_barangelektronik c ON a.id_barangelektronik=c.id_barangelektronik INNER JOIN tb_authorized d ON c.id_authorized=d.id_authorized WHERE status_notif='belum'";
        $hasil = $this->db->query($query)->result();
        return $hasil;
    }

    public function cek_notif_teknisi($user)
    {
        $hariini = date('Y-m-d');
        $query = "SELECT a.id_surat FROM tb_suratperintahkerja a INNER JOIN tb_info b ON a.id_surat=b.id_surat WHERE a.status_notif='belum' AND id_user='$user' AND info='$hariini'";
        $hasil = $this->db->query($query);
        return $hasil->num_rows();
    }

    public function lihat_notif_teknisi($user)
    {
        $hariini = date('Y-m-d');
        $query = "SELECT a.id_keluhan, a.keluhan, a.tgl_keluhan, a.status, a.konfirmasi, b.foto, b.nama_pelanggan, b.alamat, b.no_telp, c.nama_barang, c.type, d.nama_authorized, d.email, k.id_surat, k.tgl FROM tb_keluhan a INNER JOIN tb_suratperintahkerja k ON a.id_keluhan=k.id_keluhan INNER JOIN tb_pendaftaran b ON a.id_pelanggan=b.id_pelanggan INNER JOIN tb_barangelektronik c ON a.id_barangelektronik=c.id_barangelektronik INNER JOIN tb_authorized d ON c.id_authorized=d.id_authorized INNER JOIN tb_info l ON k.id_surat=l.id_surat WHERE k.status_notif='belum' AND id_user='$user' AND info='$hariini'";
        $hasil = $this->db->query($query)->result();
        return $hasil;
    }

    public function cek_notif_pimpinan()
    {
        $query = "SELECT id_surat FROM tb_suratperintahkerja WHERE status_notif='dibaca' AND status_bayar='sudah' AND ttd='sudah'";
        $hasil = $this->db->query($query);
        return $hasil->num_rows();
    }

    public function lihat_notif_pimpinan()
    {
        $query = "SELECT a.id_keluhan, a.keluhan, a.tgl_keluhan, a.status, a.konfirmasi, b.foto, b.nama_pelanggan, b.alamat, b.no_telp, c.nama_barang, c.type, d.nama_authorized, d.email, k.id_surat, k.tgl FROM tb_keluhan a INNER JOIN tb_suratperintahkerja k ON a.id_keluhan=k.id_keluhan INNER JOIN tb_pendaftaran b ON a.id_pelanggan=b.id_pelanggan INNER JOIN tb_barangelektronik c ON a.id_barangelektronik=c.id_barangelektronik INNER JOIN tb_authorized d ON c.id_authorized=d.id_authorized WHERE k.status_notif='dibaca' AND status_bayar='sudah' AND ttd='sudah'";
        $hasil = $this->db->query($query)->result();
        return $hasil;
    }

    public function cek_notif_pelanggan($user)
    {
        $query = "SELECT b.id_surat, a.id_info, a.info, a.keterangan, d.id_pelanggan FROM tb_info a INNER JOIN tb_suratperintahkerja b ON a.id_surat=b.id_surat INNER JOIN tb_keluhan c ON b.id_keluhan=c.id_keluhan INNER JOIN tb_pendaftaran d ON c.id_pelanggan=d.id_pelanggan WHERE a.status_notif='belum' AND d.id_pelanggan='$user'";
        $hasil = $this->db->query($query);
        return $hasil->num_rows();
    }

    public function lihat_notif_pelanggan($user)
    {
        $query = "SELECT b.id_surat, c.id_keluhan, a.info, a.id_info, a.keterangan, d.id_pelanggan FROM tb_info a INNER JOIN tb_suratperintahkerja b ON a.id_surat=b.id_surat INNER JOIN tb_keluhan c ON b.id_keluhan=c.id_keluhan INNER JOIN tb_pendaftaran d ON c.id_pelanggan=d.id_pelanggan WHERE a.status_notif='belum' AND d.id_pelanggan='$user'";
        $hasil = $this->db->query($query)->result();
        return $hasil;
    }
}
