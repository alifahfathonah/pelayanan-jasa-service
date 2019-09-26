<?php

class laporan_model extends CI_Model
{

    public function view_by_date($date)
    {
        $query = "SELECT a.id_surat, a.status_service, a.status_bayar, a.total_bayar, a.tgl, a.ttd, b.keluhan, b.seri_barang, c.id_nomor, c.nomor_perbaikan, d.nama, f.nama_pelanggan, f.no_telp, f.alamat, f.pelanggan_lat, f.pelanggan_long, f.foto, g.nama_barang, g.type, h.nama_authorized FROM tb_suratperintahkerja a INNER JOIN tb_keluhan b ON a.id_keluhan=b.id_keluhan INNER JOIN tb_nomorperbaikan c ON a.id_nomor=c.id_nomor INNER JOIN tb_user d ON a.id_user=d.id_user INNER JOIN tb_pendaftaran f ON b.id_pelanggan=f.id_pelanggan INNER JOIN tb_barangelektronik g ON b.id_barangelektronik=g.id_barangelektronik INNER JOIN tb_authorized h ON g.id_authorized=h.id_authorized WHERE DATE(tgl)='$date' AND ttd='sudah2' ORDER BY a.id_surat ASC";

        return $this->db->query($query)->result();
    }

    public function view_by_month($month, $year)
    {
        $query = "SELECT a.id_surat, a.status_service, a.status_bayar, a.total_bayar, a.tgl, a.ttd, b.keluhan, b.seri_barang, c.id_nomor, c.nomor_perbaikan, d.nama, f.nama_pelanggan, f.no_telp, f.alamat, f.pelanggan_lat, f.pelanggan_long, f.foto, g.nama_barang, g.type, h.nama_authorized FROM tb_suratperintahkerja a INNER JOIN tb_keluhan b ON a.id_keluhan=b.id_keluhan INNER JOIN tb_nomorperbaikan c ON a.id_nomor=c.id_nomor INNER JOIN tb_user d ON a.id_user=d.id_user INNER JOIN tb_pendaftaran f ON b.id_pelanggan=f.id_pelanggan INNER JOIN tb_barangelektronik g ON b.id_barangelektronik=g.id_barangelektronik INNER JOIN tb_authorized h ON g.id_authorized=h.id_authorized WHERE MONTH(tgl)='$month' AND YEAR(tgl)='$year' AND ttd='sudah2' ORDER BY a.id_surat ASC";

        return $this->db->query($query)->result();
    }

    public function view_by_year($year)
    {
        $query = "SELECT a.id_surat, a.status_service, a.status_bayar, a.total_bayar, a.tgl, a.ttd, b.keluhan, b.seri_barang, c.id_nomor, c.nomor_perbaikan, d.nama, f.nama_pelanggan, f.no_telp, f.alamat, f.pelanggan_lat, f.pelanggan_long, f.foto, g.nama_barang, g.type, h.nama_authorized FROM tb_suratperintahkerja a INNER JOIN tb_keluhan b ON a.id_keluhan=b.id_keluhan INNER JOIN tb_nomorperbaikan c ON a.id_nomor=c.id_nomor INNER JOIN tb_user d ON a.id_user=d.id_user INNER JOIN tb_pendaftaran f ON b.id_pelanggan=f.id_pelanggan INNER JOIN tb_barangelektronik g ON b.id_barangelektronik=g.id_barangelektronik INNER JOIN tb_authorized h ON g.id_authorized=h.id_authorized WHERE YEAR(tgl)='$year' AND ttd='sudah2' ORDER BY a.id_surat ASC";

        return $this->db->query($query)->result();
    }

    public function view_by_merk($merk)
    {
        $query = "SELECT a.id_surat, a.status_service, a.status_bayar, a.total_bayar, a.tgl, a.ttd, b.keluhan, b.seri_barang, c.id_nomor, c.nomor_perbaikan, d.nama, f.nama_pelanggan, f.no_telp, f.alamat, f.pelanggan_lat, f.pelanggan_long, f.foto, g.nama_barang, g.type, h.nama_authorized FROM tb_suratperintahkerja a INNER JOIN tb_keluhan b ON a.id_keluhan=b.id_keluhan INNER JOIN tb_nomorperbaikan c ON a.id_nomor=c.id_nomor INNER JOIN tb_user d ON a.id_user=d.id_user INNER JOIN tb_pendaftaran f ON b.id_pelanggan=f.id_pelanggan INNER JOIN tb_barangelektronik g ON b.id_barangelektronik=g.id_barangelektronik INNER JOIN tb_authorized h ON g.id_authorized=h.id_authorized WHERE nama_authorized='$merk' AND ttd='sudah2' ORDER BY a.id_surat ASC";

        return $this->db->query($query)->result();
    }

