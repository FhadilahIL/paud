<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_role') != 1) {
            redirect('auth/cek_session');
        }
        $this->load->model('M_user');
        $this->load->model('M_admin');
    }

    public function index()
    {
        $data['judul'] = "Admin - Dashboard";
        $username = $this->session->userdata('username');
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        // print_r($data['user']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar',$data);
        $this->load->view('templates/isi');
        $this->load->view('templates/footer');
    }
    
    public function data_user()
    {
        $data['judul'] = "Admin - Data User";
        $username = $this->session->userdata('username');
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['admin'] = $this->M_admin->cari_admin_semua()->result();
        $data['guru'] = $this->M_admin->cari_guru_semua()->result();
        $data['ortu'] = $this->M_admin->cari_ortu_semua()->result();
        // print_r($data['admin']);die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/data_user',$data);
        $this->load->view('templates/footer');

    }

    public function tambah_admin()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');
        if ($confirm_password == $password) {
            $cari_data = $this->M_admin->cari_username($username)->num_rows();
            // print_r($cari_data);die;
            if ($cari_data > 0) {
                $this->session->set_flashdata('gagal_admin', "Username Telah Digunakan.");
                redirect('admin/data_user');
            } else {
                $data = [
                    'id_user' => '',
                    'nama' => $nama,
                    'username' => $username,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'id_role' => '1',
                    'foto' => 'default.jpg',
                ];
                $simpan_data = $this->M_admin->tambah_admin($data);
                $this->session->set_flashdata('berhasil_admin', "Data Admin Berhasil Ditambahkan.");
                redirect('admin/data_user');
            }
        } else {
            $this->session->set_flashdata('gagal_admin', "Password Tidak Sama.");
            redirect('admin/data_user');
        }
    }
    
    public function hapus_admin($id_user){
        $id_user = $this->uri->segment(3);
        $hapus_admin = $this->M_admin->hapus_admin($id_user);
        $this->session->set_flashdata('berhasil_admin', "Data Berhasil Dihapus.");
        redirect('admin/data_user');
    }
}
