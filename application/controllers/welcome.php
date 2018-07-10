<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
          
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
     function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('client_model');
date_default_timezone_set("Asia/Kathmandu"); 
        $this->load->model('complain_model');
        $this->load->helper('text');

        
         
    
    }
	function index($page_number=NULL,$limit=NULL,$flag=null)
    {
            
                $limit=20;  
           
            $arr=null;
            $all_informations=$this->complain_model->get_complains();
            $max_results =count($all_informations);     
            $pagi_informations=$this->complain_model->get_complains(null,$limit,pagination_offset($page_number,$limit));
            $data["page_number"] = $page_number;
            $data["max_results"] = $max_results;
            $data["limit"]=$limit;
            $data["page_prefix"] = site_url("welcome/index/").'/';
            $data["page_suffix"] = $flag;
            $data['blogs']=$pagi_informations;
            $this->load->view('user/show_complain11',$data);  
        }
    
    function autolode($page_number=NULL,$limit=NULL)
    {
            $data['blogs']=$this->complain_model->get_complains(null,null,$limit,pagination_offset($page_number,$limit));
            $this->load->view('user/flash_div_user',$data);
    }
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */