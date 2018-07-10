
<div id="shortcuts" class="clearfix" style="width:740px !important;">
                  
                    <h2 class="ico_mug">Edit Slider News</h2>
                    <?php echo displayStatus(); ?>
                                            
                    <div > 
                                <?php  echo form_open_multipart('admin/edit_slider_news/'.$id)?>
                                    
                                    <fieldset  class="left" style="width:720px !important;"> 
                                    
                                     
                                    <p> <input type="hidden" name="id" value="<?php echo $id?>">
                                        <label>Title:</label> 
                                         <?php echo form_input($title); ?>
                                         <br /><small>This field is required.</small> 
                                      </p>
                                      
                                      <p>
                                        <label>Description:</label> 
                                        <div style="width:620px;"><?php echo form_textarea($description,null,'id="markItUp" cols="80" rows="10"'); ?>
                                         </div>
                                      </p> 
                                       
                                      <p><label>Change Image:</label> 
                                         <input type="file" name="userfile" >
                                         <br /><small>File type must be jpg,gif or png and dimension 608*407px.</small> 
                                         
                                      </p>     
                                       <p>
                                            <input class="button" type="submit" value="Submit" />
                                        </p>
                                        
                                    </fieldset>
                                    
                                    
                                    
                                </form>
                                
                            </div>
                </div> <!-- End .content-box-content -->
 <?php $this->load->view('admin_sidebar');?>               
 </div>            
            