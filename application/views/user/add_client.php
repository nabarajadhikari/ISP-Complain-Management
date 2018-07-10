<div id="shortcuts" class="clearfix" style="width:740px !important;">
             <h2 class="ico_mug">Add Client <div style="float:right;"><a href="<?php echo site_url('auth/index')?>"><img src="<?php echo base_url() ; ?>assets/admin/img/home.png" height="22px;" alt="home" /></a><div></h2>
            
                <?php echo displayStatus(); ?>
                                <?php  echo form_open_multipart('user/add_client')?>
                                    
                                    <fieldset  class="left" style="width:720px !important;">
                                    <p>   
                                    <label>Full Name:</label> 
                                         <?php echo form_input($name); ?>
                                         <small>This field is required.</small> 
                                     </p>
                                     <p>   
                                    <label>Address:</label> 
                                         <?php echo form_input($address); ?>
                                         <small>This field is required.</small> 
                                     </p>
                                     <p>   
                                    <label>Client Type:</label> 
                                         <?php echo form_input($bandwidth); ?>
                                         <small>This field is required.</small> 
                                     </p>
<p>   
                                    <label>Phone Number:</label> 
                                         <?php echo form_input($phone); ?>
                                         <small>This field is required.</small> 
                                     </p>
<p>   
                                    <label>IP Address:</label> 
                                         <?php echo form_input($ip_address); ?>
                                         <small>This field is required.</small> 
                                     </p>
                                     <p>   
                                   <!-- <label>Ashwin:</label> 
                                         <?php echo form_input($ashwin); ?>
                                         <small>This field is required.</small> 
                                     </p>
                                     <p>   
                                    <label>RN:</label> 
                                         <?php echo form_input($rn); ?>
                                         <small>This field is required.</small> 
                                     </p>-->
                                     <p>   
                                    <label>Expiry Date:</label> 
                                         <?php //echo form_input($expiry_date); ?>
<input type="text" name="expiry_date"  class="tcal small-input">
                                         <small>This field is required.</small> 
                                     </p>
                                    <!-- <p>   
                                    <label>Renew By:</label> 
                                         <?php echo form_input($renew_by); ?>
                                         <small>This field is required.</small> 
                                     </p>-->
                                     <p>   
                                    <label>Remark:</label> 
                                         <?php echo form_input($remark); ?>
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
               
                        <li><a href="<?php echo site_url('admin/add_ad')?>">Add add</a></li>
                        <li><a href="<?php echo site_url('admin/show_add')?>">Manage add</a></li>
                    
            </ul>

</div>
<!--            sidebar ends-->


</div>

