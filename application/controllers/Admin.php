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
        $this->load->model('M_murid');
        $this->load->model('M_penilaian');
        $this->load->model('M_sekolah');
    }

    // Dashboard
    public function index()
    {
        $data['judul'] = "Admin - Dashboard";
        $username = $this->session->userdata('username');
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        // print_r($data['user']);
        $data['active'] = ['active', '', '', '', '', '', '', '', '', '', '', '', ''];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }
    // End Dashboard

    // My Profile
    public function my_profile()
    {
        $data['judul'] = "Admin - My Profile";
        $username = $this->session->userdata('username');
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        // print_r($data['user']);
        // die;
        $data['active'] = ['', '', '', '', '', '', '', '', '', '', '', '', ''];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/my_profile');
        $this->load->view('templates/footer');
    }
    // End My Profile

    // Menu Data User
    public function data_user()
    {
        $data['judul'] = "Admin - Data User";
        $username = $this->session->userdata('username');
        $data['active'] = ['', 'active', 'active', '', '', '', '', '', '', '', '', '', ''];
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['admin'] = $this->M_admin->cari_admin_semua()->result();
        $data['guru'] = $this->M_admin->cari_guru_semua()->result();
        $data['ortu'] = $this->M_admin->cari_ortu_semua()->result();
        // print_r($data['admin']);die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_user', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_admin()
    {
        $nama = $this->input->post('nama', true);
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $confirm_password = $this->input->post('confirm_password', true);
        if ($confirm_password == $password) {
            $cari_data = $this->M_admin->cari_username($username)->num_rows();
            // print_r($cari_data);die;
            if ($cari_data > 0) {
                $this->session->set_flashdata('notif', "Gagal");
                $this->session->set_flashdata('perintah', "Menambahkan Admin");
                $this->session->set_flashdata('pesan', "Username $username Telah Digunakan");
                redirect('admin/data_user');
            } else {
                $data = [
                    'id_user' => '',
                    'nama' => $nama,
                    'username' => $username,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'id_role' => '1',
                    'foto' => 'default.svg',
                ];
                $this->M_admin->tambah_admin($data);
                $detail = $this->M_admin->cari_username($username)->row();
                $id_user = $detail->id_user;
                $this->M_admin->tambah_admin_guru_detail($id_user);
                $this->session->set_flashdata('notif', "Berhasil");
                $this->session->set_flashdata('perintah', "Menambahkan Admin");
                $this->session->set_flashdata('pesan', "Data Admin Berhasil Ditambahkan");
                redirect('admin/data_user');
            }
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Menambahkan Admin");
            $this->session->set_flashdata('pesan', "Password Harus Sama.");
            redirect('admin/data_user');
        }
    }
    public function tambah_guru()
    {
        $nama = $this->input->post('nama', true);
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $confirm_password = $this->input->post('confirm_password', true);
        if ($confirm_password == $password) {
            $cari_data = $this->M_admin->cari_username($username)->num_rows();
            // print_r($cari_data);die;
            if ($cari_data > 0) {
                $this->session->set_flashdata('notif', "Gagal");
                $this->session->set_flashdata('perintah', "Menambahkan Guru");
                $this->session->set_flashdata('pesan', "Username $username Digunakan");
                redirect('admin/data_user');
            } else {
                $data = [
                    'id_user' => '',
                    'nama' => $nama,
                    'username' => $username,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'id_role' => '2',
                    'foto' => 'default.svg',
                ];
                $this->M_admin->tambah_guru($data);
                $detail = $this->M_admin->cari_username($username)->row();
                $id_user = $detail->id_user;
                $this->M_admin->tambah_admin_guru_detail($id_user);
                $this->session->set_flashdata('notif', "Berhasil");
                $this->session->set_flashdata('perintah', "Menambahkan Guru");
                $this->session->set_flashdata('pesan', "Data Guru Berhasil Ditambahkan");
                redirect('admin/data_user');
            }
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Menambahkan Guru");
            $this->session->set_flashdata('pesan', "Password Harus Sama");
            redirect('admin/data_user');
        }
    }
    public function tambah_ortu()
    {
        $nama = $this->input->post('nama', true);
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $confirm_password = $this->input->post('confirm_password', true);
        if ($confirm_password == $password) {
            $cari_data = $this->M_admin->cari_username($username)->num_rows();
            // print_r($cari_data);die;
            if ($cari_data > 0) {
                $this->session->set_flashdata('notif', "Gagal");
                $this->session->set_flashdata('perintah', "Menambahkan Orang Tua");
                $this->session->set_flashdata('pesan', "Username $username Telah Digunakan");
                redirect('admin/data_user');
            } else {
                $data = [
                    'id_user' => '',
                    'nama' => $nama,
                    'username' => $username,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'id_role' => '3',
                    'foto' => 'default.svg',
                ];
                $this->M_admin->tambah_ortu($data);
                $detail = $this->M_admin->cari_username($username)->row();
                $id_user = $detail->id_user;
                $this->M_admin->tambah_ortu_detail($id_user);
                $this->session->set_flashdata('notif', "Berhasil");
                $this->session->set_flashdata('perintah', "Menambahkan Orang Tua");
                $this->session->set_flashdata('pesan', "Data Orang Tua Berhasil Ditambahkan");
                redirect('admin/data_user');
            }
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Menambahkan Orang Tua");
            $this->session->set_flashdata('pesan', "Password Harus Sama");
            redirect('admin/data_user');
        }
    }

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

    public function lihat_admin($id_user)
    {
        $id_user = $this->uri->segment(3);
        $data['judul'] = "Admin - Lihat Data";
        $username = $this->session->userdata('username');
        $data['active'] = ['', 'active', 'active', '', '', '', '', '', '', '', '', '', ''];
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['data_admin'] = $this->M_admin->cari_admin($id_user)->row();
        // print_r($data['data_admin']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/lihat_admin', $data);
        $this->load->view('templates/footer');
    }

    public function edit_guru($id_user)
    {
        $id_user = $this->uri->segment(3);
        $data['judul'] = "Admin - Edit Data Guru";
        $username = $this->session->userdata('username');
        $data['active'] = ['', 'active', 'active', '', '', '', '', '', '', '', '', '', ''];
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['data_guru'] = $this->M_admin->cari_guru($id_user)->row();
        // print_r($data['data_guru']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edit_guru', $data);
        $this->load->view('templates/footer');
    }

    function ubah_data_admin_guru()
    {
        $id_user = $this->input->post('id_user', true);
        $nama = $this->input->post('nama', true);
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $confirm_password = $this->input->post('password_confirm');
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
                        'username'  => $username,
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
                        'username'  => $username,
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
                $this->session->set_flashdata('perintah', "Mengubah Admin");
                $this->session->set_flashdata('pesan', "Gagal Mengubah Data Guru, Password Tidak Sama");
                redirect('admin/data_user');
            }
        } else {
            // jika password tidak diubah gambar diubah
            if ($_FILES['foto']['name']) {
                $data_user = [
                    'nama'      => $nama,
                    'username'  => $username,
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
                    'username'  => $username
                ];
                $data_detail = [
                    'alamat'    => $alamat,
                    'no_hp'     => $no_hp
                ];
            }
        }
        if ($data_user['foto']) {
            $udata = $this->M_admin->cari_username($username)->row();
            $nama_gambar = $udata->foto;
            if ($nama_gambar != 'default.svg') {
                $this->hapus_foto_profile($nama_gambar);
            }
        }
        // print_r($udata);
        // die;
        if ($this->M_admin->update_data($data_user, $id_user)) {
            // jika update guru update detail guru
            $this->M_admin->update_admin_guru_detail($data_detail, $id_user);
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Mengubah Guru");
            $this->session->set_flashdata('pesan', "Data Guru Berhasil Diubah");
            redirect('admin/data_user');
        } else {
            // jika gagal update
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Mengubah Guru");
            $this->session->set_flashdata('pesan', "Gagal Mengubah Data Guru.");
            redirect('admin/data_user');
        }
    }

    // update My Profile
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
                $this->session->set_flashdata('pesan', "Gagal Mengubah Profile, Password Tidak Sama");
                redirect('admin/my_profile');
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
            $udata = $this->M_admin->cari_admin($id_user)->row();
            $nama_gambar = $udata->foto;
            if ($nama_gambar != 'default.svg') {
                $this->hapus_foto_profile($nama_gambar);
            }
        }
        // print_r($nama_gambar);
        // die;
        if ($this->M_admin->update_data($data_user, $id_user)) {
            // jika update guru update detail guru
            $this->load->helper('updatesession');
            updateSession(['nama' => $data_user['nama']]);
            $this->M_admin->update_admin_guru_detail($data_detail, $id_user);
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Mengubah My Profile");
            $this->session->set_flashdata('pesan', "Data My Profile Berhasil Diubah");
            redirect('admin/my_profile');
        } else {
            // jika gagal update
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Mengubah My Profile");
            $this->session->set_flashdata('pesan', "Data My Profile Gagal Diubah.");
            redirect('admin/my_profile');
        }
    }

    function hapus_foto_profile($nama_gambar)
    {
        unlink('assets/img/profile/' . $nama_gambar);
    }

    function ubah_data_ortu()
    {
        $id_user = $this->input->post('id_user', true);
        $nama = $this->input->post('nama', true);
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $confirm_password = $this->input->post('password_confirm');
        $alamat = $this->input->post('alamat', true);
        $pekerjaan = $this->input->post('pekerjaan', true);
        $no_hp = $this->input->post('no_hp', true);

        if ($password != "") {
            // jika password diubah
            if ($password == $confirm_password) {
                // jika password sama
                if ($_FILES['foto']['name']) {
                    // jika gambar diubah password diubah
                    $data_user = [
                        'nama'      => $nama,
                        'username'  => $username,
                        'password'  => password_hash($password, PASSWORD_DEFAULT),
                        'foto'      => $this->upload_gambar_profile($this->input->post('nama'))
                    ];
                    $data_detail = [
                        'alamat'    => $alamat,
                        'pekerjaan' => $pekerjaan,
                        'no_hp'     => $no_hp
                    ];
                } else {
                    // jika gambar tidak diubah password diubah
                    $data_user = [
                        'nama'      => $nama,
                        'username'  => $username,
                        'password'  => password_hash($password, PASSWORD_DEFAULT)
                    ];
                    $data_detail = [
                        'alamat'    => $alamat,
                        'pekerjaan' => $pekerjaan,
                        'no_hp'     => $no_hp
                    ];
                }
            } else {
                // jika password beda
                $this->session->set_flashdata('notif', "Gagal");
                $this->session->set_flashdata('perintah', "Mengubah Orang Tua");
                $this->session->set_flashdata('pesan', "Gagal Mengubah Data Orang Tua. Password Tidak Sama");
                redirect('admin/data_user');
            }
        } else {
            // jika password tidak diubah gambar diubah
            if ($_FILES['foto']['name']) {
                $data_user = [
                    'nama'      => $nama,
                    'username'  => $username,
                    'foto'      => $this->upload_gambar_profile($this->input->post('nama'))
                ];
                $data_detail = [
                    'alamat'    => $alamat,
                    'pekerjaan' => $pekerjaan,
                    'no_hp'     => $no_hp
                ];
            } else {
                // jika password dan gambar tidak diubah
                $data_user = [
                    'nama'      => $nama,
                    'username'  => $username
                ];
                $data_detail = [
                    'alamat'    => $alamat,
                    'pekerjaan' => $pekerjaan,
                    'no_hp'     => $no_hp
                ];
            }
        }
        // print_r($data_user);
        // die;
        if ($data_user['foto']) {
            $udata = $this->M_admin->cari_username($username)->row();
            $nama_gambar = $udata->foto;
            if ($nama_gambar != 'default.svg') {
                $this->hapus_foto_profile($nama_gambar);
            }
        }

        if ($this->M_admin->update_data($data_user, $id_user)) {
            // jika update guru update detail guru
            $this->M_admin->update_ortu_detail($data_detail, $id_user);
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Mengubah Orang Tua");
            $this->session->set_flashdata('pesan', "Data Orang Tua Berhasil Diubah");
            redirect('admin/data_user');
        } else {
            // jika gagal update
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Mengubah Orang Tua");
            $this->session->set_flashdata('pesan', "Gagal Mengubah Data Orang Tua");
            redirect('admin/data_user');
        }
    }

    public function edit_ortu($id_user)
    {
        $id_user = $this->uri->segment(3);
        $data['judul'] = "Admin - Edit Data Orang Tua";
        $username = $this->session->userdata('username');
        $data['active'] = ['', 'active', 'active', '', '', '', '', '', '', '', '', '', ''];
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['data_ortu'] = $this->M_admin->cari_ortu($id_user)->row();
        // print_r($data['data_ortu']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edit_ortu', $data);
        $this->load->view('templates/footer');
    }

    public function hapus_admin($id_user)
    {
        $id_user = $this->uri->segment(3);
        $udata = $this->M_admin->cari_admin($id_user)->row();
        $nama_gambar = $udata->foto;
        if ($nama_gambar != 'default.svg') {
            $this->hapus_foto_profile($nama_gambar);
        }
        $this->M_admin->hapus_admin($id_user);
        $this->session->set_flashdata('notif', "Berhasil");
        $this->session->set_flashdata('perintah', "Hapus Admin");
        $this->session->set_flashdata('pesan', "Data Admin Berhasil Dihapus");
        redirect('admin/data_user');
    }

    public function hapus_guru($id_user)
    {
        $id_user = $this->uri->segment(3);
        $udata = $this->M_admin->cari_guru($id_user)->row();
        $nama_gambar = $udata->foto;
        if ($nama_gambar != 'default.svg') {
            $this->hapus_foto_profile($nama_gambar);
        }
        $this->M_admin->hapus_guru($id_user);
        $this->session->set_flashdata('notif', "Berhasil");
        $this->session->set_flashdata('perintah', "Hapus Guru");
        $this->session->set_flashdata('pesan', "Data Guru Berhasil Dihapus");
        redirect('admin/data_user');
    }

    public function hapus_ortu($id_user)
    {
        $id_user = $this->uri->segment(3);
        $udata = $this->M_admin->cari_ortu($id_user)->row();
        $nama_gambar = $udata->foto;
        if ($nama_gambar != 'default.svg') {
            $this->hapus_foto_profile($nama_gambar);
        }
        $this->M_admin->hapus_ortu($id_user);
        $this->session->set_flashdata('notif', "Berhasil");
        $this->session->set_flashdata('perintah', "Hapus Orang Tua");
        $this->session->set_flashdata('pesan', "Data Orang Tua Berhasil Dihapus");
        redirect('admin/data_user');
    }
    // End Menu Data User

    // Menu Peserta Didik
    public function peserta_didik()
    {
        $data['judul'] = "Admin - Peserta Didik";
        $username = $this->session->userdata('username');
        $data['active'] = ['', 'active', '', 'active', '', '', '', '', '', '', '', '', ''];
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['murid'] = $this->M_murid->tampil_murid()->result();
        $data['orang_tua'] = $this->M_admin->cari_ortu_semua()->result();
        $data['tahun_ajaran'] =  $this->M_murid->tahun_ajaran()->result();

        // print_r($data['tahun_ajaran']);
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/peserta_didik', $data);
        $this->load->view('templates/footer', $data);
    }

    function no_induk($id_tahun_ajaran)
    {
        $data = $this->M_murid->cari_tahun_ajaran($id_tahun_ajaran)->result();
        echo json_encode($data);
    }

    public function ubah_peserta($id_peserta)
    {
        $id_peserta = $this->uri->segment(3);
        $data['judul'] = "Admin - Edit Data Peserta Didik";
        $username = $this->session->userdata('username');
        $data['active'] = ['', 'active', '', 'active', '', '', '', '', '', '', '', '', ''];
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['murid'] = $this->M_murid->cari_peserta($id_peserta)->row();
        $data['orang_tua'] = $this->M_admin->cari_ortu_semua()->result();
        if ($data['murid']->jenis_kelamin == 'L') {
            $data['kelamin'] = ['selected', ''];
        } elseif ($data['murid']->jenis_kelamin == 'P') {
            $data['kelamin'] = ['', 'selected'];
        } else {
            $data['kelamin'] = ['', ''];
        }

        if ($data['murid']->status == 'Aktif') {
            $data['status'] = ['selected', ''];
        } elseif ($data['murid']->status == 'Tidak Aktif') {
            $data['status'] = ['', 'selected'];
        } else {
            $data['status'] = ['', ''];
        }

        if ($data['murid']->agama == 'Islam') {
            $data['agama'] = ['selected', '', '', ''];
        } elseif ($data['murid']->agama == 'Kristen') {
            $data['agama'] = ['', 'selected', '', ''];
        } elseif ($data['murid']->agama == 'Hindu') {
            $data['agama'] = ['', '', 'selected', ''];
        } elseif ($data['murid']->agama == 'Budha') {
            $data['agama'] = ['', '', '', 'selected'];
        } else {
            $data['agama'] = ['', '', '', '', ''];
        }

        // print_r($data['murid']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/ubah_peserta', $data);
        $this->load->view('templates/footer');
    }

    function tambah_peserta()
    {
        $no_induk = strtoupper($this->input->post('no_induk1', true)) . '/' . $this->input->post('no_induk2', true) . '/' . $this->input->post('no_induk3', true);
        $data = [
            'id_peserta'        => '',
            'no_induk'          => $no_induk,
            'nama_lengkap'      => $this->input->post('nama_lengkap', true),
            'nama_panggilan'    => $this->input->post('nama_panggilan', true),
            'jenis_kelamin'     => $this->input->post('jenis_kelamin', true),
            'agama'             => $this->input->post('agama', true),
            'tempat_lahir'      => $this->input->post('tempat_lahir', true),
            'tanggal_lahir'     => $this->input->post('tanggal_lahir', true),
            'anak_ke'           => $this->input->post('anak_ke', true),
            'id_user'           => $this->input->post('ortu', true),
            'status'            => 'Aktif',
            'id_tahun_ajaran'   => $this->input->post('tahun_ajaran', true)
        ];
        // print_r($data);
        // die;
        if ($this->M_murid->tambah_peserta($data)) {
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Tambah Data Peserta");
            $this->session->set_flashdata('pesan', "Data Peserta Didik Berhasil Ditambahkan");
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Ubah Data Peserta");
            $this->session->set_flashdata('pesan', "Data Peserta Didik Berhasil Gagal Ditambahkan");
        }
        redirect('admin/peserta_didik');
    }
    function edit_peserta()
    {
        $id_peserta = $this->input->post('id_peserta', true);
        $data = [
            'no_induk'          => $this->input->post('no_induk', true),
            'nama_lengkap'      => $this->input->post('nama_lengkap', true),
            'nama_panggilan'    => $this->input->post('nama_panggilan', true),
            'jenis_kelamin'     => $this->input->post('jenis_kelamin', true),
            'agama'             => $this->input->post('agama', true),
            'tempat_lahir'      => $this->input->post('tempat_lahir', true),
            'tanggal_lahir'     => $this->input->post('tanggal_lahir', true),
            'anak_ke'           => $this->input->post('anak_ke', true),
            'id_user'           => $this->input->post('ortu', true),
            'status'            => $this->input->post('status', true)
        ];
        // print_r($id_peserta);
        // die;
        if ($this->M_murid->edit_peserta($data, $id_peserta)) {
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Ubah Data Peserta");
            $this->session->set_flashdata('pesan', "Data Peserta Didik Berhasil Diubah");
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Ubah Data Peserta");
            $this->session->set_flashdata('pesan', "Data Peserta Didik Gagal Diubah");
        }
        redirect('admin/peserta_didik');
    }
    // End Menu Peserta Didik
    // Kompentensi Dasar
    public function kompetensi_dasar()
    {
        $data['judul'] = "Admin - Kompetensi Dasar";
        $username = $this->session->userdata('username');
        $data['active'] = ['', 'active', '', '', 'active', '', '', '', '', '', '', '', ''];
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['kompetensi_dasar'] = $this->M_penilaian->tampil_kompetensi_dasar()->result();
        $data['tampil_kompetensi_dasar'] = $this->M_penilaian->tampil_kompetensi_dasar_semua()->result();
        // print_r($data['tampil_kompetensi_dasar']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kompetensi_dasar', $data);
        $this->load->view('templates/footer');
    }

    function tampil_sub_kd($idkd)
    {
        $idKd = $this->uri->segment(3);
        $data = $this->M_penilaian->tampil_sub_kompetensi_dasar($idKd)->result();
        echo json_encode($data);
    }

    function tambah_kompetensi_dasar()
    {
        $kd = $this->input->post('kompetensi_dasar', true);
        $kd_tersimpan = $this->M_penilaian->cari_kompetensi_dasar($kd)->num_rows();
        // print_r($kd_tersimpan);
        // die;
        if ($kd_tersimpan->judul_kd > 0) {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Tambah Kompetensi Dasar");
            $this->session->set_flashdata('pesan', "Data Kompetensi Dasar Gagal Ditambahkan");
        } else {
            $data = ['id_kd' => '', 'judul_kd' => ucfirst($kd)];
            $this->M_penilaian->simpan_kompetensi_dasar($data);
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Tambah Kompetensi Dasar");
            $this->session->set_flashdata('pesan', "Data Kompetensi Dasar Behasil Ditambahkan");
        }
        redirect('admin/kompetensi_dasar');
    }

    function tambah_sub_kompetensi_dasar()
    {
        $kd = $this->input->post('kompetensi_dasar', true);
        $sub_kd = $this->input->post('sub_kompetensi_dasar', true);
        $sub_kd_tersimpan = $this->M_penilaian->cari_sub_kompetensi_dasar($sub_kd, $kd)->num_rows();
        // print_r($kd);
        // die;
        if ($sub_kd_tersimpan > 0) {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Tambah Sub Kompetensi Dasar");
            $this->session->set_flashdata('pesan', "Data Sub Kompetensi Dasar Gagal Ditambahkan");
        } else {
            $data = ['id_sub_kd' => '', 'judul_sub_kd' => ucfirst($sub_kd), 'id_kd' => $kd];
            $this->M_penilaian->simpan_sub_kompetensi_dasar($data);
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Tambah Sub Kompetensi Dasar");
            $this->session->set_flashdata('pesan', "Data Sub Kompetensi Dasar Behasil Ditambahkan");
        }
        redirect('admin/kompetensi_dasar');
    }

    function edit_kompetensi_dasar($id_kd)
    {
        $id_kd = $this->uri->segment(3);
        $judul_kd = $this->input->post('judul_kd', true);
        // print_r($id_kd);
        // die;
        if ($this->M_penilaian->edit_kd($id_kd, $judul_kd)) {
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Edit Kompetensi Dasar");
            $this->session->set_flashdata('pesan', "Data Kompetensi Dasar Behasil Diubah");
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Edit Kompetensi Dasar");
            $this->session->set_flashdata('pesan', "Data Kompetensi Dasar Gagal Diubah");
        }
        redirect('admin/kompetensi_dasar');
    }

    function edit_sub_kompetensi_dasar($id_sub_kd)
    {
        $id_sub_kd = $this->uri->segment(3);
        $judul_sub_kd = $this->input->post('judul_sub_kd', true);
        if ($this->M_penilaian->edit_sub_kd($id_sub_kd, $judul_sub_kd)) {
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Edit Sub Kompetensi Dasar");
            $this->session->set_flashdata('pesan', "Data Sub Kompetensi Dasar Behasil Diubah");
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Edit Sub Kompetensi Dasar");
            $this->session->set_flashdata('pesan', "Data Sub Kompetensi Dasar Gagal Diubah");
        }
        redirect('admin/kompetensi_dasar');
    }

    function hapus_kompetensi_dasar($id_kd)
    {
        $id_kd = $this->uri->segment(3);
        if ($this->M_penilaian->hapus_kd($id_kd)) {
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Edit Kompetensi Dasar");
            $this->session->set_flashdata('pesan', "Data Kompetensi Dasar Behasil Dihapus");
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Edit Kompetensi Dasar");
            $this->session->set_flashdata('pesan', "Data Kompetensi Dasar Gagal Dihapus");
        }
        redirect('admin/kompetensi_dasar');
    }

    function hapus_sub_kompetensi_dasar($id_sub_kd)
    {
        $id_sub_kd = $this->uri->segment(3);
        if ($this->M_penilaian->hapus_sub_kd($id_sub_kd)) {
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Edit Sub Kompetensi Dasar");
            $this->session->set_flashdata('pesan', "Data Sub Kompetensi Dasar Behasil Dihapus");
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Edit Sub Kompetensi Dasar");
            $this->session->set_flashdata('pesan', "Data Sub Kompetensi Dasar Gagal Dihapus");
        }
        redirect('admin/kompetensi_dasar');
    }
    // End Kompentensi Dasar

    // Pengaturan Sekolah
    // Profile Sekolah
    function profile_sekolah()
    {
        $data['judul'] = "Admin - Profile Sekolah";
        $username = $this->session->userdata('username');
        $data['active'] = ['', '', '', '', '', '', '', '', '', '', 'active', 'active', ''];
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['profile_sekolah'] = $this->M_sekolah->tampil_profile('1')->row();

        // print_r($data['tampil_kompetensi_dasar']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/profile_sekolah', $data);
        $this->load->view('templates/footer');
    }

    function edit_profile_sekolah()
    {
        $nama_sekolah = $this->input->post('nama_sekolah', true);
        $npsn = $this->input->post('npsn', true);
        $alamat = $this->input->post('alamat', true);
        $no_telp = $this->input->post('no_telp', true);
        $fax = $this->input->post('fax', true);
        $email_sekolah = $this->input->post('email_sekolah', true);
        $kepala_sekolah = $this->input->post('kepala_sekolah', true);
        $data = [
            'nama_sekolah'      => $nama_sekolah,
            'npsn'              => $npsn,
            'alamat'            => $alamat,
            'no_telp'           => $no_telp,
            'fax'               => $fax,
            'email_sekolah'     => $email_sekolah,
            'kepala_sekolah'    => $kepala_sekolah
        ];

        if ($this->M_sekolah->update_profile_sekolah($data)) {
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Ubah Profile Sekolah");
            $this->session->set_flashdata('pesan', "Profile Sekolah Behasil Diubah");
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Ubah Profile Sekolah");
            $this->session->set_flashdata('pesan', "Profile Sekolah Gagal Diubah");
        }
        redirect('admin/profile_sekolah');
    }

    // Semester
    function semester()
    {
        $data['judul'] = "Admin - Semester";
        $username = $this->session->userdata('username');
        $data['active'] = ['', '', '', '', '', '', '', '', '', '', 'active', '', 'active'];
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['tahun_ajaran'] = $this->M_sekolah->tampil_tahun_ajaran()->result();
        $data['tanggal'] = $this->M_sekolah->tampil_semester_akhir()->row();
        $data['tanggal_akhir'] = date('Y-m-d', strtotime('+5 months +14 days', strtotime($data['tanggal']->selesai)));
        $tahun_ajaran = $this->M_sekolah->tampil_tahun_ajaran_akhir()->row();
        $arr_tahun_ajaran = explode(' ', $tahun_ajaran->tahun_ajaran);
        $data['tahun_awal'] = $arr_tahun_ajaran[0] + 1;
        $data['tahun_akhir'] = $arr_tahun_ajaran[2] + 1;
        $data['semester'] = $this->M_sekolah->tampil_semester()->result();
        if ($data['tanggal']->semester == 2) {
            $data['disabled'] = '';
        } else {
            $data['disabled'] = 'disabled';
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/semester', $data);
        $this->load->view('templates/footer');
    }

    function tambah_tahun_ajaran()
    {
        $tahun_ajaran_mulai = $this->input->post('awal', true);
        $tahun_ajaran_selesai = $this->input->post('akhir', true);

        $data = [
            'id_tahun_ajaran'   => '',
            'tahun_ajaran'      => $tahun_ajaran_mulai . ' / ' . $tahun_ajaran_selesai
        ];

        if ($this->M_sekolah->tambah_tahun_ajaran($data)) {
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Tambah Tahun Ajaran");
            $this->session->set_flashdata('pesan', "Tahun Ajaran Behasil Ditambahkan");
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Tambah Tahun Ajaran");
            $this->session->set_flashdata('pesan', "Tahun Ajaran Gagal Ditambahkan");
        }
        redirect('admin/semester');
    }

    function tambah_semester()
    {
        $id_tahun_ajaran = $this->input->post('tahun_ajaran', true);
        $semester = $this->input->post('semester', true);
        $tanggal_mulai = $this->input->post('mulai', true);
        $tanggal_selesai = $this->input->post('akhir', true);

        $data = [
            'id_semester'       => '',
            'id_tahun_ajaran'   => $id_tahun_ajaran,
            'mulai'             => $tanggal_mulai,
            'selesai'           => $tanggal_selesai,
            'semester'          => $semester
        ];
        if ($this->M_sekolah->tambah_semester($data)) {
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Tambah Semester");
            $this->session->set_flashdata('pesan', "Semester Behasil Ditambahkan");
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Tambah Semester");
            $this->session->set_flashdata('pesan', "Semester Gagal Ditambahkan");
        }
        redirect('admin/semester');
    }

    function tampil_semester_dipilih($id_tahun_ajaran)
    {
        $id_tahun_ajaran = $this->uri->segment(3);
        $data = $this->M_sekolah->tampil_tahun_ajaran_dipilih($id_tahun_ajaran)->result();
        echo json_encode($data);
    }
    // End Pengaturan Sekolah

    // Penilaian Harian
    function penilaian_harian()
    {
        $data['judul'] = "Admin - Penilaian Harian";
        $username = $this->session->userdata('username');
        $data['active'] = ['', '', '', '', '', 'active', '', '', '', '', '', '', ''];
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['nilai'] = $this->M_penilaian->tampil_detail_nilai()->result();
        $data['catatan_harian'] = $this->M_penilaian->tampil_catatan_harian()->result();

        // print_r($data['nilai']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/penilaian_harian', $data);
        $this->load->view('templates/footer');
    }
    // End Penilaian Harian

    // Catatan Perkembangan
    function nilai_emosi()
    {
        $data['judul'] = "Admin - Catatan Perkembangan - Nilai Emosi";
        $username = $this->session->userdata('username');
        $data['active'] = ['', '', '', '', '', '', 'active', 'active', '', '', '', '', ''];
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['tampil_semester'] = $this->M_sekolah->tampil_semester()->result();

        // print_r($data['tampil_semester']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/catatan_emosi', $data);
        $this->load->view('templates/footer');
    }

    function nilai_emosi_peserta($id_semester)
    {
        $id_semester = $this->uri->segment(3);
        $data = $this->M_penilaian->tampil_emosi($id_semester)->result();
        // print_r($data);
        // die;
        echo json_encode($data);
    }

    function nilai_kesehatan_peserta($id_semester)
    {
        $id_semester = $this->uri->segment(3);
        $data = $this->M_penilaian->tampil_kesehatan($id_semester)->result();
        // print_r($data);
        // die;
        echo json_encode($data);
    }

    function nilai_kesehatan()
    {
        $data['judul'] = "Admin - Catatan Perkembangan - Nilai Kesehatan dan Jasmani";
        $username = $this->session->userdata('username');
        $data['active'] = ['', '', '', '', '', '', 'active', '', 'active', '', '', '', ''];
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['tampil_semester'] = $this->M_sekolah->tampil_semester()->result();

        // print_r($data['tampil_kompetensi_dasar']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/catatan_kesehatan', $data);
        $this->load->view('templates/footer');
    }
    // End Catatan Perkembangan

    // Cetak Laporan
    function cetak_laporan()
    {
        $data['judul'] = "Admin - Cetak Laporan";
        $username = $this->session->userdata('username');
        $data['active'] = ['', '', '', '', '', '', '', '', '', 'active', '', '', ''];
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();

        // print_r($data['tampil_kompetensi_dasar']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/cetak_laporan', $data);
        $this->load->view('templates/footer');
    }
    // End Cetak Laporan
}
