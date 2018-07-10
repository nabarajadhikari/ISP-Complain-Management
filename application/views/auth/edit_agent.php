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
                  
                    <h3>Edit Agent</h3>
            
                    <div class="clear"></div>
                </div> <!-- End .content-box-header -->
                
                <div class="content-box-content">
                <?php echo displayStatus(); ?>
                                            
                    <div > <!--class="tab-content" id="tab2"-->
                            
                                <form action="<?php echo site_url('auth/edit_agent/'.$id)?>" method="post">
                                    
                                    <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
                                       <?php echo form_hidden('id', $id);?> 
                                        <div style="padding:4px;"><div style="min-width: 150px;display: block;float: left;">Business Name:</div> <?php echo form_input($businessname);?></div>
                                        <div style="padding:4px;"><div style="min-width: 150px;display: block;float: left;">Tax Agent Number:</div> <span><?php echo form_input($tfn);?></span><div style="display:block;float:right;">ABN:<span><?php echo form_input($abn);?></span> </div></div>
                                        <div style="padding:4px;"><div style="min-width: 150px;display: block;float: left;">Contact Name:</div> <?php echo form_input($username);?></div>
                                        <div style="padding:4px;"><div style="min-width: 150px;display: block;float: left;">Contact Phone Number:</div> <?php echo form_input($phone1);?></div>
                                        <div style="padding:4px;"><div style="min-width: 150px;display: block;float: left;">Contact Email Address:</div> <?php echo form_input($email);?></div>
                                        <div style="padding:4px;"><div style="min-width: 150px;display: block;float: left;">Password:</div> <?php echo form_input($password);?></div>
                                        <div style="padding:4px;"><div style="min-width: 150px;display: block;float: left;">Confirm Password:</div> <?php echo form_input($password_confirm);?></div>
                                        <div style="padding:4px;"><div style="min-width: 150px;display: block;float: left;">Business Address:</div> <?php echo form_input($res_address);?></div>
                                        <div style="padding:4px;"><div style="min-width: 150px;display: block;float: left;">Suburb:</div> <?php echo form_input($res_subrub);?></div>
                                        <div style="padding:4px;"><div style="min-width: 150px;display: block;float: left;">State:</div> <span><?php echo form_input($res_state);?><span><div style="display:block;float:right;">Post Code: <?php echo form_input($res_postcode);?></div>
                                        <div style="padding:4px;"><div style="min-width: 150px;display: block;float: left;">Bank Name:</div> <?php echo form_input($bank_name);?></div>
                                        <div style="padding:4px;"><div style="min-width: 150px;display: block;float: left;">BBS Number:</div> <?php echo form_input($bank_bsb);?><div style="display:block;float:right;">A/c Number: <?php echo form_input($bank_account_number);?></div></div>
                                        <div style="padding:4px;"><div style="min-width: 150px;display: block;float: left;">Referral Fee Amount:</div> <?php echo form_input($referral_fee_amount);?></div>
                                         <p><input type="submit" value="Save" class="button"></p>
                                    </fieldset>
                                    
                                    <div class="clear"></div><!-- End .clear -->
                                    
                                </form>
                                
                            </div>
                </div> <!-- End .content-box-content -->
                
            </div> <!-- End .content-box -->
            