
<div id="shortcuts" class="clearfix" style="width:740px !important;">
             <h2 class="ico_mug">Add Advertisement <div style="float:right;"><a href="<?php echo site_url('auth/index')?>"><img src="<?php echo base_url() ; ?>assets/admin/img/home.png" height="22px;" alt="home" /></a><div></h2>
            
                <?php echo displayStatus(); ?>
                                <?php  echo form_open_multipart('admin/add_ad')?>
                                    
                                    <fieldset  class="left" style="width:720px !important;">
                                    <p>   
                                    <br />
                                    <label>Link:</label><input type="text" name="link"><small>eg. www.google.com</small><br/>
                                        <label>Title:</label> 
                                         <?php echo form_input($title); ?>
                                         <small>This field is required.</small> 
                                     </p><p>
                                        <label>Description:</label> 
                                        <div style="width:620px;"><?php echo form_textarea($description,null,'id="markItUp" cols="80" rows="10"'); ?>
                                         </div>
                                      </p><p> 
                                      <label>Image:</label> 
                                         <input type="file" name="userfile" >
                                         <br /><small>This field is required.File type must be jpg,gif or png and dimension 207*146px.</small> 
                                         
                                      </p><p> 
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

