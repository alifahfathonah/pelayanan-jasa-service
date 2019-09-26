<?php

class pembayaran_model extends CI_Model
{
    public function join($user)
    {
        $query = "SELECT a.id_surat, a.status_service, a.status_bayar, a.total_bayar, a.id_user, a.tgl, b.keluhan, b.seri_barang, c.nomor_perbaikan, d.nama, f.nama_pelanggan, f.no_telp, f.alamat, f.pelanggan_lat, f.pelanggan_long, f.foto, g.nama_barang, g.type, h.nama_authorized FROM tb_suratperintahkerja a INNER JOIN tb_keluhan b ON a.id_keluhan=b.id_keluhan INNER JOIN tb_nomorperbaikan c ON a.id_nomor=c.id_nomor INNER JOIN tb_user d ON a.id_user=d.id_user INNER JOIN tb_pendaftaran f ON b.id_pelanggan=f.id_pelanggan INNER JOIN tb_barangelektronik g ON b.id_barangelektronik=g.id_barangelektronik INNER JOIN tb_authorized h ON g.id_authorized=h.id_authorized WHERE a.status_service='selesai' AND a.status_bayar='belum' AND a.id_user='$user' ORDER BY a.id_surat ASC";

        return $this->db->query($query);
    }

    public function joinWhere()
    {
        $id = $this->uri->segment(4);
        $query = "SELECT a.id_surat, a.status_service, a.status_bayar, a.total_bayar, a.id_user, a.tgl, b.id_keluhan, b.garansi, b.keluhan, b.seri_barang, c.nomor_perbaikan, d.nama, f.nama_pelanggan, f.no_telp, f.alamat, f.pelanggan_lat, f.pelanggan_long, f.foto, f.pelanggan_lat, f.pelanggan_long, g.nama_barang, g.type, h.nama_authorized FROM tb_suratperintahkerja a INNER JOIN tb_keluhan b ON a.id_keluhan=b.id_keluhan INNER JOIN tb_nomorperbaikan c ON a.id_nomor=c.id_nomor INNER JOIN tb_user d ON a.id_user=d.id_user INNER JOIN tb_pendaftaran f ON b.id_pelanggan=f.id_pelanggan INNER JOIN tb_barangelektronik g ON b.id_barangelektronik=g.id_barangelektronik INNER JOIN tb_authorized h ON g.id_authorized=h.id_authorized WHERE a.id_surat='$id' ORDER BY a.id_surat ASC";

        return $this->db->query($query);
    }

    public function joinSudah($id)
    {
        $query = "SELECT a.id_surat, a.status_service, a.status_bayar, a.total_bayar, a.tgl, b.keluhan, b.seri_barang, c.nomor_perbaikan, d.nama, d.id_user, f.nama_pelanggan, f.no_telp, f.alamat, f.pelanggan_lat, f.pelanggan_long, f.foto, g.nama_barang, g.type, h.nama_authorized FROM tb_suratperintahkerja a INNER JOIN tb_keluhan b ON a.id_keluhan=b.id_keluhan INNER JOIN tb_nomorperbaikan c ON a.id_nomor=c.id_nomor INNER JOIN tb_user d ON a.id_user=d.id_user INNER JOIN tb_pendaftaran f ON b.id_pelanggan=f.id_pelanggan INNER JOIN tb_barangelektronik g ON b.id_barangelektronik=g.id_barangelektronik INNER JOIN tb_authorized h ON g.id_authorized=h.id_authorized WHERE a.status_service='selesai' AND a.status_bayar='sudah' AND d.id_user='$id' ORDER BY a.id_surat ASC";

        return $this->db->query($query);
    }

    public function bayar()
    {
        $this->db->set('status_bayar', 'sudah');
        $this->db->where('id_surat', $this->input->get('id'));
        $this->db->update('tb_suratperintahkerja');
    }

    public function simpanSparepart($post)
    {
        $param = [
            'id_detail' => null,
            'id_sparepart' => $post['id_spar'],
            'id_surat' => $post['id_surat'],
            'jumlah' => $post['jml'],
        ];

        $this->db->insert('tb_suratdetail', $param);
    }

    public function hapusSpar($post)
    {
        $this->db->where('id_detail', $post['id_detail']);
        $this->db->delete('tb_suratdetail');
    }

    public function totalSpar($id)
    {
        $query = "SELECT SUM(harga * jumlah) as subtotal FROM tb_suratdetail a INNER JOIN tb_sparepart b ON a.id_sparepart=b.id_sparepart WHERE id_surat='$id'";
        return $this->db->query($query);
    }

    public function simpan()
    {
        $param = [
            'status_bayar' => 'sudah',
            'total_bayar' => $this->input->post('total_bayar'),
            'biaya_transpot' => $this->input->post('transpot'),
            'hasil' => $this->input->post('hasil'),
            'biaya_jasa' => $this->input->post('biaya'),
            'kode_kerusakan' => $this->input->post('kode'),
            'tindakan' => $this->input->post('tindakan'),
        ];
        $this->db->where('id_surat', $this->input->post('id'));
        $this->db->update('tb_suratperintahkerja', $param);
    }

    public function statusGaransi()
    {
        $this->db->set('garansi', $this->input->post('garansi'));
        $this->db->where('id_keluhan', $this->input->post('id_keluhan'));
        $this->db->update('tb_keluhan');
    }

    public function ubahttd()
    {
        $this->db->set('ttd', 'sudah');
        $this->db->where('id_surat', $this->input->post('id'));
        $this->db->update('tb_suratperintahkerja');
    }
}
