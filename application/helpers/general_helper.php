<?php
    /**
     * Project Triveni: Helper File
     * file: triveni_helper.php
     * @author: acpmasquerade@gmail.com
     */

# ACTION Constants
define("ACTION_CONFIRMATION_REQUIRED", 'REQUIRED'); // continue with view throwing
define("ACTION_CONFIRMED", "YES"); // continue with action
define("ACTION_DENIED", "NO"); // denied the action
define("ACTION_CANCELLED", "CANCEL"); // cancelled the action
define('ACTIVE',1);

define('ASPATH',base_url().'assets/admin/'); 

if(!function_exists("mdie")){
    /**
    * @author acpmasquerade
    * 
    * @param mixed $var
    * @param mixed $die
    */
    function mdie($var, $die = TRUE){
        echo "<pre>";
        print_r($var);
        echo "</pre>";
        if($die)
            die();
    }
}

if(!function_exists("ndie")){
    /**
    * @author acpmasquerade
    * 
    * @param mixed $var
    */
    
    function ndie($var){
        mdie($var, FALSE);
    }
}

/**
*  @author acpmasquerade
*/

if(!function_exists("redirect_back")){
    function redirect_back($failover_location=NULL){
        $came_from = $_SERVER["HTTP_REFERER"];
        if($came_from){
            redirect($came_from);
        }else{
            redirect($failover_location);
        }
    }
}
if(!function_exists('current_user')){    
    
    function current_user($param=null)
    {
        $CI=& get_instance();
        
        $current_user_session = $CI->session->userdata;        
        
        # fetch the current usern
        
        
        # no need to fetch profile, if user is not logged in
        
    
       return $current_user_session;
    }
}



if(!function_exists("object_to_array")){
    /**
     * Converts an object to an array equivalent,
     * mapping respecitve object_members with array indices
     */
    function object_to_array($object){
        $array = array();

        if(!is_object($object))
            return $object;
        
        foreach($object as $key=>$val){
            $array[$key] = $val;
        }

        return $array;
    }
}
    if(!function_exists("encode_password")){
    function encode_password($plain_text_password){
        $CI  = & get_instance();
        $CI->load->module_library("auth", "Userlib");
        return($CI->userlib->encode_password($plain_text_password));
    }
}

if(!function_exists("decode_password")){
    function decode_password($encoded_password){
        $CI  = & get_instance();
        $CI->load->module_library("auth", "Userlib");
        return($CI->userlib->decode_password($encoded_password));
    }
}

if(!function_exists("plug_confirmation_for_this_action")){
    function plug_confirmation_for_this_action($confirmation_prompt){
        $CI  = & get_instance();
        $CI->_triveni_mis->plug->confirmation = TRUE;
        define("ACTION_CONFIRMAION_PROMPT", $confirmation_prompt);
    }
}

if(!function_exists("confirmation_action")){
    function confirmation_action(){
        if($_POST){
            return $_POST["ACTION_CONFIRMATION"];
        }else{
            return ACTION_CONFIRMATION_REQUIRED;
        }
    }
}

if(!function_exists("is_confirmation_plugged")){
    function is_confirmation_plugged(){
        $CI  = & get_instance();
        return $CI->_triveni_mis->plug->confirmation;
    }
}

if(!function_exists("set_default_form_values")){
    function set_default_form_values($value_object){
        $CI = & get_instance();
        foreach($value_object as $key=>$val){
            $CI->validator->{$key} = $val;
        }
    }
}



