<script type="text/javascript">
function closeme(){
           $(".lightbox1").hide();
}
function showme(){
           $(".ligntbox1").show();
}
function show_div(id,msg_type){
if(msg_type=='Pending'){
     $.ajax({
                url:"<?php echo site_url("admin/get_append_form_assigned");?>",
                data:{'id':id},
                type:"POST",
                dataType: 'html',
                success: function(data){ 
                   $(".lightbox_innerbox").empty();
                   $(".lightbox_innerbox").append(data); 
                   $(".lightbox1").show(); 
                } 
     });
     
}
if(msg_type=='Assigned'){
     $.ajax({
                url:"<?php echo site_url("technician/get_append_form_processing");?>",
                data:{'id':id},
                type:"POST",
                dataType: 'html',
                success: function(data){ 
                   $(".lightbox_innerbox").empty();
                   $(".lightbox_innerbox").append(data); 
                   $(".lightbox1").show(); 
                } 
     });
     
}
if(msg_type=='Processing'){
     $.ajax({
                url:"<?php echo site_url("technician/get_append_form_finished");?>",
                data:{'id':id},
                type:"POST",
                dataType: 'html',
                success: function(data){ 
                   $(".lightbox_innerbox").empty();
                   $(".lightbox_innerbox").append(data); 
                   $(".lightbox1").show(); 
                } 
     });
     
}
}
</script>
<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#load').load("<?php $page_number=$page_number?$page_number:1;echo site_url('user/autolode/'.$page_number.'/'.$limit)?>").fadeIn("slow");
}, 10000); // refresh every 10000 milliseconds

</script>
<div id="shortcuts" class="clearfix">
             <!--<h2 class="ico_mug">Manage Complains<div style="float:right;"><a href="<?php echo site_url('auth/index')?>"><img src="<?php echo base_url() ; ?>assets/admin/img/home.png" height="22px;" alt="home" /></a><div></h2>
             -->
                <?php echo displayStatus(); ?>
                     <a href="<?php echo site_url('user/add_complain'); ?>" id="save">Add Complains</a>   
                        
                         
                            
                         
                           
                            <div class="lightbox1"><a href="#" class="close" onclick="closeme()"><img src="<?php echo ASPATH ; ?>/img/cancel.png" alt="cancel" style="margin-top: -20px;"/></a><div class="lightbox_innerbox"></div></div>
                           <div id='load'>
                            <?php $this->load->view('user/flash_div_user',$data);?>
                           </div> 
                            <div class="pagination">
                                           <?php build_pagination_links($page_number, $limit, $max_results, $page_prefix, $page_suffix);?>
                                        </div> <!-- End .pagination -->
                            <div class="clear"></div>
                                       
           
 </div> 

</div>


        