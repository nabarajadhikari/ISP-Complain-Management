<div id="shortcuts" class="clearfix" style="width:740px !important;">
             <h2 class="ico_mug">Add Comments <div style="float:right;"><a href="<?php echo site_url('auth/index')?>"><img src="<?php echo base_url() ; ?>assets/admin/img/home.png" height="22px;" alt="home" /></a><div></h2>
            
                <?php echo displayStatus(); ?>
                                <?php  echo form_open_multipart('user/edit_complain/'.$id)?>
                                    
                                    <fieldset  class="left" style="width:720px !important;">
                                    <p><input type="hidden" name="id" value="<?php echo $id?>">   
                                    <label>Client:</label> 
                                         <?php echo form_dropdown('client_id',$client_option,$selected_client); ?>
                                         <small>This field is required.</small> 
                                     </p>
                                    <p>   
                                    <label>Title:</label> 
                                         <?php echo form_input($complain_title); ?>
                                         <small>This field is required.</small> 
                                     </p>
 <p>

<input type="checkbox" name="urgent"  <?php if($urgnt) echo 'checked="Checked"'; ?> />Urgent
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