if(!function_exists("explode_by_comma")){
    function explode_by_comma($dates){
    $pieces=explode(",",$dates);
    return $pieces;
    }
}
    
 



    
    function do_upload($source,$dest)
    {
        $current_user=current_user();
         $uploaded_sources = array();
        // check multiple or single image
        if(!is_array($source["type"])){
            // is single, treat as if multiple.
            $_source = array();
            foreach($source as $key=>$val){
                $_source[$key] = array(0=>$val);
            }
            $source=$_source;
        }
        foreach($source["type"] as $some_key=>$some_type){
            $type_prefix = substr($some_type, 0, 6);
            if($type_prefix != "image/"){
                continue;
            }else{
                // do upload
                $params = array(
                    "name"=>$source["name"][$some_key],
                    "type"=>$source["type"][$some_key],
                    "tmp_name"=>$source["tmp_name"][$some_key],
                    "size"=>$source["size"][$some_key],
                    "error"=>$source["error"][$some_key],
                    );
                if($params["error"] == 0){
                    $pathinfo = pathinfo($params["name"]);
                    $filename = $pathinfo["filename"];
                    $extension = $pathinfo["extension"];
                    if($extension)
                        $extension = ".".$extension;
                    $newfilename = time()."_".md5($filename.  uniqid()).$extension;
                    $destination = $dest.$newfilename;
                    move_uploaded_file($params["tmp_name"], $destination);
                    $uploaded_sources[$some_key] = $newfilename;
                }else{
                    continue;
                }
            }
        }
        return $uploaded_sources;
        
        
    }   
    
    if(!function_exists("generate_teaser")){
        function generate_teaser($wordLimit,$text,$link=NULL){ 
            $teaserText = ''; 
            $myText=strip_tags($text);
            $words = explode(' ',$myText); 
            $i = 0; 
            while($i < $wordLimit) 
                { 
                
                $teaserText .= $words[$i]." "; 
                $i++; 
                } 
            if(!empty($link)){
               $teaserText .= "... <a href='".$link."' class='more_link'>More......</a>"; 
            }
            else{
                $teaserText.='......';
            }
            
            return $teaserText;
        }
    }

    
    function key_arr($item_arr,$key,$prefix,$home=NULL){  
        $my_arr[]="Select";
        foreach($item_arr as $item){
            $my_arr[$item->$key]=$item->$prefix;
        }
        return $my_arr;
    }
    

    

    
    function get_social_share(){
        $share_btn='
                    <!-- AddThis Button BEGIN -->
        <div class="addthis_toolbox addthis_default_style ">
        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
        <a class="addthis_button_tweet"></a>
        <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
        <a class="addthis_counter addthis_pill_style"></a>
        </div>
        <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4e69a8080b6c4213"></script>
        <!-- AddThis Button END -->
        ' ;
        return $share_btn;
    }
    
    function get_cms($id){
      $CI= &get_instance();
      $cms=$CI->admin_model->get_cms(array('content_id'=>$id));
      return $cms;  
    }
    
    function id_to_name($where,$table){
        $CI= &get_instance();
        $query=$CI->db->get_where($table,$where);
        $result=$query->first_row();
        $key="name";
        if(!empty($result)){
           $name=$result->$key;   
        }
        else
        {
            $name="";
        }
        return $name ;
    }
    
    function rss_feed($rss_url){
        $CI=&get_instance();
        $CI->simplepie->set_feed_url($rss_url);
        $CI->simplepie->set_cache_location(APPPATH.'cache/');
        $CI->simplepie->init();
        $CI->simplepie->handle_content_type();
        return $CI->simplepie->get_items();
    }
    
    
    
     function if_menu($controller, $function,$func2=NULL,$func3=NULL,$func4=NULL,$func5=NULL){
        $CI= &get_instance();
        $contrl=$CI->uri->segment(2);
        
        $func=$CI->uri->segment(3);       
        
        if($controller==$contrl && ($function==$func or $func2==$func or $func3==$func or $func4==$func or $func5==$func)){
            $class='current"';
        }
        else{
            $class=' ';
        }
        
        return $class;    
    }
    
    
    function if_current($controller, $function){
        $CI= &get_instance();
        $contrl=$CI->uri->segment(2);
        
        $func=$CI->uri->segment(3);       
        

        if($controller==$contrl && $function==$func){
            $class="class='current'";
        }
        else{
            $class=" ";
        }   
        return $class;    
    }


if(!function_exists("create_directory")){
        function create_directory($dir_id,$type){ 
           // mdie(FCPATH.'media/family/'.$dir_id);
           $CI=&get_instance();
           if($type==1){
             if (!is_dir(FCPATH.'media/family_'.$dir_id)) {
                mkdir(FCPATH.'media/family_'.$dir_id,'777');
             }
             return FCPATH.'media/family_'.$dir_id;   
           }
           if($type==2){
               $series=$CI->product_series_model->get_product_series(array('series_id'=>$dir_id));
               create_directory($series->family_id,1);
               if (!is_dir(FCPATH.'media/family_'.$series->family_id.'/series_'.$dir_id)) {
                 mkdir(FCPATH.'media/family_'.$series->family_id.'/series_'.$dir_id,'777');
               }
               return FCPATH.'media/family_'.$series->family_id.'/series_'.$dir_id;
               
           }
           
           if($type==3){
               $sku=$CI->product_model->get_product(array('sku'=>$dir_id));
               create_directory($sku->series_id,2);
                if (!is_dir(FCPATH.'media/family_'.$sku->family_id.'/series_'.$sku->series_id.'/sku_'.$sku->sku)) {
                 mkdir(FCPATH.'media/family_'.$sku->family_id.'/series_'.$sku->series_id.'/sku_'.$sku->sku,0777);
                 
               }
               
               return(FCPATH.'media/family_'.$sku->family_id.'/series_'.$sku->series_id.'/sku_'.$sku->sku);
               
           }
           
           
           
        }
    }

    
    function emailExits($email)
    {
       $CI=&get_instance();
         $e=$CI->users_groups_model->get_user(array('email'=>$email));  
             if(!empty($e))
             return 1;
             else 
             return 0;
    }
	
	function getUser($id){
        $CI=&get_instance();
        $user=$CI->ion_auth_model->user($id)->row();
        return $user->first_name.' '.$user->last_name;
    }
	function DiffDate($start,$end){
        $intervalo = date_diff(date_create($end), date_create($start));
	  
        $out=$intervalo->days.' days '.$intervalo->h.':'.$intervalo->i.":".$intervalo->s;
        return $out;
	  //return 1;
        
}
 function daysInMonth($month,$year) {
            $m = array(31,28,31,30,31,30,31,31,30,31,30,31);
            if ($month != 2) return $m[$month - 1];
            if ($year%4 != 0) return $m[1];
            if ($year%100 == 0 && $year%400 != 0) return $m[1];
            return $m[1] + 1;
} 
    