<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Review extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Review_model');
    }

    public function index()
    {
        $this->form_validation->set_rules('nama', 'Nama pembeli', 'required', [
            'required' => 'Nama pembeli harus diisi'
        ]);
        $this->form_validation->set_rules('nhp', 'Nomor HP', 'required', [
            'required' => 'Nomor HP harus diisi'
        ]);
        if ($this->form_validation->run() == false) {
            $data['merk'] = ['Nike', 'Adidas', 'Air Jordan', 'Eiger', 'Speed'];
            $this->load->view('review/v_input', $data);
        }   else {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'nhp' => $this->input->post('nhp'),
                    'merk' => $this->input->post('merk'),
                    'ukuran' => $this->input->post('ukuran'),
                    'harga' => $this->Review_model->proses($this->input->post('merk'))
                ];

                $this->load->view('review/v_output', $data);
        }  
    }
}