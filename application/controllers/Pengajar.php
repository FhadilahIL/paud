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
        $this->load->model('M_sekolah');
        $this->load->model('M_penilaian');
    }

    public function index()
    {
        $data['judul'] = "Guru - Dashboard";
        $username = $this->session->userdata('username');
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['active'] = ['active', '', '', '', '', '', ''];

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
        $data['active'] = ['', '', '', '', '', '', ''];

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
        $data['active'] = ['', 'active', '', '', '', '', ''];
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
        $data['active'] = ['', '', 'active', '', '', '', ''];
        $data['kompetensi_dasar'] = $this->M_penilaian->tampil_kompetensi_dasar()->result();
        $data['tampil_kompetensi_dasar'] = $this->M_penilaian->tampil_kompetensi_dasar_semua()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_guru', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengajar/kompetensi_dasar');
        $this->load->view('templates/footer');
    }
    // End Kompetensi Dasar

    // Perkembangan Emosi
    function nilai_emosi()
    {
        $data['judul'] = "Guru - Catatan Perkembangan Emosi";
        $username = $this->session->userdata('username');
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['active'] = ['', '', '', '', 'active', '', ''];
        $data['tampil_semester'] = $this->M_sekolah->tampil_semester()->result();
        $data['tampil_peserta'] = $this->M_murid->tampil_murid()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_guru', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengajar/perkembangan_emosi');
        $this->load->view('templates/footer');
    }

    function nilai_emosi_semester($id_semester)
    {
        $id_semester = $this->uri->segment(3);
        $data = $this->M_penilaian->tampil_emosi_guru($id_semester)->result();
        echo json_encode($data);
    }

    function tampil_keterangan_emosi($id_peserta, $id_semester)
    {
        $id_peserta = $this->uri->segment(3);
        $id_semester = $this->uri->segment(4);
        $data = $this->M_murid->tampil_keterangan_emosi($id_peserta, $id_semester)->row();
        echo json_encode($data);
    }
    // End Perkembangan Emosi

    // Perkembangan Kesehatan
    function nilai_kesehatan()
    {
        $data['judul'] = "Guru - Catatan Perkembangan Kesehatan";
        $username = $this->session->userdata('username');
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['active'] = ['', '', '', '', '', 'active', ''];
        $data['tampil_semester'] = $this->M_sekolah->tampil_semester()->result();
        $data['tampil_peserta'] = $this->M_murid->tampil_murid()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_guru', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengajar/perkembangan_kesehatan');
        $this->load->view('templates/footer');
    }

    function nilai_kesehatan_semester($id_semester)
    {
        $id_semester = $this->uri->segment(3);
        $data = $this->M_penilaian->tampil_kesehatan_guru($id_semester)->result();
        echo json_encode($data);
    }

    function tampil_keterangan_kesehatan($id_peserta, $id_semester)
    {
        $id_peserta = $this->uri->segment(3);
        $id_semester = $this->uri->segment(4);
        $data = $this->M_murid->tampil_keterangan_kesehatan($id_peserta, $id_semester)->row();
        echo json_encode($data);
    }

    function simpan_kesehatan()
    {
        $id_peserta = $this->input->post('id_peserta');
        $id_semester = $this->input->post('id_semester');

        $data = [
            'mata'          => $this->input->post('mata'),
            'mulut'         => $this->input->post('mulut'),
            'gigi'          => $this->input->post('gigi'),
            'telinga'       => $this->input->post('telinga'),
            'hidung'        => $this->input->post('hidung'),
            'anggota_badan' => $this->input->post('anggota_badan'),
            'berat_badan'   => $this->input->post('berat_badan'),
            'tinggi_badan'  => $this->input->post('tinggi_badan'),
            'id_peserta'    => $id_peserta,
            'id_semester'   => $id_semester
        ];

        if ($this->M_penilaian->simpan_kesehatan($data)) {
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Menilai Kesehatan Peserta");
            $this->session->set_flashdata('pesan', "Data Nilai Kesehatan Berhasil Ditambahkan");
            redirect('pengajar/nilai_kesehatan');
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Menilai Kesehatan Peserta");
            $this->session->set_flashdata('pesan', "Data Nilai Kesehatan Gagal Ditambahkan");
            redirect('pengajar/nilai_kesehatan');
        }
    }

    function simpan_emosi()
    {
        $id_peserta = $this->input->post('id_peserta');
        $id_semester = $this->input->post('id_semester');

        $data = [
            'menangis'      => $this->input->post('menangis'),
            'memukul'       => $this->input->post('memukul'),
            'marah'         => $this->input->post('marah'),
            'diam'          => $this->input->post('diam'),
            'melamun'       => $this->input->post('melamun'),
            'gembira'       => $this->input->post('gembira'),
            'id_peserta'    => $id_peserta,
            'id_semester'   => $id_semester
        ];

        if ($this->M_penilaian->simpan_emosi($data)) {
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Menilai Emosi Peserta");
            $this->session->set_flashdata('pesan', "Data Nilai Emosi Berhasil Ditambahkan");
            redirect('pengajar/nilai_emosi');
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Menilai Emosi Peserta");
            $this->session->set_flashdata('pesan', "Data Nilai Emosi Gagal Ditambahkan");
            redirect('pengajar/nilai_emosi');
        }
    }

    function ubah_nilai_kesehatan($id_peserta, $id_semester)
    {
        $id_peserta = $this->uri->segment(3);
        $id_semester = $this->uri->segment(4);
        $data['judul'] = "Guru - Ubah Catatan Perkembangan Kesehatan";
        $username = $this->session->userdata('username');
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['active'] = ['', '', '', '', '', 'active', ''];
        $data['nilai_kesehatan'] = $this->M_penilaian->tampil_nilai_kesehatan($id_peserta, $id_semester)->row();

        if ($data['nilai_kesehatan']->mata == "Baik") {
            $data['mata'] = ['selected', '', ''];
        } else if ($data['nilai_kesehatan']->mata == "Cukup") {
            $data['mata'] = ['', 'selected', ''];
        } else if ($data['nilai_kesehatan']->mata == "Kurang") {
            $data['mata'] = ['', '', 'selected'];
        } else {
            $data['mata'] = ['', '', ''];
        }

        if ($data['nilai_kesehatan']->mulut == "Baik") {
            $data['mulut'] = ['selected', '', ''];
        } else if ($data['nilai_kesehatan']->mulut == "Cukup") {
            $data['mulut'] = ['', 'selected', ''];
        } else if ($data['nilai_kesehatan']->mulut == "Kurang") {
            $data['mulut'] = ['', '', 'selected'];
        } else {
            $data['mulut'] = ['', '', ''];
        }

        if ($data['nilai_kesehatan']->gigi == "Baik") {
            $data['gigi'] = ['selected', '', ''];
        } else if ($data['nilai_kesehatan']->gigi == "Cukup") {
            $data['gigi'] = ['', 'selected', ''];
        } else if ($data['nilai_kesehatan']->gigi == "Kurang") {
            $data['gigi'] = ['', '', 'selected'];
        } else {
            $data['gigi'] = ['', '', ''];
        }

        if ($data['nilai_kesehatan']->telinga == "Baik") {
            $data['telinga'] = ['selected', '', ''];
        } else if ($data['nilai_kesehatan']->telinga == "Cukup") {
            $data['telinga'] = ['', 'selected', ''];
        } else if ($data['nilai_kesehatan']->telinga == "Kurang") {
            $data['telinga'] = ['', '', 'selected'];
        } else {
            $data['telinga'] = ['', '', ''];
        }

        if ($data['nilai_kesehatan']->hidung == "Baik") {
            $data['hidung'] = ['selected', '', ''];
        } else if ($data['nilai_kesehatan']->hidung == "Cukup") {
            $data['hidung'] = ['', 'selected', ''];
        } else if ($data['nilai_kesehatan']->hidung == "Kurang") {
            $data['hidung'] = ['', '', 'selected'];
        } else {
            $data['hidung'] = ['', '', ''];
        }

        if ($data['nilai_kesehatan']->anggota_badan == "Baik") {
            $data['anggota_badan'] = ['selected', '', ''];
        } else if ($data['nilai_kesehatan']->anggota_badan == "Cukup") {
            $data['anggota_badan'] = ['', 'selected', ''];
        } else if ($data['nilai_kesehatan']->anggota_badan == "Kurang") {
            $data['anggota_badan'] = ['', '', 'selected'];
        } else {
            $data['selected'] = ['', '', ''];
        }
        $data['id_peserta_didik'] = $id_peserta;
        $data['id_semester'] = $id_semester;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_guru', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengajar/ubah_nilai_kesehatan');
        $this->load->view('templates/footer');
    }

    function ubah_nilai_emosi($id_peserta, $id_semester)
    {
        $id_peserta = $this->uri->segment(3);
        $id_semester = $this->uri->segment(4);
        $data['judul'] = "Guru - Ubah Catatan Perkembangan Emosi";
        $username = $this->session->userdata('username');
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['active'] = ['', '', '', '', 'active', '', ''];
        $data['nilai_emosi'] = $this->M_penilaian->tampil_nilai_emosi($id_peserta, $id_semester)->row();

        if ($data['nilai_emosi']->menangis == "Tidak Pernah") {
            $data['menangis'] = ['selected', '', ''];
        } else if ($data['nilai_emosi']->menangis == "Kadang") {
            $data['menangis'] = ['', 'selected', ''];
        } else if ($data['nilai_emosi']->menangis == "Sering") {
            $data['menangis'] = ['', '', 'selected'];
        } else {
            $data['menangis'] = ['', '', ''];
        }

        if ($data['nilai_emosi']->memukul == "Tidak Pernah") {
            $data['memukul'] = ['selected', '', ''];
        } else if ($data['nilai_emosi']->memukul == "Kadang") {
            $data['memukul'] = ['', 'selected', ''];
        } else if ($data['nilai_emosi']->memukul == "Sering") {
            $data['memukul'] = ['', '', 'selected'];
        } else {
            $data['memukul'] = ['', '', ''];
        }

        if ($data['nilai_emosi']->memukul == "Tidak Pernah") {
            $data['memukul'] = ['selected', '', ''];
        } else if ($data['nilai_emosi']->memukul == "Kadang") {
            $data['memukul'] = ['', 'selected', ''];
        } else if ($data['nilai_emosi']->memukul == "Sering") {
            $data['memukul'] = ['', '', 'selected'];
        } else {
            $data['memukul'] = ['', '', ''];
        }

        if ($data['nilai_emosi']->marah == "Tidak Pernah") {
            $data['marah'] = ['selected', '', ''];
        } else if ($data['nilai_emosi']->marah == "Kadang") {
            $data['marah'] = ['', 'selected', ''];
        } else if ($data['nilai_emosi']->marah == "Sering") {
            $data['marah'] = ['', '', 'selected'];
        } else {
            $data['marah'] = ['', '', ''];
        }

        if ($data['nilai_emosi']->diam == "Tidak Pernah") {
            $data['diam'] = ['selected', '', ''];
        } else if ($data['nilai_emosi']->diam == "Kadang") {
            $data['diam'] = ['', 'selected', ''];
        } else if ($data['nilai_emosi']->diam == "Sering") {
            $data['diam'] = ['', '', 'selected'];
        } else {
            $data['diam'] = ['', '', ''];
        }

        if ($data['nilai_emosi']->melamun == "Tidak Pernah") {
            $data['melamun'] = ['selected', '', ''];
        } else if ($data['nilai_emosi']->melamun == "Kadang") {
            $data['melamun'] = ['', 'selected', ''];
        } else if ($data['nilai_emosi']->melamun == "Sering") {
            $data['melamun'] = ['', '', 'selected'];
        } else {
            $data['melamun'] = ['', '', ''];
        }

        if ($data['nilai_emosi']->gembira == "Tidak Pernah") {
            $data['gembira'] = ['selected', '', ''];
        } else if ($data['nilai_emosi']->gembira == "Kadang") {
            $data['gembira'] = ['', 'selected', ''];
        } else if ($data['nilai_emosi']->gembira == "Sering") {
            $data['gembira'] = ['', '', 'selected'];
        } else {
            $data['gembira'] = ['', '', ''];
        }

        $data['id_peserta_didik'] = $id_peserta;
        $data['id_semester'] = $id_semester;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_guru', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengajar/ubah_nilai_emosi');
        $this->load->view('templates/footer');
    }

    function update_nilai_kesehatan()
    {
        $id_peserta_didik = $this->input->post('id_peserta_didik');
        $id_semester = $this->input->post('id_semester');
        $data = [
            'mata'          => $this->input->post('mata'),
            'mulut'         => $this->input->post('mulut'),
            'gigi'          => $this->input->post('gigi'),
            'telinga'       => $this->input->post('telinga'),
            'hidung'        => $this->input->post('hidung'),
            'anggota_badan' => $this->input->post('anggota_badan'),
            'berat_badan'   => $this->input->post('berat_badan'),
            'tinggi_badan'  => $this->input->post('tinggi_badan')
        ];

        if ($this->M_penilaian->update_nilai_kesehatan($data, $id_peserta_didik, $id_semester)) {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Menilai Kesehatan Peserta");
            $this->session->set_flashdata('pesan', "Data Nilai Kesehatan Gagal Diubah");
            redirect('pengajar/nilai_kesehatan');
        } else {
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Menilai Kesehatan Peserta");
            $this->session->set_flashdata('pesan', "Data Nilai Kesehatan Berhasil Diubah");
            redirect('pengajar/nilai_kesehatan');
        }
    }

    function update_nilai_emosi()
    {
        $id_peserta_didik = $this->input->post('id_peserta_didik');
        $id_semester = $this->input->post('id_semester');
        $data = [
            'menangis'  => $this->input->post('menangis'),
            'memukul'   => $this->input->post('memukul'),
            'marah'     => $this->input->post('marah'),
            'diam'      => $this->input->post('diam'),
            'melamun'   => $this->input->post('melamun'),
            'gembira'   => $this->input->post('gembira')
        ];

        if ($this->M_penilaian->update_nilai_emosi($data, $id_peserta_didik, $id_semester)) {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Menilai Emosi Peserta");
            $this->session->set_flashdata('pesan', "Data Nilai Emosi Gagal Diubah");
            redirect('pengajar/nilai_emosi');
        } else {
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Menilai Emosi Peserta");
            $this->session->set_flashdata('pesan', "Data Nilai Emosi Berhasil Diubah");
            redirect('pengajar/nilai_emosi');
        }
    }
    // End Perkembangan Kesehatan

    // Penilaian Harian
    function nilai_harian()
    {
        $data['judul'] = "Guru - Penilaian Harian";
        $username = $this->session->userdata('username');
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['active'] = ['', '', '', 'active', '', '', ''];
        $data['nilai_semua'] = $this->M_penilaian->tampil_detail_nilai()->result();
        $data['tampil_peserta'] = $this->M_murid->tampil_murid()->result();
        $data['kompetensi_dasar'] = $this->M_penilaian->tampil_kompetensi_dasar()->result();
        $data['tampil_kompetensi_dasar'] = $this->M_penilaian->tampil_kompetensi_dasar_semua()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_guru', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengajar/penilaian_harian');
        $this->load->view('templates/footer');
    }

    function tampil_nilai($tanggal_nilai)
    {
        $tanggal_nilai = $this->uri->segment(3);
        $data = $this->M_penilaian->tampil_penilaian_harian($tanggal_nilai)->result();
        echo json_encode($data);
    }

    function tampil_catatan($tanggal_nilai)
    {
        $tanggal_nilai = $this->uri->segment(3);
        $data = $this->M_penilaian->tampil_catatan_harian_tanggal($tanggal_nilai)->result();
        echo json_encode($data);
    }

    function tambah_penilaian_harian()
    {
        $tanggal_penilaian = $this->input->post('tanggal_penilaian', true);
        $id_peserta = $this->input->post('peserta_didik1', true);
        $id_sub_kd = $this->input->post('sub_kompetensi_dasar', true);
        $data = [
            'id_peserta'        => $id_peserta,
            'id_sub_kd'         => $id_sub_kd,
            'nilai_checklist'   => $this->input->post('nilai_checklist', true),
            'nilai_karya'       => $this->input->post('nilai_karya', true),
            'tanggal_penilaian' => $tanggal_penilaian
        ];
        $cari_nilai = $this->M_penilaian->cari_nilai_harian($id_peserta, $id_sub_kd, $tanggal_penilaian)->row();
        if ($cari_nilai) {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Tambah Nilai Harian");
            $this->session->set_flashdata('pesan', "Data Nilai Harian Sudah Ada");
            redirect('pengajar/nilai_harian');
        } else {
            if ($this->M_penilaian->tambah_penilaian_harian($data)) {
                $this->session->set_flashdata('notif', "Berhasil");
                $this->session->set_flashdata('perintah', "Tambah Nilai Harian");
                $this->session->set_flashdata('pesan', "Data Nilai Harian Berhasil Ditambahkan");
                redirect('pengajar/nilai_harian');
            } else {
                $this->session->set_flashdata('notif', "Gagal");
                $this->session->set_flashdata('perintah', "Tambah Nilai Harian");
                $this->session->set_flashdata('pesan', "Data Nilai Harian Gagal Ditambahkan");
                redirect('pengajar/nilai_harian');
            }
        }
    }

    function ubah_nilai_harian($id_peserta, $tanggal_nilai)
    {
        $id_peserta = $this->uri->segment(3);
        $tanggal_nilai = $this->uri->segment(4);
        $data['judul'] = "Guru - Ubah Penilaian Harian";
        $username = $this->session->userdata('username');
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['active'] = ['', '', '', 'active', '', '', ''];
        $data['nilai_harian'] = $this->M_penilaian->tampil_penilaian_peserta($id_peserta, $tanggal_nilai)->row();

        if ($data['nilai_harian']->nilai_checklist == "Belum Berkembang") {
            $data['nilai_checklist'] = ['selected', '', '', ''];
        } else if ($data['nilai_harian']->nilai_checklist == "Mulai Berkembang") {
            $data['nilai_checklist'] = ['', 'selected', '', ''];
        } else if ($data['nilai_harian']->nilai_checklist == "Berkembang Sesuai Harapan") {
            $data['nilai_checklist'] = ['', '', 'selected', ''];
        } else if ($data['nilai_harian']->nilai_checklist == "Berkembang Sangat Baik") {
            $data['nilai_checklist'] = ['', '', '', 'selected'];
        } else {
            $data['nilai_checklist'] = ['', '', '', ''];
        }

        if ($data['nilai_harian']->nilai_karya == "Belum Berkembang") {
            $data['nilai_karya'] = ['selected', '', '', ''];
        } else if ($data['nilai_harian']->nilai_karya == "Mulai Berkembang") {
            $data['nilai_karya'] = ['', 'selected', '', ''];
        } else if ($data['nilai_harian']->nilai_karya == "Berkembang Sesuai Harapan") {
            $data['nilai_karya'] = ['', '', 'selected', ''];
        } else if ($data['nilai_harian']->nilai_karya == "Berkembang Sangat Baik") {
            $data['nilai_karya'] = ['', '', '', 'selected'];
        } else {
            $data['nilai_karya'] = ['', '', '', ''];
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_guru', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengajar/ubah_nilai_harian');
        $this->load->view('templates/footer');
    }

    function ubah_catatan_harian($id_peserta, $tanggal_nilai)
    {
        $id_peserta = $this->uri->segment(3);
        $tanggal_nilai = $this->uri->segment(4);
        $data['judul'] = "Guru - Ubah Catatan Harian";
        $username = $this->session->userdata('username');
        $data['user'] = $this->M_user->cari_user_admin_guru($username)->row();
        $data['active'] = ['', '', '', 'active', '', '', ''];
        $data['nilai_harian'] = $this->M_penilaian->tampil_catatan_peserta($id_peserta, $tanggal_nilai)->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_guru', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengajar/ubah_catatan_harian');
        $this->load->view('templates/footer');
    }

    function update_nilai_harian()
    {
        $id_peserta = $this->input->post('id_peserta_didik', true);
        $id_sub_kd = $this->input->post('id_sub_kd', true);
        $data = [
            'nilai_checklist'   => $this->input->post('nilai_checklist', true),
            'nilai_karya'       => $this->input->post('nilai_karya', true)
        ];
        if ($this->M_penilaian->update_nilai_harian($id_peserta, $id_sub_kd, $data)) {
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Update Nilai Harian");
            $this->session->set_flashdata('pesan', "Data Nilai Harian Berhasil Diubah");
            redirect('pengajar/nilai_harian');
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Update Nilai Harian");
            $this->session->set_flashdata('pesan', "Data Nilai Harian Gagal Diubah");
            redirect('pengajar/nilai_harian');
        }
    }

    function update_catatan_harian()
    {
        $id_peserta = $this->input->post('id_peserta_didik', true);
        $tanggal = $this->input->post('tanggal_catatan', true);
        $data = [
            'catatan'   => $this->input->post('catatan_harian', true)
        ];
        if ($this->M_penilaian->update_catatan_harian($id_peserta, $tanggal, $data)) {
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Update Nilai Harian");
            $this->session->set_flashdata('pesan', "Data Catatan Harian Berhasil Diubah");
            redirect('pengajar/nilai_harian');
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Update Nilai Harian");
            $this->session->set_flashdata('pesan', "Data Catatan Harian Gagal Diubah");
            redirect('pengajar/nilai_harian');
        }
    }

    function tambah_catatan_harian()
    {
    }
    // End Penilaian Harian
}
