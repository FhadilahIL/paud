<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_ortu extends CI_Model
{
    function cari_ortu($id_user)
    {
        $this->db->where('tb_user.id_user', $id_user);
        $this->db->where('id_role', 3);
        $this->db->join('tb_detail_orang_tua', 'tb_detail_orang_tua.id_user = tb_user.id_user', 'inner');
        return $this->db->get('tb_user');
    }
    function update_data($data_user, $id_user)
    {
        return $this->db->update('tb_user', $data_user, ['id_user' => $id_user]);
    }
    function update_ortu_detail($data_detail, $id_user)
    {
        return $this->db->update('tb_detail_orang_tua', $data_detail, ['id_user' => $id_user]);
    }
}
