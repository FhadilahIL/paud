<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_murid extends CI_Model
{
    function tampil_murid()
    {
        return $this->db->get('tb_peserta_didik');
    }

    function tahun_ajaran()
    {
        return $this->db->query('SELECT tb_tahun_ajaran.id_tahun_ajaran, tahun_ajaran, mulai FROM `tb_tahun_ajaran` INNER JOIN tb_semester on tb_semester.id_tahun_ajaran = tb_tahun_ajaran.id_tahun_ajaran GROUP BY tb_tahun_ajaran.id_tahun_ajaran ORDER BY tb_tahun_ajaran.id_tahun_ajaran DESC');
    }

    function cari_tahun_ajaran($id_tahun_ajaran)
    {
        $this->db->select('no_induk, tb_tahun_ajaran.id_tahun_ajaran, tahun_ajaran');
        $this->db->join('tb_peserta_didik', 'tb_tahun_ajaran.id_tahun_ajaran = tb_tahun_ajaran.id_tahun_ajaran', 'left');
        $this->db->join('tb_semester', 'tb_semester.id_tahun_ajaran = tb_tahun_ajaran.id_tahun_ajaran', 'left');
        $this->db->order_by('id_peserta', 'DESC');
        $this->db->where('tb_tahun_ajaran.id_tahun_ajaran', $id_tahun_ajaran);
        return $this->db->get('tb_tahun_ajaran');
    }

    function cari_kode($tahun_ajaran)
    {
        $this->db->select('no_induk');
        $this->db->like('no_induk', $tahun_ajaran);
        $this->db->limit(1);
        return $this->db->get('tb_peserta_didik');
    }

    function cari_peserta($id_peserta)
    {
        $this->db->join('tb_user', 'tb_user.id_user = tb_peserta_didik.id_user');
        $this->db->where('id_peserta', $id_peserta);
        return $this->db->get('tb_peserta_didik');
    }

    function tambah_peserta($data)
    {
        return $this->db->insert('tb_peserta_didik', $data);
    }

    function edit_peserta($data, $id_peserta)
    {
        $this->db->set($data);
        $this->db->where('id_peserta', $id_peserta);
        return $this->db->update('tb_peserta_didik');
    }

    function tampil_anak($id_user)
    {
        $this->db->where('id_user', $id_user);
        return $this->db->get('tb_peserta_didik');
    }
}
