<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
    }

    public function index()
    {
        if ($this->session->userdata('id_role')) {
            redirect('auth/cek_session');
        }
        $data['judul'] = "Sipendi - Login";
        $this->load->view('auth/login', $data);
    }

    public function cek_login()
    {
        $username = htmlspecialchars($this->input->post('username'));
        $password = htmlspecialchars($this->input->post('password'));
        $user = $this->M_user->cari_user($username);
        if ($user->num_rows() > 0) {
            $user_data = $user->row();
            if (password_verify($password, $user_data->password)) {
                if ($user_data->id_role != 3) {
                    $this->M_user->cari_user_admin_guru($username);
                    $data_session = [
                        'username'  => $user_data->username,
                        'id_user'   => $user_data->id_user,
                        'id_role'   => $user_data->id_role,
                        'nama'      => $user_data->nama
                    ];
                    $this->session->set_userdata($data_session);
                    redirect('auth/cek_session');
                } else {
                    $this->M_user->cari_user_ortu($username);
                    $data_session = [
                        'username'  => $user_data->username,
                        'id_user'   => $user_data->id_user,
                        'id_role'   => $user_data->id_role,
                        'nama'      => $user_data->nama
                    ];
                    $this->session->set_userdata($data_session);
                    redirect('auth/cek_session');
                }
            } else {
                $this->session->set_flashdata('notif', "Gagal");
                $this->session->set_flashdata('perintah', "Login");
                $this->session->set_flashdata('pesan', "Password Yang Anda Masukan Salah.");
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Login");
            $this->session->set_flashdata('pesan', "User Tidak Ditemukan.");
            redirect('auth');
        }
    }

    function cek_session()
    {
        if ($this->session->userdata('id_role') == 1) {
            redirect('admin');
        } elseif ($this->session->userdata('id_role') == 2) {
            redirect('pengajar');
        } elseif ($this->session->userdata('id_role') == 3) {
            redirect('ortu');
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Login");
            $this->session->set_flashdata('pesan', "Anda Harus Login Terlebih Dahulu.");
            redirect('/');
        }
    }

    function logout()
    {
        $session = [
            'id_user', 'id_role', 'nama'
        ];
        $this->session->set_flashdata('notif', "Berhasil");
        $this->session->set_flashdata('perintah', "Logout");
        $this->session->set_flashdata('pesan', "Anda Berhasil Logout");
        $this->session->unset_userdata($session);
        redirect('auth');
    }
}
