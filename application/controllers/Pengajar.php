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
        $this->load->model('M_admin');
        $this->load->model('M_guru');
        $this->load->model('M_murid');
        $this->load->model('M_penilaian');
    }

    public function index()
    {
        $data['judul'] = "Guru - Dashboard";
        $username = $this->session->userdata('username');
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['active'] = ['active', '', '', '', '', '', '', '', ''];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_guru', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengajar/index');
        $this->load->view('templates/footer');
    }

    // My Profile
    function my_profile()
    {
        $data['judul'] = "Guru - My Profile";
        $username = $this->session->userdata('username');
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['active'] = ['', '', '', '', '', '', '', '', ''];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_guru', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengajar/my_profile');
        $this->load->view('templates/footer');
    }

    function update_my()
    {
        $id_user = $this->input->post('id_user', true);
        $nama = $this->input->post('nama', true);
        $password = $this->input->post('password', true);
        $confirm_password = $this->input->post('confirm_password');
        $alamat = $this->input->post('alamat', true);
        $no_hp = $this->input->post('no_hp', true);

        if ($password != "") {
            // jika password diubah
            if ($password == $confirm_password) {
                // jika password sama
                if ($_FILES['foto']['name']) {
                    // jika gambar diubah password diubah
                    $data_user = [
                        'nama'      => $nama,
                        'password'  => password_hash($password, PASSWORD_DEFAULT),
                        'foto'      => $this->upload_gambar_profile($this->input->post('nama'))
                    ];
                    $data_detail = [
                        'alamat'    => $alamat,
                        'no_hp'     => $no_hp
                    ];
                } else {
                    // jika gambar tidak diubah password diubah
                    $data_user = [
                        'nama'      => $nama,
                        'password'  => password_hash($password, PASSWORD_DEFAULT)
                    ];
                    $data_detail = [
                        'alamat'    => $alamat,
                        'no_hp'     => $no_hp
                    ];
                }
            } else {
                // jika password beda
                $this->session->set_flashdata('notif', "Gagal");
                $this->session->set_flashdata('perintah', "Mengubah My Profile");
                $this->session->set_flashdata('pesan', "Gagal Mengubah Data Admin, Password Tidak Sama");
                redirect('pengajar/my_profile');
            }
        } else {
            // jika password tidak diubah gambar diubah
            if ($_FILES['foto']['name']) {
                $data_user = [
                    'nama'      => $nama,
                    'foto'      => $this->upload_gambar_profile($this->input->post('nama'))
                ];
                $data_detail = [
                    'alamat'    => $alamat,
                    'no_hp'     => $no_hp
                ];
            } else {
                // jika password dan gambar tidak diubah
                $data_user = [
                    'nama'      => $nama,
                ];
                $data_detail = [
                    'alamat'    => $alamat,
                    'no_hp'     => $no_hp
                ];
            }
        }
        if ($data_user['foto']) {
            $udata = $this->M_guru->cari_guru($id_user)->row();
            $nama_gambar = $udata->foto;
            if ($nama_gambar != 'default.svg') {
                $this->hapus_foto_profile($nama_gambar);
            }
        }
        // print_r($nama_gambar);
        // die;
        if ($this->M_admin->update_data($data_user, $id_user)) {
            // jika update guru update detail guru
            $this->M_admin->update_admin_guru_detail($data_detail, $id_user);
            $this->load->helper('updatesession');
            updateSession(['nama' => $data_user['nama']]);
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Mengubah My Profile");
            $this->session->set_flashdata('pesan', "Data My Profile Berhasil Diubah");
            redirect('pengajar/my_profile');
        } else {
            // jika gagal update
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Mengubah My Profile");
            $this->session->set_flashdata('pesan', "Gagal My Profile Mengubah Data Guru.");
            redirect('pengajar/my_profile');
        }
    }
    // End My Profile

    // Gambar
    function upload_gambar_profile($nama)
    {
        $this->load->library('upload');
        $this->upload->initialize([
            'upload_path'   => './assets/img/profile/',
            'allowed_types' => 'jpg|png|jpeg|pdf',
            'max_size'      => '2150',
            'encrypt_name'  => TRUE,
            'overwrite'     => TRUE,
            'file_name'     => $nama
        ]);

        if ($this->upload->do_upload('foto')) {
            $gambar = $this->upload->data();
            $this->load->library('image_lib');
            $this->image_lib->initialize([
                'image_library' => 'gd2',
                'source_image' => './assets/img/profile/' . $gambar['file_name'],
                'maintain_ratio' => FALSE,
                'create_thumb' => FALSE,
                'width' => 150,
                'height' => 150
            ]);
            $this->image_lib->resize();
            return $this->upload->data('file_name');
        } else {
            return $this->upload->display_errors('<p>', '</p>');
        }
    }

    function hapus_foto_profile($nama_gambar)
    {
        unlink('assets/img/profile/' . $nama_gambar);
    }
    // End Gambar

    // Data Peserta Didik
    function peserta_didik()
    {
        $data['judul'] = "Guru - Peserta Didik";
        $username = $this->session->userdata('username');
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['active'] = ['', 'active', 'active', '', '', '', '', '', ''];
        $data['murid'] = $this->M_murid->tampil_murid()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_guru', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengajar/peserta_didik');
        $this->load->view('templates/footer');
    }
    // End Data Peserta Didik

    // Data Kompetensi Dasar
    function kompetensi_dasar()
    {
        $data['judul'] = "Guru - Kompetensi Dasar";
        $username = $this->session->userdata('username');
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['active'] = ['', 'active', '', 'active', '', '', '', '', ''];
        $data['kompetensi_dasar'] = $this->M_penilaian->tampil_kompetensi_dasar()->result();
        $data['tampil_kompetensi_dasar'] = $this->M_penilaian->tampil_kompetensi_dasar_semua()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_guru', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengajar/kompetensi_dasar');
        $this->load->view('templates/footer');
    }
    // End Kompetensi Dasar
}
