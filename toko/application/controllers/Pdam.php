<?php

class Pdam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pdam_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Pdam';
        $data['pdam'] = $this->Pdam_model->getAllPdam();
        if( $this->input->post('keyword') ) {
            $data['pdam'] = $this->Pdam_model->cariDataPdam();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('pdam/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Pdam';

        $this->form_validation->set_rules('nopel', 'Nopel', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tagihan', 'Tagihan', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('pdam/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Pdam_model->tambahDataPdam();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('pdam');
        }
    }

    public function hapus($id)
    {
        $this->Pdam_model->hapusDataPdam($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('pdam');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Pdam';
        $data['pdam'] = $this->Pdam_model->getPdamById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('pdam/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Pdam';
        $data['pdam'] = $this->Pdam_model->getPdamById($id);
        $data['bulan'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember' ];

        $this->form_validation->set_rules('nopel', 'Nopel', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tagihan', 'Tagihan', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('pdam/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Pdam_model->ubahDataPdam();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('pdam');
        }
    }

}
