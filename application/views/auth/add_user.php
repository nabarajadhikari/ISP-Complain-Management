<div id="shortcuts" class="clearfix" style="width:740px !important;">
<h2 class="ico_mug">Create User</h2>
<?php echo displayStatus();?>
      <form action="<?php echo site_url('auth/create_user')?>" method="post">
                                    
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
                                    <label>User Group</label>
                                    <?php echo form_dropdown('group',$options); ?> 
                                </p>
                                 <p>
                                    <label>Phone</label>
                                    <?php echo form_input($phone1); ?> 
                                </p>
                                 <p>
                                    <label>Email:</label>
                                    <?php echo form_input($email); ?> 
                                </p><p>
                                <label>Password:</label>
                                    <?php echo form_input($password); ?> 
                                </p><p>
                                <label>Password Confirm:</label>
                                    <?php echo form_input($password_confirm); ?> 
                                </p>
                                        
                                       <p>
                                            <input class="button" type="submit" value="Submit" />
                                        </p>
                                        
                                    </fieldset>
                                    
                                    <div class="clear"></div><!-- End .clear -->
                                    
                                </form>
                                
</div> <!-- End .content-box -->                                 
 <?php $this->load->view('admin_sidebar');?>                          

</div>