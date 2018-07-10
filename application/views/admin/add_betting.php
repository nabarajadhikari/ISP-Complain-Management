<script type="text/javascript">
    //function check_type()
//    {
//       if($("#infornation_type").val()==4)
//       {
//          var text= '<label>News Type:</label><select name="flag"><option value="1" selected="selected">Latest</option><option value="2">Popular</option>';
//          $('#news_type').empty();
//          $('#news_type').append(text);
//       }else
//       {
//          $('#news_type').empty();
//       } 
//    }
</script>
<div id="shortcuts" class="clearfix" style="width:740px !important;">
             <h2 class="ico_mug">Add Betting</h2>
            
                <?php echo displayStatus(); ?>
                                <?php  echo form_open_multipart('admin/add_betting')?>
                                    
                                    <fieldset  class="left" style="width:720px !important;">
                                   
                                    <br />
                                        <label>Title:</label> 
                                         <?php echo form_input($title); ?>
                                         <small>This field is required.</small> 
                                      <br />
                                        <label>Description:</label> 
                                        <div style="width:620px;"><?php echo form_textarea($description,null,'id="markItUp" cols="80" rows="10"'); ?>
                                         </div>
                                      <br /><label>Max Bonus:</label> 
                                         <input type="text" name="max_bonus" >
                                         <small>This field is required.</small> 
                                      <br /><label>In Bonus:</label> 
                                         <input type="text" name="in_bonus" >
                                         <small>This field is required.</small> 
                                            
                                      <br /><label>Logo Image:</label> 
                                         <input type="file" name="userfile" >
                                         <br /><small>This field is required.File type must be gif or png.</small> 
                                         
                                      <br />
                                            <input class="button" type="submit" value="Submit" />
                                        
                                        
                                    </fieldset>
                                    
                                    <div class="clear"></div><!-- End .clear -->
                                    
                                </form>
           
 </div> <!-- End .content-box -->                                 
 <?php $this->load->view('admin_sidebar');?>                          

</div>

