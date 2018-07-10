
<div id="shortcuts" class="clearfix" style="width:740px !important;">
                  
                    <h2 class="ico_mug">Edit  News <div style="float:right;"><a href="<?php echo site_url('auth/index')?>"><img src="<?php echo base_url() ; ?>assets/admin/img/home.png" height="22px;" alt="home" /></a><div></h2>
                    <?php echo displayStatus(); ?>
                                            
                    <div > 
                                <?php  echo form_open_multipart('admin/edit_news/'.$id)?>
                                    
                                    <fieldset  class="left" style="width:720px !important;"> 
                                    
                                     <p>   
                                    <br/>
                                    <label>Is news a popular type?:</label>
                                    <input type="radio" name="flag" value="2" <?php if($information->flag==2)echo 'checked="checked"'?>>Yes&nbsp;&nbsp;&nbsp;<input type="radio" name="flag" value="0" <?php if($information->flag==0)echo 'checked="checked"'?>> No
                                    </p>
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
            