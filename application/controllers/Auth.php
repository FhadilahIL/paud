<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct(){
        parent::__construct();
        $this->load->model('M_user');
    }

    public function index()
    {
        $data['judul'] = "Sipendi - Login";
        $this->load->view('auth/login', $data);
    }

    public function register()
    {
        $data['judul'] = "Sipendi - Register";
        $this->load->view('auth/register', $data);
    }

    public function lupa_password()
    {
        $data['judul'] = "Sipendi - Lupa Password";
        $this->load->view('auth/lupa_password', $data);
    }

    public function cek_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
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
                $this->session->set_flashdata('gagal', 'Password yang anda masukan salah.');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Username tidak ditemukan.');
            redirect('auth');
        }
    }

    function cek_session()
    {
        if($this->session->userdata('id_role')==1){
            redirect('admin');
        } elseif ($this->session->userdata('id_role')==2) {
            redirect('pengajar');
        } elseif ($this->session->userdata('id_role')==3) {
            redirect('ortu');
        } else {
            redirect('/');
        }
    }
    
    function logout()
    {
        $session = [
            'id_user', 'id_role','nama'
        ];
        $this->session->set_flashdata('berhasil', 'Anda Berhasil Logout.');
        $this->session->unset_userdata($session);
        redirect('auth');
    }
}
