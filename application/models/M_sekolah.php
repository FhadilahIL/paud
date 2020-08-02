<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sekolah extends CI_Model
{
    function tampil_profile()
    {
        return $this->db->get('tb_profile_sekolah');
    }

    function tampil_semester()
    {
        $this->db->join('tb_tahun_ajaran', 'tb_tahun_ajaran.id_tahun_ajaran = tb_semester.id_tahun_ajaran', 'inner');
        $this->db->order_by('id_semester', 'DESC');
        return $this->db->get('tb_semester');
    }

    function update_profile_sekolah($data)
    {
        $this->db->where('id_sekolah', 1);
        return $this->db->update('tb_profile_sekolah', $data);
    }

    function tampil_tahun_ajaran()
    {
        $this->db->order_by('tb_tahun_ajaran.id_tahun_ajaran', 'DESC');
        return $this->db->get('tb_tahun_ajaran');
    }

    function tampil_tahun_ajaran_dipilih($id_tahun_ajaran)
    {
        $this->db->join('tb_semester', 'tb_semester.id_tahun_ajaran = tb_tahun_ajaran.id_tahun_ajaran', 'left');
        $this->db->order_by('semester', 'DESC');
        $this->db->where('tb_tahun_ajaran.id_tahun_ajaran', $id_tahun_ajaran);
        $this->db->limit(1);
        return $this->db->get('tb_tahun_ajaran');
    }
    function tampil_semester_akhir()
    {
        $this->db->order_by('id_semester', 'DESC');
        $this->db->limit(1);
        return $this->db->get('tb_semester');
    }

    function tampil_tahun_ajaran_akhir()
    {
        $this->db->order_by('id_tahun_ajaran', 'DESC');
        $this->db->limit(1);
        return $this->db->get('tb_tahun_ajaran');
    }

    function tambah_tahun_ajaran($data)
    {
        return $this->db->insert('tb_tahun_ajaran', $data);
    }

    function tambah_semester($data)
    {
        return $this->db->insert('tb_semester', $data);
    }

    function tampil_semester_admin($id_semester)
    {
        $this->db->join('tb_tahun_ajaran', 'tb_tahun_ajaran.id_tahun_ajaran = tb_semester.id_tahun_ajaran', 'inner');
        $this->db->where('id_semester', $id_semester);
        return $this->db->get('tb_semester');
    }

    function update_semester($id_semester, $data)
    {
        $this->db->where('id_semester', $id_semester);
        return $this->db->update('tb_semester', $data);
    }
}
