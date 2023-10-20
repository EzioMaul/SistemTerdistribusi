<?php


class Pdam_model extends CI_Model
{
    public function getPdam($id = null)
    {
        if($id === null){
            return $this->db->get('pdam')->result_array();
        }else{
            return $this->db->get_where('pdam',['id' => $id])->result_array();
        }
        
    }
    public function deletePdam($id)
    {
        $this->db->delete('pdam',['id'=>$id]);
        return $this->db->affected_rows();
    }
    public function createPdam($data)
    {
        $this->db->insert('pdam',$data);
        return $this->db->affected_rows();
    }
    public function updatePdam($data,$id)
    {
        $this->db->update('pdam',$data,['id'=>$id]);
        return $this->db->affected_rows();
    }
}