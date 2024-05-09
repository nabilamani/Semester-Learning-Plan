<?php 

class RPS_model extends CI_Model
{
    public function getRPSForDashboard($data) {
        $nik = $this->db->escape($data['nik']);

        return $this->db->query("SELECT *
        FROM rps
        WHERE dosen = $nik
        ORDER BY id_rps DESC
        LIMIT 5")->result_array();
    }

    public function getRPSForListt($data) {
        $nik = $this->db->escape($data['nik']);

        return $this->db->query("SELECT rps.*, dosen.name pengampu
        FROM rps
        JOIN dosen ON rps.dosen_pengampu = dosen.nik
        WHERE dosen = $nik")->result_array();
    }

    public function getRPSAfterSearch($data) {
        $keyword = $this->db->escape_like_str($data['keyword']);
        $nik = $this->db->escape($data['nik']);
    
        return $this->db->query("SELECT rps.*, dosen.name pengampu
            FROM rps
            JOIN dosen ON rps.dosen_pengampu = dosen.nik
            WHERE dosen = $nik AND 
                (nama_mata_kuliah LIKE '%$keyword%' OR 
                kode LIKE '%$keyword%' OR
                program_studi LIKE '%$keyword%' OR
                semester LIKE '%$keyword%' OR
                bobot_sks LIKE '%$keyword%' OR
                dosen.name LIKE '%$keyword%')")->result_array();
    }

    public function getAllDataRPS($id_rps) {
        return $this->db->query("SELECT rps.*, d1.name dekan, d2.name kaprodi, d3.name sekretaris, d4.name pengampu, d1.nik nik_dekan, d2.nik nik_kaprodi, d3.nik nik_sekretaris, d4.nik nik_pengampu, d1.ttd ttd_dekan, d2.ttd ttd_kaprodi, d3.ttd ttd_sekretaris, d4.ttd ttd_pengampu 
        FROM rps
        JOIN dosen d1 ON rps.dosen_dekan = d1.nik
        JOIN dosen d2 ON rps.dosen_kaprodi = d2.nik
        JOIN dosen d3 ON rps.dosen_sekretaris = d3.nik
        JOIN dosen d4 ON rps.dosen_pengampu = d4.nik
        WHERE id_rps = $id_rps")->row_array();
    }

    public function getDosenDekan() {
        return $this->db->get_where('dosen', ['jabatan' => 'pengampu'])->result_array();
    }
    public function getDosenKaprodi() {
        return $this->db->get_where('dosen', ['jabatan' => 'pengampu'])->result_array();
    }
    public function getDosenSekretaris() {
        return $this->db->get_where('dosen', ['jabatan' => 'pengampu'])->result_array();
    }
    public function getDosenPengampu() {
        return $this->db->get_where('dosen', ['jabatan' => 'pengampu'])->result_array();
    }

    public function getRPS($id_rps) {
        return $this->db->query("SELECT *
        FROM rps
        WHERE id_rps = $id_rps")->row_array();
    }
    public function getGambaran($id_rps) {
        return $this->db->get_where('gambaran_umum', ['rps' => $id_rps])->result_array();
    }
    public function getCapaian($id_rps) {
        return $this->db->get_where('capaian_pembelajaran', ['rps' => $id_rps])->result_array();
    }
    public function getPrasyarat($id_rps) {
        return $this->db->get_where('prasyarat', ['rps' => $id_rps])->result_array();
    }
    public function getReferensi($id_rps) {
        return $this->db->get_where('referensi', ['rps' => $id_rps])->result_array();
    }
    public function getUnit($id_rps) {
        return $this->db->get_where('unit_pembelajaran', ['rps' => $id_rps])->result_array();
    }
    public function getTugas($id_rps) {
        return $this->db->get_where('tugas_penilaian', ['rps' => $id_rps])->result_array();
    }
    public function getRencana($id_rps) {
        return $this->db->get_where('rencana_pembelajaran', ['rps' => $id_rps])->result_array();
    }

    public function insertRPS($data) {
        $this->db->insert('rps', $data);
    }
    public function insertGambaran($data) {
        $this->db->insert('gambaran_umum', $data);
    }
    public function insertCapaian($data) {
        $this->db->insert('capaian_pembelajaran', $data);
    }
    public function insertPrasyarat($data) {
        $this->db->insert('prasyarat', $data);
    }
    public function insertReferensi($data) {
        $this->db->insert('referensi', $data);
    }
    public function insertUnit($data) {
        $this->db->insert('unit_pembelajaran', $data);
    }
    public function insertTugas($data) {
        $this->db->insert('tugas_penilaian', $data);
    }
    public function insertRencana($data) {
        $this->db->insert('rencana_pembelajaran', $data);
    }

    public function updateRPS($update_data) {
        $id_rps = $this->db->escape($update_data['id_rps']);
        $nama_mata_kuliah = $this->db->escape($update_data['nama_mata_kuliah']);
        $kode = $this->db->escape($update_data['kode']);
        $program_studi = $this->db->escape($update_data['program_studi']);
        $bobot_sks = $this->db->escape($update_data['bobot_sks']);
        $semester = $this->db->escape($update_data['semester']);
        $nomor = $this->db->escape($update_data['nomor']);
        $tanggal_berlaku = $this->db->escape($update_data['tanggal_berlaku']);
        $tanggal_susun = $this->db->escape($update_data['tanggal_susun']);
        $revisi = $this->db->escape($update_data['revisi']);
        $dosen_dekan = $this->db->escape($update_data['dosen_dekan']);
        $dosen_sekretaris = $this->db->escape($update_data['dosen_sekretaris']);
        $dosen_kaprodi = $this->db->escape($update_data['dosen_kaprodi']);
        $dosen_pengampu = $this->db->escape($update_data['dosen_pengampu']);
        $nilai_presensi = $this->db->escape($update_data['nilai_presensi']);
        $nilai_uts = $this->db->escape($update_data['nilai_uts']);
        $nilai_uas = $this->db->escape($update_data['nilai_uas']);
        $nilai_tugas = $this->db->escape($update_data['nilai_tugas']);

        $query = "UPDATE rps
                SET nama_mata_kuliah = $nama_mata_kuliah, 
                    kode = $kode, 
                    program_studi = $program_studi, 
                    bobot_sks = $bobot_sks, 
                    semester = $semester, 
                    nomor = $nomor,
                    tanggal_berlaku = $tanggal_berlaku,
                    tanggal_susun = $tanggal_susun,
                    revisi = $revisi,
                    dosen_dekan = $dosen_dekan,
                    dosen_kaprodi = $dosen_kaprodi,
                    dosen_sekretaris = $dosen_sekretaris,
                    dosen_pengampu = $dosen_pengampu,
                    nilai_presensi = $nilai_presensi,
                    nilai_uts = $nilai_uts,
                    nilai_uas = $nilai_uas,
                    nilai_tugas = $nilai_tugas
                WHERE id_rps = $id_rps";
        return $this->db->query($query);
    }
    public function updateGambaran($data) {
        $id_gu = $this->db->escape($data['id_gu']);
        $content = $this->db->escape($data['content_gambaran']);
        $id_rps = $this->db->escape($data['rps']);

        $query = "UPDATE gambaran_umum
                SET content_gambaran = $content,
                    rps = $id_rps
                WHERE id_gu = $id_gu";
        return $this->db->query($query);
    }
    public function updateCapaian($data) {
        $id_cp = $this->db->escape($data['id_cp']);
        $content = $this->db->escape($data['content_capaian']);
        $id_rps = $this->db->escape($data['rps']);

        $query = "UPDATE capaian_pembelajaran
                SET content_capaian = $content,
                    rps = $id_rps
                WHERE id_cp = $id_cp";
        return $this->db->query($query);
    }
    public function updatePrasyarat($data) {
        $id_p = $this->db->escape($data['id_p']);
        $content = $this->db->escape($data['content_prasyarat']);
        $id_rps = $this->db->escape($data['rps']);

        $query = "UPDATE prasyarat
                SET content_prasyarat = $content,
                    rps = $id_rps
                WHERE id_p = $id_p";
        return $this->db->query($query);
    }
    public function updateReferensi($data) {
        $id_r = $this->db->escape($data['id_r']);
        $content = $this->db->escape($data['content_referensi']);
        $id_rps = $this->db->escape($data['rps']);

        $query = "UPDATE referensi
                SET content_referensi = $content,
                    rps = $id_rps
                WHERE id_r = $id_r";
        return $this->db->query($query);
    }
    public function updateUnit($data) {
        $id_up = $this->db->escape($data['id_up']);
        $unit_kemampuan = $this->db->escape($data['unit_kemampuan']);
        $unit_indikator = $this->db->escape($data['unit_indikator']);
        $bahan_kajian = $this->db->escape($data['bahan_kajian']);
        $metode_pembelajaran = $this->db->escape($data['metode_pembelajaran']);
        $unit_waktu = $this->db->escape($data['unit_waktu']);
        $metode_penilaian = $this->db->escape($data['metode_penilaian']);
        $bahan_ajar = $this->db->escape($data['bahan_ajar']);
        $rps = $this->db->escape($data['rps']);

        $query = "UPDATE unit_pembelajaran
                SET unit_kemampuan = $unit_kemampuan,
                    unit_indikator = $unit_indikator,
                    bahan_kajian = $bahan_kajian,
                    metode_pembelajaran = $metode_pembelajaran,
                    unit_waktu = $unit_waktu,
                    metode_penilaian = $metode_penilaian,
                    bahan_ajar = $bahan_ajar,
                    rps = $rps
                WHERE id_up = $id_up";
        return $this->db->query($query);
    }
    public function updateTugas($data) {
        $id_tp = $this->db->escape($data['id_tp']);
        $tugas = $this->db->escape($data['tugas']);
        $tugas_kemampuan = $this->db->escape($data['tugas_kemampuan']);
        $tugas_waktu = $this->db->escape($data['tugas_waktu']);
        $bobot = $this->db->escape($data['bobot']);
        $kriteria_penilaian = $this->db->escape($data['kriteria_penilaian']);
        $tugas_indikator = $this->db->escape($data['tugas_indikator']);
        $rps = $this->db->escape($data['rps']);

        $query = "UPDATE tugas_penilaian
                SET tugas = $tugas,
                    tugas_kemampuan = $tugas_kemampuan,
                    tugas_waktu = $tugas_waktu,
                    bobot = $bobot,
                    kriteria_penilaian = $kriteria_penilaian,
                    tugas_indikator = $tugas_indikator,
                    rps = $rps
                WHERE id_tp = $id_tp";
        return $this->db->query($query);
    }
    public function updateRencana($data) {
        $id_rp = $this->db->escape($data['id_rp']);
        $minggu = $this->db->escape($data['minggu']);
        $rencana_kemampuan = $this->db->escape($data['rencana_kemampuan']);
        $rencana_indikator = $this->db->escape($data['rencana_indikator']);
        $topik = $this->db->escape($data['topik']);
        $aktivitas = $this->db->escape($data['aktivitas']);
        $rencana_waktu = $this->db->escape($data['rencana_waktu']);
        $penilaian = $this->db->escape($data['penilaian']);
        $rps = $this->db->escape($data['rps']);

        $query = "UPDATE rencana_pembelajaran
                SET minggu = $minggu,
                    rencana_kemampuan = $rencana_kemampuan,
                    rencana_indikator = $rencana_indikator,
                    topik = $topik,
                    aktivitas = $aktivitas,
                    rencana_waktu = $rencana_waktu,
                    penilaian = $penilaian,
                    rps = $rps
                WHERE id_rp = $id_rp";
        return $this->db->query($query);
    }
    public function deleteGU($id_gu) {
        $this->db->delete('gambaran_umum', ['id_gu' => $id_gu]);
    }
    public function deleteCP($id_cp) {
        $this->db->delete('capaian_pembelajaran', ['id_cp' => $id_cp]);
    }
    public function deleteP($id_p) {
        $this->db->delete('prasyarat', ['id_p' => $id_p]);
    }
    public function deleteUP($id_up) {
        $this->db->delete('unit_pembelajaran', ['id_up' => $id_up]);
    }
    public function deleteTP($id_tp) {
        $this->db->delete('tugas_penilaian', ['id_tp' => $id_tp]);
    }
    public function deleteR($id_r) {
        $this->db->delete('referensi', ['id_r' => $id_r]);
    }
    public function deleteRP($id_rp) {
        $this->db->delete('rencana_pembelajaran', ['id_rp' => $id_rp]);
    }

    public function deleteAllData($id_rps) {
        $tables = [
            'gambaran_umum',
            'capaian_pembelajaran',
            'prasyarat',
            'referensi',
            'unit_pembelajaran',
            'tugas_penilaian',
            'rencana_pembelajaran'
        ];
    
        foreach ($tables as $table) {
            $this->db->delete($table, ['rps' => $id_rps]);
        }
    }
    public function deleteRPS($id_rps) {
        $this->db->delete('rps', ['id_rps' => $id_rps]);
    }
}