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
             <h2 class="ico_mug">Add Testimonial <div style="float:right;"><a href="<?php echo site_url('auth/index')?>"><img src="<?php echo base_url() ; ?>assets/admin/img/home.png" height="22px;" alt="home" /></a><div></h2>
            
                <?php echo displayStatus(); ?>
                                <?php  echo form_open_multipart('admin/add_testimonial')?>
                                    
                                    <fieldset  class="left" style="width:720px !important;">
                                   
                                    <br />
                                        <label>Title:</label> 
                                         <?php echo form_input($title); ?>
                                         <small>This field is required.</small> 
                                      <br />
                                        <label>Description:</label> 
                                        <div style="width:620px;"><?php echo form_textarea($description,null,'id="markItUp" cols="80" rows="10"'); ?>
                                         </div>
                                        <br />
                                        <label>Name:</label> 
                                         <?php echo form_input($name); ?>
                                         <small>This field is required.</small> 
                                      <br />
                                      <br />
                                        <label>Subscript:</label> 
                                         <?php echo form_input($subscript); ?>
                                         <small>This field is required.</small> 
                                      <br />
                                      <br />
                                            <input class="button" type="submit" value="Submit" />
                                        
                                        
                                    </fieldset>
                                    
                                    <div class="clear"></div><!-- End .clear -->
                                    
                                </form>
           
 </div> <!-- End .content-box -->                                 
 <?php $this->load->view('admin_sidebar');?>                          

</div>

