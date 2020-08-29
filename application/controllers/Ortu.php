<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ortu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_role') != 3) {
            redirect('auth/cek_session');
        }
        $this->load->model('M_user');
        $this->load->model('M_ortu');
        $this->load->model('M_murid');
        $this->load->model('M_sekolah');
        $this->load->model('M_penilaian');
    }

    // Dashboard
    public function index()
    {
        $data['judul'] = "Orang Tua - Dashboard";
        $username = $this->session->userdata('username');
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        // print_r($data['user']);
        $data['active'] = ['active', '', '', '', '', ''];
        $data['peserta_didik'] = $this->M_murid->tampil_anak($this->session->userdata('id_user'))->num_rows();
        $data['sekolah'] = $this->M_sekolah->tampil_profile()->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_ortu');
        $this->load->view('templates/topbar');
        $this->load->view('orang_tua/index');
        $this->load->view('templates/footer');
    }
    // End Dashboard

    // My Profile
    public function my_profile()
    {
        $data['judul'] = "Orang Tua - My Profile";
        $username = $this->session->userdata('username');
        $data['user'] = $this->M_user->cari_user_ortu($username)->row();
        // print_r($data['user']);
        // die;
        $data['active'] = ['', '', '', '', '', ''];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_ortu');
        $this->load->view('templates/topbar');
        $this->load->view('orang_tua/my_profile');
        $this->load->view('templates/footer');
    }

    function update_my()
    {
        $id_user = $this->input->post('id_user', true);
        $nama = $this->input->post('nama', true);
        $password = $this->input->post('password', true);
        $confirm_password = $this->input->post('confirm_password');
        $pekerjaan = $this->input->post('pekerjaan', true);
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
                        'no_hp'     => $no_hp,
                        'pekerjaan' => $pekerjaan
                    ];
                } else {
                    // jika gambar tidak diubah password diubah
                    $data_user = [
                        'nama'      => $nama,
                        'password'  => password_hash($password, PASSWORD_DEFAULT)
                    ];
                    $data_detail = [
                        'alamat'    => $alamat,
                        'no_hp'     => $no_hp,
                        'pekerjaan' => $pekerjaan
                    ];
                }
            } else {
                // jika password beda
                $this->session->set_flashdata('notif', "Gagal");
                $this->session->set_flashdata('perintah', "Mengubah My Profile");
                $this->session->set_flashdata('pesan', "Gagal Mengubah Profile, Password Tidak Sama");
                redirect('ortu/my_profile');
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
                    'no_hp'     => $no_hp,
                    'pekerjaan' => $pekerjaan
                ];
            } else {
                // jika password dan gambar tidak diubah
                $data_user = [
                    'nama'      => $nama,
                ];
                $data_detail = [
                    'alamat'    => $alamat,
                    'no_hp'     => $no_hp,
                    'pekerjaan' => $pekerjaan
                ];
            }
        }
        if ($data_user['foto']) {
            $udata = $this->M_ortu->cari_ortu($id_user)->row();
            $nama_gambar = $udata->foto;
            if ($nama_gambar != 'default.svg') {
                $this->hapus_foto_profile($nama_gambar);
            }
        }
        // print_r($nama_gambar);
        // die;
        if ($this->M_ortu->update_data($data_user, $id_user)) {
            // jika update guru update detail guru
            $this->M_ortu->update_ortu_detail($data_detail, $id_user);
            $this->load->helper('updatesession');
            updateSession(['nama' => $data_user['nama']]);
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Mengubah My Profile");
            $this->session->set_flashdata('pesan', "Data My Profile Berhasil Diubah");
            redirect('ortu/my_profile');
        } else {
            // jika gagal update
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Mengubah My Profile");
            $this->session->set_flashdata('pesan', "Data My Profile Gagal Diubah.");
            redirect('ortu/my_profile');
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

    // Peserta Didik
    function peserta_didik()
    {
        $data['judul'] = "Orang Tua - Peserta Didik";
        $username = $this->session->userdata('username');
        $id_user = $this->session->userdata('id_user');
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['murid'] = $this->M_murid->tampil_anak($id_user)->result();
        // print_r($data['murid']);
        // die;
        $data['active'] = ['', 'active', '', '', '', ''];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_ortu');
        $this->load->view('templates/topbar');
        $this->load->view('orang_tua/peserta_didik');
        $this->load->view('templates/footer');
    }

    function lihat_peserta($id_peserta_didik)
    {
        $id_peserta_didik = $this->uri->segment(3);
        $data['judul'] = "Orang Tua - Peserta Didik";
        $username = $this->session->userdata('username');
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['active'] = ['', 'active', '', '', '', ''];

        $data['murid'] = $this->M_murid->cari_peserta($id_peserta_didik)->row();

        if ($data['murid']->jenis_kelamin == 'L') {
            $data['kelamin'] = "Laki - Laki";
        } elseif ($data['murid']->jenis_kelamin == 'P') {
            $data['kelamin'] = "Perempuan";
        } else {
            $data['kelamin'] = "-";
        }

        // print_r($data['murid']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_ortu');
        $this->load->view('templates/topbar');
        $this->load->view('orang_tua/lihat_peserta');
        $this->load->view('templates/footer');
    }
    // End Peserta Didik

    // Penilaian Harian
    function penilaian_harian()
    {
        $data['judul'] = "Orang Tua - Penilaian Harian";
        $username = $this->session->userdata('username');
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['nilai'] = $this->M_penilaian->tampil_detail_nilai()->result();
        $data['catatan_harian'] = $this->M_penilaian->tampil_catatan_harian()->result();
        // print_r($data['murid']);
        // die;
        $data['active'] = ['', '', 'active', '', '', ''];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_ortu');
        $this->load->view('templates/topbar');
        $this->load->view('orang_tua/penilaian_harian');
        $this->load->view('templates/footer');
    }
    // End Penilaian Harian

    // Catatan Perkembangan
    function nilai_emosi()
    {
        $data['judul'] = "Orang Tua - Catatan Perkembangan Emosi";
        $username = $this->session->userdata('username');
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $id_user = $this->session->userdata('id_user');
        $data['tampil_peserta'] = $this->M_murid->tampil_anak($id_user)->result();
        // print_r($data['murid']);
        // die;
        $data['active'] = ['', '', '', 'active', 'active', ''];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_ortu');
        $this->load->view('templates/topbar');
        $this->load->view('orang_tua/nilai_emosi');
        $this->load->view('templates/footer');
    }

    function nilai_kesehatan()
    {
        $data['judul'] = "Orang Tua - Catatan Perkembangan Kesehatan";
        $username = $this->session->userdata('username');
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $id_user = $this->session->userdata('id_user');
        $data['tampil_peserta'] = $this->M_murid->tampil_anak($id_user)->result();
        // print_r($data['murid']);
        // die;
        $data['active'] = ['', '', '', 'active', '', 'active'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_ortu');
        $this->load->view('templates/topbar');
        $this->load->view('orang_tua/nilai_kesehatan');
        $this->load->view('templates/footer');
    }

    function nilai_emosi_peserta($id_peserta)
    {
        $id_peserta = $this->uri->segment(3);
        $data = $this->M_penilaian->tampil_emosi_ortu($id_peserta)->result();
        echo json_encode($data);
    }

    function nilai_kesehatan_peserta($id_peserta)
    {
        $id_peserta = $this->uri->segment(3);
        $data = $this->M_penilaian->tampil_kesehatan_ortu($id_peserta)->result();
        echo json_encode($data);
    }
    // End Catatan Perkembangan
}
