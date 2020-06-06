<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    function cari_admin_semua(){
        $this->db->where('id_role', 1);
        return $this->db->get('tb_user');
    }
    function cari_guru_semua(){
        $this->db->where('id_role', 2);
        return $this->db->get('tb_user');
    }
    function cari_ortu_semua(){
        $this->db->where('id_role', 3);
        return $this->db->get('tb_user');
    }
    function cari_username($username){
        $this->db->where('username', $username);
        return $this->db->get('tb_user');
    }
    function tambah_admin($data){
        $this->db->insert('tb_user', $data);
    }
    function hapus_admin($id_user){
        $this->db->where('id_user', $id_user);
        $this->db->delete('tb_user');
    }
}