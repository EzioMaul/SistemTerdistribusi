<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Pulsa extends REST_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Pulsa_model','pulsa');

        $this->methods['index_get']['limit'] = 50;
    }
    public function index_get()
    {
        $id = $this->get('id');
        if($id === null)
        {
            $pulsa = $this->pulsa->getPulsa();
        }else
        {
            $pulsa = $this->pulsa->getPulsa($id);
        }
        
        if($pulsa){
            $this->response([
                'status' => true,
                'data' => $pulsa
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'id gaada'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function index_delete()
    {
        $id = $this->delete('id');
        if($id === null)
        {
            $this->response([
                'status' => false,
                'message' => 'harus ada id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else
        {
            if($this->pulsa->deletePulsa($id) > 0)
            {
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'terhapus'
                ], REST_Controller::HTTP_OK);
            }else
            {
                $this->response([
                    'status' => false,
                    'message' => 'id gaada'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
    public function index_post()
    {
        $data = [
            'nomor' => $this->post('nomor'),
            'nama' => $this->post('nama'),
            'provider' => $this->post('provider'),
            'jumlah' => $this->post('jumlah')
        ];
        if($this->pulsa->createPulsa($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'Berhasil ditambahkan'
            ], REST_Controller::HTTP_CREATED);
        }else
        {
            $this->response([
                'status' => false,
                'message' => 'gagaltambah data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function index_put()
    {
        $id=$this->put('id');
        $data = [
            'nomor' => $this->put('nomor'),
            'nama' => $this->put('nama'),
            'provider' => $this->put('provider'),
            'jumlah' => $this->put('jumlah')
        ];
        if($this->pulsa->updatePulsa($data, $id) > 0){
            $this->response([
                'status' => true,
                'message' => 'Berhasil Update'
            ], REST_Controller::HTTP_OK);
        }else
        {
            $this->response([
                'status' => false,
                'message' => 'gagal Update'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}