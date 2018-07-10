<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');   
    
    class information_type_model extends CI_Model {
    
     function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function add_information_type($data){
        $this->db->insert('information_type',$data);
        $id = $this->db->insert_id(); 
        return $id;
        
    }
    
    function update_information_type($data,$where){
        $this->db->where($where);
        return $this->db->update('information_type', $data); 
    }
    
    function get_information_type($where=NULL){
      $this->db->select();
      $query = $this->db->get_where('information_type',$where);
      return $query->first_row();  
    }
    
    function get_information_types($where=NULL,$limit=NULL,$offset=NULL){
      $query = $this->db->get_where('information_type',$where,$limit,$offset);
      return $query->result();  
    }
    
     function delete_information_type($where=NULL){
       return $this->db->delete('information_type',$where); 
    }
}