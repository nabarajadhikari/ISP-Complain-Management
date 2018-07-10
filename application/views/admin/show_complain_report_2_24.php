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

<div id="shortcuts" class="clearfix">
             <!--<h2 class="ico_mug">Manage Complains<div style="float:right;"><a href="<?php echo site_url('auth/index')?>"><img src="<?php echo base_url() ; ?>assets/admin/img/home.png" height="22px;" alt="home" /></a><div></h2>
             -->
                <?php echo displayStatus(); ?>
                     <a href="<?php echo site_url('report/print_report'); ?>" id="save">Report</a>   
                        
                         
                            
                         
                           
                            <div class="lightbox1"><a href="#" class="close" onclick="closeme()"><img src="<?php echo ASPATH ; ?>/img/cancel.png" alt="cancel" style="margin-top: 20px;"/></a><div class="lightbox_innerbox"></div></div>
                           <table>

                           <tr>

                           <td><?php echo form_open('report/show_complain');?> 
                           <input name="complain_title" type="text" placeholder="Title" value="<?php echo $this->session->userdata('complain_title')?>">
                           <input name="name" type="text" placeholder="client name" value="<?php echo $this->session->userdata('name')?>"> 
                           <input name="statuss" type="text" placeholder="status" value="<?php echo $this->session->userdata('statuss')?>"> 
                           <?php  echo form_dropdown('assigned_technecian',$technecian_options,$this->session->userdata('assigned_technecian'));?>
                           <input name="created_date_l" type="text" placeholder="Created Date(yyyy-mm-dd)" value="<?php echo $this->session->userdata('created_date_l')?>">
                           <input name="created_date_u" type="text" placeholder="To Created Date(yyyy-mm-dd)" value="<?php echo $this->session->userdata('created_date_u')?>">
                           <input name="assigned_date_l" type="text" placeholder="Assigned Date(yyyy-mm-dd)" value="<?php echo $this->session->userdata('assigned_date_l')?>">
                           <input name="assigned_date_u" type="text" placeholder="To Assigned Date(yyyy-mm-dd)" value="<?php echo $this->session->userdata('assigned_date_u')?>">
                           <input name="finished_date_l" type="text" placeholder="Finish Date(yyyy-mm-dd)" value="<?php echo $this->session->userdata('finished_date_l')?>">
                           <input name="finished_date_u" type="text" placeholder="To Finish Date(yyyy-mm-dd)" value="<?php echo $this->session->userdata('finished_date_u')?>">
                           
                           <input type="submit" value="Search"></form></td>


                           </tr>
                           </table>
                           <div id='load'>
                            <table id="table">
<tr>
    <td>ID</td>
    <td>Title</td> 
    <td>Client</td>
    <td>Technician</td> 
    <td>Status</td> 
    <td>Created</td>
     <td>Assigned</td> 
     <td>Assigned Duration</td> 
     <td>Finished</td> 
     <td>Finished Duration</td> 
    
    
</tr>
 <?php foreach($blogs as $blog):?>
                            <tr <?php if($blog->status=='Pending') echo 'id="fail"';elseif($blog->status=='Finished') echo  'id="success"';elseif($blog->status=='Processing')echo 'id="processing"';elseif($blog->status=='Assigned') echo 'id="warning"';?>>
                                    <td><?php echo $blog->id;?></td>
                                    <td title="<?php echo $blog->complain_title;?>"><?php echo word_limiter($blog->complain_title,4,'--');?></td> 
                                    <td><?php echo $blog->name.' '.$blog->address;?></td>
                                    <td><?php  echo $blog->assigned_technecian?getUser($blog->assigned_technecian):'';?></td> 
                                    <td><?php echo $blog->status;?></td>
                                    <td><?php echo $blog->created_date;?></td>
                                    <td><?php echo $blog->assigned_date;?></td>
                                    <td><?php echo DiffDate($blog->created_date,$blog->assigned_date);?></td>
                                    <td><?php echo $blog->finished_date;?></td>
                                    <td><?php echo DiffDate($blog->created_date,$blog->finished_date);?></td>
                                    
                                
                                </tr>
 <?php endforeach;?>
    </table>
                           
                           </div> 
                            
                                       
           
 </div> 

</div>


        