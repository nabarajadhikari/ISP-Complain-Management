
<div id="shortcuts" class="clearfix" style="width:740px !important;">
             <h2 class="ico_mug">Database Upload <div style="float:right;"><a href="<?php echo site_url('auth/index')?>"><img src="<?php echo base_url() ; ?>assets/admin/img/home.png" height="22px;" alt="home" /></a><div></h2>
            
                <?php echo displayStatus(); ?>
                                <?php  echo form_open_multipart('admin/upload_data')?>
                                    
                                    <fieldset > 
                                       <p>
                                        <label>Choose File:</label> 
                                        <input type="file" name="userfile" > 
                                         <br /><small>This field is required.</small> 
                                      </p>
                                      
                                       <p>
                                            <input class="button" type="submit" value="Submit" />
                                        </p>
                                        
                                    </fieldset>
                                    
                                    <div class="clear"></div><!-- End .clear -->
                                    
                                </form>
                                
                            
                
                </div> 
  </div>         
            