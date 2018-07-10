<?php
class report extends CI_Controller {

        function __construct()
        {
            parent::__construct();
            $this->load->library('ion_auth');
            $this->load->helper('text');
            $this->load->model('complain_model');
            $this->load->model('client_model');
            $this->load->model('complain_type_model');
			date_default_timezone_set("Asia/Kathmandu");
            if(!($this->ion_auth->in_group('admin')|| $this->ion_auth->in_group('superadmin'))){
                flashMsg('error','You are not permitted please. Login to agent or superadmin panel.');
                redirect('auth/login');
            }
    
        }
        function show_complain()
        {
            
            $where=null;
            $like=null;
            if($_POST){
              
              if($_POST['assigned_technecian'])
              {
                $where['assigned_technecian']=$_POST['assigned_technecian'];
                
              }
              if($_POST['created_date_l'])
              {
                if($_POST['created_date_u']) $where['created_date >=']=$_POST['created_date_l'];
                else $like['created_date']=$_POST['created_date_l'];
                
              }
              if($_POST['created_date_u'])
              {
                $where['created_date <=']=$_POST['created_date_u'];
                
              }
              if($_POST['finished_date_l'])
              {
                if($_POST['finished_date_u']) $where['finished_date >=']=$_POST['finished_date_l'];
                else $like['finished_date']=$_POST['finished_date_l'];
                
              }
              if($_POST['finished_date_u'])
              {
                $where['finished_date <=']=$_POST['finished_date_u'];
                
              }
              if($_POST['assigned_date_l'])
              {
                if($_POST['assigned_date_u']) $where['assigned_date >=']=$_POST['assigned_date_l'];
                else $like['assigned_date']=$_POST['assigned_date_l'];
                
              }
              if($_POST['assigned_date_u'])
              {
                $where['assigned_date <=']=$_POST['assigned_date_u'];
                
              }  
              if($_POST['statuss'])
              {
                $like['status']=$_POST['statuss'];
              }
              if($_POST['complain_title'])
              {
                $like['complain_title']=$_POST['complain_title'];
              }
              if($_POST['name'])
              {
                $like['name']=$_POST['name'];
              }
              $this->session->set_userdata($_POST);
                  
            }
            else{
                $arr=array('created_date_l' => '','created_date_u' => '','finished_date_l' => '','finished_date_u' => '','assigned_date_l' => '','assigned_date_u' => '','name' => '', 'complain_title' => '','statuss' => '','assigned_technecian' => '');
                $this->session->unset_userdata($arr);
            }
           
            $all_informations=$this->complain_model->get_complains($where,null,null,$like);
            $technecian=array(null=>'Choose Technecian');
            $technecians=$this->ion_auth->users('3')->result();
            foreach($technecians as $user)
                {
                      $technecian[$user->id]=$user->first_name.' '.$user->last_name;
                }
            $data['technecian_options']=$technecian;
            //tech
            $data['module']='admin';
            $data['page']='show_complain_report';
            $data['blogs']=$all_informations;
            $this->load->view('admin_container',$data);  
        }
        function print_report()
        {
              if($this->session->userdata('assigned_technecian'))
              {
                $where['assigned_technecian']=$this->session->userdata('assigned_technecian');
                
              }
              if($this->session->userdata('created_date_l'))
              {
                if($this->session->userdata('created_date_u')) $where['created_date >=']=$this->session->userdata('created_date_l');
                else $like['created_date']=$this->session->userdata('created_date_l');
                
              }
              if($this->session->userdata('created_date_u'))
              {
                $where['created_date <=']=$this->session->userdata('created_date_u');
                
              }
              if($this->session->userdata('finished_date_l'))
              {
                if($this->session->userdata('finished_date_u')) $where['finished_date >=']=$this->session->userdata('finished_date_l');
                else $like['finished_date']=$this->session->userdata('finished_date_l');
                
              }
              if($this->session->userdata('finished_date_u'))
              {
                $where['finished_date <=']=$this->session->userdata('finished_date_u');
                
              }
              if($this->session->userdata('assigned_date_l'))
              {
                if($_POST['assigned_date_u']) $where['assigned_date >=']=$this->session->userdata('assigned_date_l');
                else $like['assigned_date']=$this->session->userdata('assigned_date_l');
                
              }
              if($this->session->userdata('assigned_date_u'))
              {
                $where['assigned_date <=']=$this->session->userdata('assigned_date_u');
                
              }  
              if($this->session->userdata('statuss'))
              {
                $like['status']=$this->session->userdata('statuss');
              }
              if($this->session->userdata('complain_title'))
              {
                $like['complain_title']=$this->session->userdata('complain_title');
              }
              if($this->session->userdata('name'))
              {
                $like['name']=$this->session->userdata('name');
              }
              $data['blogs']=$this->complain_model->get_complains($where,null,null,$like);
                $technecian=array(null=>'Choose Technecian');
                $technecians=$this->ion_auth->users('3')->result();
                foreach($technecians as $user)
                    {
                          $technecian[$user->id]=$user->first_name.' '.$user->last_name;
                    }
                $data['technecian_options']=$technecian;
                $this->load->view('admin/print_report',$data);
    
        }
        
        
        function index()
        {
             redirect('report/show_complain');
        }
        
   
}
?>