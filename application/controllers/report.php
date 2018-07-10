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
            if($_POST){ //mdie($_POST);
              
              if($_POST['assigned_technecian'])
              {
                $where['assigned_technecian']=$_POST['assigned_technecian'];
                $this->session->set_userdata('assigned_technecian',$_POST['assigned_technecian']);
                
              }
              else
              $this->session->set_userdata('assigned_technecian');
              
              if($_POST['created_date_l']&& $_POST['created_date_l']!="0000-00-00")
              {
                if($_POST['created_date_u']) $where['created_date >=']=$_POST['created_date_l'];
                else $like['created_date']=$_POST['created_date_l'];
                $this->session->set_userdata('created_date_l',$_POST['created_date_l']);
                
              }
              else
              $this->session->set_userdata('created_date_l');
              if($_POST['created_date_u'] && $_POST['created_date_u'] !='0000-00-00' )
              {
                $where['created_date <=']=$_POST['created_date_u'];
                $this->session->set_userdata('created_date_u',$_POST['created_date_u']);
                
              }
              else
              $this->session->set_userdata('created_date_u');
              if($_POST['finished_date_l'] && $_POST['finished_date_l'] !='0000-00-00')
              {
                if($_POST['finished_date_u']) $where['finished_date >=']=$_POST['finished_date_l'];
                else $like['finished_date']=$_POST['finished_date_l'];
                $this->session->set_userdata('finished_date_l',$_POST['finished_date_l']);
                
              }
              else
              $this->session->set_userdata('finished_date_l');
              if($_POST['finished_date_u'] && $_POST['finished_date_u']!='0000-00-00')
              {
                $where['finished_date <=']=$_POST['finished_date_u'];
                $this->session->set_userdata('finished_date_u',$_POST['finished_date_u']);
                
              }
              else
              $this->session->set_userdata('finished_date_u');
              if($_POST['assigned_date_l'] && $_POST['assigned_date_l']!='0000-00-00')
              {
                if($_POST['assigned_date_u']) $where['assigned_date >=']=$_POST['assigned_date_l'];
                else $like['assigned_date']=$_POST['assigned_date_l'];
                $this->session->set_userdata('assigned_date_l',$_POST['assigned_date_l']);
                
              }
              else
              $this->session->set_userdata('assigned_date_l');
              if($_POST['assigned_date_u'] && $_POST['assigned_date_u']!='0000-00-00')
              {
                $where['assigned_date <=']=$_POST['assigned_date_u'];
                $this->session->set_userdata('assigned_date_u',$_POST['assigned_date_u']);
                
              }
              else
              $this->session->set_userdata('assigned_date_u');  
              if($_POST['statuss'])
              {
                $like['status']=$_POST['statuss'];
                $this->session->set_userdata('statuss',$_POST['statuss']);
              }
              else
              $this->session->set_userdata('statuss');  
              if($_POST['complain_title'])
              {
                $like['complain_title']=$_POST['complain_title'];
                $this->session->set_userdata('complain_title',$_POST['complain_title']);
              }
              else
              $this->session->set_userdata('complain_title');  
              if($_POST['name'])
              {
                $like['name']=$_POST['name'];
                $this->session->set_userdata('name',$_POST['name']);
              }
              else
              $this->session->set_userdata('name');  
             // $this->session->set_userdata($_POST);
                  
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
		//in graph
		 function show_complaingh()
        {
            
            $where=null;
            $like=null;
            if($_POST){ //mdie($_POST);
              
              if($_POST['assigned_technecian'])
              {
                $where['assigned_technecian']=$_POST['assigned_technecian'];
                $this->session->set_userdata('assigned_technecian',$_POST['assigned_technecian']);
                
              }
              else
              $this->session->set_userdata('assigned_technecian');
              
              if($_POST['created_date_l']&& $_POST['created_date_l']!="0000-00-00")
              {
                if($_POST['created_date_u']) $where['created_date >=']=$_POST['created_date_l'];
                else $like['created_date']=$_POST['created_date_l'];
                $this->session->set_userdata('created_date_l',$_POST['created_date_l']);
                
              }
              else
              $this->session->set_userdata('created_date_l');
              if($_POST['created_date_u'] && $_POST['created_date_u'] !='0000-00-00' )
              {
                $where['created_date <=']=$_POST['created_date_u'];
                $this->session->set_userdata('created_date_u',$_POST['created_date_u']);
                
              }
              else
              $this->session->set_userdata('created_date_u');
              if($_POST['finished_date_l'] && $_POST['finished_date_l'] !='0000-00-00')
              {
                if($_POST['finished_date_u']) $where['finished_date >=']=$_POST['finished_date_l'];
                else $like['finished_date']=$_POST['finished_date_l'];
                $this->session->set_userdata('finished_date_l',$_POST['finished_date_l']);
                
              }
              else
              $this->session->set_userdata('finished_date_l');
              if($_POST['finished_date_u'] && $_POST['finished_date_u']!='0000-00-00')
              {
                $where['finished_date <=']=$_POST['finished_date_u'];
                $this->session->set_userdata('finished_date_u',$_POST['finished_date_u']);
                
              }
              else
              $this->session->set_userdata('finished_date_u');
              if($_POST['assigned_date_l'] && $_POST['assigned_date_l']!='0000-00-00')
              {
                if($_POST['assigned_date_u']) $where['assigned_date >=']=$_POST['assigned_date_l'];
                else $like['assigned_date']=$_POST['assigned_date_l'];
                $this->session->set_userdata('assigned_date_l',$_POST['assigned_date_l']);
                
              }
              else
              $this->session->set_userdata('assigned_date_l');
              if($_POST['assigned_date_u'] && $_POST['assigned_date_u']!='0000-00-00')
              {
                $where['assigned_date <=']=$_POST['assigned_date_u'];
                $this->session->set_userdata('assigned_date_u',$_POST['assigned_date_u']);
                
              }
              else
              $this->session->set_userdata('assigned_date_u');  
              if($_POST['statuss'])
              {
                $like['status']=$_POST['statuss'];
                $this->session->set_userdata('statuss',$_POST['statuss']);
              }
              else
              $this->session->set_userdata('statuss');  
              if($_POST['complain_title'])
              {
                $like['complain_title']=$_POST['complain_title'];
                $this->session->set_userdata('complain_title',$_POST['complain_title']);
              }
              else
              $this->session->set_userdata('complain_title');  
              if($_POST['name'])
              {
                $like['name']=$_POST['name'];
                $this->session->set_userdata('name',$_POST['name']);
              }
              else
              $this->session->set_userdata('name');  
             // $this->session->set_userdata($_POST);
                  
            }
            else{
                $arr=array('created_date_l' => '','created_date_u' => '','finished_date_l' => '','finished_date_u' => '','assigned_date_l' => '','assigned_date_u' => '','name' => '', 'complain_title' => '','statuss' => '','assigned_technecian' => '');
                $this->session->unset_userdata($arr);
            }
          // $ainfo=null;
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
            $data['page']='show_complain_reportgh';
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
                if($this->session->userdata('assigned_date_u')) $where['assigned_date >=']=$this->session->userdata('assigned_date_l');
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
		//graph
		
        
        function export_report()
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
        
   
 function greport1()
        {
                $technecians=$this->ion_auth->users('3')->result();
                $x_x=null;
                $series=null;
                $plotbands=null; 
                if($_POST['report'])
                {
                    if(strtolower($_POST['report'])=='year')
                    {    
                        $title= 'year ('.date('Y-m-d',strtotime("-12 month")).' to '.date('Y-m-d').')';
                        for($i=12;$i>=1;$i--)
                          { //date('l',strtotime("-".$i." day"));
                          
                            $x_x.=$x_x?", '".date('M',strtotime("-".$i." month"))."'":"'".date('M',strtotime("-".$i." month"))."'";
                            if($i==12)$plotbands='from:'.($i-1.5).',
                            to: '.($i-.5).',
                            color: "rgba(68, 170, 213, .2)"';
                          }
                          $total=array();
                          foreach($technecians as $user)
                            {     $arr['assigned_technecian']=$user->id;
                                  $series.=$series?',{
                                    name: "'.$user->first_name.'",
                                    data: [':'{
                                    name: "'.$user->first_name.'",
                                    data: [';
                                    $dt=null;
                                    
                                  for($i=12;$i>=1;$i--)
                                  {   
                                      $arr['assigned_date >=']=date('Y-m',strtotime("-".$i." month")).'-1';//$user->id;
                                      $arr['assigned_date <=']=date('Y-m',strtotime("-".$i." month")).'-'.daysInMonth(date('m'),date('Y'));//$user->id;
									//  mdie($arr);
                                      $t=count($this->complain_model->get_complains($arr));
                                     
                                      $dt.=($dt)?",".$t:$t;
                                      $total[$i]+=$t;
                                      
                                  }
                                 $series.= $dt.']
                                }';
                                  
                            }
                            $series.=$series?',{
                                    name: "Total Complain",
                                    data: [':'{
                                    name: "Total Complain",
                                    data: [';
                                    $tt=null;
                                   foreach($total as $key=>$value)
                                   {
                                     $tt.=($tt)?",".$value:$value; 
                                   }
                                     $series.=$tt. ']
                                }';
                    }
					//month 
					 if(strtolower($_POST['report'])=='month')
                    {    
                        $title= 'year ('.date('Y-m-d',strtotime("-12 month")).' to '.date('Y-m-d').')';
                        for($i=daysInMonth(date('m'),date('Y'));$i>=1;$i--)
                          { //date('l',strtotime("-".$i." day"));
                          
                            $x_x.=$x_x?", '".date('d',strtotime("-".$i." day"))."'":"'".date('d',strtotime("-".$i." day"))."'";
                            if($i==date("d"))$plotbands='from:'.($i-1.5).',
                            to: '.($i-.5).',
                            color: "rgba(68, 170, 213, .2)"';
                          }
                          $total=array();
                          foreach($technecians as $user)
                            {     $arr['assigned_technecian']=$user->id;
                                  $series.=$series?',{
                                    name: "'.$user->first_name.'",
                                    data: [':'{
                                    name: "'.$user->first_name.'",
                                    data: [';
                                    $dt=null;
                                    
                                  for($i=daysInMonth(date('m'),date('Y'));$i>=1;$i--)
                                  {   
                                      $lik['assigned_date']=date('Y-m-d',strtotime("-".$i." day"));//$user->id;
                                    //  $li['assigned_date <=']=date('Y-m',strtotime("-".$i." day")).'-'.daysInMonth(date('m'),date('Y'));//$user->id;
									//  mdie($arr);
                                      $t=count($this->complain_model->get_complains($arr,null,null,$lik));
                                     
                                      $dt.=($dt)?",".$t:$t;
                                      $total[$i]+=$t;
                                      
                                  }
                                 $series.= $dt.']
                                }';
                                  
                            }
                            $series.=$series?',{
                                    name: "Total Complain",
                                    data: [':'{
                                    name: "Total Complain",
                                    data: [';
                                    $tt=null;
                                   foreach($total as $key=>$value)
                                   {
                                     $tt.=($tt)?",".$value:$value; 
                                   }
                                     $series.=$tt. ']
                                }';
                    }
                    elseif(strtolower($_POST['report'])=='week')
                    {     $title= 'week ('.date('Y-m-d',strtotime("-7 days")).' to '.date('Y-m-d').')';
                          for($i=7;$i>=1;$i--)
                          { //date('l',strtotime("-".$i." day"));
                            $x_x.=$x_x?", '".date('l',strtotime("-".$i." day"))."'":"'".date('l',strtotime("-".$i." day"))."'";
                            if($i==7)$plotbands='from:'.($i-1.5).',
                            to: '.($i-.5).',
                            color: "rgba(68, 170, 213, .2)"';
                          }
                          $total=array();
                          foreach($technecians as $user)
                            {     $arr['assigned_technecian']=$user->id;
                                  $series.=$series?',{
                                    name: "'.$user->first_name.'",
                                    data: [':'{
                                    name: "'.$user->first_name.'",
                                    data: [';
                                    $dt=null;                                    
                                  for($i=7;$i>=1;$i--)
                                  {   
                                       $lik['assigned_date']=date('Y-m-d',strtotime("-".$i." day"));//$user->id;
									  //ndie($arr);
									   $t=count($this->complain_model->get_complains($arr,null,null,$lik));
									 
                                      $dt.=($dt)?",".$t:$t;
									     $total[$i]+=$t;
                                      
                                  }
                                
                                 $series.= $dt.']
                                }';
                                  
                            }
                            $series.=$series?',{
                                    name: "Total Complain",
                                    data: [':'{
                                    name: "Total Complain",
                                    data: [';
                                    $tt=null;
                                   foreach($total as $key=>$value)
                                   {
                                     $tt.=($tt)?",".$value:$value; 
                                   }
                                     $series.=$tt. ']
                                }';
                                   
                                   
                    }
                   
                }else
                {     $title= 'week ('.date('Y-m-d',strtotime("-7 days")).' to '.date('Y-m-d').')';
                          for($i=7;$i>=1;$i--)
                          { //date('l',strtotime("-".$i." day"));
                            $x_x.=$x_x?", '".date('l',strtotime("-".$i." day"))."'":"'".date('l',strtotime("-".$i." day"))."'";
                            if($i==7)$plotbands='from:'.($i-1.5).',
                            to: '.($i-.5).',
                            color: "rgba(68, 170, 213, .2)"';
                          }
                          $total=array();
                          foreach($technecians as $user)
                            {     $arr['assigned_technecian']=$user->id;
                                  $series.=$series?',{
                                    name: "'.$user->first_name.'",
                                    data: [':'{
                                    name: "'.$user->first_name.'",
                                    data: [';
                                    $dt=null;
                                    
                                  for($i=7;$i>=1;$i--)
                                  {   
                                       $lik['assigned_date']=date('Y-m-d',strtotime("-".$i." day"));//$user->id;
                                       $t=count($this->complain_model->get_complains($arr,null,null,$lik));
									  
                                     $dt.=($dt)?",".$t:$t;
                                      $total[$i]+=$t;
                                      
                                  }
                                  
                                 $series.= $dt.']
                                }';
                                  
                            }
                            $series.=$series?',{
                                    name: "Total Complain",
                                    data: [':'{
                                    name: "Total Complain",
                                    data: [';
                                    $tt=null;
                                   foreach($total as $key=>$value)
                                   {
                                     $tt.=($tt)?",".$value:$value; 
                                   }
                                     $series.=$tt. ']
                                }';
                                   
                                   
                    }                 
                $data['title']=$title;
                $data['x_axis']=$x_x;
                $data['plotbands']=$plotbands;
                $data['series']=$series;  //mdie($data);
                $this->load->view('admin/greport',$data);
        }
        function greport()
        {
               
                $technecians=$this->ion_auth->users('3')->result();
                $x_x=null;
                $series=null;
                $plotbands=null; 
                if($_POST)
                {   if($_POST['report_year'] && $_POST['report_month'] && $_POST['report_day'])
                    {
                      $_POST['report']='week';  
                    }
                    elseif($_POST['report_year'] && $_POST['report_month'])
                    {
                      $_POST['report']='month';  
                    }
                    elseif($_POST['report_year'])
                    {
                      $_POST['report']='year';  
                    }
                    if(strtolower($_POST['report'])=='year')
                    {    
                        $title= 'year ('.$_POST['report_year'].'-1-1'.' to '.$_POST['report_year'].'-12-'.daysInMonth(12,$_POST['report_year']).')';
                        for($i=1;$i<=12;$i++)
                          { //date('l',strtotime("-".$i." day"));
                            $x_x.=$x_x?", '".date('M',mktime(0, 0, 0, $i, 1, $_POST['report_year']))."'":"'".date('M',mktime(0, 0, 0, $i, 1, $_POST['report_year']))."'";
                            //$x_x.=$x_x?", '".date('M',strtotime("-".$i." month"))."'":"'".date('M',strtotime("-".$i." month"))."'";
                            if(date('Y-m',strtotime($_POST['report_year']."-".$i.'-1'))==date('Y-m'))$plotbands='from:'.($i-1.5).',
                            to: '.($i-.5).',
                            color: "rgba(68, 170, 213, .2)"';
                          }
                          $total=array();
                          foreach($technecians as $user)
                            {     $arr['assigned_technecian']=$user->id;
                                  $series.=$series?',{
                                    name: "'.$user->first_name.'",
                                    data: [':'{
                                    name: "'.$user->first_name.'",
                                    data: [';
                                    $dt=null;
                                    
                                  for($i=1;$i<=12;$i++)
                                  {   
                                      $arr['assigned_date >=']=$_POST['report_year']."-".$i.'-1';
                                      $arr['assigned_date <=']=$_POST['report_year']."-".$i.'-'.daysInMonth($i,$_POST['report_year']);//$user->id;
                                    //mdie($arr);
                                      $t=count($this->complain_model->get_complains($arr));
                                     
                                      $dt.=($dt)?",".$t:$t;
                                      $total[$i]+=$t;
                                      
                                  }
                                 $series.= $dt.']
                                }';
                                  
                            }
                            $series.=$series?',{
                                    name: "Total Complain",
                                    data: [':'{
                                    name: "Total Complain",
                                    data: [';
                                    $tt=null;
                                   foreach($total as $key=>$value)
                                   {
                                     $tt.=($tt)?",".$value:$value; 
                                   }
                                     $series.=$tt. ']
                                }';
                    }
                    //month 
                     if(strtolower($_POST['report'])=='month')
                    {    
                        $title= 'year ('.date('Y-m-d',mktime(0, 0, 0, $_POST['report_month'], 1, $_POST['report_year'])).' to '.date('Y-m-d',mktime(0, 0, 0, $_POST['report_month'],daysInMonth($_POST['report_month'],$_POST['report_year']) , $_POST['report_year'])).')';
                        for($i=1;$i<=daysInMonth($_POST['report_month'],$_POST['report_year']);$i++)
                          { $x_x.=$x_x?", '".date('d',mktime(0, 0, 0, $_POST['report_month'], $i, $_POST['report_year']))."'":"'".date('d',mktime(0, 0, 0, $_POST['report_month'], $i, $_POST['report_year']))."'";
                            if(date('Y-m-d',mktime(0, 0, 0, $_POST['report_month'], $i, $_POST['report_year']))==date("Y-m-d"))$plotbands='from:'.($i-1.5).',
                            to: '.($i-.5).',
                            color: "rgba(68, 170, 213, .2)"';
                          }
                          $total=array();
                          foreach($technecians as $user)
                            {     $arr['assigned_technecian']=$user->id;
                                  $series.=$series?',{
                                    name: "'.$user->first_name.'",
                                    data: [':'{
                                    name: "'.$user->first_name.'",
                                    data: [';
                                    $dt=null;
                                    
                                  for($i=1;$i<=daysInMonth($_POST['report_month'],$_POST['report_year']);$i++)
                                  {   
                                      $lik['assigned_date']=date('Y-m-d',mktime(0, 0, 0, $_POST['report_month'], $i, $_POST['report_year']));//$user->id;
                                    //  $li['assigned_date <=']=date('Y-m',strtotime("-".$i." day")).'-'.daysInMonth(date('m'),date('Y'));//$user->id;
                                    //  mdie($arr);
                                      $t=count($this->complain_model->get_complains($arr,null,null,$lik));
                                     
                                      $dt.=($dt!='')?",".$t:$t;
                                      $total[$i]+=$t;
                                      
                                  }
                                 $series.= $dt.']
                                }';
                                  
                            }
                            $series.=$series?',{
                                    name: "Total Complain",
                                    data: [':'{
                                    name: "Total Complain",
                                    data: [';
                                    $tt=null;
                                   foreach($total as $key=>$value)
                                   {
                                     $tt.=($tt!='')?",".$value:$value; 
                                   }
                                     $series.=$tt. ']
                                }';
                    }
                    elseif(strtolower($_POST['report'])=='week')
                    {    // mdie(date('Y-m-d',strtotime("2004/12/23")));
                          $week_day=7;
                          if($_POST['report_day']<7)
                          {
                           $m=($_POST['report_month']-1)?($_POST['report_month']-1):12;
                           $y=($m==12)?($_POST['report_year']-1):$_POST['report_year'];
                           $last_day=daysInMonth($m,$y);
                           $current_day=$current_day1= ($last_day-(6-$_POST['report_day']));
                           $d=($last_day-(7-$_POST['report_day']));
                           $start_date=date('Y-m-d',strtotime($y.'/'.$m.'/'.$d));
                          }
                          else{
                           $m=$_POST['report_month'];
                           $y=$_POST['report_year'];
                          $current_day=$current_day1=$_POST['report_day']-6;
                          $start_date=date('Y-m-d',strtotime($_POST['report_year'].'/'.$_POST['report_month'].'/'.$current_day));
                          }
                          $title= 'week ('.$start_date.' to '.$_POST['report_year'].'-'.$_POST['report_month'].'-'.$_POST['report_day'].')';
                          $j=1;
                          for($i=1;$i<=$week_day;$i++)
                          {    //$total[$i]=0;
                               if($_POST['report_day']<7)
                              { 
                                if($current_day<=$last_day)
                                    $k=date('l(Y-m-d)',strtotime($y.'/'.$m.'/'.($current_day++)));
                                else
                                    $k=date('l(Y-m-d)',strtotime($y.'/'.$m.'/'.($j++)));
                                $x_x.=$x_x?", '".$k."'":"'".$k."'";
                              }
                              else
                              {
                                  $k=date('l(Y-m-d)',strtotime($y.'/'.$m.'/'.$current_day++));
                                  $x_x.=$x_x?", '".$k."'":"'".$k."'";
                              }
                           
                          }
                          $total=array();
                           
                          foreach($technecians as $user)
                            {     $arr['assigned_technecian']=$user->id;
                                  $series.=$series?',{
                                    name: "'.$user->first_name.'",
                                    data: [':'{
                                    name: "'.$user->first_name.'",
                                    data: [';
                                    $dt=null;
                                    $current_day=$current_day1;                                    
                                  for($i=1;$i<=$week_day;$i++)
                                  {   
                                          if($_POST['report_day']<7)
                                          {  
                                            if($current_day<=$last_day)
                                                $lik['assigned_date']=date('Y-m-d',strtotime($y.'/'.$m.'/'.$current_day++));
                                            else
                                                $lik['assigned_date']=date('Y-m-d',strtotime($y.'/'.$m.'/'.$j++));
                                            
                                          }
                                          else
                                          {
                                              $lik['assigned_date']=date('Y-m-d',strtotime($_POST['report_year'].'/'.$_POST['report_month'].'/'.$current_day++));
                                             
                                          }
                                          //mdie($lik);
                                       $t=count($this->complain_model->get_complains($arr,null,null,$lik));
                                     
                                      $dt.=($dt!='')?",".$t:$t;
                                         $total[$i]+=$t;
                                      
                                  }
                                
                                 $series.= $dt.']
                                }';
                                  
                            }// mdie($series);
                            $series.=$series?',{
                                    name: "Total Complain",
                                    data: [':'{
                                    name: "Total Complain",
                                    data: [';
                                    $tt=null;
                                   foreach($total as $key=>$value)
                                   {
                                     $tt.=($tt!='')?",".$value:$value; 
                                   }
                                     $series.=$tt. ']
                                }';
                                   
                                   
                    }
                   
                }
                else
                {     $title= 'week ('.date('Y-m-d',strtotime("-7 days")).' to '.date('Y-m-d').')';
                          for($i=7;$i>=1;$i--)
                          { //date('l',strtotime("-".$i." day"));
                            $x_x.=$x_x?", '".date('l',strtotime("-".$i." day"))."'":"'".date('l',strtotime("-".$i." day"))."'";
                            if($i==7)$plotbands='from:'.($i-1.5).',
                            to: '.($i-.5).',
                            color: "rgba(68, 170, 213, .2)"';
                          }
                          $total=array();
                          foreach($technecians as $user)
                            {     $arr['assigned_technecian']=$user->id;
                                  $series.=$series?',{
                                    name: "'.$user->first_name.'",
                                    data: [':'{
                                    name: "'.$user->first_name.'",
                                    data: [';
                                    $dt=null;
                                    
                                  for($i=7;$i>=1;$i--)
                                  {   
                                       $lik['assigned_date']=date('Y-m-d',strtotime("-".$i." day"));//$user->id;
                                       $t=count($this->complain_model->get_complains($arr,null,null,$lik));
                                      
                                     $dt.=($dt)?",".$t:$t;
                                      $total[$i]+=$t;
                                      
                                  }
                                  
                                 $series.= $dt.']
                                }';
                                  
                            }
                            $series.=$series?',{
                                    name: "Total Complain",
                                    data: [':'{
                                    name: "Total Complain",
                                    data: [';
                                    $tt=null;
                                   foreach($total as $key=>$value)
                                   {
                                     $tt.=($tt)?",".$value:$value; 
                                   }
                                     $series.=$tt. ']
                                }';
                                   
                                   
                    }                 
                $data['title']=$title;
                $data['x_axis']=$x_x;
                $data['plotbands']=$plotbands;
                $data['series']=$series;  //mdie($data);
                $data['selected_year']=isset($_POST['report_year'])?$_POST['report_year']:date('Y');
                $data['selected_month']=isset($_POST['report_month'])?$_POST['report_month']:date('m');
                $data['selected_day']=isset($_POST['report_day'])?$_POST['report_day']:date('m');
                $data['max_day']=daysInMonth($data['selected_month'],$data['selected_year']);
                $this->load->view('admin/greport_bar',$data);
        }
        function get_days()
        {
            $str='<option value="">None</option>';
            for($i=1;$i<=daysInMonth($_POST['month'],$_POST['year']);$i++)
            {
            
                $str.='<option value="'.$i.'">'.$i.'</option>'; 
            }
            echo $str;
            exit();
        
        }
       
   
}
?>