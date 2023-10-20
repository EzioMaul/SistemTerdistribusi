<?php

class Pulsa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pulsa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Pembelian';
        $data['pulsa'] = $this->Pulsa_model->getAllPulsa();
        if( $this->input->post('keyword') ) {
            $data['pulsa'] = $this->Pulsa_model->cariDataPulsa();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('pulsa/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Pembelian';

        $this->form_validation->set_rules('nomor', 'Nomor', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('pulsa/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Pulsa_model->tambahDataPulsa();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('pulsa');
        }
    }

    public function hapus($id)
    {
        $this->Pulsa_model->hapusDataPulsa($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('pulsa');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Pembelian';
        $data['pulsa'] = $this->Pulsa_model->getPulsaById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('pulsa/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Pembelian';
        $data['pulsa'] = $this->Pulsa_model->getPulsaById($id);
        $data['provider'] = ['Telkomsel', 'IM3', 'XL', 'Smartfren', '3', 'Axis','By.U'];
        $data['jumlah'] = ['5000', '10000', '20000', '50000', '100000'];

        $this->form_validation->set_rules('nomor', 'Nomor', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('pulsa/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Pulsa_model->ubahDataPulsa();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('pulsa');
        }
    }

}
