<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');   
    
    class complain_model extends CI_Model {
    
     function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function add_complain($data){
        $this->db->insert('complains',$data);
        $id = $this->db->insert_id(); 
        return $id;
        
    }
    
    function update_complain($data,$where){
        $this->db->where($where);
        return $this->db->update('complains', $data); 
    }
    
    function get_complain($where=NULL){
      $this->db->select();
      $query = $this->db->get_where('complains',$where);
      return $query->first_row();  
    }
    
    function get_complains($where=NULL,$limit=NULL,$offset=NULL,$like=null){
      
      $this->db->select();
      $this->db->select('complains.id');
      $this->db->from('complains');
      $this->db->join('clients','clients.id=complains.client_id');
      if($like)$this->db->like($like);
$this->db->order_by('complains.urgent desc,complains.orders asc');
      
      $query = $this->db->get_where(null,$where,$limit,$offset);
      return $query->result();  
    }
    
    
    function delete_complain($where=NULL){
       return $this->db->delete('complains',$where); 
    }
}