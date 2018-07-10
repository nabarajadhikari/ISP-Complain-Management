
<div id="shortcuts" class="clearfix" style="width:740px !important;">
             <h2 class="ico_mug">Add News <div style="float:right;"><a href="<?php echo site_url('auth/index')?>"><img src="<?php echo base_url() ; ?>assets/admin/img/home.png" height="22px;" alt="home" /></a><div></h2>
            
                <?php echo displayStatus(); ?>
                                <?php  echo form_open_multipart('admin/add_news')?>
                                    
                                    <fieldset  class="left" style="width:720px !important;">
                                    
                                    <p>   
                                    <br />
                                    <label>Is news a popular type?:</label>
                                    <input type="radio" name="flag" value="2">Yes&nbsp;&nbsp;&nbsp;<input type="radio" name="flag" value="0"> No
                                    </p><p>    <label>Title:</label> 
                                         <?php echo form_input($title); ?>
                                         <small>This field is required.</small> 
                                     </p><p>
                                        <label>Description:</label> 
                                        <div style="width:620px;"><?php echo form_textarea($description,null,'id="markItUp" cols="80" rows="10"'); ?>
                                         </div>
                                      </p><p> 
                                      <label>Image:</label> 
                                         <input type="file" name="userfile" >
                                         <br /><small>This field is required.File type must be jpg,gif or png and dimension 608*407px.</small> 
                                         
                                      </p><p> 
                                            <input class="button" type="submit" value="Submit" />
                                       </p> 
                                        
                                    </fieldset>
                                    
                                    <div class="clear"></div><!-- End .clear -->
                                    
                                </form>
           
 </div> <!-- End .content-box -->                                 
 <?php $this->load->view('admin_sidebar');?>                          

</div>

