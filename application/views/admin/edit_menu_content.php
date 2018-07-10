
<div id="shortcuts" class="clearfix" style="width:740px !important;">
             <h2 class="ico_mug">Edit Menu Content</h2>
            
                <?php echo displayStatus(); ?>
                                <?php  echo form_open_multipart('admin/edit_menu_content')?>
                                    
                                    <fieldset  class="left" style="width:720px !important;">
                                   
                                    <p>
                                        <label>Menu:</label> 
                                         <?php echo form_input($menu11); ?>
                                         <small>This field is required.</small> 
                                     </p>
                                     <p>
                                        <label>Title:</label> 
                                         <?php echo form_input($title); ?>
                                         <small>This field is required.</small> 
                                     </p>
                                     <p>
                                        <label>Contents:</label> 
                                        <div style="width:620px;"><?php echo form_textarea($description,null,'id="markItUp" cols="80" rows="10"'); ?>
                                         </div>
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

