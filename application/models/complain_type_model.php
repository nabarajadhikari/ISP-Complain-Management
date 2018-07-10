<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');   
    
    class complain_type_model extends CI_Model {
    
     function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function add_complain_type($data){
        $this->db->insert('complain_type',$data);
        $id = $this->db->insert_id(); 
        return $id;
        
    }
    
    function update_complain_type($data,$where){
        $this->db->where($where);
        return $this->db->update('complain_type', $data); 
    }
    
    function get_complain_type($where=NULL){
      $this->db->select();
      $query = $this->db->get_where('complain_type',$where);
      return $query->first_row();  
    }
    
    function get_complain_types($where=NULL,$limit=NULL,$offset=NULL){
      $this->db->select();
      $query = $this->db->get_where('complain_type',$where,$limit,$offset);
      return $query->result();  
    }
    
     function delete_complain_type($where=NULL){
       return $this->db->delete('complain_type',$where); 
    }
}
?>