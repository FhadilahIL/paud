<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{
    function index()
    {
        $data['judul'] = "Admin - Dashboard";
        $data['berhasil'] = "<script>Swal.fire({
            title: 'Error!',
            text: 'Do you want to continue',
            icon: 'error',
            confirmButtonText: 'Cool'
        })</script>";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/isi', $data);
        $this->load->view('templates/footer');
    }
}
