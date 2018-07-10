
<div id="shortcuts" class="clearfix" style="width:740px !important;">
             <h2 class="ico_mug">Add Complain Type <div style="float:right;"><a href="<?php echo site_url('auth/index')?>"><img src="<?php echo base_url() ; ?>assets/admin/img/home.png" height="22px;" alt="home" /></a><div></h2>
            
                <?php echo displayStatus(); ?>
                                <?php  echo form_open_multipart('user/edit_complain_type/'.$id)?>
                                    
                                    <fieldset  class="left" style="width:720px !important;">
                                    <p>   
                                    <label>Name:</label>
                                    <input type="hidden" name="id" value="<?php echo $id?>"> 
                                         <?php echo form_input($name); ?>
                                         <small>This field is required.</small> 
                                     </p>
                                     <p>   
                                    <label>Desc:</label> 
                                         <?php echo form_textarea($desc,$desc['value']); ?>
                                         <small>This field is required.</small> 
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
               
                       <li><a href="<?php echo site_url('admin/add_complain_type')?>">Add Complain Type</a></li>
                        <li><a href="<?php echo site_url('admin/show_complain_type')?>">Manage Complain Type</a></li>
                    
            </ul>

</div>
<!--            sidebar ends-->


</div>

