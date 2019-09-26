<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('keluhan_model', 'km');
        $this->load->model('nomor_model', 'nm');
        $this->load->model('user_model', 'um');
        $this->load->model('surat_model', 'sm');
        $this->load->model('info_model', 'im');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['spk'] = $this->sm->join()->result_array();
        $data['info'] = $this->nm->get(null, 'tb_info', 'id_info')->result_array();
        $this->template->load('template', 'pelayanan/surat/index', $data);
    }

    public function ubahStatus($id)
    {
        $this->km->ubahStatus($id, '2');
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Berhasil Dibuat');
            redirect('surat');
        }
    }

    public function ubahStatusNomor()
    {
        $post = $this->input->post(null, true);
        $this->sm->ubahStatusNomor($post);
    }

    public function buat($id)
    {
        $data['nomor'] = $this->nm->getStatus()->result();
        $data['teknisi'] = $this->um->get(null,  'teknisi')->result();
        $data['keluhan'] = $this->km->JoinById($id)->row_array();
        $data['nomor_kel'] = $this->km->JoinById($id)->result_array();
        $this->template->load('template',  'pelayanan/surat/buat', $data);
    }

    public function prosesBuat()
    {
        $this->form_validation->set_rules('user', 'Teknisi', 'required|trim|callback_info_check');
        $this->form_validation->set_rules('info', 'Info', 'required|trim');
        $this->form_validation->set_rules('ket', 'Jam', 'required|trim|callback_info_check');
        $this->form_validation->set_rules('nomor', 'Nomor', 'required|trim');
        $this->form_validation->set_error_delimiters('<div style="font-size: smaller;" class="text-danger">', '</div>');
        $this->form_validation->set_message('required', '%s belum diisi');
        $post = $this->input->post(null, true);
        $id = $post['id_keluhan'];

        if ($this->form_validation->run() == FALSE) {
            $this->buat($id);
        } else {
            $this->sm->prosesBuat($post);
            $this->im->simpan($post);
            if ($post['nomor'] != "") {
                $this->ubahStatusNomor($post);
            }
            $this->ubahStatus($id);
        }
    }

    function info_check()
    {
        $post = $this->input->post(null, true);
        $info = $post['info'];
        $ket = $post['ket'];
        $user = $post['user'];
        $query = $this->db->query("SELECT a.id_surat FROM tb_suratperintahkerja a INNER JOIN tb_info b ON a.id_surat=b.id_surat INNER JOIN tb_user c ON a.id_user=c.id_user INNER JOIN tb_keluhan d ON a.id_keluhan=d.id_keluhan WHERE c.id_user = '$user' AND info = '$info' AND keterangan = '$ket'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('info_check', '%s pada hari tsb ada service');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function detail($id)
    {
        $data['sparepart'] = $this->sm->joinSparepart($id)->result_array();
        $data['surat'] = $this->sm->joinDetail($id)->row_array();
        $this->template->load('template', 'pelayanan/surat/detail', $data);
    }

    public function cek()
    {
        $tgl = $this->input->post('tgl');
        $teknisi = $this->input->post('teknisi');
        $kota = $this->input->post('kota');
        $query = "SELECT * FROM tb_suratperintahkerja a INNER JOIN tb_info b ON a.id_surat=b.id_surat INNER JOIN tb_user c ON a.id_user=c.id_user INNER JOIN tb_keluhan d ON a.id_keluhan=d.id_keluhan INNER JOIN tb_pendaftaran e ON d.id_pelanggan=e.id_pelanggan WHERE b.info = '$tgl' AND c.nama = '$teknisi' AND e.alamat LIKE '%$kota%' AND a.status_service='belum'";
        $pecah = $this->db->query($query)->result_array();
        $ada = $this->db->query($query)->num_rows();
        $isi = "<table id='tb' class='table mt-2'>
                    <thead>
                        <tr>
                            <th>ID SPK</th>
                            <th>Teknisi</th>
                            <th>Pelanggan</th>
                            <th>Alamat</th>
                            <th>Jadwal</th>
                            <th>Jam</th>
                        </tr>
                    </thead>
                    <tbody>";
        if ($ada > 0) {
            foreach ($pecah as $key) :
                $isi .= "<tr>
                        <td>" . $key['id_surat'] . "</td>
                        <td>" . $key['nama'] . "</td>
                        <td>" . $key['nama_pelanggan'] . "</td>
                        <td>" . $key['alamat'] . "</td>
                        <td>" . $key['info'] . "</td>
                        <td>" . $key['keterangan'] . "</td>
                    </tr>";
            endforeach;
        } else {
            $isi .= "<tr>
                        <td colspan='5' class='text-center'>Tidak ada data service</td>
                    </tr>";
        }
        $isi .= "</tbody>
                </table>";

        $data['isi'] = $isi;
        echo json_encode($data);
    }
}
