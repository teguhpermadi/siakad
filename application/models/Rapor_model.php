<?php

class Rapor_model extends CI_Model
{
    function get_siswa()
    {
        // dapatkan semua siswa dalam rombel
        // filter rombel berdasarkan id tahun aktif dan id kelas yang mana user menjadi walikelasnya
        $filter = 'rombel.id_tahun = ' . $_SESSION['id_tahun_pelajaran'] . ' AND rombel.id_kelas = ' . user_info()['id_kelas'];
        // hitung nilai rata-rata sikapnya kemudian selalu bulatkan ke atas
        $this->db->select('siswa.id, siswa.nama_lengkap nama_siswa, siswa.nis');
        $this->db->from('rombel');
        $this->db->where($filter);
        $this->db->join('siswa', 'rombel.id_siswa = siswa.id');
        $this->db->order_by('siswa.nama_lengkap');
        $db = $this->db->get();
        return $db->result_array();
    }

    function get_data_siswa($id_siswa)
    {
        return $this->db->get_where('siswa', array('id' => $id_siswa))->row_array();
    }

    function get_rombel_siswa($id_siswa)
    {
        $this->db->select('kelas.id id_kelas, kelas.nama nama_kelas, kelas.kode_kelas, kelas.tingkat tingkat_kelas');
        $this->db->from('rombel');
        $this->db->join('kelas', 'kelas.id = rombel.id_kelas');
        $this->db->where('rombel.id_siswa', $id_siswa);
        $db = $this->db->get();
        return $db->row_array();
    }

    function get_mapel_siswa($id_siswa)
    {
        $this->db->select('mapel.id id_mapel, mapel.nama nama_mapel, mapel.kode kode_mapel, mapel.kelompok kelompok_mapel, kelas.tingkat tingkat');
        $this->db->from('rombel');
        $this->db->join('pengajar', 'pengajar.id_kelas = rombel.id_kelas');
        $this->db->join('kelas', 'kelas.id = rombel.id_kelas');
        $this->db->join('mapel', 'mapel.id = pengajar.id_mapel');
        $this->db->where('rombel.id_siswa', $id_siswa);
        $db = $this->db->get();
        return $db->result_array();
    }

    function get_nilai($id_mapel, $id_siswa)
    {
        // dapatkan semua siswa dalam rombel
        // filter rombel berdasarkan id tahun aktif dan id kelas yang mana user menjadi walikelasnya
        $filter = 'rombel.id_tahun = ' . $_SESSION['id_tahun_pelajaran'] . ' AND rombel.id_kelas = ' . user_info()['id_kelas'] . ' AND mapel.id = ' . $id_mapel . ' AND siswa.id = ' . $id_siswa;
        // hitung nilai rata-rata sikapnya kemudian selalu bulatkan ke atas
        $this->db->select('kompetensi_dasar.kd, CEILING(AVG(nilai)) rerata_up');
        $this->db->from('rombel');
        $this->db->where($filter);
        $this->db->join('siswa', 'rombel.id_siswa = siswa.id');
        $this->db->join('nilai', 'nilai.id_siswa = siswa.id');
        $this->db->join('mapel', 'nilai.id_mapel = mapel.id');
        $this->db->join('kompetensi_dasar', 'nilai.id_kd = kompetensi_dasar.id');
        $this->db->group_by('nama_lengkap');
        // $this->db->group_by('mapel.nama');
        // $this->db->order_by('siswa.nama_lengkap');
        $db = $this->db->get();
        return $db->row_array();
        // return $this->db->last_query();
    }

    function get_absensi($id_siswa)
    {
        $filter = 'rombel.id_tahun = ' . $_SESSION['id_tahun_pelajaran'] . ' AND rombel.id_kelas = ' . user_info()['id_kelas'] . ' AND siswa.id =' . $id_siswa;
        $this->db->select('absensi.sakit, absensi.izin, absensi.alpa, (sakit + izin + alpa) as jumlah_ketidakhadiran');
        $this->db->from('rombel');
        $this->db->where($filter);
        $this->db->join('siswa', 'rombel.id_siswa = siswa.id');
        $this->db->join('absensi', 'rombel.id_siswa = absensi.id_siswa', 'left outer');
        $db = $this->db->get();

        return $db->row_array();
    }

