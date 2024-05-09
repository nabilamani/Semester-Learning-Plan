<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends CI_Controller 
{
    public function __construct() {
        parent::__construct();
        $this->load->model('RPS_model');
    }

    public function index() {
        if (!$this->session->userdata('nik')) {
            redirect('login');
        }
        
        $data['title'] = 'Create RPS';
        $data['name'] = $this->session->userdata('name');
        $data['nik'] = $this->session->userdata('nik');
        $data['photo'] = $this->session->userdata('photo');
        $data['dosen_dekan'] = $this->RPS_model->getDosenDekan();
        $data['dosen_kaprodi'] = $this->RPS_model->getDosenKaprodi();
        $data['dosen_sekretaris'] = $this->RPS_model->getDosenSekretaris();
        $data['dosen_pengampu'] = $this->RPS_model->getDosenPengampu();
        $this->load->view('templates/header', $data);
        $this->load->view('create/index', $data);
        $this->load->view('templates/footer');
    }

    public function addRPS() {
        $nik = $this->session->userdata('nik');

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
            $data = [
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
                'nilai_tugas' => $this->input->post('nilai_tugas'),
                'dosen' => $nik
            ];
            $this->RPS_model->insertRPS($data);
        }
        redirect('listt');
    }
}