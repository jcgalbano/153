<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Session_model extends CI_Model {


public function insert($data) {

      $this->db->where('id',$data['id']);
      $query = $this->db->query("SELECT * FROM ci_sessions WHERE id = ".$data['id']);
      
      if ($query->num_rows() > 0){
      
      }
      else{
        $this->db->insert('ci_sessions', $data); 
      }

      $this->db->select("username");
      $this->db->from("ci_sessions");
      $query = $this->db->get(); 
      return $query->result();

}

public function row_delete($data){
    
       $this->db->where('id', $data);
       $this->db->delete('ci_sessions'); 
}

public function get(){

return $this->db->get('ci_sessions')->result();

}
}
