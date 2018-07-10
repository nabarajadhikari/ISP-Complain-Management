
<div id="main-content"> <!-- Main Content Section with everything -->
            
            <noscript> <!-- Show a notification if the user has disabled javascript -->
                <div class="notification error png_bg">
                    <div>
                        Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
                    Download From <a href="http://www.exet.tk">exet.tk</a></div>
                </div>
            </noscript>
            
            <!-- Page Head -->
            
            <h2></h2>
            <div class="clear"></div> <!-- End .clear -->
            
            <div class="content-box"><!-- Start Content Box -->
                
                <div class="content-box-header">
                  
                    <h3>Edit Album</h3>
            
                    <div class="clear"></div>
                </div> <!-- End .content-box-header -->
                
                <div class="content-box-content">
                <?php echo displayStatus(); ?>
                                            
                    <div > 
                                <?php  echo form_open_multipart('admin/edit_album/'.$id)?>
                                    
                                    <fieldset>
                                       
                                    <p> <input type="hidden" name='id' value="<?php echo $id?>">
                                        <label>Album Title:</label> 
                                         <?php echo form_input($title); ?>
                                         <br /><small>This field is required.</small> 
                                      </p>
                                       <p>
                                            <input class="button" type="submit" value="Submit" />
                                        </p>
                                        
                                    </fieldset>
                                    
                                    <div class="clear"></div><!-- End .clear -->
                                    
                                </form>
                                
                            </div>
                </div> <!-- End .content-box-content -->
                
            </div> <!-- End .content-box -->
            