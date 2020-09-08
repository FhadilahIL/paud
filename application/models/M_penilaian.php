<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penilaian extends CI_Model
{
    function tampil_kompetensi_dasar()
    {
        return $this->db->get('tb_kompetensi_dasar');
    }

    function tampil_sub_kompetensi_dasar($id_kd)
    {
        $this->db->where('id_kd', $id_kd);
        return $this->db->get('tb_sub_kompetensi_dasar');
    }

    function tampil_kompetensi_dasar_semua()
    {
        $this->db->select('tb_kompetensi_dasar.id_kd, judul_kd, id_sub_kd, judul_sub_kd');
        $this->db->join('tb_sub_kompetensi_dasar', 'tb_sub_kompetensi_dasar.id_kd = tb_kompetensi_dasar.id_kd', 'left');
        $this->db->order_by('tb_kompetensi_dasar.id_kd', 'ASC');
        return $this->db->get('tb_kompetensi_dasar');
    }

    function cari_kompetensi_dasar($kd)
    {
        $this->db->where('judul_kd', $kd);
        return $this->db->get('tb_kompetensi_dasar');
    }

    function cari_sub_kompetensi_dasar($sub_kd, $kd)
    {
        $this->db->where('judul_sub_kd', $sub_kd);
        $this->db->where('id_kd', $kd);
        return $this->db->get('tb_sub_kompetensi_dasar');
    }

    function simpan_kompetensi_dasar($data)
    {
        return $this->db->insert('tb_kompetensi_dasar', $data);
    }

    function simpan_sub_kompetensi_dasar($data)
    {
        return $this->db->insert('tb_sub_kompetensi_dasar', $data);
    }
    function edit_kd($id_kd, $judul_kd)
    {
        $this->db->set('judul_kd', $judul_kd);
        $this->db->where('id_kd', $id_kd);
        return $this->db->update('tb_kompetensi_dasar');
    }

    function edit_sub_kd($id_sub_kd, $judul_sub_kd)
    {
        $this->db->set('judul_sub_kd', $judul_sub_kd);
        $this->db->where('id_sub_kd', $id_sub_kd);
        return $this->db->update('tb_sub_kompetensi_dasar');
    }

    function hapus_kd($id_kd)
    {
        $this->db->where('id_kd', $id_kd);
        return $this->db->delete('tb_kompetensi_dasar');
    }

    function hapus_sub_kd($id_sub_kd)
    {
        $this->db->where('id_sub_kd', $id_sub_kd);
        return $this->db->delete('tb_sub_kompetensi_dasar');
    }

    function tampil_detail_nilai()
    {
        $this->db->order_by('tanggal_penilaian', 'DESC');
        $this->db->join('tb_peserta_didik', 'tb_peserta_didik.id_peserta = tb_penilaian_kd.id_peserta', 'inner');
        return $this->db->get('tb_penilaian_kd');
    }

    function tampil_detail_nilai_ortu($id_user)
    {
        $this->db->order_by('nama_lengkap', 'DESC');
        $this->db->where('id_user', $id_user);
        $this->db->join('tb_peserta_didik', 'tb_peserta_didik.id_peserta = tb_penilaian_kd.id_peserta', 'inner');
        return $this->db->get('tb_penilaian_kd');
    }

    function tampil_emosi($id_semester)
    {
        $this->db->select('id_penilaian_emosi, no_induk, nama_lengkap, menangis, memukul, marah, diam, melamun, gembira');
        $this->db->join('tb_semester', 'tb_semester ON tb_semester.id_semester = tb_penilaian_emosi.id_semester', 'inner');
        $this->db->join('tb_tahun_ajaran', 'tb_tahun_ajaran.id_tahun_ajaran = tb_semester.id_tahun_ajaran', 'inner');
        $this->db->join('tb_peserta_didik', 'tb_peserta_didik.id_tahun_ajaran = tb_tahun_ajaran.id_tahun_ajaran', 'inner');
        $this->db->where('tb_penilaian_emosi.id_semester', $id_semester);
        return $this->db->get('tb_penilaian_emosi');
    }

    function tampil_emosi_ortu($id_peserta)
    {
        $this->db->select('no_induk, nama_lengkap, menangis, memukul, marah, diam, melamun, gembira');
        $this->db->join('tb_peserta_didik', 'tb_peserta_didik.id_peserta = tb_penilaian_emosi.id_peserta', 'inner');
        $this->db->where('tb_penilaian_emosi.id_peserta', $id_peserta);
        return $this->db->get('tb_penilaian_emosi');
    }

    function tampil_kesehatan_ortu($id_peserta)
    {
        $this->db->select('no_induk, nama_lengkap, mata, mulut, gigi, telinga, hidung, anggota_badan, berat_badan, tinggi_badan');
        $this->db->join('tb_peserta_didik', 'tb_peserta_didik.id_peserta = tb_penilaian_kesehatan.id_peserta', 'inner');
        $this->db->where('tb_penilaian_kesehatan.id_peserta', $id_peserta);
        return $this->db->get('tb_penilaian_kesehatan');
    }

    function tampil_kesehatan($id_semester)
    {
        $this->db->select('id_penilaian_kesehatan, no_induk, nama_lengkap, no_induk, nama_lengkap, mata, mulut, gigi, telinga, hidung, anggota_badan, berat_badan, tinggi_badan');
        $this->db->join('tb_semester', 'tb_semester ON tb_semester.id_semester = tb_penilaian_kesehatan.id_semester', 'inner');
        $this->db->join('tb_tahun_ajaran', 'tb_tahun_ajaran.id_tahun_ajaran = tb_semester.id_tahun_ajaran', 'inner');
        $this->db->join('tb_peserta_didik', 'tb_peserta_didik.id_tahun_ajaran = tb_tahun_ajaran.id_tahun_ajaran', 'inner');
        $this->db->where('tb_penilaian_kesehatan.id_semester', $id_semester);
        return $this->db->get('tb_penilaian_kesehatan');
    }

    function tampil_catatan_harian()
    {
        $this->db->order_by('id_catatan', 'desc');
        $this->db->join('tb_peserta_didik', 'tb_peserta_didik.id_peserta = tb_catatan_peserta.id_peserta', 'inner');
        return $this->db->get('tb_catatan_peserta');
    }

    function tampil_catatan_harian_ortu($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->order_by('nama_lengkap', 'desc');
        $this->db->join('tb_peserta_didik', 'tb_peserta_didik.id_peserta = tb_catatan_peserta.id_peserta', 'inner');
        return $this->db->get('tb_catatan_peserta');
    }

    function tampil_emosi_guru($id_semester)
    {
        $this->db->order_by('tb_peserta_didik.id_peserta', 'desc');
        return $this->db->query('SELECT * FROM `tb_penilaian_emosi` INNER JOIN tb_peserta_didik ON tb_peserta_didik.id_peserta = tb_penilaian_emosi.id_peserta INNER JOIN tb_semester ON tb_semester.id_semester = tb_penilaian_emosi.id_semester INNER JOIN tb_tahun_ajaran ON tb_tahun_ajaran.id_tahun_ajaran = tb_semester.id_tahun_ajaran WHERE tb_penilaian_emosi.id_semester = ' . $id_semester);
    }

    function tampil_kesehatan_guru($id_semester)
    {
        $this->db->order_by('tb_peserta_didik.id_peserta', 'desc');
        return $this->db->query('SELECT * FROM `tb_penilaian_kesehatan` INNER JOIN tb_peserta_didik ON tb_peserta_didik.id_peserta = tb_penilaian_kesehatan.id_peserta INNER JOIN tb_semester ON tb_semester.id_semester = tb_penilaian_kesehatan.id_semester INNER JOIN tb_tahun_ajaran ON tb_tahun_ajaran.id_tahun_ajaran = tb_semester.id_tahun_ajaran WHERE tb_penilaian_kesehatan.id_semester = ' . $id_semester);
    }

    function simpan_kesehatan($data)
    {
        return $this->db->insert('tb_penilaian_kesehatan', $data);
    }

    function simpan_emosi($data)
    {
        return $this->db->insert('tb_penilaian_emosi', $data);
    }

    function tampil_nilai_kesehatan($id_peserta, $id_semester)
    {
        $this->db->join('tb_peserta_didik', 'tb_peserta_didik.id_peserta = tb_penilaian_kesehatan.id_peserta', 'inner');
        $this->db->where('tb_penilaian_kesehatan.id_peserta', $id_peserta);
        $this->db->where('tb_penilaian_kesehatan.id_semester', $id_semester);
        return $this->db->get('tb_penilaian_kesehatan');
    }

    function tampil_nilai_emosi($id_peserta, $id_semester)
    {
        $this->db->join('tb_peserta_didik', 'tb_peserta_didik.id_peserta = tb_penilaian_emosi.id_peserta', 'inner');
        $this->db->where('tb_penilaian_emosi.id_peserta', $id_peserta);
        $this->db->where('tb_penilaian_emosi.id_semester', $id_semester);
        return $this->db->get('tb_penilaian_emosi');
    }

    function update_nilai_kesehatan($data, $id_peserta_didik, $id_semester)
    {
        $this->db->where('id_semester', $id_semester);
        $this->db->where('id_peserta', $id_peserta_didik);
        $this->db->update('tb_penilaian_kesehatan', $data);
    }

    function update_nilai_emosi($data, $id_peserta_didik, $id_semester)
    {
        $this->db->where('id_semester', $id_semester);
        $this->db->where('id_peserta', $id_peserta_didik);
        $this->db->update('tb_penilaian_emosi', $data);
    }

    function tampil_penilaian_harian($tanggal)
    {
        $this->db->join('tb_sub_kompetensi_dasar', 'tb_sub_kompetensi_dasar.id_sub_kd = tb_penilaian_kd.id_sub_kd', 'inner');
        $this->db->join('tb_peserta_didik', 'tb_peserta_didik.id_peserta = tb_penilaian_kd.id_peserta', 'inner');
        $this->db->where('tanggal_penilaian', $tanggal);
        return $this->db->get('tb_penilaian_kd');
    }

    function tampil_penilaian_peserta($id_peserta, $tanggal)
    {
        $this->db->join('tb_peserta_didik', 'tb_peserta_didik.id_peserta = tb_penilaian_kd.id_peserta', 'inner');
        $this->db->where('tb_penilaian_kd.id_peserta', $id_peserta);
        $this->db->where('tanggal_penilaian', $tanggal);
        return $this->db->get('tb_penilaian_kd');
    }

    function tampil_catatan_peserta($id_peserta, $tanggal)
    {
        $this->db->join('tb_peserta_didik', 'tb_peserta_didik.id_peserta = tb_catatan_peserta.id_peserta', 'inner');
        $this->db->where('tb_catatan_peserta.id_peserta', $id_peserta);
        $this->db->where('tanggal_catatan', $tanggal);
        return $this->db->get('tb_catatan_peserta');
    }

    function tampil_catatan_harian_tanggal($tanggal)
    {
        $this->db->join('tb_peserta_didik', 'tb_peserta_didik.id_peserta = tb_catatan_peserta.id_peserta', 'inner');
        $this->db->where('tanggal_catatan', $tanggal);
        return $this->db->get('tb_catatan_peserta');
    }

    function tambah_penilaian_harian($data)
    {
        return $this->db->insert('tb_penilaian_kd', $data);
    }

    function cari_nilai_harian($id_peserta, $id_sub_kd, $tanggal_penilaian)
    {
        $this->db->where('id_peserta', $id_peserta);
        $this->db->where('id_sub_kd', $id_sub_kd);
        $this->db->where('tanggal_penilaian', $tanggal_penilaian);
        return $this->db->get('tb_penilaian_kd');
    }

    function update_nilai_harian($id_peserta, $id_sub_kd, $data)
    {
        $this->db->where('id_peserta', $id_peserta);
        $this->db->where('id_sub_kd', $id_sub_kd);
        return $this->db->update('tb_penilaian_kd', $data);
    }

    function update_catatan_harian($id_peserta, $tanggal, $data)
    {
        $this->db->where('id_peserta', $id_peserta);
        $this->db->where('tanggal_catatan', $tanggal);
        return $this->db->update('tb_catatan_peserta', $data);
    }

    function cari_catatan_harian($id_peserta, $tanggal_penilaian)
    {
        $this->db->where('id_peserta', $id_peserta);
        $this->db->where('tanggal_catatan', $tanggal_penilaian);
        return $this->db->get('tb_catatan_peserta');
    }
    function tambah_catatan_harian($data)
    {
        return $this->db->insert('tb_catatan_peserta', $data);
    }

    function detail_emosi_peserta($id_peserta)
    {
        $this->db->join('tb_semester', 'tb_penilaian_emosi.id_semester = tb_semester.id_semester', 'inner');
        $this->db->where('id_peserta', $id_peserta);
        return $this->db->get('tb_penilaian_emosi');
    }

    function detail_kesehatan_peserta($id_peserta)
    {
        $this->db->join('tb_semester', 'tb_penilaian_kesehatan.id_semester = tb_semester.id_semester', 'inner');
        $this->db->where('id_peserta', $id_peserta);
        return $this->db->get('tb_penilaian_kesehatan');
    }
}
