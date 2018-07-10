<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');   
    
    class user_model extends CI_Model {
    
     function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function insert_profile($data){
        $this->db->insert("users_profile",$data);
        $id = $this->db->insert_id(); 
        return $id;
        
    }
  function update_profile($where,$data){
        $this->db->where($where);
        return $this->db->update('users_profile',$data);
          
    }
    function get_profile($where=NULL){
      $this->db->select();
      $query = $this->db->get_where('users_profile',$where);
      return $query->first_row();  
    }
    function check_profile($where){
      $this->db->select();
      $this->db->from('users_profile');
      $this->db->where($where); 
      return $this->db->count_all_results(); 
        
    }
  } 
?>
