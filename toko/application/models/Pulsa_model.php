<?php 
use GuzzleHttp\Client;

class Pulsa_model extends CI_model {

    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/uas-psister/pulsa/api/',
            'auth' => ['ezio', '1234']
        ]);
    }

    public function getAllPulsa()
    {
        //return $this->db->get('pulsa')->result_array();
        $response = $this->_client->request('GET','pulsa',[
            'query' => [
                'fnd' => 'ezio29'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }
    public function getPulsaById($id)
    {
        //return $this->db->get_where('pulsa', ['id' => $id])->row_array();
        $response = $this->_client->request('GET','pulsa',[
            'query' => [
                'fnd' => 'ezio29',
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'][0];
    }

    public function tambahDataPulsa()
    {
        $data = [
            "nomor" => $this->input->post('nomor', true),
            "nama" => $this->input->post('nama', true),
            "provider" => $this->input->post('provider', true),
            "jumlah" => $this->input->post('jumlah', true),
            'fnd' => "ezio29"
        ];

        //$this->db->insert('pulsa', $data);
        $response = $this->_client->request('POST','pulsa',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function hapusDataPulsa($id)
    {
        // $this->db->where('id', $id);
        //$this->db->delete('pulsa', ['id' => $id]);
        $response = $this->_client->request('DELETE', 'pulsa',[
            'form_params'=>[
                'fnd' => 'ezio29',
                'id'=>$id
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }



    public function ubahDataPulsa()
    {
        $data = [
            "nomor" => $this->input->post('nomor', true),
            "nama" => $this->input->post('nama', true),
            "provider" => $this->input->post('provider', true),
            "jumlah" => $this->input->post('jumlah', true),
            "id" => $this->input->post('id', true),
            'fnd' => 'ezio29'
            
        ];

        //$this->db->where('id', $this->input->post('id'));
        //$this->db->update('pulsa', $data);
        $response = $this->_client->request('PUT','pulsa',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function cariDataPulsa()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('jumlah', $keyword);
        $this->db->or_like('nomor', $keyword);
        $this->db->or_like('provider', $keyword);
        return $this->db->get('pulsa')->result_array();
    }
}