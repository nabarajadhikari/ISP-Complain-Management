<?php
class admin extends CI_Controller {

        function __construct()
        {
            parent::__construct();
            $this->load->library('ion_auth');
            $this->load->helper('text');
            $this->load->model('complain_model');
            $this->load->model('client_model');
date_default_timezone_set("Asia/Kathmandu");
            if(!($this->ion_auth->in_group('admin')|| $this->ion_auth->in_group('superadmin'))){
                flashMsg('error','You are not permitted please. Login to agent or superadmin panel.');
                redirect('auth/login');
            }
    
        }
        function get_append_form_assigned(){
                $complain=$this->complain_model->get_complain(array('id'=>$_POST['id']));
                $client=$this->client_model->get_client(array('id'=>$complain->client_id));
                $html='<h2 class="ico_posts">Assign Technecian</h2>'; 
                $html.='Complain Title:'.$complain->complain_title.'</br/>';
                $html.='Client Name:'.$client->name.'<br/>';
                $html.='Client Address:'.$client->address.'<br/>';
                $technecian=array(null=>'Choose Technecian');
                $technecians=$this->ion_auth->users('3')->result();
                foreach($technecians as $user)
                {
                      $technecian[$user->id]=$user->first_name.' '.$user->last_name;
                }
                $html.=form_open('admin/assign_technecian').'Technecian:'.form_dropdown('assigned_technecian',$technecian,'id="assigned_technecian"').'<br/>'; 
                $html.='<input type="hidden" name="id" value="'.$complain->id.'"><input type="submit" value="Assign"></form>';
                echo $html;
                exit();
        }
        function assign_technecian(){
            if($_POST['assigned_technecian'])
            {
              $result=$this->complain_model->update_complain(array('assigned_date'=>date("Y-m-d h:m:s"),'assigned_technecian'=>$_POST['assigned_technecian'],'status'=>'Assigned'),array('id'=>$_POST['id']));
              if($result)
              {
                flashMsg('success','Technecian successfully Assigned');
              }
              else
                 flashMsg('error','error in assigning technecian.');
            }else{
               flashMsg('error','Technecian is not choosen');
            }
            redirect_back();
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
            $data["page_prefix"] = site_url("admin/show_complain1/").'/';
            $data["page_suffix"] = $flag;
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
            $data['blogs']=$pagi_informations;
            $this->load->view('admin_container',$data);  
        }
        
        
        function index()
        {
             mdie('home');
        }
        function autolode($page_number=NULL,$limit=NULL)
        {
            $data['blogs']=$this->complain_model->get_complains(null,$limit,pagination_offset($page_number,$limit));
            // tech
            $technecian=array(null=>'Choose Technecian');
            $technecians=$this->ion_auth->users('3')->result();
            foreach($technecians as $user)
                {
                      $technecian[$user->id]=$user->first_name.' '.$user->last_name;
                }
                $data['technecian_options']=$technecian;
            //tech
            $this->load->view('user/flash_div',$data);
        }
        function upload_data(){
        if($_FILES)
        {    //mdie($_FILES);
            $config['upload_path'] = FCPATH.'assets/';
            $config['max_size']    = '2140000';
            $config['allowed_types'] = 'xlsx|xls';
            $config['overwrite']  =false;
            $config['file_name']=uniqid();
            
            $this->load->library('upload', $config); 

            if ( ! $this->upload->do_upload())
            {
                $error = array('error' => $this->upload->display_errors());
                flashMsg('error',$error);
                
            }
            else
            {
                $d=$this->upload->data();
                flashMsg('success','file Uploaded');
                $this->load->library('excelreader/spreadsheet_excel_reader');
                $this->spreadsheet_excel_reader->setOutputEncoding('CP1251'); // Set output Encoding.
                $this->spreadsheet_excel_reader->read(FCPATH.'assets/'.$d[file_name]); // relative path to .xls that was uploaded earlier
            
                $rows = $this->spreadsheet_excel_reader->sheets[0]['cells'];
                $row_count = count($this->spreadsheet_excel_reader->sheets[0]['cells']);
                flashMsg('success','Total Rows= '.$row_count);
                $success=$error=0;$s_msg=''; $e_msg='';
                for ($i = 2; $i <= $row_count; $i++) {
                    $_POST['name']=$rows[$i][2];
                    $_POST['address']=$rows[$i][3];
                    $_POST['bandwidth']=$rows[$i][4];
                    $_POST['renew_date']=$rows[$i][6];
                    $_POST['expiry_date']=$rows[$i][7];
                    $_POST['rn']=$rows[$i][8];
                    $_POST['remark']=$rows[$i][10];
                   
                   
                    $_POST['renew_by']=$this->session->userdata('user_id');
                    $result=$this->client_model->add_client($_POST);
                    if($result){
                        $success++;
                        $s_msg.=$i.' ';
  
                    }
                   else{
                        $error++;
                        $e_msg.=$i.' ';  
                   }
                
                
                }
                if($success)flashMsg('success','row '.$s_msg.' successfully added');
                if($error)flashMsg('error','Error adding following rows:'.$e_msg);
                $result=@unlink(FCPATH.'assets/'.$d[file_name]);
                if($result)
                {
                    flashMsg('success','file successfully deleted from the temporary location');
                }
                
            }
             
        }
        
        $data['module']='user';
        $data['page']='upload_file';
        $this->load->view('admin_container',$data);
     }
	    
}
?>