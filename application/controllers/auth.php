<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->library('');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('url');
        //$this->load->model('mixed_model');
        // Load MongoDB library instead of native db driver if required
        $this->config->item('use_mongodb', 'ion_auth') ?
        $this->load->library('mongo_db') :
        $this->load->database();
		date_default_timezone_set("Asia/Kathmandu");
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        
    }

    //redirect if needed, otherwise display the user list
  
      
    function index()
    {
       if(!$this->ion_auth->logged_in())
       { 
            flashMsg('error','You are not Logged In');
            redirect('auth/login');
       }
       if($this->ion_auth->in_group('user')){
             redirect('user/show_complain');
       }
       if($this->ion_auth->in_group('technician')){
             redirect('technician/show_complain');
       }
       if($this->ion_auth->in_group('admin')){
             redirect('admin/show_complain');
       } 
          
        else
        {    //mdie($this->session->userdata);
            //set the flash data error message if there is one
            //$message = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            
            //list the users
            if($_POST){
                if(isset($_POST['group_id']))
                    $group_id=$_POST['group_id'];
                else
                    $group_id=null;
                if(isset($_POST['email']))
                    $email=$_POST['email'];
                else
                    $email=null;
                
                
            }else
            {
                $group_id=null;
                $email=null;
               
            }
            
            $this->data['users'] = $this->ion_auth->users($group_id,$email)->result();
            foreach ($this->data['users'] as $k => $user)
            {
                $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
            }
            $groups=$this->ion_auth_model->get_groups();
        $options=array();
        $options[null]='choose group';
        foreach($groups as $group){
                    $options[$group->id]=$group->description;
            
        }
        
        $this->data['group_options']=$options;
        $this->data['module']='auth';
        $this->data['page']='index';
        $this->load->view('admin_container', $this->data);
           // $this->load->view('auth/index', $this->data);
        }
        
    }

    //log the user in
    function login()
    {
        $this->data['title'] = "Login";

        //validate form input
        $this->form_validation->set_rules('identity', 'Identity', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() == true)
        { 
            //check to see if the user is logging in
            //check for "remember me"
            $remember = (bool) $this->input->post('remember');

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
            {
                $users_group_name=$this->ion_auth_model->get_users_groups()->first_row()->name;
                $this->session->set_userdata(array('user_group'=>$users_group_name));
                //if the login is successful
                //redirect them back to the home page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect('auth/index');
            }
            else
            { 
                //if the login was un-successful
                //redirect them back to the login page
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('auth/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
            }
        }
        else
        {  
            //the user is not logging in so display the login page
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['identity'] = array('name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'class'=>'input',
                'size'=>"28",
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['password'] = array('name' => 'password',
                'id' => 'password',
                'class'=>'input',
                'size'=>"28", 
                'type' => 'password',
            );
        $groups=$this->ion_auth_model->get_groups();
        //$options=array();
//        $options[null]='choose group';
//        foreach($groups as $group){
//            
//                    $options[$group->id]=$group->description;
//            
//        }
//        $this->data['group_options']=$options;
//           
         $this->load->view('admin_login', $this->data);
        }
    }

    //log the user out
    function logout()
    {
        $this->data['title'] = "Logout";

        //log the user out
        $logout = $this->ion_auth->logout();

        //redirect them to the login page
        flashMsg('message', $this->ion_auth->messages());
        redirect('auth/login', 'refresh');
    }

    //change password
    function change_password()
    {
        $this->form_validation->set_rules('old', 'Old password', 'required');
        $this->form_validation->set_rules('new', 'New Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
        $this->form_validation->set_rules('new_confirm', 'Confirm New Password', 'required');

        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }

        $user = $this->ion_auth->user()->row();

        if ($this->form_validation->run() == false)
        { 
            //display the form
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
            $this->data['old_password'] = array(
                'name' => 'old',
                'id'   => 'old',
                'type' => 'password',
            );
            $this->data['new_password'] = array(
                'name' => 'new',
                'id'   => 'new',
                'type' => 'password',
                'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
            );
            $this->data['new_password_confirm'] = array(
                'name' => 'new_confirm',
                'id'   => 'new_confirm',
                'type' => 'password',
                'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
            );
            $this->data['user_id'] = array(
                'name'  => 'user_id',
                'id'    => 'user_id',
                'type'  => 'hidden',
                'value' => $user->id,
            );

            //render
            $this->data['model']='auth';
            $this->data['page']='change_password';
            $this->load->view('new_sadmin_container', $this->data);
        }
        else
        {
            $identity = $this->session->userdata($this->config->item('identity', 'ion_auth'));

            $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

            if ($change)
            { 
                //if the password was successfully changed
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                $this->logout();
            }
            else
            {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('auth/change_password', 'refresh');
            }
        }
    }

    
function forgot_password()
    {
        $this->form_validation->set_rules('email', 'Email Address', 'required');
        if ($this->form_validation->run() == false)
        {
            //setup the input
            $this->data['email'] = array('name' => 'email',
                'id' => 'email',
            );

            //set any errors and display the form
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->load->view('auth/forgot_password', $this->data);
        }
        else
        {
            //run the forgotten password method to email an activation code to the user
            //$forgotten = $this->ion_auth->forgotten_password($this->input->post('email'));
            
            //run the forgotten password method to email a password
            $result=false;
            $user=$this->users_groups_model->get_user(array('email'=>$_POST['email']));
            if(!empty($user)){
                $password=$user->password1;
                    $this->email->to($_POST['email']);
                    $this->email->from('info@productchannels.com','AMP');
                    $this->email->subject('Your password');
                    $this->email->message('Your password:'.$password);
                    $result=$this->email->send();
            
            }
            else{
                 $this->session->set_flashdata('message', 'user donot exist');
                redirect("auth/login", 'refresh');
            }
            //mdie($result);
            if ($result)
            { 
                //if there were no errors
                $this->session->set_flashdata('message', 'Password has been send to tour email');
                redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
            }
            else
            {
                $this->session->set_flashdata('message', 'error in forgot password process');
                redirect("auth/forgot_password", 'refresh');
            }
        }
    }

    //reset password - final step for forgotten password
    public function reset_password($code = NULL)
    {
        if (!$code)
        {
            show_404();
        }

        $user = $this->ion_auth->forgotten_password_check($code);

        if ($user)
        {  
            //if the code is valid then display the password reset form

            $this->form_validation->set_rules('new', 'New Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
            $this->form_validation->set_rules('new_confirm', 'Confirm New Password', 'required');

            if ($this->form_validation->run() == false)
            {
                //display the form

                //set the flash data error message if there is one
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
                $this->data['new_password'] = array(
                    'name' => 'new',
                    'id'   => 'new',
                'type' => 'password',
                    'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
                );
                $this->data['new_password_confirm'] = array(
                    'name' => 'new_confirm',
                    'id'   => 'new_confirm',
                    'type' => 'password',
                    'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
                );
                $this->data['user_id'] = array(
                    'name'  => 'user_id',
                    'id'    => 'user_id',
                    'type'  => 'hidden',
                    'value' => $user->id,
                );
                $this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['code'] = $code;

                //render
                $this->load->view('auth/reset_password', $this->data);
            }
            else
            {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) 
                {

                    //something fishy might be up
                    $this->ion_auth->clear_forgotten_password_code($code);

                    show_error('This form post did not pass our security checks.');

                } 
                else 
                {
                    // finally change the password
                    $identity = $user->{$this->config->item('identity', 'ion_auth')};

                    $change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

                    if ($change)
                    { 
                        //if the password was successfully changed
                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                        $this->logout();
                    }
                    else
                    {
                        $this->session->set_flashdata('message', $this->ion_auth->errors());
                        redirect('auth/reset_password/' . $code, 'refresh');
                    }
                }
            }
        }
        else
        { 
            //if the code is invalid then send them back to the forgot password page
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect("auth/forgot_password", 'refresh');
        }
    }


    //activate the user
    function activate($id, $code=false)
    {
        
        
        if ($code !== false)
        {
            $activation = $this->ion_auth->activate($id, $code);
        }
        //else if ($this->ion_auth->is_admin())
//        {
//            $activation = $this->ion_auth->activate($id);
//        }
         else if ($this->ion_auth->in_group('superadmin'))
        {
            $activation = $this->ion_auth->activate($id);
        }

        if ($activation)
        {
            //redirect them to the auth page
            //$this->session->set_flashdata('message', $this->ion_auth->messages());
            flashMsg('success',$this->ion_auth->messages());
            redirect("auth", 'refresh');
        }
        else
        {
            //redirect them to the forgot password page
            //$this->session->set_flashdata('message', $this->ion_auth->errors());
            flashMsg('error',$this->ion_auth->errors());
            redirect("auth/forgot_password", 'refresh');
        }
    }

    //deactivate the user
    function deactivate($id = NULL)
    {
        
        $id = $this->config->item('use_mongodb', 'ion_auth') ? (string) $id : (int) $id;
        
        if ($this->ion_auth->logged_in() && $this->ion_auth->in_group('superadmin'))
        {
        if($id)
            $result=$this->ion_auth->deactivate($id);
            if($result)flashMsg('success','Account De-Activated');
            
        }
            

            //redirect them back to the auth page
            redirect('auth', 'refresh');
        
    }


    //create a new user
    function create_user()
    {
        $this->data['title'] = "Create User";

        if (!$this->ion_auth->in_group('superadmin'))
        {
            redirect('auth', 'refresh');
        }

        //validate form input
        $this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('phone1', 'Phone No', 'required|xss_clean|min_length[9]|max_length[14]');
        $this->form_validation->set_rules('group', 'Group', 'required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');

        if ($this->form_validation->run() == true)
        {
            $username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
            $email    = $this->input->post('email');
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                //'company'    => $this->input->post('company'),
				//'password1' =>$this->input->post('password'),
               // 'phone'      => $this->input->post('phone1') . '-' . $this->input->post('phone2') . '-' . $this->input->post('phone3'),
               'phone'      => $this->input->post('phone1'),
            );
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data,array($this->input->post('group'))))
        { 
            //check to see if we are creating the user
            //redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("auth", 'refresh');
        }
        else
        { 
            //display the create user form
            //set the flash data error message if there is one
            $message = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            flashMsg('error',$message);
            $this->data['first_name'] = array(
                'name'  => 'first_name',
                'id'    => 'first_name',
                 'class'=>'text-input small-input',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array(
                'name'  => 'last_name',
                'id'    => 'last_name',
                 'class'=>'text-input small-input',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('last_name'),
            );
            
            $this->data['email'] = array(
                'name'  => 'email',
                'id'    => 'email',
                 'class'=>'text-input small-input',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['phone1'] = array(
                'name'  => 'phone1',
                'id'    => 'phone1',
                 'class'=>'text-input small-input',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('phone1'),
            );
           
            $this->data['password'] = array(
                'name'  => 'password',
                'id'    => 'password',
                 'class'=>'text-input small-input',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name'  => 'password_confirm',
                'id'    => 'password_confirm',
                 'class'=>'text-input small-input',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            );
            $this->data['group'] = array(
                'name'  => 'group',
                'id'    => 'group',
                 'class'=>'text-input small-input',
                'type'  => 'select',
                'selected' => $this->form_validation->set_value('group'),
            );
       $groups=$this->ion_auth_model->get_groups();
        $options=array();
        $options[null]='choose group';
        foreach($groups as $group){
            if($this->session->userdata('user_group')=='superadmin'){
                    $options[$group->id]=$group->description;
            }
            elseif($this->session->userdata('user_group')=='admin'){
                if($group->name !='superadmin')
                    $options[$group->id]=$group->name;
                
            }
            
        }
        $this->data['options']=$options;
        $this->data['module']='auth';
        $this->data['page']='add_user';
        $this->load->view('admin_container',$this->data);

           
        }
    }
     function create_staff()
    {
        $this->data['title'] = "Create Staff";

        if (!$this->ion_auth->in_group('superadmin'))
        {
            redirect('auth', 'refresh');
        }

        //validate form input
        $this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean');
        $this->form_validation->set_rules('phone1', 'Phone No', 'required|xss_clean|min_length[9]|max_length[14]');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
        //$this->form_validation->set_rules('group', 'Group', 'required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');
            //$this->form_validation->set_rules('res_address', 'Address', 'required|xss_clean');
//            $this->form_validation->set_rules('res_subrub', 'Subrub', 'required|xss_clean');
//            $this->form_validation->set_rules('res_state', 'State', 'required|xss_clean');
//            $this->form_validation->set_rules('res_postcode', 'Post Code', 'required|xss_clean');
//            $this->form_validation->set_rules('bank_name', "Client's Bank Name", 'required|xss_clean');
//            $this->form_validation->set_rules('bank_bsb', "Client's BSB Number", 'required|xss_clean');
//            $this->form_validation->set_rules('bank_account_number', "Client's A/c Number", 'required|xss_clean');
//            $this->form_validation->set_rules('emergencyname', 'In Case of Emergency Name', 'required|xss_clean');
//            $this->form_validation->set_rules('emergencyphone', 'In Case of Emergency Ph', 'required|xss_clean|min_length[9]|max_length[14]');
        
        if ($this->form_validation->run() == true)
        {   $_POST['group']=2;
            $username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
            $email    = $this->input->post('email');
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                'res_address'    => $this->input->post('res_address'),
                'res_subrub' =>$this->input->post('res_subrub'),
                'res_state'    => $this->input->post('res_state'),
                'res_postcode' =>$this->input->post('res_postcode'),
                'bank_name' =>$this->input->post('bank_name'),
                'bank_account_number'    => $this->input->post('bank_account_number'),
                'emergencyname' =>$this->input->post('emergencyname'),
                'emergencyphone'      => $this->input->post('emergencyphone'),
                'bank_bsb' =>$this->input->post('bank_bsb'),
                'phone'      => $this->input->post('phone1'),
            );
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data,array($this->input->post('group'))))
        { 
            //check to see if we are creating the user
            //redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("auth", 'refresh');
        }
        else
        { 
            //display the create user form
            //set the flash data error message if there is one
            $message = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            flashMsg('error',$message);
            $this->data['first_name'] = array(
                'name'  => 'first_name',
                'id'    => 'first_name',
                 'class'=>'text-input small-input',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array(
                'name'  => 'last_name',
                'id'    => 'last_name',
                 'class'=>'text-input small-input',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('last_name'),
            );
            
            $this->data['email'] = array(
                'name'  => 'email',
                'id'    => 'email',
                 'class'=>'text-input small-input',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['phone1'] = array(
                'name'  => 'phone1',
                'id'    => 'phone1',
                 'class'=>'text-input small-input',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('phone1'),
            );
           
            $this->data['password'] = array(
                'name'  => 'password',
                'id'    => 'password',
                 'class'=>'text-input small-input',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name'  => 'password_confirm',
                'id'    => 'password_confirm',
                 'class'=>'text-input small-input',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            );
            //$this->data['group'] = array(
//                'name'  => 'group',
//                'id'    => 'group',
//                 'class'=>'text-input small-input',
//                'type'  => 'select',
//                'selected' => $this->form_validation->set_value('group'),
//            );
           $this->data['res_address'] = array(
            'name'  => 'res_address',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('res_address'),
                    
        );
        $this->data['res_subrub'] = array(
            'name'  => 'res_subrub',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('res_subrub'),
                    
        );
        $this->data['res_state'] = array(
            'name'  => 'res_state',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('res_state'),
                    
        );
        $this->data['res_postcode'] = array(
            'name'  => 'res_postcode',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('res_postcode'),
                    
        );
        $this->data['emergencyname'] = array(
            'name'  => 'emergencyname',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('emergencyname'),
                    
        );
        $this->data['emergencyphone'] = array(
            'name'  => 'emergencyphone',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('emergencyphone'),
                    
        );
        $this->data['bank_name'] = array(
            'name'  => 'bank_name',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'selected' => $this->form_validation->set_value('bank_name'),
                    
        );
        $titles=$this->mixed_model->get_banks();
        $option1[null]='Choose Banks';
        foreach($titles as $title)
        {
             $option1[$title->name]=$title->name;
        }
        $this->data['bank_option']=$option1;
        $this->data['bank_account_name'] = array(
            'name'  => 'bank_account_name',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('bank_account_name'),
                    
        );
        $this->data['bank_bsb'] = array(
            'name'  => 'bank_bsb',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('bank_bsb'),
                    
        );
        $this->data['bank_account_number'] = array(
            'name'  => 'bank_account_number',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('bank_account_number'),
                    
        );
        $this->data['module']='auth';
        $this->data['page']='add_staff';
        $this->load->view('admin_container',$this->data);

           
        }
    }
    
      function edit_staff($id)
    {
        $this->data['title'] = "Edit Staff";

        if (!$this->ion_auth->in_group('superadmin'))
        {
            redirect('auth', 'refresh');
        }
        $user = $this->ion_auth->user($id)->row();
        //validate form input
        $this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean');
        $this->form_validation->set_rules('phone1', 'Phone No', 'required|xss_clean|min_length[9]|max_length[14]');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
        //$this->form_validation->set_rules('group', 'Group', 'required|xss_clean');
            //$this->form_validation->set_rules('res_address', 'Address', 'required|xss_clean');
//            $this->form_validation->set_rules('res_subrub', 'Subrub', 'required|xss_clean');
//            $this->form_validation->set_rules('res_state', 'State', 'required|xss_clean');
//            $this->form_validation->set_rules('res_postcode', 'Post Code', 'required|xss_clean');
//            $this->form_validation->set_rules('bank_name', "Client's Bank Name", 'required|xss_clean');
//            $this->form_validation->set_rules('bank_bsb', "Client's BSB Number", 'required|xss_clean');
//            $this->form_validation->set_rules('bank_account_number', "Client's A/c Number", 'required|xss_clean');
//            $this->form_validation->set_rules('emergencyname', 'In Case of Emergency Name', 'required|xss_clean');
//            $this->form_validation->set_rules('emergencyphone', 'In Case of Emergency Ph', 'required|xss_clean|min_length[9]|max_length[14]');
        if($_POST){if ( $id != $this->input->post('id'))
        {
                show_error('This form post did not pass our security checks.');
        }
        if ($this->input->post('password'))
            {
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
                $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');

                $data['password'] = $this->input->post('password');
                //$data['password1'] = $this->input->post('password');
            }
        }
        if ($this->form_validation->run() == true)
        {   $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                'res_address'    => $this->input->post('res_address'),
                'res_subrub' =>$this->input->post('res_subrub'),
                'res_state'    => $this->input->post('res_state'),
                'res_postcode' =>$this->input->post('res_postcode'),
                'bank_name' =>$this->input->post('bank_name'),
                'bank_account_number'    => $this->input->post('bank_account_number'),
                'emergencyname' =>$this->input->post('emergencyname'),
                'emergencyphone'      => $this->input->post('emergencyphone'),
                'bank_bsb' =>$this->input->post('bank_bsb'),
                'phone'      => $this->input->post('phone1'),
            );
            $data['username'] = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
            $$data['email']    = $this->input->post('email');
            
        }
        if ($this->form_validation->run() == true )
        {     $result=$this->ion_auth->update($user->id, $data);
            //check to see if we are creating the user
            //redirect them back to the admin page
            if($result)flashMsg('success', $this->ion_auth->messages());
            else flashMsg('error', $this->ion_auth->messages());
            redirect("auth", 'refresh');
        }
        else
        { 
            //display the create user form
            //set the flash data error message if there is one
            $message = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            flashMsg('error',$message);
            $this->data['first_name'] = array(
                'name'  => 'first_name',
                'id'    => 'first_name',
                 'class'=>'text-input small-input',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('first_name',$user->first_name),
            );
            $this->data['last_name'] = array(
                'name'  => 'last_name',
                'id'    => 'last_name',
                 'class'=>'text-input small-input',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('last_name',$user->last_name),
            );
            
            $this->data['email'] = array(
                'name'  => 'email',
                'id'    => 'email',
                 'class'=>'text-input small-input',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('email',$user->email),
            );
            $this->data['phone1'] = array(
                'name'  => 'phone1',
                'id'    => 'phone1',
                 'class'=>'text-input small-input',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('phone1',$user->phone),
            );
           
            $this->data['password'] = array(
                'name'  => 'password',
                'id'    => 'password',
                 'class'=>'text-input small-input',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name'  => 'password_confirm',
                'id'    => 'password_confirm',
                 'class'=>'text-input small-input',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            );
            //$this->data['group'] = array(
//                'name'  => 'group',
//                'id'    => 'group',
//                 'class'=>'text-input small-input',
//                'type'  => 'select',
//                'selected' => $this->form_validation->set_value('group'),
//            );
           $this->data['res_address'] = array(
            'name'  => 'res_address',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('res_address',$user->res_address),
                    
        );
        $this->data['res_subrub'] = array(
            'name'  => 'res_subrub',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('res_subrub',$user->res_subrub),
                    
        );
        $this->data['res_state'] = array(
            'name'  => 'res_state',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('res_state',$user->res_state),
                    
        );
        $this->data['res_postcode'] = array(
            'name'  => 'res_postcode',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('res_postcode',$user->res_postcode),
                    
        );
        $this->data['emergencyname'] = array(
            'name'  => 'emergencyname',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('emergencyname',$user->emergencyname),
                    
        );
        $this->data['emergencyphone'] = array(
            'name'  => 'emergencyphone',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('emergencyphone',$user->emergencyphone),
                    
        );
        $this->data['bank_name'] = array(
            'name'  => 'bank_name',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'selected' => $this->form_validation->set_value('bank_name',$user->bank_name),
                    
        );
        $titles=$this->mixed_model->get_banks();
        $option1[null]='Choose Banks';
        foreach($titles as $title)
        {
             $option1[$title->name]=$title->name;
        }
        $this->data['bank_option']=$option1;
        $this->data['bank_account_name'] = array(
            'name'  => 'bank_account_name',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('bank_account_name',$user->bank_account_name),
                    
        );
        $this->data['bank_bsb'] = array(
            'name'  => 'bank_bsb',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('bank_bsb',$user->bank_bsb),
                    
        );
        $this->data['bank_account_number'] = array(
            'name'  => 'bank_account_number',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('bank_account_number',$user->bank_account_number),
                    
        );
        $this->data['id']=$id;
        $this->data['module']='auth';
        $this->data['page']='edit_staff';
        $this->load->view('admin_container',$this->data);

           
        }
    }
    function create_agent()
    {
        $this->data['title'] = "Create Agent";

        if (!$this->ion_auth->in_group('superadmin'))
        {
            redirect('auth', 'refresh');
        }

        //validate form input
        $this->form_validation->set_rules('businessname', "Business Name", 'required|xss_clean');
        $this->form_validation->set_rules('tfn', 'Tax Agent Number', 'required|xss_clean|integer');
        $this->form_validation->set_rules('abn', 'ABN', 'required|xss_clean|integer');
        $this->form_validation->set_rules('username', 'Contact Name', 'required|xss_clean');
        $this->form_validation->set_rules('phone1', 'Phone No', 'required|xss_clean|min_length[9]|max_length[14]');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
        //$this->form_validation->set_rules('group', 'Group', 'required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');
            $this->form_validation->set_rules('res_address', 'Address', 'required|xss_clean');
            $this->form_validation->set_rules('res_subrub', 'Subrub', 'required|xss_clean');
            $this->form_validation->set_rules('res_state', 'State', 'required|xss_clean');
            $this->form_validation->set_rules('res_postcode', 'Post Code', 'required|xss_clean|numeric');
            $this->form_validation->set_rules('bank_name', "Client's Bank Name", 'required|xss_clean');
            $this->form_validation->set_rules('bank_bsb', "Client's BSB Number", 'required|xss_clean|numeric');
            $this->form_validation->set_rules('bank_account_number', "Client's A/c Number", 'required|xss_clean|integer');
            $this->form_validation->set_rules('referral_fee_amount', "Referral Fee Amount", 'required|xss_clean|numeric');
            
        if ($this->form_validation->run() == true)
        {   $_POST['group']=3;
            $email    = $this->input->post('email');
            $password = $this->input->post('password');

            $additional_data = array(
                'businessname' => $this->input->post('businessname'),
                'res_address'    => $this->input->post('res_address'),
                'res_subrub' =>$this->input->post('res_subrub'),
                'res_state'    => $this->input->post('res_state'),
                'res_postcode' =>$this->input->post('res_postcode'),
                'bank_name' =>$this->input->post('bank_name'),
                'bank_account_number'    => $this->input->post('bank_account_number'),
                'referral_fee_amount' =>$this->input->post('referral_fee_amount'),
                'bank_bsb' =>$this->input->post('bank_bsb'),
                'phone'      => $this->input->post('phone1'),
            );
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($this->input->post('username'), $password, $email, $additional_data,array($this->input->post('group'))))
        { 
            //check to see if we are creating the user
            //redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("auth", 'refresh');
        }
        else
        { 
            //display the create user form
            //set the flash data error message if there is one
            $message = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            flashMsg('error',$message);
            $this->data['username'] = array(
                'name'  => 'username',
                'id'    => 'username',
                 'class'=>'text-input small-input',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('username'),
            );
            $this->data['businessname'] = array(
                'name'  => 'businessname',
                'id'    => 'businessname',
                 'class'=>'text-input medium-input',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('businessname'),
            );
            
            $this->data['email'] = array(
                'name'  => 'email',
                'id'    => 'email',
                 'class'=>'text-input small-input',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['phone1'] = array(
                'name'  => 'phone1',
                'id'    => 'phone1',
                 'class'=>'text-input small-input',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('phone1'),
            );
           
            $this->data['password'] = array(
                'name'  => 'password',
                'id'    => 'password',
                 'class'=>'text-input small-input',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name'  => 'password_confirm',
                'id'    => 'password_confirm',
                 'class'=>'text-input small-input',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            );
        $this->data['res_address'] = array(
            'name'  => 'res_address',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('res_address'),
                    
        );
        $this->data['res_subrub'] = array(
            'name'  => 'res_subrub',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('res_subrub'),
                    
        );
        $this->data['res_state'] = array(
            'name'  => 'res_state',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('res_state'),
                    
        );
        $this->data['res_postcode'] = array(
            'name'  => 'res_postcode',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('res_postcode'),
                    
        );
        $this->data['bank_name'] = array(
            'name'  => 'bank_name',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'selected' => $this->form_validation->set_value('bank_name'),
                    
        );
        $titles=$this->mixed_model->get_banks();
        $option1[null]='Choose Banks';
        foreach($titles as $title)
        {
             $option1[$title->name]=$title->name;
        }
        $this->data['bank_option']=$option1;
        $this->data['bank_account_name'] = array(
            'name'  => 'bank_account_name',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('bank_account_name'),
                    
        );
        $this->data['bank_bsb'] = array(
            'name'  => 'bank_bsb',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('bank_bsb'),
                    
        );
        $this->data['bank_account_number'] = array(
            'name'  => 'bank_account_number',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('bank_account_number'),
                    
        );
        $this->data['referral_fee_amount'] = array(
            'name'  => 'referral_fee_amount',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('referral_fee_amount'),
                    
        );
        $this->data['tfn'] = array(
            'name'  => 'tfn',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('tfn'),
                    
        );
        $this->data['abn'] = array(
            'name'  => 'abn',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('abn'),
                    
        );
        $this->data['module']='auth';
        $this->data['page']='add_agent';
        $this->load->view('new_admin_container',$this->data);

           
        }
    }
    function edit_agent($id)
    {
        $this->data['title'] = "Create Agent";
        $user = $this->ion_auth->user($id)->row();
        //mdie($user);
        if (!$this->ion_auth->in_group('superadmin'))
        {
            redirect('auth', 'refresh');
        }
        if($_POST){
        
        if ( $id != $this->input->post('id'))
        {
                show_error('This form post did not pass our security checks.');
        }
        //validate form input
        $this->form_validation->set_rules('businessname', "Business Name", 'required|xss_clean');
        $this->form_validation->set_rules('tfn', 'Tax Agent Number', 'required|xss_clean|integer');
        $this->form_validation->set_rules('abn', 'ABN', 'required|xss_clean|integer');
        $this->form_validation->set_rules('username', 'Contact Name', 'required|xss_clean');
        $this->form_validation->set_rules('phone1', 'Phone No', 'required|xss_clean|min_length[9]|max_length[14]');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
        //$this->form_validation->set_rules('group', 'Group', 'required|xss_clean');
        if($_POST['password']){
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
            $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');
        }
            $this->form_validation->set_rules('res_address', 'Address', 'required|xss_clean');
            $this->form_validation->set_rules('res_subrub', 'Subrub', 'required|xss_clean');
            $this->form_validation->set_rules('res_state', 'State', 'required|xss_clean');
            $this->form_validation->set_rules('res_postcode', 'Post Code', 'required|xss_clean|numeric');
            $this->form_validation->set_rules('bank_name', "Client's Bank Name", 'required|xss_clean');
            $this->form_validation->set_rules('bank_bsb', "Client's BSB Number", 'required|xss_clean|numeric');
            $this->form_validation->set_rules('bank_account_number', "Client's A/c Number", 'required|xss_clean|integer');
            $this->form_validation->set_rules('referral_fee_amount', "Referral Fee Amount", 'required|xss_clean|numeric');
            
        if ($this->form_validation->run() == true)
        {   $_POST['group']=3;
           

            $additional_data = array(
                'email'=>$this->input->post('email'),
                'businessname' => $this->input->post('businessname'),
                'res_address'    => $this->input->post('res_address'),
                'res_subrub' =>$this->input->post('res_subrub'),
                'res_state'    => $this->input->post('res_state'),
                'res_postcode' =>$this->input->post('res_postcode'),
                'bank_name' =>$this->input->post('bank_name'),
                'bank_account_number'    => $this->input->post('bank_account_number'),
                'referral_fee_amount' =>$this->input->post('referral_fee_amount'),
                'bank_bsb' =>$this->input->post('bank_bsb'),
                'phone'      => $this->input->post('phone1'),
                'abn'      => $this->input->post('abn'),
                'tfn'      => $this->input->post('tfn'),
            );
            
           if(isset($_POST['password']))
           {
              $additional_data['password']= $this->input->post('password'); 
           }
        }
        }
        if ($this->form_validation->run() == true && $this->ion_auth->update($id, $additional_data))
        { 
            //check to see if we are creating the user
            //redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("auth", 'refresh');
        }
        
        else
        { 
            //display the create user form
            //set the flash data error message if there is one
            $message = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            flashMsg('error',$message);
            $this->data['username'] = array(
                'name'  => 'username',
                'id'    => 'username',
                 'class'=>'text-input small-input',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('username',$user->username),
            );
            $this->data['businessname'] = array(
                'name'  => 'businessname',
                'id'    => 'businessname',
                 'class'=>'text-input medium-input',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('businessname',$user->businessname),
            );
            
            $this->data['email'] = array(
                'name'  => 'email',
                'id'    => 'email',
                 'class'=>'text-input small-input',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('email',$user->email),
            );
            $this->data['phone1'] = array(
                'name'  => 'phone1',
                'id'    => 'phone1',
                 'class'=>'text-input small-input',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('phone1',$user->phone),
            );
           
            $this->data['password'] = array(
                'name'  => 'password',
                'id'    => 'password',
                 'class'=>'text-input small-input',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name'  => 'password_confirm',
                'id'    => 'password_confirm',
                 'class'=>'text-input small-input',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            );
        $this->data['res_address'] = array(
            'name'  => 'res_address',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('res_address',$user->res_address),
                    
        );
        $this->data['res_subrub'] = array(
            'name'  => 'res_subrub',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('res_subrub',$user->res_subrub),
                    
        );
        $this->data['res_state'] = array(
            'name'  => 'res_state',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('res_state',$user->res_state),
                    
        );
        $this->data['res_postcode'] = array(
            'name'  => 'res_postcode',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('res_postcode',$user->res_postcode),
                    
        );
        $this->data['bank_name'] = array(
            'name'  => 'bank_name',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('bank_name',$user->bank_name),
                    
        );
        $titles=$this->mixed_model->get_banks();
        $option1[null]='Choose Banks';
        foreach($titles as $title)
        {
             $option1[$title->name]=$title->name;
        }
        $this->data['bank_option']=$option1;
        $this->data['bank_account_name'] = array(
            'name'  => 'bank_account_name',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('bank_account_name',$user->bank_account_name),
                    
        );
        $this->data['bank_bsb'] = array(
            'name'  => 'bank_bsb',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('bank_bsb',$user->bank_bsb),
                    
        );
        $this->data['bank_account_number'] = array(
            'name'  => 'bank_account_number',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('bank_account_number',$user->bank_account_number),
                    
        );
        $this->data['referral_fee_amount'] = array(
            'name'  => 'referral_fee_amount',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('referral_fee_amount',$user->referral_fee_amount),
                    
        );
        $this->data['tfn'] = array(
            'name'  => 'tfn',
            'id'=>'small-input',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('tfn',$user->tfn),
                    
        );
        $this->data['abn'] = array(
            'name'  => 'abn',
            'id'=>'small-input',
            'class'=>'text-input medium-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('abn',$user->abn),
                    
        );
        $this->data['id']=$user->id;
        $this->data['module']='auth';
        $this->data['page']='edit_agent';
        $this->load->view('new_admin_container',$this->data);

           
        }
    }
    function edit_user($id)
    {
        $this->data['title'] = "Edit User";

        if (!$this->ion_auth->logged_in() || !($this->ion_auth->is_admin() || $this->ion_auth->in_group('superadmin')))
        {
            redirect('auth', 'refresh');
        }
        
        $user = $this->ion_auth->user($id)->row();
        $test1=$this->ion_auth->in_group('superadmin');
        $test2=$this->ion_auth->in_group('admin');
        $user_groups=$this->ion_auth_model->get_users_groups($id)->result();
        $admin=false;
        $super_admin=false;
        foreach($user_groups as $user_group){
            if($user_group->name=='admin')
                $admin=true;
            if($user_group->name=='superadmin')
                $super_admin=true;
        }
        
        if($super_admin){
           flashMsg('error',"superadmin cant be edited");
           redirect('auth', 'refresh');
        }
        if($admin && !$test1){
            flashMsg('error',"Login as Superadmin");
             redirect('auth', 'refresh');
        }
        if(!($admin || $super_admin) && !($test2 || $test1)){
            flashMsg('error',"Login as Superadmin or admin");
             redirect('auth', 'refresh');
        }
       
        //process the phone number
        //if (isset($user->phone) && !empty($user->phone))
//        {
//            $user->phone = explode('-', $user->phone);
//        }

        //validate form input
        $this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean');
        $this->form_validation->set_rules('group', 'Group', 'required|xss_clean');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('phone1', 'Phone', 'required|xss_clean');
       
        //|min_length[9]|max_length[14]

        if (isset($_POST) && !empty($_POST))
        {
            // do we have a valid request?
            if ( $id != $this->input->post('id'))
            {
                show_error('This form post did not pass our security checks.');
            }
            
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                'phone'      => $this->input->post('phone1'),
                
            );
            
           
            //update the password if it was posted
            if ($this->input->post('password'))
            {
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
                $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');

                $data['password'] = $this->input->post('password');
                //$data['password1'] = $this->input->post('password');
            }

            if ($this->form_validation->run() === TRUE)
            { 
                
                $this->ion_auth->update($user->id, $data);
                $this->ion_auth_model->update_group($user->id, array('group_id'=>$this->input->post('group')));

                //check to see if we are creating the user
                //redirect them back to the admin page
                flashMsg('success',"User Saved");
                
                redirect("auth", 'refresh');
            }
        }
        
        //display the edit user form
        $this->data['csrf'] = $this->_get_csrf_nonce();

        //set the flash data error message if there is one
        $message= (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
        flashMsg('error',$message);
        //pass the user to the view
        $this->data['user'] = $user;

        $this->data['first_name'] = array(
            'name'  => 'first_name',
            'id'    => 'first_name',
            'class'=>'text-input small-input',
            'type'  => 'text',
            //'disabled'=>true,
            'value' => $this->form_validation->set_value('first_name', $user->first_name),
        );
        $this->data['last_name'] = array(
            'name'  => 'last_name',
            'id'    => 'last_name',
            'class'=>'text-input small-input',
            'type'  => 'text',
            //'disabled'=>true,
            'value' => $this->form_validation->set_value('last_name', $user->last_name),
        );
        
        $this->data['email'] = array(
                'name'  => 'email',
                'id'    => 'email',
                 'class'=>'text-input small-input',
                'type'  => 'text',
               // 'disabled'=>true,
                'value' => $this->form_validation->set_value('email',$user->email),
            );
        $this->data['phone1'] = array(
            'name'  => 'phone1',
            'id'    => 'phone1',
            'class'=>'text-input small-input',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('phone1', $user->phone),
        );
        
        $this->data['password'] = array(
            'name' => 'password',
            'id'   => 'password',
            'class'=>'text-input small-input',
            //'disabled'=>true,
            'type' => 'password'
        );
        $this->data['password_confirm'] = array(
            'name' => 'password_confirm',
            'id'   => 'password_confirm',
            'class'=>'text-input small-input',
            //'disabled'=>true,
            'type' => 'password'
        );
        $default_group=$this->ion_auth_model->get_users_groups($user->id)->row()->id;
        $this->data['group'] = array(
                'name'  => 'group',
                'id'    => 'group',
                 'class'=>'text-input small-input',
                'type'  => 'select',
                'selected' => $this->form_validation->set_value('group',$default_group),
            );
        $groups=$this->ion_auth_model->get_groups();
        $options=array();
        $options[null]='choose group';
        foreach($groups as $group){
             if($this->session->userdata('user_group')=='superadmin'){
                    $options[$group->id]=$group->description;
            }
            elseif($this->session->userdata('user_group')=='admin'){
                if($group->name !='superadmin')
                    $options[$group->id]=$group->name;
                
            }
            
        }
        $this->data['options']=$options;
        $this->data['module']='auth';
        $this->data['page']='edit_user';
        $this->load->view('admin_container',$this->data);

        //$this->load->view('auth/edit_user', $this->data);
    }


    function _get_csrf_nonce()
    {
        $this->load->helper('string');
        $key   = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

    function _valid_csrf_nonce()
    {
        if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
            $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    function delete_user($id){
        $test1=$this->ion_auth->in_group('superadmin');
        $test2=$this->ion_auth->in_group('admin');
        $user_group=$this->ion_auth_model->get_users_groups($id)->row(); 
        $admin=false;
        $super_admin=false;
        //foreach($user_groups as $user_group->row()){
       
            if($user_group->name=='admin')
                $admin=true;
            if($user_group->name=='superadmin')
                $super_admin=true;
       // }
        
        if($super_admin && !($user_id==1)){
           flashMsg('error',"superadmin cant be deleted");
           redirect('auth', 'refresh');
        }
        if($admin && !$test1){
            flashMsg('error',"Login as Superadmin");
             redirect('auth', 'refresh');
        }
        if(!($admin || $supre_admin) && !($test2 || $test1)){
            flashMsg('error',"Login as Superadmin or Admin");
             redirect('auth', 'refresh');
        }
        $delete=$this->ion_auth_model->delete_user($id);
        $messages=$this->ion_auth->messages();
        if($delete)
            flashMsg('success',$messages);
        else
            flashMsg('error',$messages);
        redirect_back();
    }

}
?>