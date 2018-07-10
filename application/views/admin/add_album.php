<div id="shortcuts" class="clearfix" style="width:740px !important;">
             <h2 class="ico_mug">Create New Album</h2>
            
                <?php echo displayStatus(); ?>
                                <?php  echo form_open_multipart('admin/add_album')?>
                                    
                                    <fieldset  class="left" style="width:720px !important;">
                                       
                                    
                                        <label>Title:</label> 
                                         <?php echo form_input($title); ?>
                                         <small>This field is required.</small> 
                                     
                                      
                                      
                                      
                                            <br/><input class="button" type="submit" value="Submit" />
                                        
                                        
                                    </fieldset>
                                    
                                    
                                </form>
           
 </div> <!-- End .content-box -->                                 
 <?php $this->load->view('admin_sidebar');?>                          

</div>