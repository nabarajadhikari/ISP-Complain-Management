<?php
class technician extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->helper('text');
        $this->load->model('complain_model');
        $this->load->model('client_model');
date_default_timezone_set('Asia/Kathmandu');
        
        
        
        if(!($this->ion_auth->in_group('admin')|| $this->ion_auth->in_group('superadmin') || $this->ion_auth->in_group('technician'))){
            flashMsg('error','You are not permitted please. Login to techencian, admin or superadmin panel.');
            redirect('auth/login');
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
            $technecian_id=$this->session->userdata('user_id');
            $arr['assigned_technecian']=$technecian_id;
            $all_informations=$this->complain_model->get_complains($arr);
            $max_results =count($all_informations);     
            $pagi_informations=$this->complain_model->get_complains($arr,$limit,pagination_offset($page_number,$limit));
            $data["page_number"] = $page_number;
            $data["max_results"] = $max_results;
            $data["limit"]=$limit;
            $data["page_prefix"] = site_url("admin/show_complain/").'/';
            $data["page_suffix"] = $flag;
            $data['module']='user';
            $data['page']='show_complain1';
            $data['blogs']=$pagi_informations;
            $this->load->view('admin_container',$data);  
        }
    function get_append_form_processing(){
                if($this->session->userdata('user_group')=='superadmin' || $this->session->userdata('user_group')=='admin')
                {
                   $complain=$this->complain_model->get_complain(array('id'=>$_POST['id'])); 
                }
                else
                {
                   $technecian_id=$this->session->userdata('user_id');
                   $complain=$this->complain_model->get_complain(array('id'=>$_POST['id']));
                   if($complain->assigned_technician=!$technecian_id && $this->session->userdata('user_group')=='technician')
                   {   
                        echo 'Access denied.Login as proper Technecian or higher level user.';
                        exit();
                   }
                }
                $client=$this->client_model->get_client(array('id'=>$complain->client_id));
                $html='<h2 class="ico_posts">Processing Continue..</h2>'; 
                $html.='Complain Title:'.$complain->complain_title.'</br/>';
                $html.='Client Name:'.$client->name.'<br/>';
                $html.='Client Address:'.$client->address.'<br/>';
                
                $technecian=$this->ion_auth->user($complain->assigned_technecian)->row();
                $html.=form_open('technician/update_complain_processing').'Technecian Comments:'.form_textarea(array('name'=>'technecian_comments','rows'=>7),$complain->technecian_comments,'id="technecian_comments"').'<br/>'; 
                $html.='<input type="hidden" name="id" value="'.$complain->id.'"><input type="submit" value="Update"></form>';
                echo $html;
                exit();
        }
    function update_complain_processing()
    {
        
        if($_POST['technecian_comments']==null)$_POST['technecian_comments']='I have started the Work';
        if($_POST['id'])
        {     
              $complain=$this->complain_model->get_complain(array('id'=>$_POST['id']));
              $post=array('technecian_comments'=>$_POST['technecian_comments'],'status'=>'Processing');
			  $post['status_id']=3;
              if($complain->processing_date==null)$post['processing_date']=date("Y-m-d H:i:s");
              $result=$this->complain_model->update_complain($post,array('id'=>$_POST['id']));
              if($result)
              {
                flashMsg('success','Status successfully updated to Processing');
              }
              else
                 flashMsg('error','error in Updating Processing Information.');
        }
        redirect_back();
        
    }
    function get_append_form_finished(){
                if($this->session->userdata('user_group')=='superadmin' || $this->session->userdata('user_group')=='admin')
                {
                   $complain=$this->complain_model->get_complain(array('id'=>$_POST['id'])); 
                }
                else
                {
                   $technecian_id=$this->session->userdata('user_id');
                   $complain=$this->complain_model->get_complain(array('id'=>$_POST['id']));
                   if($complain->assigned_technician=!$technecian_id && $this->session->userdata('user_group')=='technician')
                   {   
                        echo 'Access denied.Login as proper Technecian or higher level user.';
                        exit();
                   }
                }
                $client=$this->client_model->get_client(array('id'=>$complain->client_id));
                $html='<h2 class="ico_posts">Processing Finished</h2>'; 
                $html.='Complain Title:'.$complain->complain_title.'</br/>';
                $html.='Client Name:'.$client->name.'<br/>';
                $html.='Client Address:'.$client->address.'<br/>';
                $technecian=$this->ion_auth->user($complain->assigned_technecian)->row();
                $html.=form_open('technician/update_complain_finished').'Technecian Comments:'.form_textarea(array('name'=>'technecian_comments','rows'=>7),$complain->technecian_comments,'id="technecian_comments"').'<br/>'; 
                $html.='<input type="hidden" name="id" value="'.$complain->id.'"><input type="submit" value="Update"></form>';
                echo $html;
                exit();
        }
    function update_complain_finished()
    {
        
        if($_POST['technecian_comments']==null)$_POST['technecian_comments']='I have started the Work';
        if($_POST['id'])
        {     
              $complain=$this->complain_model->get_complain(array('id'=>$_POST['id']));
              $post=array('technecian_comments'=>$_POST['technecian_comments'],'status'=>'Finished');
			  $post['status_id']=4;
              if($complain->finished_date==null)$post['finished_date']=date("Y-m-d H:i:s");
              $result=$this->complain_model->update_complain($post,array('id'=>$_POST['id']));
              if($result)
              {
                flashMsg('success','Status successfully updated to Finished');
              }
              else
                 flashMsg('error','error in Updating Processing Information.');
        }
        redirect_back();
        
    }
    function autolode($page_number=NULL,$limit=NULL)
        {   $technecian_id=$this->session->userdata('user_id');
            $data['blogs']=$this->complain_model->get_complains(array('assigned_technecian'=>$technecian_id),$limit,pagination_offset($page_number,$limit));
            $this->load->view('user/flash_div',$data);
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
              $data["page_number"] = null;
              $data["max_results"] = count($data['blogs']);
              $data["limit"]=$data["max_results"]+1;
              $data["page_prefix"] = site_url("admin/show_complain/").'/';
              $data["page_suffix"] ='';
              // tech
            $technecian=array(null=>'Choose Technecian');
            $technecians=$this->ion_auth->users('3')->result();
            foreach($technecians as $user)
                {
                      $technecian[$user->id]=$user->first_name.' '.$user->last_name;
                }
                $data['technecian_options']=$technecian;
            //tech 
              $data['module']='user';
              $data['page']='show_complain1';
              $this->load->view('admin_container',$data);
            }
            
        }
}
?>