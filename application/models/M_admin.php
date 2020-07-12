<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    function cari_admin_semua()
    {
        $this->db->where('id_role', 1);
        return $this->db->get('tb_user');
    }

    function cari_guru_semua()
    {
        $this->db->where('id_role', 2);
        return $this->db->get('tb_user');
    }

    function cari_ortu_semua()
    {
        $this->db->where('id_role', 3);
        return $this->db->get('tb_user');
    }

    function cari_admin($id_user)
    {
        $this->db->where('tb_user.id_user', $id_user);
        $this->db->where('id_role', 1);
        $this->db->join('tb_detail_admin_guru', 'tb_detail_admin_guru.id_user = tb_user.id_user', 'inner');
        return $this->db->get('tb_user');
    }

    function cari_guru($id_user)
    {
        $this->db->where('tb_user.id_user', $id_user);
        $this->db->where('id_role', 2);
        $this->db->join('tb_detail_admin_guru', 'tb_detail_admin_guru.id_user = tb_user.id_user', 'inner');
        return $this->db->get('tb_user');
    }

    function cari_ortu($id_user)
    {
        $this->db->where('tb_user.id_user', $id_user);
        $this->db->where('id_role', 3);
        $this->db->join('tb_detail_orang_tua', 'tb_detail_orang_tua.id_user = tb_user.id_user', 'inner');
        return $this->db->get('tb_user');
    }

    function cari_username($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('tb_user');
    }

    function tambah_admin($data)
    {
        $this->db->insert('tb_user', $data);
    }

    function tambah_guru($data)
    {
        $this->db->insert('tb_user', $data);
    }

    function tambah_ortu($data)
    {
        $this->db->insert('tb_user', $data);
    }

    function hapus_admin($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->where('id_role', 1);
        $this->db->delete('tb_user');
    }

    function hapus_guru($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->where('id_role', 2);
        $this->db->delete('tb_user');
    }

    function hapus_ortu($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->where('id_role', 3);
        $this->db->delete('tb_user');
    }

    function cari_detail_guru($id_user)
    {
        $this->db->where('id_user', $id_user);
        return $this->db->get('tb_detail_admin_guru');
    }

    function update_data($data_user, $id_user)
    {
        return $this->db->update('tb_user', $data_user, ['id_user' => $id_user]);
    }

    function update_admin_guru_detail($data_detail, $id_user)
    {
        return $this->db->update('tb_detail_admin_guru', $data_detail, ['id_user' => $id_user]);
    }

    function tambah_admin_guru_detail($id_user)
    {
        return $this->db->insert('tb_detail_admin_guru', ['id_user' => $id_user]);
    }

    function update_ortu_detail($data_detail, $id_user)
    {
        return $this->db->update('tb_detail_orang_tua', $data_detail, ['id_user' => $id_user]);
    }

    function tambah_ortu_detail($id_user)
    {
        return $this->db->insert('tb_detail_orang_tua', ['id_user' => $id_user]);
    }
}
