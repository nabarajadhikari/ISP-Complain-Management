  <table style="text-align:center;" width="100%">
 <?php foreach($blogs as $blog):?>
                             <tr <?php 
if($blog->status=='Pending' && $blog->urgent==0)
{
echo 'id="fail"';
}
elseif($blog->status=='Pending' && $blog->urgent==1)
{
echo 'id="urgent"';

}
 


elseif($blog->status=='Finished') echo  'id="success"';elseif($blog->status=='Processing')echo 'id="processing"';elseif($blog->status=='Assigned') echo 'id="warning"';?> style="border:3px solid #c3c3c3 !important;margin:2px;">
                              <td  width="35%" style="padding:5px;"> 

                                   <div style="text-align:center;font-size:16px;float:left;"><b><?php echo $blog->complain_title;?> </b></div>
                                   <span style="float:right;"><?php echo $blog->created_date;?></span><br/><br/>
                                   <span><?php echo $blog->complain_message;?></span> 
                                    
                                    
                              
                              </td>
                             <td  width="15%" style="padding:5px;">    
                                   <span><b><?php echo $blog->name;?></b></span><br/>
                                    <span><?php echo $blog->address;?></span> <br/>
                                    <span><?php echo $blog->bandwidth;?></span><br/> 
                                    <!--<span><?php echo 'Renewed Date:'.$blog->renew_date;?></span>
                                   <span> <?php echo 'Expiry Date:'.$blog->expiry_date;?></span> -->
                                    
                              
                              </td>
                             <td  width="15%" style="padding:5px;">
                                   <span><b><?php echo getUser($blog->assigned_technecian);?></b></span><br/>
                                    <span><?php //echo $blog->assigned_date;?></span>
                                    <br/> 
                                    
                              
                              </td>
                              <td  width="35%"  <?php if($blog->urgent==1){ ?> style="padding:5px;background-image:url("<?php echo base_url();?>assets/uploads/urgent.gif");background-repeat:no-repeat;" <?php } else {?> style="padding:5px;" <?php } ?> >
                                <div style="text-align:center;"><b><?php echo $blog->status;?> </b></div>
                                <?php if($blog->status=="Finished"){?><span><?php echo $blog->finished_date;?></span><br/><?php }?>
                                    <span><?php echo $blog->technecian_comments;?></span>
                                    <span><?php if($blog->status=='Pending' || $blog->status=='Assigned') {?><a href="#" onclick="show_div('<?php echo $blog->id?>','Processing')">Finish</a><?php }?></span>
                              
                              </td>
                              </tr>
                              <tr ><td colspan="4" height="4px;"></td>
                              </tr> 
                              <?php endforeach;?>  
 </table>     
                              
                               
 
 