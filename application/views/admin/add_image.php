<head>
<script type="text/javascript">
    function moreImage(){
         var imageno=$('#image_number').val();
         $('#image_number').val(++imageno);
          var text="<p><label>Image:"+imageno+"</label> <input type='file' name='filename[]' > <br /><small>This field is required.File type must be jpg,gif or png.</small></p>"
          $('#moreImage').append(text);
    }
    $(document).ready(function() {
        $('#gallery').hide();
        changeCategory();
    });
    function changeCategory(){
            if($('#category_id').val()==4 )
            {      $('#gallery_title').val('');
                   $('#gallery').show();
            }
            else
                
                $('#gallery').hide();
    }
    function checkSubmit(){
        var test=$('#category_id').val();
        if(test==4 ){
                   if($('#gallery_title').val()==''){
                        alert('Gallery Title is required');
                        document.form1.gallery_album_id.focus();
                        return false;
                   }
        }
        return true;
    }
</script>
</head>
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
                  
                    <h3>Add Image</h3>
            
                    <div class="clear"></div>
                </div> <!-- End .content-box-header -->
                
                <div class="content-box-content">
                <?php echo displayStatus(); ?>
                                            
                    <div > 
                                <?php  echo form_open_multipart('admin/add_image',array('name'=>'form1'))?>
                                    
                                    <fieldset>
                                    <p><label>Image Category</label> 
                                         <?php echo form_dropdown('category_id',$image_category,null,'class="small input" id="category_id" onchange="changeCategory();"')?>
                                         <br /><small>This field is required.</small> 
                                         
                                      </p> 
                                      <p id='gallery'><label>Gallery Title</label> 
                                         <?php echo form_dropdown('gallery_album_id',$albums,null,'id="gallery_title"')?>
                                         <br /><small>This field is required.</small> 
                                         
                                      </p> 
                                      <p><label>Image:1</label> 
                                         <input type="file" name="filename[]" >
                                         <br /><small>This field is required.File type must be jpg,gif or png.</small> 
                                         
                                      </p>
                                      <div id="moreImage">
                                      <input type="hidden" id='image_number' value="1">
                                      </div>
                                       <a href="#" onclick="moreImage()">more image</a>     
                                       <p>
                                            <input class="button" type="submit" value="Submit" onclick="return(checkSubmit());"/>
                                        </p>
                                        
                                    </fieldset>
                                    
                                    <div class="clear"></div><!-- End .clear -->
                                    
                                </form>
                                
                            </div>
                </div> <!-- End .content-box-content -->
                
            </div> <!-- End .content-box -->
            