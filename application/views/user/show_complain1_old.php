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
$('#load').load("<?php $page_number=$page_number?$page_number:1;echo site_url((($this->session->userdata('user_group')=='superadmin' || $this->session->userdata('user_group')=='admin')?'admin':'technician').'/autolode/'.$page_number.'/'.$limit)?>").fadeIn("slow");
}, 100000); // refresh every 100000 milliseconds

</script>

<div id="shortcuts" class="clearfix">
             <!--<h2 class="ico_mug">Manage Complains<div style="float:right;"><a href="<?php echo site_url('auth/index')?>"><img src="<?php echo base_url() ; ?>assets/admin/img/home.png" height="22px;" alt="home" /></a><div></h2>
             -->
                <?php echo displayStatus(); ?>
                     <a href="<?php echo site_url('user/add_complain'); ?>" id="save">Add Complains</a>   
                        
                         
                            
                         
                           
                            <div class="lightbox1"><a href="#" class="close" onclick="closeme()"><img src="<?php echo ASPATH ; ?>/img/cancel.png" alt="cancel" style="margin-top: -20px;"/></a><div class="lightbox_innerbox"></div></div>
                           <table>

                           <tr>

                           <td><?php echo form_open('technician/get_complain_search');?> <input name="complain_title" type="text" placeholder="Title"><input name="name" type="text" placeholder="client name"> <input name="status" type="text" placeholder="status"> <?php if($this->session->userdata('user_group')=='technician'){?><input name="assigned_technecian" type="hidden" value="<?php echo $this->session->userdata('user_id')?>"><?php }else{ echo form_dropdown('assigned_technecian',$technecian_options,null);}?><input type="submit" value="Search"></form></td>


                           </tr>
                           </table>
                           <div id='load'>
                            <?php if($this->session->userdata('user_group')=='user')$this->load->view('user/flash_div_user',$data);elseif($this->session->userdata('user_group')=='admin' || $this->session->userdata('user_group')=='superadmin')$this->load->view('user/flash_div',$data); if($this->session->userdata('user_group')=='technician')$this->load->view('user/flash_div',$data);?>
                           </div> 
                            <div class="pagination">
                                           <?php build_pagination_links($page_number, $limit, $max_results, $page_prefix, $page_suffix);?>
                                        </div> <!-- End .pagination -->
                            <div class="clear"></div>
                                       
           
 </div> <!-- End .content-box -->                                 
 <!-- sidebar starts                                -->
 <!--<div id="sidebar" class="right">
                <h2 class="ico_mug">Add</h2>
            <ul id="menu">
               
                        <li><a href="<?php echo site_url('admin/add_ad')?>">Add add</a></li>
                        <li><a href="<?php echo site_url('admin/show_add')?>">Manage add</a></li>
                    
            </ul>

</div> -->
<!--            sidebar ends-->                          

</div>


        