    public function view_by_teknisi($teknisi)
    {
        $query = "SELECT a.id_surat, a.status_service, a.status_bayar, a.total_bayar, a.tgl, a.ttd, b.keluhan, b.seri_barang, c.id_nomor, c.nomor_perbaikan, d.nama, f.nama_pelanggan, f.no_telp, f.alamat, f.pelanggan_lat, f.pelanggan_long, f.foto, g.nama_barang, g.type, h.nama_authorized FROM tb_suratperintahkerja a INNER JOIN tb_keluhan b ON a.id_keluhan=b.id_keluhan INNER JOIN tb_nomorperbaikan c ON a.id_nomor=c.id_nomor INNER JOIN tb_user d ON a.id_user=d.id_user INNER JOIN tb_pendaftaran f ON b.id_pelanggan=f.id_pelanggan INNER JOIN tb_barangelektronik g ON b.id_barangelektronik=g.id_barangelektronik INNER JOIN tb_authorized h ON g.id_authorized=h.id_authorized WHERE nama='$teknisi' AND ttd='sudah2' ORDER BY a.id_surat ASC";

        return $this->db->query($query)->result();
    }

    public function view_by_kota($kota)
    {
        $query = "SELECT a.id_surat, a.status_service, a.status_bayar, a.total_bayar, a.tgl, a.ttd, b.keluhan, b.seri_barang, c.id_nomor, c.nomor_perbaikan, d.nama, f.nama_pelanggan, f.no_telp, f.alamat, f.pelanggan_lat, f.pelanggan_long, f.foto, g.nama_barang, g.type, h.nama_authorized FROM tb_suratperintahkerja a INNER JOIN tb_keluhan b ON a.id_keluhan=b.id_keluhan INNER JOIN tb_nomorperbaikan c ON a.id_nomor=c.id_nomor INNER JOIN tb_user d ON a.id_user=d.id_user INNER JOIN tb_pendaftaran f ON b.id_pelanggan=f.id_pelanggan INNER JOIN tb_barangelektronik g ON b.id_barangelektronik=g.id_barangelektronik INNER JOIN tb_authorized h ON g.id_authorized=h.id_authorized WHERE alamat LIKE '%$kota%' AND ttd='sudah2' ORDER BY a.id_surat ASC";

        return $this->db->query($query)->result();
    }

    public function view_all()
    {
        $query = "SELECT a.id_surat, a.status_service, a.status_bayar, a.total_bayar, a.tgl, a.ttd, b.keluhan, b.seri_barang, c.id_nomor, c.nomor_perbaikan, d.nama, f.nama_pelanggan, f.no_telp, f.alamat, f.pelanggan_lat, f.pelanggan_long, f.foto, g.nama_barang, g.type, h.nama_authorized FROM tb_suratperintahkerja a INNER JOIN tb_keluhan b ON a.id_keluhan=b.id_keluhan INNER JOIN tb_nomorperbaikan c ON a.id_nomor=c.id_nomor INNER JOIN tb_user d ON a.id_user=d.id_user INNER JOIN tb_pendaftaran f ON b.id_pelanggan=f.id_pelanggan INNER JOIN tb_barangelektronik g ON b.id_barangelektronik=g.id_barangelektronik INNER JOIN tb_authorized h ON g.id_authorized=h.id_authorized WHERE ttd='sudah2' ORDER BY a.id_surat ASC";

        return $this->db->query($query)->result(); // Tampilkan semua data tb_suratperintahkerja
    }

    public function option_tahun()
    {
        $query = "SELECT YEAR(tgl) AS tahun FROM tb_suratperintahkerja a INNER JOIN tb_keluhan b ON a.id_keluhan=b.id_keluhan INNER JOIN tb_nomorperbaikan c ON a.id_nomor=c.id_nomor INNER JOIN tb_user d ON a.id_user=d.id_user INNER JOIN tb_pendaftaran f ON b.id_pelanggan=f.id_pelanggan INNER JOIN tb_barangelektronik g ON b.id_barangelektronik=g.id_barangelektronik INNER JOIN tb_authorized h ON g.id_authorized=h.id_authorized WHERE ttd='sudah2' GROUP BY YEAR(tgl) ORDER BY YEAR(tgl) ASC";

        return $this->db->query($query)->result();
    }
}
