<?php 
use GuzzleHttp\Client;

class Pdam_model extends CI_model {

    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/uas-psister/pdam/api/',
            'auth' => ['ezio', '1234']
        ]);
    }

    public function getAllPdam()
    {
        //return $this->db->get('pdam')->result_array();
        $response = $this->_client->request('GET','pdam',[
            'query' => [
                'fnd' => 'ezio29'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }
    public function getPdamById($id)
    {
        //return $this->db->get_where('pdam', ['id' => $id])->row_array();
        $response = $this->_client->request('GET','pdam',[
            'query' => [
                'fnd' => 'ezio29',
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'][0];
    }

    public function tambahDataPdam()
    {
        $data = [
            "nopel" => $this->input->post('nopel', true),
            "nama" => $this->input->post('nama', true),
            "bulan" => $this->input->post('bulan', true),
            "tagihan" => $this->input->post('tagihan', true),
            'fnd' => "ezio29"
        ];

        //$this->db->insert('pdam', $data);
        $response = $this->_client->request('POST','pdam',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function hapusDataPdam($id)
    {
        // $this->db->where('id', $id);
        //$this->db->delete('pdam', ['id' => $id]);
        $response = $this->_client->request('DELETE', 'pdam',[
            'form_params'=>[
                'fnd' => 'ezio29',
                'id'=>$id
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }



    public function ubahDataPdam()
    {
        $data = [
            "nopel" => $this->input->post('nopel', true),
            "nama" => $this->input->post('nama', true),
            "bulan" => $this->input->post('bulan', true),
            "tagihan" => $this->input->post('tagihan', true),
            "id" => $this->input->post('id', true),
            'fnd' => 'ezio29'
            
        ];

        //$this->db->where('id', $this->input->post('id'));
        //$this->db->update('pdam', $data);
        $response = $this->_client->request('PUT','pdam',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function cariDataPdam()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nopel', $keyword);
        $this->db->or_like('bulan', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('tagihan', $keyword);
        return $this->db->get('pdam')->result_array();
    }
}