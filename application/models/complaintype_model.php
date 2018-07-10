<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');   
    
    class complaintype_model extends CI_Model {
    
     function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function add_ct($data){
        $this->db->insert('complain_type',$data);
        $id = $this->db->insert_id(); 
        return $id;
        
    }
    
    function update_ct($data,$where){
        $this->db->where($where);
        return $this->db->update('complain_type', $data); 
    }
    
    function get_ct($where=NULL){
      $this->db->select();
      $query = $this->db->get_where('complain_type',$where);
      return $query->first_row();  
    }
    
    function get_cts($where=NULL,$order=null,$limit=NULL,$offset=NULL){
      $this->db->select();
      if($order) $this->db->order_by($order);
      $query = $this->db->get_where('complain_type',$where,$limit,$offset);
      return $query->result();  
    }
    
    
    function delete_ct($where=NULL){
       return $this->db->delete('complain_type',$where); 
    }
}