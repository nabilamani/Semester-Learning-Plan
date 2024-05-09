<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Extra extends CI_Controller 
{
    public function __construct() {
        parent::__construct();
        $this->load->model('RPS_model');
    }
    
    public function index() {
        if (!$this->session->userdata('nik')) {
            redirect('login');
        }

        $data['title'] = 'Add Data RPS';
        $data['name'] = $this->session->userdata('name');
        $data['nik'] = $this->session->userdata('nik');
        $data['photo'] = $this->session->userdata('photo');
        $id_rps = $this->uri->segment(3);

        $data['rps'] = $this->RPS_model->getRPS($id_rps); 
        $data['gambaran_umum'] = $this->RPS_model->getGambaran($id_rps);
        $data['capaian_pembelajaran'] = $this->RPS_model->getCapaian($id_rps);
        $data['prasyarat'] = $this->RPS_model->getPrasyarat($id_rps);
        $data['referensi'] = $this->RPS_model->getReferensi($id_rps);
        $data['unit_pembelajaran'] = $this->RPS_model->getUnit($id_rps);
        $data['tugas_penilaian'] = $this->RPS_model->getTugas($id_rps);
        $data['rencana_pembelajaran'] = $this->RPS_model->getRencana($id_rps);
        $this->load->view('templates/header', $data);
        $this->load->view('extra/index', $data);
        $this->load->view('templates/footer');
    }

    public function editGambaran() {
        $this->form_validation->set_rules('content_gambaran', 'Gamabaran Umum', 'required');

        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $data = [
                'id_gu' => $this->input->post('id_gu'),
                'content_gambaran' => $this->input->post('content_gambaran'),
                'rps' => $this->input->post('id_rps')
            ];
            $this->RPS_model->updateGambaran($data);
            redirect('extra/index/' . $this->input->post('id_rps'));
        }
    }
    public function editCapaian() {
        $this->form_validation->set_rules('content_capaian', 'Capaian Pembelajaran', 'required');

        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $data = [
                'id_cp' => $this->input->post('id_cp'),
                'content_capaian' => $this->input->post('content_capaian'),
                'rps' => $this->input->post('id_rps')
            ];
            $this->RPS_model->updateCapaian($data);
            redirect('extra/index/' . $this->input->post('id_rps'));
        }
    }
    public function editPrasyarat() {
        $this->form_validation->set_rules('content_prasyarat', 'Prasyarat', 'required');

        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $data = [
                'id_p' => $this->input->post('id_p'),
                'content_prasyarat' => $this->input->post('content_prasyarat'),
                'rps' => $this->input->post('id_rps')
            ];
            $this->RPS_model->updatePrasyarat($data);
            redirect('extra/index/' . $this->input->post('id_rps'));
        }
    }
    public function editReferensi() {
        $this->form_validation->set_rules('content_referensi', 'Referensi', 'required');

        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $data = [
                'id_r' => $this->input->post('id_r'),
                'content_referensi' => $this->input->post('content_referensi'),
                'rps' => $this->input->post('id_rps')
            ];
            $this->RPS_model->updateReferensi($data);
            redirect('extra/index/' . $this->input->post('id_rps'));
        }
    }
    public function editUnit() {
        $this->form_validation->set_rules('unit_kemampuan', 'Kemampuan Akhir', 'required');
        $this->form_validation->set_rules('unit_indikator', 'Indikator', 'required');
        $this->form_validation->set_rules('bahan_kajian', 'Bahan Kajian', 'required');
        $this->form_validation->set_rules('metode_pembelajaran', 'Metode Pembelajaran', 'required');
        $this->form_validation->set_rules('unit_waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('metode_penilaian', 'Mrtode Penilaian', 'required');
        $this->form_validation->set_rules('bahan_ajar', 'Bahan Ajar', 'required');

        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $data = [
                'id_up' => $this->input->post('id_up'),
                'unit_kemampuan' => $this->input->post('unit_kemampuan'),
                'unit_indikator' => $this->input->post('unit_indikator'),
                'bahan_kajian' => $this->input->post('bahan_kajian'),
                'metode_pembelajaran' => $this->input->post('metode_pembelajaran'),
                'unit_waktu' => $this->input->post('unit_waktu'),
                'metode_penilaian' => $this->input->post('metode_penilaian'),
                'bahan_ajar' => $this->input->post('bahan_ajar'),
                'rps' => $this->input->post('id_rps'),
            ];
            $this->RPS_model->updateUnit($data);
            redirect('extra/index/' . $this->input->post('id_rps'));
        }
    }
    public function editTugas() {
        $this->form_validation->set_rules('tugas', 'Tugas/Aktivitas', 'required');
        $this->form_validation->set_rules('tugas_kemampuan', 'Kemampuan Akhir yang diharapkan', 'required');
        $this->form_validation->set_rules('tugas_waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required');
        $this->form_validation->set_rules('kriteria_penilaian', 'Kriteria Penilaian', 'required');
        $this->form_validation->set_rules('tugas_indikator', 'Indikator', 'required');

        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $data = [
                'id_tp' => $this->input->post('id_tp'),
                'tugas' => $this->input->post('tugas'),
                'tugas_kemampuan' => $this->input->post('tugas_kemampuan'),
                'tugas_waktu' => $this->input->post('tugas_waktu'),
                'bobot' => $this->input->post('bobot'),
                'kriteria_penilaian' => $this->input->post('kriteria_penilaian'),
                'tugas_indikator' => $this->input->post('tugas_indikator'),
                'rps' => $this->input->post('id_rps'),
            ];
            $this->RPS_model->updateTugas($data);
            redirect('extra/index/' . $this->input->post('id_rps'));
        }
    }
    public function editRencana() {
        $this->form_validation->set_rules('rencana_kemampuan', 'Kemampuan Akhir yang diharapakan', 'required');
        $this->form_validation->set_rules('rencana_indikator', 'Indikator', 'required');
        $this->form_validation->set_rules('topik', 'Topik', 'required');
        $this->form_validation->set_rules('aktivitas', 'Aktivitas', 'required');
        $this->form_validation->set_rules('rencana_waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('penilaian', 'Penilaian', 'required');

        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $data = [
                'id_rp' => $this->input->post('id_rp'),
                'minggu' => $this->input->post('minggu'),
                'rencana_kemampuan' => $this->input->post('rencana_kemampuan'),
                'rencana_indikator' => $this->input->post('rencana_indikator'),
                'topik' => $this->input->post('topik'),
                'aktivitas' => $this->input->post('aktivitas'),
                'rencana_waktu' => $this->input->post('rencana_waktu'),
                'penilaian' => $this->input->post('penilaian'),
                'rps' => $this->input->post('id_rps'),
            ];
            $this->RPS_model->updateRencana($data);
            redirect('extra/index/' . $this->input->post('id_rps'));
        }
    }

    public function addGambaran() {
        $this->form_validation->set_rules('content_gambaran', 'Gambaran Umum', 'required');

        if($this->form_validation->run() == FALSE) {

        } else {
            $data = [
                'content_gambaran' => $this->input->post('content_gambaran'),
                'rps' => $this->input->post('id_rps')
            ];
            $this->RPS_model->insertGambaran($data);
            redirect('extra/index/' . $this->input->post('id_rps'));   
        }
    }
    public function addCapaian() {
        $this->form_validation->set_rules('content_capaian', 'Capaian Pembelajaran', 'required');

        if($this->form_validation->run() == FALSE) {

        } else {
            $data = [
                'content_capaian' => $this->input->post('content_capaian'),
                'rps' => $this->input->post('id_rps')
            ];
            $this->RPS_model->insertCapaian($data);
            redirect('extra/index/' . $this->input->post('id_rps'));   
        }
    }
    public function addPrasyarat() {
        $this->form_validation->set_rules('content_prasyarat', 'Prasyarat', 'required');

        if($this->form_validation->run() == FALSE) {

        } else {
            $data = [
                'content_prasyarat' => $this->input->post('content_prasyarat'),
                'rps' => $this->input->post('id_rps')
            ];
            $this->RPS_model->insertPrasyarat($data);
            redirect('extra/index/' . $this->input->post('id_rps'));   
        }
    }
    public function addReferensi() {
        $this->form_validation->set_rules('content_referensi', 'Referensi', 'required');

        if($this->form_validation->run() == FALSE) {

        } else {
            $data = [
                'content_referensi' => $this->input->post('content_referensi'),
                'rps' => $this->input->post('id_rps')
            ];
            $this->RPS_model->insertReferensi($data);
            redirect('extra/index/' . $this->input->post('id_rps'));   
        }
    }
    public function addUnit() {
        $this->form_validation->set_rules('unit_kemampuan', 'Kemampuan Akhir', 'required');
        $this->form_validation->set_rules('unit_indikator', 'Indikator', 'required');
        $this->form_validation->set_rules('bahan_kajian', 'Bahan Kajian', 'required');
        $this->form_validation->set_rules('metode_pembelajaran', 'Metode Pembelajaran', 'required');
        $this->form_validation->set_rules('unit_waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('metode_penilaian', 'Mrtode Penilaian', 'required');
        $this->form_validation->set_rules('bahan_ajar', 'Bahan Ajar', 'required');

        if($this->form_validation->run() == FALSE) {

        } else {
            $data = [
                'unit_kemampuan' => $this->input->post('unit_kemampuan'),
                'unit_indikator' => $this->input->post('unit_indikator'),
                'bahan_kajian' => $this->input->post('bahan_kajian'),
                'metode_pembelajaran' => $this->input->post('metode_pembelajaran'),
                'unit_waktu' => $this->input->post('unit_waktu'),
                'metode_penilaian' => $this->input->post('metode_penilaian'),
                'bahan_ajar' => $this->input->post('bahan_ajar'),
                'rps' => $this->input->post('id_rps')
            ];
            $this->RPS_model->insertUnit($data);
            redirect('extra/index/' . $this->input->post('id_rps'));   
        }
    }
    public function addTugas() {
        $this->form_validation->set_rules('tugas', 'Tugas/Aktivitas', 'required');
        $this->form_validation->set_rules('tugas_kemampuan', 'Kemampuan Akhir yang diharapkan', 'required');
        $this->form_validation->set_rules('tugas_waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required');
        $this->form_validation->set_rules('kriteria_penilaian', 'Kriteria Penilaian', 'required');
        $this->form_validation->set_rules('tugas_indikator', 'Indikator', 'required');

        if($this->form_validation->run() == FALSE) {

        } else {
            $data = [
                'tugas' => $this->input->post('tugas'),
                'tugas_kemampuan' => $this->input->post('tugas_kemampuan'),
                'tugas_waktu' => $this->input->post('tugas_waktu'),
                'bobot' => $this->input->post('bobot'),
                'kriteria_penilaian' => $this->input->post('kriteria_penilaian'),
                'tugas_indikator' => $this->input->post('tugas_indikator'),
                'rps' => $this->input->post('id_rps')
            ];
            $this->RPS_model->insertTugas($data);
            redirect('extra/index/' . $this->input->post('id_rps'));   
        }
    }
    public function addRencana() {
        $this->form_validation->set_rules('rencana_kemampuan', 'Kemampuan Akhir yang diharapakan', 'required');
        $this->form_validation->set_rules('rencana_indikator', 'Indikator', 'required');
        $this->form_validation->set_rules('topik', 'Topik', 'required');
        $this->form_validation->set_rules('aktivitas', 'Aktivitas', 'required');
        $this->form_validation->set_rules('rencana_waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('penilaian', 'Penilaian', 'required');

        if($this->form_validation->run() == FALSE) {

        } else {
            $data = [
                'minggu' => $this->input->post('minggu'),
                'rencana_kemampuan' => $this->input->post('rencana_kemampuan'),
                'rencana_indikator' => $this->input->post('rencana_indikator'),
                'topik' => $this->input->post('topik'),
                'aktivitas' => $this->input->post('aktivitas'),
                'rencana_waktu' => $this->input->post('rencana_waktu'),
                'penilaian' => $this->input->post('penilaian'),
                'rps' => $this->input->post('id_rps')
            ];
            $this->RPS_model->insertRencana($data);
            redirect('extra/index/' . $this->input->post('id_rps'));   
        }
    }
    public function edit() {
        if (!$this->session->userdata('nik')) {
            redirect('login');
        }
        
        $data['title'] = 'Edit RPS';
        $data['name'] = $this->session->userdata('name');
        $data['nik'] = $this->session->userdata('nik');
        $data['photo'] = $this->session->userdata('photo');
        $id_rps = $this->uri->segment(3);

        $data['rps'] = $this->RPS_model->getAllDataRPS($id_rps);

        $data['dosen_dekan'] = $this->RPS_model->getDosenDekan();
        $data['dosen_kaprodi'] = $this->RPS_model->getDosenKaprodi();
        $data['dosen_sekretaris'] = $this->RPS_model->getDosenSekretaris();
        $data['dosen_pengampu'] = $this->RPS_model->getDosenPengampu(); 

        $this->load->view('templates/header', $data); 
        $this->load->view('edit/index', $data); 
        $this->load->view('templates/footer');

        $this->form_validation->set_rules('nama_mata_kuliah', 'mata_kuliah', 'required');
        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nomor', 'Nomor RPS', 'required');
        $this->form_validation->set_rules('tanggal_susun', 'Tanggal Penyusunan', 'required');
        $this->form_validation->set_rules('tanggal_berlaku', 'Tanggal Berlaku', 'required');
        $this->form_validation->set_rules('nilai_presensi', 'Nilai Presensi', 'required');
        $this->form_validation->set_rules('nilai_uts', 'Nilai UTS', 'required');
        $this->form_validation->set_rules('nilai_uas', 'Nilai UAS', 'required');
        $this->form_validation->set_rules('nilai_tugas', 'Nilai Tugas', 'required');

        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $update_data = [
                'id_rps' => $this->input->post('id_rps'),
                'nama_mata_kuliah' => $this->input->post('nama_mata_kuliah'),
                'kode' => $this->input->post('kode'),
                'program_studi' => $this->input->post('program_studi'),
                'bobot_sks' => $this->input->post('bobot_sks'),
                'semester' => $this->input->post('semester'),
                'nomor' => $this->input->post('nomor'),
                'tanggal_berlaku' => $this->input->post('tanggal_berlaku'),
                'tanggal_susun' => $this->input->post('tanggal_susun'),
                'revisi' => $this->input->post('revisi'),
                'dosen_dekan' => $this->input->post('dosen_dekan'),
                'dosen_kaprodi' => $this->input->post('dosen_kaprodi'),
                'dosen_sekretaris' => $this->input->post('dosen_sekretaris'),
                'dosen_pengampu' => $this->input->post('dosen_pengampu'),
                'nilai_presensi' => $this->input->post('nilai_presensi'),
                'nilai_uts' => $this->input->post('nilai_uts'),
                'nilai_uas' => $this->input->post('nilai_uas'),
                'nilai_tugas' => $this->input->post('nilai_tugas')
            ];
            $this->RPS_model->updateRPS($update_data);
            redirect('extra/index/' . $this->input->post('id_rps') );
        }
    }

    public function deleteGU() {
        $id_rps = $this->uri->segment(3);
        $id_gu = $this->uri->segment(4);

        $this->RPS_model->deleteGU($id_gu);
        redirect('extra/index/' . $id_rps );
    }
    public function deleteCP() {
        $id_rps = $this->uri->segment(3);
        $id_cp = $this->uri->segment(4);

        $this->RPS_model->deleteCP($id_cp);
        redirect('extra/index/' . $id_rps );
    }
    public function deleteP() {
        $id_rps = $this->uri->segment(3);
        $id_p = $this->uri->segment(4);

        $this->RPS_model->deleteP($id_p);
        redirect('extra/index/' . $id_rps );
    }
    public function deleteUP() {
        $id_rps = $this->uri->segment(3);
        $id_up = $this->uri->segment(4);

        $this->RPS_model->deleteUP($id_up);
        redirect('extra/index/' . $id_rps );
    }
    public function deleteTP() {
        $id_rps = $this->uri->segment(3);
        $id_tp = $this->uri->segment(4);

        $this->RPS_model->deleteTP($id_tp);
        redirect('extra/index/' . $id_rps );
    }
    public function deleteR() {
        $id_rps = $this->uri->segment(3);
        $id_r = $this->uri->segment(4);

        $this->RPS_model->deleteR($id_r);
        redirect('extra/index/' . $id_rps );
    }
    public function deleteRP() {
        $id_rps = $this->uri->segment(3);
        $id_rp = $this->uri->segment(4);

        $this->RPS_model->deleteRP($id_rp);
        redirect('extra/index/' . $id_rps );
    }
}