<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listt extends CI_Controller 
{
    public function __construct() {
        parent::__construct();
        $this->load->model('RPS_model');
    }
    public function index() {
        if (!$this->session->userdata('nik')) {
            redirect('login');
        }

        $data['title'] = 'List RPS';
        $data['name'] = $this->session->userdata('name');
        $data['nik'] = $this->session->userdata('nik');
        $data['photo'] = $this->session->userdata('photo');

        $data['rps'] = [];
        $data['keyword'] = $this->input->post('keyword');
         
        if ($this->input->post('submit')) {
            $data['rps'] = $this->RPS_model->getRPSAfterSearch($data);
        } else {
            $data['keyword'] = [];
            $data['rps'] = $this->RPS_model->getRPSForListt($data);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('listt/index', $data);
        $this->load->view('templates/footer');
    }
    public function delete() {
        $id_rps = $this->uri->segment(3);

        $this->RPS_model->deleteAllData($id_rps);
        $this->RPS_model->deleteRPS($id_rps);
        redirect('listt');
    }
}