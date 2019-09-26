<?php

class keluhan_model extends CI_Model
{
    public function get($tb, $order, $id = null, $param = null, $tb2 = null, $param2 = null,  $tb3 = null, $param3 = null)
    {
        $this->db->select('*');
        $this->db->from($tb);
        if ($tb2 != null) {
            $this->db->join($tb2, $param2 = $param2);
        }
        if ($tb3 != null) {
            $this->db->join($tb3, $param3 = $param3);
        }
        if ($id != null) {
            $this->db->where($param, $id);
        }
        $this->db->order_by($order, 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function jumlahData($id)
    {
        $query = "SELECT id_detail FROM tb_suratdetail WHERE id_surat = '$id'";
        return $this->db->query($query)->num_rows();
    }

    public function joinSparPel($id, $keluhan)
    {
        $query = "SELECT a.id_detail, a.jumlah, a.id_surat, a.id_sparepart, c.nama_sparepart, c.stok, c.harga, d.id_keluhan, e.id_pelanggan FROM tb_suratdetail a INNER JOIN tb_suratperintahkerja b ON a.id_surat=b.id_surat INNER JOIN tb_sparepart c ON a.id_sparepart=c.id_sparepart INNER JOIN tb_keluhan d ON b.id_keluhan=d.id_keluhan INNER JOIN tb_pendaftaran e ON e.id_pelanggan=d.id_pelanggan WHERE e.id_pelanggan = '$id' AND d.id_keluhan= '$keluhan'";
        return $this->db->query($query);
    }

    public function join()
    {
        $query = "SELECT a.id_keluhan, a.keluhan, a.tgl_keluhan, a.status, a.konfirmasi, b.nama_pelanggan, c.nama_barang, c.type, d.nama_authorized FROM tb_keluhan a INNER JOIN tb_pendaftaran b ON a.id_pelanggan=b.id_pelanggan INNER JOIN tb_barangelektronik c ON a.id_barangelektronik=c.id_barangelektronik INNER JOIN tb_authorized d ON c.id_authorized=d.id_authorized ORDER BY a.tgl_keluhan DESC";
        return $this->db->query($query);
    }

    public function JoinById($id)
    {
        $query = "SELECT a.id_keluhan, a.keluhan, a.pemohon, a.alamat_pemohon, a.no_pemohon, a.seri_barang, a.tgl_keluhan, a.status, a.gambar_garansi, a.konfirmasi, a.seri_barang, b.foto, b.nama_pelanggan, b.alamat, b.no_telp, c.nama_barang, c.type, d.nama_authorized, d.email FROM tb_keluhan a INNER JOIN tb_pendaftaran b ON a.id_pelanggan=b.id_pelanggan INNER JOIN tb_barangelektronik c ON a.id_barangelektronik=c.id_barangelektronik INNER JOIN tb_authorized d ON c.id_authorized=d.id_authorized WHERE a.id_keluhan = '$id'";
        return $this->db->query($query);
    }

    public function JoinWhere($id)
    {
        $query = "SELECT a.id_keluhan, a.keluhan, a.tgl_keluhan, a.status, a.konfirmasi, a.ket_konfirmasi, b.id_pelanggan, b.nama_pelanggan, b.alamat, b.no_telp, c.nama_barang, c.type, d.nama_authorized, d.email, e.status_service, e.status_bayar FROM tb_keluhan a INNER JOIN tb_pendaftaran b ON a.id_pelanggan=b.id_pelanggan INNER JOIN tb_barangelektronik c ON a.id_barangelektronik=c.id_barangelektronik INNER JOIN tb_authorized d ON c.id_authorized=d.id_authorized INNER JOIN tb_suratperintahkerja e ON a.id_keluhan=e.id_keluhan WHERE b.id_pelanggan = '$id'";
        return $this->db->query($query);
    }

    public function joinKonfirmasi($id)
    {
        $query = "SELECT a.id_keluhan, a.keluhan, a.tgl_keluhan, a.status, a.konfirmasi, a.ket_konfirmasi, b.id_pelanggan, b.nama_pelanggan, b.alamat, b.no_telp, c.nama_barang, c.type, d.nama_authorized, d.email FROM tb_keluhan a INNER JOIN tb_pendaftaran b ON a.id_pelanggan=b.id_pelanggan INNER JOIN tb_barangelektronik c ON a.id_barangelektronik=c.id_barangelektronik INNER JOIN tb_authorized d ON c.id_authorized=d.id_authorized WHERE b.id_pelanggan = '$id'";
        return $this->db->query($query);
    }

    public function JoinProgress($id, $status, $pelanggan)
    {
        $query = "SELECT a.id_keluhan, a.keluhan, a.tgl_keluhan, a.status, a.konfirmasi, b.id_pelanggan, b.nama_pelanggan, b.alamat, b.no_telp, c.nama_barang, c.type, d.nama_authorized, d.email, e.status_service, e.status_bayar, e.tgl, f.id_info, f.info, f.keterangan FROM tb_keluhan a INNER JOIN tb_pendaftaran b ON a.id_pelanggan=b.id_pelanggan INNER JOIN tb_barangelektronik c ON a.id_barangelektronik=c.id_barangelektronik INNER JOIN tb_authorized d ON c.id_authorized=d.id_authorized INNER JOIN tb_suratperintahkerja e ON a.id_keluhan=e.id_keluhan INNER JOIN tb_info f ON e.id_surat=f.id_surat WHERE a.id_keluhan='$id' AND b.id_pelanggan='$pelanggan' AND e.status_service='$status'";
        return $this->db->query($query);
    }

    public function JoinRincian($id, $status, $pelanggan)
    {
        $query = "SELECT a.id_keluhan, a.keluhan, a.seri_barang, a.tgl_keluhan, a.status, a.konfirmasi, b.id_pelanggan, b.nama_pelanggan, b.alamat, b.no_telp, c.nama_barang, c.type, d.nama_authorized, d.email, e.status_service, e.status_bayar, e.hasil, e.biaya_jasa, e.biaya_transpot, e.total_bayar, e.tgl, f.id_info, f.info, f.keterangan FROM tb_keluhan a INNER JOIN tb_pendaftaran b ON a.id_pelanggan=b.id_pelanggan INNER JOIN tb_barangelektronik c ON a.id_barangelektronik=c.id_barangelektronik INNER JOIN tb_authorized d ON c.id_authorized=d.id_authorized INNER JOIN tb_suratperintahkerja e ON a.id_keluhan=e.id_keluhan INNER JOIN tb_info f ON e.id_surat=f.id_surat WHERE a.id_keluhan='$id' AND b.id_pelanggan='$pelanggan' AND e.status_service='$status'";
        return $this->db->query($query);
    }

    public function JoinSetengah($id, $status, $pelanggan)
    {
        $query = "SELECT a.id_keluhan, a.keluhan, a.tgl_keluhan, a.status, a.konfirmasi, b.id_pelanggan, b.nama_pelanggan, b.alamat, b.no_telp, c.nama_barang, c.type, d.nama_authorized, d.email, e.status_service, e.status_bayar, e.tgl, f.id_info, f.info, f.keterangan, l.ket_status, l.hasil FROM tb_keluhan a INNER JOIN tb_pendaftaran b ON a.id_pelanggan=b.id_pelanggan INNER JOIN tb_barangelektronik c ON a.id_barangelektronik=c.id_barangelektronik INNER JOIN tb_authorized d ON c.id_authorized=d.id_authorized INNER JOIN tb_suratperintahkerja e ON a.id_keluhan=e.id_keluhan INNER JOIN tb_info f ON e.id_surat=f.id_surat INNER JOIN tb_suratperintahkerja l ON l.id_keluhan=a.id_keluhan WHERE a.id_keluhan='$id' AND b.id_pelanggan='$pelanggan' AND e.status_service='$status'";
        return $this->db->query($query);
    }

    public function info($keluhan)
    {
        $query = "SELECT * FROM tb_info a INNER JOIN tb_suratperintahkerja b ON a.id_surat=b.id_surat INNER JOIN tb_keluhan c ON b.id_keluhan=c.id_keluhan WHERE c.id_keluhan ='$keluhan'";
        $hasil = $this->db->query($query);
        return $hasil;
    }

    public function ubahStatus($id, $isi)
    {
        $this->db->set('status', $isi);
        $this->db->where('id_keluhan', $id);
        $this->db->update('tb_keluhan');
    }

    public function konfirmasi($post)
    {
        $param['konfirmasi'] = $post['konfirmasi'];
        $param['ket_konfirmasi'] = $post['ket'];
        if ($post['merk'] == 'Random') {
            $param['status'] = '1';
        };

        $this->db->where('id_keluhan', $post['id']);
        $this->db->update('tb_keluhan', $param);
    }

    public function tambah($post)
    {
        $param = [
            'id_keluhan' => $post['id'],
            'id_pelanggan' => $this->session->userdata('id_pelanggan'),
            'keluhan' => $post['keluhan'],
            'id_barangelektronik' => $post['id_be'],
            'seri_barang' => $post['seri'],
            'tgl_keluhan' => date('Y-m-d H:i:s'),
            'garansi' => $post['garansi'],
            'gambar_garansi' => empty($_FILES['gambar']['name']) ? null : $this->uploadImage(),
            'konfirmasi' => 'belum',
            'ket_konfirmasi' => null,
            'status' => 0
        ];

        $this->db->insert('tb_keluhan', $param);
    }

    public function tambahCC($post)
    {
        $param = [
            'id_keluhan' => $post['id'],
            'pemohon' => $post['pemohon'],
            'alamat_pemohon' => $post['alamat_p'],
            'no_pemohon' => $post['no_p'],
            'id_pelanggan' => $post['id_pel'],
            'keluhan' => $post['keluhan'],
            'id_barangelektronik' => $post['id_be'],
            'seri_barang' => $post['seri'],
            'tgl_keluhan' => date('Y-m-d H:i:s'),
            'garansi' => 'ya',
            'gambar_garansi' => empty($_FILES['gambar']['name']) ? null : $this->uploadImage(),
            'konfirmasi' => 'belum',
            'ket_konfirmasi' => null,
            'status' => 0
        ];

        $this->db->insert('tb_keluhan', $param);
    }

    public function ubahNotif($id)
    {
        $this->db->set('status_notif', 'dibaca');
        $this->db->where('id_keluhan', $id);
        $this->db->update('tb_keluhan');
    }

    public function ubahNotifPelanggan($id)
    {
        $this->db->set('status_notif', 'dibaca');
        $this->db->where('id_info', $id);
        $this->db->update('tb_info');
    }

    public function lihat_notif($id)
    {
        $query = "SELECT b.id_surat, c.id_keluhan, a.info, a.id_info, a.keterangan FROM tb_info a INNER JOIN tb_suratperintahkerja b ON a.id_surat=b.id_surat INNER JOIN tb_keluhan c ON b.id_keluhan=c.id_keluhan INNER JOIN tb_pendaftaran d ON c.id_pelanggan=d.id_pelanggan WHERE a.id_info='$id'";

        return $this->db->query($query)->row_array();
    }

    public function totalSpar($id)
    {
        $query = "SELECT SUM(harga * jumlah) as subtotal FROM tb_suratdetail a INNER JOIN tb_sparepart b ON a.id_sparepart=b.id_sparepart INNER JOIN tb_suratperintahkerja l ON a.id_surat=l.id_surat INNER JOIN tb_keluhan p ON l.id_keluhan=p.id_keluhan WHERE p.id_keluhan='$id'";
        return $this->db->query($query);
    }

    private function uploadImage()
    {
        $config['upload_path'] = './assets/img/garansi/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '2048';
        $config['file_name']  = round(microtime(true) * 1000);

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data('file_name');
        } else {
            echo $this->upload->display_errors();
        }
    }
}
