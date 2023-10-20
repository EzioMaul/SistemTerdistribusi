<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Pdam extends REST_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Pdam_model','pdam');

        $this->methods['index_get']['limit'] = 50;
    }
    public function index_get()
    {
        $id = $this->get('id');
        if($id === null)
        {
            $pdam = $this->pdam->getPdam();
        }else
        {
            $pdam = $this->pdam->getPdam($id);
        }
        
        if($pdam){
            $this->response([
                'status' => true,
                'data' => $pdam
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
            if($this->pdam->deletePdam($id) > 0)
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
            'nopel' => $this->post('nopel'),
            'nama' => $this->post('nama'),
            'bulan' => $this->post('bulan'),
            'tagihan' => $this->post('tagihan')
        ];
        if($this->pdam->createPdam($data) > 0){
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
            'nopel' => $this->put('nopel'),
            'nama' => $this->put('nama'),
            'bulan' => $this->put('bulan'),
            'tagihan' => $this->put('tagihan')
        ];
        if($this->pdam->updatePdam($data, $id) > 0){
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