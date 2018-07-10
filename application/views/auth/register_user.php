<head>
    <script type="text/javascript"> 
        $(document).ready(function(){
		
            $('#refrence').hide();
            $('#department').hide();
			 var $value=$('#email').val();
			 if($value.length>1)
			 list_department();
			 
        });
        function list_department(){
           
           var $value=$('#email').val();
           $.ajax({
                url:"<?php echo site_url("register/get_departments");?>",
                data:{'email':$value},
                type:"POST",
                dataType: 'html',
                success: function(data){
                    if(data != 'not_company'){
                        //$('#refrence_text').value = "";
                        document.getElementById("refrence_text").value = "";
                        $('#refrence').hide();
                        $('#department_id').empty();
                        $('#department_id').append(data);
                        $('#department').show();
                        $('#department_id').show();
                    }else{
                        $('#department_id').empty();
                        $('#department').hide();
                        $('#refrence').show();
                    }
                    
                } 
             });
        }
    </script>
</head>
<div id="main-content"> <!-- Main Content Section with everything -->
            
            <noscript> <!-- Show a notification if the user has disabled javascript -->
                <div class="notification error png_bg">
                    <div>
                        Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
                    Download From <a href="http://www.exet.tk">exet.tk</a></div>
                </div>
            </noscript>
            
            <!-- Page Head -->
            
            <h2></h2>
            <div class="clear"></div> <!-- End .clear -->
            
            <div class="content-box"><!-- Start Content Box -->
                
                <div class="content-box-header">
                  
                    <h3>Register New User</h3>
            
                    <div class="clear"></div>
                </div> <!-- End .content-box-header -->
                
                <div class="content-box-content">
                <?php echo displayStatus(); ?>
                                            
                    <div > <!--class="tab-content" id="tab2"-->
                            
                                <form action="<?php echo site_url('register/register_user')?>" method="post">
                                    
                                    <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
                                        
                                        <p>
                                            <label>First Name:</label>
                                                <?php echo form_input($first_name); ?>  <!-- Classes for input-notification: success, error, information, attention -->
                                                <br /><small>This field is required.</small>
                                        </p>
                                        
                                        <p>
                                    <label>Last Name</label>
                                    <?php echo form_input($last_name); ?> 
                                </p>
                                
                                
                                 <p>
                                    <label>Phone</label>
                                    <?php echo form_input($phone1); ?> 
                                </p>
                                 <p>
                                    <label>Email:</label>
                                    <?php echo form_input($email,null,"id='email' onchange='list_department()'"); ?> 
                                </p>
                                <p id='department'>
                                    <label>Company Department</label>
                                    <?php echo form_dropdown('department_id',$department_options,$department_id['selected'],"id='department_id'"); ?> 
                                </p>
                                <p id="refrence">
                                    <label>Reference Email</label>
                                     <input type="text" id='refrence_text' name="refrence_text" placeholder="reference email">
                                </p>
                                <label>Password:</label>
                                    <?php echo form_input($password); ?> 
                                </p>
                                <label>Password Confirm:</label>
                                    <?php echo form_input($password_confirm); ?> 
                                </p>
                               <!-- <p>
                                    <label>User Group</label>
                                    <?php //echo form_dropdown('group',$options); ?> 
                                </p>-->
                                       <p>
                                            <input class="button" type="submit" value="Submit" />
                                        </p>
                                        
                                    </fieldset>
                                    
                                    <div class="clear"></div><!-- End .clear -->
                                    
                                </form>
                                
                            </div>
                </div> <!-- End .content-box-content -->
                
            </div> <!-- End .content-box -->
            