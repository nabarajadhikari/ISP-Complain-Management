<table id="table">

<!--<tr>

<td colspan="6"><?php echo form_open('technician/get_complain_search');?> <input name="complain_title" type="text" placeholder="Title"><input name="name" type="text" placeholder="client name"> <input name="status" type="text" placeholder="status"> <?php if($this->session->userdata('user_group')=='technician'){?><input name="assigned_technecian" type="hidden" value="<?php echo $this->session->userdata('user_id')?>"><?php }else{ echo form_dropdown('assigned_technecian',$technecian_options,null);}?><input type="submit" value="Search"></form></td>


</tr>-->
<?php // mdie($blogs); ?>
<tr>
    <td>ID</td>
    <td>Title</td> 
    <td>Message</td> 
    <td>Client</td>
    <td>Technician</td> 
    <td>T Comments</td>
    <td>Status</td> 
    <td>Options</td>   
</tr>
 <?php foreach($blogs as $blog):?>
                            <tr <?php if($blog->status=='Pending') echo 'id="fail"';elseif($blog->status=='Finished'){ echo  'id="success"';continue;}elseif($blog->status=='Urgent Pending') echo  'id="urgent"';elseif($blog->status=='Processing')echo 'id="processing"';elseif($blog->status=='Assigned') echo 'id="warning"';?>>
                                    <td><?php echo $blog->id;?></td>
                                    <td title="<?php 
									
									
									echo $blog->complain_title;
								
									?>"><?php echo word_limiter($blog->complain_title,4,'--');
									if($blog->urgent==1)
									{?>
									<br><span style="color:red;">(urgent)</span>
									<?php }
								   ?>
									
									</td> 
                                    <td title="<?php echo $blog->complain_message;?>"><?php echo word_limiter($blog->complain_message,4,'--');?></td> 
                                    <td><?php echo $blog->name.' '.$blog->address;?></td>
                                    <td><?php  echo $blog->assigned_technecian?getUser($blog->assigned_technecian):'';?></td> 
                                    <td title="<?php  echo $blog->assigned_technecian?$blog->technecian_comments:'';?>"><?php  echo $blog->assigned_technecian?$blog->technecian_comments:'';?></td> 
                                    <td><?php echo $blog->status;?></td>
                                    <!-- <td><?php echo $blog->urgent;?></td>-->
                                    <td><a href="#" onclick="show_div('<?php echo $blog->id?>','<?php echo $blog->status?>')"><?php if($blog->status=='Pending') echo 'Assign';elseif($blog->status=='Processing')echo 'Finish';elseif($blog->status=='Urgent Pending')echo 'Urgent Assign';elseif($blog->status=='Assigned') echo 'Processing';?></a> <?php if($blog->status=='Processing') {?><a href="#" onclick="show_div('<?php echo $blog->id?>','Assigned')">Update-Comments</a><?php }?><?php if($this->session->userdata('user_group')!='technician'){?><a href="<?php echo site_url('user/edit_complain/'.$blog->id)?>"><img src="<?php echo ASPATH ; ?>/img/edit.png" alt="Edit" /></a><a href="<?php echo site_url('user/delete_complain/'.$blog->id)?>"><img src="<?php echo ASPATH ; ?>/img/cancel.png" alt="Edit" /></a> <?php if($blog->status=='Pending' || $blog->status=='Urgent Pending' || $blog->status=='Assigned') {?><a href="#" onclick="show_div('<?php echo $blog->id?>','Processing')">Finish</a><?php }?><?php }?></td>
                                    
                                
                                </tr>
 <?php endforeach;?>
    </table>