<script type="text/javascript">
jQuery.fn.extend({
scrollToMe: function () {
    var x = jQuery(this).offset().top - 100;
    jQuery('html,body').animate({scrollTop: x}, 500);
}});
    function moreImage(){
         var imageno=$('#image_number').val();
         $('#image_number').val(++imageno);
         var text='<div class="m" id="image_number_'+imageno+'"></div><input type="file" name="imagename[]"  placeholder="Image" > </div>';
          $('#moreImage').append(text);
        
$('#image_number_'+imageno).scrollToMe();
          
    }
    

</script>

<?php $base_url=base_url() ; ?>
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Add Slider</h1></div>


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
    <th rowspan="3" class="sized"><img src="<?php echo $base_url; ?>assets/admin/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
    <th class="topleft"></th>
    <td id="tbl-border-top">&nbsp;</td>
    <th class="topright"></th>
    <th rowspan="3" class="sized"><img src="<?php echo $base_url; ?>assets/admin/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
    <td id="tbl-border-left"></td>
    <td>
    <!--  start content-table-inner -->
    <div id="content-table-inner">
    
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
    <tr valign="top">
    <td>
    
           <?php displayStatus(); ?>
    
        <!-- start id-form -->
        <?php echo form_open_multipart('admin/add_gallery');?>
        <table border="0" cellpadding="0" cellspacing="0"  id="id-form">

        

    <tr>
        <th valign="top">Description (English):</th>
        <td><textarea  rows="" name="details_eng" cols="" class="form-textarea"></textarea></td>
        <td></td>
    </tr>
    
     <tr>
        <th valign="top">Description (Dutch):</th>
        <td><textarea  rows="" name="details_dutch" cols="" class="form-textarea"></textarea></td>
        <td></td>
    </tr>
    <tr>
    <th>Image:</th>
    <td>

                                       
    <input type="file" name="imagename[]"  placeholder="property Image" >
                                 
                                    <div id="moreImage">
                                      <input type="hidden" id='image_number' value="1">
                                    </div>
                                    <a href="#" onclick="moreImage()" style="margin:125px;">more image</a>


</td>
    <td>
    <div class="bubble-left"></div>
    <div class="bubble-inner">JPEG, GIF, PNG 5MB max per image</div>
    <div class="bubble-right"></div>
    </td>
    </tr>
    
    <tr>
        <th valign="top">Order:</th>
        <td><input type="text" name="order" value="0" /></textarea></td>
        <td></td>
    </tr>

    <tr>
        <th>&nbsp;</th>
        <td valign="top">
            <input type="submit" value="" class="form-submit" />
            <input type="reset" value="" class="form-reset"  />
        </td>
        <td></td>
    </tr>
    </table>
    <?php echo form_close(); ?>
    <!-- end id-form  -->

    </td>
    <td>



</td>
</tr>
<tr>
<td><img src="<?php echo $base_url; ?>assets/admin/images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
    <th class="sized bottomleft"></th>
    <td id="tbl-border-bottom">&nbsp;</td>
    <th class="sized bottomright"></th>
</tr>
</table>









 





<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->

 

<div class="clear">&nbsp;</div>
    
