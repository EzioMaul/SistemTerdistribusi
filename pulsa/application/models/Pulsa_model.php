<?php


class Pulsa_model extends CI_Model
{
    public function getPulsa($id = null)
    {
        if($id === null){
            return $this->db->get('pulsa')->result_array();
        }else{
            return $this->db->get_where('pulsa',['id' => $id])->result_array();
        }
        
    }
    public function deletePulsa($id)
    {
        $this->db->delete('pulsa',['id'=>$id]);
        return $this->db->affected_rows();
    }
    public function createPulsa($data)
    {
        $this->db->insert('pulsa',$data);
        return $this->db->affected_rows();
    }
    public function updatePulsa($data,$id)
    {
        $this->db->update('pulsa',$data,['id'=>$id]);
        return $this->db->affected_rows();
    }
}