<script type="text/javascript">
    function check_type()
    {
       if($("#infornation_type").val()==1)
       {
          var text= '<br/><label>News Type:</label><select name="flag"><option value="1" selected="selected">Slider</option><option value="2">Popular</option><br/>';
          $('#news_type').empty();
          $('#news_type').append(text);
       }else if($("#infornation_type").val()==2)
       {
          var text= '<br/><label>Link:</label><input type="text" name="link"><small>eg. www.google.com</small><br/>';
          $('#news_type').empty();
          $('#news_type').append(text);
       }
       else
       {
          $('#news_type').empty();
       } 
    }
</script>
<div id="shortcuts" class="clearfix" style="width:740px !important;">
                  
                    <h2 class="ico_mug">Edit Information</h2>
                    <?php echo displayStatus(); ?>
                                            
                    <div > 
                                <?php  echo form_open_multipart('admin/edit_information/'.$id)?>
                                    
                                    <fieldset  class="left" style="width:720px !important;"> 
                                    
                                    <p><input type="hidden" name="id" value="<?php echo $id?>"> <label>Information Type:</label> 
                                         <?php echo form_dropdown('information_type',$information_type,$selected_information_type,'onchange="check_type()" id="infornation_type"'); ?>
                                         <br /><small>This field is required.</small> 
                                      </p> 
                                     <p id='news_type'>
                                     
                                     </p>  
                                    <p>
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
            