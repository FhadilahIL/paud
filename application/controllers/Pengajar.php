<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_role') != 2) {
            redirect('auth/cek_session');
        }
        $this->load->model('M_user');
    }

    public function index()
    {
        $data['judul'] = "Guru - Dashboard";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_guru');
        $this->load->view('templates/topbar');
        $this->load->view('templates/isi');
        $this->load->view('templates/footer');
    }
}
