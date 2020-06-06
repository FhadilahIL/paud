<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    function cari_user($username)
    {
        $this->db->select('*');
        $this->db->where('username', $username);
        return $this->db->get('tb_user');
    }
    function cari_user_admin_guru($username)
    {
        $this->db->select('*');
        // $this->db->where('tb_user.username', $username);
        $this->db->join('tb_detail_admin_guru', 'tb_detail_admin_guru.id_user = tb_user.id_user', 'left');
        return $this->db->get_where('tb_user', array('username' => $username));
    }
    
    function cari_user_ortu($username)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_detail_orang_tua', 'tb_detail_orang_tua.id_user = tb_user.id_user', 'left');
        $this->db->where('tb_user.username', $username);
    }
}