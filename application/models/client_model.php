<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');   
    
    class client_model extends CI_Model {
    
     function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function add_client($data){
        $this->db->insert('clients',$data);
        $id = $this->db->insert_id(); 
        return $id;
        
    }
    
    function update_client($data,$where){
        $this->db->where($where);
        return $this->db->update('clients', $data); 
    }
    
    function get_client($where=NULL){
      $this->db->select();
      $query = $this->db->get_where('clients',$where);
      return $query->first_row();  
    }
    
    function get_clients($where=NULL,$order=null,$limit=NULL,$offset=NULL){
      $this->db->select();
      if($order) $this->db->order_by($order);
else $this->db->order_by('id','desc');
      $query = $this->db->get_where('clients',$where,$limit,$offset);
      return $query->result();  
    }
    
    
    function delete_client($where=NULL){
       return $this->db->delete('clients',$where); 
    }
}