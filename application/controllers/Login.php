<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function index() {
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('login/index');
        } else {
            $this->login();
        }
    }

    private function login() {
        $nik = $this->input->post('nik');
        $password = $this->input->post('password');

        $dosen = $this->db->get_where('dosen', ['nik' => $nik])->row_array();

        if ($dosen) {
            if ($password === $dosen['password']) {
                $data = [
                    'nik' => $dosen['nik'],
                    'name' => $dosen['name'], 
                    'photo' => $dosen['photo'], 
                    'ttd' => $dosen['ttd'], 
                    'email' => $dosen['email'] 
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger p-1" role="alert">
                password salah.
                </div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger p-1" role="alert">
            NIK Dosen tidak terdaftar.
            </div>');
            redirect('login');
        }
    }

    public function logout() {
        $this->session->unset_userdata('nik');
        $this->session->sess_destroy();
        redirect('login');
    }
}