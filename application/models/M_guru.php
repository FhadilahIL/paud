<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_guru extends CI_Model
{
    function cari_guru($id_user)
    {
        $this->db->where('tb_user.id_user', $id_user);
        $this->db->where('id_role', 2);
        $this->db->join('tb_detail_admin_guru', 'tb_detail_admin_guru.id_user = tb_user.id_user', 'inner');
        return $this->db->get('tb_user');
    }
}