    function get_catatan($id_siswa)
    {
        // dapatkan semua siswa dalam rombel
        // filter rombel berdasarkan id tahun aktif dan id kelas yang mana user menjadi walikelasnya
        $filter = 'rombel.id_tahun = ' . $_SESSION['id_tahun_pelajaran'] . ' AND rombel.id_kelas = ' . user_info()['id_kelas'] . ' AND siswa.id =' . $id_siswa;
        $this->db->select('if(catatan.keterangan = "Yes", "Naik", "Tidak Naik") keterangan, catatan.note catatan');
        $this->db->from('rombel');
        $this->db->where($filter);
        $this->db->join('siswa', 'rombel.id_siswa = siswa.id');
        $this->db->join('catatan', 'rombel.id_siswa = catatan.id_siswa', 'left outer');
        $db = $this->db->get();

        return $db->row_array();
        // return $this->db->last_query();
    }

    function get_kkm($id_mapel, $tingkat)
    {
        $id_guru = user_info()['id_guru'];
        $this->db->select('kkm');
        $this->db->from('kriteria_ketuntasan');
        $this->db->where('id_tahun', $_SESSION['id_tahun_pelajaran']);
        $this->db->where('id_mapel', $id_mapel);
        $this->db->where('id_guru', $id_guru);
        $this->db->where('tingkat', $tingkat);
        $db = $this->db->get();
        return $db->row_array();
    }

    function get_deskripsi_tuntas($id_mapel, $id_siswa, $kkm)
    {
        $k = (int)$kkm;
        $filter = 'rombel.id_tahun = ' . $_SESSION['id_tahun_pelajaran'] . ' AND rombel.id_kelas = ' . user_info()['id_kelas'] . ' AND mapel.id = ' . $id_mapel . ' AND siswa.id = ' . $id_siswa;
        $this->db->select('CONCAT("Tuntas pada ", GROUP_CONCAT(kompetensi_dasar.kd SEPARATOR "; ")) deskripsi');
        $this->db->from('rombel');
        $this->db->where('nilai >=', $k);
        $this->db->where($filter);
        $this->db->join('siswa', 'rombel.id_siswa = siswa.id');
        $this->db->join('nilai', 'nilai.id_siswa = siswa.id');
        $this->db->join('mapel', 'nilai.id_mapel = mapel.id');
        $this->db->join('kompetensi_dasar', 'nilai.id_kd = kompetensi_dasar.id');
        $this->db->order_by('nilai.nilai', 'desc');
        $db = $this->db->get();
        return $db->row_array();
        // return $this->db->last_query();
    }

    function get_deskripsi_tidak_tuntas($id_mapel, $id_siswa, $kkm)
    {
        $k = (int)$kkm;
        $filter = 'rombel.id_tahun = ' . $_SESSION['id_tahun_pelajaran'] . ' AND rombel.id_kelas = ' . user_info()['id_kelas'] . ' AND mapel.id = ' . $id_mapel . ' AND siswa.id = ' . $id_siswa;
        $this->db->select('CONCAT("Belum tuntas pada ", GROUP_CONCAT(kompetensi_dasar.kd SEPARATOR "; ")) deskripsi');
        $this->db->from('rombel');
        $this->db->where($filter);
        $this->db->where('nilai <', $k);
        $this->db->join('siswa', 'rombel.id_siswa = siswa.id');
        $this->db->join('nilai', 'nilai.id_siswa = siswa.id');
        $this->db->join('mapel', 'nilai.id_mapel = mapel.id');
        $this->db->join('kompetensi_dasar', 'nilai.id_kd = kompetensi_dasar.id');
        $this->db->order_by('nilai.nilai', 'desc');
        $db = $this->db->get();
        return $db->row_array();
        // return $this->db->last_query();
    }
}
