<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
    public function index() {
        if (!$this->session->userdata('nik')) {
            redirect('login');
        }

        $this->load->model('RPS_model');

        $data['title'] = 'Dashboard';
        $data['name'] = $this->session->userdata('name');
        $data['nik'] = $this->session->userdata('nik');
        $data['photo'] = $this->session->userdata('photo');

        $data['rps'] = $this->RPS_model->getRPSForDashboard($data); 
        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }
}