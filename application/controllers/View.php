<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller 
{
    public function index() {
        if (!$this->session->userdata('nik')) {
            redirect('auth');
        }
        
        $id_rps = $this->uri->segment(3);

        $this->load->model('RPS_model');
        $data['title'] = 'View RPS |';
        $data['rps'] = $this->RPS_model->getAllDataRPS($id_rps);
        $data['gambaran_umum'] = $this->RPS_model->getGambaran($id_rps);
        $data['capaian_pembelajaran'] = $this->RPS_model->getCapaian($id_rps);
        $data['prasyarat'] = $this->RPS_model->getPrasyarat($id_rps);
        $data['referensi'] = $this->RPS_model->getReferensi($id_rps);
        $data['unit_pembelajaran'] = $this->RPS_model->getUnit($id_rps);
        $data['tugas_penilaian'] = $this->RPS_model->getTugas($id_rps);
        $data['rencana_pembelajaran'] = $this->RPS_model->getRencana($id_rps);
        $this->load->view('view_rps/index', $data);
    }
}