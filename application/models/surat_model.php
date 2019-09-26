<?php

class surat_model extends CI_Model
{
    public function join()
    {
        $query = "SELECT a.id_surat, a.status_service, a.status_bayar, a.total_bayar, a.tgl, a.ttd, b.keluhan, b.seri_barang, c.id_nomor, c.nomor_perbaikan, d.nama, f.nama_pelanggan, f.no_telp, f.alamat, f.pelanggan_lat, f.pelanggan_long, f.foto, g.nama_barang, g.type, h.nama_authorized FROM tb_suratperintahkerja a INNER JOIN tb_keluhan b ON a.id_keluhan=b.id_keluhan INNER JOIN tb_nomorperbaikan c ON a.id_nomor=c.id_nomor INNER JOIN tb_user d ON a.id_user=d.id_user INNER JOIN tb_pendaftaran f ON b.id_pelanggan=f.id_pelanggan INNER JOIN tb_barangelektronik g ON b.id_barangelektronik=g.id_barangelektronik INNER JOIN tb_authorized h ON g.id_authorized=h.id_authorized ORDER BY a.id_surat DESC";

        return $this->db->query($query);
    }

    public function joinbelumttd()
    {
        $query = "SELECT a.id_keluhan, a.keluhan, a.tgl_keluhan, a.status, a.konfirmasi, b.foto, b.nama_pelanggan, b.alamat, b.no_telp, c.nama_barang, c.type, d.nama_authorized, d.email, k.id_surat, k.tgl, k.ttd, p.nama FROM tb_keluhan a INNER JOIN tb_suratperintahkerja k ON a.id_keluhan=k.id_keluhan INNER JOIN tb_pendaftaran b ON a.id_pelanggan=b.id_pelanggan INNER JOIN tb_barangelektronik c ON a.id_barangelektronik=c.id_barangelektronik INNER JOIN tb_authorized d ON c.id_authorized=d.id_authorized INNER JOIN tb_user p ON k.id_user=p.id_user WHERE status_bayar='sudah' AND k.ttd='sudah'";
        $hasil = $this->db->query($query);
        return $hasil;
    }

    public function joinWhere($id, $param)
    {
        $query = "SELECT a.id_surat, a.status_service, a.status_bayar, a.hasil, a.total_bayar, a.tgl, c.nomor_perbaikan, b.id_keluhan, b.tgl_keluhan, b.keluhan, b.status, b.konfirmasi, d.nama, f.nama_pelanggan, f.no_telp, f.alamat, f.pelanggan_lat, f.pelanggan_long, g.nama_barang, g.type, h.nama_authorized FROM tb_suratperintahkerja a INNER JOIN tb_keluhan b ON a.id_keluhan=b.id_keluhan INNER JOIN tb_nomorperbaikan c ON a.id_nomor=c.id_nomor INNER JOIN tb_user d ON a.id_user=d.id_user INNER JOIN tb_pendaftaran f ON b.id_pelanggan=f.id_pelanggan INNER JOIN tb_barangelektronik g ON b.id_barangelektronik=g.id_barangelektronik INNER JOIN tb_authorized h ON g.id_authorized=h.id_authorized WHERE f.id_pelanggan = '$id' AND a.status_service = '$param' ORDER BY a.id_surat DESC";

        return $this->db->query($query);
    }

    public function joinDetail($id)
    {
        $query = "SELECT a.id_surat, a.status_service,a.kode_kerusakan, a.tindakan, a.status_bayar, a.ttd, a.total_bayar, a.tgl, a.hasil, a.biaya_jasa, a.biaya_transpot, c.nomor_perbaikan, b.id_keluhan, b.pemohon, b.alamat_pemohon, b.garansi, b.no_pemohon, b.tgl_keluhan, b.keluhan, b.status, b.konfirmasi, b.seri_barang, d.id_user, d.nama, f.nama_pelanggan, f.foto, f.no_telp, f.alamat, f.pelanggan_lat, f.pelanggan_long, g.nama_barang, g.type, h.nama_authorized, i.info, i.keterangan, i.updated_info FROM tb_suratperintahkerja a INNER JOIN tb_keluhan b ON a.id_keluhan=b.id_keluhan INNER JOIN tb_nomorperbaikan c ON a.id_nomor=c.id_nomor INNER JOIN tb_user d ON a.id_user=d.id_user INNER JOIN tb_pendaftaran f ON b.id_pelanggan=f.id_pelanggan INNER JOIN tb_barangelektronik g ON b.id_barangelektronik=g.id_barangelektronik INNER JOIN tb_authorized h ON g.id_authorized=h.id_authorized INNER JOIN tb_info i ON i.id_surat=a.id_surat WHERE a.id_surat='$id'  ORDER BY a.id_surat DESC";

        return $this->db->query($query);
    }

