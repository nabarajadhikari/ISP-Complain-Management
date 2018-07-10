<?php
class user extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('client_model');
$this->load->model('complaintype_model');
$this->load->model('complain_type_model');
        $this->load->model('complain_model');
date_default_timezone_set("Asia/Kathmandu");
        $this->load->helper('text');
        
         if(!($this->ion_auth->in_group('admin')|| $this->ion_auth->in_group('superadmin') || $this->ion_auth->in_group('technician') || $this->ion_auth->in_group('user'))){
            flashMsg('error','You are not permitted please. Login to techencian, admin or superadmin panel.');
            redirect('auth/login');
        }
    
    }
    function edit_client($id)
    {
        if($_POST){
            $this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
            $this->form_validation->set_rules('address', 'Address', 'required|xss_clean');
           
$this->form_validation->set_rules('bandwidth', 'Bandwidth', 'required|xss_clean');
$this->form_validation->set_rules('phone', 'Phone Number', 'required|xss_clean');
$this->form_validation->set_rules('ip_address', 'Ip Addres', 'required|xss_clean');
     
            //$this->form_validation->set_rules('ashwin', 'Ashwin', 'required|xss_clean');
            //$this->form_validation->set_rules('renew_date', 'Renew Date', 'required|xss_clean');
            $this->form_validation->set_rules('expiry_date', 'Expire Date', 'required|xss_clean');
            //$this->form_validation->set_rules('rn', 'RN', 'required|xss_clean');
            //$this->form_validation->set_rules('renew_by', 'Renew By', 'required|xss_clean');
            $this->form_validation->set_rules('remark', 'Remark', 'required|xss_clean');
           
            if ($this->form_validation->run() == true )
            {
                
                //$_POST['renew_date']=date("Y-m-d h:m:s"); 
                unset($_POST['id']);
                $result=$this->client_model->update_client($_POST,array('id'=>$id));
               if($result){
                  flashMsg('success','Client successfully updated');
                  redirect('user/show_client');
               }
               else{
                   flashMsg('error','Error updating Client');
                   redirect('user/add_client');  
               }
            }
            else
            { 
                //display the create user form
                //set the flash data error message if there is one
                $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
                flashMsg('error',$this->data['message']); 
            } 
            

        }
        $client=$this->client_model->get_client(array('id'=>$id));
        $data['name'] = array(
            'name'  => 'name',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('name',$client->name),
                    
        );
        $data['address'] = array(
            'name'  => 'address',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('address',$client->address),
        );
        $data['bandwidth'] = array(
            'name'  => 'bandwidth',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('bandwidth',$client->bandwidth),
                    
        );
        $data['ashwin'] = array(
            'name'  => 'ashwin',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('ashwin',$client->ashwin),
        );
        $data['renew_date'] = array(
            'name'  => 'renew_date',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('renew_date',$client->renew_date),
                    
        );
        $data['rn'] = array(
            'name'  => 'rn',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('rn',$client->rn),
        );
        $data['expiry_date'] = array(
            'name'  => 'expiry_date',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('expiry_date',$client->expiry_date),
                    
        );
        $data['renew_by'] = array(
            'name'  => 'renew_by',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('renew_by',$client->renew_by),
        );
        $data['remark'] = array(
            'name'  => 'remark',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('remark',$client->remark),
        );
		$data['phone'] = array(
            'name'  => 'phone',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('phone',$client->phone),
        );
		$data['ip_address'] = array(
            'name'  => 'ip_address',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('ip_address',$client->ip_address),
        );
        $data['module']='user';
        $data['id'];
        $data['page']='edit_client';
        if($this->session->userdata('user_group')=='admin')$this->load->view('admin_container',$data);
        else $this->load->view('admin_container',$data);
        
    }
    function add_client()
    {
        if($_POST){
            $this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
            $this->form_validation->set_rules('address', 'Address', 'required|xss_clean');
            $this->form_validation->set_rules('bandwidth', 'Bandwidth', 'required|xss_clean');
$this->form_validation->set_rules('phone', 'Phone Number', 'required|xss_clean');
$this->form_validation->set_rules('ip_address', 'Ip Addres', 'required|xss_clean');
           // $this->form_validation->set_rules('ashwin', 'Ashwin', 'required|xss_clean');
            //$this->form_validation->set_rules('renew_date', 'Renew Date', 'required|xss_clean');
            $this->form_validation->set_rules('expiry_date', 'Expire Date', 'required|xss_clean');
           // $this->form_validation->set_rules('rn', 'RN', 'required|xss_clean');
            //$this->form_validation->set_rules('renew_by', 'Renew By', 'required|xss_clean');
            $this->form_validation->set_rules('remark', 'Remark', 'required|xss_clean');
            if($_POST['id']!=$id){
                flashMsg('error','Security Error');
                redirect('user/show_client');
            }
            if ($this->form_validation->run() == true )
            {
                
                $_POST['renew_date']=date("Y-m-d H:i:s");
 
                $result=$this->client_model->add_client($_POST);
               if($result){
                  flashMsg('success','Client successfully added');
                  redirect('user/show_client');
               }
               else{
                   flashMsg('error','Error adding new Client');
                   redirect('user/add_client');  
               }
            }
            else
            { 
                //display the create user form
                //set the flash data error message if there is one
                $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
                flashMsg('error',$this->data['message']); 
            } 
            

        }
        $data['name'] = array(
            'name'  => 'name',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('name'),
                    
        );
        $data['address'] = array(
            'name'  => 'address',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('address'),
        );
        $data['bandwidth'] = array(
            'name'  => 'bandwidth',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('bandwidth'),
                    
        );
        $data['ashwin'] = array(
            'name'  => 'ashwin',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('ashwin'),
        );
        $data['renew_date'] = array(
            'name'  => 'renew_date',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('renew_date'),
                    
        );
        $data['rn'] = array(
            'name'  => 'rn',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('rn'),
        );
        $data['expiry_date'] = array(
            'name'  => 'expiry_date',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('expiry_date'),
                    
        );
        $data['renew_by'] = array(
            'name'  => 'renew_by',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('renew_by'),
        );
		$data['phone'] = array(
            'name'  => 'phone',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('phone_no'),
        );
		$data['ip_address'] = array(
            'name'  => 'ip_address',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('ip_address'),
        );
        $data['remark'] = array(
            'name'  => 'remark',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('remark'),
        );
        $data['module']='user';
        $data['page']='add_client';
        if($this->session->userdata('user_group')=='admin')$this->load->view('admin_container',$data);
        else $this->load->view('admin_container',$data);
        
    }
    
    function show_client($page_number=NULL,$limit=NULL,$flag=null){
            if($_POST){
              $limit=$_POST['limit'];  
if($_POST['name'])
{
$arr['name']=$_POST['name'];
}
  
            }
            else{
                $limit=20;  
            }
            $arr=null;
            $all_informations=$this->client_model->get_clients($arr);
            $max_results =count($all_informations);     
            $pagi_informations=$this->client_model->get_clients($arr,null,$limit,pagination_offset($page_number,$limit));
            $data["page_number"] = $page_number;
            $data["max_results"] = $max_results;
            $data["limit"]=$limit;
            $data["page_prefix"] = site_url("user/show_client/").'/';
            $data["page_suffix"] = $flag;
            $data['module']='user';
            $data['page']='show_client';
            $data['blogs']=$pagi_informations;
            $this->load->view('admin_container',$data);  
        }
    function add_complain()
    {
        if($_POST){
//mdie($_POST);
            $this->form_validation->set_rules('complain_title', 'Title', 'required|xss_clean');
            $this->form_validation->set_rules('complain_message', 'Message', 'required|xss_clean');
            $this->form_validation->set_rules('client_id', 'Client', 'required|xss_clean');
            if ($this->form_validation->run() == true )
            {
                
                $_POST['created_date']=date("Y-m-d H:i:s");
                $_POST['user_id']=$this->session->userdata('user_id');
                $_POST['status']='Pending';
				 $_POST['status_id']=0; 
if($_POST['urgent']==on){ $_POST['urgent']=1;$_POST['status']='Urgent Pending'; $_POST['status_id']=-1; }
                $result=$this->complain_model->add_complain($_POST);
               if($result){
                  flashMsg('success','Client Complain successfully added');
                  redirect('user/show_complain');
               }
               else{
                   flashMsg('error','Error adding new Complain');
                   redirect('user/add_complain');  
               }
            }
            else
            { 
                //display the create user form
                //set the flash data error message if there is one
                $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
                flashMsg('error',$this->data['message']); 
            } 
            

        }
        $data['complain_title'] = array(
            'name'  => 'complain_title',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('complain_title'),
                    
        );
        $data['complain_message'] = array(
            'name'  => 'complain_message',
            'type'  => 'textarea',
            'rows'=>'10',
            
            'value' => $this->form_validation->set_value('complain_message'),
        );

        $data['selected_client'] = $this->form_validation->set_value('client_id');
        $clients=$this->client_model->get_clients(null,'name');
        $data['client_option'][null]='Choose Clients';
        foreach($clients as $client)
        {
            $data['client_option'][$client->id]=$client->name.', '.$client->address;
        } 
       $data['selected_ct'] = $this->form_validation->set_value('complain_title');
        $cts=$this->complaintype_model->get_cts(null);
        $data['ct_option'][null]='Choose Complaine type';
        foreach($cts as $ct)
        {
            $data['ct_option'][$ct->name]=$ct->name;
        }             
        $data['module']='user';
        $data['page']='add_complain';
        if($this->session->userdata('user_group')=='admin')$this->load->view('admin_container',$data);
        else $this->load->view('admin_container',$data);
        
    }
    function edit_complain($id)
    {
 $complain=$this->complain_model->get_complain(array('id'=>$id)); 
       
if($_POST){
//mdie($_POST);
            $this->form_validation->set_rules('complain_title', 'Title', 'required|xss_clean');
            $this->form_validation->set_rules('complain_message', 'Message', 'required|xss_clean');
            $this->form_validation->set_rules('client_id', 'Client', 'required|xss_clean');
            if($_POST['id']!=$id){
                flashMsg('error','Security Error');
            }
            if ($this->form_validation->run() == true )
            {
                $_POST['last_update']=date("Y-m-d H:i:s");
                $_POST['updated_by']=$this->session->userdata('user_id');
    if(isset($_POST['urgent'])) {$_POST['urgent']=1;}
else {$_POST['urgent']=0;}
                unset($_POST['id']);

                $result=$this->complain_model->update_complain($_POST,array('id'=>$id));
               if($result){
                  flashMsg('success','Client Complain successfully updated');
                  redirect('user/show_complain');
               }
               else{
                   flashMsg('error','Error updating  Complain');
                   redirect('user/show_complain');  
               }
            }
            else
            { 
                //display the create user form
                //set the flash data error message if there is one
                $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
                flashMsg('error',$this->data['message']); 
            } 
            

        }
       
        $data['complain_title'] = array(
            'name'  => 'complain_title',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('complain_title',$complain->complain_title),
                    
        );
        $data['complain_message'] = array(
            'name'  => 'complain_message',
            'type'  => 'textarea',
            'rows'=>'10',
            
            'value' => $this->form_validation->set_value('complain_message',$complain->complain_message),
        );
        $data['selected_client'] = $this->form_validation->set_value('client_id',$complain->client_id);
        $clients=$this->client_model->get_clients(null,'name');
        $data['client_option'][null]='Choose Clients';
        foreach($clients as $client)
        {
            $data['client_option'][$client->id]=$client->name.', '.$client->address;
        }
        $data['module']='user';
        $data['id']=$id;
$data['urgnt']=$complain->urgent;
        $data['page']='edit_complain';
        if($this->session->userdata('user_group')=='admin')$this->load->view('admin_container',$data);
        else $this->load->view('admin_container',$data);
        
    }
    function delete_complain($id){
              $result=$this->complain_model->delete_complain(array('id'=>$id));
               if($result){
                  flashMsg('success','Client Complain successfully deleted');
                  redirect('user/show_complain');
               }
               else{
                   flashMsg('error','Error deleting  Complain');
                   redirect('user/show_complain');  
               }
    }
    function show_complain($page_number=NULL,$limit=NULL,$flag=null)
    {
            if($_POST){
              $limit=$_POST['limit'];    
            }
            else{
                $limit=20;  
            }
            $arr=null;
            $all_informations=$this->complain_model->get_complains($arr);
            $max_results =count($all_informations);     
            $pagi_informations=$this->complain_model->get_complains($arr,$limit,pagination_offset($page_number,$limit));
            $data["page_number"] = $page_number;
            $data["max_results"] = $max_results;
            $data["limit"]=$limit;
            $data["page_prefix"] = site_url("user/show_complain/").'/';
            $data["page_suffix"] = $flag;
            $data['module']='user';
            $data['page']='show_complain';
            $data['blogs']=$pagi_informations;
            $this->load->view('admin_container',$data);  
        }
         function showcomplains($page_number=NULL,$limit=NULL,$flag=null)
    {
            if($_POST){
              $limit=$_POST['limit'];    
            }
            else{
                $limit=20;  
            }
            $arr=null;
            $all_informations=$this->complain_model->get_complains($arr);
            $max_results =count($all_informations);     
            $pagi_informations=$this->complain_model->get_complains($arr,$limit,pagination_offset($page_number,$limit));
            $data["page_number"] = $page_number;
            $data["max_results"] = $max_results;
            $data["limit"]=$limit;
            $data["page_prefix"] = site_url("user/showcomplains/").'/';
            $data["page_suffix"] = $flag;
            $data['module']='user';
            $data['page']='flash_div_user';
            $data['blogs']=$pagi_informations;
            $this->load->view('user/flash_div_user',$data);  
        }
        
        
        function autolode($page_number=NULL,$limit=NULL)
        {
            $data['blogs']=$this->complain_model->get_complains(null,$limit,pagination_offset($page_number,$limit));
            $this->load->view('user/flash_div_user',$data);
        }
        function get_complain_search()
        {
            if($_POST)
            {
              if($_POST['assigned_technecian'])$where['assigned_technecian']=$_POST['assigned_technecian'];else $where=null;  
              if($_POST['status'])$like['status']=$_POST['status'];
              if($_POST['complain_title'])$like['complain_title']=$_POST['complain_title'];
              if($_POST['name'])$like['name']=$_POST['name'];
              $data['blogs']=$this->complain_model->get_complains($where,null,null,$like);
              $data['module']='user';
              $data['page']=$this->ion_auth->in_group('user')?'show_complain':'show_complain1';
              $this->load->view('admin_container',$data);
            }
            redirect_back();
        }  
		 //complain types management
	      function show_complain_type($page_number=NULL,$limit=NULL,$flag=null)
        {
            if($_POST){
              $limit=$_POST['limit'];    
            }
            else{
                $limit=20;  
            }
            $arr=null;
            $all_informations=$this->complain_type_model->get_complain_types($arr);
            $max_results =count($all_informations);     
            $pagi_informations=$this->complain_type_model->get_complain_types($arr,$limit,pagination_offset($page_number,$limit));
            $data["page_number"] = $page_number;
            $data["max_results"] = $max_results;
            $data["limit"]=$limit;
            $data["page_prefix"] = site_url("admin/show_complain_type/").'/';
            $data["page_suffix"] = $flag;
            $data['module']='user';
            $data['page']='show_complain_type';
            $data['blogs']=$pagi_informations;
            $this->load->view('admin_container',$data);  
        }
        function add_complain_type()
       {
        if($_POST){
            $this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
            $this->form_validation->set_rules('desc', 'Description', 'required|xss_clean');
            if ($this->form_validation->run() == true )
            {
                
                $result=$this->complain_type_model->add_complain_type($_POST);
                if($result){
                  flashMsg('success','Complain Type successfully added');
                  redirect('admin/show_complain_type');
               }
               else{
                   flashMsg('error','Error adding new Complain Type');
                   redirect('admin/show_complain_type');  
               }
            }
            else
            { 
                //display the create user form
                //set the flash data error message if there is one
                $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
                flashMsg('error',$this->data['message']); 
            } 
            

        }
        $data['name'] = array(
            'name'  => 'name',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('name'),
                    
        );
 

        $data['desc'] = array(
            'name'  => 'desc',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'rows'  => '7',
            'cols'  => '25',
            'value' => $this->form_validation->set_value('desc'),
        );
        $data['module']='user';
        $data['page']='add_complain_type';
        $this->load->view('admin_container',$data);
        
    }
    function edit_complain_type($id)
    {
        $complain_type=$this->complain_type_model->get_complain_type(array('id'=>$id));
        
        if($_POST){
        if($_POST['id']!=$id){
                flashMsg('error','Security Error');
                redirect('admin/show_complain_type');
        }
            $this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
            $this->form_validation->set_rules('desc', 'Description', 'required|xss_clean');
            if ($this->form_validation->run() == true )
            {
                
                $result=$this->complain_type_model->update_complain_type($_POST,array('id'=>$id));
                if($result){
                  flashMsg('success','Complain Type successfully Updated');
                  redirect('admin/show_complain_type');
               }
               else{
                   flashMsg('error','Error updating new Complain Type');
                   redirect('admin/show_complain_type');  
               }
            }
            else
            { 
                //display the create user form
                //set the flash data error message if there is one
                $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
                flashMsg('error',$this->data['message']); 
            } 
            

        }
        $data['name'] = array(
            'name'  => 'name',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('name',$complain_type->name),
                    
        );
 

        $data['desc'] = array(
            'name'  => 'desc',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'rows'  => '7',
            'cols'  => '25',
            'value' => $this->form_validation->set_value('desc',$complain_type->desc),
        );
        $data['module']='user';
        $data['id']=$id;
        $data['page']='edit_complain_type';
        $this->load->view('admin_container',$data);
        
    }
	//update status once..
	
	function updatestatus()
	{
	 $where=array('status'=>"Finished");
	 $data['status_id']=3;
	 $this->complain_model->update_complain($data,$where);
	}
    
}
?>