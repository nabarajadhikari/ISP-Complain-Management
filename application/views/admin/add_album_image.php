<head>
<script type="text/javascript">
    function moreImage(){
         var imageno=$('#image_number').val();
         $('#image_number').val(++imageno);
          var text="<p><label>Image:"+imageno+"</label> <input type='file' name='filename[]' > <br /><small>This field is required.File type must be jpg,gif or png.</small></p>"
          $('#moreImage').append(text);
    }
    
</script>
</head>

<div id="shortcuts" class="clearfix" style="width:740px !important;">
             <h2 class="ico_mug">Add Album Image</h2>
            
                <?php echo displayStatus(); ?>
                                <?php  echo form_open_multipart('admin/add_album')?>
                                    
                                    <fieldset  class="left" style="width:720px !important;">
                                       
                                    
                                            <p><label>Image:1</label> 
                                         <input type="file" name="filename[]" >
                                         <br /><small>This field is required.File type must be jpg,gif or png.</small> 
                                         
                                      </p>
                                      <p id="moreImage">
                                      <input type="hidden" id='image_number' value="1">
                                      </p>
                                      <p>
                                       <a href="#" onclick="moreImage()">more image</a>
                                       </p>     
                                       <p>
                                            <input class="button" type="submit" value="Submit"/>
                                        </p>
                                        
                                      
                                         
                                        
                                    </fieldset>
                                    
                                    
                                </form>
           
 </div> <!-- End .content-box -->                                 
 <?php $this->load->view('admin_sidebar');?>                          

</div>




 