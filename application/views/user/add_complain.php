<div id="shortcuts" class="clearfix" style="width:740px !important;">
             <h2 class="ico_mug">Add Comments <div style="float:right;"><a href="<?php echo site_url('auth/index')?>"><img src="<?php echo base_url() ; ?>assets/admin/img/home.png" height="22px;" alt="home" /></a><div></h2>
            
                <?php echo displayStatus(); ?>
                                <?php  echo form_open_multipart('user/add_complain')?>
                                    
                                    <fieldset  class="left" style="width:720px !important;">
                                    <p>   
                                    <label>Client:</label> 
                                         <?php echo form_dropdown('client_id',$client_option,$selected_client); ?>
                                         <small>This field is required.</small> 
                                     </p>
<p><a href="<?php echo site_url('user/add_client')?>">Add New Client</a></p>
                                     <p>
                                     <label>Type:</label> 
                                         <?php echo form_dropdown('complain_title',
$ct_option,$selected_ct); ?>
                                         <small>This field is required.</small> 
                                     </p>
                                  <p>

<input type="checkbox" name="urgent"  />Urgent
</p>
                                     <p>   
                                    <label>Message:</label> 
                                         <?php echo form_textarea($complain_message); ?>
                                         
                                     </p>
                                     
                                     
                                     <p> 
                                            <input class="button" type="submit" value="Submit" />
                                       </p> 
                                        
                                    </fieldset>
                                    
                                    <div class="clear"></div><!-- End .clear -->
                                    
                                </form>
           
 </div> <!-- End .content-box --> 
<!-- sidebar starts                                -->
 <div id="sidebar" class="right">
                <h2 class="ico_mug">Add</h2>
            <ul id="menu">
               
                        <li><a href="<?php echo site_url('admin/add_ad')?>">Add add</a></li>
                        <li><a href="<?php echo site_url('admin/show_add')?>">Manage add</a></li>
                    
            </ul>

</div>
<!--            sidebar ends-->


</div>
