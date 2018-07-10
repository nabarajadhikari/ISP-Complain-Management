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
                  
                    <h3>Add New Staff</h3>
            
                    <div class="clear"></div>
                </div> <!-- End .content-box-header -->
                
                <div class="content-box-content">
                <?php echo displayStatus(); ?>
                                            
                    <div > <!--class="tab-content" id="tab2"-->
                            
                                <form action="<?php echo site_url('auth/edit_staff/'.$id)?>" method="post">
                                    
                                    <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
                                   <?php echo form_hidden('id', $id);?>      
                                    
      <table><tbody><tr>

      <td width="25%;" style="text-align:right;"><label>First Name: </label></td> <td width="50%" style="text-align:center;"><?php echo form_input($first_name);?></td>
      <td width="25%;" style="text-align:left;">  <small>This field is required.</small>        
      </td>
       </tr>
       
      <td width="25%;" style="text-align:right;"><label> Last Name:</label></td> <td width="50%" style="text-align:center;">
            <?php echo form_input($last_name);?>
            </td><td width="25%;" style="text-align:left;">  <small>This field is required.</small>
       </td>
       </tr>
      <td width="25%;" style="text-align:right;"><label>Phone:</label></td> <td width="50%" style="text-align:center;">
            <?php echo form_input($phone1);?>
            </td><td width="25%;" style="text-align:left;">  <small>This field is required.</small>
       </td>
       </tr>
      
      <td width="25%;" style="text-align:right;"><label>Email: </label></td> <td width="50%" style="text-align:center;">
            <?php echo form_input($email);?>
            </td><td width="25%;" style="text-align:left;">  <small>This field is required.</small>
       </td>
       </tr>
      <td width="25%;" style="text-align:right;"><label>Change Password: </label></td> <td width="50%" style="text-align:center;">
            <?php echo form_input($password);?>
            </td><td width="25%;" style="text-align:left;">  <small>This field is required.</small>
       </td>
       </tr>

      <td width="25%;" style="text-align:right;"><label>Confirm Password:</label></td> <td width="50%" style="text-align:center;">
            <?php echo form_input($password_confirm);?>
            </td><td width="25%;" style="text-align:left;">  <small>This field is required.</small>
       </td>
       </tr>
      <td width="25%;" style="text-align:right;"><label>Address:</label></td> <td width="50%" style="text-align:center;">
            <?php echo form_input($res_address);?>
            </td><td width="25%;" style="text-align:left;">  <small>This field is required.</small>
       </td>
       </tr>
      <td width="25%;" style="text-align:right;">
        <label>Suburb:</label></td> <td width="50%" style="text-align:center;"> 
         <?php echo form_input($res_subrub); ?>
         </td><td width="25%;" style="text-align:left;">  <small>This field is required.</small> 
       </td>
       </tr>
    <td width="25%;" style="text-align:right;">
        <label>State:</label></td> <td width="50%" style="text-align:center;"> 
         <?php echo form_input($res_state); ?>
         </td><td width="25%;" style="text-align:left;">  <small>This field is required.</small> 
       </td>
       </tr>
       <td width="25%;" style="text-align:right;">
        <label>Post Code:</label></td> <td width="50%" style="text-align:center;"> 
         <?php echo form_input($res_postcode); ?>
         </td><td width="25%;" style="text-align:left;">  <small>This field is required.</small> 
       </td>
       </tr>
      <td width="25%;" style="text-align:right;">
        <label>Client's Bank Name:</label></td> <td width="50%" style="text-align:center;"> 
         <?php echo form_dropdown('bank_name',$bank_option,$bank_name['selected']); ?>
         </td><td width="25%;" style="text-align:left;">  <small>This field is required.</small> 
       </td>
       </tr>
      <td width="25%;" style="text-align:right;">
        <label>BSB Number:</label></td> <td width="50%" style="text-align:center;"> 
         <?php echo form_input($bank_bsb); ?>
         </td><td width="25%;" style="text-align:left;">  <small>This field is required.</small> 
       </td>
       </tr>
      <td width="25%;" style="text-align:right;">
        <label>A/c Number:</label></td> <td width="50%" style="text-align:center;"> 
         <?php echo form_input($bank_account_number); ?>
         </td><td width="25%;" style="text-align:left;">  <small>This field is required.</small> 
       </td>
       </tr>
      <td width="25%;" style="text-align:right;">
        <label>Emergency Name:</label></td> <td width="50%" style="text-align:center;"> 
         <?php echo form_input($emergencyname); ?>
         </td><td width="25%;" style="text-align:left;">  <small>This field is required.</small> 
       </td>
       </tr>
      <td width="25%;" style="text-align:right;">
        <label>Emergency Ph:</label></td> <td width="50%" style="text-align:center;"> 
         <?php echo form_input($emergencyphone); ?>
         </td><td width="25%;" style="text-align:left;">  <small>This field is required.</small> 
       </td>
       </tr>

      <td colspan="3" style="text-align:center;"><?php echo form_submit('submit', 'Create Staff');?> </td></tr>

        </tbody></table>
                                        
                                        
                                        
                                        
                                        
                                       
                                        
                                    </fieldset>
                                    
                                    <div class="clear"></div><!-- End .clear -->
                                    
                                </form>
                                
                            </div>
                </div> <!-- End .content-box-content -->
                
            </div> <!-- End .content-box -->
            