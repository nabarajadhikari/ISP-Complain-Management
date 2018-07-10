<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');   
    
    class information_model extends CI_Model {
    
     function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function add_information($data){
        $this->db->insert('information',$data);
        $id = $this->db->insert_id(); 
        return $id;
        
    }
    
    function update_information($data,$where){
        $this->db->where($where);
        return $this->db->update('information', $data); 
    }
    
    function get_information($where=NULL){
      $this->db->select();
      $query = $this->db->get_where('information',$where);
      return $query->first_row();  
    }
    
    function get_informations($where=NULL,$limit=NULL,$offset=NULL){
      $this->db->select();
      $this->db->select('information.id,information.title');
      $this->db->from('information');
      $this->db->join('information_type','information_type.id=information.information_type');
      $query = $this->db->get_where(null,$where,$limit,$offset);
      return $query->result();  
    }
    
     function delete_information($where=NULL){
       return $this->db->delete('information',$where); 
    }
}