    public function joinSparepart($id)
    {
        $query = "SELECT a.id_detail, a.id_surat, a.id_sparepart, c.nama_sparepart, c.stok, c.harga FROM tb_suratdetail a INNER JOIN tb_suratperintahkerja b ON a.id_surat=b.id_surat INNER JOIN tb_sparepart c ON a.id_sparepart=c.id_sparepart WHERE a.id_surat='$id'";
        return $this->db->query($query);
    }


    public function prosesBuat($post)
    {
        $param = [
            'id_surat' => $post['id_surat'],
            'id_keluhan' => $post['id_keluhan'],
            'id_nomor' => $post['nomor'] == '' ? '8' : $post['nomor'],
            'id_user' => $post['user'],
            'status_notif' => 'belum',
            'status_service' => 'belum',
            'status_bayar' => 'belum',
            'total_bayar' => null,
            'tgl' => date("Y-m-d H:i:s")
        ];

        $this->db->insert('tb_suratperintahkerja', $param);
    }

    public function ubahStatusNomor($post)
    {
        $this->db->set('status', 'dipake');
        $this->db->where('id_nomor', $post['nomor']);
        $this->db->update('tb_nomorperbaikan');
    }

    public function ubah()
    {
        $this->db->set('status_service',  'otw');
        $this->db->set('tgl',  date("Y-m-d H:i:s"));
        $this->db->where('id_surat', $this->input->get('id'));
        $this->db->update('tb_suratperintahkerja');
    }

    public function ubahPerjalanan()
    {
        $this->db->set('status_service',  'otw');
        $this->db->set('tgl',  date("Y-m-d H:i:s"));
        $this->db->where('id_surat', $this->input->post('id'));
        $this->db->update('tb_suratperintahkerja');
    }

    public function ubahSetengah()
    {
        $this->db->set('status_service',  'setengah');
        $this->db->set('ket_status',  $this->input->post('ket'));
        $this->db->set('tgl',  date("Y-m-d H:i:s"));
        $this->db->where('id_surat', $this->input->post('id'));
        $this->db->update('tb_suratperintahkerja');
    }

    public function ubahSelesai()
    {
        $this->db->set('status_service',  'selesai');
        $this->db->set('tgl',  date("Y-m-d H:i:s"));
        $this->db->where('id_surat', $this->input->get('id'));
        $this->db->update('tb_suratperintahkerja');
    }


    public function ubahNotif($id)
    {
        $this->db->set('status_notif', 'dibaca');
        $this->db->where('id_surat', $id);
        $this->db->update('tb_suratperintahkerja');
    }

    public function ttd()
    {
        $this->db->set('ttd', 'sudah2');
        $this->db->where('id_surat', $this->input->post('id'));
        $this->db->update('tb_suratperintahkerja');
    }

    public function ubahNotif_ttd($id)
    {
        $this->db->set('status_notif', 'dibaca2');
        $this->db->where('id_surat', $id);
        $this->db->update('tb_suratperintahkerja');
    }

    public function totalOrder($user)
    {
        $query = "SELECT a.id_surat FROM tb_suratperintahkerja a INNER JOIN tb_user b ON a.id_user=b.id_user WHERE a.id_user='$user'";
        return $this->db->query($query)->num_rows();
    }

    public function jumlah_spk($id = null, $param = null)
    {
        $query = "SELECT id_surat FROM tb_suratperintahkerja";
        if ($id != null) {
            $query .= " WHERE $param = '$id'";
        }
        return $this->db->query($query)->num_rows();
    }

    public function ubah_info()
    {
        $this->db->set('updated_info', $this->input->post('info'));
        $this->db->set('status_notif', 'belum');
        $this->db->where('id_surat', $this->input->post('id'));
        return $this->db->update('tb_info');
    }
}
