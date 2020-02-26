<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mahasiswa_model extends CI_Model
{

    public function getAllMahasiswa()
    {
        $query = $this->db->get('mahasiswa');
        return $query->result_array();
    }

    public function tambahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama', true), // ini sama dengan htmlspecialchars($_POST['nama'])
            "nim" => $this->input->post('nim', true),
            "no_hp" => $this->input->post('no_hp', true),
            "alamat" => $this->input->post('alamat', true)
        ];

        $this->db->insert('mahasiswa', $data);
    }

    public function hapusDataMahasiswa($id)
    {
        $this->db->where('id_mahasiswa', $id);
        $this->db->delete('mahasiswa');
    }

    public function getMahasiswaById($id)
    {
        return $this->db->get_where('mahasiswa', ['id_mahasiswa' => $id])->row_array();
    }

    public function ubahDataMahasiswa()
    {
        $data = [
            "id_mahasiswa" => $this->input->post('id_mahasiswa', true),
            "nama" => $this->input->post('nama', true),
            "nim" => $this->input->post('nim', true),
            "no_hp" => $this->input->post('no_hp', true),
            "alamat" => $this->input->post('alamat', true)
            //terakhir sampe sini, delete sudah ubah sudah
        ];

        $this->db->where('id_mahasiswa', $this->input->post('id_mahasiswa', true));
        $this->db->update('mahasiswa', $data);
    }

    public function cariDataMahasiswa()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('nama', $keyword);
        $this->db->or_like('nim', $keyword);
        return $this->db->get('mahasiswa')->result_array();
    }
}

/* End of file Controllername.php */
