 <?php foreach($blogs as $blog):?>
                            <div <?php if($blog->status=='Pending') echo 'id="fail"';elseif($blog->status=='Finished') echo  'id="success"';elseif($blog->status=='Processing')echo 'id="processing"';elseif($blog->status=='Assigned') echo 'id="warning"'; ?>>
                                   <span>ID:</span> <div style="margin-left:56px;margin-top:-14px;"><?php echo $blog->id;?></div>
                                   <span>Title</span><div style="margin-left:56px;margin-top:-14px;"><?php echo $blog->complain_title;?> </div>
                                   <span>Message:</span><div style="margin-left:56px;margin-top:-14px;"><?php echo $blog->complain_message;?></div>
                                    <span>Client</span><div style="margin-left:56px;margin-top:-14px;"><?php echo $blog->client_id;?></div>
                                    <span>Status</span><div style="margin-left:56px;margin-top:-14px;"><?php echo $blog->status;?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="show_div('<?php echo $blog->id?>','<?php echo $blog->status?>')"><?php if($blog->status=='Pending') echo 'Assign';elseif($blog->status=='Processing')echo 'Finish';elseif($blog->status=='Assigned') echo 'Processing';?></a> <?php if($blog->status=='Processing') {?><a href="#" onclick="show_div('<?php echo $blog->id?>','Assigned')">Update-Comments</a><?php if($blog->status=='Pending' || $blog->status=='Assigned') {?><a href="#" onclick="show_div('<?php echo $blog->id?>','Processing')">Finish</a><?php }?><?php }?></div>
                                   
                                
                                </div>
 <?php endforeach;?>